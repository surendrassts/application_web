<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
</head>
<body>
          
<div id="container">
    <div><h1>Welcome to Doctor App Admin module</h1>
        <div style="text-align:right;">Welcome <?php echo $_SESSION['user']->user_email;?> | <a href="<?php echo base_url();?>user/logout">Logout</a></div></div>
          
        <div id="body">
            <div style="width:20%;float: left;">
                 <?php $this->load->view('common_view.php'); ?>
                <!-- 
                Menu
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
                </ul>  -->
            </div><div  style="width:80%;float: left;">Content
                <div class="<?php echo $status;?>"><?php echo $msg; ?></div>
                
                <form name="e_create_form" id="e_create_form" method="post" enctype="multipart/form-data">
                    <table>
                        <tr><td style="width:20%">Name:</td><td  style="width:80%"><input type="text" name="e_name" id="e_name"/></td></tr>
                                
                         <tr><td style="width:20%">Select Specislisation:</td>
                                    
                                    <td  style="width:80%">
                                        <select name="e_spe[]" id="spe" multiple>
                                            <option value="">Select Specialization's.. </option>
                                    <?php foreach ($spe_types as $spe){?>   
                                            <option value="<?php echo $spe->id; ?>"><?php echo $spe->name; ?></option>
                                        
                                    <?php } ?>
                                            </select>* Note. Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.
                            </td></td></tr>
                        <tr><td style="width:20%">Description:</td><td  style="width:80%"><textarea name="e_description" id="e_description"></textarea></td></tr>
                        <tr><td style="width:20%">Status:</td><td  style="width:80%"><select name="e_status" id="e_status">
                        <option value="">Choose Status...</option>
                        <option value="0">Block</option>
                        <option value="1">Active</option>                        
                    </select></td></tr>
                        <tr><td style="width:20%">Website:</td><td  style="width:80%"><input type="text" name="e_website" id="e_website"/></td></tr>
                        <tr><td style="width:20%">Location Details:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Address line1:</td><td  style="width:80%"><input type="text" name="e_loc_addressline1" id="e_loc_addressline1"/></td></tr>
                        <tr><td style="width:20%">Address line2:</td><td  style="width:80%"><input type="text" name="e_loc_addressline2" id="e_loc_addressline2"/></td></tr>
                        <tr><td style="width:20%">State:</td><td  style="width:80%">
                                <select name="e_loc_state" id="e_loc_state" class="e_loc_state">
                                    <option value="">Select State..</option>
                                    <?php foreach($states as $state){ ?>
                                    <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                                    <?php } ?>
                                </select></td></tr>
                        <script>
                                
                          
                             $("#e_loc_state").change(function(){
                                 url = "<?php echo base_url().'bbank/get_cities'; ?>";
                                 state_id = $("#e_loc_state").val();
                                 GC.UTIL.getcities(url,state_id);
                             });
                                                     </script>
                        <tr><td style="width:20%">City:</td><td  style="width:80%"><select name="e_loc_city" id="e_loc_city"></select></td></tr>
                        <tr><td style="width:20%">Zip Code:</td><td  style="width:80%"><input type="text" name="e_loc_zipcode" id="e_loc_zipcode"/></td></tr>
                        <tr><td style="width:20%">Phone:</td><td  style="width:80%"><input type="text" name="e_loc_phone" id="e_loc_phone"/></td></tr>
                        <tr><td style="width:20%">Contact Person Details for This Location:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">First Name:</td><td  style="width:80%"><input type="text" name="e_poc_firstname" id="e_poc_firstname"/></td></tr>
                        <tr><td style="width:20%">Last Name:</td><td  style="width:80%"><input type="text" name="e_poc_lastname" id="e_poc_lastname"/></td></tr>
                        <tr><td style="width:20%">Email:</td><td  style="width:80%"><input type="text" name="e_poc_email" id="e_poc_email"/></td></tr>
                        <tr><td style="width:20%">Mobile Number:</td><td  style="width:80%"><input type="text" name="e_poc_mobile" id="e_poc_mobile"/></td></tr>
                        <tr><td style="width:20%">Select document type:</td><td  style="width:80%"><select name="e_doc_type" id="e_doc_type" class="e_doc_type">
                                    <option value="0">Select one</option>
                                    <option value="Registration">Registration..</option>
                                </select></td></tr>
                        <tr><td style="width:20%">Upload Document:</td><td  style="width:80%"><input type="file" name="e_poc_document" id="e_poc_document"/></td></tr>
                        <tr><td style="width:20%"></td><td  style="width:80%"><input type="submit" name="e_create_submit" value="Submit" id="e_create_submit"/></td></tr>                        
                        </table>
                    
                  
                </form>
            </div>
            <div style="clear: both"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>