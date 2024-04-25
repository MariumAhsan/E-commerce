<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
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
        
    }
    public function view(){
    
        return view('/userProfile');
    }
    public function add_details(Request $request, $user_id){
        
        $user = User::findOrFail(auth()->user()->id);
        $user->address = $request->input('address');
        $user->division_id = $request->input('division_id');
        $user->district_id = $request->input('district_id');
        $user->thana_id = $request->input('thana_id');
        $user->phone_number = $request->input('phone_number');

        $user->post_code = $request->input('post_code');
    
        $user->save();
    
        return redirect()->back()->with([
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success'
        ]);;

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
        
        return redirect()->back()->with([
            'message' => 'New division added.',
            'alert-type' => 'success'
        ]);;
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
