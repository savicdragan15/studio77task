<?php
require "frontendController.php";
class adminController extends frontendController{
     private $adminModul ,$loginModule;
    public function __construct() {
        parent::__construct();
        $this->adminModul = new admnController();
        $this->loginModule = new loginController();
    }
    
   public function index() {
       $this->loginModule->index(); 
   }
   
   public function login(){
      $this->loginModule->login();
   }
   
    public function logOut(){
      $this->loginModule->logOut();
   }
   
   public function insertArticles(){
       $this->adminModul->insertArticles();
   }
   
   public function insert(){
       $this->adminModul->insert();
   }
   
   public function edit(){
    $this->adminModul->edit();
   }
   
   public function get(){
    $this->adminModul->get();
   }
   
   public function save(){
       $this->adminModul->save();
   }
   
   public function getImage(){
    $this->adminModul->getImage();
   }
   public function uploadImage(){
    $this->adminModul->uploadImage();
   }
   
   public function slider(){
       $this->adminModul->slider();
   }
   public function getImageSlider(){
       $this->adminModul->getImageSlider();
   }
   
   public function insertSliderImage(){
       $this->adminModul->insertSliderImage();
   }
   
   public function updateTitleSliderImage(){
       $this->adminModul->updateTitleSliderImage();
   }
   
   public function updateSliderImage($id){
       $this->adminModul->updateSliderImage($id);
   }
   
  public function getSliderImageById(){
        $this->adminModul->getSliderImageById();
   }
   
   public function deleteSliderImage(){
       $this->adminModul->deleteSliderImage();
   }
   
}