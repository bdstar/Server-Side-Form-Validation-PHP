<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Form Validation</title>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    /*echo "=========== Values After Submit =============<br>";
    echo "Name: ".$name;
    echo "<br> Email: ".$email;
    echo "<br> Radio Button: ".$weburl;
    echo "<br> WebLink: ".$weblink;
    echo "<br> Password: ".$password;
    echo "<br> Address: ".$address;
    echo "<br> Country: ".$country;
    echo "<br> Phone: ".$phone;
    echo "<br> Comment: ".$comment;
    echo "<br> Checkbox: ".$agree;*/

    $Pattern_Name = "/^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$/";
    $Pattern_Email = "/^([a-z0-9_\.-]+)@([\da-z\.-]+){3,6}\.([a-z\.]{2,6})$/";
    $Pattern_Weblink = "/(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/";

    $Name_length = 10;
    $Email_length = 30;
    $URL_length = 100;
    $password_length = 15;
    $address_length = 200;
    $phone_length = 15;
    $comment_length = 500;

    //Check Name Field
    $Name_Error = 1; // Initlized: has an in Name Field
    if (empty($name)) {
        $Name_Err_Msg = "Name cann't be empty";
    }    
    elseif(strlen($name)>$Name_length) {        
        $Name_Err_Msg = "length Cann't be more than ".$Name_length." character long"; 
    }
    elseif (!preg_match($Pattern_Name,$name)) {
        $Name_Err_Msg = "Pattern not matched with the correct format"; 
    }
    else{
        $Name_Error = 0; // No Error in Name Field
    }

    //Check Email Field
    $Email_Error = 1; // Initlized: has an in Email Field
    if (empty($email)) {
        $Email_Err_Msg = "Email cann't be empty";
    }    
    elseif(strlen($email)>$Email_length) {        
        $Email_Err_Msg = "Email Address length Cann't be more than ".$Email_length." character long"; 
    }
    elseif (!preg_match($Pattern_Email,$email)) {
        $Email_Err_Msg = "Email Addess is not correct!"; 
    }
    else{
        $Email_Error = 0; // No Error in Email Field
    }    

    //Check Web Address Field
    $WebAddress_Error = 1; //Initlized: Has an Error in Web Address

    if($weburl=="yes" && empty($weblink)){
        $error_WebURL = "Web URL cann't be blank";
    }
    elseif($weburl=="yes" && strlen($weblink)>$URL_length){
        $error_WebURL = "URL Length Can't be more than ".$URL_length." character long";
    }
     elseif($weburl=="yes" && !preg_match($Pattern_Weblink,$weblink)){
        $error_WebURL = "Please enter correct URL";
    }
    elseif($weburl=="no" && empty($weblink)){
        $weblink = "";
        $WebAddress_Error = 0; //No Error in Web Address
    }
     else{
        $WebAddress_Error = 0; //No Error in Web Address
    }

    //Check Password Field
    $Password_Error = 1; // Initlized: has an in Password Field
    if (empty($password)) {
        $Password_Err_Msg = "Password cann't be empty";
    }    
    elseif(strlen($password)>$password_length) {        
        $Password_Err_Msg = "Password length Cann't be more than ".$password_length." character long"; 
    }
    else{
        $Password_Error = 0; // No Error in Password Field
    }

    //Check Address Field
    $Address_Error = 1; // Initlized: has an in Address Field
    if(strlen($address)>$address_length) {        
        $Address_Err_Msg = "Address length Cann't be more than ".$address_length." character long"; 
    }
    else{
        $Address_Error = 0; // No Error in Address Field
    }

    //Check Country Field
    $Country_Error = 1; // Initlized: has an in country Field
    if ($country=="none") {
        $Country_Err_Msg = "You should be select an Conutry";
    }
    else{
        $Country_Error = 0; // No Error in country Field
    }  

    //Check Phone Field
    $Phone_Error = 1; // Initlized: has an in phone Field
    if(strlen($phone)>$phone_length) {        
        $Phone_Err_Msg = "Phone Number Cann't be more than ".$phone_length." digits long"; 
    }
    elseif (!empty($phone) && !ctype_digit($phone)) {
        $Phone_Err_Msg = "Enter Valid Phone Number"; 
    }
    else{
        $Phone_Error = 0; // No Error in phone Field
    }

    //Check Comment Field
    $Comment_Error = 1; // Initlized: has an in Comment Field
    if(strlen($comment)>$comment_length) {        
        $Comment_Err_Msg = "Comment Cann't be more than ".$comment_length." character long"; 
    }
    else{
        $Comment_Error = 0; // No Error in Comment Field
    }

    //Check Agree Checkbox
    $Check_Error = 1; // Initlized: has an in Checkbox
    if(!isset($agree)) {        
        $Check_Err_Msg = "You should be agree the Terms and conditions"; 
    }
    else{
        $Check_Error = 0; // No Error in Checkbox
    }


  if($Name_Error==0 && $Email_Error==0 && $WebAddress_Error==0 && $Password_Error==0 && $Address_Error==0 && $Country_Error==0 && $Phone_Error==0 && $Comment_Error==0 && $Check_Error==0){
        
        echo "=========== Values After Filter =============<br>";
        echo "Name: ".$name;
        echo "<br> Email: ".$email;
        echo "<br> Radio Button: ".$weburl;
        echo "<br> WebLink: ".$weblink;
        echo "<br> Password: ".$password;
        echo "<br> Address: ".$address;
        echo "<br> Country: ".$country;
        echo "<br> Phone: ".$phone;
        echo "<br> Comment: ".$comment;
        echo "<br> Checkbox: ".$agree;

        echo "<br> All data is correct!";
        //return true;
    }
    else{
        echo "NOt Correct";
        //return false;
    }

}// End of Request POST
?>
</head>

