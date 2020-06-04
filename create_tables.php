<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'bibliothek';

$sql = "CREATE TABLE IF NOT EXISTS books
(
id INT(7) PRIMARY KEY AUTO_INCREMENT,
titel VARCHAR(60) NOT NULL,
beschreibung TEXT NOT NULL,
genre_id INT(2) NOT NULL,
land VARCHAR(30) NOT NULL,
jahr INT(4) NOT NULL,
autor VARCHAR(40) NOT NULL
);CREATE TABLE IF NOT EXISTS genres
(
id INT(2) PRIMARY KEY AUTO_INCREMENT,
genre VARCHAR(30) NOT NULL
);";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Die Tabellen books und genres wurden erfolgreich erstellt<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 