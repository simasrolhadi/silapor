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