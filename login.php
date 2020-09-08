<?php require('header.php'); ?>
<?php require('config.php'); ?> 

<div class="alert alert-danger d-none mt-3 text-center errs" role="alert">
  
</div>

<!-- form validation -->
<?php
// define variables and set to empty values
$emailErr = $passErr = $termsErr = $captchaErr =""; 
$email = $pass = $terms = "";


// teacher form validation 
$t_emailErr = $t_passErr = $t_termsErr = $t_captchaErr =""; 
$t_email = $t_pass = $t_terms = "";

// student form valdation
$s_emailErr = $s_passErr = $s_termsErr = $s_captchaErr =""; 
$s_email = $s_pass = $s_terms = "";

// securing the data 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }



// submit request for admin
if (isset($_POST['a_submit'])) {
    //  email and pass 
    // $email = $_POST["a_email"];
    // $pass = $_POST["a_pass"]; 
   

  if (empty($_POST["a_email"]) ) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["a_email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
     }
  }  

  if (empty($_POST["a_pass"])) {
    $passErr = "Password is required";
  } else {
    $pass = test_input($_POST["a_pass"]);
    if(strlen($pass) < 9){
        $passErr = "Your Password must have atleast 8 digits";
    }
  }


//   check terms and condition section     
    if(empty($_POST['a_terms'])){
        $termsErr = "This should be checked";
    }else{
        $terms = test_input($_POST["a_terms"]);
    }

    try {

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => '6Le-7sgZAAAAAAjO7LXvtpt-5BQYeBsk2pmgy6OJ',
                 'response' => $_POST['g-recaptcha-response'],
                 'remoteip' => $_SERVER['REMOTE_ADDR']];
                 
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];
    
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result)->success;
        if(!$response){
            $captchaErr = "Please verify yourself, you are not bot";
        }
    }
    catch (Exception $e) {
        $captchaErr =  "Please verify yourself";
    }


    if(empty($emailErr) && empty($passErr) && empty($captchaErr) && empty($termsErr)){
        $sql = "SELECT a_email, a_pass FROM admin";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
        // output data of each row
        while($rec = $res->fetch_assoc()) {
            if($rec["a_email"] == $email) {                
                if($rec["a_pass"] == $pass){
                    $_SESSION['email'] = $email;                    
                    header('location:admin.php');
            }else{
                $passErr = "Password is wrong. Please double check your password";
                break;
            }
        }
        $emailErr = "This email is not registered with our system. Please double check it";
        }
        }
    }
}


// submit request for teacher
if (isset($_POST['t_submit'])) {
    //  email and pass 
    // $t_email = $_POST["t_email"];
    // $t_pass = $_POST["t_pass"]; 
   

  if (empty($_POST["t_email"]) ) {
    $emailErr = "Email is required";
  } else {
    $t_email = test_input($_POST["t_email"]);
    if (!filter_var($t_email, FILTER_VALIDATE_EMAIL)) {
        $t_emailErr = "Invalid email format"; 
     }
  }  

  if (empty($_POST["t_pass"])) {
    $t_passErr = "Password is required";
  } else {
    $t_pass = test_input($_POST["t_pass"]);
    if(strlen($t_pass) < 9){
        $t_passErr = "Your Password must have atleast 8 digits";
    }
  }


//   check terms and condition section     
    if(empty($_POST['t_terms'])){
        $t_termsErr = "This should be checked";
    }else{
        $t_terms = test_input($_POST["t_terms"]);
    }

    try {

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => '6Le-7sgZAAAAAAjO7LXvtpt-5BQYeBsk2pmgy6OJ',
                 'response' => $_POST['g-recaptcha-response'],
                 'remoteip' => $_SERVER['REMOTE_ADDR']];
                 
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];
    
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result)->success;
        if(!$response){
            $t_captchaErr = "Please verify yourself, you are not bot";
        }
    }
    catch (Exception $e) {
        $t_captchaErr =  "Please verify yourself";
    }


    if(empty($t_emailErr) && empty($t_passErr) && empty($t_captchaErr) && empty($t_termsErr)){
        $sql = "SELECT t_email, t_pass FROM teacher";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
        // output data of each row
        while($rec = $res->fetch_assoc()) {
            if($rec["t_email"] == $t_email) {                
                if($rec["t_pass"] == $t_pass){
                    $_SESSION['email'] = $t_email;                    
                    header('location:teacher.php');
            }else{
                $t_passErr = "Password is wrong. Please double check your password";
                break;
            }
        }
        $t_emailErr = "This email is not registered with our system. Please double check it";
        }
        }
    }
}



