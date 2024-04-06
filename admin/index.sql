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
-- Disable foreign key checks
SET FOREIGN_KEY_CHECKS = 0;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

TRUNCATE TABLE messages;
TRUNCATE TABLE projects;
TRUNCATE TABLE project_images;

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
ALTER TABLE projects ADD category varchar(20) NOT NULL;
ALTER TABLE projects ADD sub_category varchar(20) NOT NULL;
ALTER TABLE projects MODIFY location varchar(200) AFTER project_desc;
ALTER TABLE projects MODIFY project_id varchar(100) AFTER id;


CREATE TABLE projects
(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id VARCHAR(100) NOT NULL UNIQUE,
    project_name VARCHAR(50) NOT NULL,
    project_desc TEXT,
    category VARCHAR(20),
    sub_category INT UNSIGNED,
    location VARCHAR(100),
    status ENUM('1','0') NOT NULL DEFAULT '1',
    FOREIGN KEY (category) REFERENCES categories(cid)  ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (sub_category) REFERENCES sub_categories(id)  ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE projects_images
(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pid VARCHAR(100),
    project_image VARCHAR(50) NOT NULL,
    Foreign Key (pid) REFERENCES projects(project_id) ON DELETE CASCADE ON UPDATE CASCADE
)

RENAME TABLE projects_images TO project_images;
ALTER TABLE categories
MODIFY id BIGINT AUTO_INCREMENT;

ALTER Table sub_categories
DROP COLUMN category_id;

ALTER Table projects
DROP COLUMN project_image;