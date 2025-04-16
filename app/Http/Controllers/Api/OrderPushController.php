<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Queue;

class OrderPushController extends Controller
{
    public function getStatus($status)
    {
        switch ($status) {
            case 1:
                return 'Ordem Aberta';
                break;
            case 2:
                return 'Ordem Fechada';
                break;
            case 3:
                return 'Orçamento Gerado';
                break;
            case 4:
                return 'Orçamento Aprovado';
                break;
            case 5:
                return 'ExecutandoReparo';
                break;
            case 6:
                return '(CA)Serviço Concluído';
                break;
            case 7:
                return '(CN)Serviço Concluído';
                break;
            case 8:
                return 'Entregue ao Cliente';
                break;
        };
    }

    public function InsertOrder(Request $request)
    {
        $data = $request->orders;

        foreach (array_chunk($data, 500) as $ordens) {
            foreach ($ordens as $ordem) {
                Order::updateOrCreate(
                    [
                        'id' => $ordem['id']
                    ],
                    [
                        "client_id" => $ordem['cliente_id'],
                        "details" => $ordem['detalhes'],
                        "defect" => $ordem['defeito'],
                        "descbudget" => $ordem['descorcamento'],
                        "valuebudget" => $ordem['valorcamento'] ? $ordem['valorcamento'] : 0,
                        "cost" => $ordem['custo'] ? $ordem['custo'] : 0,
                        "valueservice" => $ordem['valservico'] ? $ordem['valservico'] : 0,
                        "valueparts" => $ordem['valpecas'] ? $ordem['valpecas'] : 0,
                        "dtentry" => $ordem['created_at'] ? $ordem['created_at'] : null,
                        "dtdelivery" => $ordem['dtentrega'] ? $ordem['dtentrega'] : null,
                        "status" => $this->getStatus($ordem['status'])
                    ]
                );
            }
        }
        return response()->json([
            "response" => [
                "message" => "Dados das ordens inseridos sucesso!",
                "success" => true,
                "status" => 201,
            ],
        ], 201);
    }

    public function InsertOneOrder(Request $request)
    {
        $data = $request->orders;

        foreach ($data as $ordem) {
            Order::updateOrCreate(
                [
                    'id' => $ordem['id']
                ],
                [
                    "client_id" => $ordem['cliente_id'],
                    "details" => $ordem['detalhes'],
                    "defect" => $ordem['defeito'],
                    "descbudget" => $ordem['descorcamento'],
                    "valuebudget" => $ordem['valorcamento'] ? $ordem['valorcamento'] : 0,
                    "cost" => $ordem['custo'] ? $ordem['custo'] : 0,
                    "valueservice" => $ordem['valservico'] ? $ordem['valservico'] : 0,
                    "valueparts" => $ordem['valpecas'] ? $ordem['valpecas'] : 0,
                    "dtentry" => $ordem['created_at'],
                    "dtdelivery" => $ordem['dtentrega'] ? $ordem['dtentrega'] : null,
                    "status" => $this->getStatus($ordem['status'])
                ]
            );
        }
        return response()->json([
            "response" => [
                "message" => "Dados das ordens inseridos sucesso!",
                "success" => true,
                "status" => 201,
            ],
        ], 201);
    }
}
