-- Create database
CREATE DATABASE IF NOT EXISTS lancaster_restaurant;
USE lancaster_restaurant;

-- Users table 
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Default user account
INSERT INTO user (fullname, email, password) VALUES
('John Doe', 'johndoe@example.com', '$2y$10$xljo12sBqWOBalHvMEpnHuyRcnfFbER.cJmGEtNLFTkacn1Lcfrne');

-- Staff table 
CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Default staff account
INSERT INTO staff (fullname, email, password) VALUES
('Alice Brown', 'alicebrown@example.com', '$2y$10$xljo12sBqWOBalHvMEpnHuyRcnfFbER.cJmGEtNLFTkacn1Lcfrne');

-- Services table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_date DATE NOT NULL,
    service_type ENUM('Breakfast', 'Lunch', 'Dinner'),
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    tables_available INT NOT NULL
);

-- Sample service for demo purposes - Remove it if you like
INSERT INTO services (service_date, service_type, start_time, end_time, tables_available)
VALUES  ('2025-01-16', 'Breakfast', '07:30:00', '10:00:00', 20),
        ('2025-01-16', 'Lunch', '12:00:00', '14:00:00', 10),
        ('2025-01-16', 'Dinner', '17:00:00', '21:30:00', 5);

-- Bookings table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_type ENUM('Breakfast', 'Lunch', 'Dinner') NOT NULL,
    service_id INT NOT NULL DEFAULT 0,
    customer_email VARCHAR(100) NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    party_size INT NOT NULL,
    tables_needed INT NOT NULL,
    booking_time TIME NOT NULL,
    date DATE NOT NULL,
    status BOOLEAN DEFAULT TRUE
);