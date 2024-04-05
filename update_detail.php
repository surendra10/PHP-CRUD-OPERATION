<?php

 include('connection.php');
 error_reporting(0);

  $id = $_GET['id'];
  
  $query = "SELECT * FROM client WHERE id = $id";

  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);

  $language = $result['language'];
  $lang     = explode(",", $language);

//   echo "<pre>";
//   print_r($lang);

 if(isset($_POST['update'])){

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

     if($fname !="" && $lname !="" && $password !="" && $gender !="" && $email !="" && $phone!="" && $address !=""){

    //$sql = "INSERT INTO client (fname,lname,password,con_password,gender,email,phone_number,address) VALUES('$fname', '$lname', '$password', '$con_password', '$gender', '$email', '$phone', '$address')";

    $sql = "UPDATE client SET fname = '".$fname."', lname = '".$lname."', password = '".$password."', con_password = '".$con_password."', gender = '". $gender ."', email = '".$email."', phone_number = '".$phone."', caste ='".$caste."', language ='".$language."', address = '".$address."' where id = $id";
    
    //$result = mysqli_query($conn, $sql);
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Record Update Successfully!..')</script>";
        ?>
            <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/listing.php" />
        <?php
    }else{
        echo "<script>alert('Record Update Successfully!..');</script>";

    }
  }else{
       echo "<script>alert('All fields required..');</script>";
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
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="title">                
                Update Details
            </div>
            <div class="form">
                <div class="input_field">
                    <label >First Name</label>
                    <input type="text" name="fname" class="input" value="<?php echo $result['fname'];  ?>">
                </div>
                <div class="input_field">
                    <label >Last Name</label>
                    <input type="text" name="lname" class="input" value="<?php echo $result['lname'];  ?>">
                </div>
                <div class="input_field">
                    <label >Password</label>
                    <input type="password" name="password" class="input" value="<?php echo $result['password'];  ?>">
                </div>
                <div class="input_field">
                    <label >Confirm Password</label>
                    <input type="password" name="con_password" class="input" value="<?php echo $result['con_password'];  ?>">
                </div>
                <div class="input_field">
                    <label > Gender</label>
                    <div class="custom_select">
                    <select name="gender" >
                        <option value="">Select</option>
                        <option value="male" 
                        <?php
                           if($result['gender'] == 'male')
                            {
                                echo "selected";
                            }
                          ?>
                        >Male</option>
                        <option value="female" 
                        <?php
                           if($result['gender'] == 'female')
                            {
                                echo "selected";
                            }
                          ?>
                        >Female</option>
                    </select>
                    </div>
                </div>
                <div class="input_field">
                    <label >Email Address</label>
                    <input type="email" name="emailaddress" class="input" value="<?php echo $result['email'];  ?>">
                </div>
                <div class="input_field">
                    <label >Phone Number</label>
                    <input type="number" name="phonenumber" class="input" value="<?php echo $result['phone_number'];  ?>">
                </div>
                <div class="input_field">
                    <label style="margin-right: 85px; ">Caste</label>
                    <input type="radio" name="caste" value="GENERAL" 
                    <?php 
                       if($result['caste'] == "GENERAL"){
                        echo "checked";
                       }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">GENERAL</label>
                    <input type="radio" name="caste" value="OBC"
                    <?php 
                       if($result['caste'] == "OBC"){
                        echo "checked";
                       }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">OBC</label>
                    <input type="radio" name="caste" value="SC"
                    <?php 
                       if($result['caste'] == "SC"){
                        echo "checked";
                       }
                    ?>><label style="margin-left: 5px; margin-top:5px;">SC</label>
                    <input type="radio" name="caste" value="ST"
                    <?php 
                       if($result['caste'] == "ST"){
                        echo "checked";
                       }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">ST</label>
                </div>
                <div class="input_field">
                    <label style="margin-right: 80px; ">Languages</label>
                    <input type="checkbox" name="Languages[]" value="Hindi"
                    <?php 
                      if(in_array("Hindi", $lang)){
                        echo "checked";
                      }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">Hindi</label>
                    <input type="checkbox" name="Languages[]" value="English"
                    <?php 
                      if(in_array("English", $lang)){
                        echo "checked";
                      }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">English</label>
                    <input type="checkbox" name="Languages[]" value="Tamil"
                    <?php 
                      if(in_array("Tamil", $lang)){
                        echo "checked";
                      }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">Tamil</label>
                    <input type="checkbox" name="Languages[]" value="Marathi"
                    <?php 
                      if(in_array("English", $lang)){
                        echo "checked";
                      }
                    ?>
                    ><label style="margin-left: 5px; margin-top:5px;">Marathi</label>
                    
                </div>
                <div class="input_field">
                    <label >Address</label>
                    <textarea class="textarea" name="address" value=""><?php echo $result['address'];  ?></textarea>
                </div>
                <div class="input_field term">
                    <label  class="check">
                        <input type="checkbox" >
                        <span class="checkmark"></span> 
                    </label>
                    <p>Agree to term and conditions</p>
                    
                </div>
                <div class="input_field">
                    <input type="submit" value="Update Detail" name="update" class="btn">
                </div>
            </div>
            </form>
        </div>

    </body>

</html>