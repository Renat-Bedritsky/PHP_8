<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body, .window {
            height: 100%;
        }
        body {
            font-family: sans-serif;
        }
        .window {
            width: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
        }
        .header {
            display: flex;
            padding: 30px 100px;
        }
        .logo {
            width: 100px;
        }
        .nav {
            margin-left: 15%;
            margin-top: 10px;
        }
        .nav ul {
            display: flex;
        }
        .nav ul li {
            margin-left: 20px;
            list-style-type: none;
        }
        .nav ul li a {
            text-decoration: none;
            color: black;
        }
        .basket {
            width: 25px;
            margin-top: 3px;
            margin-left: auto;
        }
        .title {
            background-color: #eee;
            text-align: center;
            padding: 30px 0;
        }
        .products_list {
            display: flex;
            flex-wrap: wrap;
        }
        .product {
            flex: none;
            width: 240px;
            height: 240px;
            text-align: center;
            margin: 20px auto;
            padding: 10px 30px;
            overflow: hidden;
        }
        .product img {
            height: 150px;
            width: 150px;
        }
        .footer {
            background-color: black;
            color: white;
            padding: 100px;
            display: flex;
            flex: 0 0 auto;
        }
        .footer img {
            margin-top: 20px;
            width: 100px;
            height: 42px;
        }
        .footer ul {
            margin-left: auto;
        }
        .footer ul li {
            margin-left: 20px;
            margin-top: 15px;
            list-style-type: none;
        }
        .thing {
            display: flex;
            padding: 50px;
        }
        .thing img{
            margin-right: 50px;
            width: 200px;
            height: 200px;
        }
        /*.add_basket button {
            padding: 10px 20px;
        }*/
        .add_basket {
            text-decoration: none;
            color: black;
            height: 20px;
        }
    </style>
</head>
<body>

<div class="window">

<div class="content">

<header class="header">

    <div>
        <img src="img/logo_header.png" alt="logo" class="logo" width="100">
    </div>

    <div class="nav">
        <ul>
            <li><a href="/index.php">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <div class="basket">
        <img src="img/basket.png" alt="basket" class="basket" width="30">
    </div>

</header>
    
