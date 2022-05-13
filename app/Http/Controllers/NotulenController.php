<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rapat;
use App\Models\Notulen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotulenController extends Controller
{
    public function index()
    {
        $notulen = Notulen::all();
        return view('notulen.index', compact('notulen'), [
            "title" => "Notulensi",
            "active" => "Notulensi"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notulen.create', [
            "rapat" => Rapat::all(),
            "username" => User::all(), //->where('role', 'NON ASN')
            "title" => "Notulensi",
            "active" => "Notulensi"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => ['required'],
            'id_rapat' => ['required'],
            'tempat' => '',
            'hari' => '',
            'tanggal' => '',
            'jam' => '',
            'keterangan' => '',
            'isi' => ['required'],
            'status' => ['required'],
            'file' => ['required']
        ]);

        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('file-notulensi');
        }

        $data = Rapat::select('*')->where('id_rapat', $request->id_rapat)->first();
        $validateData['tempat'] = $data->tempat;
        $validateData['hari'] = $data->hari;
        $validateData['tanggal'] = $data->tanggal;
        $validateData['jam'] = $data->jam;
        $validateData['keterangan'] = $data->keterangan;

        notulen::create($validateData);
        return redirect('/notulensi')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_notulensi)
    {
        $data = notulen::select('*')->where('id_notulen', $id_notulensi)->get();
        return view('notulen.edit', compact('data'), [
            "title" => "Notulensi",
            "active" => "Notulensi",
            "rapat" => Rapat::all(),
            "user" => User::all()   //->where('role', 'NON ASN')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_notulensi)
    {
        // if ($request->file('file')) {
        //     // if ($request->oldFile) {
        //     //     Storage::delete($request->oldFile);
        //     // }
        //     $validateData = $request->file('file')->store('file-notulensi');
        // } else {
        //     $validateData = $request->file;
        // }

        $data = notulen::where('id_notulen', $id_notulensi)->update([
            'user_id' => $request->user_id,
            'id_rapat' => $request->id_rapat,
            'tempat' => $request->tempat,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'isi' => $request->isi,
            'status' => $request->status,
            'file' => $request->oldFile
        ]);

        return redirect('/notulensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_notulensi, Notulen $notulen)
    {
        $notulen = notulen::where('id_notulen', $id_notulensi)->first();
        if ($notulen->file) {
            Storage::delete($notulen->file);
        }
        $delete = notulen::where('id_notulen', $id_notulensi)->delete();
        return redirect('/notulensi');
    }
}
