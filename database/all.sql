CREATE DATABASE silapor;
USE silapor;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(260) NOT NULL,
    user_name VARCHAR(160) NOT NULL UNIQUE,
    contact VARCHAR(15) NOT NULL,
    password VARCHAR(260) NOT NULL,
    role ENUM('admin', 'dosen', 'mahasiswa'),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
ALTER TABLE users AUTO_INCREMENT = 10001;

CREATE TABLE devices (
    device_id VARCHAR(260) PRIMARY KEY,
    device_name VARCHAR(260) NOT NULL UNIQUE,
    specifications TEXT,
    purchase_date DATE NOT NULL,
    quantity INT,
    location VARCHAR(160) NOT NULL,
    conditions ENUM('sangat baik', 'baik', 'rusak') NOT NULL,
    image VARCHAR(360),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE departments (
    department_id INT AUTO_INCREMENT UNIQUE NULL,
    name VARCHAR(260) NOT NULL
);

CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT UNIQUE NULL,
    room_name VARCHAR(260) NOT NULL,
    floor VARCHAR(3),
    department_id INT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON UPDATE CASCADE ON DELETE SET NULL
);

CREATE TABLE borrowings (
    borrowed_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    device_id VARCHAR(260) NOT NULL,
    pickup_time TIMESTAMP,
    return_limit DATETIME,
    room_id INT,
    status ENUM('dipinjam', 'dikembalikan'),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(room_id) ON UPDATE CASCADE ON DELETE SET NULL
);