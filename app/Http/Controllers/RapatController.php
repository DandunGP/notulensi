<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;
use App\Models\asn;
use App\Models\nonasn;
use App\Models\User;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapat = Rapat::all();
        return view('rapat.index', compact('rapat'), [
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publik()
    {
        $rapat = Rapat::all()->where('id_asn', NULL);
        return view('rapat.publik', compact('rapat'), [
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function private()
    {
        $rapat = Rapat::all()->whereNotNull('id_asn');
        return view('rapat.private', compact('rapat'), [
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpublik()
    {
        return view('rapat.createpublik', [
            "username" => User::all(),
            "asn" => asn::all(),
            "nonasn" => nonasn::all(),
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createprivate()
    {
        return view('rapat.createprivate', [
            "username" => User::all(),
            "asns" => asn::all(),
            "nonasn" => nonasn::all(),
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepublik(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => ['required'],
            'tempat' => ['required'],
            'hari' => ['required'],
            'tanggal' => ['required'],
            'jam' => ['required'],
            'keterangan' => ['required'],
            'id_asn' => ['required'],
            'id_non' => ['required']
        ]);
        $validateData['id_asn'] = "NULL";
        $validateData['id_non'] = "NULL";
        rapat::create($validateData);
        return redirect('/publik')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    public function storeprivate(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => ['required'],
            'id_asn' => ['required'],
            'id_non' => ['required'],
            'tempat' => ['required'],
            'hari' => ['required'],
            'tanggal' => ['required'],
            'jam' => ['required'],
            'keterangan' => ['required'],

        ]);
        $validateData['id_asn'] = json_encode($request->id_asn);
        $validateData['id_non'] = json_encode($request->id_non);
        // $validateData['id_non'] = implode(",", $request->id_non);
        // $validateData['id_asn'] = implode(",", $request->id_asn);

        rapat::create($validateData);
        return redirect('/private')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpublik($id_rapat)
    {
        $data = Rapat::select('*')->where('id_rapat', $id_rapat)->get();
        return view('rapat.editpublik', compact('data'), [
            "title" => "Rapat",
            "active" => "Rapat"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showprivate($id_rapat)
    {
        $data = Rapat::select('*')->where('id_rapat', $id_rapat)->get();
        return view('rapat.editprivate', compact('data'), [
            "title" => "Rapat",
            "active" => "Rapat",
            "asns" => asn::all(),
            "nonasn" => nonasn::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepublik(Request $request, $id)
    {
        $data = Rapat::where('id_rapat', $request->id_rapat)->update([
            'tempat' => $request->tempat,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/publik');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprivate(Request $request, $id)
    {
        $validateData = $request->validate([
            'id_asn' => ['required'],
            'id_non' => ['required'],
            'tempat' => ['required'],
            'hari' => ['required'],
            'tanggal' => ['required'],
            'jam' => ['required'],
            'keterangan' => ['required'],

        ]);

        $validateData['id_asn'] = json_encode($request->id_asn);
        $validateData['id_non'] = json_encode($request->id_non);

        Rapat::where('id_rapat', $request->id_rapat)->update([
            'tempat' => $validateData['tempat'],
            'hari' => $validateData['hari'],
            'tanggal' => $validateData['tanggal'],
            'jam' => $validateData['jam'],
            'keterangan' => $validateData['keterangan'],
            'id_asn' => $validateData['id_asn'],
            'id_non' => $validateData['id_non']
        ]);

        return redirect('/private');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroypublik($id_rapat)
    {
        $rapat = Rapat::where('id_rapat', $id_rapat)->delete();
        return redirect('/publik');
    }
    public function destroyprivate($id_rapat)
    {
        $rapat = Rapat::where('id_rapat', $id_rapat)->delete();
        return redirect('/private');
    }
}
