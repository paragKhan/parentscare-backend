<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaregiverAppointmentRequest;
use App\Models\CareGiverService;
use App\Http\Requests\StoreCareGiverServiceRequest;
use App\Http\Requests\UpdateCareGiverServiceRequest;
use Illuminate\Support\Str;

class CareGiverServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = CareGiverService::paginate(20);

        return response($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCareGiverServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareGiverServiceRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $service = CareGiverService::create($validated);

        return response()->json($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CareGiverService  $careGiverService
     * @return \Illuminate\Http\Response
     */
    public function show(CareGiverService $careGiverService)
    {
        return response()->json($careGiverService);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCareGiverServiceRequest  $request
     * @param  \App\Models\CareGiverService  $careGiverService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareGiverServiceRequest $request, CareGiverService $careGiverService)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['name']);

        $careGiverService->update($validated);

        return response()->json($careGiverService);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareGiverService  $careGiverService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareGiverService $careGiverService)
    {
        $careGiverService->delete();

        return response()->json(['message'=>'Care giver service deleted.']);
    }
}
