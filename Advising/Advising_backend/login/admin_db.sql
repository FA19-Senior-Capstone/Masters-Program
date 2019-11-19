-- drops the database if it exitsts
-- so we wont have duplicates

drop DATABASE IF EXISTS users;

CREATE DATABASE users;

use users;

CREATE TABLE admin_users(
    admin_id INT NOT NULL AUTO_INCREMENT,
    admin_username VARCHAR(256),
    admin_password VARCHAR(256),

    PRIMARY KEY (admin_id)
);

INSERT INTO admin_users(admin_username, admin_password) VALUES
('admin', 'admin');