<?php

namespace App\Http\Controllers;

use App\Models\Stadia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StadiaController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadias = Stadia::all();
        if (count($stadias)==0){
            return response()->json(["message"=>"no data in database"], 200);
        }
        return response()->json(["message"=>"request successfully","data"=>$stadias], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "address" => "required",
            "zone_a" => "required",
            "zone_b" => "required",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors" => $validator->errors()
            ], 400);;
        }
        else{
            $stadia = Stadia::create($validator->validated());
            return Response()->json(["message"=>"post has been created", "data"=>$stadia], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stadia = Stadia::find($id);
        if(count($stadia) == 0){
            return response()->json(['massege'=>'No data in database'],200);
        };
        return response()->json(['massege'=>'success','data'=>$stadia],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stadia = Stadia::find($id);
        $validator = Validator::make($request->all(),[
            "address" => "required",
            "zone_a" => "required",
            "zone_b" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        else{
            $stadia->update($validator->validated());
            return response()->json(['message' =>"success",'data' =>$stadia],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stadia = Stadia::find($id);
        $stadia->delete();
        return response()->json(["success"=>true, "data"=>$stadia], 200);
    }
}
