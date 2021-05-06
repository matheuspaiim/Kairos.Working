<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="whidth=device-width , initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>KairosWorking</title>
    <style>
        .kw-menu {
            display: table;
            float: left;
            height: 10vh;
            position: relative;
            top: 10px;
            left: 135px;
            background-color: #10301b;
            border-radius: 0px 8px 8px 8px;
            width: 80%;
            box-shadow: 2px 2px 3px 2px rgba(0, 0, 0, 0.8);
        }

        .kw-menu a {
            font-family: 'Open Sans';
            font-size: 20px;
            color: lightgray;
            text-decoration: none;
            display: inline-block;
            padding-left: 20px;
            top: 15px;
            margin: 0px 0px 0px 20px;
            font-weight: 400;
            position: relative;

        }

        .kw-menu a:first-child {
            margin-left: 0;
        }

        .kw-menu a:hover {
            color: #2CCB69;
        }

        .kw-menu a:before {
            content: '';
            width: calc(100% - 20px);
            height: 4px;
            background-color: #2CCB69;
            display: block;
            position: absolute;
            bottom: 0%;
            left: 20px;
            transition: all 0.25s ease-out;
            transform: scale(0, 1);
            transform-origin: center left;

        }

        .kw-menu a:hover:before {
            transform: scale(1, 1);
        }

        .title {
            position: relative;
            top: 70px;
            right: 950px;
            font-size: 45px;
        }

        .logout {
            position: fixed;
            bottom: 45px;
            right: 45px;
            background-color: #10301b;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 20px;
            box-shadow: 2px 2px 3px 2px rgba(0, 0, 0, 0.8);
            cursor: pointer;
        }

        .logout:hover {
            background-color: #07130a ;
            color: white;
        }

        a:hover,
        a:visited,
        a:focus,
        a:active {
            text-decoration: none;
            color: white;
        }

        table {
            position: relative;
            top: 40px;
        }

        td {
            position: relative;
            padding: 30px;
        }

    </style>
</head>

<body>
    <!-- Navbar -->

    <header class="kw-topbar">
        <nav class="kw-menu">
            <a href="../../HTML/kairosworking.html">Home</a>
            <a href="cliente.php">Cliente</a>
            <a href="produto.php">Produto</a>
            <a href="venda.php">Venda</a>
        </nav>
    </header>
</body>