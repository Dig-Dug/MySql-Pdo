<?php
    require_once 'includes/funktionen.inc.php';
	require_once 'includes/datenbank.inc.php';

    $stmt = $db->query('SELECT * FROM books');
    $books = $stmt->fetchAll();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Liste aller Books</title>
    </head>
    <body>
        <h1>Liste aller Bücher</h1>

        <table border="1">
            <tr>
                <th>Id</th>
                <th>Titel</th>
                <th>Autor</th>
                <th>Land</th>
                <th>Genre</th>
                <th>Beschreibung</th>
                <th>Jahr</th>
            </tr>

            <?php foreach($books as $b): ?>
                <tr>
                    <td><?php echo $b['id'] ?></td>
                    <td><?php echo $b['titel'] ?></td>
                    <td><?php echo $b['autor'] ?></td>
                    <td><?php echo $b['land'] ?></td>
				    <td><?php echo $b['genre_id'] ?></td>
				    <td><?php echo $b['beschreibung'] ?></td>
					<td><?php echo $b['jahr'] ?></td>
                    <td>
                    <a href="anzeigen.php?id=<?php echo $b['id'] ?>">
                          anzeigen
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p>
            <a href="anlegen.php">Neuen Buch anlegen</a>
        </p>
    </body>
</html>
