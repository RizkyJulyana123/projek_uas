CREATE DATABASE IF NOT EXISTS manajemen_penjualan;
USE manajemen_penjualan;

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50)
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255),
  role_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);

INSERT INTO roles (name) VALUES ('Admin'), ('Staff');
INSERT INTO users (name, email, password, role_id)
VALUES ('Admin', 'admin@mail.com', MD5('admin123'), 1);
