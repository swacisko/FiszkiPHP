<?php

noParamQuery( $db, "drop table Przejscie" );

noParamQuery( $db, "drop table Fiszka" );

noParamQuery( $db, "drop table Przegrodka" );
noParamQuery( $db, "drop table Memobox" );


$zapytanie = "
CREATE TABLE Memobox(
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	jezyk varchar(30),
	opis varchar(30),
        aktualnaPrzegrodka INT,
	liczbaPrzegrodek INT UNSIGNED NOT NULL
) ";
noParamQuery($db,$zapytanie);

$zapytanie = "
CREATE TABLE Przegrodka(
	NUMER INT UNSIGNED PRIMARY KEY,
	pojemnosc INT UNSIGNED NOT NULL,
	memoboxID INT UNSIGNED,

	FOREIGN KEY (memoboxID) REFERENCES Memobox(ID)
) ";
noParamQuery($db,$zapytanie);

$zapytanie = "
CREATE TABLE Fiszka(
	ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tekst1 VARCHAR(150),
	tekst2 VARCHAR(150),
	numerPrzegrodki INT UNSIGNED,
	numerWPrzegrodce INT UNSIGNED,
	
	FOREIGN KEY (numerPrzegrodki) REFERENCES Przegrodka(NUMER)
) ";
noParamQuery($db,$zapytanie);

$zapytanie = "
CREATE TABLE Przejscie(
	data DATE,
	fiszkaID INT UNSIGNED,
	przegrodkaZ INT UNSIGNED,
	przegrodkaDo INT UNSIGNED,

	FOREIGN KEY (fiszkaID) REFERENCES Fiszka(ID),
	FOREIGN KEY (przegrodkaZ) REFERENCES Przegrodka(NUMER),
	FOREIGN KEY (przegrodkaDo) REFERENCES Przegrodka(NUMER)
) ";
noParamQuery($db,$zapytanie);

echo "tables created <\br>";
?>