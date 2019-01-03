<?php
	$zapytanie = "select * from Memobox";
	$polecenie = dbquery( $db, $zapytanie );

	echo "there are ".$polecenie->rowCount()." rows in $zapytanie </br>";


	

	noParamQuery( $db, "select * from Memobox" );
	noParamQuery( $db,"select * from Przegrodka" );
	noParamQuery( $db,"select * from Fiszka" );
	noParamQuery( $db,"select * from Przejscie" );

	noParamQuery( $db,"delete from Fiszka" );
	noParamQuery( $db,"delete from Przegrodka" );
	noParamQuery( $db,"delete from Memobox" );
	noParamQuery( $db,"delete from Przejscie" );

	noParamQuery( $db,"select * from Memobox" );
	noParamQuery( $db,"select * from Przegrodka" );
	noParamQuery( $db,"select * from Fiszka" );
	noParamQuery( $db,"select * from Przejscie" );

	echo "tables cleared <\br>";
?>