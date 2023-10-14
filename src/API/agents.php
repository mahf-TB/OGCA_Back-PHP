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

    $sql = "SELECT agent_matricule, nom, prenom, date_naissance, cin, sexe, statut, date_avance, corps_libelle, grade_abreviation, ministere_libelle, section_code, sanction_code
     FROM AGENTS JOIN GRADE ON code_grade=grade_code 
     JOIN CORPS ON code_corps=corps_code 
     JOIN MINISTERE ON code_ministere = minstere_code 
     JOIN SECTION ON code_section=section_code 
     JOIN SANCTION ON code_sanction=sanction_code;";


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