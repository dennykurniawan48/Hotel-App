<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookingApi extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $userId = auth('sanctum')->user()->id;
        $validated = $request->validate([
            'ref_hotel' => 'required|numeric',
            'start' => 'required|string',
            'end' => 'required|string',
            'durasi' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        $data = [
            "ref_hotel" => $request->ref_hotel,
            'start' => $request->start,
            'end' => $request->end,
            'durasi' => $request->durasi,
            'total' => $request->total,
            'ref_user' => $userId
        ];

        $booking = Booking::create($data);
        return $this->showOne($booking, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        if($booking){
            $booking = Booking::where("id", "=", $id)->with('hotel', 'user')->first();
            return $this->showOne($booking, Response::HTTP_OK);
        }else{
            return $this->errorResponse("Resourced not found", Response::HTTP_NOT_FOUND);
        }
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
