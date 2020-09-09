<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::all();
        return view('user.admin.index', compact('user'));
    }

    public function admin()
    {
        return User::all()->WHERE('tipe_user', '=', 'admin');
    }

    public function viewPenjual()
    {
        $user= User::all();
        return view('user.penjual.index', compact('user'));
    }
    public function penjual()
    {
        return User::all()->WHERE('tipe_user', '=', 'penjual');
    }

    public function viewPembeli()
    {
        $user= User::all();
        return view('user.pembeli.index', compact('user'));
    }
    public function pembeli()
    {
        return User::all()->WHERE('tipe_user', '=', 'pembeli');
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
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users,username,',
            'tipe_user' => 'required',
            'profil' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|nullable|min:5',
        ]);
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        return User::create($input);
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
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users,username,',
            'tipe_user' => 'required',
            'profil' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|nullable|min:5',
        ]);
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        return $user->update($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $user->delete();
    }
}
