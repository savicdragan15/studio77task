<?php
require "frontendController.php";
class articlesController extends frontendController{
    private $articlesModul;
    public function __construct() {
        parent::__construct();
        $this->articlesModul = new articleController();
    }
    
    public function index(){
        
    }
    
    public function article($id){
        $this->articlesModul->article($id);
    }
    
}

