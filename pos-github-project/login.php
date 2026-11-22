<?php
require_once 'includes/functions.php';
if (!empty($_SESSION['user'])) redirect('index.php');
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') { verify_csrf(); $stmt=db()->prepare('SELECT id,name,username,password,role FROM users WHERE username=?'); $stmt->execute([trim($_POST['username']??'')]); $u=$stmt->fetch(); if($u && password_verify($_POST['password']??'', $u['password'])) { session_regenerate_id(true); unset($u['password']); $_SESSION['user']=$u; redirect('index.php'); } $error='Invalid username or password.'; }
$page_title='Login'; require 'includes/header.php'; ?>
<div class="auth panel"><h1>Sign in</h1><?php if($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?><form method="post"><?= csrf_field() ?><label>Username<input name="username" required autofocus></label><label>Password<input type="password" name="password" required></label><button class="button full">Login</button></form><p class="muted small">First-time setup: run database.sql, then create the admin account using setup_admin.php and delete that setup file.</p></div>
<?php require 'includes/footer.php'; ?>
