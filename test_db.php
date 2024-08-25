<?php
$db_host = '13.39.131.193:8002';
$db_username = 'dev_10';
$db_password = 'Passw0rd98532_dev10';
$db_name = 'symfony_proj_dev_10';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    echo "Erreur de connexion à la base de données";
} else {
    echo "Connexion à la base de données réussie";
}
?>