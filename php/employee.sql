CREATE TABLE employee_table (
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
	matricule CHAR(4) NOT NULL UNIQUE,
	firstName VARCHAR(20) NOT NULL,
	lastName VARCHAR(20) NOT NULL,
	departement VARCHAR(20) NOT NULL,
	fonction VARCHAR(20) NOT NULL,
	salaire DECIMAL(10,4) NOT NULL,
	em_date DATE NOT NULL,
	photo VARCHAR(100) NOT NULL,
	PRIMARY KEY (id)
);