<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');         //Ces trois lignes permettent d'afficher les rapports d'erreurs
error_reporting(E_ALL);

require("Database.php");
$db=new Database();

$realisations=$db->selectAll('realisations');
$competences=$db->selectAll('competences');
$croix=$db->selectAll('real_comp');
echo(json_encode(["realisations"=>$realisations,"competences"=>$competences,"croix"=>$croix]));
?>