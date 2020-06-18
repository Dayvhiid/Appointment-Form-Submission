<?php
 $submit;
if(isset($_POST['name']))
{
   
    $server="localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server,$username,$password);
    if(!$con)
    {
     echo "Not Connected";
    }
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $req=$_POST['request'];
    $phone=$_POST['phone'];
    $sql="INSERT INTO `appointment`.`data` (`Name`, `Age`, `Gender`, `E-mail`, `Contact`, `Request`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$req', current_timestamp());";

    $q=$con->query($sql);
    if($q==true)
    {
        $submit=true;
    }
    else{
        $submit=false;
      //  echo "Error : $sql <br> $con->error";
    }

    $con->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book An Appointment</title>
    <link rel="stylesheet" type="text/css" href="style.css" />s
</head>

<body>
    <img src="medical.jpg" alt="hospital">
    <div class="container">
        <h1>
            Welcome To HeartBeat Hospital Appointment Booking Platform
        </h1>
        <p class="instructions">
            Fill in the Details below to book an appointment:<br>(Fields marked with <span class="imp">*</span>are mandatory to fill).</p>
            <?php
            if(isset($_POST['name']))
            {
            if($submit==true)
            {
                 echo "<p class='submitMsg' style='color:green'>Thanks for submitting the form. You will get the confirmation email soon.</p>";
            }
            else if($submit ==false){
                echo "<p class='submitMsg' style='color:red'>Error Please Try Again. </p>";
            }
        }
?>
        <form action="index.php" method="post" class="forms">
            <label class="name_label">Name<span class="imp">*</span>:</label>
            <input type="text" name="name" id="name" placeholder="Enter Patient's Name" required>
            <br>
            <label for="age">Choose an age<span class="imp">*</span>:</label>
            <select name="age" class="age" required>
                <?php
                for ($i = 12; $i <= 110; $i++) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select><br>
            <label for="gender">Choose a Gender<span class="imp">*</span>:</label>

            <select name="gender" class="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Transgender">Transgender</option>
                <option value="N/A">Not Interested</option>
            </select><br>
            <label class="email_label">E-mail<span class="imp">*</span>:</label>
            <input type="email" name="email" id="email" class="email" placeholder="Enter Your E-mail" required><br>
            <label class="phonelabel">Contact No.<span class="imp">*</span>:</label>
            <input type="tel" name="phone" class="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter Mobile No." required></input><br>

            <div class="requestdiv">
                <label class="requestlabel">Special Requests:</label><br>
                <textarea name="request" id="request" cols="30" rows="10" class="request" placeholder="Any Special Request....."></textarea><br>
            </div>
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>

</body>

</html>