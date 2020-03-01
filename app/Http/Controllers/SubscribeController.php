<?php

namespace App\Http\Controllers;

use App\Channel;
use DB;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts =  Post::orderBy('title','desc')->take(1)->get();
        $shops =  Channel::orderBy('created_at','desc')->get();
        //posts= POST::all();
        //$posts = DB::select('SELECT * FROM posts');
        return view('shops.index')->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
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
         $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
            //'cover_image' =>"image|nullable|max:1999"
            'price' => 'required'

        ]);

        //handle file upload

        /*if($request->hasFile('cover_image')){
            // get file name with extension

            //$fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name

            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            

            //create file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;


            //upload image
            $path = $request->File('cover_image')->storeAs('public/cover_images',$fileNameToStore);


        }else{
            $fileNameToStore = 'noimage.jpg';
        }*/
        //create psot

        $shop = new Channel;
        $shop->title = $request->input('title');
        $post->body = $request->input('body');
        $post->price = $request->input('price');
        $post->save();

        return redirect('/shops')->with('success', 'Item Created');
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
