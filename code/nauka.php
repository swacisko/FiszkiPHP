<!Doctype html>
<html>
    
<head>   
    <title> Nauka </title>
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>
    <h1 style="text-align: center"> Rozpoczynamy naukę </h1>
    <?php
        require("./dbphp/connect.php");
        require( "Fiszka.php" );
        
        $zapytanie = "SELECT aktualnaPrzegrodka FROM Memobox LIMIT 1";
        $aktualnaPrzegrodka = dbquery( $db, $zapytanie )->fetchAll()[0][0];
        
     //   echo "aktualne przegrodka = $aktualnaPrzegrodka </br>";
        
        $zapytanie = "SELECT MIN(numerWPrzegrodce) FROM Fiszka WHERE Fiszka.numerPrzegrodki = ? ";
        $minIdWPrzegrodce = dbquery( $db, $zapytanie, $aktualnaPrzegrodka )->fetchAll()[0][0];
        
   //     echo "min id w przegrodce = $minIdWPrzegrodce </br>";
        
        $zapytanie = "SELECT ID, tekst1, tekst2, numerPrzegrodki, numerWPrzegrodce FROM Fiszka WHERE Fiszka.numerPrzegrodki = ? AND Fiszka.numerWPrzegrodce = ? ";
        $wynik = $minIdWPrzegrodce = dbquery( $db, $zapytanie, $aktualnaPrzegrodka, $minIdWPrzegrodce )->fetchAll();
        
      //  require("myUtils.php"); WRITE2($wynik);
        
        if( count( $wynik ) != 1 || count( $wynik[0] ) != 2*5 ){
            echo "ERROR, nie ma takiej fiszki w bazie danych</br>";
            exit;
        }
        
        $fiszka = new Fiszka( $wynik[0][0], $wynik[0][1], $wynik[0][2], $wynik[0][3], $wynik[0][4] );
         
   ?>
    
    <div class="divTable">
        <div class="divTableRow">
            <div class="divTableCell border">
                <?php echo "$fiszka->text1"; ?> 
            </div>
                
                
                
            <div class="divTableCell border">
                <?php echo "$fiszka->text2"; ?> 
            </div>
            
            
        <form action="index.php" method="POST">
        </div>  
        
         <div class="divTableRow">
            <div class="divTableCell border">
                <input class="goodAnsButton" type="submit" name="goodAns" value="Umiem">
            </div> 
            <div class="divTableCell border">
                <input class="badAnsButton" type="submit" name="goodAns" value="Nie umiem">
            </div>   
        </div>
        </form>
        
    </div>


</body>
    
</html>
