    DROP DATABASE IF EXISTS ReportReturn;

    CREATE DATABASE ReportReturn;

    USE ReportReturn;

	CREATE TABLE Reports(
	 	id INT AUTO_INCREMENT,
	 	code VARCHAR(255) UNIQUE NOT NULL,
	 	report LONGTEXT NOT NULL,
	 	date VARCHAR(255) NOT NULL,
		reportdate VARCHAR(255) NOT NULL,
	 	response LONGTEXT NULL,
		email VARCHAR(255) NULL,
	 	name VARCHAR(255) NULL,
		state INT DEFAULT(0),
	 	PRIMARY KEY(id)
	 	
	 );
	 
 	CREATE TABLE Admin(
	 	id INT AUTO_INCREMENT,
	 	name VARCHAR(255) UNIQUE NOT NULL,
	 	password VARCHAR(255) NOT NULL,
	 	admin INT DEFAULT(0),
	 	PRIMARY KEY(id) 
	 );

    
    INSERT INTO admin (name, PASSWORD, admin) VALUES ('admin', '$2y$10$RKrzd0pqpJMyjaHNwlO97e/ZSR0vEpP532bzVGM8p4K.gLaGQILqq', 1)