<?php

namespace App\Http\Controllers;

use App\Models\Thana;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\verifyExceptionExpectations;

class UpazillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upazillas=Upazilla::all();
       return view('admin.upazilla.index',compact('upazillas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $thanas=Thana::where('status',1)->get();
        return view('admin.upazilla.create',compact('thanas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->thana_id == "null"){

            return redirect()->back()->with('error_message', 'please select thana name');
        }
           $upazilla =new Upazilla();
           $upazilla->thana_id=$request->thana_id;
           $upazilla->name=$request->name;
           $upazilla->slug=str::slug($upazilla->name,'-');
           $upazilla->save();

           return redirect()->back()->with('message','upazilla create successfully');

    }

    /**
     * Display the specified resource.
     */
    public function changeStatus(Upazilla $upazilla)
    {
        $upazilla->status =! $upazilla->status;
        $upazilla->save();
        return redirect()->back()->with('message','status change successfully');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upazilla $upazilla)
    {
        $thanas = Thana::all();
        return view('admin.upazilla.edit', compact( 'upazilla','thanas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upazilla $upazilla)
    {
        $update = $upazilla->update([
            'name' => $request->name,
            'thana' => $request->name,
            'slug' => Str::slug($request->name, '_'),
        ]);
        if($update){
            return redirect('upazilla')->with('massege','successfully upadate');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upazilla $upazilla)
    {
        $delete= $upazilla->delete();
        if ( $delete){
            return redirect()->back()->with('message','successdully dete');
        }

    }
}
