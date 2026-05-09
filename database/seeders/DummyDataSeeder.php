<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Document;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // Seed News
        $news = [
            [
                'title' => 'Rapat Koordinasi Optimalisasi Layanan PPID Kemenag Sumenep Tahun 2024',
                'category' => 'Pengumuman',
                'image_path' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80',
                'content' => 'Kemenag Sumenep menggelar rapat koordinasi untuk meningkatkan kualitas pelayanan informasi publik di tingkat kabupaten. Rapat ini dihadiri oleh seluruh elemen penting dari institusi untuk memastikan komitmen Keterbukaan Informasi Publik.',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Panduan Baru Pengajuan Dokumen Online',
                'category' => 'Berita Utama',
                'image_path' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80',
                'content' => 'Untuk mempermudah masyarakat, PPID Kemenag Sumenep merilis panduan baru pengajuan dokumen secara online. Diharapkan ini memangkas birokrasi dan waktu antrean.',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Laporan Tahunan Pelayanan Publik Telah Dirilis',
                'category' => 'Laporan',
                'image_path' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&q=80',
                'content' => 'Laporan tahunan 2023 menunjukkan peningkatan kepuasan masyarakat terhadap layanan Kemenag Sumenep sebesar 15%.',
                'published_at' => now()->subDays(10),
            ]
        ];

        foreach ($news as $n) {
            News::create([
                'title' => $n['title'],
                'slug' => Str::slug($n['title']),
                'category' => $n['category'],
                'image_path' => $n['image_path'],
                'content' => $n['content'],
                'author_name' => 'Admin PPID',
                'published_at' => $n['published_at'],
            ]);
        }

        // Seed Documents
        $documents = [
            ['title' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) Tahun 2023', 'category' => 'Keuangan', 'file_extension' => 'PDF', 'file_size' => '2.4 MB', 'description' => 'Laporan tahunan evaluasi kinerja berdasarkan rencana strategis.'],
            ['title' => 'SOP Penanganan Benturan Kepentingan', 'category' => 'Kepegawaian', 'file_extension' => 'DOCX', 'file_size' => '1.1 MB', 'description' => 'Standar operasional prosedur terkait penanganan benturan kepentingan pegawai.'],
            ['title' => 'Rencana Strategis (RENSTRA) 2020-2024', 'category' => 'Program', 'file_extension' => 'PDF', 'file_size' => '5.8 MB', 'description' => 'Dokumen perencanaan strategis kementerian agama tingkat kabupaten.'],
            ['title' => 'Daftar Isian Pelaksanaan Anggaran (DIPA) 2024', 'category' => 'Keuangan', 'file_extension' => 'PDF', 'file_size' => '3.2 MB', 'description' => 'Rincian alokasi anggaran pelaksanaan program kerja kementerian.'],
        ];

        foreach ($documents as $doc) {
            Document::create([
                'title' => $doc['title'],
                'category' => $doc['category'],
                'file_path' => '#',
                'file_extension' => $doc['file_extension'],
                'file_size' => $doc['file_size'],
                'description' => $doc['description'],
            ]);
        }
    }
}
