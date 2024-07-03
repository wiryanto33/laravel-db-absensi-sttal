<?php

namespace App\Http\Controllers;

use App\Models\Prajurit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrajurirtController extends Controller
{
    //index
    public function index()
    {

        //search by name, paginate 10
        $prajurits = Prajurit::where('name', 'like', '%' . request('name') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.users.index', compact('prajurits'));
    }

    //create
    public function create()
    {
        return view('pages.users.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'name' => 'required',
            'pangkat' => 'required',
            'korps' => 'required',
            'password' => 'required|min:8',
            'email' => 'required'
        ]);

        Prajurit::create([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'pangkat' => $request->pangkat,
            'korps' => $request->korps,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'satuan' => $request->satuan
        ]);

        return redirect()->route('prajurits.index')->with('success', 'Prajurit Created Successfully');
    }

    // edit

    public function edit(Prajurit $prajurit){
        return view('pages.users.edit', compact('prajurit'));
    }

    // update
    public function update(Request $request, Prajurit $prajurit){
        $request->validate([
            'name' => 'required',
            'pangkat' => 'required',
            'korps' => 'required',
            'email' => 'required'
        ]);

        $prajurit->update([
            'nrp' => $request->nrp,
            'name' => $request->name,
            'pangkat' => $request->pangkat,
            'korps' => $request->korps,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'satuan' => $request->satuan
        ]);

        // if password field

        if($request->password){
            $prajurit->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect()->route('prajurits.index')->with('success', 'Prajurit Update Successfull');
    }

    // destroy
    public function destroy(Prajurit $prajurit){

        $prajurit->delete();
        return redirect()->route('prajurits.index')->with('success', 'Prajurit Delete Successfull');
    }
}
