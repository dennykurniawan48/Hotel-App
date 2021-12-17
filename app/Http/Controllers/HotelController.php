<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kota;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::all();
        return view('hotel', ["data" => $hotel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        return view("addhotel", ["data" => $kota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:512',
            'kota' => 'required',
            'biaya' => 'required|numeric',
            'fasilitas' => 'required|string'
        ]);

        $image = $request->file('foto');
        $image_uploaded_path = $image->store('', 'public');

        $data = [
            "name" => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'foto' => $image_uploaded_path,
            'ref_kota' => $request->kota,
            'biaya' => $request->biaya,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas
        ];
        
        $hotel = Hotel::create($data);

        return redirect('/createhotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
