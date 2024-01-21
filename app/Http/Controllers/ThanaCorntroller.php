<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ThanaCorntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $thanas = Thana::all();
        return view('admin.thana.index', compact('thanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts=District::where('status',1)->get();
        return view('admin.thana.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->dic_id == "null"){

            return redirect()->back()->with('error_message', 'please select district name');
        }


        $thana = new Thana();
        $thana->dic_id=$request->dic_id;
        $thana->name = $request->name;
        $thana->slug = Str::slug( $thana->name, '_');
        $thana->save();
        return redirect()->back()->with('message', 'THANA successfully create');

    }

    /**
     * Display the specified resource.
     */
    public function changeStatus(Thana $thana)
    {
        $thana->status =! $thana->status;
        $thana->save();
//
        return redirect()->back()->with('message', 'status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thana $thana)
    {
        $districts = District::all();
        return view('admin.thana.edit', compact( 'districts','thana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thana $thana)
    {
        $update = $thana->update([
            'name' => $request->name,
            'district' => $request->name,
            'slug' => Str::slug($request->name, '_'),


        ]);

        if ($update) {
            return redirect('thana')->with('message', 'update successfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thana $thana)
    {
        $delete =  $thana->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'delete successfully');
        }
    }
}
