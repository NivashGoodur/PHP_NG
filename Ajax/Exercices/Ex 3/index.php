<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3</title>
    <style>
        .error{
            color:red;
        }
        .success{
            color:green;
        }
        .overlay{
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,.6);
            display:flex;
            justify-content: center;
        }
        .overlay>img{
            width: 100px;
        }
    </style>
</head>
<body>


    <form action="php/login.php" method="POST">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit">
    </form>

    <!-- Div qui contiendra les messages d'erreurs et de succès -->
    <div id="view"></div>




















    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>