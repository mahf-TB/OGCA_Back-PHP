<?php

// création connexion
try {

    $conn = new mysqli("localhost", "zifukoro", "zifukoro$", "RappelCAR");
    if (!$conn) {
        die("connection failed: ");
    } 
} catch (Exception $e) {
    echo "ERREUR DE CONNEXION: " . $e->getMessage();
}

?>