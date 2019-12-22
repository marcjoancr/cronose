use Cronose;

insert into Language values (),(),();
insert into Language_Translation values (1,1,'Español'),(1,2,'Espanyol'),(1,3,'Spanish');
insert into Language_Translation values (2,1,'Catalán'),(2,2,'Català'),(2,3,'Catalan');
insert into Language_Translation values (3,1,'Inglés'),(3,2,'Anglès'),(3,3,'English');
select * from Language;
select * from Language_Translation;
select Language_Translation.translation from Language_Translation,Language where Language_Translation.language_id = Language.id and Language_Translation.translation = 'Espanyol';

insert into Province(name) values ('Illes Balears');
insert into City values(07500,1,'Manacor',3.20142,39.57434);
insert into Media(extension,url) values('.jpg','admmin_avatar');
insert into Media(extension,url) values('.jpg','admmin_dni');
insert into DNI_Photo(status,media_id) values ('accepted',2);
insert into User values ('12345678A','Admin','Cronose','Cronose','admin@cronose.dawman.info','202cb962ac59075b964b07152d234b70',0000,0.00,date(now()),0,0,07500,1,1,1);

select * from Category_Language;

insert into Category(coin_price) values (1.2),(1);
insert into Category_Language values (1,1,'Educación'),(2,1,'Educació'),(3,1,'Education'),(1,2,'Mantenimiento'),(2,2,'Manteniment'),(3,2,'Maintenance');
insert into Specialization(category_id) values (1),(2);
insert into Specialization_Language 
values (1,1,'Profesor Programación'),(2,1,'Professor Programació'),(3,1,'Programming Professor'),
(1,2,'Fontanero'),(2,2,'Lampista'),(3,2,'Plumber');

select * from Specialization_Language;

INSERT INTO Offer(user_dni, specialization_id, valoration_avg, personal_valoration, coin_price, offered_at, visibility) VALUES 
('12345678A', '1', '90', '70', '1.2', '2019-12-21', '1'),
('12345678A', '2', '50', '50', '1', '2019-12-22', '1');
INSERT INTO Offer_Language (language_id, user_dni, specialization_id, title, description) 
VALUES ('1', '12345678A', '1', 'Profesor de programación', 'Programación básica de c++, Programación avanzada de Java, '),
('2', '12345678A', '1', 'Professor de programació', 'Programació básica de c++, Programació avançada de Java, '),
('3', '12345678A', '1', 'Programming Professor', 'Basic programming of c++, Advanced programming of Java, ');
INSERT INTO Offer_Language (language_id, user_dni, specialization_id, title, description) 
VALUES ('1', '12345678A', '2', 'Fontanero', 'No hay ni uno igual ');

select * from Offer_Language;
select * from Offer;
select * from Specialization_Language;
select * from Language;

select Offer_Language.title,Offer_Language.language_id from  Offer,Offer_Language where Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni; 

insert into Media(extension, url) values ('.jpg','profesor'),('.jpg','fontanero');

select * from Media;

INSERT INTO Load_Media (user_dni, specialization_id, media_id) VALUES ('12345678A', '1', '3'), ('12345678A', '2', '4');

select concat(Media.url,Media.extension) as media, Load_Media.specialization_id, Load_Media.user_dni from Media,Load_Media where Media.id = Load_Media.media_id;

select Language_Translation.translation,User.name,Offer_Language.title,Offer_Language.description,concat(Media.url,Media.extension) as media from Offer,Offer_Language,User,Language,Language_Translation
where User.dni = Offer.user_dni and Offer.user_dni = Offer_Language.user_dni and Language.id = Offer_Language.language_id
and Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni
and Language_Translation.language_id = Language.id and Language_Translation.translation = 'Spanish'
and User.name = 'Admin';

select * from Offer,Offer_Language;

/*select Language_Translation.translation as lang,User.name as name,Specialization_Language.name as SpecializationTitle,Offer_Language.title as title, Offer_Language.description as description,Offer.valoration_avg as val,Offer.personal_valoration as personal_val, Offer.coin_price as price
from Language,Language_Translation,Offer,Offer_Language,User,Specialization,Specialization_Language where
Language.id = Specialization_Language.language_id group by lang;*/
