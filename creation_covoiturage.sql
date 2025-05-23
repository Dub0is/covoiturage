--
-- base de données: 'Covoiturage'
--
create database if not exists covoiturage default character set utf8 collate utf8_general_ci;
use covoiturage;
-- --------------------------------------------------------
-- creation des tables

set foreign_key_checks =0;

-- table utilisateur    
drop table if exists utilisateur;
create table utilisateur (
    uti_id int not null auto_increment primary key,    
    uti_nom varchar (1000) not null,
    uti_prenom varchar (1000) not null,
    uti_adresse_mail varchar (1000) not null,
    uti_mdp varchar (1000) not null,
    uti_profil int not null
)engine=innodb;

-- table trajet
drop table if exists trajet;
create table trajet (
    - traj_id int not null auto_increment primary key,
    - traj_depart varchar(50) not null ,
    - traj_destination varchar(50) not null ,
    - traj_moyen de transport varchar(50) not null ,
    - traj_date_heure_départ date time not null ,
    - traj_date_heure_arrivée date time not null ,
    - traj_arrêt_intermédiaire varchar(50) not null ,
    - traj_date_creation date not null ,
)engine=innodb;

-- table profil    
drop table if exists profil;
create table profil (
    prof_id int not null auto_increment primary key,    
    prof_type varchar (100) not null
)engine=innodb;

-- table proposer    
drop table if exists proposer;
create table proposer (
    pro_id int not null auto_increment primary key,    
    pro_utilisateur int not null,
    pro_trajet int not null,
)engine=innodb;

-- table inscrire    
drop table if exists inscrire;
create table inscrire (
    ins_id int not null auto_increment primary key,    
    ins_utilisateur int not null,
    ins_trajet int not null,
)engine=innodb;

-- table posseder    
drop table if exists posseder;
create table posseder (
    pos_id int not null auto_increment primary key,    
    pos_utilisateur int not null,
    pos_profil int not null,
)engine=innodb;

set foreign_key_checks =1;

-- contraintes
alter table utilisateur add constraint cs1 foreign key (uti_profil) references profil(prof_id);
alter table proposer add constraint cs2 foreign key (pro_utilisateur) references utilisateur(uti_id);
alter table proposer add constraint cs3 foreign key (pro_trajet) references trajet(traj_id);
alter table inscrire add constraint cs4 foreign key (pro_utilisateur) references utilisateur(uti_id);
alter table inscrire add constraint cs5 foreign key (pro_trajet) references trajet(traj_id);
alter table posseder add constraint cs6 foreign key (pos_utilisateur) references utilisateur(uti_id);
alter table posseder add constraint cs7 foreign key (pos_profil) references profil(prof_id);
