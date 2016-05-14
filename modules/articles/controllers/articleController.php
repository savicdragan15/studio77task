<?php
class articleController extends baseController{
    
    private $articlesModel, $imagesModel;
    public function __construct() {
        Loader::loadModel($this, "articles","admin");
        Loader::loadModel($this, "images", "admin");
        $this->articlesModel = $this->models['articles'];
        $this->imagesModel = $this->models['images'];
    }


    public function index() {
        
    }
    
    public function article($id){
        if(Session::get("status")){
        $template['article'] = $this->articlesModel->get((int)$id);
        $template['image'] = $this->imagesModel->get((int)$id);
        Loader::loadView("index","articles",true,$template);
        }else{
            $string = "Location:"._WEB_PATH;
            header($string);
        }
    }
}
