<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
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
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required|string|max:255',
            'desc' => 'required',
            'website_id' => ['required', 'exists:website,id'],

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try {

            Post::create($request->all());
            return response()->json(['success' => 'post created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    /**
     * Store a newly subscribed website by user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function website(Request $request)
    {

        $validator = validator($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'website_id' => ['required', 'exists:website,id'],

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        try {

            $isAlreadySub = subscription::where('website_id',$request->website_id)->where('user_id',$request->user_id)->get()->count();
            if($isAlreadySub > 0){
                return response()->json(['error' => 'Website already Subscribed by user'], 201);
            }
            subscription::create($request->all());
            return response()->json(['success' => 'Website Subscribed successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


}
