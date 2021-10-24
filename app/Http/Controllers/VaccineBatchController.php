<?php

namespace App\Http\Controllers;

use App\Models\VaccineBatch;
use App\Models\VaccineType;
use Illuminate\Http\Request;

class VaccineBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine_batches = VaccineBatch::all();
        return view('pages.vaccine-batches', compact('vaccine_batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaccine_types = VaccineType::all(['id', 'name', 'manufactured_country']);
        return view('pages.add-vaccine-batch', compact('vaccine_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'batch_no' => 'bail|required|alpha_dash|max:100',
            'vaccine_id' => 'bail|required|exists:vaccine_types,id',
            'manufactured_date' => 'bail|required|date|before:today',
            'expiration_date' => 'bail|required|date|after:today',
            'quantity' => 'bail|required|numeric',
        ]);

        $vaccine = VaccineType::find($request->vaccine_id);

        try {
            $batch = new VaccineBatch();
            $batch->batch_no = $request->batch_no;
            $batch->vaccine_id = $request->vaccine_id;
            $batch->vaccine_type = $vaccine->name . ' (' . $vaccine->manufactured_country . ')';
            $batch->manufactured_date = $request->manufactured_date;
            $batch->expiration_date = $request->expiration_date;
            $batch->initial_quantity = $request->quantity;
            $batch->current_quantity = $request->quantity;
            $batch->save();
            return back()->with('success', 'Vaccine batch added successfully!');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccineBatch  $vaccineBatch
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineBatch $vaccineBatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccineBatch  $vaccineBatch
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccineBatch $vaccineBatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccineBatch  $vaccineBatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccineBatch $vaccineBatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccineBatch  $vaccineBatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccineBatch $vaccineBatch)
    {
        try {
            $vaccineBatch->delete();
            return back()->with('success', 'Vaccine Type deleted!')->with('id', $vaccineBatch->id);
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }
}
