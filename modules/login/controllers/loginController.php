<?php
/**
 * 
 */
class loginController extends baseController
{
    public function __construct() {
        Loader::loadModel($this, "login", "login");
    }
    /**
     * 
     */
    public function index()
    { 
        if(Session::get("status") == _NIVO_PRISTUPA_USER or !Session::get("status")){
            Loader::loadView("login","login",true);
        }else{
        Loader::loadView("insert","admin",true);
        }
    }
    /**
     * 
     */
    public function login(){
      global $config;
      if(isset($_POST['admin']) && $_POST['admin'] == 1){
        $email = $this->filter_input($_POST['email']);
        $password = $this->filter_input($_POST['password']);
            if(!empty($email) && !empty($password)){
                $email = $this->filter_input($email);
                $password = md5($password);
                $user = $this->models['login']->getAll("*","WHERE user_email='{$email}' and user_password='{$password}' and user_status='"._NIVO_PRISTUPA_ADMIN."' limit 1");

            if(count($user) == 1){
                Session::set("id", $user[0]->id);
                Session::set("name", $user[0]->user_name);
                Session::set("email", $user[0]->user_email);
                Session::set("status", $user[0]->user_status);
                header("Location:index");
            }else{
                echo "Upisite ispravne podatke za logovanje!!!";
            }
        }else{
            echo "Popunite sva polja!";
        }
      }else{
          
         $email = $this->filter_input($_POST['email']);
         $password = $this->filter_input($_POST['password']);  
            if(!empty($email) && !empty($password)){
                $email = $this->filter_input($email);
                $password = md5($password);
                $user = $this->models['login']->getAll("*","WHERE user_email='{$email}' and user_password='{$password}' and user_status='"._NIVO_PRISTUPA_USER."'  limit 1");
//var_dump($user); exit;
            if(count($user) == 1){
                Session::set("id", $user[0]->id);
                Session::set("name", $user[0]->user_name);
                Session::set("email", $user[0]->user_email);
                Session::set("status", $user[0]->user_status);
                header("Location:index");
            }else{
                echo "Upisite ispravne podatke za logovanje!!!";
            }
        }else{
            echo "Popunite sva polja!";
        } 
      }
    }
    
    
    public function logOut(){
        Session::stop();
        Loader::loadView("login","login",true);
    }
}
   