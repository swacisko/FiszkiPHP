<!DOCTYPE html>
<html>
<head>
	<title>Fiszki początek</title>
<style>

	table, td, th, tr {
		border: 1px solid black;
		border-collapse: collapse;
		text-align: center;
		color: red;
		width: 50%;
		height: 50%;
	}
</style>
</head>

<?php

	$host = 'mysql';
	$user = 'user';
	$dbname = 'mydb';
	$passwd = 'mypass';

	echo "siemanko <br>";

	$dsn = "mysql:host=$host;dbname=$dbname";


	try{
		echo "siemanko przed PDO<br>";
		if (!defined('PDO::ATTR_DRIVER_NAME'))
		echo 'PDO is unavailable<br/>';

		$db = new PDO( $dsn, $user, $passwd );
		
		$query = "SELECT content1";
		echo "Siemanko po PDO <br>";

	}catch( PDOException $e ){
		echo "Błąd: ". $e->getMessage();
		exit;
	}


	$currentCardId = $_POST['currentCardId'];
?>

<body>
	<h1> Witaj w świecie fiszek!</h1>

	<form action="index.php" method="POST">

		<table>
			<caption>FISZKI - stwórz nową!</caption>
			<tr>
				<th>Tekst po polsku</th>
				<th>Tekst po obcojęzycznemu</th>

			</tr>
			<tr>
				<td> <textarea name="newToBeTranslated"> </textarea>  </td>
				<td> <textarea name="newToTranslate"> </textarea></td>
				<td style="width:15%"> <input type="submit" name="stworzFiszke" value="Stwórz fiszkę"> </td>
			</tr>
		</table>

		<p></p>
		<table>
			<caption> Twoja fiszka na teraz! </caption>
			<tr>
				<td> <textarea name="currentToBeTranslated"> </textarea>  </td>
				<td> <textarea name="currentToTranslate"> </textarea></td>
				<td style="width:15%"> 
					<input type="submit" name="sprawdzTlumaczenie" value="Sprawdź tłumaczenie"> 	
					<br>
					<input type="submit" name="nastepnaFiszka" value="Przejdź do następnej fiszki"> 
<?php		$currentCardId++;		echo	"<input type=\"text\" value=\"$currentCardId\" name=\"currentCardId\"> "; ?>
				</td>""
			</tr>
			<tr>
				<td>Kolejna fiszka</td>
				<td></td>

			</tr>
		</table>
	
	</form>
	




</body>
</html>