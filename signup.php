<?php
require('common/connection.inc.php');
require('common/top.inc.php');

$msg = "";
if (isset($_POST['submit'])){
//code for user registration
$email = get_Safe_value($con, $_POST['email']);
$number = get_Safe_value($con, $_POST['number']);
$password = get_Safe_value($con, $_POST['password']);

//sql query for inserting the data
$sql = "INSERT INTO users (email,number,password) values ('$email','$number','$password')";
$res = mysqli_query($con, $sql);

if ($res){
    header('location: login.php');
}else{
    $msg = "Something went wrong, Please fill details properly";
}
}
?>
    <div class="login-card">
        <div>
            <h2 class="text-center">Company Name</h2>
        </div><img class="img-fluid profile-img-card" src="images/avatar_2x.png">
        <p class="profile-name-card"> </p>
        <form class="form-signin" action="signup.php" method="post">
            <input class="form-control" type="email" id="inputEmail" name="email" required placeholder="Email address" autofocus="">
            <input pattern="[1-9]{1}[0-9]{9}" title="Invalid Mobile Number" class="form-control" type="text" id="number" name="number" required placeholder="Phone Number" autofocus="" style="margin-bottom: 10px;">
            <input id="password" class="form-control" type="password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password"
                required placeholder="Password">
            <!-- <label style="color: red;">
                            *Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                        </label>            -->
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="submit" type="submit">Signup</button>
        </form>
        <div>
            <?php
            echo $msg;
            ?>
        </div>
        <a class="forgot-password" href="login.php">Already a user? Login</a></div>
    </body>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showConfirmPassword() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }


        var check = function() {

            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';

            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';

            }
        }
    </script>


    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

    <?php
require('common/footer.inc.php');

?>