<?php
// recupération des données requêtes
include_once("db.php");


# code...
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');

$data = array('error' => false);
$action = '';
echo 'importer data ty ';
#recuperation de donnees dans la get
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}



if ($action == 'add') {
    $code = $_POST['code'];
    $libelle = $_POST['soa'];
    $catego = $_POST['libelle'];

    $sql = "INSERT INTO `MINISTERE`(`minstere_code`, `ministere_abreviation`, `ministere_libelle`) VALUES ('$code','$libelle','$catego');";

    if ($conn->query($sql) == true) {
      $data['message'] = 'Success...! les données sont enregistrer';

    } else {
      # code...
      $data['error'] = true;
      $data['message'] = 'Failed...! les données sont pas enregistrer';
    }
  }
  


$conn->close();
echo json_encode($data);
die();