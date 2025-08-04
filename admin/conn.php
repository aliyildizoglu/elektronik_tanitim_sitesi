<?php
$host = 'bhjqniytwryp60zv0mge-mysql.services.clever-cloud.com';
$dbname = 'bhjqniytwryp60zv0mge';
$username = 'uqxmvrbagzrydekg';
$password = 'PeNUkp8mUuF8pfzmSK34';
$port = '3306';





try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>


