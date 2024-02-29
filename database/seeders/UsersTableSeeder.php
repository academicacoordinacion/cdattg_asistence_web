<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persona = Persona::where('email', 'admin@admin.com')->first();

        if ($persona) {
            User::create([
                'email' => $persona->email,
                'password' => Hash::make('123456'),
                'status' => 1, // Opcional, si tu modelo User tiene status
                'persona_id' => $persona->id,
            ]);
        }
    }
}