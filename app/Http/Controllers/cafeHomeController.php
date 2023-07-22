<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Event;
use App\Models\ReviewCafe;
use App\Models\ReviewEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class cafeHomeController extends Controller
{
    public function index()
    {
        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();
            $ambience = $cafe[0]->ambience;
        $cafes =  $cafe->count();

        if ($cafes == 0) {
            Cafe::insert([
                'nama' => 'Cafe ' . Auth::user()->username,
                'lokasi' => Auth::user()->daerah,
                'alamat' => 'Alamat belum dilengkapi',
                'user_id' => Auth::user()->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }

        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();

        $rating_cafe = ReviewCafe::where('cafe_id', $cafe[0]->id)
            ->avg('rating');

        $event = Event::where('cafe_id', $cafe[0]->id)
            ->get();

        $review_cafe = ReviewCafe::join('users', 'user_id', 'users.id')
            ->where('cafe_id', $cafe[0]->id)
            ->select('review_cafes.*', 'users.username')
            ->get();

        // dd($review_cafe);
        return view('cafe.index', [
            'cafe' => $cafe[0],
            'ambience'=> $ambience,
            'rating_cafe' => $rating_cafe,
            'event' => $event,
            'review_cafe' => $review_cafe
        ]);
    }
    public function edit()
    {
        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();

        $event = Event::where('cafe_id', $cafe[0]->id)
            ->get();
        return view('cafe.edit', [
            'cafe' => $cafe[0],
            'ambience' => $cafe[0]->ambience,
            'event' => $event
        ]);
    }

    public function update(Request $request)
    {
        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();
        $cafe = Cafe::findOrFail($cafe[0]->id);

        $update = $cafe->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'operasional_buka' => $request->operasional_buka,
            'operasional_tutup' => $request->operasional_tutup,
            'ambience' => $request->ambience,
            'range_harga' => $request->range_harga,
            'telepon' => $request->telepon,
            'deskripsi' => $request->deskripsi,
            'maps' => $request->maps,
            'wifi' => $request->wifi,
            'smoking_area' => $request->smoking_area,
            'charging_port' => $request->charging_port,
            'mushola' => $request->mushola,
            'lahan_parkir' => $request->lahan_parkir,
            'toilet' => $request->toilet,
        ]);
        if (($cafe->wifi == 1 && $cafe->charging_port == 1 && $cafe->toilet == 1) && $request->ambience == 'Tenang') {
            // dd($cafe->ambience);
            $cafe->update(['wfc_friendly' => 1]);
        } else {
            $cafe->update(['wfc_friendly' => 0]);
        }

        if ($request->file('foto') != null) {
            $currFile = $request->file('foto');
            $fileName = time() . '_' . $currFile->getClientOriginalName();
            // Storage::putFileAs('public/storage/image', $currFile, $fileName);
            $currFile->move(public_path('storage/image'), $fileName);
            // hosting
            // $currFile->move(public_path('../../public_html/storage/image'), $fileName);
            $cafe->update([
                $request->pilih => $fileName
            ]);
        }


        if ($update == true) {
            return redirect('/cafe')
                ->with([
                    'success' => 'Profile has been updated successfully'
                ]);
        } else {
            return redirect('/cafe')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function eventStore(Request $request, $id)
    {
        $currFile = $request->file('foto');
        $fileName = time() . '_' . $currFile->getClientOriginalName();
        // Storage::putFileAs('public/storage/image', $currFile, $fileName);
        $currFile->move(public_path('storage/image'), $fileName);
        // hosting
        // $currFile->move(public_path('../../public_html/storage/image'), $fileName);


        if($request->waktu_mulai <= now()){
            return redirect('/cafe')
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
       }

        if($request->waktu_mulai >= $request->waktu_selesai){
             return redirect('/cafe')
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }

        $post = Event::insert([
            'nama' => $request->nama,
            'foto' => $fileName,
            'kategori' => $request->kategori,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'cafe_id' => $id,
            'keterangan' => $request->keterangan,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ]);

        if ($post == true) {
            return redirect('/cafe')
                ->with([
                    'success' => 'Event has been added successfully'
                ]);
        } else {
            return redirect('/cafe')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function profile()
    {
        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();
        return view(
            'cafe.profile',
            [
                'cafe' => $cafe[0]
            ]
        );
    }
    public function profileEdit()
    {
        $cafe = Cafe::where('user_id', Auth::user()->id)
            ->get();
        return view('cafe.profile-edit', [
            'cafe' => $cafe[0]
        ]);
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
                // $currFile->move(public_path('../../public_html/storage/image'), $fileName);
                $user->update([
                    'foto' => $fileName
                ]);
                return redirect('/cafe/profile')
                    ->with([
                        'success' => 'Profile has been updated successfully'
                    ]);
            }
            return redirect('/cafe/profile')
                ->with([
                    'success' => 'Profile has been updated successfully'
                ]);
        } else {
            return redirect('/cafe/profile')
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function eventEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('cafe.event-edit', [
            'event' => $event
        ]);
    }
    public function eventUpdate(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if($request->waktu_mulai <= now()){
            return redirect('/cafe/event-edit/'.$id)
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
       }

        if($request->waktu_mulai >= $request->waktu_selesai){
             return redirect('/cafe/event-edit/'.$id)
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }

        $update = $event->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->file('foto') != null) {
            $currFile = $request->file('foto');
            $fileName = time() . '_' . $currFile->getClientOriginalName();
            // Storage::putFileAs('public/storage/image', $currFile, $fileName);
            $currFile->move(public_path('storage/image'), $fileName);
            // hosting
            // $currFile->move(public_path('../../public_html/storage/image'), $fileName);
            $event->update([
                'foto' => $fileName
            ]);
        }

        if ($update == true) {
            return redirect('/cafe')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('/cafe/event-edit/' . $event->id)
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function eventDelete($id)
    {
        $event = Event::findOrFail($id);
        $review_events = ReviewEvent::where('event_id', $event->id);
        if ($review_events->count() > 0) {
            $review_events->delete();
        }
        $event->delete();

        if ($event) {
            return redirect('cafe')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect('cafe')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    public function about()
    {
        return view('cafe.about');
    }
}
