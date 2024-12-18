<?php
session_start();
require_once("database.php");
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: Admin Login.php");
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
        }

        div.header {
            color: #F85606;
            font-family: poppins;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            background-color: #1c1c1e;
        }

        div.header button {
            background-color: white;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
        div.header button:hover{
            background-color: #43766C;
        }
    </style>
</head>

    <body>
    <div class="header">
        <h2>ADMIN PANEL - <?php echo htmlspecialchars($_SESSION['AdminLoginId']) ?></h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <button type="submit" name="Logout">LOG OUT</button>
        </form>
    </div>

    <?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        echo"
        <script> window.location.href='cloudmart.php';</script>
        ";
        // header('location: cloudmart.php');
    }
    ?>
    </body>
</html>