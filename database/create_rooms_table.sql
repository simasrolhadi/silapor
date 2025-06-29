CREATE TABLE rooms (
    room_id INT AUTO_INCREMENT PRIMARY KEY NULL,
    room_name VARCHAR(260) NOT NULL,
    floor VARCHAR(3),
    department_id INT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON UPDATE CASCADE ON DELETE SET NULL
);