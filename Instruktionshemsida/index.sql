CREATE DATABASE website;

USE website;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

ALTER TABlE users ADD remember_token VARCHAR(64) DEFAULT NULL;