<body>
	<div id="mainform">
	   <h3>General Info</h3>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table>
                <tr>
                	<td><label>Name<span>*</span>:</label></td>
                	<td><input id="name" name="name" type="text" placeholder="Enter your Name" value='<?php echo $val = (isset($name)) ? $name : null; ?>'></td>
                    <td><span class="warning red"><?php echo $msg = (isset($Name_Err_Msg)) ? $Name_Err_Msg : null; ?> </span></td>
            	</tr>
            	<tr>
                	<td><label>Email<span>*</span>:</label></td>
                	<td><input id="email" name="email" type="text" placeholder="Enter Email Address" value='<?php echo $val = (isset($email)) ? $email : null; ?>'></td>
                    <td><span class="warning red"><?php echo $msg = (isset($Email_Err_Msg)) ? $Email_Err_Msg : null; ?> </span></td>
            	</tr>
            	<tr>
                	<td><label>Do you have Web Address?</label></td>
                    <td>
                    <input type="radio" name="weburl" value="yes" onclick="document.getElementById('weblink').disabled=false;" <?php echo $val = (isset($weburl) && $weburl=='yes') ? 'checked' : null; ?>/>
                    		<span style="margin-right:50px;">Yes</span>
                    	<input type="radio" name="weburl" value="no" onclick="document.getElementById('weblink').disabled=true" <?php echo $val = (isset($weburl) && $weburl=='yes') ? null : 'checked'; ?>/>
                        	<span>No</span>
                    </td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                	<td><input type="text" name="weblink" id="weblink" placeholder="Enter Web Address" <?php echo $val1 = (isset($weburl) && $weburl=='yes') ?  null : 'disabled'; ?>  value='<?php echo $val = (isset($weblink)) ? $weblink : null; ?>'/></td>
                    <td><span class="warning red"><?php echo $msg = (isset($error_WebURL)) ? $error_WebURL : null; ?> </span></td>
                </tr>
            	<tr>
                	<td><label>Password<span>*</span>:</label></td>
                	<td><input id="password" name="password" type="password" placeholder="Enter password"></td>
                    <td><span class="warning red"><?php echo $msg = (isset($Password_Err_Msg)) ? $Password_Err_Msg : null; ?> </span></td>
            	</tr>
                <tr>
                	<td><label>Address:</label></td>
                	<td><input id="address" name="address" type="text" placeholder="What is your Address?" value='<?php echo $val = (isset($address)) ? $address : null; ?>'></td>
                    <td><span class="warning green"><?php echo $msg = (isset($Address_Err_Msg)) ? $Address_Err_Msg : null; ?> </span></td>
            	</tr>
            	<tr>
                	<td><label>Country<span>*</span>:</label></td>
                    <td><select id="country" name="country">
                          <option value="none">Select Country</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="India">India</option>
                          <option value="usa">United States</option>
                          <option value="canada">Canada</option>
                        </select>
                    </td>
                    <td><span class="warning red"><?php echo $msg = (isset($Country_Err_Msg)) ? $Country_Err_Msg : null; ?> </span></td>
            	</tr>
                <tr>
                	<td><label>Phone:</label></td>
                	<td><input id="phone" name="phone" type="text" placeholder="What is your calling number?" value='<?php echo $val = (isset($phone)) ? $phone : null; ?>'></td>
                    <td><span class="warning green"><?php echo $msg = (isset($Phone_Err_Msg)) ? $Phone_Err_Msg : null; ?> </span></td>
            	</tr>
            	<tr>
            		<td><label>Comment:</label></td>
            		<td><textarea id="comment" name="comment" rows="5" cols="10" placeholder="What's on in your mind?"><?php echo $val = (isset($comment)) ? $comment : null; ?></textarea></td>
                    <td><span class="warning green"><?php echo $msg = (isset($Comment_Err_Msg)) ? $Comment_Err_Msg  : null; ?> </span></td>
            	</tr>
                <tr>
                	<td><label style="font-size:12px;">Do you agree our to terms and conditions?</label></td>
                    <td><input type="checkbox" name="agree" value="yes" /></td>
                    <td><span class="warning red"><?php echo $msg = (isset($Check_Err_Msg )) ? $Check_Err_Msg   : null; ?> </span></td>
                </tr>
            	<tr>
                	<td>&nbsp;</td>
                    <td><input id="btn_submit" type="submit" name="submit" value="Confirm"></td>
                </tr>
			</table>
        </form>
	</div>
</body>
</html>