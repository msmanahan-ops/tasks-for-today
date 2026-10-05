<?php if (session()->get('user_id')): ?>
    <p><a href="<?= site_url('tasks/new') ?>">+ New Task</a></p>
<?php else: ?>
    <p><a href="<?= site_url('login') ?>">Log in to manage tasks</a></p>
<?php endif; ?>

<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Complete Task List</h2>
<p class="muted"><?= count($tasks) ?> task(s), ordered by date</p>

<div class="table-wrap">
    <table>
        <thead>
            <tr><th>ID</th><th>Title</th><th>Status</th><th>Task Date</th></tr>
        </thead>
        <tbody>
            <?php if (session()->get('user_id')): ?>
    <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a>

    <form
        method="post"
        action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>"
        style="display: inline;"
        onsubmit="return confirm('Archive this task?');"
    >
        <?= csrf_field() ?>
        <button type="submit">Delete</button>
    </form>
<?php endif; ?>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>