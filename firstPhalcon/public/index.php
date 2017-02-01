<?php
/**
 * Created by PhpStorm.
 * User: Coco
 * Date: 25/01/2017
 * Time: 14:18
 */

try {

    //Enregistrement d'un autoloader pour premettre l'inclusion auto des fichiers de classe
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //DI est le service responsable de l'injection de dépendance des services Phalcon utilisés
    $di = new Phalcon\DI\FactoryDefault();

    //Configuration des vues
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //Configuration de l'URL de base
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/firstPhalcon/');
        return $url;
    });

    //Configuration du service database
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "dbname" => "firstPhalconDb"
        ));
    });

    //Interception de la requête pour routage et dispatching
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}