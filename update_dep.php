<?php
include('config.php');

$query  = "SELECT * FROM `infos_ehpad`";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    // code...
    $url = $row['url'];
    $id  = $row['id'];

    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query, $params);
    $dep = $params['cp'];

    $sql2    = "UPDATE `infos_ehpad` SET `dep` = '$dep' WHERE `infos_ehpad`.`id` = $id;";
    $result2 = mysqli_query($link, $sql2);

    //echo $sql2 . '<br />';

}

?>
