<?php

use App\Models\Ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // <-- Rahasianya ada di sini, pakai nama asli file-nya

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/terima-data-ikan', function (Request $request) {

    // 1. Tangkap semua data dari Raspberry Pi (YOLO + Load Cell)
    $grade = $request->input('grade');
    $lebar = $request->input('lebar');
    $berat = $request->input('berat'); // <-- Menangkap data berat dari python

    // 2. Masukkan ke Model Ikan secara dinamis
    Ikan::create([
        'kelas' => $grade,
        'ukuran' => $lebar,
        'berat' => $berat, // <-- Menggantikan '-' dengan berat riil (misal ditambah satuan kg atau gram)
        'hasil' => $grade,
    ]);

    return response()->json([
        'status' => 'SUKSES',
        'pesan' => 'Mantap! Data Ikan '.$grade.' dengan berat '.$berat.' g berhasil disimpan secara real-time!',
    ]);
});
