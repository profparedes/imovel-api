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
    public function index(PropertyRequest $request)
    {

        $query = Property::query();
        $query->with(['district.city.state', 'pictures']);

        if ($request->is_rent === '1'){
            $query->where('is_rent', 1);
        }

        if ($request->is_sale === '1'){
            $query->where('is_sale', 1);
        }

        if ($request->is_featured_rent === '1'){
            $query->where('is_featured_rent', 1);
        }

        if ($request->is_featured_sale === '1'){
            $query->where('is_featured_sale', 1);
        }

        if ($request->is_furnished === '1'){
            $query->where('is_furnished', 1);
        }

        if ($request->is_pet_friendly === '1'){
            $query->where('is_pet_friendly', 1);
        }

        if ($request->has_party_hall === '1'){
            $query->where('has_party_hall', 1);
        }

        if ($request->has_playground === '1'){
            $query->where('has_playground', 1);
        }

        if ($request->has_square === '1'){
            $query->where('has_square', 1);
        }

        if ($request->has_gym === '1'){
            $query->where('has_gym', 1);
        }

        if ($request->has_pool === '1'){
            $query->where('has_pool', 1);
        }

        if ($request->district_id){
            $query->whereIn('district_id', $request->district_id);
        }

        if ($request->city_id || $request->state_id){
            $query->whereHas('district', function ($q) use ($request){
                if ($request->city_id) {
                    $q->where('city_id', $request->city_id);
                }

                if ($request->state_id) {
                    $q->whereHas('city', function ($city) use ($request){
                        $city->where('state_id', $request->state_id);
                    });
                }
            });
        }

        if ($request->search){
            $query->where(function ($q) use ($request){
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('type', 'like', "%{$request->search}%")
                  ->orWhere('address', 'like', "%{$request->search}%");
            }); //a query deve ser agrupada para que as funcoes de orWhere nao cancele chamadas anteriores
        }

        if ($request->min_value){
            $query->where(function ($q) use ($request){
                $q->where('rent_value', '>=', $request->min_value)
                  ->orWhere('sale_value', '>=', $request->min_value);
            });
        }

        if ($request->max_value){
            $query->where(function ($q) use ($request){
                $q->where('rent_value', '<=', $request->max_value)
                  ->orWhere('sale_value', '<=', $request->max_value);
            });
        }

        $properties = $query->orderBy(
            $request->get('order_by', 'id'),
            $request->get('order_direction', 'desc')
        )->paginate($request->get('per_page', 1));

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
