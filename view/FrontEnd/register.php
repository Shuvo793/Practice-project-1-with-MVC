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
                    <form class="form-signin" method="post" enctype="multipart/form-data" action="/register">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Please Register</h1>
                        <label for="fullName" class="lead">Full Name :</label>
                        <input type="text" id="fullName" class="form-control" placeholder="Full Name" name="full_name" required autofocus>
                        <?php echo $status = (!empty($_SESSION['errors']['full_name'])) ? $_SESSION['errors']['full_name'] : "";?>
                        <label for="email" class="lead">Email address :</label>
                        <input type="text" id="email" class="form-control" placeholder="Enter your Email..." name="email" required autofocus>
                        <?php echo $status = (!empty($_SESSION['errors']['email'])) ? $_SESSION['errors']['email'] : "";?>
                        <label for="password" class="lead">Password :</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password..." name="password" required autofocus>
                        <?php echo $status = (!empty($_SESSION['errors']['password'])) ? $_SESSION['errors']['password'] : "";?>
                        <label for="address" class="lead">Address :</label>
                        <textarea rows="2" cols="10" name="address" id="address" class="form-control" placeholder="Enter address here..." required autofocus></textarea>
                        <label for="phoneNumber" class="lead">Mobile No :</label>
                        <input type="text" id="phoneNumber" class="form-control" placeholder="Enter your Mobile No..." name="mobileNumber" required>
                        <?php echo $status = (!empty($_SESSION['errors']['mobileNumber'])) ? $_SESSION['errors']['mobileNumber'] : "";?>
                        <label for="uploadFile" class="lead">Upload file :</label>
                        <input type="file" id="uploadFile" class="form-control" name="files" required>
                        <?php echo $status = (!empty($_SESSION['errors']['files'])) ? $_SESSION['errors']['files'] : "";?>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
                        <p class="mt-2 mb-2 text-muted">&copy; 2017-2019</p>
                        <?php unset($_SESSION['errors']);?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'partials/FrontEnd/__footer.php'?>