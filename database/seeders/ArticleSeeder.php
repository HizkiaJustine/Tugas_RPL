<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'articleId' => Str::uuid(),
                'dokterID' => 1,
                'title' => 'Kenali Gejala dan Cara Mencegah Infeksi Rotavirus',
                'content' => '
                    Diare masih menjadi salah satu permasalahan kesehatan terbesar, terutama bagi anak-anak di negara berkembang. Salah 
                    satu penyebab utama diare berat pada anak-anak adalahrotavirus—virus yang sangat menular dan dapat bertahan lama di 
                    berbagai permukaan, termasuk tangan. Apa Itu Rotavirus?
                    Rotavirus adalah virus berbentuk seperti roda yang menyebabkan gastroenteritis (peradangan saluran 
                    pencernaan). Virus ini sangat umum menyerang anak-anak, terutama mereka yang sering menyentuh benda sembarangan dan 
                    memasukkannya ke dalam mulut. Hampir semua anak berusia di bawah 5 tahun pernah terinfeksi rotavirus, baik dengan 
                    gejala ringan maupun berat. Hal ini menjadikan rotavirus sebagai ancaman nyata bagi tumbuh kembang anak.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'articleId' => Str::uuid(),
                'dokterID' => 2,
                'title' => 'Second Article',
                'content' => 'This is the content of the second article.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articleId' => Str::uuid(),
                'dokterID' => 3,
                'title' => 'Third Article',
                'content' => 'This is the content of the third article.',
                'publishDate' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}