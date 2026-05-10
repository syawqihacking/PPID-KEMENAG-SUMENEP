<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\Faq;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // Profil
            ['key' => 'profil_latar_belakang', 'value' => 'Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP), Kementerian Agama Kabupaten Sumenep berkomitmen untuk memberikan pelayanan informasi publik yang cepat, tepat, dan sederhana. PPID Kemenag Sumenep bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan pelayanan informasi di lingkungan instansi.', 'group' => 'profil', 'type' => 'textarea'],
            ['key' => 'profil_visi', 'value' => 'Terwujudnya pelayanan informasi yang transparan, akuntabel, dan responsif untuk mewujudkan tata kelola kepemerintahan yang baik dan bersih di lingkungan Kementerian Agama Kabupaten Sumenep.', 'group' => 'profil', 'type' => 'textarea'],
            ['key' => 'profil_misi', 'value' => "Meningkatkan kualitas pelayanan informasi publik.\nMenyediakan informasi publik yang akurat dan mudah diakses.\nMeningkatkan kompetensi SDM pengelola informasi.\nMembangun sistem informasi dan dokumentasi yang andal.", 'group' => 'profil', 'type' => 'textarea'],
            
            // Prosedur
            ['key' => 'prosedur_maklumat', 'value' => 'Kami berkomitmen memberikan pelayanan informasi publik yang cepat, tepat, akurat, dan transparan sesuai dengan Undang-Undang Keterbukaan Informasi Publik.', 'group' => 'prosedur', 'type' => 'textarea'],

            // Kontak
            ['key' => 'kontak_alamat', 'value' => 'Jl. KH. Mansyur No. 2, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417', 'group' => 'kontak', 'type' => 'textarea'],
            ['key' => 'kontak_telepon', 'value' => '(0328) 662-124', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'kontak_email', 'value' => 'ppid.sumenep@kemenag.go.id, kankemenag.sumenep@kemenag.go.id', 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'kontak_jam_kerja', 'value' => "Senin - Kamis (08:00 - 16:00 WIB)\nJumat (08:00 - 16:30 WIB)", 'group' => 'kontak', 'type' => 'text'],
            ['key' => 'kontak_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.043694082264!2d113.86477037466827!3d-7.01750059298379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e46a78b53d0d%3A0x6b69a25b12852226!2sKantor%20Kementerian%20Agama%20Kabupaten%20Sumenep!5e0!3m2!1sid!2sid!4v1715349600000!5m2!1sid!2sid', 'group' => 'kontak', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        $faqs = [
            ['question' => 'Apa itu PPID?', 'answer' => 'PPID (Pejabat Pengelola Informasi dan Dokumentasi) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik sesuai dengan UU No. 14 Tahun 2008.'],
            ['question' => 'Bagaimana cara mengajukan permohonan informasi?', 'answer' => 'Anda bisa mengajukan permohonan informasi secara online melalui menu "Permohonan Informasi" di website ini. Cukup isi formulir dengan data diri dan rincian informasi yang diminta.'],
            ['question' => 'Berapa lama waktu proses permohonan?', 'answer' => 'Berdasarkan UU KIP, PPID wajib memberikan respons dalam waktu maksimal 10 hari kerja sejak permohonan diterima.'],
            ['question' => 'Apakah ada biaya untuk permohonan informasi?', 'answer' => 'Permohonan informasi publik tidak dikenakan biaya alias gratis. Namun, apabila pemohon menginginkan salinan cetak (hardcopy), dapat dikenakan biaya penggandaan.'],
            ['question' => 'Bagaimana jika permohonan saya ditolak?', 'answer' => 'Jika permohonan ditolak, Anda berhak mengajukan keberatan kepada atasan PPID dalam waktu 30 hari kerja.'],
            ['question' => 'Bagaimana cara mengecek status permohonan saya?', 'answer' => 'Anda bisa mengecek status permohonan melalui menu "Cek Status" di halaman utama website ini dengan memasukkan alamat email Anda.'],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                ['answer' => $faq['answer'], 'order' => $i, 'is_active' => true]
            );
        }
    }
}
