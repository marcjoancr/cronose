use Cronose;

insert into Language values ('es'),('ca'),('en');

insert into Language_Translation values ('es','es','Español'),('es','ca','Espanyol'),('es','en','Spanish');
insert into Language_Translation values ('ca','es','Catalán'),('ca','ca','Català'),('ca','en','Catalan');
insert into Language_Translation values ('en','es','Inglés'),('en','ca','Anglès'),('en','en','English');

insert into Province(name) values ('Illes Balears');

insert into City values(07500,1,'Manacor',3.20142,39.57434);

insert into Media(extension,url) values('.jpg','admmin_avatar');
insert into Media(extension,url) values('.jpg','admmin_dni');

insert into DNI_Photo(status,media_id) values ('accepted',2);

insert into User values ('12345678A','Admin','Cronose','Cronose','admin@cronose.dawman.info','202cb962ac59075b964b07152d234b70',0000,0.00,date(now()),0,0,07500,1,1,1);
insert into User values ('87654321Z','Anastasia','Guiterrez','Marcos','Anastasi@cgmail.com','202cb962ac59075b964b07152d234b70',0001,0.00,date(now()),0,0,07500,1,1,1);

insert into Category(coin_price) values (1.2),(1);

insert into Category_Language values ('es',1,'Educación'),('ca',1,'Educació'),('en',1,'Education'),('es',2,'Mantenimiento'),('ca',2,'Manteniment'),('en',2,'Maintenance');

insert into Specialization(category_id) values (1),(2);

insert into Specialization_Language 
values ('es',1,'Profesor Programación'),('ca',1,'Professor Programació'),('en',1,'Programming Professor'),
('es',2,'Fontanero'),('ca',2,'Lampista'),('en',2,'Plumber');

INSERT INTO Offer(user_dni, specialization_id, valoration_avg, personal_valoration, coin_price, offered_at, visibility) VALUES 
('12345678A', '1', '90', '70', '1.2', '2019-12-21', '1'),
('12345678A', '2', '50', '50', '1', '2019-12-22', '1');
INSERT INTO Offer_Language (language_id, user_dni, specialization_id, title, description) 
VALUES ('es', '12345678A', '1', 'Profesor de programación', 'Programación básica de c++, Programación avanzada de Java, '),
('ca', '12345678A', '1', 'Professor de programació', 'Programació básica de c++, Programació avançada de Java, '),
('en', '12345678A', '1', 'Programming Professor', 'Basic programming of c++, Advanced programming of Java, ');
INSERT INTO Offer_Language (language_id, user_dni, specialization_id, title, description) 
VALUES ('es', '12345678A', '2', 'Fontanero', 'No hay ni uno igual ');

insert into Media(extension, url) values ('.jpg','profesor'),('.jpg','fontanero');

INSERT INTO Load_Media (user_dni, specialization_id, media_id) VALUES ('12345678A', '1', '3'), ('12345678A', '2', '4');
