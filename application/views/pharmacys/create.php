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
        
        success{
		color: green;
		font-weight: normal;
	}
        
        error{
		color: red;
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
       table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            text-align: left;
            padding: 8px;
        }
	</style>
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>      
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
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
    <div><h1>Welcome to Doctor App Admin module</h1>
        <div style="text-align:right;">Welcome <?php echo $_SESSION['user']->user_email;?> | <a href="<?php echo base_url();?>user/logout">Logout</a></div></div>
	<div id="body">
            <div style="width:20%;float: left;">Menu
                <ul style="list-style: none;">
                    <li><a href="<?php echo base_url();?>user/details">Users</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>user/create">Create</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>hospital/details">Hospitals</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>hospital/create">Create</a></li>                            
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>bbank/details">Blood Banks</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>bbank/create">Create</a></li>                            
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>pharmacy/details">Pharmacy</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>pharmacy/create">Create</a></li>                            
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>doctor/details">Doctors</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>doctor/create">Create</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>speciality/details">Specializations</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>speciality/create">Create</a></li>
                        </ul>
                    </li>
                    <li><a href="">Profile</a></li>                    
                </ul>
            </div><div  style="width:80%;float: left;">Content
                <div class="<?php echo $status;?>"><?php echo $msg;?></div>
                <form name="e_create_form" id="e_create_form" method="post">
                    <table>
                        <tr><td style="width:20%">Name:</td><td  style="width:80%"><input type="text" name="e_name" id="e_name"/></td></tr>
                        <tr><td style="width:20%">Description:</td><td  style="width:80%"><textarea name="e_description" id="e_description"></textarea></td></tr>
                        <tr><td style="width:20%">Status:</td><td  style="width:80%"><select name="e_status" id="e_status">
                        <option value="0">Block</option>
                        <option value="1">Active</option>                        
                    </select></td></tr>
                        <tr><td style="width:20%">Website:</td><td  style="width:80%"><input type="text" name="e_website" id="e_website"/></td></tr>
                        <tr><td style="width:20%">Location Details:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Address line1:</td><td  style="width:80%"><input type="text" name="e_loc_addressline1" id="e_loc_addressline1"/></td></tr>
                        <tr><td style="width:20%">Address line2:</td><td  style="width:80%"><input type="text" name="e_loc_addressline2" id="e_loc_addressline2"/></td></tr>
                        <tr><td style="width:20%">City:</td><td  style="width:80%"><input type="text" name="e_loc_city" id="e_loc_city"/></td></tr>
                        <tr><td style="width:20%">State:</td><td  style="width:80%"><input type="text" name="e_loc_state" id="e_loc_state"/></td></tr>
                        <tr><td style="width:20%">Zip Code:</td><td  style="width:80%"><input type="text" name="e_loc_zipcode" id="e_loc_zipcode"/></td></tr>
                        <tr><td style="width:20%">Phone:</td><td  style="width:80%"><input type="text" name="e_loc_phone" id="e_loc_phone"/></td></tr>
                        <tr><td style="width:20%">Contact Person Details for This Location:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">First Name:</td><td  style="width:80%"><input type="text" name="e_poc_firstname" id="e_poc_firstname"/></td></tr>
                        <tr><td style="width:20%">Last Name:</td><td  style="width:80%"><input type="text" name="e_poc_lastname" id="e_poc_lastname"/></td></tr>
                        <tr><td style="width:20%">Email:</td><td  style="width:80%"><input type="text" name="e_poc_email" id="e_poc_email"/></td></tr>
                        <tr><td style="width:20%">Mobile Number:</td><td  style="width:80%"><input type="text" name="e_poc_mobile" id="e_poc_mobile"/></td></tr>
                        <tr><td style="width:20%"></td><td  style="width:80%"><input type="submit" name="e_create_submit" value="Submit"/></td></tr>                        
                        </table>
                </form>
            </div>
            <div style="clear: both"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>