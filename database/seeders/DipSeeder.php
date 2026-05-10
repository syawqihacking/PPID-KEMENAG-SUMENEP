<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicInformation;

class DipSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => 'Laporan Akuntabilitas Kinerja (LAKIP)', 'type' => 'Berkala', 'description' => 'Laporan akuntabilitas kinerja instansi pemerintah secara berkala.'],
            ['title' => 'Rencana Strategis (Renstra)', 'type' => 'Berkala', 'description' => 'Dokumen rencana strategis Kemenag Sumenep.'],
            ['title' => 'Daftar Aset dan Inventaris', 'type' => 'Setiap Saat', 'description' => 'Daftar aset yang dikelola instansi.'],
            ['title' => 'Informasi Pengadaan Barang dan Jasa', 'type' => 'Serta Merta', 'description' => 'Pengumuman lelang dan pengadaan yang sedang berlangsung.'],
            ['title' => 'Dokumen Rahasia Negara', 'type' => 'Dikecualikan', 'description' => 'Informasi yang dikecualikan berdasarkan UU KIP.'],
        ];

        foreach ($data as $item) {
            PublicInformation::create($item);
        }
    }
}
