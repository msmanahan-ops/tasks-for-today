<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Demo User Profile</h2>

<?php if ($user): ?>
    <div class="card">
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Account created:</strong> <?= esc($user['created_at']) ?></p>
    </div>
<?php else: ?>
    <div class="card">No demo user was found. Run the database seeder.</div>
<?php endif; ?>

<?= $this->endSection() ?>