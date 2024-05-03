<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $req = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        $req['password'] = bcrypt($req['password']);

        $user = User::create($req);

        if($user){
            return redirect()->route('users');
        }
        return back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->has('password') && $request->password !== null) {
            $password = bcrypt($request->password); 
        } else {
            $password = $user->password; // Keep the existing password
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
    }
}
