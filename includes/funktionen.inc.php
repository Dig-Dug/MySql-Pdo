<?php

    /**
     * Zeigt eine 404-Fehlerseite an und bricht die Abarbeitung des aktuellen
     * Skripts ab. 
     */
    function render404() {
        header("HTTP/1.0 404 Not Found");
        echo "Seite nicht gefunden!";
        exit();
    }

    /**
     * Formatiert einen MySQL-DATE-String in ein deutsches Datum um
     *
     * @param string $$db_date Der DATE-String
     * @return string Das deutsche, formatierte Datum
     */
    function datum($db_date) {
        return strftime('%d.%m.%Y', strtotime($db_date));
    }

    /**
     * Leitet den Browser auf eine neue URL weiter und beendet die
     * Skriptausführung.
     *
     * @param string $url Die URL, auf die weitergeleitet wird.
     */
    function redirect($url) {
        header("Location: $url");
        exit;
    }

    
?>