<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6fb; color: #243047; }
        header { background: #243b70; padding: 18px 8%; color: white; }
        header h1 { margin: 0 0 12px; font-size: 24px; }
        nav a { color: white; margin-right: 20px; text-decoration: none; }
        nav a:hover { text-decoration: underline; }
        main { max-width: 900px; margin: 35px auto; padding: 0 20px; }
        .card { background: white; padding: 20px; margin: 15px 0; border-radius: 10px; box-shadow: 0 2px 8px #dce2ee; }
        .muted { color: #66748b; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 13px; border-bottom: 1px solid #e1e6ef; text-align: left; }
        th { background: #e8eefb; }
        .table-wrap { overflow-x: auto; }
    </style>
</head>
<body>
    <header>
        <h1>Tasks for Today</h1>
        <nav>
            <a href="<?= site_url('/') ?>">Welcome</a>
            <a href="<?= site_url('tasks') ?>">Task List</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
        </nav>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>