# Point of Sales System (POS)

A PHP + MySQL web application based on the uploaded **POINT OF SALES SYSTEM** project report. The report specifies PHP as the front end and MySQL as the database, and describes administrator, employee, product/inventory, transaction, receipt and reporting modules.

## Features
- Admin and employee login with password hashing
- Product management: add, update, delete, search, category, supplier, price and barcode
- Inventory tracking and low-stock indicators
- Checkout with multiple products and quantities
- Database transaction for sale creation and stock deduction
- Cash, card and UPI payment-method recording
- Printable sales receipt
- Sales history and daily sales / low-stock reports
- User management for administrators

## Requirements
- PHP 8.0 or later (PDO MySQL extension enabled)
- MySQL 5.7+ or MariaDB
- Apache (XAMPP/WAMP/LAMP) or PHP's built-in development server

## Run locally with XAMPP
1. Copy the `pos-github-project` folder into `C:/xampp/htdocs/`.
2. Start **Apache** and **MySQL** in XAMPP.
3. Open `http://localhost/phpmyadmin` and import `database.sql` (or run its SQL in the SQL tab).
4. Check the database settings in `config.php`. The default XAMPP settings are database `pos_system`, user `root`, and an empty password.
5. Visit `http://localhost/pos-github-project/setup_admin.php` once to create the first administrator.
6. **Immediately delete `setup_admin.php`** after it reports success.
7. Open `http://localhost/pos-github-project/login.php`.

### First login
- Username: `admin`
- Password: `Admin@123`

Change the admin password before using this application for real business data. This is a student/demo project and has not been security-audited for production use.

## Run using PHP built-in server
From this folder, run:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000/login.php` after configuring MySQL and importing `database.sql`.

## Upload to GitHub
1. Create a new repository on GitHub, for example `point-of-sales-system`.
2. Extract this ZIP file.
3. Open the extracted folder in VS Code.
4. Open Terminal in VS Code and run:

```bash
git init
git add .
git commit -m "Add Point of Sales System"
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/point-of-sales-system.git
git push -u origin main
```

Replace `YOUR-USERNAME` with your GitHub username. Do not upload real passwords, customer data or production database credentials.

## Project structure

```text
pos-github-project/
├── assets/style.css
├── includes/
│   ├── footer.php
│   ├── functions.php
│   └── header.php
├── config.php
├── database.sql
├── index.php
├── login.php
├── logout.php
├── products.php
├── sale.php
├── receipt.php
├── sales.php
├── reports.php
├── users.php
├── setup_admin.php
└── README.md
```

## Notes
- The original report's appendix contains a partial CodeIgniter-style employee form and validation snippet, not a complete runnable source-code project. This repository is a clean, standalone PHP/PDO implementation of the report's described POS workflow; it is not a byte-for-byte reconstruction of an unavailable original source project.
- The report's customer-facing browsing/online ordering, barcode hardware integration, card processing gateway and cloud synchronization are not implemented in this starter version. Payment method is recorded for the cashier; no card details are collected or processed.
