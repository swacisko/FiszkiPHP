<!DOCTYPE html>
<html>
<head>
	<title>Fiszki początek</title>
        <link rel="stylesheet" href="/stylesheets/styles.css">

</head>

<?php



	try{
		require("./dbphp/connect.php");

	//	require("./dbphp/clearTables.php");

	//	require("./dbphp/createTables.php");
	//	require("./dbphp/initializeDatabase.php");

		

	}catch( PDOException $e ){
		echo "Błąd: ". $e->getMessage();
		exit;
	}

	
?>

<body>
	<h1 style="text-align: center"> Witaj w świecie fiszek!</h1>

	
            
            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">   

                        <form action="nauka.php" method="POST">
                            <div class="divTableCell"> <input class="begOptionButton orange" type="submit" name="nauka" value="Rozpocznij naukę"> </div> 
                        </form>

                        <form action="tworzenie.php" method="POST">
                            <div class="divTableCell"> <input class="begOptionButton blue" type="submit" name="tworzenie" value="Stwórz fiszkę"> </div>
                        </form>
                                                
                        <form action="postepy.php" method="POST">
                            <div class="divTableCell"> <input class="begOptionButton green" type="submit" name="postep" value="Podgląd postępów"> </div>
                        </form>
                        
                    </div>
                </div>
            </div>
                    

</body>
</html>