<?php
require "frontendController.php";
class homeController extends frontendController{
    
    private $loginModule,$sliderModel,$articlesModel;
    
    public function __construct() {
        parent::__construct();
        Loader::loadModel($this, "images", "admin");
        Loader::loadModel($this, "articles", "admin");
        Loader::loadModel($this, "slider", "admin");
        $this->loginModule = new loginController();
        $this->sliderModel = new sliderModel();
        $this->articlesModel = new articlesModel();
    }
    
   public function index() {
       $articles = $this->models['articles'];
       $images = $this->models['images'];
       $template['slider_images'] = $this->sliderModel->getAll("*", "WHERE status=1");
       $template['articles'] = $this->articlesModel->getAll("*", " left join images ON articles.id = images.article_id WHERE article_status='1' order by article_date_time desc");
       foreach($template['articles'] as $article){
             $article->article_date_time = date("M d, Y h:m:i", strtotime($article->article_date_time));
         }
       Loader::loadView("index", "", false,$template);
    }
     public function login() {
         $this->loginModule->login();
     }
     
      public function logOut() {
         Session::stop();
         header("Location:index");
     }
    
}