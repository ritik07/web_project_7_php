<?php
require('common/connection.inc.php');
require('common/top.inc.php');
$email = $password = $msg = "";
unset($_SESSION['email']);
unset($_SESSION['id']);
$_SESSION['STATUS'] = 'loggedout';
//login code
if (isset($_POST['submit'])){
    $email = get_Safe_value($con, $_POST['email']);
    $password = get_Safe_value($con,$_POST['password']);

    //sql query to cross check the user login information
    $sql = "SELECT * FROM users where email='$email' AND password = '$password'";
    $res = mysqli_query($con,$sql);

    if (mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res))
        {
            $id = $row['id'];
            $email = $row['email'];
            session_start();
            $_SESSION['STATUS'] = 'loggedin';
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
        }
        header("location:index.php");
    }else{
        $msg = "Incorrect email or password";
    }

}

?>



    <div class="login-card">
        <div>
            <h2 class="text-center">Company Name</h2>
        </div><img class="img-fluid profile-img-card" src="images/avatar_2x.png">
        <p class="profile-name-card"> </p>
        <form class="form-signin" action="login.php" method="post">
            <input class="form-control" type="email" id="inputEmail" name="email" required placeholder="Email address" autofocus="">
            <input class="form-control" type="password" id="inputPassword" name="password" required placeholder="Password">
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="submit" type="submit">Login </button>
        </form>
        <a class="forgot-password" href="signup.php">Create new account?</a>
        <?php
        echo "<span style='color: red'><br>$msg</span>";
        ?>
    </div>

</body>



<?php
require('common/footer.inc.php');
?>