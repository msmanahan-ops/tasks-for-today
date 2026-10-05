<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function new()
    {
        return view('tasks/form', [
            'task'   => null,
            'action' => site_url('tasks'),
        ]);
    }

    public function create()
    {
        if (! $this->validate($this->taskRules())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert($this->taskData());

        return redirect()->to('/tasks')->with('success', 'Task created.');
    }

    public function edit(int $id)
    {
        return view('tasks/form', [
            'task'   => $this->activeTask($id),
            'action' => site_url('tasks/' . $id),
        ]);
    }

    public function update(int $id)
    {
        $this->activeTask($id);

        if (! $this->validate($this->taskRules())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->update($id, $this->taskData());

        return redirect()->to('/tasks')->with('success', 'Task updated.');
    }

    public function archive(int $id)
    {
        $this->activeTask($id);

        (new TaskModel())->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived.');
    }

    private function activeTask(int $id): array
    {
        $task = (new TaskModel())
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        return $task;
    }

    private function taskRules(): array
    {
        return [
            'title' => 'required|max_length[150]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[Pending,In Progress,Completed]',
        ];
    }

    private function taskData(): array
    {
        return [
            'title' => trim((string) $this->request->getPost('title')),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status'),
        ];
    }
}