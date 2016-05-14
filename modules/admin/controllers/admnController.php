<?php

class admnController extends baseController
{
    private $imagesModel,$articlesModel,$sliderModel;
    public function __construct() {
       Loader::loadModel($this, "images", "admin");
       Loader::loadModel($this, "articles","admin");
       Loader::loadModel($this, "slider","admin");
       Loader::loadClass("SimpleImage");
       $this->imagesModel = $this->models['images'];
       $this->articlesModel = $this->models['articles'];
       $this->sliderModel = $this->models['slider'];
    }
    /**
     * 
     */
    public function index()
    { 
       Loader::loadView("insert","admin",true);
    }
    
    public function insertArticles(){
         Loader::loadView("insert","admin",true);
    }
    
       public function insert(){
           $article_title = $this->filter_input($_POST['article_title']);
           $article_description = $this->strAddslashes($_POST['article_description']);
           $article_status = (int)$_POST['article_status'];
           $image_name = $article_title.date("d_m_Y_h_m_i");
           $image_name = str_replace(" ", "_",$image_name);
           $image_name = strtolower($image_name);
           
           if(!empty($article_title) && !empty($article_description) && !empty($article_status)){
           $this->articlesModel->article_title = $article_title;
           $this->articlesModel->article_description = $article_description;
           $this->articlesModel->article_date_time = date("Y-m-d h:m:i");
           $this->articlesModel->article_status = $article_status;
            if(is_int((int)$last_id = $this->articlesModel->insert())){
                $error = false;
            }else{
                $error = true;
            }
           }
           
           $image = new Image\SimpleImage();
           
           if(!empty($_FILES['image'])){
            $image->load($_FILES['image']['tmp_name'])->thumbnail(700, 450)->save('views/img/'.$image_name.'.jpg');
            $image->load($_FILES['image']['tmp_name'])->thumbnail(600, 300)->save('views/img/'.$image_name.'_small.jpg');
            $error = false;
           }else{
             $error = true; 
           }
           
           if(!empty($image_name)){
           $this->imagesModel->image_name = $image_name.'.jpg';
           $this->imagesModel->image_small_name = $image_name.'_small.jpg';
           //$this->imagesModel->image_title = $image_article;
           $this->imagesModel->article_id = $last_id;
           if(is_int((int)$this->imagesModel->insert())){
               $error = false;
           }else{
             $error = true;  
           }
       }
        $data = array(
            "error"=>$error
        ); 
        $this->response($data);
    }
    
    public function edit(){
         $template['articles'] = $this->articlesModel->getAll("id,article_title,article_date_time,article_status"," ORDER BY article_date_time desc");
         foreach($template['articles'] as $article){
             $article->article_date_time = date("d.m.Y h:m:i", strtotime($article->article_date_time));
         }
        Loader::loadView("edit","admin",true,$template);
    }
    
   public function get(){
      $article = $this->articlesModel->get((int)$_POST['id']);
      if(!empty($article)){
          $error = false;
      }else{
        $error = true;
      }
      $data = array(
          "error"=>$error,
          "data"=>$article
      );
      $this->response($data);
   }
       
   public function save(){
       $id = (int)$_POST['id'];
       $article_title = $this->filter_input($_POST['article_title']);
       $article_description = $this->strAddslashes($_POST['article_description']);
       $article_status = $this->strAddslashes($_POST['article_status']);
       
       $this->articlesModel->id = $id;
       $this->articlesModel->article_title = $article_title;
       $this->articlesModel->article_description = $article_description;
       $this->articlesModel->article_status = (int)$article_status;
       if($this->articlesModel->update() == 1){
           $error = false;
       }else{
          $error = true; 
       }
       $data = array(
           "error"=>$error
       );
       $this->response($data);
   }  
   
   public function getImage(){
       $article_id = (int)$_POST['id'];
       $image = $this->imagesModel->getAll("*","WHERE article_id='{$article_id}'");
       if(!empty($image)){
           $error = false;
            $data = array(
               "error"=>$error,
               "data"=>$image
           );
       }else{
          $error = true;
        $data = array(
           "error"=>$error,
       );
       }
       
       $this->response($data);
   }
   
