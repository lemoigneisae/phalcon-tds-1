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
        $button1->setProperty('data-description','Description B1');
        $button2 = $this->semantic->htmlButton("button2","Page 2");
        $button2->setProperty('data-description','Description B2');

        $button1->getOn("mouseover","test/page1","#pageContent");
        $button2->getOn("mouseover","test/page2","#pageContent");
        $button1->on("mouseover",$this->jquery->html("#pageDesc",$button1->getProperty('data-description')));
        $button2->on("mouseover",$this->jquery->html("#pageDesc",$button2->getProperty('data-description')));

        $button1->on("mouseout",$this->jquery->html("#pageContent",""));
        $button1->on("mouseout",$this->jquery->html("#pageDesc",""));
        $button2->on("mouseout",$this->jquery->html("#pageContent",""));
        $button2->on("mouseout",$this->jquery->html("#pageDesc",""));

        $button1->getOnClick("test/page1","#pageContent");
        $button2->getOnClick("test/page2","#pageContent");

        $this->semantic->htmlMessage("pageContent");
        $this->jquery->compile($this->view);
    }

   /* public function page1Action(){
        $info=$this->semantic->htmlMessage("mess","Message 1");
        $info->setIcon("info circle");
        echo $info;
    }
    public function page2Action(){
        $info=$this->semantic->htmlMessage("mess","Message 2");
        $info->setIcon("info circle");
        echo $info;
    }*/

    public function getCascadeAction(){
        $bt = $this->semantic->htmlButton("button1","Chargement");
        $bt->getOnClick("test/page1","#page1");

        $this->jquery->compile($this->view);
    }

    public function page1Action(){
        $this->view->disable();
        echo "Page 1";
        echo "<div id='page2' style='border-style: solid; border-color:green'></div>";
        $this->jquery->get("test/page2","#page2");
        echo $this->jquery->compile();
    }

    public function page2Action(){
        $this->view->disable();
        echo "Page 2";
    }


    public function postFormAction(){
        $form=$this->semantic->htmlForm("formUser");
        $form->addInput("nom","Nom");
        $form->addInput("email","Email");
        $form->addSubmit("btValider","Valider");
        $form->setProperty("style","float:left; width:49%");
        $form->submitOnClick("btValider","test/postReponse","#postReponse");

        $mess=$this->semantic->htmlMessage("postReponse","vide");
        $mess->setVariation("compact");
        $mess->setProperty("style","float:right; width:49%");


        $this->jquery->compile($this->view);
    }



    public function postReponseAction(){
        $this->view->disable();
        echo "Nom : ".$_POST['nom'];
        echo "<br> Email : ".$_POST['email'];
    }

    public function postForm2Action(){
        $button1 = $this->semantic->htmlButton("btUser1","User 1");
        $button1->getOnClick("test/user/1","#formUser");
        

        $button2 = $this->semantic->htmlButton("btUser2","User 2");
        $button1->setProperty("style","float:left;");
        $button2->setProperty("style","float:left;");

        $form=$this->semantic->htmlForm("formUser");
        $form->addInput("nom","Nom");
        $form->addInput("email","Email");
        $form->addSubmit("btValider","Valider");
        $form->setProperty("style","float:left; width:49%");
        $form->submitOnClick("btValider","test/postReponse","#postReponse");

        $mess=$this->semantic->htmlMessage("postReponse","vide");
        $mess->setVariation("compact");
        $mess->setProperty("style","float:right; width:49%");


        $this->jquery->compile($this->view);
    }


    public function userAction($id=null){
        $userArray=array(
            '{"nom":"SMITH","email":"BSMITH@mail.com"}',
            '{"nom":"DOE","email":"jdoe@mail.com"}'
        );
     return $userArray[$id];
    }


    public function postReponse2Action(){
        $this->view->disable();
        echo "Nom : ".$_POST['nom'];
        echo "<br> Email : ".$_POST['email'];
    }








}

