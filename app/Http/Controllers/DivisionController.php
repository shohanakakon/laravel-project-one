<?php

namespace App\Http\Controllers;
use App\Models\Division;
use Illuminate\Http\Request;use function Brick\Math\dividedBy;
use function Symfony\Component\Mime\Header\all;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions= Division::all();
        return view('admin.division.index',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {


          $division=new division;
          $division->id= $request->division;
          $division->name= $request->name;
          $division->slug = Str::slug($request->name , '_');
          $division->save();
          return redirect()->back()->with('message','division successfully create');

    }

    /**
     * Display the specified resource.
     */
    public function changeStatus(Division $division)
    {
        $division->status =! $division->status;
        $division->save();
//
            return redirect()->back()->with('message','status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('admin.division.edit',compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $update=$division->update([
            'name'=>$request->name,
            'slug' => Str::slug($request->name, '_'),

        ]);
        if($update){
            return redirect('division')->with('message','update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $delete=$division->delete();
        if($delete){
            return redirect()->back()->with('message','delete successfully');
        }
    }


}
