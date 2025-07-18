-- SQL code to create the 'users' table for registration and login
-- This table will store user information including a unique ID, username, email, password hash, and registration timestamp.
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique identifier for each user, auto-increments
    username VARCHAR(50) NOT NULL UNIQUE, -- User's chosen username, must be unique
    email VARCHAR(100) NOT NULL UNIQUE, -- User's email address, must be unique
    password_hash VARCHAR(255) NOT NULL, -- Hashed password for security (NEVER store plain passwords)
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp of when the user registered
);