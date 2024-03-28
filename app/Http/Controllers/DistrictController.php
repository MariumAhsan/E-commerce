<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('pages.add-division');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions= Division::all();
        return view('pages.add-district', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division_id'=> 'required',
        
        ]);
        
        // Create Districts
        $district = District::create([            //using create already saves the data into the DB
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'division_id'=> $request->input('division_id'),
           
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
}
