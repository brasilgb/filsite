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
    public function InsertOrder(Request $request)
    {
        $data = $request->orders;
        // return response()->json([$data]);
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
                        "dtentry" => $ordem['dtentrada'],
                        "dtdelivery" => $ordem['dtentrega'] ? $ordem['dtentrega'] : null,
                        "status" => $ordem['status']
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
}
