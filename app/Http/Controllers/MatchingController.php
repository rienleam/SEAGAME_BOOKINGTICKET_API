<?php

namespace App\Http\Controllers;

use App\Models\Matching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matchings = Matching::all();
        if (count($matchings)==0){
            return response()->json(["message"=>"no data in database"], 200);
        }
        return response()->json(["message"=>"request successfully","data"=>$matchings], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "team1" => "required",
            "team2" => "required",
            "name" => "required",
            "description" => "required",
            "event_id" => "required",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors" => $validator->errors()
            ], 400);;
        }
        else{
            $sport = Matching::create($validator->validated());
            return Response()->json(["message"=>"post has been created", "data"=>$sport], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sport = Matching::find($id)->post;
        if(count($sport) == 0){
            return response()->json(['massege'=>'No data in database'],200);
        };
        return response()->json(['massege'=>'success','data'=>$sport],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matching = Matching::find($id);
        $validator = Validator::make($request->all(),[
            "team1" => "required",
            "team2" => "required",
            "name" => "required",
            "description" => "required",
            "event_id" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        else{
            $matching->update($validator->validated());
            return response()->json(['message' =>"success",'data' =>$matching],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sport = Matching::find($id);
        $sport->delete();
        return response()->json(["success"=>true, "data"=>$sport], 200);
    }
}
