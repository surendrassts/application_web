<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

  


</head>
<body>
<div id="container">
    <div><h1>Welcome to Doctor App Admin module</h1>
        <div style="text-align:right;">Welcome <?php echo $_SESSION['user']->user_email;?> | <a href="<?php echo base_url();?>user/logout">Logout</a></div></div>
	<div id="body">
            <div style="width:20%;float: left;">Menu
                  <?php $this->load->view('common_view.php'); ?>
               <!-- <ul style="list-style: none;">
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
                <div class="<?php echo $status;?>"><?php echo $msg;?></div>
                <form name="e_create_form_doc" id="e_create_form_doc" method="post" enctype="multipart/form-data">
                    <table>
                        <tr><td style="width:20%">First Name:</td><td  style="width:80%"><input type="text" name="e_firstname" id="e_firstname"/></td></tr>
                        <tr><td style="width:20%">Last Name:</td><td  style="width:80%"><input type="text" name="e_lastname" id="e_lastname"/></td></tr>
                        <tr><td style="width:20%">Email:</td><td  style="width:80%"><input type="text" name="e_email" id="e_email"/></td></tr>
                        <tr><td style="width:20%">Mobile:</td><td  style="width:80%">+91-<input type="text" name="e_mobile" id="e_mobile"/></td></tr>                        
                        <tr><td style="width:20%">Password:</td><td  style="width:80%"><input type="text" name="e_password" id="e_password"/></td></tr>
                        <tr><td style="width:20%">Confirm Password:</td><td  style="width:80%"><input type="text" name="e_c_password" id="e_c_password"/></td></tr>
                        <tr><td style="width:20%">Status:</td><td  style="width:80%"><select name="e_status" id="e_status">
                        <option value="0">Block</option>
                        <option value="1">Active</option>                        
                        </select></td></tr>
                        <tr><td style="width:20%">Roles:</td><td  style="width:80%">
                        <?php foreach ($entity_roles as $role) {?>
                        <input type="checkbox" name="e_role" value="<?php echo $role->id;?>" <?php if($role->id==$this->config->item('default_role')) echo 'checked disabled';?>/><?php echo $role->role;?>  <br/>                      
                        <?php }?>
                        </td></tr>
                        <tr><td style="width:20%">Specializations:</td><td  style="width:80%">
                        <select name="e_service[]" id="e_service" multiple>
                        <option  value="">Select Speciality</option>
                        <?php if(!empty ($entity_services)){ foreach ($entity_services as $service) {?>
                        <option  value="<?php echo $service->id;?>" ><?php echo $service->name;?>  </option>                     
                        <?php }}?>            
                        </select>
                        </td></tr>
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
                        <tr><td style="width:20%">Blood Donation Status:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Willing to Donate Blood:</td><td  style="width:80%"><input type="checkbox" name="e_donation_status" id="e_donation_status" value="1"/></td></tr>
                        <tr><td style="width:20%">Blood Group:</td><td  style="width:80%"><select name="e_blood_group" id="e_blood_group">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        </select></td>
                        </tr>
                        <tr><td style="width:20%">Select document type:</td><td  style="width:80%"><select name="e_doc_type" id="e_doc_type" class="e_doc_type">
                                    <option value="0">Select one</option>
                                    <option value="Registration">Registration..</option>
                                </select></td></tr>
                        <tr><td style="width:20%">Upload Document:</td><td  style="width:80%"><input type="file" name="e_poc_document" id="e_poc_document"/></td></tr>
                        
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