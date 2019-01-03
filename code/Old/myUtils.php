<?php
    
    function WRITE2( $tab ){
        foreach( $tab as $k => $v ){
            echo "k1 = $k </br>";
            foreach( $v as $k2 => $v2 ){
                echo "$k2   ->   $v2 </br>";
            }
            echo "</br>";
        }
    }
?>