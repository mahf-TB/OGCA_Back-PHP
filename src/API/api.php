<?php
// recupération des données requêtes
include_once("db.php");

  # code...
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');



$data = array('error' => false);
$action = '';


if (isset($_GET['action'])) {
  $action = $_GET['action'];
}

$action='login';

if ($action == 'login'){

    $matricule=$_POST['matricule'];
    $password=$_POST['password'];
 
   
  $sql = "select id,matricule,nom,prenom,role from USERS where matricule ='$matricule' AND password='$password';";
    
    $resultat=$conn->query($sql);
    $info = array();
    while ($a = $resultat->fetch_array()) {
      array_push($info ,$a);
    }
    $row = mysqli_num_rows($resultat);
    if ($row >0) {

      $data['infoBD']=$info;
      $data['message']='vous etes connecter...';
    }else {
      # code...
      $data['error']=true;
      $data['message']='votre matricule ou mot de passe sont incorrect';
    }

    
}

$conn->close();
echo json_encode($data);
die();
