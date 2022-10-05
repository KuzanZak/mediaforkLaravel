<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            "dashboard-portfolio",
            [
                'portfolios' => Portfolio::all(),
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
            "dashboard-portfolio-form",
            [
                "action" => route('dashboard/portfolio/add'),
                "edit" => 'add',
                "title" => "",
                "hidden" => ""
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
        $portfolio = new Portfolio;
        $portfolio->title = $request->title;
        $portfolio->url = Storage::putFile('portfolio', $request->file('file'));
        $portfolio->save();
        return Redirect::route('dashboard/portfolio');
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
        $portfolio = Portfolio::find($id);
        return view(
            'dashboard-portfolio-form',
            [
                "portfolios" => Portfolio::all(),
                'admin' => Auth::user()->admin,
                "action" => route('dashboard/portfolio/update', $portfolio->id),
                "edit" => 'update',
                "title" => $portfolio->title,
                "image" => asset($portfolio->url),
                "hidden" => "hidden"
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
        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->url = Storage::putFile('portfolio', $request->file('file'));
        $portfolio->save();
        return Redirect::route('dashboard/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return Redirect::route('dashboard/portfolio');
    }
}
