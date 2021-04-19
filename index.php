<?php
    require_once "require.php";

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Style/chat.css">
    <title>Mini Chat</title>
</head>
<body>
    <div id="container">
        <div id="divChat">
            <div id="chat">
                <div id="chatMessage">
                    <form action="#">
                        <input name="message" id="message">
                        <input type="submit" id="buttonChat">
                    </form>
                </div>

                
                
            </div>
        </div>

        <?php
            if(isset($_SESSION['id'])) {
                echo '<div id="divUserLogout"><div id="name">' . $_SESSION["username"] . '</div><a href="logout.php"><button>Déconnexion</button></a></div>';
            }
            else {
                ?>
        <div id="divUserLog">
                <div id="userLog">
                    <h2>Login</h2>
                    <form action="read.php?error=0" method="POST">
                        <div>
                            <label for="username">Username: </label>
                            <input type="text" name="username" id="username" required>
                        </div>
                        <div>
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <input type="submit" value="Connexion" id="button">
                    </form>
                </div>

                <div id="userCreate">
                    <h2>Création de compte</h2>
                    <form action="create.php?error=0" method="POST">
                        <div>
                            <label for="username">Username: </label>
                            <input type="text" name="username" id="username" required>
                        </div>
                        <div>
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <input type="submit" value="Créer" id="button">
                    </form>
                </div>
        </div>
            <?php
            }
        ?>

    </div>
</body>
</html>
