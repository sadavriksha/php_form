<?php
    session_start();
    include 'connection.php';
    if (isset($_POST["submit"])) {
        include 'connection.php';
        $userid = mysqli_real_escape_string($conn, $_POST["userid"]);
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $age = mysqli_real_escape_string($conn, $_POST["age"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
       // $limits = mysqli_real_escape_string($conn, $_POST["limits"]);
       // $limit_used = 0;
       if(strlen($userid)<5){$error="User id aleast 5 character";}
       elseif(strpos($email,"@")>3 && strlen($email)<10){$error="Email is not valid";}
       elseif($age<12){$error="Age atleast 12 year";}
       elseif(empty($gender)){$error="Gender field is required";}
       elseif(strlen($phone)<10){$error="Phone is not valid";}
       
       elseif($password != $cpassword){$error="Password does not match";}
       elseif(strlen($name)<3||strlen($name)>40 ){$error="name aleast greater than 3 character";}
       elseif(strlen($password)<6){$error="Password aleast greater than 6 character";}
       else{
        $check_email = "SELECT * FROM student WHERE email ='{$email}'";
        $data=mysqli_query($conn,$check_email);
        $result=mysqli_fetch_array($data);
        if($result>0)
        {$error="Email already exist";}
        else{
                //$sql = "INSERT INTO super(name,age,gender,email,phone,password) VALUES ('{$name}', '{$age}','{$gender}','{$email}', '{$phone}', '{$password}'))";
                $sql="INSERT INTO student (userid, name, age, gender, email, phone, password, dt) VALUES ('{$userid}', '{$name}', '{$age}', '{$gender}', '{$email}', '{$phone}', '{$password}', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("Location: index.php");
                    $success="Your account has been created successfully";
                }else {
                    echo "<script>Error: ".$sql.mysqli_error($conn)."</script>";
                }
            }
    }  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create Signup  PHP Script</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Register</h2>
        <p style="color:red">
            <?php
            if(isset($error))
            {
                echo $error;
            }?>
        </p>
        <p style="color:green">
            <?php
            if(isset($success))
            {
                echo $success;
            }?>
        </p>
        <form action="#" onsubmit="return validation()" method="post" class="form">
        <div class="input-field">
                <label for="userid" class="input-label">Userid</label>
                <input type="userid" name="userid" id="userid" class="input" placeholder="Enter Userid" required>
                <span id="userid1"></span>
            </div>
            <div class="input-field">
                <label for="name" class="input-label">Full Name</label>
                <input type="name" name="name" id="name" class="input" placeholder="Enter your full name" required>
                <span id="name1"></span>
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
                 <span id="email1"></span>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
                <span id="password1"></span>
            </div>
            <div class="input-field">
                <label for="cpassword" class="input-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="input" placeholder="Enter your confirm password" required>
                <span id="cpassword1"></span>
            </div>
            <div class="input-field">
                <label for="phone" class="input-label">PHONE</label>
                <input type="phone" name="phone" id="phone" class="input" placeholder="Enter your phone" required>
                <span id="phone1"></span>
            </div>
            <div class="input-field">
                <label for="age" class="input-label">Age</label>
                <input type="age" name="age" id="age" class="input" placeholder="Enter your age" required>
                <span id="age1"></span>
            </div>
            <div class="input-field">
                <label for="gender" class="input-label">Gender</label>
                <input type="gender" name="gender" id="gender" class="input" placeholder="Enter your confirm gender" required>
                <span id="gender1"></span>
            </div>

            <input class="btn" type="submit" id="submit"  name="submit">Register</input>
        </form>
    </div>
   <script src="sada.js"></script>
</body>
</html>