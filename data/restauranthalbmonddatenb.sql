DROP DATABASE IF EXISTS restauranthalbmond_db;

CREATE DATABASE restauranthalbmond_db;

USE restauranthalbmond_db;

CREATE TABLE users (
  user_id		int(11) NOT NULL,
  vorname		varchar(55) NOT NULL,
  nachname		varchar(55) NOT NULL,
  mail			varchar(100) NOT NULL,
  passwort		varchar(255) NOT NULL,
  plz			int(10) NOT NULL,
  ort			varchar(55) NOT NULL,
  telefonnummer varchar(20) NOT NULL,
  admin			int(11) NOT NULL,
  PRIMARY KEY (user_id));

CREATE TABLE artgerichte(
  artgericht_id int(11) NOT NULL AUTO_INCREMENT,
  gerichtname	varchar(55) NOT NULL,
  beschreibung  text NOT NULL,
  PRIMARY KEY (artgericht_id));

CREATE TABLE gerichte (
  gericht_id	int(11) NOT NULL,
  gerichtname	varchar(55) NOT NULL,
  beschreibung  varchar(255) NOT NULL,
  preis			varchar(10) NOT NULL,
  bildpfad		varchar(255) NOT NULL,
  artgericht_id int(11) NOT NULL,
  PRIMARY KEY (gericht_id),
  CONSTRAINT FK_artgerichte(artgericht_id)
  REFERENCES artegerichte(artgericht_id)
  ON DELETE CASCADE);
