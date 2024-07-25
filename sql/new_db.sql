CREATE DATABASE IF NOT EXISTS myproject_db;
USE myproject_db;
-- Create the admin table
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the adult table
CREATE TABLE adult (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    county VARCHAR(100) NOT NULL,
    village VARCHAR(100) NOT NULL,
    date_enrolled DATE NOT NULL,
    name_of_father VARCHAR(100) DEFAULT NULL,
    name_of_mother VARCHAR(100) DEFAULT NULL,
    contact INT DEFAULT NULL,
    name_of_child_officer_involved VARCHAR(100) DEFAULT NULL,
    court_commital VARCHAR(100) DEFAULT NULL,
    profile_picture VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the boardmember table
CREATE TABLE boardmember (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    position VARCHAR(255) NOT NULL,
    contact_info VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    date_joined VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the donation table
CREATE TABLE donation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    original_quantity INT NULL
);


-- Create the person table
CREATE TABLE person (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    county VARCHAR(100) NOT NULL,
    village VARCHAR(100) NOT NULL,
    date_enrolled DATE NOT NULL,
    name_of_father VARCHAR(100) DEFAULT NULL,
    name_of_mother VARCHAR(100) DEFAULT NULL,
    contact INT DEFAULT NULL,
    name_of_child_officer_involved VARCHAR(100) DEFAULT NULL,
    court_commital VARCHAR(100) DEFAULT NULL,
    profile_picture VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the staff table
CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role VARCHAR(255) NOT NULL,
    contact_info VARCHAR(255) NOT NULL,
    date_joined DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the volunteer table
CREATE TABLE volunteer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    contact_info VARCHAR(100) NOT NULL,
    availability VARCHAR(100) NOT NULL,
    skills VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    last_updated DATE NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
