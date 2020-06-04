<?php
    require_once 'includes/funktionen.inc.php';
    require_once 'includes/datenbank.inc.php';
	
    // 404-Seite anzeigen, wenn der Parameter id leer ist
    empty($_REQUEST['id']) && render404();

    $stmt = $db->prepare('SELECT * FROM books WHERE id = ? LIMIT 1');
    $stmt->execute( array($_REQUEST['id']) );
    $books = $stmt->fetch();
    unset($stmt);

    // 404-Seite anzeigen, wenn kein passendes Seminar gefunden wurde
    $books || render404();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Books "<?php echo $books['id'] ?>"</title>
    </head>
    <body>
        <h1>Books "<?php echo $books['titel'] ?>"</h1>

        <table border="1">
            <tr>
                <th>Id</th>
                <td><?php echo $books['id'] ?></td>
            </tr>
            <tr>
                <th>Titel</th>
                <td><?php echo $books['titel'] ?></td>
            </tr>
            <tr>
                <th>Autor</th>
                <td><?php echo $books['autor'] ?></td>
            </tr>
            <tr>
                <th>Land</th>
                <td><?php echo $books['land'] ?></td>
            </tr>
            <tr>
                <th>Genre id</th>
                <td><?php echo $books['genre_id'] ?></td>
            </tr>
			            <tr>
                <th>Beschreibung</th>
                <td><?php echo $books['beschreibung'] ?></td>
            </tr>
			            <tr>
                <th>Jahr</th>
                <td><?php echo $books['jahr'] ?></td>
            </tr>
            
        </table>

        <p>
            <a href="bearbeiten.php?id=<?php echo $books['id'] ?>">bearbeiten</a>
            <a href="loeschen.php?id=<?php echo $books['id'] ?>">löschen</a>
        </p>
    </body>
</html>
