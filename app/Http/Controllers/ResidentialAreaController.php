<?php

namespace App\Http\Controllers;

use App\Imports\NicImport;
use App\Models\GramaNiladhariDivision;
use App\Models\MohDivision;
use App\Models\ResidentialArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResidentialAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residential_areas = ResidentialArea::all();
        return view('pages.residential-areas', compact('residential_areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless((Gate::any(['ad', 'gsn'])), 404);
        $moh_areas = MohDivision::orderBy('moh_division')->get();
        $grama_niladhari_divisions = GramaNiladhariDivision::orderBy('grama_niladhari_division')->get();
        return view('pages.residential-area-add', compact('grama_niladhari_divisions', 'moh_areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless((Gate::any(['ad', 'gsn'])), 404);
        $request->validate([
            'moh_division_id' => 'bail|required|exists:moh_divisions,id',
            'grama_niladhari_divisions_id' => 'bail|required|exists:grama_niladhari_divisions,id',
            'nic_list' => 'required|mimes:xlsx|max:5120',
        ]);

        $file = $request->file('nic_list');
        $nic_list = (new NicImport)->toArray($file);
        $nic_list = $nic_list[0];
        // dd($nic_list);
        $count = count($nic_list) - 1;

        for ($i = 0; $i < count($nic_list) - 1; $i++) {
            // $nic_list[$i]->validate([
            //     'nic_number' => 'bail|required|ends_with:v,V,x,X|min:10|max:12|alpha_num'
            // ]);
            $nic = $nic_list[$i]['nic_number'];
            if (strlen($nic) < 10 and strlen($nic) > 12) return back()->withErrors('This sheets has too short or too long NIC numbers');
            if (substr($nic, -1) != 'V' and substr($nic, -1) != 'X') return back()->withErrors($i . ' NIC numbers must ends with V or X');
        }

        for ($i = 0; $i < count($nic_list) - 1; $i++) {
            try {
                $data = new ResidentialArea();
                $data->grama_niladhari_division_id = $request->grama_niladhari_divisions_id;
                $data->moh_division_id = $request->moh_division_id;
                $data->name = $nic_list[$i]['name'];
                $data->nic = $nic_list[$i]['nic_number'];
                $data->save();
            } catch (\Throwable $th) {
                $count--;
            }
        }

        if ($count == 0) return back()->withErrors('No new data to add!');

        return back()->with('success', $count . ' new people\'s records were added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidentialArea  $residentialArea
     * @return \Illuminate\Http\Response
     */
    public function show(ResidentialArea $residentialArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResidentialArea  $residentialArea
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidentialArea $residentialArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResidentialArea  $residentialArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResidentialArea $residentialArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidentialArea  $residentialArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidentialArea $residentialArea)
    {
        //
    }
}
