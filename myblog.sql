-- Create the database
DROP DATABASE IF EXISTS myblog;
CREATE DATABASE myblog;
USE myblog;

CREATE TABLE posts (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    excerpt VARCHAR(100) NOT NULL,
    contents TEXT(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(200) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE (email)
);

INSERT INTO users (first_name, last_name, email, password)
VALUES
('Hector', 'Hawkins', 'hector@example.invalid', 'SuperSecret!'),
('Tanya', 'Lucas', 'tanya@example.invalid', 'SuperSecret!');

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mybloguser@localhost
IDENTIFIED BY 'myblogpw';