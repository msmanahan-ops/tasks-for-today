<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $task ? 'Edit Task' : 'New Task' ?> | Tasks for Today</title>
</head>
<body>
    <h1><?= $task ? 'Edit Task' : 'New Task' ?></h1>
    <p><a href="<?= site_url('tasks') ?>">Back to task list</a></p>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if ($errors): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="<?= esc($action) ?>">
        <?= csrf_field() ?>

        <p>
            <label for="title">Title</label><br>
            <input
                id="title"
                name="title"
                maxlength="150"
                value="<?= esc(old('title', $task['title'] ?? '')) ?>"
                required
            >
        </p>

        <p>
            <label for="task_date">Task date</label><br>
            <input
                id="task_date"
                name="task_date"
                type="date"
                value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>"
                required
            >
        </p>

        <p>
            <label for="status">Status</label><br>
            <?php $selected = old('status', $task['status'] ?? 'Pending'); ?>
            <select id="status" name="status">
                <?php foreach (['Pending', 'In Progress', 'Completed'] as $status): ?>
                    <option value="<?= esc($status) ?>"
                        <?= $selected === $status ? 'selected' : '' ?>>
                        <?= esc($status) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <button type="submit">Save task</button>
    </form>
</body>
</html>