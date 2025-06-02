<?php

// To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/style.css">
    <title>Placement Portal</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="n1">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Placement Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-8" id="navbarNav">
                <ul class="navbar-nav" style="margin:auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="resume.php">Create Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notice.php">Notice</a>
                    </li>
                    <li class="nav-item">
                        <a href="../jobs.php" class="nav-link">Active Drives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Log Out</a>
                    </li>
                    <style>
                        .navbar-expand-lg .navbar-nav {
                            margin-top: -6px;
                        }

                        .nav-link {
                            color: #b3c6e0;
                        }

                        .nav-link:hover {
                            color: #482ff7;
                        }

                        li {
                            margin-top: 1px;
                            margin-left: 30px;
                            padding-bottom: 20px;
                            color: #b3c6e0;
                            hover
                        }

                        .navbar-brand {
                            margin-left: 300px;
                        }
                    </style>
                </ul>
            </div>
        </div>


    </nav>
    



