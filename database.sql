CREATE DATABASE easyshop_db;
USE easyshop_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role VARCHAR(20) DEFAULT 'user'
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price INT,
  image VARCHAR(255)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  total INT,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  qty INT,
  price INT
);

INSERT INTO products (name, price, image) VALUES
('Smart Watch Pro', 2499, 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80'),
('Wireless Headphones', 1999, 'https://images.unsplash.com/photo-1518441902117-f0a4c8d9c61f?auto=format&fit=crop&w=900&q=80'),
('Premium Sneakers', 2999, 'https://images.unsplash.com/photo-1528701800489-20be3c1ea6cb?auto=format&fit=crop&w=900&q=80'),
('Trendy Hoodie', 1499, 'https://images.unsplash.com/photo-1520975682031-a7a9791dffea?auto=format&fit=crop&w=900&q=80'),
('Laptop Backpack', 999, 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=80');
