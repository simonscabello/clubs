<?php

namespace App\Http\Controllers\API;

use App\State;
use App\Http\Requests\StoreStateController;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{
    public function index(): JsonResponse
    {
        $states = State::with('clubs')->get(); // verificar depois

        return response()->json(['states' => $states]);
    }

    public function store(StoreStateController $request): JsonResponse
    {
        $states = State::create($request->all());

        return response()->json(['states' => $states]);
    }

    public function show(State $state): JsonResponse
    {
        if (!$state){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        $state->load('clubs'); // usar quando nao estiver usando with na model

        return response()->json(['state' => $state]);
    }

    public function update(StoreStateController $request, $id): JsonResponse
    {
        $states = State::find($id);
        $states->update($request->all());

        return response()->json(['states' => $states]);
    }

    public function destroy($id): JsonResponse
    {
        $state = State::find($id);

        if (!$state){
            return response()->json(['state' => 'State not found']);
        }

        $state->delete();

        return response()->json(['state' => 'State deleted']);
    }
}
