<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
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
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
            ->get();
        $cafes =  $cafe->count();

        if ($cafes == 0) {
            DB::table('cafes')->insert([
                'nama' => 'Cafe ' . Auth::user()->username,
                'lokasi' => Auth::user()->daerah,
                'user_id' => Auth::user()->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }

        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
            ->get();

        $rating_cafe = DB::table('review_cafes')
            ->where('cafe_id', $cafe[0]->id)
            ->avg('rating');

        $event = DB::table('events')
            ->where('cafe_id', $cafe[0]->id)
            ->get();

        $review_cafe = DB::table('review_cafes')
            ->join('users', 'user_id', 'users.id')
            ->where('cafe_id', $cafe[0]->id)
            ->get();

        // dd($review_cafe);
        return view('cafe.index', [
            'cafe' => $cafe[0],
            'rating_cafe' => $rating_cafe,
            'event' => $event,
            'review_cafe' => $review_cafe
        ]);
    }
    public function edit()
    {
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
            ->get();

        $event = DB::table('events')
            ->where('cafe_id', $cafe[0]->id)
            ->get();


        return view('cafe.edit', [
            'cafe' => $cafe[0],
            'event' => $event
        ]);
    }

    public function update(Request $request)
    {
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
            ->get();
        $cafe = Cafe::findOrFail($cafe[0]->id);

        $update = $cafe->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'operasional_buka' => $request->operasional_buka,
            'operasional_tutup' => $request->operasional_tutup,
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

        if ($request->file('foto') != null) {
            $currFile = $request->file('foto');
            $fileName = time() . '_' . $currFile->getClientOriginalName();
            // Storage::putFileAs('public/storage/image', $currFile, $fileName);
            $currFile->move(public_path('storage/image'), $fileName);
            // hosting
            // $currFile->move(public_path('../../public_html/hibahmbkm/storage/image'), $fileName);
            $cafe->update([
                $request->pilih => $fileName
            ]);
        }


        if ($update == true) {
            return redirect('/cafe')
                ->with([
                    'success' => 'Post has been updated successfully'
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
        // $currFile->move(public_path('../../public_html/hibahmbkm/storage/image'), $fileName);


        $post = DB::table('events')->insert([
            'nama' => $request->nama,
            'foto' => $fileName,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
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
                    'success' => 'Event has been Added successfully'
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
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
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
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
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
                // $currFile->move(public_path('../../public_html/hibahmbkm/storage/image'), $fileName);
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
}
