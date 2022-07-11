<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="./public/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php?action=listPosts">Mon Blog</a>
            </div>

           
            <?php 
            if(isset($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==1){
            ?>
            <!-- Admin nav bar -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=postList">Les articles</a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=listPosts#about">A propos de</a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=listPosts#contact">Contact</a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=admin">gestion admin</a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=disconnect">Deconnexion</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#"><?= $_SESSION['PSEUDO'] ?></a>
                        </li>
                    </ul>
                </div>
            <?php
                }
                elseif (isset ($_SESSION['PSEUDO']) && $_SESSION['ADMIN']==0){
            ?>
            <!-- Log User nav bar -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="page-scroll">
                                <a href="index.php?action=postList">Les articles</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#about">About</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#contact">Contact</a>
                            </li>
                            <li class="page-scroll">
                                <a href="index.php?action=disconnect">Deconnexion</a>
                            </li>
                            <li class="page-scroll">
                                <a href="#"><?= $_SESSION['PSEUDO'] ?></a>
                            </li>    
                        </ul>
                    </div>
            <?php
                }
                else{
            ?>

            <!-- Non log user nav bar -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=postList">Les articles</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about">About</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Contact</a>
                        </li>
                        <li>
                            <ul class="sous">
                                <li><a href="index.php?action=subscribe">je m'inscrit</a></li>
                                <li><a href="index.php?action=connect">j'ai un compte</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php
                }
            ?>   
        </div>
    </nav>

</body>
</html>