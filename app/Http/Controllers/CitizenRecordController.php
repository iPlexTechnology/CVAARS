<?php

namespace App\Http\Controllers;

use App\Models\CitizenRecord;
use Illuminate\Http\Request;

class CitizenRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registration_form_auth = true;

        return view('welcome', compact('registration_form_auth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CitizenRecord  $citizenRecord
     * @return \Illuminate\Http\Response
     */
    public function show(CitizenRecord $citizenRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CitizenRecord  $citizenRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(CitizenRecord $citizenRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CitizenRecord  $citizenRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CitizenRecord $citizenRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CitizenRecord  $citizenRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(CitizenRecord $citizenRecord)
    {
        //
    }
}
