<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./img/cinema.jpg">
</head>

<body>
    <div class="top-panel">
        <?php
            session_start();
            if ($_SESSION["login"] == "admin") {
                echo '<a href="adminpanel.php" class="adminpanel">ADMIN PANEL</a>';
            }
        ?>
        <a href="index.php"><img src="./img/cinema.jpg">Cinema</a>
        <a href="logout.php" class="logout"><img src="./img/logout.png">Log out</a>
    </div>

    <div class="bottom-panel">
        Add new image

        <div class="addnewimage">
            <form method="POST" action="upload_file.php" enctype="multipart/form-data">
                <label for="addnewimage">Upload file:</label>
                <input type="file" name="addnewimage" id="addnewimage">
                
                <input type="submit" value="Add image"></input>
            </form>

            <?php
                if (isset($_SESSION['fileuploaded'])) {
                    if ($_SESSION["fileuploaded"] == "true") {
                        echo 'File '.$_SESSION["filename"].' succesfuly uploaded';
                        unset($_SESSION["filename"]);
                        unset($_SESSION["fileuploaded"]);
                    } else {
                        echo 'There was an error uploading file';
                        unset($_SESSION["filename"]);
                        unset($_SESSION["fileuploaded"]);
                    }
                }
            ?>
        </div>
    </div>

    <div class="footer">
        <span>Julian Dworzycki</span>
        <span>© Cinema 2023</span>
    </div>
    
    <?php
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        $_SESSION["logged"] = false;
        exit();
    } else {
        if ($_SESSION["login"] != "admin") {
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["logged"] = true;
        }
    }
    ?>
</body>

</html>