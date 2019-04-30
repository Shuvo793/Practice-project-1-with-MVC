<?php require_once 'partials/FrontEnd/__header.php'?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card mt-lg-5 mb-lg-5">
                <div class="card-body">
                    <?php if (isset($_SESSION['type'],$_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['type']?>">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php unset($_SESSION['type'],$_SESSION['message']);?>
                    <?php endif ; ?>
                    <form class="form-signin" method="post" enctype="multipart/form-data">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Sign In</h1>
                        <label for="inputEmail" class="lead">Email address :</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                        <label for="inputPassword" class="lead">Password :</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
                    </form>
                    <button class="btn btn-lg btn-primary btn-block mt-1"><a href="/register" class="text-white"style="text-decoration: none;">Creat a new account</a></button>
                    <p class="mt-2 mb-2 text-muted">&copy; 2017-2019</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'partials/FrontEnd/__footer.php'?>