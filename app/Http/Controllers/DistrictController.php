<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Illuminate\Process\input;
use function PHPUnit\Runner\validate;
use function Symfony\Component\String\Slugger\slug;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $divisions = Division::where(colum name,condition,searching value)->get();
        $divisions = Division::where('status',1)->get();

        return view('admin.district.create', compact('divisions'));



    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//       dd($request->all());
        if($request->div_id == "null"){

            return redirect()->back()->with('error_message', 'please select division name');
        }


        $district = new District();
        $district->div_id = $request->div_id;
        $district->name = $request->name;
        $district->slug = Str::slug($district->name, '_');
        $district->save();
        return redirect()->back()->with('message', 'district successfully create');



    }

    /**
     * Display the specified resource.
     */
    public function changeStatus(District $district)
    {
        $district->status =! $district->status;
        $district->save();

        return redirect()->back()->with('message', 'status change successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        $divisions = Division::all();
        return view('admin.district.edit', compact('divisions', 'district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {

        $update = $district->update([
            'name' => $request->name,
            'division' => $request->name,
            'slug' => Str::slug($request->name, '_'),


        ]);

        if ($update) {
            return redirect('district')->with('message', 'update successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $delete = $district->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'delete successfully');
        }

    }

}
