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


if ($action == 'user') {

  $matricule = $_POST['matricule'];
  
  $sql = "select * from USERS where matricule ='$matricule';";
  
  $resultat = $conn->query($sql);
  $info = array();
  
  while ($a = $resultat->fetch_array()) {
      array_push($info, $a);
  }

  $row = mysqli_num_rows($resultat);
  if ($row > 0) {
    $data['infoBD'] = $info;
    $data['message'] = 'Success...! les données sont recuperés';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
  }
}

if ($action == 'edit') {

  $id = $_POST['id_mat'];
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
if ($password == '') {
  $sql = "UPDATE `USERS` SET `matricule`='$matricule', `nom`='$nom',`prenom`='$prenom' WHERE matricule='$id';";
}else {
  $sql = "UPDATE `USERS` SET `matricule`='$matricule', `nom`='$nom',`prenom`='$prenom',`password`='$password'  WHERE matricule='$id';";
}

  if ($conn->query($sql) == true) {
    $data['message'] = 'Success...! les données sont modifier';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les données sont pas modifier';
  }
}

$conn->close();
echo json_encode($data);
die();