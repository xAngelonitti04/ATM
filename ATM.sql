CREATE DATABASE ATM;
USE ATM;

CREATE TABLE Utenti(
  Id_Utente integer not null auto_increment primary key,
  Nome varchar(30) not null,
  Cognome varchar(30) not null,
  DataNascita date not null

)engine=innoDB;

CREATE TABLE ATM(
  Id_ATM integer not null auto_increment primary key,
  Nome varchar(30) not null,
  Banconote20 integer not null,
  Banconote50 integer not null,
  FlagAttivo boolean not null
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
  foreign key (id_Utente) references Utenti(Id_Utente)
)engine=InnoDB;

CREATE TABLE Bancomat(
  Codice varchar(16) not null primary key,
  PIN integer(5) not null,
  id_Conto integer not null,
  Scadenza date not null,
  foreign key(id_Conto) references Conti(Id_Conto)

)engine=innoDB;

CREATE TABLE Movimenti(
  Id_Movimento integer not null auto_increment primary key,
  Importo integer not null,
  TipoMovimento varchar(20) not null,
  DataOra Datetime not null,
  Codice varchar(16) not null,
  foreign key (Codice) references Bancomat(Codice),
  id_Conto integer not null,
  foreign key (id_Conto) references Conti(Id_Conto)
 

)engine=innoDB;

CREATE TABLE Interazioni(
  Id_Interazione integer not null auto_increment primary key,
  Codice varchar(16) not null,
  foreign key (Codice) references Bancomat(Codice),
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


INSERT INTO atm(Nome, Banconote20, Banconote50,FlagAttivo) VALUES 
("DSU",20,20,true),
("Virtual Bank",20,13,false),
("Super",20,0,true),
("Udi",20,20,true),
("Apulia",0,0,false),
("Center",12,10,true);

INSERT INTO utenti(Nome, Cognome,DataNascita) VALUES 
("Francesco","Tamma","2003-03-14"),
("Angelo","Nitti","2004-02-22"),
("Simone","De Leonardis","2003-08-07"),
("Charles","Leclerc","1997-10-16");

INSERT INTO conti(Saldo, id_Utente) VALUES 
(12500,1),
(23000,2),
(34760,3),
(32050,1),
(450000,4);

INSERT INTO bancomat(Codice, PIN, id_Conto, Scadenza) VALUES 
("1036875169831200",54123,1,"2025-03-03"),
("4587632108541249",23659,2,"2027-03-03"),
("3347199856324735",10236,3,"2024-03-03"),
("4521369852100369",47852,4,"2023-03-03"),
("8521036941765236",79544,5,"2030-03-03");
