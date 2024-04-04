-- Active: 1709645615779@@127.0.0.1@3306@znm

CREATE TABLE messages
(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(50) NOT NULL,
    sender_phone VARCHAR(25) DEFAULT '------',
    sender_email VARCHAR(100) NOT NULL,
    sender_message TEXT NOT NULL,
    status ENUM('unread','seen') NOT NULL DEFAULT 'unread',
    receive_date DATE,
    receive_time TIME
)

ALTER TABLE messages
MODIFY COLUMN status ENUM('unread','seen') NOT NULL DEFAULT 'unread';

TRUNCATE TABLE messages;
TRUNCATE TABLE projects;

ALTER TABLE messages
AUTO_INCREMENT = 1;
ALTER TABLE projects
AUTO_INCREMENT = 1;

ALTER TABLE categories
AUTO_INCREMENT = 1;

DROP Table projects;
DROP Table sub_categories;

ALTER TABLE projects ADD location varchar(200) NOT NULL;
ALTER TABLE projects ADD project_id varchar(100) NOT NULL UNIQUE;
ALTER TABLE projects MODIFY location varchar(200) AFTER project_desc;
ALTER TABLE projects MODIFY project_id varchar(100) AFTER id;

CREATE TABLE projects
(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_image VARCHAR(100),
    project_name VARCHAR(50) NOT NULL,
    project_desc TEXT,
    status ENUM('1','0') NOT NULL DEFAULT '1'
)

ALTER TABLE categories
MODIFY id BIGINT AUTO_INCREMENT;

ALTER Table sub_categories
DROP COLUMN category_id;