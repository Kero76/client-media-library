-- Database users who represent the user can interact with administration side of app.
DROP TABLE IF EXISTS mc_users;

CREATE TABLE mc_users (
    usr_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usr_name VARCHAR(50) NOT NULL,
    usr_password VARCHAR(88) NOT NULL,
    usr_salt VARCHAR(23) NOT NULL,
    usr_role VARCHAR(50) NOT NULL
) ENGINE = innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;
