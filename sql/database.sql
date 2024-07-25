-- -- Create the database
-- CREATE DATABASE myproject_db;

-- -- Use the database
-- USE myproject_db;

-- -- Create the Person table (for children and adults)
-- CREATE TABLE person (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL, 
--     county VARCHAR(100) NOT NULL,
--     village VARCHAR(100) NOT NULL,
--     date_enrolled DATE NOT NULL,
--     name_of_father VARCHAR(100) DEFAULT NULL,
--     name_of_mother VARCHAR(100)DEFAULT NULL,
--     contact INT(11) DEFAULT NULL,
--     name_of_child_officer_involved VARCHAR(100) DEFAULT NULL,
--     court_commital VARCHAR(100) DEFAULT NULL,
--     profile_picture VARCHAR(255) DEFAULT NULL
-- );
-- CREATE TABLE adult (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL,
--     county VARCHAR(100) NOT NULL,
--     village VARCHAR(100) NOT NULL,
--     date_enrolled DATE NOT NULL,
--     name_of_father VARCHAR(100) DEFAULT NULL,
--     name_of_mother VARCHAR(100)DEFAULT NULL,
--     contact INT(11) DEFAULT NULL,
--     name_of_child_officer_involved VARCHAR(100) DEFAULT NULL,
--     court_commital VARCHAR(100) DEFAULT NULL,
--     profile_picture VARCHAR(255) DEFAULT NULL
-- );

-- -- Create the Staff table
-- CREATE TABLE staff (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     role VARCHAR(255) NOT NULL,
--     contact_info VARCHAR(255) NOT NULL,
--     date_joined DATE NOT NULL
-- );

-- -- Create the Volunteer table
-- CREATE TABLE Volunteer (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--    first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL,
--     role VARCHAR(100) NOT NULL,
--     contact_info VARCHAR(100) NOT NULL,
--     availability VARCHAR(100) NOT NULL,
--     skills VARCHAR(100) NOT NULL,
--     start_date DATE NOT NULL,
--     last_updated DATE NOT NULL
-- );

-- -- Create the BoardMember table
-- CREATE TABLE board_member (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     first_name VARCHAR(100) NOT NULL,
--     last_name VARCHAR(100) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     position VARCHAR(255) NOT NULL,
--     contact_info VARCHAR(255) NOT NULL,
--     start_date DATE NOT NULL
-- );


-- -- Create the Donation table
-- CREATE TABLE Donation (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     item_name VARCHAR(100) NOT NULL,
--     quantity INT NOT NULL,
--     monthly_deficit INT NOT NULL,
--     yearly_deficit INT NOT NULL,
--     total_quantity INT NOT NULL
-- );
-- --create the admin table
-- CREATE TABLE admin(
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL
-- );




-- -- the code above is fully functional
-- -- use this to alter staff and boardmembers table by adding the email column 
-- -- code
-- -- ALTER TABLE board_members
-- -- ADD COLUMN email VARCHAR(255) NOT NULL;
-- -- ALTER TABLE staff
-- -- ADD COLUMN email VARCHAR(255) NOT NULL;

