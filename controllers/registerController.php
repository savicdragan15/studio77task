<?php
require "frontendController.php";
class registerController extends frontendController{
    private $registerModul;
    
    public function __construct() {
        parent::__construct();
        $this->registerModul = new regController();
    }
    
    public function index(){
      $this->registerModul->index();
    }
    
    public function registration(){
       $this->registerModul->registration(); 
    }
    
    public function activate($id){
        $this->registerModul->activate($id);
    }
    
    public function forgotPassword(){
        $this->registerModul->forgotPassword();
    }
    
    public function forgotPasswordProcess(){
         $this->registerModul->forgotPasswordProcess();
    }
    
}
