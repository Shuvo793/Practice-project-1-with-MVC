<?php


namespace App\Controllers\FrontEnd;
use App\Models\FrontEnd\User;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Respect\Validation\Validator;


class UserController
{
    public function getRegister(){
        frontendView('register');
    }
    public function postRegister(){
        if (isset($_POST['register'])) {
            $validator = new Validator();
            $errors = [];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $mobileNumber = $_POST['mobileNumber'];
            $photo = $_FILES['files'];
            //validation
            if ($validator::alnum()->noWhitespace()->validate($fullName) === false) {
                $errors['full_name'] = '<p style="padding-left:10px; margin: 0;" class="alert-danger"><i class="fas fa-exclamation-triangle"></i>  Full name can only contain alphabets or numeric</p>';
            }
            if ($validator::email()->validate($email) === false) {
                $errors['email'] = '<p style="padding-left:10px; margin: 0;" class="alert-danger"><i class="fas fa-exclamation-triangle"></i>  Email must be a valid email address</p>';
            }
            if (\strlen($password) < 6) {
                $errors['password'] = '<p style="padding-left:10px;margin: 0;" class="alert-danger"><i class="fas fa-exclamation-triangle"></i>  Password must have at least 6 chars</p>';
            }
            if (\strlen($mobileNumber) < 11) {
                $errors['mobileNumber'] = '<p style="padding-left:10px;margin: 0;" class="alert-danger"><i class="fas fa-exclamation-triangle"></i>  Phone number must have at least 11 chars</p>';
            }
            if ($validator::file()->validate($photo['files'])) {
                $errors['files'] = 'Please must be upload a file';
            }
            if (empty($errors)) {
                if (!empty($_FILES['files']['tmp_name'])) {
                    $name = $_FILES['files']['name'];
                    $file_parts = explode('.', $name);
                    $extention = end($file_parts);
                    $new_file_name = uniqid('PPI_', true) . time() . '.' . $extention;
                    move_uploaded_file($_FILES['files']['tmp_name'], 'media/uploads_files/' . $new_file_name);
                }
                $token = sha1($fullName . $email . uniqid('PPI', true));
                User::create([
                    'full_name' => $fullName,
                    'email' => $email,
                    'password' => password_hash($password,PASSWORD_BCRYPT),
                    'address' => $address,
                    'files' => $new_file_name,
                    'mobile_number' => $mobileNumber,
                    'email_varification_token' => $token,
                    'active' => 1

                ]);
                //send email
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = '8ab55a44fdcca9';                     // SMTP username or mailtrap username
                    $mail->Password = 'ef44ffdb4c51de';                               // SMTP password or mailtrap username
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 2525;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('cse.engr.shuvo@gmail.com', 'System user');
                    $mail->addAddress($email, $fullName);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Registration Successfully';
                    $mail->Body = 'Dear '.$fullName.', <br/>
            Please click the following link to activate your account<br/>
            <a href="http://village_bazar.test/activate/'.$token.'">Click Here to Activate</a>
            <br/>- LLC Team';
                    $mail->send();
                    if ($mail) {
                        $_SESSION['type'] = 'success';
                        $_SESSION['message'] = 'Registration Successfull please cheak your mail';
                        header('Location: /login');
                        exit();
                    } else {
                        $_SESSION['type'] = 'danger';
                        $_SESSION['message'] = 'Registration Unsuccessful';
                        header('Location: /register');
                        exit();
                    }
                } catch (Exception  $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /register');
                exit();
            }
        }

    }

    public function getLogin(){
        frontendView('login');
    }
    public function postLogin(){
        if(isset($_POST['login'])){
            $email=trim(strtolower($_POST['email']));
            $password=trim($_POST['password']);
            $user=User::select(['id','full_name','password','email_varify_at'])->where('email',$email)->first();
            if($user){
                if($user->email_varify_at===null){
                    $_SESSION['type']='danger';
                    $_SESSION['message']='Account is not verified';
                    header('Location: /login');
                    exit();
                }
                if(password_verify($password,$user['password'])===true){
                    $_SESSION['id']=$user['id'];
                    $_SESSION['email']=$user['email'];
                    header('Location: /');
                    exit();
                }else{
                    $_SESSION['type']='danger';
                    $_SESSION['message']='Invalid password';
                    header('Location: /login');
                    exit();
                }
            }else{
                $_SESSION['type']='danger';
                $_SESSION['message']='User not found';
                header('Location: /login');
                exit();
            }

        }
    }
    public function getActivate($token=''){
        if(empty($token)){
            $_SESSION['type']='danger';
            $_SESSION['message']='No token provided';
            header('Location: /login');
            exit();
        }
        $user=User::where('email_varification_token',$token)->first();
        if($user){
            $user->update([
                'email_varify_at'=>Carbon::now(),
                'email_varification_token'=>'Your account is verified'
            ]);
            $_SESSION['type']='success';
            $_SESSION['message']='You can login';
            header('Location: /login');
            exit();
        }
    }

}