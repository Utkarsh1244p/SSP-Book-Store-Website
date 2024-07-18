<?php

require_once 'db_connect.php';
//print_r($_SERVER["REQUEST_METHOD"],$_GET['userid']);
// Check if form is submitted
if (isset($_GET['userid'])) {

    $email = $_GET['email'];
    $password = $_GET['psw'];
    $userid = $_GET['userid'];
    print_r($email,$password);
    $stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $password, $userid);
    if ($stmt->execute()) {
    ?>
            <!DOCTYPE html>

            <!-- Created By CodingLab - www.codinglabweb.com -->
            <html lang="en" dir="ltr">
            <head>           
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Form | CodingLab</title> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
            <link rel="stylesheet" href="form.css">
            </head>
            <body>
            <div class="container">
            <div class="wrapper">
            <div class="title"><span>User created Sucessfully!! </span></div>
            <form action="index.php" autocomplete="off">
            <div class="row button">
            
                <input type="submit" value="Click here to go to Home page">
            </div>
            </form>
            </div>
            </div>

            </body>
            </html>
    <?php
    }
    

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from form
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $street_address = $_POST['street'];
    $aadhar_file = $_FILES['aadhar']['name'];
    $pan_file = $_FILES['pan']['name'];
    $aadharFileSize = $_FILES["aadhar"]["size"];
    $aadharTmpName = $_FILES["aadhar"]["tmp_name"];
    $panFileSize = $_FILES["pan"]["size"];
    $panTmpName = $_FILES["pan"]["tmp_name"];
    $pan_number = $_POST['panNumber'];
    $aadhar_number = $_POST['aadharNumber'];
    $postal_code = $_POST['postalCode'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['bloodGroup'];


    // FOR CHECKING EXTENSION VALIDITY
    //For Aadhar Card file extension checking
    $validFileExtension = ['pdf', 'jpg', 'jpeg', 'png'];
    $aadharExtension = explode('.', $aadhar_file);
    $aadharExtension = strtolower(end($aadharExtension));

    //For Pan Card file extension checking
    $panExtension = explode('.', $pan_file);
    $panExtension = strtolower(end($panExtension));

    //For Aadhar Card
    if(!in_array($aadharExtension, $validFileExtension)){
        echo 
        "<script> alert('Invalid Aadhar File Extension');</script>"
        ;   
    }
    else if($aadharFileSize > 1000000){
    echo 
    "<script> alert('Aadhar File Size is too large');</script>"
    ;
    }

    //For Pan Card
    else if(!in_array($panExtension, $validFileExtension)){
        echo 
        "<script> alert('Invalid Pan File Extension');</script>"
        ;   
    }
    else if($panFileSize > 1000000){
    echo 
    "<script> alert('Pan File Size is too large');</script>"
    ;
    }

    else{

        //To add Temporary Name and  Upload files(Aadhar and Pan)
        $target_dir = "uploads/";
        $newAadharFileName = uniqid();
        $newAadharFileName .= '.' . $aadharExtension;
        move_uploaded_file($aadharTmpName, $target_dir . $newAadharFileName);
        
        $newPanFileName = uniqid();
        $newPanFileName .= '.' . $panExtension;
        move_uploaded_file($panTmpName, $target_dir . $newPanFileName);
        
        $check_sql="Select count(id) from users where pan_number='".$pan_number."' or  aadhar_number='".$aadhar_number."'";
        $cresult = $conn->query($check_sql);
        $crow=mysqli_fetch_row($cresult);
        $usercount=$crow[0];
        if($usercount>0)
        { 
            ?>
            <!DOCTYPE html>

            <!-- Created By CodingLab - www.codinglabweb.com -->
            <html lang="en" dir="ltr">
            <head>           

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Form | CodingLab</title> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
            <link rel="stylesheet" href="form.css">
            </head>
            <body>
            <div class="container">
            <div class="wrapper">
            <div class="title"><span>Pancard and Adharcard number should be unique</span></div>
            <form action="index.php" autocomplete="off">
            <div class="row button">

            <input type="submit" value="Click here to go to Home page">
            </div>
            </form>
            </div>
            </div>

            </body>
            </html>
        <?php
        exit();
        }
    
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, country, state, city, street_address, postal_code,aadhar_file, pan_file, pan_number, aadhar_number, gender, blood_group) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssss", $first_name, $last_name, $phone, $country, $state, $city, $street_address, $postal_code, $newAadharFileName, $newPanFileName, $pan_number, $aadhar_number, $gender, $blood_group);

        // Execute the query
        if ($stmt->execute()) {
            $sql="Select id from users where first_name='".$first_name."' and last_name='".$last_name."' and aadhar_number='".$aadhar_number."' limit 1";
            $result = $conn->query($sql);
            $row=mysqli_fetch_row($result);
            $userid=$row[0];

           
           
            ?>
           
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
}

/* Style the container for inputs */
#password {
  width: 40%;
  margin: auto;
}
.container {
  background-color: #f1f1f1;
  padding: 20px;
  width: 40%;
  margin: auto;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;  
  width: 40%;
  margin: auto;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
#userid{
    display:none;
}
</style>
</head>
<body>
<div id="password">
<h3>Set Email Id and Set New Password</h3>
</div>
<div class="container">
  <form action="/SSP/signup.php?action='success'" method="GET" autocomplete="off">
    <input type="t  ext" id="userid" name="userid" value="<?php echo $userid?>">
    <label for="email">Mail ID</label>
    <input type="email" id="email" name="email" required>

    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <input type="submit" value="Submit">
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>

      <?php  
      } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }


    
}

$conn->close();
?>
