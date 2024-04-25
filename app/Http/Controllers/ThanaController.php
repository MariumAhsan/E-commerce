<?php

namespace App\Http\Controllers;

use App\Models\Thana;
use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts= District::all();
        $divisions= Division::all();
       
        return view('pages.add-thana', compact('districts'), compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'district_id'=> 'required',
        
        ]);
        //dd($request->input('district_id'));
        // Create Districts
        $thanas = Thana::create([            //using create already saves the data into the DB
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'district_id'=> ($request->input('district_id')),
           
        ]);
        
        return redirect()->back()->with([
            'message' => 'New thana added.',
            'alert-type' => 'success'
        ]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Thana $thana)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thana $thana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thana $thana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thana $thana)
    {
        //
    }
}
