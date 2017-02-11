<?php
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
class UsersController extends \Phalcon\Mvc\Controller

{

    public function indexAction($page=1,$sField="firstname",$sens="asc",$filter=NULL)
    {
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

}

