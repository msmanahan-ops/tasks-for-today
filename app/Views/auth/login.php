<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Tasks for Today</title>
</head>
<body>
    <h1>Tasks for Today — Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>

        <p>
            <label for="username">Username</label><br>
            <input
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                required
            >
        </p>

        <p>
            <label for="password">Password</label><br>
            <input id="password" name="password" type="password" required>
        </p>

        <button type="submit">Log in</button>
    </form>

    <p><a href="<?= site_url('tasks') ?>">View public tasks</a></p>
</body>
</html>