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

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mybloguser@localhost
IDENTIFIED BY 'myblogpw';