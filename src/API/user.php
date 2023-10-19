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



if (isset($_GET['action'])) {
  $action = $_GET['action'];
}


if ($action == 'user') {

  $sql = "SELECT * FROM `USERS` WHERE role='RH';";
  $resultat = $conn->query($sql);
  $info = array();
  while ($a = $resultat->fetch_array()) {
    array_push($info, $a);
  }
  $row = mysqli_num_rows($resultat);
  if ($row > 0) {

    $data['dataUser'] = $info;
    $data['message'] = 'Success...! les données sont recuperés';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
  }
}

if ($action == 'add') {

  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $sql = "INSERT INTO `USERS` ( `matricule`, `nom`, `prenom`, `password`, `role`) VALUES ( '$matricule', '$nom', '$prenom', '$password', '$role');";

  if ($conn->query($sql) == true) {
    $data['message'] = 'Success...! les données sont enregistrer';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les données sont pas enregistrer';
  }
}

if ($action == 'edit') {

  $id = $_POST['id_mat'];
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $sql = "UPDATE `USERS` SET `matricule`='$matricule', `nom`='$nom',`prenom`='$prenom',`role`='$role' WHERE matricule='$id';";

  if ($conn->query($sql) == true) {
    $data['message'] = 'Success...! les données sont modifier';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas modifier';
  }
}

if ($action == 'delete') {

  $ID = $_POST['id'];
  $sql = " DELETE FROM USERS WHERE matricule = '$ID'";
  if ($conn->query($sql) == true) {
    $data['message'] = 'Success...! les données sont Supprimer';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas Supprimer';
  }
}

if ($action == 'section') {

  $sql = "select section_code, section_libelle  from SECTION; ";
  $resultat = $conn->query($sql);
  $info = array();
  while ($a = $resultat->fetch_array()) {
    array_push($info, $a);
  }
  $row = mysqli_num_rows($resultat);
  if ($row > 0) {

    $data['dataSection'] = $info;
    $data['message'] = 'Success...! les données sont recuperés';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
  }
}

if ($action == 'addSec') {

  $id_user = $_POST['matricule'];
  $id_section = $_POST['section'];

  $sql = "INSERT INTO `USER_SECTION`(`id`, `id_section`, `id_user`) VALUES (null,'$id_section','$id_user');";

  if ($conn->query($sql) == true) {
    $data['message'] = 'Success...! les données sont enregistrer';
  } else {
    # code...
    $data['error'] = true;
    $data['message'] = 'Failed...! les Ddonnées sont pas enregistrer';
  }
}


$conn->close();
echo json_encode($data);
die();
