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
    public function buscarLatitudeLongitude($data)
    {
        $endpoint = "https://maps.googleapis.com/maps/api/geocode/json";
        $client = new \GuzzleHttp\Client();

        $response = $client->get($endpoint, ['query' => [
            'address' => "{$data['logradouro']}, {$data['numero']} - {$data['bairro']}, {$data['cidade']}, {$data['estado']}, {$data['cep']}",
            'key' => env("GOOGLE_API_KEY"),
        ]]);

        $content = json_decode($response->getBody(), true);

        $location = $content['results'][0]['geometry']['location'];

        return ['latitude' => $location['lat'], 'longitude' => $location['lng']];
    }

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
        $data = $request->validated();
        $localizacao = $this->buscarLatitudeLongitude($data);
        $newData = array_merge($data, $localizacao);

        $endereco->update($newData);
        return response()->json(["Endereço atualizado com sucesso"]);
    }

    public function store(StoreEnderecoRequest $request)
    {
        $data = $request->validated();
        $localizacao = $this->buscarLatitudeLongitude($data);
        $newData = array_merge($data, $localizacao);

        Endereco::create($newData);
        return response()->json(["Endereço cadastrado com sucesso"]);
    }

    public function destroy(Endereco $endereco)
    {
        $endereco->delete();
        return response()->json(["Endereço deletado com sucesso"]);
    }
}
