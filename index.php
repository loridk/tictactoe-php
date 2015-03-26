<?php
/**
 * Created by PhpStorm.
 * User: Lori DK & Meagan Park
 * Date: 3/3/2015
 * Time: 11:59 AM
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tic Tac Toe!</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
</head>
<body>
<section>
<div class="main">
    <h1>Tic Tac Toe</h1>
<form action="game.php" method="post">
    <p>Please pick your piece:</p>


    <p class="x">X
    <input type="radio" name="piece" value="X" checked>
    </p>
    <p class="o">O
    <input type="radio" name="piece" value="O">
    </p>
    <input type="hidden" name="turnNum" value="1">
    <button type="submit" name="submit" value="Submit">Submit</button>
</form>

    </div>

</section>
<p>
    <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br /> <a xmlns:cc="http://creativecommons.org/ns#" href="http://dkdevs.com" property="cc:attributionName" target="_blank" rel="cc:attributionURL">DK Devs</a> &amp; <a xmlns:cc="http://creativecommons.org/ns#" href="https://www.linkedin.com/profile/view?trk=contacts-contacts-list-contact_name-0&id=308248498" property="cc:attributionName" target="_blank" rel="cc:attributionURL">Meagan Park</a>
</p>
</body>
</html>