// submit request for student
if (isset($_POST['s_submit'])) {
    //  email and pass 
    // $t_email = $_POST["t_email"];
    // $t_pass = $_POST["t_pass"]; 
   

  if (empty($_POST["s_email"]) ) {
    $s_emailErr = "Email is required";
  } else {
    $s_email = test_input($_POST["s_email"]);
    if (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
        $s_emailErr = "Invalid email format"; 
     }
  }  

  if (empty($_POST["s_pass"])) {
    $s_passErr = "Password is required";
  } else {
    $s_pass = test_input($_POST["s_pass"]);
    if(strlen($s_pass) < 9){
        $s_passErr = "Your Password must have atleast 8 digits";
    }
  }


//   check terms and condition section     
    if(empty($_POST['s_terms'])){
        $s_termsErr = "You should follow all terms and conditions";
    }else{
        $s_terms = test_input($_POST["s_terms"]);
    }

    try {

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => '6Le-7sgZAAAAAAjO7LXvtpt-5BQYeBsk2pmgy6OJ',
                 'response' => $_POST['g-recaptcha-response'],
                 'remoteip' => $_SERVER['REMOTE_ADDR']];
                 
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];
    
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result)->success;
        if(!$response){
            $s_captchaErr = "Please verify yourself, you are not robot";
        }
    }
    catch (Exception $e) {
        $s_captchaErr =  "Please verify yourself";
    }


    if(empty($s_emailErr) && empty($s_passErr) && empty($s_captchaErr) && empty($s_termsErr)){
        $sql = "SELECT s_email, s_pass FROM student";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
        // output data of each row
        while($rec = $res->fetch_assoc()) {
            if($rec["s_email"] == $s_email) {                
                if($rec["s_pass"] == $s_pass){
                    $_SESSION['email'] = $s_email;                    
                    header('location: student.php');
            }else{
                $s_passErr = "Password is wrong. Please double check your password";
                break;
            }
        }
        $s_emailErr = "This email is not registered with our system. Please double check it";
        }
        }
    }
}
?>



<!-- Login form -->
<div class="display-3 text-center animate__animated animate__zoomInDown" >
    Login Panel
