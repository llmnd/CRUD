
-- create DATABASE ml;
create table utilisateurs (
    id int primary key auto_increment,
    nom varchar(255) not null,
    prenom varchar(255) not null,
    login varchar(255) not null,
    password varchar(255) not null,
    profile varchar(255) not null
);
insert into utilisateurs (nom, prenom, login, password, profile) values
 ('cisse', 'modou', 'galsen', 'passer', './maphoto.jpeg');
