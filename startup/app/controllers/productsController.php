<?php

class productsController extends ControllerBase{
protected $semantic;

    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }

    public function indexAction(){

        $produit = Products::find();
        $dt = $this->semantic->datatable("dt1","Products",$produit);
        $dt->setFields(["name","productType"]);
        $dt->getOnRow("click","products/show","#productDetails",["attr"=>"data-ajax","preventDefault"=>false,"stopPropagation"=>false]);


        $this->jquery->compile($this->view);
    }

    public function showAction($id=1){
        $produit = Products::findFirst($id);
        echo "Nom : ".$produit->getName()."<br>";
        echo "Prix : ".$produit->getPrice()."$";
    }

}

