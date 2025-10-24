CREATE DATABASE IF NOT EXISTS baza;
USE baza;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    wiek INT NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO users (imie, nazwisko, wiek, email) VALUES
('Jan', 'Kowalski', 25, 'jan.kowalski@example.com'),
('Anna', 'Nowak', 30, 'anna.nowak@example.com'),
('Piotr', 'Wiśniewski', 22, 'piotr.wisniewski@example.com');

SELECT * FROM users;
