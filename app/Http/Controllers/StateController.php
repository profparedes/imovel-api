<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateRequest $request)
    {
        $query = State::query();
        $query->with('cities.districts.properties.pictures');

        $states = $query->orderBy(
            $request->get('order_by', 'id'),
            $request->get('order_direction', 'desc')
        )->paginate($request->get('per_page', 1));

        return response()->json(StateResource::collection($states));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        $state = State::create($request->all());
        $state->load('cities.districts.properties.pictures');

        return response()->json(
            new StateResource($state),
            Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        $state->load('cities.districts.properties.pictures');

        return response()->json(new StateResource($state));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, State $state)
    {
        $state->update($request->all());
        $state->load('cities.districts.properties.pictures');

        return response()->json(
            new StateResource($state)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
