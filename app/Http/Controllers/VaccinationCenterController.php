<?php

namespace App\Http\Controllers;

use App\Models\GramaNiladhariDivision;
use App\Models\MohDivision;
use App\Models\VaccinationCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VaccinationCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = VaccinationCenter::with('getMOHArea', 'getRemainingVaccine')->paginate(50);
        // dd($centers);
        return view('pages.vaccination-centers', compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless((Gate::any(['ad', 'hm'])), 404);
        $moh_areas = MohDivision::orderBy('moh_division')->get();
        $grama_niladhari_areas = GramaNiladhariDivision::orderBy('grama_niladhari_division')->get();
        return view('pages.vaccination-center-add', compact('moh_areas', 'grama_niladhari_areas'));
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
        $center = $request->validate([
            'moh_division_id' => 'bail|required|exists:moh_divisions,id',
            'grama_niladhari_division_id' => 'bail|required|exists:grama_niladhari_divisions,id',
            'center_name' => 'bail|required|string|max:50',
            'head_person' => 'bail|required|string|max:100',
        ]);

        try {
            $data = new VaccinationCenter();
            $data->moh_division_id = $request->moh_division_id;
            $data->grama_niladhari_division_id = $request->grama_niladhari_division_id;
            $data->center_name = $request->center_name;
            $data->head_person = $request->head_person;
            $data->save();
            return back()->with('success', 'vaccination center added successfully!');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccinationCenter = VaccinationCenter::find($id)->with('getRemainingVaccine')->first();
        // dd($vaccinationCenter);
        return view('pages.show-vaccine-center', compact('vaccinationCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccinationCenter $vaccinationCenter)
    {
        //
    }
}
