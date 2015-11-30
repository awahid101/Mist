<?php
/*
 * Default Layout
 *
 * @author Abdul Wahid - awahid@gmail.com
 * @version 1.0.0
 * @date June 15, 2015
 * 
 *
 * @var params Array of php variables is optional
 * @var content HTML of view 
 * 
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php $params['page_title']; ?></title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/php-awf/mist/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="/php-awf/mist/css/bootstrap-theme.min.css">


        <!-- Optional theme -->
        <link rel="stylesheet" href="/php-awf/mist/css/theme.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/php-awf/mist/">Mist Framework</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="/php-awf/mist/">Home</a></li>
                        <li><a href="/php-awf/mist/welcome/about">About</a></li>
                        <li><a href="/php-awf/mist/welcome/contact">Contact</a></li>            
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/php-awf/mist/blog">List posts</a></li>
                                <li><a href="#">Create new post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="container">
                <?php echo $content; ?>
            </div>
            
            <div class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <p class="navbar-text pull-left">
                         Mist MVC is a test project.
                    </p>

                    <a href="http://awahid.net" class="navbar-btn btn-danger btn pull-right">
                        <span class="glyphicon glyphicon-star "></span>  Awahid </a>
                </div>


            </div>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/php-awf/mist/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Latest compiled and minified JavaScript -->
        <script src="/php-awf/mist/js/bootstrap.min.js"></script>
    </body>
</html>
