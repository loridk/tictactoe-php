<?php
/**
 * Created by PhpStorm.
 * User: Lori DK & Meagan Park
 * Date: 3/3/2015
 * Time: 12:06 PM
 */




session_start();
require('board.php');


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
        <?php

        //assign piece from other page
        if (isset($_POST['submit'])) {
            //reset turn number
            $_SESSION['turnNum'] = 1;

            // assign pieces
            // grab selected piece for player 1
            $_SESSION['player1'] = $_POST['piece'];

            // assign player 2 piece
            if ($_SESSION['player1'] == "X") {
                $_SESSION['player2'] = "O";
            } else {
                $_SESSION['player2'] = "X";
            }
        }

        // output player piece choices
        echo 'Player 1: ' . $_SESSION['player1'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
        echo 'Player 2: ' . $_SESSION['player2'] . '<br />';

        // check who's turn it is
        if ($_SESSION['turnNum'] % 2 == 0) {
            $whoTurn = "Player 2";
        }
        else {
            $whoTurn = "Player 1";
        }

        // Output turn number
        echo '<br />Turn number - ' . $_SESSION['turnNum'];


        if ($_SESSION['turnNum'] == 1) {
            // create board
            $board = new board();
            // player 1 plays
            $board->array[/*$area*/] = $_SESSION['player1'];
            // serialize board to hold position
            $_SESSION['board'] = serialize($board);
        }
        else {

            //if (isset($_GET['turn'])) {
            $board = unserialize($_SESSION['board']);

            // apply turn
            $area = (int)$_GET['area'];
            $choice = "<br />You chose space - " . $area;
            echo $choice;
            // put choice on board (putting it at the end of the array for some reason
            if ($whoTurn == "Player 1") {
                $board->array[$area] = $_SESSION['player2'];
            }

            else {
                $board->array[$area] = $_SESSION['player1'];
            }

            // See if won?
            // have enough turns happened?
            if ($_SESSION['turnNum'] >= 3) {
                // compare to win arrays
                // call winArrays function
                $x = $_SESSION['player1'];
                $o = $_SESSION['player2'];

                $checkWin = $board->winArrays($x);
                $checkWin = $board->winArrays($o);
               // echo $checkWin;
            }

            if ($_SESSION['turnNum'] >= 9 && $board->winArrays($whoTurn) == false) {
                // win equals false, it's a draw
                echo '<br />It is a draw! <a href="index.php">New Game?</a>';
            }

            // serialize board to hold position
            $_SESSION['board'] = serialize($board);
            //}
        }

        // Player took turn
        // in here: apply the turn, serialize the board
        // see if won?




        // Choice form
        // start form
        echo '<div class="turn">';
        echo '<form action="game.php" method="get" >';

        // says who's turn it is
        echo $whoTurn;
        echo '<p>Please select a move</p>';
        echo '<select name="area">';

        // array of spots
        foreach ($board->array as $box) {
            // take markers/chosen out of menu
            if ($box != "X" && $box != "O") {
                echo '<option value="' . $box . ' ">' . $box . '</option>';
            }
        }

        // rest of form
        echo '</select>';
        echo '<input type="hidden" name="turnNum" value="' . $_SESSION['turnNum']++ . '">';
        echo '<p>
                    <button type="submit" name="turn" value="turn">Take Turn</button><br />
                    <a href="index.php">New Game!</a>
                </p>
            </form>
            </div>';


        // output board to screen
        //$board = unserialize($_SESSION['board']);
        echo $board;
        //echo var_dump($board->array);


        /*
 
            // if turn taken
            if (isset($_GET['turn'])) {
 
 
 
                // put choice on board
                    // get key of value
                $key = array_search($choice,$array);
                    // change by key
 
                if ($whoTurn == "Player 1") {
                    $array[$key] = $player1->piece;
                }
                else {
                    $array[$key] = $player2->piece;
                }
 
 
                // take piece out of array
                //unset($array[$choice]);
 
                // test to see if array was changed
                print_r($array); // take this out after
 
 
 
 
 
            }
*/
        ?>

    </div>

</section>
<p>
    <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br /> <a xmlns:cc="http://creativecommons.org/ns#" href="http://dkdevs.com" property="cc:attributionName" target="_blank" rel="cc:attributionURL">DK Devs</a> &amp; <a xmlns:cc="http://creativecommons.org/ns#" href="https://www.linkedin.com/profile/view?trk=contacts-contacts-list-contact_name-0&id=308248498" property="cc:attributionName" target="_blank" rel="cc:attributionURL">Meagan Park</a>
</p>
</body>
</html>