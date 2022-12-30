<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class ClienteController extends Controller
{
    public function index()
    {
        return new ClienteCollection(Cliente::all());
    }

    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    public function update(StoreClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        return response()->json(["Cliente atualizado com sucesso"]);
    }

    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validated());
        return response()->json(["Cliente cadastrado com sucesso"]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(["Cliente deletado com sucesso"]);
    }
}
