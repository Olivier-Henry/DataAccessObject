<?php

session_start();
//include './classes/DAO/IDAO.php';
//include './classes/DAO/DAOClient.php';
//include './classes/DAO/DTOClient.php';
//include './classes/DAO/DAOLivre.php';
//include './classes/DAO/DTOLivre.php';

/**
 * Auto chargement des classes
 * @param type $class
 * @throws Exception
 */
function autoloader($class){
    $path = "classes/DAO/$class.php";
    if(file_exists($path)){
        include_once $path;
    }else{
        throw new Exception("Le fichier $path est inexistant");
    }
}

spl_autoload_register('autoloader');


$pdo = new PDO("mysql:host=127.0.0.1;dbname=chapitre;charset=utf8", "root", ""
        , array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

//$dao = new DAOClient($pdo);
//var_dump($dao->findAll());
//
//$client = new DTOClient();
//$email = uniqid("rev@iuyikuhuizuygey.com");
//$client->setEmail($email)
//        ->setPlainPassword("456");
//
//$dao->save($client);
//var_dump($client);
//
//$_SESSION['client'] = serialize($client);


try {

    $daoLivres = new DAOLivre($pdo);
    //var_dump($daoLivres->findAll());



    $dtoLivre = new DTOLivre();
    $dtoLivre->setTitre("Hello")
            ->setPrix(14.85)
            ->setDate_achat("2015-10-03")
            ->setAuteur_id(1)
            ->setEditeur_id(2)
            ->setGenre_id(2);

    $daoLivres->save($dtoLivre);
    var_dump($dtoLivre);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}



