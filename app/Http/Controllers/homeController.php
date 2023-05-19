<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->role_id == 2) {
                return redirect('cafe');
            }
        }
        $cafe = DB::table('cafes')
            ->limit(9)
            ->get();
        $results = 0;
        $results = $this->search($request);

        $old = $request->query;


        return view('user.index', [
            'cafe' => $cafe,
            'results' => $results,
            'old' => $old->get('query')
        ]);
    }

    public function details($id)
    {
        $cafe = Cafe::findOrFail($id);
        $event = DB::table('events')->where('cafe_id', $cafe->id)->get();
        $review_cafe = DB::table('review_cafes')
            ->where('cafe_id', $cafe->id)
            ->join('users', 'user_id', 'users.id')
            ->get();
        $rating_cafe = DB::table('review_cafes')
            ->where('cafe_id', $id)
            ->avg('rating');

        return view('user.details', [
            'cafe' => $cafe,
            'event' => $event,
            'review_cafe' => $review_cafe,
            'rating_cafe' => $rating_cafe
        ]);
    }

    public function feeds()
    {
        $event = DB::table('events')
            ->join('cafes', 'events.cafe_id', 'cafes.id')
            ->select('events.*', 'cafes.alamat')
            ->get();
        return view('user.feeds', [
            'event' => $event,
        ]);
    }
    public function detailsFeeds($id)
    {
        $event = DB::table('events')
            ->join('cafes', 'events.cafe_id', 'cafes.id')
            ->where('events.id', $id)
            ->select('events.*', 'cafes.alamat')
            ->get();
        $event = $event[0];

        $cafe = Cafe::find($event->cafe_id);
        $user = User::find($cafe->user_id);
        $review_event = DB::table('review_events')
            ->where('event_id', $event->id)
            ->join('users', 'user_id', 'users.id')
            ->get();
        $review_cafe = DB::table('review_cafes')
            ->where('cafe_id', $cafe->id)
            ->avg('rating');

        return view('user.details-feeds', [
            'event' => $event,
            'cafe' => $cafe,
            'user' => $user,
            'review_cafe' => $review_cafe,
            'review_event' => $review_event,
        ]);
    }

    public function storeReviewEvent(Request $request, $id)
    {
        $review = DB::table('review_events')->insert([
            'komentar' => $request->komentar,
            'user_id' => Auth::user()->id,
            'event_id' => $id
        ]);
        if ($review == true) {
            return redirect('/details-feeds/' . $id)
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('/details-feeds/' . $id)
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function seeAll(Request $request)
    {

        if (!Auth::user()) {
            return redirect('sign-in');
        }

        $cafe = DB::table('cafes')->get();
        $review_cafe = DB::table('review_cafes')
            ->where('cafe_id', $cafe[0]->id)
            ->avg('rating');

        $results = 0;
        $results = $this->search($request);

        $old = $request->query;
        // dd($old);
        return view('user.see-all', [
            'cafe' => $cafe,
            'review_cafe' => $review_cafe,
            'results' => $results,
            'old' => $old->get('query')
        ]);
    }
    public function storeReviewCafe(Request $request, $id)
    {
        $fileName = null;
        if ($request->file('foto') != null) {
            $currFile = $request->file('foto');
            $fileName = time() . '_' . $currFile->getClientOriginalName();
            // Storage::putFileAs('public/storage/image', $currFile, $fileName);
            $currFile->move(public_path('storage/image'), $fileName);
        }

        $review = DB::table('review_cafes')->insert([
            'rating' => $request->rating,
            'foto' => $fileName,
            'komentar' => $request->komentar,
            'cafe_id' => $id,
            'user_id' => Auth::user()->id,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        if ($review == true) {
            return redirect('/details/' . $id)
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('/details/' . $id)
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function profile()
    {
        return view('user.profile');
    }
    public function profileEdit()
    {
        return view('user.profile-edit');
    }

    public function profileUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $update = $user->update([
            // 'username' => $request->username,
            'bio' => $request->bio
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        if ($update == true) {

            if ($request->file('foto') != null) {
                $currFile = $request->file('foto');
                $fileName = time() . '_' . $currFile->getClientOriginalName();
                // Storage::putFileAs('public/storage/image', $currFile, $fileName);
                $currFile->move(public_path('storage/image'), $fileName);
                // hosting
                // $currFile->move(public_path('../../public_html/hibahmbkm/storage/image'), $fileName);
                $user->update([
                    'foto' => $fileName
                ]);
                if (Auth::user()->role_id == 2) {
                    return redirect('/cafe/profile')
                        ->with([
                            'success' => 'Profile has been updated successfully'
                        ]);
                }
                return redirect('/profile')
                    ->with([
                        'success' => 'Profile has been updated successfully'
                    ]);
            }
            return redirect('/profile')
                ->with([
                    'success' => 'Profile has been updated successfully'
                ]);
        } else {
            if (Auth::user()->role_id == 2) {
                return redirect('/cafe/profile')
                    ->with([
                        'error' => 'Some problem has occured, please try again'
                    ]);
            }
            return redirect('/profile')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = DB::table('cafes')
            ->where('nama', 'LIKE', '%' . $query . '%')
            ->limit(9)
            ->get();
        return $results;
    }
    public function filter(Request $request)
    {
        $lokasi = $request->input('lokasi');
        $harga = $request->input('harga');
        $rating = $request->input('rating');
        $wfcfriendly = $request->input('wfcfriendly');



        $query = Cafe::query();

        $query2 = DB::table('review_cafes');
        $review_cafe = $query2->select('cafe_id', DB::raw('AVG(rating) as rating'))->groupBy('cafe_id')->get();

        if ($lokasi) {
            $query->where('lokasi', $lokasi);
        }

        if ($harga) {
            $query->where('range_harga', $harga);
        }

        if ($rating) {
            $review_cafe->where('rating', $rating);
        }

        if ($wfcfriendly) {
            $query->where('wfc_friendly', $wfcfriendly);
        }


        $results = $query->get();

        // dd($results);
        // dd($review_cafe);
        // $cafe = DB::table('cafes')->get();

        // $review_cafe = DB::table('review_cafes')


        return view('user.filter', [
            'results' => $results,
            'old' => null,
            'review_cafe' => $review_cafe,
            'lokasi' => $lokasi,
            'harga' => $harga,
            'rating' => $rating,
            'wfcfriendly' => $wfcfriendly,
        ]);
        // return redirect('see-all');
    }
}
