<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'bibliothek';

$sql = "INSERT INTO books (titel,beschreibung,genre_id,land,jahr,autor) VALUES 
('Der Pate', 'Beschreibung id 1',2,'USA',1971,'Mario Puso'),
('Buch2', 'Beschreibung id 2', 2,'USA',1997,'Autor2'),
('Buch3', 'Beschreibung id 3', 3,'Deutschland',2011,'Autor3'),
('Buch4', 'Beschreibung id 4', 1,'Japan',1995,'Autor4'),
('Buch5', 'Beschreibung id 5', 3,'Frankreich',2015,'Autor5');
INSERT INTO genres (genre) VALUES
('action'),
('krimi'),
('scifi'),
('fantasy');";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Daten in der Tabellen books und genres wurden erfolgreich eingefügt<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 