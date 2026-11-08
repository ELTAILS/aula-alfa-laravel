<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!app()->environment('local')) {
            $this->command?->warn('AdminSeeder ignorado: so roda com APP_ENV=local.');
            return;
        }

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Administrador', 'password' => 'admin-dev-123']
        );

        $admin->profile()->updateOrCreate([], ['type' => 'admin']);
    }
}
