<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>spark</title>

    <style>
        .section {
            padding: 10px 0px;
            background-color: #6e393966;
            border: 1px solid black;
        }
       
        h1 {
            color: brown;
            font-weight: bold;
            transition: 0.5s;
            text-align: center;
            font-family: 'Righteous', cursive;
        }
        
        h1:hover {
            transform: scale(1.1);
            text-shadow: 5px 4px 5px black;
        }
        /* Risponsive */
        @media only screen and (max-width: 640px) {
           h1{
               margin-right: 15px;
           }
        }
    </style>

</head>

<body>
<div class="bg">
<?php
include 'header.php';
?>
<div class="section">
    <div class="row intro py-1">
        <div class="col-sm-12 col-md">
            <div class="heading text-center my-5">
        <h1>welcome to Spark bank </h1>
        </div>
    </div>
        <div class="col-sm-12 col-md img text-center">
            
        </div>
    </div>
    </div>

    <div class ="foot">
    <footer>
            <p>All rights are reserved &copy 2021. <a href='#'>spark bank</a></p>
    </footer>
    </div>
</body>

</html>