CREATE DATABASE hw1;

CREATE TABLE users (
    id integer primary key AUTO_INCREMENT,
    name varchar(255) not null,
    surname varchar(255) not null,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique
) Engine = InnoDB;

CREATE TABLE rooms (
    tipo varchar(255) PRIMARY KEY, 
    prezzo_€ integer,
    posti_letto integer,
    numero_camere integer,
    n_disponibili integer
 ) Engine=InnoDB;


 INSERT INTO rooms VALUES ('Benchmark','80.0','1','5','5');
 INSERT INTO rooms VALUES ('The Sovereign','150.0','2','5','5');
 INSERT INTO rooms VALUES ('Diamond','300','4.0','3','3');
 INSERT INTO rooms VALUES ('Aspire','200','2.0','3','3');

 CREATE TABLE booked_rooms (
     nome_camera varchar(255) PRIMARY KEY,
     user_id integer not null,
     n_camere_prenot integer not null,
     check_in DATE,
     check_out DATE,
     n_persone integer,
     prezzo_tot integer,
     FOREIGN key(user_id) REFERENCES users(id),
     FOREIGN key(nome_camera) REFERENCES rooms(tipo)
     
 ) Engine=InnoDB;
