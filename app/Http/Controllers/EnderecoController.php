<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Resources\EnderecoCollection;
use App\Http\Resources\EnderecoResource;
use App\Models\Endereco;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        return new EnderecoCollection(Endereco::all());
    }

    public function show(Endereco $endereco)
    {
        return new EnderecoResource($endereco);
    }

    public function update(StoreEnderecoRequest $request, Endereco $endereco)
    {
        $endereco->update($request->validated());
        return response()->json(["Endereço atualizado com sucesso"]);
    }

    public function store(StoreEnderecoRequest $request)
    {
        Endereco::create($request->validated());
        return response()->json(["Endereço cadastrado com sucesso"]);
    }

    public function destroy(Endereco $endereco)
    {
        $endereco->delete();
        return response()->json(["Endereço deletado com sucesso"]);
    }
}
