<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $districts = District::with(['city', 'properties.pictures'])->paginate($request->get('per_page', 1));

        return response()->json(DistrictResource::collection($districts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        $district = District::create($request->validated());
        $district->load(['city', 'properties.pictures']);

        return response()->json(
            new DistrictResource($district),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        $district->load(['city', 'properties.pictures']);

        return response()->json(new DistrictResource($district));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, District $district)
    {
        $district->update($request->validated());
        $district->load(['city', 'properties.pictures']);

        return response()->json(new DistrictResource($district));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $district->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
