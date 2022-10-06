<?php
require_once __DIR__ . '/../../config/config.php';
session_start();
/*
I am a mod
$_SESSION["mod"] = true;
$_SESSION["tableAccount"] = 'users';
$_SESSION["idFind"] = 'userID';
$_SESSION["myTable"] = 'mods';
$_SESSION["myCol"] = 'modID';
*/
$currID = $_SESSION['id'];
$myCol = $_SESSION['myCol'];
$idFind = $_SESSION['idFind'];
$theirTable = $_SESSION['tableAccount'];
$convoQue = "select * from convo where $myCol = $currID";
$convoRes = $mysqli->query($convoQue);
$convoRow = mysqli_fetch_assoc($convoRes);;

$commQue = "select * from comm";
$commRes = $mysqli->query($commQue);
$commRow = mysqli_fetch_assoc($commRes);

if (mysqli_num_rows($commRes) > 0) {
    foreach ($commRes as $commRow) {
        $commChatID = $commRow['chatID'];
        $commPrice = $commRow['price'];
        foreach ($convoRes as $convoRow) {
            $convoID = $convoRow['convoID'];
            $chatQue = "select * from chat where chatID = $commChatID and convID = $convoID";
            $chatRes = $mysqli->query($chatQue);
            $chatRow = mysqli_fetch_assoc($chatRes);

            foreach ($chatRes as $chatRow) {
                $commDesc = $chatRow['message'];
                echo "<div class='commList'>description: <p> $commDesc</p>";
                echo "price: $commPrice PHP <br>";
                $connectID = $convoRow[$idFind];
                $connectQue = "select * from $theirTable where $idFind = $connectID";
                $connectRes = $mysqli->query($connectQue);
                $connectRow = mysqli_fetch_assoc($connectRes);
                $connectUsername = $connectRow['username'];
                if ($_SESSION['mod']) {
                    echo "client: ";
                } else {
                    echo "komi: ";
                }
                echo "<a href='/komision/src/user/user_index.php?chatID=$connectID'>$connectUsername</a>";

                echo "</div>";
            }
        }

    }
}
