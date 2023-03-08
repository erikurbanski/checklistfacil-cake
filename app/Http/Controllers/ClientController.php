<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Http\Services\ClientService;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;

class ClientController extends Controller
{

    protected clientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        try {

            $allClients = $this->clientService->allClients();
            return ClientResource::collection($allClients);

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum Cliente encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );

        }
    }

    public function store(ClientRequest $request)
    {
        try {

            $ClientResult = $this->clientService->storeClient($request->validated());

            return response()->json(
                [
                    "success" => true,
                    "data" => ClientResource::make($ClientResult),
                    "message" => "Cliente Cadastrado com Sucesso"
                ],
                Response::HTTP_CREATED
            );

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Não foi possivel salvar Cliente, {$e->getMessage()}"
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function show(int $id)
    {
        try {

            $Client = $this->clientService->findClient($id);

            return response()->json(
                [
                    "success" => true,
                    "data" => ClientResource::make($Client)
                ],
                Response::HTTP_OK
            );

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum Cliente encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );

        }
    }

    public function update(ClientRequest $request, int $id)
    {
        try {

            $Client = $this->clientService->updateClient($request->validated(), $id);

            if (isset($Client)) {

                return response()->json(
                    [
                        "success" => true,
                        "data" => $this->clientService->findClient($id),
                        "message" => "Cliente atualizado com sucesso."
                    ], Response::HTTP_OK
                );

            }

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum Cliente encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_BAD_REQUEST
            );

        }
    }

    public function destroy(int $id)
    {
        try {

            $Client = $this->clientService->destroyClient($id);

            if ($Client != 0) {
                return response()->json(
                    [
                        "success" => true,
                        "data" => [],
                        "message" => "Cliente deletado com sucesso."
                    ], Response::HTTP_OK
                );

            }

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum Cliente encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_BAD_REQUEST
            );

        }
    }

}
