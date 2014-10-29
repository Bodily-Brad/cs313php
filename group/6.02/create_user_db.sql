-- --------------------------------------------------------------------------------
--  Program Name:   create_user_db.sql
--  Program Author: Chris Vergaray
--  Creation Date:  27-Oct-2014
-- --------------------------------------------------------------------------------

-- This enables dropping tables with foreign key dependencies.
-- It is specific to the InnoDB Engine.
SET FOREIGN_KEY_CHECKS = 0; 

-- Drop Database commands are disabled
-- SELECT 'users_db' as "Drop Database";
-- DROP DATABASE IF EXISTS users_db;

-- This will only run once. After the first run, comment out this next line
CREATE DATABASE users_db;

use users_db;

-- Conditionally drop objects.
SELECT 'USER' AS "Drop Table";
DROP TABLE IF EXISTS user;

-- ------------------------------------------------------------------
-- Create and seed SCRIPTURES table.
-- ------------------------------------------------------------------
SELECT 'USER' AS "Create Table";

CREATE TABLE user
( user_id             	      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, user_name                   CHAR(30)     NOT NULL
, password                    CHAR(30)     NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Commit inserts.
COMMIT;

-- Display tables.
SHOW TABLES;

