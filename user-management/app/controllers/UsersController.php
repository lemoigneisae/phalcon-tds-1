<?php

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction($page=1,$sField="firstname",$sens="asc",$filter=NULL)
    {
        $utilisateurs = User::find(array("order"=>$sField." ".$sens));
        $this->view->setVar("utilisateurs",$utilisateurs);
    }

}

