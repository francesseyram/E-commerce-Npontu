-- Create and use the database
CREATE DATABASE IF NOT EXISTS ecommerce_npontu;
USE ecommerce_npontu;

-- 1. USERS
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2. CATEGORIES
CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 3. PRODUCTS
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id BIGINT UNSIGNED,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT DEFAULT 0,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- 4. CARTS
CREATE TABLE carts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 5. CART_ITEMS
CREATE TABLE cart_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cart_id BIGINT UNSIGNED,
    product_id BIGINT UNSIGNED,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- 6. ORDERS
CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    total DECIMAL(10, 2),
    status ENUM('pending', 'paid', 'shipped', 'cancelled') DEFAULT 'pending',
    shipping_address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 7. ORDER_ITEMS
CREATE TABLE order_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED,
    product_id BIGINT UNSIGNED,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- 8. REVIEWS
CREATE TABLE reviews (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    product_id BIGINT UNSIGNED,
    rating TINYINT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- ------------------------------------------------------------------------------
-- POPULATING WITH SAMPLE DATA

-- Categories
INSERT INTO categories (name, slug) VALUES 
('Electronics', 'electronics'), 
('Clothing', 'clothing'), 
('Books', 'books'), 
('Home Appliances', 'home-appliances'), 
('Toys', 'toys'), 
('Fitness', 'fitness');

-- Users
INSERT INTO users (name, email, password, is_admin) VALUES 
('Alice', 'alice@example.com', 'hashed_pass', TRUE), 
('Bob', 'bob@example.com', 'hashed_pass', FALSE), 
('Charlie', 'charlie@example.com', 'hashed_pass', FALSE), 
('Diana', 'diana@example.com', 'hashed_pass', FALSE), 
('Evan', 'evan@example.com', 'hashed_pass', FALSE), 
('Frank', 'frank@example.com', 'hashed_pass', TRUE);

-- Products
INSERT INTO products (category_id, name, slug, description, price, stock, image) VALUES 
(1, 'Smartphone', 'smartphone', 'A powerful phone', 500.00, 10, 'smartphone.jpg'),
(1, 'Tablet', 'tablet', 'A lightweight and handy gadget', 300.00, 15, 'tablet.jpg'),
(2, 'T-shirt', 't-shirt', 'Comfortable cotton T-shirt', 20.00, 50, 'tshirt.jpg'),
(3, 'Book A', 'book-a', 'Bestseller novel', 15.00, 100, 'book.jpg'),
(4, 'Blender', 'blender', 'Kitchen blender', 40.00, 30, 'blender.jpg'),
(5, 'Dumbbell', 'dumbbell', 'Fitness equipment 5kg', 25.00, 20, 'dumbbell.jpg');

-- Carts
INSERT INTO carts (user_id) VALUES (1), (2), (3), (4), (5), (6);

-- Cart Items
INSERT INTO cart_items (cart_id, product_id, quantity) VALUES 
(1, 1, 2),
(1, 3, 1),
(2, 2, 1),
(2, 4, 3),
(3, 5, 1),
(4, 6, 2);

-- Orders
INSERT INTO orders (user_id, total, status, shipping_address) VALUES 
(1, 1040.00, 'paid', '123 Main St'), 
(2, 60.00, 'pending', '42 Elm St'), 
(3, 500.00, 'paid', '78 Maple Ave'), 
(4, 40.00, 'pending', '9 South Rd'), 
(5, 25.00, 'paid', '55 Market St'), 
(6, 75.00, 'pending', '2 River Rd');

-- Order Items
INSERT INTO order_items (order_id, product_id, quantity, price) VALUES 
(1, 1, 2, 500.00),
(2, 3, 3, 20.00),
(3, 2, 1, 500.00),
(4, 4, 2, 15.00),
(5, 5, 1, 40.00),
(6, 6, 3, 25.00);

-- Reviews
INSERT INTO reviews (user_id, product_id, rating, comment) VALUES 
(1, 1, 5, 'Excellent phone!'), 
(2, 2, 4, 'Very handy'), 
(3, 3, 3, 'Comfortable but not perfect'), 
(4, 4, 5, 'Love this book'), 
(5, 5, 4, 'Good blender'), 
(6, 6, 5, 'Fitness made easy'); 