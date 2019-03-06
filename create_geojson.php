<?php
include('config.php');
// prendre le fichier departement GeoJSON
$str  = file_get_contents('dep.json');
// decoder le json en un tableau associatif
$json = json_decode($str, true);

// Effectuer une requete concernant la moyenne pour chaque departement et retourner les résultats dans un tableau
$sql            = "SELECT DISTINCT dep, avg(prix_f1) AS prix_moyen FROM infos_ehpad group by dep";
$result         = mysqli_query($link, $sql);
$tab_prix_moyen = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    // code...
    $dep                  = $row['dep'];
    $tab_prix_moyen[$dep] = $row['prix_moyen'];
    $prix_moyen           = round($row['prix_moyen']);
    //echo $dep.' '.$prix_moyen.'<br />';

}
//echo '<pre>'; print_r($tab_prix_moyen); echo '</pre>';
// Pour chaque element du GeoJSON
// Réupérer le code département
// Rechercher dans le tableau des valeurs le prix moyen
// Rajouter cet element dans le JSON

foreach ($json['features'] as $departement => $value) {
    //  echo $value['properties']['code'].'<br />';
    $code_dep = $json['features'][$departement]['properties']['code'];

    if ($tab_prix_moyen[$code_dep] && $tab_prix_moyen[$code_dep] != '') {
        //echo 'oui '.$tab_prix_moyen[$code_dep].'<br />';
        $prix                                                       = $tab_prix_moyen[$code_dep];
        $json['features'][$departement]['properties']['prix_moyen'] = $prix;
    }

}

// Printer le GEOJSON en entier


$fp = fopen('geojson_avec_prix_moyens.json', 'w');
fwrite($fp, json_encode($json));
fclose($fp);
?>
