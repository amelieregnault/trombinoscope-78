<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faille XSS</title>
</head>
<body>
    <form action="failleXSS.php" method="post">
        <input type="text" name="comment">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>