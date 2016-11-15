DROP DATABASE IF EXISTS p2p;
CREATE DATABASE p2p;
USE p2p;

DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
	last_name VARCHAR(255) NOT NULL,
	first_name VARCHAR(255) NOT NULL,
	middle_initial VARCHAR(255),
	mobile_number VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	is_admin BOOLEAN DEFAULT 0,
	email VARCHAR(255),
	user_type INT
);

INSERT INTO users (last_name, first_name, middle_initial, mobile_number, password, is_admin, email)
VALUES 
	('Domingo','Nikki','N','0917', 'password', TRUE, 'nikki@nikki.com'),
	('Impuerto','Mars','', '0917','password', FALSE, 'mars@mars.com'),
	('Salumbides','Katkat','N','0917','password',FALSE, 'kat@kat.com'),
	('Andan', 'JC', '', '0917','password', FALSE, 'jc@jc.com'),
	('Natividad', 'Carlo', 'M', '0917','password', FALSE, 'carlo@carlo.com'),
	('Park', 'Candy', 'H', '0917','password',FALSE, 'candy@candy.com'),
	('Bermejo', 'Irene', 'Y', '0917', 'password', FALSE, 'irene@irene.com');

DROP TABLE IF EXISTS loyolaschools;
CREATE TABLE loyolaschools(
	id INT PRIMARY KEY AUTO_INCREMENT,
	ls_id_number VARCHAR(255) NOT NULL,
	obf_email VARCHAR(255) NOT NULL
);

INSERT INTO loyolaschools (ls_id_number, obf_email)
VALUES
	('141370', 'jc.andan@obf.ateneo.edu'),
	('141371', 'carlo.natividad@obf.ateneo.edu');

DROP TABLE IF EXISTS staffs;
CREATE TABLE staffs(
	id INT PRIMARY KEY AUTO_INCREMENT,
	staff_id_number VARCHAR(255) NOT NULL,
	ateneo_email VARCHAR(255) NOT NULL,
	unit VARCHAR(255),
	department VARCHAR(255)
);

INSERT INTO staffs (staff_id_number, ateneo_email)
VALUES
	('1234', 'impuerto@ateneo.edu'),
	('1245', 'salumbides@ateneo.edu');

DROP TABLE IF EXISTS highschools;
CREATE TABLE highschools(
	id INT PRIMARY KEY AUTO_INCREMENT,
	hs_id_number VARCHAR(255) NOT NULL,
	grade_level VARCHAR(255) NOT NULL,
	section VARCHAR(255) NOT NULL,
	guardian_name VARCHAR(255),
	guardian_email VARCHAR(255),
	guardian_mobile_number VARCHAR(255)
);

INSERT INTO highschools(hs_id_number, grade_level,section)
VALUES
	('00123', '12', 'A'),
	('00124', '11', 'B');

		-- ('00123', '12', 'A', 'Willard', '0915'),
	-- ('00124', '11', 'B', 'JJ', '0913');

DROP TABLE IF EXISTS locations;
CREATE TABLE locations(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL
);

INSERT INTO locations(name)
VALUES
	('UP TechnoHub'),
	('SM Markina'),
	('Temple Drive');

DROP TABLE IF EXISTS timeslots;
CREATE TABLE timeslots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	time_slot TIME NOT NULL
);

INSERT INTO timeslots(time_slot)
VALUES
	('06:15:00'),
	('06:45:00'),
	('07:15:00');

DROP TABLE IF EXISTS slots;
CREATE TABLE slots(
	id INT PRIMARY KEY AUTO_INCREMENT,
	date_slots DATETIME,
	location_id INT,	
	is_pickup BOOLEAN,
	is_dropoff BOOLEAN,
	timeslot_id INT,
	num_of_seats INT NOT NULL,
	-- num_of_available_seats INT,
	status VARCHAR(255),
	FOREIGN KEY (location_id) REFERENCES locations(id),
	FOREIGN KEY (timeslot_id) REFERENCES timeslots(id)
);

INSERT INTO slots (location_id,is_pickup,is_dropoff, timeslot_id,num_of_seats)
VALUES
	(1, TRUE, FALSE, 1, 50),
	(2, FALSE, TRUE, 2, 40),
	(3, TRUE, FALSE, 1, 30);

DROP TABLE IF EXISTS reservations;
CREATE TABLE reservations(
	id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	slot_id INT NOT NULL,
	comment VARCHAR(255),
	num_of_passengers INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (slot_id) REFERENCES slots(id)
);

INSERT INTO reservations(user_id, slot_id, comment, num_of_passengers)
VALUES
	(2,1,"Mars' Reservation #1", 1),
	(2,2,"Mars' Reservations #2", 1),
	(3,2,"Katkat's Reservation #1", 2);

-- LOAD DATA INFILE 'loyolaschools-data.csv' 
-- INTO TABLE loyolaschools
-- FIELDS TERMINATED BY ','
-- ENCLOSED BY '"'
-- LINES TERMINATED BY '\n'
-- (ls_id_number, obf_email);