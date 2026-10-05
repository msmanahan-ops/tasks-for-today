<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tsa2PasswordSeeder extends Seeder
{
    public function run()
    {
        $user = $this->db->table('users')->orderBy('id', 'ASC')->get()->getRowArray();

        if ($user === null) {
            throw new \RuntimeException(
                'No demo user found. Run php spark db:seed DemoSeeder first.'
            );
        }

        $this->db->table('users')
            ->where('id', $user['id'])
            ->update([
                'password' => password_hash('TaskDemo2026!', PASSWORD_DEFAULT),
            ]);
    }
}