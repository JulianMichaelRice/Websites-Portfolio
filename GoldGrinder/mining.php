<?php
ini_set('display_errors', '1');

$table = "mining";
include('../config_globals.php');

if(!$auth) {
    echo 'not authorized to access page';
    exit;
}

$search_fields = array('area', 'name', 'mob', 'trophy');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = 'SELECT id, timestamp, trophy, profile, name, mob, value, area, time FROM';

    $limit = 100000;
    if (isset($_GET['limit']) || isset($_GET['start']) || !($_GET)) {
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        if (isset($_GET['start'])) {
            $query = $query . ' (SELECT * FROM ' . $table . ' LIMIT ' . $_GET['start'] . ',' . $limit . ') AS `temp`';
        } else {
            $query = $query . ' (SELECT * FROM ' . $table . ' ORDER BY id DESC LIMIT ' . $limit . ') AS `temp`';
        }
    } else {
        $query = $query . ' ' . $table;
    }
    foreach ($search_fields as $search_field) {
        if (isset($_GET[$search_field])) {
            if(strpos($query, 'WHERE')) {
                $query = $query . ' AND';
            } else {
                $query = $query . ' WHERE';
            }
            $query = $query . ' `' . $search_field . '` REGEXP "' . $_GET[$search_field] . '" ';
        }
    }
    if (isset($_GET['ped_low']) && isset($_GET['ped_high'])) {
        if(strpos($query, 'WHERE')) {
            $query = $query . ' AND';
        } else {
            $query = $query . ' WHERE';
        }
        $query = $query . ' `value` BETWEEN ' . $_GET['ped_low'] . ' AND ' . $_GET['ped_high'];
    }
    if (isset($_GET['time'])) {
        if(strpos($query, 'WHERE')) {
            $query = $query . ' AND';
        } else {
            $query = $query . ' WHERE';
        }
        $query = $query . ' `time` >= TIMESTAMP("' . $_GET['time'] . '")';
    }
    if (isset($_GET['time_start']) && isset($_GET['time_stop'])) {
        if(strpos($query, 'WHERE')) {
            $query = $query . ' AND';
        } else {
            $query = $query . ' WHERE';
        }
        $query = $query . ' `time` >= TIMESTAMP("' . $_GET['time_start'] . '") AND `time` < TIMESTAMP("' . $_GET['time_stop'] . '")';
    }
    $query = $query . ' ORDER BY `time` DESC, `id` DESC';
    $stmt = $pdo->query($query);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>Mining</title>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">';
if (isset($_GET['refresh'])) {
    echo '<meta http-equiv="refresh" content="60" >';
}
echo '</head>';
echo '<body>';
//foreach ($products as $location=>$product) {
    echo '<table>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>TimeStamp</td>';
    echo '<td>Trophy</td>';
    echo '<td>Profile</td>';
    echo '<td>Name</td>';
    echo '<td>Mob</td>';
    echo '<td>Value</td>';
    echo '<td>Area</td>';
    echo '<td>Time</td>';
    echo '</tr>';
	foreach( $stmt as $row) {
		echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['timestamp'] . '</td>';
        echo '<td>' . $row['trophy'] . '</td>';
        echo '<td><a href=http://www.entropialife.com/Profile.aspx?P=' . $row['profile'] . '>' . $row['profile'] . '</a></td>';
		echo '<td>' . utf8_encode($row['name']) . '</td>';
		echo '<td>' . utf8_encode($row['mob']) . '</td>';
		echo '<td>' . $row['value'] . ' ped</td>';
		echo '<td>' . utf8_encode($row['area']) . '</td>';
		echo '<td>' . $row['time'] . '</td>';
		echo '</tr>';
	}
    echo '</table>';
//}
echo '</body>';
echo '</html>';
?>
