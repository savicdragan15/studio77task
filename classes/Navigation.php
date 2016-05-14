<?php

class Navigation extends baseController{
    
    public function __construct() {
       
    }
    public function index() {}
    
public function renderNav($lng) {
    global $config;
        Loader::loadModel($this, "nav");
        $nav = $this->models['nav'];
        $navigration = $nav->getAll("*","WHERE status=1 and id_parent=0 ORDER BY sort");
        $string = "";
        foreach($navigration as $nvg){
            $string .="<li class='".$nvg->active." ".$nvg->nav_class."'>";
            $string.="<a href='"._WEB_PATH.$nvg->link."'><span class='".$nvg->icon_class."'></span> <span class='xn-text'>".$config['prevod']["{$nvg->name}"]["{$lng}"]."</a>";
                if($nvg->parent == 1){
                    $openable = $nav->getAll("*", "WHERE status=1 and id_parent={$nvg->ID} order by sort");
                    $string .="<ul>";
                    foreach($openable as $open){
                    $string.="
                       
                         <li>
                            <a href='"._WEB_PATH.$open->link."'> <span class='{$open->icon_class}'></span> {$config['prevod']["{$open->name}"]["{$lng}"]}</a>
                        </li>
                      ";
                    }
                   $string .= "</ul>";
                }
               $string.="</li>";
           }
        return $string;
    }
    
}
