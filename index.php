<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "Hadeel.0788244295";  
 $database = "myapplication";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
      if(isset($_POST["signup"])) {

        if(empty($_POST["username"])  || empty($_POST["psw"])|| empty($_POST["psw-repeat"])|| empty($_POST["email"])|| empty($_POST["phone-number"]) ) {
            $message = '<label>All fields are required</label>';  

        }


        else if ($_POST['psw'] != $_POST['repeat']) {
            $message = '<label>Password Not Matched</label>';  
        }


         else {
            $sql = "INSERT INTO users (username, password, email,phone_number)
            VALUES ('$_POST[username]', '$_POST[psw]', '$_POST[email]', '$_POST[phone-number]')";
            var_dump($sql);


            $connect->exec($sql);

            
            // echo "New record created successfully";
            $_SESSION["username"] = $_POST["username"];  
           
         header("location:login_success.php");  
         }
            
        

          }
 
    }

 
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }

?>

<html>
<head>
    <style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity:1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
<h1> Instructions </h1>
<ul>
       <li>Create a database called myapplication.</li>
<!--       create database myapplication;
 -->      
  <li>Create a table called users. (Id,username,password,email,phone_number). Those fields should have the right datatype and right size.
<!-- create table users (id int , username varchar(100),password varchar(100),email varchar(100),phone_number varchar(100));
 -->
       <li>Connect the form to the database, When the user insert the information in the registration form, those information should stored in the database.</li>
       <li>After submission, the page should be redirect to new page.</li>
       <li>The new page should display, "Hello (username)" </li>
</ul>
<form>
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>UserName</b></label>
        <input type="text" placeholder="Enter name" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="phone-number"><b>Phone Number</b></label>
        <input type="text" placeholder="phone-number" name="phone-number" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button type="submit" class="registerbtn" name="signup">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>
</body>
<?php


