--
-- base de données: 'autoecole'
--
create database if not exists autoecole default character set utf8 collate utf8_general_ci;
use autoecole;
-- --------------------------------------------------------
-- creation des tables

set foreign_key_checks =0;

-- table client
drop table if exists client;
create table client (
	cli_id int not null auto_increment primary key,
    cli_nom varchar(100) not null 
)engine=innodb;

-- table moniteur
drop table if exists moniteur;
create table moniteur (
	mon_id int not null auto_increment primary key,
    mon_nom varchar(100) not null 
)engine=innodb;

-- table voiture
drop table if exists voiture;
create table voiture (
	voi_id int not null auto_increment primary key,
    voi_mat varchar(100) not null 
)engine=innodb;

-- table lecon
drop table if exists lecon;
create table lecon (
	lec_id int not null auto_increment primary key,
    lec_date date not null ,
    lec_hdebut  time not null ,
    lec_hfin  time not null ,
    lec_type  varchar(50) not null ,
    lec_moniteur int not null,
    lec_voiture int
)engine=innodb;

-- table recevoir
drop table if exists recevoir;
create table recevoir (
	rec_client int not null,
    rec_lecon  int not null,    
    primary key (rec_lecon,rec_client)
)engine=innodb;

set foreign_key_checks =1;

-- contraintes
alter table lecon add constraint cs1 foreign key (lec_moniteur) references moniteur(mon_id);
alter table lecon add constraint cs2 foreign key (lec_voiture) references voiture(voi_id);
alter table recevoir add constraint cs3 foreign key (rec_client) references client(cli_id);
alter table recevoir add constraint cs4 foreign key (rec_lecon) references lecon(lec_id);
