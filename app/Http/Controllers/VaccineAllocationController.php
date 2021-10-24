<?php

namespace App\Http\Controllers;

use App\Models\VaccineAllocation;
use Illuminate\Http\Request;

class VaccineAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.allocated-vaccines');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.allocated-vaccines-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccineAllocation  $vaccineAllocation
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineAllocation $vaccineAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccineAllocation  $vaccineAllocation
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccineAllocation $vaccineAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccineAllocation  $vaccineAllocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccineAllocation $vaccineAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccineAllocation  $vaccineAllocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccineAllocation $vaccineAllocation)
    {
        //
    }
}
