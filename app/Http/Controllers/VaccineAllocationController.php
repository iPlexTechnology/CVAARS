<?php

namespace App\Http\Controllers;

use App\Models\VaccineAllocation;
use App\Models\VaccineBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class VaccineAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccine_allocations = VaccineAllocation::with(['getVaccineBatch', 'getVaccinationCenter'])->paginate(50);
        return view('pages.allocated-vaccines', compact('vaccine_allocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless((Gate::any(['ad', 'hm'])), 404);
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
        abort_unless((Gate::any(['ad', 'hm'])), 404);
        $request->validate([
            'vaccine_id' => 'bail|required|exists:vaccine_types,id',
            'batch_id' => 'bail|required|exists:vaccine_batches,id',
            'center_id' => 'bail|required|exists:vaccination_centers,id',
            'available_qty' => 'bail|numeric|required|min:1',
            'allocated_qty' => 'bail|numeric|required|lte:available_qty',
        ]);

        DB::beginTransaction();

        try {
            $data = new VaccineAllocation();
            $data->dose_batch_id = $request->batch_id;
            $data->vaccination_center_id = $request->center_id;
            $data->allocated_quantity = $request->allocated_qty;
            $data->remaining_quantity = $request->allocated_qty;
            $data->save();


            $batch = VaccineBatch::find($request->batch_id);
            $batch->current_quantity = $batch->current_quantity - $request->allocated_qty;
            $batch->save();


            DB::commit();
            return back()->with('success', 'Vaccine allocated successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withErrors($th->getMessage());
        }

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
