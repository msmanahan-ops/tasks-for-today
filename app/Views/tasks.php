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