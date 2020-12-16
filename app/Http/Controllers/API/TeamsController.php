<?php

namespace App\Http\Controllers\API;

use App\Teams;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamsController;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Teams::all();

        return response()->json(['teams' => $teams]);
    }

    public function store(StoreTeamsController $request): JsonResponse
    {
        $teams = Teams::create($request->all());

        return response()->json(['team' => $teams]);
    }

    public function show($id): JsonResponse
    {
        $teams = Teams::find($id);
        if (!$teams){
            return response()->json(['message' => 'Usuario não encontrado']);
        }

        return response()->json(['team' => $teams]);
    }

    public function update(StoreTeamsController $request, $id): JsonResponse
    {
        $teams = Teams::find($id);
        if (!$teams){
            return response()->json(['message' => 'Time não encontrado']);
        }

        $teams->update($request->all());

        return response()->json(['team' => $teams]);
    }

    public function destroy($id): JsonResponse
    {
        $teams = Teams::find($id);
        if (!$teams){
            return response()->json(['message' => 'Time não encontrado']);
        }

        $teams->delete();

        return response()->json(['message' => 'Time deletado com sucesso']);
    }
}
