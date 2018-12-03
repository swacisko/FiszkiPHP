<?php

class Fiszka{
    function __construct( $id, $text1, $text2, $numerPrzegrodki ) {
        $this->id = $id;
        $this->text1 = $text1;
        $this->text2 = $text2;
        $this->numerPrzegrodki = $numerPrzegrodki;
    }
    
    public $id;   
    public $text1;
    public $text2;    
    public $numerPrzegrodki;
};
    

?>
