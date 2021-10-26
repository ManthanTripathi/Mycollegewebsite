<?php
  echo "hello world";
 ?>
 
<html>
  <head>
  <title>
  PHP Form Validation 
  </title>

  </head>

    <body>
      <?php
         
         $fnameErr = $lnameErr = $emailErr = $genderErr = $mobileErr = "";
         $fname = $lname = $email = $gender = $comment = $mobile = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fname"])) {
               $fnameErr = "First Name is required";
            }else {
               $fname = test_input($_POST["fname"]);
            }

            if (empty($_POST["lname"])) {
               $lnameErr = "Last Name is required";
            }else {
               $lname = test_input($_POST["lname"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["mobile"])) {
               $mobile = "";
            }else {
               $mobile = test_input($_POST["mobile"]);
            }
            
            if (empty($_POST["comment"])) {
               $comment = "";
            }else {
               $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
     
      <h2>Form Validation in PHP By Manthan</h2>
     
      <p><span class = "error">* required field.</span></p>
     
      <form method = "post" action = "<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>First Name:</td>
               <td><input type = "text" name = "fname">
                  <span class = "error">* <?php echo $fnameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Last Name:</td>
               <td><input type = "text" name = "lname">
                  <span class = "error"> <?php echo $lnameErr;?></span>
               </td>
            </tr>

            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Mobile:</td>
               <td> <input type = "mobile" name = "mobile">
                  <span class = "error"><?php echo $mobileErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Introduce Yourself in two lines</td>
               <td> <textarea name = "comment" rows = "2" cols = "30"></textarea></td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
				
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
      </form>
    </body>
</html>

 
  
