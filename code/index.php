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



	try{
		require("./dbphp/connect.php");

		require("./dbphp/clearTables.php");

		require("./dbphp/createTables.php");
		require("./dbphp/initializeDatabase.php");

		

	}catch( PDOException $e ){
		echo "Błąd: ". $e->getMessage();
		exit;
	}


	
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
					<?php		$currentCardId = $_POST['currentCardId'];
					$currentCardId++;		
					echo	"<input type=\"text\" value=\"$currentCardId\" name=\"currentCardId\"> "; 
					?>
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