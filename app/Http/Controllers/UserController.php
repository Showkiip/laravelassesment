<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255'
        ]);

        $data = $request->all();
        User::create($data);
        return redirect()->route('dashboard')->with('success','Successfully Create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
         $user = User::find($id);
         $user->update($data);

         return redirect()->route('dashboard')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('dashboard')->with('success','Successfully Deleted');

    }
}
