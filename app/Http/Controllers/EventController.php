<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        if (count($events)==0){
            return response()->json(["message"=>"no data in database"], 400);
        }
        return response()->json(["message"=>"request successfully","data"=>$events], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "description" => "required",
            "date" => "required",
            "stadia_id" => "required",
            "sport_id" => "required",
        ]);
        if($validator->fails()){
            return response()->json([
                "errors" => $validator->errors()
            ], 400);
        }
        else{
            $event = Event::create($validator->validated());
            return Response()->json(["message"=>"post has been created", "data"=>$event], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        if(count($event) == 0){
            return response()->json(['massege'=>'No data in database'],400);
        };
        return response()->json(['massege'=>'success','data'=>$event],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "description" => "required",
            "date" => "required",
            "stadia_id" => "required",
            "sport_id" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        else{
            $event->update($validator->validated());
            return response()->json(['message' =>"success",'data' =>$event],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(["success"=>true, "data"=>$event], 200);
    }
    public function search(string $keyword)
    {
        $event = Event::leftJoin('matchings', 'matchings.event_id','=', 'events.id')
                        ->leftJoin('sports', 'sports.id', '=', 'events.sport_id')
                        ->where('sports.name', 'like', '%'.$keyword.'%')
                        ->get();
        return response()->json(["success"=>true, "data"=>$event], 200);
    }
    public function getEventDetail($id)
    {
        $event = Event::leftJoin('matchings', 'matchings.event_id','=', 'events.id')
                        ->leftJoin('sports', 'sports.id', '=', 'events.sport_id')
                        ->leftJoin('stadias', 'stadias.id', '=', 'events.stadia_id')
                        ->select('sports.name', 'matchings.team1', 'matchings.team2'
                                , 'events.date', 'matchings.time', 'events.description'
                                , 'stadias.address', 'stadias.zone_a', 'stadias.zone_b')
                        ->where('events.id', $id)
                        ->get();
        return response()->json(["success"=>true, "data"=>$event], 200);
    }
}
