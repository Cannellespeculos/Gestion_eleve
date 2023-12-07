/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  07/12/2023 16:33:40                      */
/*==============================================================*/


drop table if exists FORMATEUR;

drop table if exists FORMER;

drop table if exists FORME_A;

drop table if exists NATIONALITE;

drop table if exists SALLE;

drop table if exists STAGIAIRE;

drop table if exists TYPE_FORMATION;

/*==============================================================*/
/* Table : FORMATEUR                                            */
/*==============================================================*/
create table FORMATEUR
(
   ID_FORMATEUR         int not null,
   ID_SALLE             int,
   NOM_FORMATEUR        varchar(50),
   primary key (ID_FORMATEUR)
);

/*==============================================================*/
/* Table : FORMER                                               */
/*==============================================================*/
create table FORMER
(
   ID_STAGIAIRE         int not null,
   ID_FORMATEUR         int not null,
   DATE_DEBUT           date,
   DATE_FIN             date,
   primary key (ID_STAGIAIRE, ID_FORMATEUR)
);

/*==============================================================*/
/* Table : FORME_A                                              */
/*==============================================================*/
create table FORME_A
(
   ID_FORMATEUR         int not null,
   ID_TYPE              int not null,
   primary key (ID_FORMATEUR, ID_TYPE)
);

/*==============================================================*/
/* Table : NATIONALITE                                          */
/*==============================================================*/
create table NATIONALITE
(
   ID_NATION            int not null,
   NATIONALITE          varchar(60),
   primary key (ID_NATION)
);

/*==============================================================*/
/* Table : SALLE                                                */
/*==============================================================*/
create table SALLE
(
   ID_SALLE             int not null,
   LIBELLE              varchar(20),
   primary key (ID_SALLE)
);

/*==============================================================*/
/* Table : STAGIAIRE                                            */
/*==============================================================*/
create table STAGIAIRE
(
   ID_STAGIAIRE         int not null,
   ID_NATION            int not null,
   ID_TYPE              int,
   NOM_STAGIAIRE        varchar(50),
   PRENOM_STAGIAIRE     varchar(50),
   primary key (ID_STAGIAIRE)
);

/*==============================================================*/
/* Table : TYPE_FORMATION                                       */
/*==============================================================*/
create table TYPE_FORMATION
(
   ID_TYPE              int not null,
   NOM_TYPE             varchar(50),
   primary key (ID_TYPE)
);

alter table FORMATEUR add constraint FK_RELATION_7 foreign key (ID_SALLE)
      references SALLE (ID_SALLE) on delete restrict on update restrict;

alter table FORMER add constraint FK_FORMER foreign key (ID_FORMATEUR)
      references FORMATEUR (ID_FORMATEUR) on delete restrict on update restrict;

alter table FORMER add constraint FK_FORMER2 foreign key (ID_STAGIAIRE)
      references STAGIAIRE (ID_STAGIAIRE) on delete restrict on update restrict;

alter table FORME_A add constraint FK_FORME_A foreign key (ID_TYPE)
      references TYPE_FORMATION (ID_TYPE) on delete restrict on update restrict;

alter table FORME_A add constraint FK_FORME_A2 foreign key (ID_FORMATEUR)
      references FORMATEUR (ID_FORMATEUR) on delete restrict on update restrict;

alter table STAGIAIRE add constraint FK_ETRE foreign key (ID_NATION)
      references NATIONALITE (ID_NATION) on delete restrict on update restrict;

alter table STAGIAIRE add constraint FK_RELATION_8 foreign key (ID_TYPE)
      references TYPE_FORMATION (ID_TYPE) on delete restrict on update restrict;

