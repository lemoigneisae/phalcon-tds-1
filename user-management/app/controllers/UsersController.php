<?php

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function testAction()
    {
        $utilisateurs = User::find();
        foreach($utilisateurs as $utilisateur){
            echo $utilisateur->getFirstname()."<br>";
        }
        echo "Nombre d'utilisateurs : ", count($utilisateurs), "\n";
    }

}

