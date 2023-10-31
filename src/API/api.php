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
 
   
    // SELECT id_section FROM USER_SECTION , USERS WHERE id_user=matricule AND matricule='44' AND password='mirana123';
  $sql = "select matricule,nom,prenom,role from USERS where matricule ='$matricule' AND password='$password';";
    
    $resultat=$conn->query($sql);
    $info = array();
    $row = mysqli_num_rows($resultat);
    if ($row >0) {
      while ($a = $resultat->fetch_array()) {
        array_push($info ,$a);
      }


      // selectioner les section que les user
      // $qry = "SELECT id_section, matricule, nom, prenom, role  FROM USER_SECTION , USERS WHERE id_user=matricule AND matricule='$matricule' AND password='$password';";
      // $res=$conn->query($qry);
      // $ligne = mysqli_num_rows($res);
      // if ($ligne > 0) {
      //   $info = array();
      //   while ($a = $res->fetch_array()) {
      //     array_push($info ,$a);
      //   }
      // }


      
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
