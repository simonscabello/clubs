<?php

namespace App\Http\Controllers\API;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{
    public function index(): JsonResponse
    {
        $states = State::all();

        return response()->json(['states' => $states]);
    }

    public function store(Request $request): JsonResponse
    {
        $states = State::create($request->all());

        return response()->json(['states' => $states]);
    }

    public function show(State $state): JsonResponse
    {
        return response()->json(['state' => $state]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $states = State::find($id);
        $states->update($request->all());

        return response()->json(['states' => $states]);
    }

    public function destroy($id): JsonResponse
    {
        $state = State::find($id);
        if (!$state){
            return response()->json(['state' => 'state not found']);
        }

        $state->delete();

        return response()->json(['state' => 'state-deleted']);
    }
}
