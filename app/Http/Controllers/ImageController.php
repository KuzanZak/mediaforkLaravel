<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            "dashboard-image",
            [
                'images' => Image::all(),
                'admin' => Auth::user()->admin
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            "dashboard-image-form",
            [
                "action" => route('dashboard/image/add'),
                "hidden" => "",
                "pageJs" => "",
                'alt' => "",
                'edit' => 'add',
                'value' => "Add image"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $image->url = Storage::putFile('portfolio', $request->file('file'));
        $image->alt = $request->alt;
        $image->save();
        return Redirect::route('dashboard/image/create');
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
        $image = Image::find($id);
        return view(
            'dashboard-image-form',
            [
                'images' => Image::all(),
                'admin' => Auth::user()->admin,
                'action' => route('dashboard/image/update', $image->id),
                'alt' => $image->alt,
                'edit' => 'update',
                'image' => asset($image->url),
                "hidden" => "hidden",
                "pageJs" => "servicePortfolioJs",
                'value' => "Update"
            ]
        );
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
        $image = image::find($id);
        $image->alt = $request->alt;
        $imageFile = $request->file('file');
        if (isset($imageFile)) {
            $image->url = Storage::putFile('portfolio', $request->file('file'));
        };
        $image->save();
        return Redirect::route('dashboard/image');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return Redirect::route('dashboard/image');
    }
}
