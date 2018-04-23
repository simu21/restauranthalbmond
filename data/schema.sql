DROP DATABASE gastro_culture_DB;

CREATE  DATABASE gastro_culture_DB;

USE gastro_culture_DB;

CREATE TABLE  users (
  user_id   	INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username  	VARCHAR(64)  NOT NULL,
  firstname 	VARCHAR(64)  NOT NULL,
  lastname  	VARCHAR(64)  NOT NULL,
  email     	VARCHAR(128) NOT NULL,
  password  	VARCHAR(80)  NOT NULL,
  user_picture  VARCHAR(64)  NOT NULL,
  PRIMARY KEY  (user_id));

CREATE TABLE  regions (
  region_id     INT UNSIGNED NOT NULL AUTO_INCREMENT,
  region        VARCHAR(64)  NOT NULL,
  PRIMARY KEY  (region_id));

CREATE TABLE  countries (
  country_id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  region_id     INT UNSIGNED NOT NULL,
  country       VARCHAR(64)  NOT NULL,
  language      VARCHAR(64)  NOT NULL,
  population    INT NOT NULL,
  PRIMARY KEY  (country_id),
  CONSTRAINT FK_Region FOREIGN KEY (region_id)
  REFERENCES regions(region_id)
  ON DELETE CASCADE);

CREATE TABLE  recipes (
  recipe_id    	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  country_id   	 INT UNSIGNED NOT NULL,
  recipe       	 VARCHAR(64)  NOT NULL,
  culture      	 VARCHAR(64)  NOT NULL,
  history      	 VARCHAR(500) NOT NULL,
  description  	 VARCHAR(500) NOT NULL,
  recipe_picture VARCHAR(64)  NOT NULL,
  PRIMARY KEY  (recipe_id),
  CONSTRAINT FK_Country FOREIGN KEY (country_id)
  REFERENCES countries(country_id)
  ON DELETE CASCADE);

CREATE TABLE  ingredients (
  ingredient_id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  ingredient       VARCHAR(64)  NOT NULL,
  PRIMARY KEY  (ingredient_id));

CREATE TABLE  ingredients_recipies (
  ingredient_recipe_id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
  ingredient_id           INT UNSIGNED NOT NULL,
  recipe_id               INT UNSIGNED NOT NULL,
  quantity           	  VARCHAR(20) NOT NULL,
  PRIMARY KEY  (ingredient_recipe_id),
  CONSTRAINT FK_Ingredient FOREIGN KEY (ingredient_id)
  REFERENCES ingredients(ingredient_id)
  ON DELETE CASCADE,
  CONSTRAINT FK_Recipe FOREIGN KEY (recipe_id)
  REFERENCES recipes(recipe_id)
  ON DELETE CASCADE);

INSERT INTO ingredients (ingredient) VALUES
  ('Chäs'),
  ('Spaghetti'),
  ('Nüsse'),
  ('Ananas'),
  ('Härdöpfffu');


INSERT INTO regions (region) VALUES
  ('Alaska'),
  ('Canada'),
  ('Europe'),
  ('Russia'),
  ('USA'),
  ('South America'),
  ('Africa'),
  ('Asia'),
  ('Australia');
  
 INSERT INTO countries (region_id, country, language, population) VALUES
  (3, 'Italy', 'Italian', 60000000),
  (3, 'Switzerland', 'Italian, German, French, Romande', 8000000),
  (3, 'England', 'English', 40000000);

INSERT INTO recipes (country_id, recipe, culture, history, description) VALUES
	(1, 'Spaghetti', 'Italian', 'Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.','Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.'),
	(1, 'Lasagne', 'Italian', 'Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.','Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.'),
	(1, 'Parmigiana', 'Italian', 'Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.','Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.'),
	(1, 'Pizza', 'Italian', 'Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.','Lorem ipsum dolor sit amet, te legere vocibus vim, iisque invidunt vix ne. Eu stet animal concludaturque nec. Legimus detraxit consulatu per ea, senserit disputando ea vim. An verterem liberavisse est, no eos liber eligendi. Quo et tollit postea. Mea ei doctus aeterno. Mel posse regione adipiscing ne, et sale nulla temporibus nam, in nostrud iuvaret invenire mei. Nibh veritus efficiantur ei mea. Eum lobortis constituam cu, an eos essent volutpat voluptaria. In dolor insolens sed, vis novum discere ei. Maiorum insolens sapientem ne ius, altera commune mandamus per id, pri an ipsum exerci eligendi. Cu ipsum signiferumque mea, hinc dolor invenire ea per. Eu duo vitae inermis noluisse, pri stet accommodare cu. Sed quas debitis scripserit at, nam saepe mentitum mediocrem in. Putant nonumes suavitate vis in. Partem impetus vis te. Tota elitr vel te. Per te mucius saperet. Eu duo audire phaedrum argumentum, eu nostrum perfecto pri. Quo tamquam voluptatum ne, duo justo lucilius at. Ei sed fugit oblique, tempor adolescens scripserit nec cu. Sea ei esse quodsi, per probatus dissentiet no, sed ei audiam fastidii prodesset. Principes euripidis in sed, eam ad aliquip euismod molestie. Vis no volutpat molestiae interpretaris, cu mea falli essent senserit. Debet delicatissimi sit no, usu no rebum oratio recteque, vel eu vide maiestatis democritum.');

INSERT INTO ingredients_recipies (ingredient_id, recipe_id, quantity) VALUES
	(1, 1, '500KG'),
	(2, 1, '600KG'),
	(3, 1, '700KG'),
	(4, 1, '800KG'),
	(5, 1, '900KG');