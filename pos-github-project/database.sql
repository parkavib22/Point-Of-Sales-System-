CREATE DATABASE IF NOT EXISTS pos_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE pos_system;
CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('admin','employee') NOT NULL DEFAULT 'employee',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(150) NOT NULL,
 category VARCHAR(100) DEFAULT '',
 supplier VARCHAR(150) DEFAULT '',
 price DECIMAL(10,2) NOT NULL DEFAULT 0,
 quantity INT NOT NULL DEFAULT 0,
 barcode VARCHAR(100) DEFAULT '',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 INDEX idx_product_name(name), INDEX idx_product_barcode(barcode)
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS sales (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL,
 total_amount DECIMAL(12,2) NOT NULL,
 payment_method VARCHAR(30) NOT NULL DEFAULT 'Cash',
 sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 CONSTRAINT fk_sales_user FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS sale_items (
 id INT AUTO_INCREMENT PRIMARY KEY,
 sale_id INT NOT NULL,
 product_id INT NOT NULL,
 product_name VARCHAR(150) NOT NULL,
 price DECIMAL(10,2) NOT NULL,
 quantity INT NOT NULL,
 line_total DECIMAL(12,2) NOT NULL,
 CONSTRAINT fk_items_sale FOREIGN KEY(sale_id) REFERENCES sales(id) ON DELETE CASCADE,
 CONSTRAINT fk_items_product FOREIGN KEY(product_id) REFERENCES products(id)
) ENGINE=InnoDB;
INSERT INTO products(name,category,supplier,price,quantity,barcode) VALUES
('Notebook','Stationery','ABC Suppliers',45.00,100,'890100000001'),
('Blue Pen','Stationery','ABC Suppliers',10.00,200,'890100000002'),
('Water Bottle','Accessories','City Wholesale',120.00,35,'890100000003')
ON DUPLICATE KEY UPDATE name=VALUES(name);
