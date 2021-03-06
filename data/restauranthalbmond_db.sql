DROP DATABASE IF EXISTS restauranthalbmond_db;

CREATE DATABASE restauranthalbmond_db;

USE restauranthalbmond_db;

CREATE TABLE users (
  id			int(11) NOT NULL AUTO_INCREMENT,
  vorname		varchar(55) NOT NULL,
  nachname		varchar(55) NOT NULL,
  mail			varchar(100) NOT NULL,
  passwort		varchar(255) NOT NULL,
  plz			int(10) NOT NULL,
  ort			varchar(55) NOT NULL,
  telefonnummer varchar(20) NOT NULL,
  admin			int(11) NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE artgerichte(
  id			int(11) NOT NULL AUTO_INCREMENT,
  gerichtname	varchar(55) NOT NULL,
  beschreibung  text NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE gerichte (
  id	int(11) NOT NULL AUTO_INCREMENT,
  gerichtname	varchar(55) NOT NULL,
  beschreibung  varchar(255) NOT NULL,
  preis			varchar(10) NOT NULL,
  bildpfad		varchar(255) NOT NULL,
  artgericht_id int(11) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_artgerichte FOREIGN KEY (artgericht_id)
  REFERENCES artgerichte(id)
  ON DELETE CASCADE);

CREATE TABLE tische (
  id		int(11) NOT NULL AUTO_INCREMENT,
  tischname		varchar(55) NOT NULL,
  pl�tze		int(11) NOT NULL,
  ort			varchar(55) NOT NULL,
  PRIMARY KEY (id));
  
CREATE TABLE reservation (
	id					int(11) NOT NULL AUTO_INCREMENT,
	tisch_id			int(11) NOT NULL,
	user_id				int(11) NOT NULL,
	anzahl_personen		int(11) NOT NULL,
	datum				date NOT NULL,
	zeit				time NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT FK_tische FOREIGN KEY (tisch_id)
	REFERENCES tische(id)
	ON DELETE CASCADE,
	CONSTRAINT FK_users FOREIGN KEY (user_id)
	REFERENCES users(id)
	ON DELETE CASCADE);		