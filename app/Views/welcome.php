<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Welcome! Here are today's tasks.</h2>
<p class="muted">Date: <?= esc($today) ?> · <?= count($tasks) ?> task(s)</p>

<?php if (empty($tasks)): ?>
    <div class="card">No tasks scheduled for today.</div>
<?php else: ?>
    <?php foreach ($tasks as $task): ?>
        <div class="card">
            <h3><?= esc($task['title']) ?></h3>
            <p>Status: <?= esc($task['status']) ?></p>
            <p class="muted">Task date: <?= esc($task['task_date']) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->endSection() ?>