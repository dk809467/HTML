<?php
    $conn=mysqli_connect('localhost','root','','assignment');
    if(!$conn){
        echo "connection error";
        die();
    }

    if(isset($_POST['submit'])){
        $firstname=$_POST['FirstName'];
        $lastname=$_POST['LastName'];
        $email=$_POST['Email'];
        $DOB=$_POST['DOB'];
        $phone=$_POST['phone'];
        $designation=$_POST['designation'];
        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        else{
            $gender=''; 
        }
        $hobbiearr=$_POST['hobbies'];
        $hobbie= implode(",", $hobbiearr);

        $query=mysqli_query($conn,"INSERT INTO `user_info`(`firstName`, `lastName`, `email`, `DOB`, `phone`, `designation`,`gender`,`hobbie`) VALUES ('$firstname','$lastname','$email','$DOB','$phone','$designation','$gender','$hobbie')");
        if(!$query){
            echo mysqli_error($conn);
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Assignment</title>
    
</head>
<body>
    <center>
    <form method="POST">
    Name:   
    <div class="inputs">
		FirstName<input type="text" name="FirstName"   placeholder="First-Name">
	</div>

	<div class="inputs">
		LastName<input type="text" name="LastName"   placeholder="Last-Name" >
	</div>
    <div class="inputs">
		Email<input type="email" name="Email"   placeholder="Email" >
	</div>

	<div class="inputs">
		DOB<input type="date" name="DOB"   placeholder="DOB" >
	</div>
    <div class="inputs">
		Phone<input type="text" name="phone"  placeholder="Phone" >
	</div>

	<div class="inputs">
		Designation<input type="text" name="designation"   placeholder="Designation">
	</div>
   <div class="input">
        Gender 
        <label>
            <input type="radio" name="gender" value="male">Male
        </label>
        <label>
            <input type="radio" name="gender" value="female">Female
        </label>
   </div>
        <br>
        Hobbies:
        <br>
        <div>
        <td>
            <tr>
            <input type="checkbox" name="hobbies[]" value="Cricket">Cricket
            <input type="checkbox" name="hobbies[]" value="Football">Football
            </tr>
            <tr>
            <input type="checkbox" name="hobbies[]" value="Bedminton">Bedminton
            <input type="checkbox" name="hobbies[]" value="Music">Music
            </tr>
        </td>
        </div>
        
    <input type="submit" name="submit" value="Submit Values">
</form>
    </center>
</body>
</html>
