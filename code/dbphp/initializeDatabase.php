<?php
	function initializeDatabase($db){
		$przegrodki = 4;
		$zapytanie = "INSERT INTO Memobox VALUES ( NULL, 'angielski', 'dowolnie, byle po angielski', ?)";
		$polecenie = $db->prepare($zapytanie);
		$polecenie->bindParam( 1, $przegrodki );
		$polecenie->execute();

		echo "jest ok </br>";

		$count = 1;
		$count = 1;
		$pojemnosc = 10;

		$zapytanie = "SELECT ID FROM Memobox LIMIT 1";
		$polecenie = dbquery($db, $zapytanie);
		$wynik = $polecenie->fetchALL();

		/*foreach( $wynik as $key => $value ){
			echo "$key </br>";
			
		echo "</br>";
		}*/

		$memoid = $wynik[0][0];

	echo "memoid $memoid </br>";

		while( $counter < $przegrodki ){
		//	echo "first while </br>";
			$zapytanie = "INSERT INTO Przegrodka VALUES( NULL, ?,?  )";

			dbquery( $db, $zapytanie, $pojemnosc, $memoid );
			/*$polecenie = $db->prepare($zapytanie);
			$polecenie->bindParam('dd', $pojemnosc, $memoid);
			$polecenie->execute();*/

			$counter++;
			$pojemnosc += 10;
		}

		$total = 70;

		$fiszki = 1;
		while( $fiszki <= $total ){
		//	echo "second while </br>";

			$zapytanie = "INSERT INTO Fiszka VALUES( NULL, CONCAT( 'Fiszka #', ? ), CONCAT( 'Flash card #', ? ), ?, ? );";
			dbquery( $db, $zapytanie, $fiszki, $fiszki, $count, $fiszki );

			/*$polecenie = $db->prepare($zapytanie);
			$polecenie->bindParam('dddd', $fiszki, $fiszki, $count, $fiszki );
			$polecenie->execute();*/

		//echo "count = $count </br>";
			$zapytanie = "SELECT SUM(pojemnosc) FROM Przegrodka WHERE Przegrodka.NUMER <= ?";
			$polecenie = dbquery( $db, $zapytanie, $count );

			/*$polecenie = $db->prepare($zapytanie);
			$polecenie->bindParam('d', $count );
			$polecenie->execute();*/

			$wynik = $polecenie->fetchAll();

		//	echo "wynik = $wynik </br>";

			$temp = $wynik[0][0];

		//	echo "temp = $temp </br>";
			
			$fiszki++;
			if( $fiszki == $temp ) $count++;
			

		}


		echo "database initialized <\br>";
	};

	initializeDatabase($db);



?>