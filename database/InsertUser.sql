use Cronose;

insert into Province(name) values ('Illes Balears');
insert into City values(07500,1,'Manacor',3.20142,39.57434);
insert into Media(extension,url) values('.jpg','admmin_avatar');
insert into Media(extension,url) values('.jpg','admmin_dni');
insert into DNI_Photo(status,media_id) values ('accepted',2);
insert into User values ('12345678A','Admin','Cronose','Cronose','admin@cronose.dawman.info','202cb962ac59075b964b07152d234b70',0000,0.00,date(now()),0,0,07500,1,1,1);