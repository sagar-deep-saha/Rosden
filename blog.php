<?php
error_reporting(0);
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['username'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    $server = "localhost";
    $user = "root";
    $port = "3306";
    $password = "";
    $database = "rosden";

    $connection = mysqli_connect($server, $user, $password, $database, $port);
    if ($connection == false) {
        die(mysqli_connect_error());
    }

    // require "connector.php";

    $sql_query = "SELECT * FROM blog ORDER BY id DESC ";
    $sql_query_2 = "SELECT * FROM details WHERE roll='$df' ";
    $sql_query_mx = "SELECT * FROM details WHERE roll='$df' ";

    $last_query = mysqli_query($connection, $sql_query);
    $last_query_2 = mysqli_query($connection, $sql_query_2);
    $last_query_mx = mysqli_query($connection, $sql_query_mx);



    $connection->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogging Website</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body {
            background-color: aliceblue;
        }

        #blog_tail {
            font-family: 'Courier New', Courier, monospace;
            color: antiquewhite;
        }

        a {
            text-decoration: none;

        }

        #head_box {
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            display: flexbox;
        }

        #head_box h2 {
            margin: 1% 0% -1.5% 0%;
            display: flexbox;
        }

        #head_box marquee {
            width: 74%;
            /* background-color: green; */
            margin: 0% 0% 0% 25%;
            display: flexbox;
        }

        #blog_box_1 {
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
        }

        #blog_box_2 {
            border: navy 1px solid;
            border-radius: 9px;
            padding: 2%;
        }

        #blog_form {
            margin: 9% 0% -43.15% 33%;
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            width: 390px;
            height: 450px;
            opacity: 0.6;
            background-color: antiquewhite;
            position: fixed;
            display: none;
        }

        #blog_form label {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            color: blue;
            font-weight: 700;
        }

        #blog_form input {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            /* color: blue; */
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 30px;
            border: 0.2px solid black;
        }

        #blog_form textarea {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            /* color: blue; */
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 120px;
        }

        #blog_form_button {
            background-color: skyblue;
            border-radius: 4px;
            padding: 1.5%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            border: 0.4px solid navy;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            width: 385px;
        }

        #blog_form h4 {
            font-family: Arial, Helvetica, sans-serif;
            margin: -5% 0% 0% 95%;
            font-weight: 50;
            cursor: pointer;
        }

        .dom_x {
            color: brown;
        }

        .dom_z {
            color: green;
        }

        buttom {
            padding: 4%;
            background-color: #bfc0c8;
            color: black;
            font-family: 'Courier New', Courier, monospace;
            border: 0.5px solid navy;
            cursor: pointer;
            margin: 0% 0% 0% 17%;
            font-weight: 560;
            border-radius: 4px;
        }

        #side_box {
            padding: 2%;
            padding-top: 0%;
            background-color: brown;
            color: whitesmoke;
            /* margin: 0% 0% -10% 82%; */
            margin-bottom: -10%;
            margin-left: 86%;
            height: 92px;
            position: fixed;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            width: 10%;
            border: 0.5px solid navy;
        }

        #reset_button {
            border: none;
            background-color: inherit;
            padding: 0;
            margin: 0% 0% 0% 0%;
            cursor: pointer;
        }

        #welcome_user {
            color: green;
            font-weight: 200;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <form action="blog_load.php" method="POST" id="blog_form">
        <button type="reset" id="reset_button">
            <img src="fold/r.svg" alt="reset">
        </button>
        <h4 onclick="blog_form_hide();">X</h4>
        <br><br>
        <label for="title">Title</label><br>
        <input type="text" name="title" id="" required="required" id="blog_title" class="mrx"><br><br>
        <label for="blog">Blog</label><br>
        <!-- <input type="text" name="blog" id=""><br><br> -->
        <textarea type="text" name="blog" id="" required="required" id="blog_blog" class="mrx"></textarea><br><br><br><br>
        <button type="submit" id="blog_form_button">Submit</button>
    </form>
    <div id="head_box">
        <h2>Blogging Website</h2>
        <marquee behavior="scroll" direction="left">
            This website is Developed By Sagar D Saha
        </marquee>
        <br>
        <?php
        if (mysqli_num_rows($last_query_mx) == 1) {
            $f = 0;
            while ($group = mysqli_fetch_array($last_query_mx)) {
        ?>
                <a href="index.php">
                    <p id="welcome_user">Welcome <?php echo $group['name'];
                                                    $f++;
                                                }
                                            } ?></p>
                </a>
    </div>
    <div id="side_box">
        <h3>Create A Blog</h3>
        <!-- <br> -->
        <buttom onclick="blog_form_show();">Create</buttom>
        <br>
        <a href="out.php">
            <h4 id="blog_tail">&nbsp;Do Log Out</h4>
        </a>
        <br>
    </div>
    <div id="blog_box_1">

        <?php

        if (mysqli_num_rows($last_query_2) > 0) {
            $t = 0;
            while ($hill = mysqli_fetch_array($last_query_2)) {
        ?>
                <?php
                if (mysqli_num_rows($last_query) > 0) {
                    $s = 0;
                    while ($loop = mysqli_fetch_array($last_query)) {
                ?>

                        <div id="blog_box_2">
                            <p class="dom_z">
                                Blog No.
                                <?php echo $loop["id"]; ?>
                            </p>
                            <h3>
                                <?php echo $loop["type"]; ?>
                            </h3>
                            <p>
                                <!-- <b>Blog :</b><br> -->
                                <?php echo $loop["blog"]; ?>
                            </p>
                            <?php



                            if (isset($_SERVER['REQUEST_METHOD'])) {

                                $server = "localhost";
                                $user = "root";
                                $port = "3306";
                                $password = "";
                                $database = "rosden";

                                $connection = mysqli_connect($server, $user, $password, $database, $port);
                                if ($connection == false) {
                                    die(mysqli_connect_error());
                                }

                                $blue =  $loop["writer"];

                                $sql_query_4 = "SELECT * FROM details WHERE roll='$blue' ";
                                $last_query_4 = mysqli_query($connection, $sql_query_4);

                                $connection->close();
                            }


                            if (mysqli_num_rows($last_query_4) > 0) {
                                $p = 0;
                                while ($sand = mysqli_fetch_array($last_query_4)) {
                            ?>
                                    <h5>Written By : <?php echo $sand["name"]; ?></h5>

                                <?php
                                    $p++;
                                }
                            }
                            $red =  $loop["id"];

                            if (isset($_SERVER['REQUEST_METHOD'])) {

                                $server = "localhost";
                                $user = "root";
                                $port = "3306";
                                $password = "";
                                $database = "rosden";

                                $connection = mysqli_connect($server, $user, $password, $database, $port);
                                if ($connection == false) {
                                    die(mysqli_connect_error());
                                }

                                $sql_query_3 = "SELECT * FROM comment WHERE blogid='$red' ";
                                $last_query_3 = mysqli_query($connection, $sql_query_3);

                                $connection->close();
                            }

                            if (mysqli_num_rows($last_query_3) > 0) {
                                $r = 0;
                                while ($toph = mysqli_fetch_array($last_query_3)) {
                                ?>
                                    <p class="dom_x"><?php echo $toph["comment"]; ?></p>
                                    <p class="dom_x">Comment By <?php echo $toph["writer"]; ?></p>
                                    <hr>
                            <?php
                                    $r++;
                                }
                            } else {
                                echo "No one have Commented yet";
                            }
                            ?>

                            <form action="comment_load.php" method="POST">
                                <div style="display: none;">
                                    <input type="text" name="blogid" id="" value="<?php echo $loop["id"]; ?>">
                                    <input type="text" name="writer" id="" value="<?php echo $hill["name"]; ?>">
                                </div>
                                <input type="text" name="comment" placeholder="Enter Your Comment" required="required">
                                <button type="submit" onclick="blog_form_hide();">Comment</button>
                            </form>

                        </div>

                <?php
                        $t++;
                    }
                }
                ?>


        <?php
                $s++;
            }
        } else {
            echo "No result found";
        }
        ?>

    </div>

    <script src="script.js"></script>
</body>

</html>