<?php
    require_once 'includes/funktionen.inc.php';
	require_once 'includes/datenbank.inc.php';

    if ($_POST) {
        $stmt = $db->prepare('INSERT INTO benutzer 
            (anrede, vorname, name, email, passwort, registriert_seit)
            VALUES (:anrede, :vorname, :name, :email, :passwort, CURDATE())');
        $stmt->execute($_POST);
        
        redirect('index.php');
    }   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Neuen Benutzer anlegen</title>
    </head>
    <body>
        <h1>Neuen Benutzer anlegen</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            Anrede: <select name="anrede">
                <option>Herr</option>
                <option>Frau</option>
                <option>Dr</option>
            </select><br />
            Vorname: <input type="text" name="vorname" /><br />
            Name: <input type="text" name="name" /><br />
            E-Mail: <input type="text" name="email" /><br />
            Passwort: <input type="text" name="passwort" /><br />
            <input type="submit" value="Benutzer anlegen" />
        </form>

    </body>
</html>