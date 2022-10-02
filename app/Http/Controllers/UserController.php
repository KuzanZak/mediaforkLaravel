<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->admin !== 1) return Redirect::route('dashboard/customers');
        return view(
            "dashboard-user",
            [
                'users' => User::all()
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
        //
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

    public function updateAdmin(int $iduser)
    {
        $user = User::find($iduser);
        $user->admin = 1;
        $user->save();
        return Redirect::route('dashboard');
    }

    public function updateUser(int $iduser)
    {
        $user = User::find($iduser);
        $user->admin = 0;
        $user->save();
        return Redirect::route('dashboard');
    }

    public function deleteUser(int $iduser)
    {
        if (empty($iduser) && !is_int($iduser)) return Redirect::route('dashboard/customers');
        $user = User::find($iduser);
        $user->delete();
        return Redirect::route('dashboard');
    }
}
