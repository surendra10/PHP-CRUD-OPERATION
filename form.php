<?php

error_reporting(0);

 include('connection.php');
 
  if(isset($_POST['submit'])){

        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder   = "images/".$filename;
        move_uploaded_file($tempname, $folder);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
        $gender = $_POST['gender'];
        $email = $_POST['emailaddress'];
        $phone = $_POST['phonenumber'];
        $caste = $_POST['caste'];
        $languages = $_POST['Languages'];
        $language  = implode(",",$languages);
        $address = $_POST['address'];
        
        
        if(  $fname !="" && $lname !="" && $password !="" && $gender !="" && $folder !="" && $email !="" && $phone!="" && $address !="" && $caste !="" && $language !=""){

        $sql = "INSERT INTO client (image,fname,lname,password,con_password,gender,email,phone_number,caste,language,address) VALUES('$folder','$fname', '$lname', '$password', '$con_password', '$gender', '$email', '$phone', '$caste', '$language', '$address')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Record Successfully Save!..');</script>";
        }else{
            echo "<script>alert('Record Not Save!..');</script>";
        }
    }else{
        echo "<script>alert('Fill all fields..');</script>";
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CRUD Operation</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form id="form" action="http://localhost/crud/form.php" method="POST" enctype="multipart/form-data">
            <div class="title">
                
                REGISTRATION FORM
            </div>
            <div class="form">
                
                <div class="input_field">
                    <label >First Name</label>
                    <input type="text" name="fname" id="fname" class="input"  value="<?php   ?>" required >
                </div>
                <div class="input_field">
                    <label >Last Name</label>
                    <input type="text" name="lname" id="lname" class="input" required>
                </div>
                <div class="input_field">
                    <label >Password</label>
                    <input type="password" name="password" id="password" class="input" required>
                </div>
                <div class="input_field">
                    <label >Confirm Password</label>
                    <input type="password" name="con_password" id="con_password" class="input" required>
                </div>
                <div class="input_field">
                    <label > Gender</label>
                    <div class="custom_select">
                    <select name="gender"  id="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    </div>
                </div>
                <div class="input_field">
                    <label >Image</label>
                    <input type="file" name="image" id="image" required class="" value="<?php   ?>"  style="margin-right: 185px;" >
                    
                </div>
                <div class="input_field">
                    <label >Email Address</label>
                    <input type="email" name="emailaddress" id="emailaddress" class="input" required>
                </div>
                <div class="input_field">
                    <label >Phone Number</label>
                    <input type="number" name="phonenumber" id="phonenumber" class="input" required>
                </div>
                <div class="input_field">
                    <label style="margin-right: 88px; ">Caste</label>
                    <input type="radio" name="caste" value="GENERAL" required><label style="margin-left: 5px; margin-top:5px;">GENERAL</label>
                    <input type="radio" name="caste" value="OBC"  required><label style="margin-left: 5px; margin-top:5px;">OBC</label>
                    <input type="radio" name="caste" value="SC" required><label style="margin-left: 5px; margin-top:5px;">SC</label>
                    <input type="radio" name="caste" value="ST" required><label style="margin-left: 5px; margin-top:5px;">ST</label>
                </div>
                <div class="input_field">
                    <label style="margin-right: 80px; ">Languages</label>
                    <input type="checkbox" name="Languages[]" value="Hindi"><label style="margin-left: 5px; margin-top:5px;">Hindi</label>
                    <input type="checkbox" name="Languages[]" value="English"><label style="margin-left: 5px; margin-top:5px;">English</label>
                    <input type="checkbox" name="Languages[]" value="Tamil"><label style="margin-left: 5px; margin-top:5px;">Tamil</label>
                    <input type="checkbox" name="Languages[]" value="Marathi"><label style="margin-left: 5px; margin-top:5px;">Marathi</label>
                    
                </div>
                <div class="input_field">
                    <label >Address</label>
                    <textarea class="textarea" name="address" id="address" required></textarea>
                </div>
                <div class="input_field term">
                    <label  class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span> 
                    </label>
                    <p>Agree to term and conditions</p>
                    
                </div>
                <div class="input_field">
                    <input type="submit"  name="submit" class="btn" >
                </div>
            </div>
            </form>
        </div>

    </body>

</html>

<script>
    // $(document).ready(function(){
    //     $('#form').validate({
    //         rules:{
    //             fname:{
    //                 required: true
    //             },
    //             lname:{
    //                 required: true
    //             },
    //             password:{
    //                 required:true,
    //                 minlength: 8
    //             },
    //             con_password:{
    //                 required: true,
    //                 minlength: 8,
    //                 equalto:'#password'
    //             },
    //             emailaddress:{
    //                 required:true
    //             },
    //             gender:{
    //                 required: true
    //             },
    //             phonenumber:{
    //                 required:true
    //             },
    //             address:{
    //                 required:true
    //             }
    //         },
    //         message:{
    //             fname:'Please enter first name.',
    //             lname:'Please enter last name.',
    //             password:{
    //                 required: 'Please enter password',
    //                 minlength: 'Password must be at least 8 character'
    //             },
    //             con_password:{
    //                 required: 'Please enter confirm password',
    //                 equalTo: 'Password must be at least 8 character'
    //             },
    //             emailaddress:{
    //                 required:'Please enter email address',
    //                 email:'Please enter a valid email'
    //             },
    //             gender:'Please select category',
    //             phonenumber:{
    //                 required:'Please enter phone number',
    //                 rangelength: 'Contact should be 10 digit number.'
    //             },
    //             address:'Please enter an address',

    //         },
    //         submitHandler: function (form) {
    //         form.submit();
    //   }
    //     });
    // });

</script>