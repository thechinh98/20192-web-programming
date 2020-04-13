<?php 
class WebPage{
    private $page = "";
    private $title = "";
    private $year = "";
    private $copyright = "";
    
    function addHeader($title){
        $this->title = $title; 
    }
    function addContent($content){
        $this->page = $content;
    }
    function addFooter($footer){
        $this->copyright = $footer;
    }
    function get(){
        
    }
}
?>


