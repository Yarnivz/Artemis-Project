<?php
    include "functions.php";
    authenticate();
    include "Assets/database/connection.php";
    $conn = dbConnection();
    $userID = $_SESSION['loggedUser']['UserID'];
    $sqlQuery1 = "SELECT * FROM Friends WHERE `UserID` = '$userID';";
    $result1 = mysqli_query($conn, $sqlQuery1);
    $num_rows = mysqli_num_rows($result1);
    $friends = $result1 -> fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content-ppu="width=device-width, initial-scale=1.0">
    <title>friends</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>
<body>

    <section class="header"> 
        <nav>
            
            <div class="nav-links" id="navlinks"> 
                <a href="index.html"><img src="assets/images/log2.png" class="logo" alt="index.html"> </a>
                <ul>                    
                    <?php
                        navbar();
                    ?>    
                </ul>

            </div>

            <?php
                var_dump($friends);
                if ($num_rows < 1) {
                    echo "You have no friends yet. It's time to make new friends";
                }
                else {
                    foreach($friends as $friend) {
                        $friendID = $friend["FriendID"];
                        $sqlQuery2 = "SELECT * FROM Users WHERE `UserID` = '$friendID';";
                        $result2 = mysqli_query($conn, $sqlQuery2);
                        $users = $result2 -> fetch_all(MYSQLI_ASSOC);
                        foreach($users as $user) {
                            $fullname = $user["fullname"];
                            echo "$fullname";
                        }
                    }
                }
            ?>
          
        </nav>
    </section>
    
    <script src="Assets/js/friends.js"></script>

</body>
</html> 