<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


        return view('cafe.index', [
            'cafe' => $cafe[0],
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
            return redirect('/cafe/edit')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('/cafe/edit')
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
            return redirect('/cafe/edit')
                ->with([
                    'success' => 'Event has been Added successfully'
                ]);
        } else {
            return redirect('/cafe/edit')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
}
