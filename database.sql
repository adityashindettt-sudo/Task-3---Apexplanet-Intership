CREATE DATABASE IF NOT EXISTS user_management;
USE user_management;

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(50)
);
INSERT INTO roles (role_name) VALUES ('User'), ('Admin');

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role_id INT,
  profile_pic VARCHAR(255) DEFAULT 'default.png',
  FOREIGN KEY (role_id) REFERENCES roles(id)
);

INSERT INTO users (name, email, password, role_id) VALUES 
('Administrator', 'admin@gmail.com', '$2y$10$RCeZkWMCbqXkkS3LbN.OU.qCzRwJeZl2gOrQow8bA2Fz8jZ6vO0XK', 2);
