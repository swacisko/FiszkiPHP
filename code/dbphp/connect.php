<?php
		$host = 'mysql';
		$user = 'user';
		$dbname = 'mydb';
		$passwd = 'userpass';


		$dsn = "mysql:host=$host;dbname=$dbname";

		$db = new PDO( $dsn, $user, $passwd );

		function noParamQuery( $db, $noParam ){
			$polecenie = $db->prepare($noParam);
			$polecenie->execute();
		};

		/*
			zerowy parametr - $db
			pierwszy parametr - $zapytanie
			kolejne parametry - parametry do bindParam();

			returns $polecenie - zeby moc pozniej zebrac wyniki
		*/
		function dbquery() {
			$db = &func_get_arg(0);
			$zapytanie = &func_get_arg(1);
			$polecenie = $db->prepare($zapytanie);
			if( func_num_args() == 2 ){
				$polecenie->execute();
				return $polecenie;
			}

	     	for($i = 2 ; $i < func_num_args(); $i++) {
	     		$polecenie->bindParam($i-1, func_get_arg($i), PDO::PARAM_STR );
	      	}

	      	$polecenie->execute();
	      	return $polecenie;
	  	}

		//echo "connected <\br>";
?>