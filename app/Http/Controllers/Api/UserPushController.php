<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Queue;

class UserPushController extends Controller
{
    public function InsertUser(Request $request)
    {

        $dados = $request->input('customers');
        DB::transaction(function () use ($dados) {
            DB::connection()->disableQueryLog();
            User::unguard();
            foreach (array_chunk($dados, 500) as $lote) {
                // $registros = [];
                foreach ($lote as $item) {
                    User::find($item['id']);

                    User::updateOrInsert(
                        [
                            'cpf' => $item['cpf']
                        ],
                        [
                            'client_id' => $item['id'],
                            'name' => $item['nome'],
                            'email' => $item['email'],
                            "active" => 1,
                            "is_admin" => 0,
                            'password' => '$2y$12$HqyXsOdGpM0I9L0KxMRCKu0LFe5PLfDuVvuvgDmAoyeMcL1GRsRom'
                        ]
                    );
                }
                // return response()->json($registros);
                // DB::table('users')->insert($registros);
            }
            User::reguard();
            DB::connection()->enableQueryLog();
        });

        // Queue::push(function ($job) use ($request) {
        //     $data = $request->input('customers');
        //     foreach (array_chunk($data, 1000) as $users) {
        //         foreach ($users as $user) {
        // User::updateOrInsert(
        //     [
        //         'cpf' => $user['cpf']
        //     ],
        //     [
        //         'client_id' => $user['id'],
        //         'name' => $user['nome'],
        //         'email' => $user['email'],
        //         "active" => 1,
        //         "is_admin" => 0,
        //         'password' => 12345
        //     ]
        // );
        //         }
        //     }
        //     $job->delete();
        // });

        return response()->json([
            "response" => [
                "message" => "Dados dos Clientes inseridos sucesso!",
                "success" => true,
                "status" => 201,
            ],
        ], 201);
    }
}
