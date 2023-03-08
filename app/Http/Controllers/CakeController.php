<?php

namespace App\Http\Controllers;

use App\Http\Resources\CakeResource;
use App\Http\Services\CakeService;
use App\Http\Requests\CakeRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;

class CakeController extends Controller
{
    protected CakeService $cakeService;

    public function __construct(CakeService $cakeService)
    {
        $this->cakeService = $cakeService;
    }

    public function index()
    {
        try {

            $allCakes = $this->cakeService->allCakes();
            return CakeResource::collection($allCakes);

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum bolo encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );

        }
    }

    public function store(CakeRequest $request)
    {
        try {

            $cakeResult = $this->cakeService->storeCake($request->validated());

            return response()->json(
                [
                    "success" => true,
                    "data" => CakeResource::make($cakeResult),
                    "message" => "Bolo Cadastrado com Sucesso"
                ],
                Response::HTTP_CREATED
            );

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Não foi possivel salvar bolo, {$e->getMessage()}"
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    public function show(int $id)
    {
        try {

            $cake = $this->cakeService->findCake($id);

            return response()->json(
                [
                    "success" => true,
                    "data" => CakeResource::make($cake)
                ],
                Response::HTTP_OK
            );

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum bolo encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_NOT_FOUND
            );

        }
    }

    public function update(CakeRequest $request, int $id)
    {
        try {

            $cake = $this->cakeService->updateCake($request->validated(), $id);

            if (isset($cake)) {

                return response()->json(
                    [
                        "success" => true,
                        "data" => $this->cakeService->findCake($id),
                        "message" => "Bolo atualizado com sucesso."
                    ], Response::HTTP_OK
                );

            }

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum bolo encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_BAD_REQUEST
            );

        }
    }

    public function destroy(int $id)
    {
        try {

            $cake = $this->cakeService->destroyCake($id);

            if (isset($cake)) {

                return response()->json(
                    [
                        "success" => true,
                        "data" => [],
                        "message" => "Bolo deletado com sucesso."
                    ], Response::HTTP_OK
                );

            }

        } catch (\Exception $e) {

            return response()->json(
                [
                    "success" => false,
                    "message" => "Nenhum bolo encontrado, {$e->getMessage()}"
                ],
                Response::HTTP_BAD_REQUEST
            );

        }
    }

}
