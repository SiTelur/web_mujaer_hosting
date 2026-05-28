<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kelas' => 'Grade B', 'ukuran' => '485 cm', 'berat' => '0 kg', 'hasil' => 'Grade B', 'created_at' => '2026-05-28 01:32:10', 'updated_at' => '2026-05-28 01:32:10'],
            ['kelas' => 'Grade B', 'ukuran' => '485 cm', 'berat' => '8.6 kg', 'hasil' => 'Grade B', 'created_at' => '2026-05-28 01:32:26', 'updated_at' => '2026-05-28 01:32:26'],
            ['kelas' => 'Grade B', 'ukuran' => '485 cm', 'berat' => '0 kg', 'hasil' => 'Grade B', 'created_at' => '2026-05-28 01:32:42', 'updated_at' => '2026-05-28 01:32:42'],
            ['kelas' => 'Grade B', 'ukuran' => '487 cm', 'berat' => '0 kg', 'hasil' => 'Grade B', 'created_at' => '2026-05-28 01:32:56', 'updated_at' => '2026-05-28 01:32:56'],
            ['kelas' => 'Grade B', 'ukuran' => 'P: 19.8 x L: 7.0 cm', 'berat' => '1270 kg', 'hasil' => 'Grade B', 'created_at' => '2026-05-28 01:33:52', 'updated_at' => '2026-05-28 01:33:52'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.4 x L: 13.4 cm', 'berat' => '340.8 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:34:13', 'updated_at' => '2026-05-28 01:34:13'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.1 x L: 9.5 cm', 'berat' => '1206 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:34:31', 'updated_at' => '2026-05-28 01:34:31'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.4 x L: 9.8 cm', 'berat' => '351.6 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:34:49', 'updated_at' => '2026-05-28 01:34:49'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.1 x L: 9.0 cm', 'berat' => '125.4 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:35:18', 'updated_at' => '2026-05-28 01:35:18'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.4 x L: 9.6 cm', 'berat' => '229.1 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:35:35', 'updated_at' => '2026-05-28 01:35:35'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.3 x L: 9.5 cm', 'berat' => '552.1 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:35:51', 'updated_at' => '2026-05-28 01:35:51'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.3 x L: 9.3 cm', 'berat' => '496.8 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:36:19', 'updated_at' => '2026-05-28 01:36:19'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.2 x L: 8.6 cm', 'berat' => '482.4 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:36:34', 'updated_at' => '2026-05-28 01:36:34'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.0 x L: 9.6 cm', 'berat' => '377.1 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:37:08', 'updated_at' => '2026-05-28 01:37:08'],
            ['kelas' => 'Grade A', 'ukuran' => 'P: 20.1 x L: 9.2 cm', 'berat' => '498.3 kg', 'hasil' => 'Grade A', 'created_at' => '2026-05-28 01:37:25', 'updated_at' => '2026-05-28 01:37:25'],
        ];

        // Memasukkan data ke dalam tabel 'ikans'
        DB::table('ikans')->insert($data);
    }
}
