<?php
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    //$DB= new PDO("sqlite:/" . dirname(__FILE__) . "/QCM.db",null,null);
    //$DB = new PDO('mysql:host=iutbg-lamp.univ-lyon1.fr;dbname=p1400173', 'p1400173', '11400173', $pdo_options);
    $DB = new PDO('mysql:host=localhost;dbname=p1400173', 'root', 'root', $pdo_options);
    $DB->exec("SET NAMES'UTF8'");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
