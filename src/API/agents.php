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
if ($action == 'agent') {

    $sql = "SELECT AGENT_MATRICULE,CONCAT(nom,' ', prenom) as NOMS,STATUT,AVANCE_DATE as DERNIER_AVANCEMENT,CORPS_CODE, GRADE_CODE, POSTE_AGENT_DATE_DEBUT_CONTRAT as PROCHAIN_AVANCEMENT, REG_CODE,SECTION_CODE, SOA 
            FROM AGENTS;";

    // $sql = "SELECT * FROM `MINISTERE`;";
    $resultat = $conn->query($sql);
    $info = array();
    while ($a = $resultat->fetch_array()) {
        array_push($info, $a);
    }
    $row = mysqli_num_rows($resultat);
    if ($row > 0) {

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