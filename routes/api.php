<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/insert-order', function (Request $request) {
    $no_of_data = 1000000;
    $test_data = array();
    for ($i = 1; $i < $no_of_data; $i++) {
        $test_data[$i]['id'] = $i;
        $test_data[$i]['details'] = "Test Data" . $i;
        $test_data[$i]['defect'] = "Delivered" . $i;
    }
    $chunk_data = array_chunk($test_data, 1000);

    if (isset($chunk_data) && !empty($chunk_data)) {
        foreach ($chunk_data as $key => $chunk_data_val) {
            DB::table('ordertest')
                ->updateOrInsert(
                    [
                        'id' => $chunk_data_val[$key]['id']
                    ],
                    $chunk_data_val
                );
        }
    }
    return ['user' => $chunk_data_val];
});
