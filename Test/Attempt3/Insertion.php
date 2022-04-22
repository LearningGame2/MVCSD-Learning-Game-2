<?php

function conn () {
    $connect = mysqli_connect("localhost", "fishell1", "S219352", "Game2");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conn;
}

?>

<!DOCTYPE html>
<html>
    <body>
        <script>
            let cookieArray = document.cookie.split(';');
            let scoreCookie = cookieArray[3]; //might be [4]?  maybe play around with sorting score vs streak in cookie array?
            while (scoreCookie.charAt(0)!= '='){
                scoreCookie = cook.substring(1);
            }
            let scoreNum = scoreCookie;
        </script>
    </body>
</html>