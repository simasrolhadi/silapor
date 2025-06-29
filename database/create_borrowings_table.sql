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