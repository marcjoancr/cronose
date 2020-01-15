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

insert into User(dni, name, surname, surname_2, email, password, tag, initials, coins, registration_date, points, private, city_cp, province_id, avatar_id, dni_photo_id) values ('12345678A','Admin','Cronose','Cronose','admin@cronose.dawman.info','202cb962ac59075b964b07152d234b70',1254,'ACC',0.00,date(now()),0,0,07500,1,1,1);
insert into User(dni, name, surname, surname_2, email, password, tag, initials, coins, registration_date, points, private, city_cp, province_id, avatar_id, dni_photo_id) values ('87654321Z','Anastasia','Guiterrez','Marcos','Anastasi@cgmail.com','202cb962ac59075b964b07152d234b70',9875, 'AGC' ,0.00,date(now()),0,0,07500,1,1,1);
insert into User(dni, name, surname, surname_2, email, password, tag, initials, coins, registration_date, points, private, city_cp, province_id, avatar_id, dni_photo_id) values ('45612387J','Josep','Oliver','Sanso','josep.oliverr@gmail.com','202cb962ac59075b964b07152d234b70',1313, 'JOS',3.00,date(now()),0,0,07500,1,1,1);

select * from User;

insert into Category(coin_price) values (1.2),(1);

insert into Category_Language values ('es',1,'Educación'),('ca',1,'Educació'),('en',1,'Education'),('es',2,'Mantenimiento'),('ca',2,'Manteniment'),('en',2,'Maintenance');

select * from Category;

insert into Specialization(category_id) values (1),(2);

insert into Specialization_Language 
values ('es',1,'Profesor Programación'),('ca',1,'Professor Programació'),('en',1,'Programming Professor'),
('es',2,'Fontanero'),('ca',2,'Lampista'),('en',2,'Plumber');

INSERT INTO Offer(user_id, specialization_id, valoration_avg, personal_valoration, coin_price, offered_at, visibility) VALUES 
('1', '1', '90', '70', '1.2', '2019-12-21', '1'),
('2', '2', '50', '50', '1', '2019-12-22', '1');
INSERT INTO Offer_Language (language_id, user_id, specialization_id, title, description) 
VALUES ('es', '1', '1', 'Profesor de programación', 'Programación básica de c++, Programación avanzada de Java, '),
('ca', '1', '1', 'Professor de programació', 'Programació básica de c++, Programació avançada de Java, '),
('en', '1', '1', 'Programming Professor', 'Basic programming of c++, Advanced programming of Java, ');
INSERT INTO Offer_Language (language_id, user_id, specialization_id, title, description) 
VALUES ('es', '2', '2', 'Fontanero', 'No hay ni uno igual ');

insert into Media(extension, url) values ('.jpg','profesor'),('.jpg','fontanero');

INSERT INTO Achievement values (),(),(),(),();

INSERT INTO `obtain` (`achievement_id`, `user_id`, `obtained_at`) VALUES
(1, 1, '2020-01-08'),
(3, 1, '2020-01-02');


/*INSERT INTO Load_Media (user_dni, specialization_id, media_id) VALUES ('12345678A', '1', '3'), ('12345678A', '2', '4');

delete from Message where sender_dni = '12345678A';
delete from Message where sender_dni = '87654321Z';
select User.name,message,Message.sended_date from Message,User where Message.sender_dni = User.dni and receiver_dni = '87654321Z' order by message desc limit 1;

select Offer.user_dni,Offer_Language.language_id,User.name,Offer_Language.title,Offer_Language.description,Offer.personal_valoration,Offer.valoration_avg,Offer.coin_price
from Offer,Offer_Language,User where Offer.user_dni = Offer_Language.user_dni
and Offer.specialization_id = Offer_Language.specialization_id and User.dni = Offer.user_dni
and Offer_Language.language_id='es' and User.dni = '%a%';

select User.name,message,Message.sended_date from Message,User where Message.sender_dni = User.dni and receiver_dni = '12345678A' group by Message.receiver_dni;
select User.name,message,Message.sended_date from Message,User where Message.sender_dni = User.dni and receiver_dni = '12345678A' order by message desc limit 1;

select User.name,message,Message.sended_date from Message,User where Message.sender_dni = User.dni and receiver_dni = '87654321Z' group by receiver_dni;