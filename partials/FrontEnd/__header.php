<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $title ?? 'Village Bazar'; ?></title>
    <!--favicon-->
    <link rel="icon" href="../../media/photo/application_photos/favicon/favicon.ico">
    <!--All Css link UP-->
        <!--bootstrap css-->
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <!--default css-->
        <link rel="stylesheet" href="../../assets/css/default.css">
        <!--style css-->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <!--responsive css-->
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <!--font Awesome for this template in CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--All Css link UP-->
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Our Website Intro</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    <a href="../../view/FrontEnd/logout.php" class="text-white" style="text-decoration: none;">
                        <?php echo isset($_SESSION['id'])? '<button class="btn btn-danger">Log Out</button>':'<button class="btn btn-info"><a href="/login" style="color:white;text-decoration: none;">Sign in</a></button>';?>
                    </a>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong><i class="fas fa-cart-arrow-down"></i> Village Bazar</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>