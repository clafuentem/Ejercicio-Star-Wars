<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="star_wars.php" method="POST" >
        <fieldset>
            <legend>Star Wars</legend>
            <input type="radio" name="op" id="planets" value="planets">
            <label for="planets">Planets</label>
            <input type="radio" name="op" id="characters" value="characters">
            <label for="characters">Characters</label>
            <input type="radio" name="op" id="starships" value="starships">
            <label for="starships">Starships</label>
        </fieldset>
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>