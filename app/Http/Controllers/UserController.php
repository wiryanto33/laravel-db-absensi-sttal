<?php

namespace App\Http\Controllers;

use App\Models\Prajurit;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        //search by name, paginate 10
        $users = User::where('name', 'like', '%' . request('name') . '%')
            ->orderby('id', 'desc')
            ->paginate(10);
        return view('pages.admin.index', compact('users'));
    }

    //create
    public function create(){
        return view('pages.admin.create');
    }

    //store
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min: 8',
            'phone'=>'required',
            'role'=>'required'

        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'phone'=>$request->phone,
            'role'=>$request->role
        ]);

        return redirect()->route('users.index')->with('success', 'Admin Created Successfully');

    }

    // edit
    public function edit(User $user){
        return view('pages.admin.edit', compact('user'));
    }

    //update
    public function update(Request $request, User $user){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'role'=>'required'

        ]);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role'=>$request->role
        ]);

        if($request->password){
            $user->update([
                'user'=>Hash::make($request->password)
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Admin Edit Success');
    }

    //destroy
    public function destroy(User $user){
        $user->delete();
         return redirect()->route('users.index')->with('success', 'Admin Delete Success');
    }
}
