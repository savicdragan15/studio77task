<?php
/**
 * abstrktni kontroler koji sluzi za nasledjivanje
 *
 */
abstract class baseController
{
    protected $models=array();
    /**
     * 
     * @param string $name naziv modela
     * @param string $value objekat
     */
    public function setModel($name,$value)
    {
        $this->models[$name]=$value;
    }
    abstract public function index();
    
    /**
     * Metoda koja filttrira korisnicki unos
     * @param type $var
     * @return string
     */
    public function filter_input($var){
       $var = trim($var);
       return $var = filter_var($var,FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    /**
     * Metoda koja vraca json
     * @param json $data
     */
    public function response($data){
        header("Content-type: aplication/json");
        echo json_encode($data);
    }
    
    public function strAddslashes($string){
        $string = addslashes($string);
        return $string;
    }
}

