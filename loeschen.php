<?php
    require_once 'includes/funktionen.inc.php';
    require_once 'includes/datenbank.inc.php';
	
    empty($_REQUEST['id']) && render404();

    $stmt = $db->prepare('DELETE FROM books WHERE id = ?');
    $stmt->execute( array($_REQUEST['id']) );

    redirect('index.php');
?>