   public function uploadImage(){
     $image_id = (int)$_POST['id'];
     $image = new Image\SimpleImage();
     $image_name = $image_id."_".date("d_m_Y_h_m_i");
     $image_name = str_replace(" ", "_",$image_name);
     $image_name = strtolower($image_name);
     
     if(!empty($_FILES['image'])){
         $image->load($_FILES['image']['tmp_name'])->thumbnail(700, 450)->save('views/img/'.$image_name.'.jpg');
         $image->load($_FILES['image']['tmp_name'])->thumbnail(600, 300)->save('views/img/'.$image_name.'_small.jpg');
         $error = false;
        }else{
          $error = true; 
        }
        
        $this->imagesModel->id = $image_id;
        $this->imagesModel->image_name = $image_name.".jpg";
        $this->imagesModel->image_small_name = $image_name.'_small.jpg';
        
        if($this->imagesModel->update() == 1){
            $error = false;
        }else{
            $error = true;
        }
        $data = array(
            "error"=>$error
        );
        $this->response($data);
   }
   
   public function slider(){
       Loader::loadView("slider","admin",true);
   }
   
   public function getImageSlider(){
       $images = $this->sliderModel->getAll();
       if(!empty($images)){
           $error = false;
       }else{
           $error = true;
       }
       $data = array(
           "error"=>$error,
           "data"=>$images
       );
      $this->response($data);   
   }
   
  public function insertSliderImage(){
      $image_name = date("d_m_Y_h_m_i");
      $image_name = str_replace(" ", "_",$image_name);
      $image_name = str_replace("-", "_",$image_name);
      $image_name = strtolower($image_name);
    if(!empty($_FILES['image'])){
        $image = new \Image\SimpleImage();
        $image->load($_FILES['image']['tmp_name'])->thumbnail(1900, 600)->save('./views/img/'.$image_name.'.jpg');
        $image->load($_FILES['image']['tmp_name'])->thumbnail(600, 300)->save('./views/img/'.$image_name.'_small.jpg');
        $error = false;
        }else{
          $error = true; 
        }
        
        $this->sliderModel->image_name = $image_name.".jpg";
        $this->sliderModel->image_name_small = $image_name.'_small.jpg';
        $this->sliderModel->status = (int)$_POST['image_status'];
         if(is_int((int)$this->sliderModel->insert())){
            $error = false;
         }else{
            $error = true;
        }
        $data = array(
            "error"=>$error
        );
        $this->response($data);  
   }
   
    public function updateSliderImage($id){
        //var_dump($_POST); exit;
        $image_id = (int)$id;
        $image_name = $image_id."_".date("d_m_Y_h_m_i");
        $image_name = str_replace(" ", "_",$image_name);
        $image_name = str_replace("-", "_",$image_name);
        $image_name = strtolower($image_name);
        $image = new Image\SimpleImage();
     if(!empty($_FILES['image'])){
         $image->load($_FILES['image']['tmp_name'])->thumbnail(1900, 600)->save('./views/img/'.$image_name.'.jpg');
         $image->load($_FILES['image']['tmp_name'])->thumbnail(600, 300)->save('./views/img/'.$image_name.'_small.jpg');
         $error = false;
        }else{
          $error = true; 
        }
        
    $this->sliderModel->id = $image_id;
    $this->sliderModel->image_name = $image_name.".jpg";
    $this->sliderModel->image_name_small = $image_name.'_small.jpg';
    if($this->sliderModel->update() == 1){
            $error = false;
            unset($_FILES['image']);
        }else{
            $error = true;
            unset($_FILES['image']);
        }
        $data = array(
            "error"=>$error
        );
        $this->response($data);
   }
   
  public function updateTitleSliderImage(){
      if(!empty($_POST)){
      $this->sliderModel->id = (int)$_POST['id'];
      $this->sliderModel->image_title = $this->strAddslashes($_POST['image_title']);
      if($this->sliderModel->update() == 1){
          $error = false;
      }else {
          $error = true;
          
      }
      $data = array(
          "error"=>$error
      );
      $this->response($data);
   }
  }
   
   public function getSliderImageById(){
       $image = $this->sliderModel->get((int)$_POST['id']);
       if(is_object($image)){
           $error = false;
       }  else {
           $error = true;
       }
        $data = array(
           "error"=>$error,
           "data"=>$image
       );
      $this->response($data); 
   }
   
   public function deleteSliderImage(){
       if($this->sliderModel->delete((int)$_POST['image_id'])){
           $error = false;
       }else{
           $error = false;
       }
     $this->response(array('error'=>$error));  
   }
}