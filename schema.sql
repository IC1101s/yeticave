CREATE DATABASE yeticave;	
USE yeticave;

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(128),
	code VARCHAR(128) UNIQUE
);

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_lot INT,
	id_bet INT,
	date_create DATETIME DEFAULT CURRENT_TIMESTAMP,
	email VARCHAR(128) NOT NULL UNIQUE,
	name VARCHAR(128),
	pass_hash TEXT,
	contacts TEXT
);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_user INT,
	id_winner INT,
	id_category INT,
	FOREIGN KEY (id_user) REFERENCES users(id),
	FOREIGN KEY (id_winner) REFERENCES users(id),
	FOREIGN KEY (id_category) REFERENCES categories(id),
	date_create DATETIME DEFAULT CURRENT_TIMESTAMP,
	name VARCHAR(255),
	description TEXT,
	url_img VARCHAR(255),
	price INT,
	date_end DATE,
	price_step INT
);

CREATE TABLE bets (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_user INT,
	id_lot INT,
	FOREIGN KEY (id_user) REFERENCES users(id),
	FOREIGN KEY (id_lot) REFERENCES lots(id),
	date_bet DATETIME DEFAULT CURRENT_TIMESTAMP,
	price INT
);

ALTER TABLE users
ADD FOREIGN KEY (id_bet) REFERENCES bets(id),
ADD FOREIGN KEY (id_lot) REFERENCES lots(id);