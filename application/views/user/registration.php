<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
         <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>      
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#e_create_form").validate({
    
        // Specify the validation rules
        rules: {
            e_name: "required",
            e_description: "required",
            e_status: "required",
            e_loc_addressline1: "required",
            e_loc_city: "required",
            e_loc_state: "required",
            e_loc_zipcode: "required",
            e_loc_phone: {required: true,
                          phoneIND: true},
                     
             
            e_poc_firstname: "required",
            e_poc_lastname: "required",
            e_poc_mobile: {required: true,
                           number: true},
            e_poc_email: {
                required: true,
                email: true
            }
            
        },
        
        // Specify the validation error messages
        messages: {
             e_name: "Please enter a valid name",
            e_description: "Please enter a valid description",
            e_status: "Please select status",
            e_loc_addressline1: "Please enter a valid address",
            e_loc_city: "Please enter a valid city",
            e_loc_state: "Please enter a valid state",
            e_loc_zipcode: "Please enter zipcode",
            e_loc_phone: "Please enter a valid phone number",
            e_poc_firstname: "Please enter firstname",
            e_poc_lastname: "Please enter lastname",
                      
            e_poc_email: "Please enter a valid email address",
            e_poc_mobile: "Please enter valid mobile"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
</script>
</head>
<body>

<div id="container">
	<h1>Welcome to Loan Management System</h1>

	<div id="body">
            <?php echo $msg; ?>
            <form name="registration" method="post" id="registration" >
                <label>First Name:</label><input type="text" name="first_name"/><br/>
                <label>Last Name:</label><input type="text" name="last_name"/><br/>
                <label>Email:</label><input type="text" name="email"/><br/>
                <label>Password:</label><input type="password" name="password"/><br/>
                <label>Confirm Password:</label><input type="password" name="cpassword"/><br/>
                <label>Mobile:</label><input type="text" name="mobile"/><br/>
                <input type="submit" name="submit" id="submit" value="Register"/>
            </form>           
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>