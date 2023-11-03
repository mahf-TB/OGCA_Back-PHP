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

#recuperation de donnees dans la get
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


if ($action == 'tout') {

    $role = $_POST['role'];
    $matricule = $_POST['matricule'];

    if ($role != 'RH') {
        $sql = "SELECT ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS WHERE STATUT = 'CONTRACTUEL';";
    }else{
        $sql = "SELECT A.ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS A JOIN USER_SECTION US on A.SECTION_CODE = US.id_section WHERE US.id_user='$matricule' and A.STATUT='FONCTIONNAIRE';";
    }


    $resultat = $conn->query($sql);
    $info = array();
    while ($a = $resultat->fetch_array()) {
        array_push($info, $a);
    }
    $row = mysqli_num_rows($resultat);
    if ($row > 0) {
        $data['count']= $row;
        $data['dataAgents'] = $info;
        $data['message'] = 'Success...! les données sont recuperés';
    } else {
        # code...
        $data['error'] = true;
        $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
    }
}


if ($action == 'sixM') {

    $role = $_POST['role'];
    $matricule = $_POST['matricule'];

    if ($role != 'RH') {
        $sql = "SELECT ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS WHERE STATUT = 'CONTRACTUEL';";
    }else{
        $sql = "SELECT A.ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS A JOIN USER_SECTION US on A.SECTION_CODE = US.id_section WHERE US.id_user='$matricule' and A.STATUT='CONTRACTUEL';";
    }

    // $sql = "SELECT * FROM `MINISTERE`;";
    $resultat = $conn->query($sql);
    $info = array();
    while ($a = $resultat->fetch_array()) {
        array_push($info, $a);
    }
    $row = mysqli_num_rows($resultat);
    if ($row > 0) {
        $data['count']= $row;
        $data['dataAgents'] = $info;
        $data['message'] = 'Success...! les données sont recuperés';
    } else {
        # code...
        $data['error'] = true;
        $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
    }
}



if ($action == 'tard') {

    $role = $_POST['role'];
    $matricule = $_POST['matricule'];


    if ($role != 'RH') {
        $sql = "SELECT ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS WHERE STATUT = 'CONTRACTUEL';";
    }else{
        $sql = "SELECT A.ID,AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS, STATUT, CORPS_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as FIN_CONTRAT ,SECTION_CODE, SOA , REG_CODE 
        FROM AGENTS A JOIN USER_SECTION US on A.SECTION_CODE = US.id_section WHERE US.id_user='$matricule' and A.STATUT='CONTRACTUEL';";
    }


    $resultat = $conn->query($sql);
    $info = array();
    while ($a = $resultat->fetch_array()) {
        array_push($info, $a);
    }
    $row = mysqli_num_rows($resultat);
    if ($row > 0) {
        $data['count']= $row;
        $data['dataAgents'] = $info;
        $data['message'] = 'Success...! les données sont recuperés';
    } else {
        # code...
        $data['error'] = true;
        $data['message'] = 'Failed...! les Ddonnées sont pas recuperés';
    }
}




$conn->close();
echo json_encode($data);
die();


