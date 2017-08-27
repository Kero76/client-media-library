/**
 * MediaClient.
 * Copyright (C) 2017 Nicolas GILLE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

-- Database users who represent the user can interact with administration side of app.
DROP TABLE IF EXISTS mc_users;

CREATE TABLE mc_users (
    usr_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usr_name VARCHAR(50) NOT NULL,
    usr_mail VARCHAR(255) NOT NULL,
    usr_password VARCHAR(88) NOT NULL,
    usr_salt VARCHAR(23) NOT NULL,
    usr_role VARCHAR(50) NOT NULL
) ENGINE = innodb CHARACTER SET utf8 COLLATE utf8_unicode_ci;
