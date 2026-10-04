<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $today = new \DateTimeImmutable('now', new \DateTimeZone('Asia/Manila'));
        $yesterday = $today->modify('-1 day')->format('Y-m-d');
        $todayDate = $today->format('Y-m-d');
        $tomorrow = $today->modify('+1 day')->format('Y-m-d');
        $createdAt = $today->format('Y-m-d H:i:s');

        $tasks = [
            ['title' => 'Review yesterday’s progress', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Prepare the team’s task list', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Check project requirements', 'status' => 'pending', 'task_date' => $todayDate, 'created_at' => $createdAt],
            ['title' => 'Update the task dashboard', 'status' => 'in progress', 'task_date' => $todayDate, 'created_at' => $createdAt],
            ['title' => 'Review database records', 'status' => 'pending', 'task_date' => $todayDate, 'created_at' => $createdAt],
            ['title' => 'Send the daily progress update', 'status' => 'pending', 'task_date' => $todayDate, 'created_at' => $createdAt],
            ['title' => 'Plan tomorrow’s assignments', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Prepare the weekly summary', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
        ];

        $this->db->table('tasks')->insertBatch($tasks);

        $this->db->table('users')->insert([
            'username'   => 'demo_user',
            'full_name'  => 'Marixine Sofia Manahan',
            'email'      => 'demo@example.com',
            'created_at' => $createdAt,
        ]);
    }
}