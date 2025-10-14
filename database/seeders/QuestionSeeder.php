<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $users = User::all();
        $categories = Category::all();

        // Pastikan sudah ada user dan kategori
        if ($users->count() === 0 || $categories->count() === 0) {
            $this->command->warn('Harap isi tabel users dan categories terlebih dahulu!');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Question::create([
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'question' => $faker->sentence(3), // contoh: "Masalah pembayaran gagal"
                'solution' => $faker->sentence(3), // contoh: "Masalah pembayaran gagal"
                'queue_number' => 'Q-' . strtoupper($faker->bothify('???###')),
            ]);
        }
    }
}
