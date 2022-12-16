<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::with(['district.city.state', 'pictures'])->paginate($request->get('per_page', 1));

        return response()->json(PropertyResource::collection($properties));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $data = $request->validated();

        $property = Property::create($data);
        //$property->pictures()->sync($data['pictures']);

        $property->load(['district.city.state', 'pictures']);

        return response()->json(
            new PropertyResource($property),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $property->load(['district.city.state', 'pictures']);

        return response()->json(new PropertyResource($property));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();

        $property->update($data);
        //$property->pictures()->sync($data['pictures']);

        $property->load(['district.city.state', 'pictures']);

        return response()->json(
            new PropertyResource($property)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete (Property $property)
    {
        $property->forceDelete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
