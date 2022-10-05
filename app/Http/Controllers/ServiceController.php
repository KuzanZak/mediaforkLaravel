<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            "dashboard-service",
            [
                'services' => Service::all(),
                'admin' =>  Auth::user()->admin
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
            "dashboard-service-form",
            [
                'services' => Service::all(),
                'admin' =>  Auth::user()->admin,
                'action' => route('dashboard/service/add'),
                'title' => "",
                'paragraph' => "",
                'alt' => "",
                'edit' => "add",
                'hidden' => "",
                'pageJs' => ""
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
        $service = new Service();
        $service->title = $request->title;
        $service->url = Storage::putFile('service', $request->file('file'));
        $service->description = $request->paragraph;
        $service->Alt = $request->alt;
        $service->save();
        return Redirect::route('dashboard/service');
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
        $service = Service::find($id);
        return view(
            'dashboard-service-form',
            [
                'services' => Service::all(),
                'admin' => Auth::user()->admin,
                'action' => route('dashboard/service/update', $service->id),
                'title' => $service->title,
                'paragraph' => $service->description,
                'alt' => $service->Alt,
                'edit' => 'update',
                'image' => asset($service->url),
                'hidden' => "hidden",
                'pageJs' => "servicePortfolioJs"
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
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->paragraph;
        $service->url = Storage::putFile('service', $request->file('file'));
        $service->Alt = $request->alt;
        $service->save();
        return Redirect::route('dashboard/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyService($id)
    {
        $service = Service::find($id);
        $service->delete();
        return Redirect::route('dashboard/service');
    }
}
