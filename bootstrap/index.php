<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="entete">
        <video autoplay="autoplay" class="video_entete">
            <source src="image/136081 (720p).mp4" type="video/mp4" />
        </video>
        <p class="nomSite"> ArooBook</p>
        <div id="Livre">
            <form name="Livre" method="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder="recherche par Auteur"> />
                <input class="btFind" type="submit" name="btSubmit" value="Recherche" />

            </form>

        </div>

    </div>
</body>

</html>