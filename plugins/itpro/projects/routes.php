<?php

use Illuminate\Http\Request;
use Itpro\Projects\Models\Order;
use Itpro\Projects\Models\Client;
// use Itpro\Projects\Models\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Itpro\Projects\Models\Technology;
use Illuminate\Support\Facades\Validator;

Route::get('/technologies', function(){
    $technologies = Technology::all();
    $technologies->load('technology_icon', 'projects', 'projects.platforms', 'projects.platforms.platform_icon', 'projects.project_icon');
    return $technologies;
});

Route::post('/send-test-request', function(Request $request){
    $orderData = $request->all();
    $validator = Validator::make($request->all(), [
        'client_name'=>'required',
        'description'=>'required',
        'email'=>'required|email',
        'project_id'=>'required|int',
    ]);

    if ( $validator->fails() ) {
        return response()->json([
            "error"=>[
                "code"=>422,
                "message"=>"Validation error",
                "request"=> $orderData,
                "errors"=> $validator->errors()
            ]
        ], 422);
    }
    $client = new Client();
    $client->name = request('client_name');
    $client->email = request('email');
    $client->save();

    $request = new Request();
    $request->description = request('description');
    $request->client_id = $client->id;
    $request->project_id = request('project_id');
    $request->save();

    return response()->json([
        "error"=>[
            "message"=>"Success",
        ]
    ]);
});

Route::post('/send-order', function(Request $request){
    $orderData = $request->all();
    $validator = Validator::make($request->all(), [
        'client_name'=>'required',
        'email'=>'required|email',
        'technology_id'=>'required',
        'project_title'=>'required',
        'file'=>'required|mimes:png,jpeg,docx,pdf',
    ]);

    if ( $validator->fails() ) {
        return response()->json([
            "error"=>[
                "code"=>422,
                "message"=>"Validation error",
                "request"=> $orderData,
                "errors"=> $validator->errors()
            ]
        ], 422);
    }
    $client = new Client();
    $client->name = request('client_name');
    $client->email = request('email');
    $client->save();

    $order = new Order();
    $order->title = request('project_title');
    $order->client_id = $client->id;
    $order->technology_id = request('technology_id');
    $order->file = request()->file('file')->store('files/orders');
    $order->save();

    return response()->json([
        "error"=>[
            "message"=>"Success",
        ]
    ]);
});