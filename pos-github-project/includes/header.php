<?php require_once __DIR__.'/functions.php'; ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?= e($page_title ?? 'POS System') ?></title><link rel="stylesheet" href="assets/style.css"></head><body>
<header class="topbar"><a class="brand" href="index.php">POINT OF SALE SYSTEM</a><nav>
<?php if (!empty($_SESSION['user'])): ?>
<a href="index.php">Dashboard</a><a href="products.php">Products</a><a href="sale.php">New Sale</a><a href="sales.php">Sales</a><?php if ($_SESSION['user']['role']==='admin'): ?><a href="reports.php">Reports</a><a href="users.php">Users</a><?php endif; ?><span class="user">Hi, <?= e($_SESSION['user']['name']) ?></span><a href="logout.php">Logout</a>
<?php else: ?><a href="login.php">Login</a><?php endif; ?></nav></header><main class="container"><?php show_flash(); ?>
