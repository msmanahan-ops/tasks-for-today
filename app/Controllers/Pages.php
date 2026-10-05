<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function welcome()
    {
        $today = date('Y-m-d');
        $taskModel = new TaskModel();

        return view('welcome', [
            'today' => $today,
            'tasks' => $taskModel
                ->where('task_date', $today)
                ->where('is_archived', 0)
                ->orderBy('id', 'ASC')
                ->findAll(),
        ]);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        return view('tasks', [
            'tasks' => $taskModel
                ->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll(),
        ]);
    }

    public function profile()
    {
        $userModel = new UserModel();

        return view('profile', [
            'user' => $userModel->first(),
        ]);
    }

    public function about()
    {
        return view('about');
    }
}