<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.add-division');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $request->validate([
            'name' => 'required',
        
        ]);
    
        // Create Division
        $division = Division::create([            //using create already saves the data into the DB
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
           
        ]);
        
        return redirect()->back();
    }

    public function try(){

        return view('/userProfile');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        
        ]);
    
        // Create Division
        $division = Division::create([            //using create already saves the data into the DB
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
           
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        //
    }
}
