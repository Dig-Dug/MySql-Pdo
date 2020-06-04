<?php
    require_once 'includes/funktionen.inc.php';
    require_once 'includes/datenbank.inc.php';

    empty($_REQUEST['id']) && render404();

    $stmt = $db->prepare('SELECT * FROM benutzer WHERE id = ? LIMIT 1');
    $stmt->execute( array($_REQUEST['id']) );
    $benutzer = $stmt->fetch();
    unset($stmt);

    $benutzer || render404();

    if ($_POST) {
        $stmt = $db->prepare('UPDATE benutzer SET
                anrede=:anrede, vorname=:vorname, name=:name,
                email=:email, passwort=:passwort
            WHERE id=:id');
        $stmt->execute($_POST);

        redirect('anzeigen.php?id=' . $benutzer['id']);
    }

    $stmt = $db->query('SELECT s.titel AS seminar_titel, st.id, st.beginn, st.ende, st.raum
        FROM seminartermine st
        JOIN seminare s ON st.seminar_id = s.id');
    $seminartermine = $stmt->fetchAll();
    unset($stmt);

    $stmt = $db->prepare('SELECT seminartermin_id FROM nimmt_teil WHERE benutzer_id = ?');
    $stmt->execute( array($_REQUEST['id']) );
    $teilnahmen = $stmt->fetchAll();

    // extrahiere die seminartermin_ids in ein flaches Array
    // Diese Lösung funktioniert so nur ab PHP 5.3
    $teilnahme_ids = array();
    array_walk($teilnahmen, function($element) use(&$teilnahme_ids) {
        array_push($teilnahme_ids, $element['seminartermin_id']);
    });
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Benutzer "<?php echo $benutzer['email'] ?>" bearbeiten</title>
    </head>
    <body>
        <h1>Benutzer "<?php echo $benutzer['email'] ?>" bearbeiten</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $benutzer['id'] ?>" />

            Anrede: <select name="anrede">
                <option <?php if($benutzer['anrede'] == 'Herr') { echo 'selected="selected"'; } ?>>Herr</option>
                <option <?php if($benutzer['anrede'] == 'Frau') { echo 'selected="selected"'; } ?>>Frau</option>
                <option <?php if($benutzer['anrede'] == 'Dr') { echo 'selected="selected"'; } ?>>Dr</option>
            </select><br />

            Vorname:
            <input type="text" name="vorname" value="<?php echo $benutzer['vorname'] ?>" /><br />
            Name:
            <input type="text" name="name" value="<?php echo $benutzer['name'] ?>" /><br />
            E-Mail: <input type="text" name="email" value="<?php echo $benutzer['email'] ?>" /><br />
            Passwort: <input type="text" name="passwort" value="<?php echo $benutzer['passwort'] ?>" /><br />
            <input type="submit" value="Benutzer bearbeiten" />
        </form>

        <h2>Seminartermine zuordnen</h2>

        <form action="seminartermine_zuordnen.php" method="post">
            <?php foreach ($seminartermine as $st): ?>
                <input type="checkbox" name="seminartermin_ids[]"
                       value="<?php echo $st['id'] ?>"
                       <?php if (in_array($st['id'], $teilnahme_ids)) { echo 'checked="checked"'; } ?>
                    />
                <?php echo $st['seminar_titel'] ?>
                von <?php echo datum($st['beginn']) ?>
                bis <?php echo datum($st['ende']) ?>
                Raum: <?php echo $st['raum'] ?><br />
            <?php endforeach; ?>

            <input type="hidden" name="benutzer_id" value="<?php echo $benutzer['id'] ?>" />
            <input type="submit" value="Seminartermine zuordnen" />
        </form>

    </body>
</html>
