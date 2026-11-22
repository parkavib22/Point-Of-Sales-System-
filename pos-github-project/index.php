<?php
require_once 'includes/functions.php'; require_login();
$page_title='Dashboard';
$stats=db()->query("SELECT (SELECT COUNT(*) FROM products) products,(SELECT COUNT(*) FROM products WHERE quantity<=5) low_stock,(SELECT COUNT(*) FROM sales WHERE DATE(sale_date)=CURDATE()) today_count,(SELECT COALESCE(SUM(total_amount),0) FROM sales WHERE DATE(sale_date)=CURDATE()) today_total")->fetch();
$recent=db()->query('SELECT s.id,s.sale_date,s.total_amount,u.name cashier FROM sales s JOIN users u ON u.id=s.user_id ORDER BY s.id DESC LIMIT 5')->fetchAll();
require 'includes/header.php'; ?>
<h1>Dashboard</h1><p class="muted">Sales and inventory overview</p>
<div class="stats"><div class="stat"><span>Total products</span><strong><?= (int)$stats['products'] ?></strong></div><div class="stat"><span>Low-stock products</span><strong><?= (int)$stats['low_stock'] ?></strong></div><div class="stat"><span>Today's sales</span><strong><?= (int)$stats['today_count'] ?></strong></div><div class="stat"><span>Today's revenue</span><strong><?= money($stats['today_total']) ?></strong></div></div>
<div class="panel"><div class="panel-head"><h2>Recent transactions</h2><a class="button" href="sale.php">Create sale</a></div><div class="table-wrap"><table><tr><th>Bill No.</th><th>Date</th><th>Cashier</th><th>Total</th><th></th></tr><?php foreach($recent as $s): ?><tr><td>#<?= (int)$s['id'] ?></td><td><?= e($s['sale_date']) ?></td><td><?= e($s['cashier']) ?></td><td><?= money($s['total_amount']) ?></td><td><a href="receipt.php?id=<?= (int)$s['id'] ?>">Receipt</a></td></tr><?php endforeach; ?><?php if(!$recent): ?><tr><td colspan="5">No sales recorded yet.</td></tr><?php endif; ?></table></div></div>
<?php require 'includes/footer.php'; ?>
