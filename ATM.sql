CREATE DATABASE ATM;
USE ATM;

CREATE TABLE Utenti(
  Id_Utente integer not null auto_increment primary key,
  Nome varchar(30) not null,
  Cognome varchar(30) not null,

)engine=innoDB;

CREATE TABLE ATM(
  Id_ATM integer not null auto_increment primary key,
  Nome varchar(30),
  Banconote20 integer not null,
  Banconote50 integer not null
)engine=innoDB;

CREATE TABLE Tecnici(
  Id_Tecnico integer not null auto_increment primary key,
  Nome varchar(30) not null,
  Cognome varchar(30) not null
)engine=innoDB;

CREATE TABLE Conti(
  Id_Conto integer not null auto_increment primary key,
  Saldo integer not null,
  id_Utente integer not null,
  foreign key id_Utente references Utenti(Id_Utente)
)engine=InnoDB;

CREATE TABLE Bancomat(
  Id_Bancomat integer not null auto_increment primary key,
  PIN integer(5) not null,
  id_Conto integer not null,
  Scadenza date not null,
  foreign key(id_Conto) references Conti(Id_Conto)

)engine=innoDB;

CREATE TABLE Movimenti(
  Id_Movimento integer not null auto_increment primary key,
  DataOra Datetime not null,
  id_Bancomat integer not null,
  foreign key (id_Bancomat) references Bancomat(Id_Bancomat),
  id_Conto integer not null,
  foreign key (id_Conto) references Conti(Id_Conto)

)engine=innoDB;

CREATE TABLE Interazioni(
  Id_Interazione integer not null auto_increment primary key,
  id_Bancomat integer not null,
  foreign key (id_Bancomat) references Bancomat(Id_Bancomat),
  id_ATM integer not null,
  foreign key (id_ATM) references ATM(Id_ATM)
)engine=innoDB;

CREATE TABLE Gestione(
  Id_Gestione integer not null auto_increment primary key,
  id_ATM integer not null,
  foreign key (id_ATM) references ATM(Id_ATM),
  id_Tecnico integer not null,
  foreign key (id_Tecnico) references Tecnici(Id_Tecnico)
)engine=innoDB;