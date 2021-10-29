<?php

namespace App\Http\Controllers;

use App\Models\VaccineBatch;
use App\Models\VaccineType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VaccineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = VaccineType::all();
        return view('pages.vaccines', compact('vaccines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless((Gate::any(['ad', 'hm'])), 404);
        return view('pages.add-vaccine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless((Gate::any(['ad', 'hm'])), 404);
        $request->validate([
            'vaccine_name' => 'bail|required|string|max:100',
            'manufactured_country' => 'bail|required|string|max:100',
            'technology' => 'bail|required|string|max:100',
            'next_dose_duration_in_weeks' => 'bail|required|string|max:2',
        ]);

        try {
            $vaccine = new VaccineType();
            $vaccine->name = $request->vaccine_name;
            $vaccine->manufactured_country = $request->manufactured_country;
            $vaccine->technology = $request->technology;
            $vaccine->next_dose_duration_in_weeks = $request->next_dose_duration_in_weeks;
            $vaccine->save();
            return back()->with('success', 'Vaccine Type added successfully!');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineType $vaccineType)
    {
        $batches = VaccineBatch::where('vaccine_id', $vaccineType->id)->get();

        $total = 0;
        $remain = 0;

        foreach ($batches as $key => $batch) {
            $total += $batch->initial_quantity;
            $remain += $batch->current_quantity;
        }

        // dd($batches);
        return view('pages.show-vaccine', compact('vaccineType', 'total', 'remain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccineType $vaccineType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccineType $vaccineType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccineType $vaccineType)
    {
        try {
            $vaccineType->delete();
            return back()->with('success', 'Vaccine Type deleted!')->with('id', $vaccineType->id);
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }
}
