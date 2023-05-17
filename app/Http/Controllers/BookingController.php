<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class bookingController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        if (count($bookings)==0){
            return response()->json(["message"=>"no data in database"], 200);
        }
        return response()->json(["message"=>"request successfully","data"=>$bookings], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "price" => "required",
            "zone" => "required",
            "event_id" => "required",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors" => $validator->errors()
            ], 400);;
        }
        else{
            $booking = Booking::create($validator->validated());
            return Response()->json(["message"=>"post has been created", "data"=>$booking], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);
        if(count($booking) == 0){
            return response()->json(['massege'=>'No data in database'],200);
        };
        return response()->json(['massege'=>'success','data'=>$booking],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::find($id);
        $validator = Validator::make($request->all(),[
            "price" => "required",
            "zone" => "required",
            "event_id" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        else{
            $booking->update($validator->validated());
            return response()->json(['message' =>"success",'data' =>$booking],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return response()->json(["success"=>true, "data"=>$booking], 200);
    }
}
