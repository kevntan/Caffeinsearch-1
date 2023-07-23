<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Event;
use App\Models\ReviewCafe;
use App\Models\ReviewEvent;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        $cafe = Cafe::limit(7)
            ->orderBy('rating', 'DESC')
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
        $event = Event::where('cafe_id', $cafe->id)->get();
        $review_cafe = ReviewCafe::where('cafe_id', $cafe->id)
            ->join('users', 'user_id', 'users.id')
            ->select('review_cafes.*', 'users.username')
            ->get();
        $rating_cafe = ReviewCafe::where('cafe_id', $id)
            ->avg('rating');
        $cafe->update([
            'rating' => $rating_cafe
        ]);

        return view('user.details', [
            'cafe' => $cafe,
            'event' => $event,
            'review_cafe' => $review_cafe,
            'rating_cafe' => $rating_cafe
        ]);
    }

    public function feeds(Request $request)
    {
        $lokasi = $request->input('lokasi');
        $kategori = $request->input('kategori');
        if ($request->input('query') != null) {
            $nama = $request->input('query');
        } else {
            $nama = '';
        }

        $query = Event::query();

        if ($lokasi) {
            $query->where('cafes.lokasi', $lokasi)->select('events.*', 'cafes.alamat');
        }
        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $results = $query->where('events.nama', 'LIKE', '%' . $nama . '%')->orderBy('events.waktu_mulai', 'ASC')->where('events.waktu_selesai', '>=', now())->join('cafes', 'events.cafe_id', 'cafes.id')->select('events.*', 'cafes.nama as nama_cafe')->get();
        // $results = 0;
        // $results = $results->query;
        // dd($results);

        $old = $nama;

        return view('user.feeds', [
            'result' => $results,
            'lokasi' => $lokasi,
            'kategori' => $kategori,
            'old' => $old
        ]);
    }
    public function detailsFeeds($id)
    {
        $event = Event::join('cafes', 'events.cafe_id', 'cafes.id')
            ->where('events.id', $id)
            ->select('events.*', 'cafes.alamat', 'cafes.nama as nama_cafe')
            ->get();
        $event = $event[0];

        $cafe = Cafe::find($event->cafe_id);
        $user = User::find($cafe->user_id);
        $review_event = ReviewEvent::where('event_id', $event->id)
            ->join('users', 'user_id', 'users.id')
            ->select('users.username', 'review_events.komentar', 'review_events.created_at')
            ->get();
        $review_cafe = ReviewCafe::where('cafe_id', $cafe->id)
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
        $review = ReviewEvent::insert([
            'komentar' => $request->komentar,
            'user_id' => Auth::user()->id,
            'event_id' => $id,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
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

        // if (!Auth::user()) {
        //     return redirect('sign-in');
        // }

        $query2 = ReviewCafe::query();
        $cafe = Cafe::get();
        $review_cafe = $query2->select('cafe_id', DB::raw('AVG(rating) as rating'))->groupBy('cafe_id')->get();

        $results = 0;
        $results = $this->search($request);

        // dd($results);

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
        $fileName = NULL;
        if ($request->file('foto') != null) {
            $currFile = $request->file('foto');
            $fileName = time() . '_' . $currFile->getClientOriginalName();
            // Storage::putFileAs('public/storage/image', $currFile, $fileName);
            $currFile->move(public_path('storage/image'), $fileName);
            // hosting
            // $currFile->move(public_path('../../public_html/storage/image'), $fileName);
        }

        $review = ReviewCafe::insert([
            'rating' => $request->rating,
            'foto' => $fileName,
            'komentar' => $request->komentar,
            'cafe_id' => $id,
            'user_id' => Auth::user()->id,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);
        $rating = ReviewCafe::where('cafe_id', $id)
            ->avg('rating');
        $cafe = Cafe::findOrFail($id);
        $cafe->update([
            'rating' => $rating
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
            'bio' => $request->bio,
            'daerah' => $request->daerah
        ]);

        $user->password = $request->validate([
            "password" => "min:9|nullable",
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
                // $currFile->move(public_path('../../public_html/storage/image'), $fileName);
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

    public function searchFeeds(Request $request)
    {
        $query = $request->input('query');
        Paginator::useBootstrapFive();
        $results = $query->where('nama', 'LIKE', '%' . $query . '%')->join('cafes', 'events.cafe_id', 'cafes.id')->select('events.*', 'cafes.nama as nama_cafe')->orderBy('nama', 'ASC')->paginate(10);
        return $results;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        Paginator::useBootstrapFive();

        $results = Cafe::where('nama', 'LIKE', '%' . $query . '%')
            // ->limit(9)
            // ->get();
            ->orderBy('nama', 'ASC')
            ->paginate(10);
        return $results;
    }
    public function filter(Request $request)
    {
        $lokasi = $request->input('lokasi');
        $harga = $request->input('harga');
        $rating = $request->input('rating');
        $wfcfriendly = $request->input('wfcfriendly');
    // dd($wfcfriendly);
        Paginator::useBootstrapFive();

        $query = Cafe::query();

        $query2 = ReviewCafe::query();
        $review_cafe = $query2->select('cafe_id', DB::raw('AVG(rating) as rating'))->groupBy('cafe_id')->get();
// dd($query->orderBy('rating', 'ASC')->get());

        if ($lokasi) {
            $query->where('lokasi', $lokasi);
        }

        if ($harga) {
            $query->where('range_harga', $harga);
        }

        if ($rating) {
            // $review_cafe->where('rating', $rating);
            if ($rating == 1) {
                // $review_cafe = $query2->select('cafe_id', DB::raw('AVG(rating) as rating'))->groupBy('cafe_id')->orderBy('rating', 'ASC')->get();
                $query->orderBy('rating', 'ASC');
            } else if ($rating == 2) {
                // $review_cafe = $query2->select('cafe_id', DB::raw('AVG(rating) as rating'))->groupBy('cafe_id')->orderBy('rating', 'DESC')->get();
                $query->orderBy('rating', 'DESC');
            }
        }
        if(isset($wfcfriendly)){
            if ($wfcfriendly == 0 || $wfcfriendly == 1) {
                $query->where('wfc_friendly', '=', $wfcfriendly);
            }
        }

        // dd($review_cafe);
        $results = $query->paginate(10);
        // dd($results);


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
    public function about()
    {
        return view('user.about');
    }
}
