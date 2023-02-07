SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE final36;
USE final36;

CREATE TABLE membre(
    idM INTEGER PRIMARY KEY auto_increment,
    email varchar(50),
    mdp varchar(50),
    username varchar(30),
    superuser INTEGER
);

create table categorie(
    idC INTEGER PRIMARY KEY auto_increment,
    nom varchar(50)
);

create table objet(
    idO INTEGER PRIMARY KEY auto_increment,
    nom varchar(50),
    idM int,
    idC int,
    categorie INTEGER,
    titre_desc varchar(100),
    prix_estime double precision,
    foreign key (idM) references membre(idM),
    foreign key (idC) references categorie(idC)
);

create table photo(
    idP int primary key auto_increment,
    idO int,
    lien varchar(100),
    foreign key (idO) references objet(idO)
);

create table echange(
    idO1 int,
    idO2 int,
    date date,
    foreign key (idO1) references objet(idO),
    foreign key (idO2) references objet(idO)
);

create table demande(
    idO1 int,
    idO2 int,
    etat INTEGER,
    finDemande INTEGER,
    foreign key (idO1) references objet(idO),
    foreign key (idO2) references objet(idO)
);

insert into membre values(null,'tomy@yahoo.com','12345','Tomy',1);
insert into membre values(null,'santatra@gmail.com','qwerty','Santatra',1);
insert into membre values(null,'fiderana@gmail.com','zxcvb','Fiderana',1);
insert into membre values(null,'Soa@moov.com','aaaa','Soa',0);
insert into membre values(null,'Koto@gmail.com','bbbb','Koto',0);
insert into membre values(null,'Lita@gmail.com','cccc','Lita',0);

insert into categorie values(null,'menager');
insert into categorie values(null,'jouet');
insert into categorie values(null,'electronique');
insert into categorie values(null,'fourniture');
insert into categorie values(null,'livre');
insert into categorie values(null,'vetement');

insert into objet values(null,'t-shirt',5,6,1,'un t-shirt de campgne pour homme',1000);
insert into objet values(null,'telephone',6,3,1,'ocasion mais en excellent etat',100000);
insert into objet values(null,'stylo',4,4,1,'un bon stylo pour la bonne personne',1000);
insert into objet values(null,'yoyo',4,2,1,'donner un cadeau a votre enfant',1000);
insert into objet values(null,'sweat',1,6,1,'cool mais tien au chaud',3000);
insert into objet values(null,'fer a repasser',2,3,1,'parfait pour une mere de famille',20000);
insert into objet values(null,'21 Days change your habits change your life',4,5,1,'livre ecrit par Marc Reklau',5000);
insert into objet values(null,'air max',2,6,1,'soyez cool et a l aise',30000);
insert into objet values(null,'cahier de souvenir',4,1,0,'un livre rempli de souvenir',7000);
insert into objet values(null,'marmite',5,1,0,'excellent etat',17000);
insert into objet values(null,'balaie',6,1,0,'pour un foyer sain et propre',7000);

insert into demande(idO1,idO2) values(1,2);

create or replace view objetM as select nom,objet.idM,idC,categorie,titre_desc,prix_estime,username from objet join membre on objet.idM=membre.idM;
