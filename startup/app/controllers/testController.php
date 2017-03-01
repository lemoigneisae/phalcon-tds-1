<?php

class testController extends ControllerBase{
protected $semantic;

public function initialize(){
    $this->semantic=$this->jquery->semantic();
}
/*
    public function demoAction(){
        $semantic = $this->jquery->semantic();
        $bt = $semantic->htmlButton("btTest", "Test");
        $bt->setProperty("data-ajax", "valeur importante !!");
        $bt->addIcon("user");
        $bt->getOnClick("index/reponse","#divResponse",["attr"=>"data-ajax","ajaxTransition"=>"random"]);

        $menu=$semantic->htmlLabeledIconMenu("menu2",array(["star","Star"],["user","User"],["video","Video"]));
        //$menu->onClick("$('#divResponse').html($(this).attr('id'));");
        $menu->getOnclick("index/reponse","#divResponse");

        echo $this->jquery->compile($this->view);
    }

    public function reponseAction($id=""){
        $semantic = $this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Reponse Ok".$id);
        $info->setIcon("info circle");
        echo $info;
    }
*/
    public function hideShowAction(){

    $case=$this->semantic->htmlCheckbox("checkbox","Masquer/afficher");
    $info=$this->semantic->htmlSegment("zone");
    /* $info->setIcon("info circle");
   echo $info;*/
    $case->on("change",$info->jsToggle("$(this).prop('checked')"));
    $this->jquery->compile($this->view);
}

    public function changeCssAction(){

        $button1 = $this->semantic->htmlButton("button1","Page 1");
        $button2 = $this->semantic->htmlButton("button2","Page 2");
        $button1->getOnclick("test/page1","#pageContent");
        $button2->getOnclick("test/page2","#pageContent");
        $button1->on("mouseover","$('#pageDesc').html($(this).attr('data-desc'))");
        $this->jquery->compile($this->view);

    }

    public function page1Action(){
        $info=$this->semantic->htmlMessage("mess","Message 1");
        $info->setIcon("info circle");
        echo $info;
    }
    public function page2Action(){
        $info=$this->semantic->htmlMessage("mess","Message 2");
        $info->setIcon("info circle");
        echo $info;
    }
}

