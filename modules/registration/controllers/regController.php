<?php
class regController extends baseController{
    
    private $loginModel;
    public function __construct() {
        Loader::loadModel($this, "login", "login");
        $this->loginModel = $this->models['login'];
    }


    public function index() {
        Loader::loadView("registration", "registration", true);
    }
    
    public function registration(){
        //var_dump($_POST);
        $this->loginModel->user_name = $this->filter_input($_POST['user_name']);
        $this->loginModel->user_surname = $this->filter_input($_POST['user_surname']);
        $email = $this->loginModel->user_email = $this->filter_input($_POST['user_email']);
        $this->loginModel->user_password = md5($_POST['user_password']);
        $this->loginModel->user_status = 0;
        $template['email'] = $email;
        if(is_int((int)$id = $this->loginModel->insert())){
          $message  = "Click on the following link you can activate your account.  http://localhost/studio77/register/activate/{$id}";
          $subject  = 'Activate account';
           if($this->sendMail($email,$message,$subject)) 
            Loader::loadView("success", "registration", true,$template);
           else echo "Error. <a href='"._WEB_PATH."/register'>Try again.</a>";
        }else 
          Loader::loadView("error", "registration", true);
    }
    
    public function activate($id){
        $this->loginModel->id = (int)$id;
        $this->loginModel->user_status = _NIVO_PRISTUPA_USER;
        if($this->loginModel->update() == 1){
            echo "You have successfully activated account!  <a href="._WEB_PATH.">Return to site</a>";
        }else{
            echo "Error. <a href='"._WEB_PATH."/register'>Try again.</a>";
        }
    }
    
    private function sendMail($to,$message,$subject){
        $headers  = 'From: savicdragan2707@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;
    }
    
    public function forgotPassword(){
        Loader::loadView("forgotPassword", "registration", true);
    }
    public function forgotPasswordProcess(){
        $email = $this->filter_input($_POST['user_email']);
        $user = $this->loginModel->getAll('*',"WHERE user_email='{$email}' LIMIT 1");
        if(count($user) == 1){
           $new_password = strtolower($user[0]->user_name.'_'.$user[0]->user_surname.date('mi'));
           $this->loginModel->id = $user[0]->id;
           $this->loginModel->user_password = md5($new_password);
           if($this->loginModel->update() == 1){
               $subject = "New password";
               $message = "Your new password is {$new_password}";
               $this->sendMail($user[0]->user_email, $message,$subject);
               $this->response(array("error"=>false));
           }
        }else{
           $this->response(array("error"=>true)); 
        }
    }
}