</div>
<div class="card-group py-5">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Admin Login -->
                <div class="card">
                    <img class="card-img-top img-thumbnail mb-5 animate__animated animate__zoomInRight" 
                    src="img/admin.jpg" alt="Admin">
                    <div class="card-body">
                        <h5 class="card-title text-center" data-aos="zoom-in-up">Admin Login</h5>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email_err"
                                    placeholder="Enter email" value="<?php echo $email; ?>" name="a_email" />
                                <small id="email_err" class="form-text text-danger email_err"><?php echo $emailErr; ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" value="<?php echo $pass; ?>" name="a_pass" id="pass"
                                    placeholder="Password">
                                <small class="form-text text-danger pass_err" id="pass_err"> <?php echo $passErr; ?>
                                </small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="a_terms" value="agree"
                                    <?php if(isset($terms) && $terms == 'agree') { echo "checked";} ?>
                                id="terms"  />
                                <label class="form-check-label" for="terms">I agree with all your
                                    <a href="terms.php" target="_blank"> terms and Conditions </a> and
                                    <a href="privacy.php" target="_blank"> privacy </a>
                                </label>

                                <small class="text-danger"> <?php echo $termsErr; ?> </small>
                            </div>
                            <div class="form-group pt-2">
                                <div class="g-recaptcha" data-sitekey="6Le-7sgZAAAAAHLLjuDNZPGCdxiFZMKjQfGtzpnA"></div>
                                <small class="text-danger"> <?php echo $captchaErr; ?> </small>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" name="a_submit" class="btn btn-primary"> Login </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card">
                    <img class="card-img-top img-thumbnail animate__animated animate__jackInTheBox" src="img/teacher.jpg" alt="Teacher">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Teacher Login </h5>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email_err" name="t_email"
                                    placeholder="Enter email" value='<?php echo $t_email; ?>' > 
                                <small id="email_err" class="form-text text-danger"><?php echo $t_emailErr; ?> </small>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" placeholder="Password" name="t_pass"
                                    value="<?php echo $t_pass; ?>"
                                >
                                <small class="form-text text-danger pass_err" id="pass_err"> <?php echo $t_passErr; ?> </small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="t_terms" id="terms" value="agree" 
                                <?php if(isset($t_terms) && $t_terms == "agree") { echo 'checked'; } ?>
                                />
                                <label class="form-check-label" for="terms">I agree with all your
                                    <a href="terms.php" target="_blank"> terms and Conditions </a> and
                                    <a href="privacy.php" target="_blank"> privacy </a>
                                </label>
                                <small class="text-danger"> <?php echo $t_termsErr; ?> </small>
                            </div>
                            <div class="form-group pt-2">
                                <div class="g-recaptcha" data-sitekey="6Le-7sgZAAAAAHLLjuDNZPGCdxiFZMKjQfGtzpnA"></div>
                                <small class="text-danger"> <?php echo $t_captchaErr; ?> </small>
                            </div>

                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-info" name="t_submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-thumbnail animate__animated animate__jackInTheBox" src="img/student.jpg" alt="student">
                    <div class="card-body">
                        <h5 class="card-title text-center">Student Login </h5>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="email_err" name="s_email"
                                    placeholder="Enter email" value="<?php echo $s_email; ?>">
                                <small id="email_err" class="form-text text-danger email_err"> <?php echo $s_emailErr; ?> </small>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" name="s_pass" value="<?php echo $s_pass; ?>"
                                placeholder="Password">
                                <small class="form-text text-danger pass_err" id="pass_err">
                                    <?php echo $s_passErr; ?>
                                </small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="s_terms" value="agree" 
                                    <?php if(isset($s_terms) && $s_terms == 'agree') {echo "checked"; } ?>
                                />
                                <label class="form-check-label" for="terms">I agree with all your
                                    <a href="terms.php" target="_blank"> terms and Conditions </a> and
                                    <a href="privacy.php" target="_blank"> privacy </a>
                                </label>
                                <small class="text-danger"> <?php echo $s_termsErr; ?> </small>
                            </div>
                            <div class="form-group pt-2">
                                <div class="g-recaptcha" data-sitekey="6Le-7sgZAAAAAHLLjuDNZPGCdxiFZMKjQfGtzpnA"></div>
                                <small class="text-danger">
                                    <?php echo $s_captchaErr; ?>
                                </small>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-dark" name="s_submit">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php') ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $('.home').removeClass('active');
</script>


<?php 

    $errs = "";
    if(!empty($emailErr)){
        $errs .= $emailErr . "<br/>";        
    }
    
    if(!empty($passErr)){
        $errs .= $passErr . '</br>';          
    }

    if(!empty($termsErr)){
        $errs .= $termsErr . '<br/>';
    }

    if(!empty($captchaErr)){
        $errs .= $captchaErr . "<br/>";
    }
    
    if(!empty($t_emailErr)){
        $errs .= $t_emailErr . "<br/>";        
    }
    
    if(!empty($t_passErr)){
        $errs .= $t_passErr . '</br>';          
    }

    if(!empty($t_termsErr)){
        $errs .= $t_termsErr . '<br/>';
    }

    if(!empty($t_captchaErr)){
        $errs .= $t_captchaErr . "<br/>";
    }
    if(!empty($s_emailErr)){
        $errs .= $s_emailErr . "<br/>";        
    }
    
    if(!empty($s_passErr)){
        $errs .= $s_passErr . '</br>';          
    }

    if(!empty($s_termsErr)){
        $errs .= $s_termsErr . '<br/>';
    }

    if(!empty($s_captchaErr)){
        $errs .= $s_captchaErr . "<br/>";
    }
    if(!empty($errs)){
        $errs = "<h5> The following errors are found </h5>". $errs; 
        echo "<script>   $('.errs').html('". $errs ."').removeClass('d-none');  </script>";
    }

?>


<script>
    $('.login_btn').addClass('d-none');
</script>