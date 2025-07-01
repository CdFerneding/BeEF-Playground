<?php
// Einfaches XSS-Beispiel: unsicherer Umgang mit GET-Parameter "name"
$name = $_GET['name'] ?? '';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Minimal XSS</title>
</head>
<body>
    <h1>Welcome Bob!</h1>
    
    <form method="get" action="">
        <label>Dein Name: <input type="text" name="name"></label>
        <button type="submit">Absenden</button>
    </form>

    <p>Hallo, <?php echo $name; ?>!</p> <!-- echoing unsanitized user input -->
</body>
</html>
