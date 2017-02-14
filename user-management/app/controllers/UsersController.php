<?php
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
class UsersController extends \Phalcon\Mvc\Controller

{

    public function indexAction($page=1,$sField="firstname",$sens="asc",$filter=NULL)
    {
        if (isset($_GET['filtre'])){
            $filter=$_GET['filtre'];
            unset($_GET['filtre']);
            $this->dispatcher->forward(["controller"=>"users","action"=>"index","params"=>[$page,$sField,$sens,$filter]]);
        }


        $utilisateurs = User::find(array("conditions" => "firstname" . " LIKE '%" . $filter . "%'","order"=>$sField." ".$sens));
        $this->view->setVar("utilisateurs",$utilisateurs);
        $this->view->setVar("sens",$sens);
        $this->view->setVar("sField",$sField);


        // Create a Model paginator, show 10 rows by page starting from $currentPage
        $paginator = new PaginatorModel(
            [
                "data"  => $utilisateurs,
                "limit" => 10,
                "page"  => $page,
            ]
        );

// Get the paginated results
        $pager = $paginator->getPaginate();
        $this->view->setVar("pager",$pager);
    }

    public function showAction($id=NULL)
    {

        $aUser = User::find(    [
            "id = :id:",
            "bind" => [
                "id" => $id,
            ],
        ]);
        $this->view->setVar("aUser",$aUser);

    }

    public function deleteAction($id=NULL,$val=NULL)
    {

        $aUser = User::find(    [
            "id = :id:",
            "bind" => [
                "id" => $id,
            ],
        ]);
        $this->view->setVar("aUser",$aUser);
        $this->view->setVar("val",$val);


        if($val!=NULL){
            $valide = $aUser->delete();
            $this->view->setVar("val",$valide);
        }

    }

    public function editAction($id)
    {
        $user = User::findFirst($id);
        $this->view->setVar("updateUser", $user);
        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);
            if ($user->save() == false) {
                $msg = "Problème d'enregistrement \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("contenueMsg", $msg);
            } else {
                $this->view->setVar("contenueMsg", "Utilisateur modifié");
            }
        }
        $this->view->setVar("roles", Role::find());
    }
    public function addAction()
    {
        if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user = new User();
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);
            if ($user->save() == false) {
                $msg = "Problème d'enregistrement \n";
                foreach ($user->getMessages() as $message) {
                    $msg .= $message . "\n";
                }
                $this->view->setVar("contenueMsg", $msg);
            } else {
                $this->view->setVar("contenueMsg", "Utilisateur ajouté");
            }
        }
        $this->view->setVar("roles", Role::find());
    }
}

