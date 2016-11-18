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
            <div style="width:20%;float: left;">Menu
                 <?php $this->load->view('common_view.php'); ?>
            </div><div  style="width:80%;float: left;">Content
                <div class="<?php //echo $status;?>"><?php //echo $msg; ?></div>
                
                <form name="e_create_form" id="e_create_form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>hospital/update">
                    <table><tr><td style="width:20%"></td><td  style="width:80%"><input type="hidden" name="entity_id" id="e_name" value="<?php echo $data['entity']->result_array[0]['entity_id'] ?>"/></td></tr>
                        <tr><td style="width:20%">Name:</td><td  style="width:80%"><input type="text" name="e_name" id="e_name" value="<?php echo $data['entity']->result_array[0]['name'] ?>"/></td></tr>
                                
                         <tr><td style="width:20%">Select Specislisation:</td>
                                    
                                    <td  style="width:80%">
                                        <select name="e_spe[]" id="spe" multiple>
                                            <option value="">Select Specialization's.. </option>
                                    <?php foreach ($spe_types as $spe){?>   
                                            <option value="<?php echo $spe->id; ?>" <?php foreach ($data['spe']->result_array as $specialization){if(in_array($spe->id,$specialization)){echo "selected";}}?>><?php echo $spe->name; ?></option>
                                                <?php } ?>
                                            </select>* Note. Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.
                            </td></td></tr>
                        <tr><td style="width:20%">Description:</td><td  style="width:80%"><textarea name="e_description" id="e_description" value=""><?php echo $data['entity']->result_array[0]['description'] ?></textarea></td></tr>
                        <tr><td style="width:20%">Status:</td><td  style="width:80%"><select name="e_status" id="e_status">
                        <option value="">Choose Status...</option>
                        <option value="0">Block</option>
                        <option value="1">Active</option>                        
                    </select></td></tr>
                        <tr><td style="width:20%">Website:</td><td  style="width:80%"><input type="text" name="e_website" id="e_website"  value="<?php echo $data['entity']->result_array[0]['website'] ?>"/></td></tr>
                        <tr><td style="width:20%">Location Details:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Address line1:</td><td  style="width:80%"><input type="text" name="e_loc_addressline1" id="e_loc_addressline1"  value="<?php echo $data['entity']->result_array[0]['addressline1'] ?>"/></td></tr>
                        <tr><td style="width:20%">Address line2:</td><td  style="width:80%"><input type="text" name="e_loc_addressline2" id="e_loc_addressline2"  value="<?php echo $data['entity']->result_array[0]['addressline2'] ?>"/></td></tr>
                        <tr><td style="width:20%">State:</td><td  style="width:80%">
                                <select name="e_loc_state" id="e_loc_state" class="e_loc_state">
                                    <option value="">Select State..</option>
                                    <?php foreach($states as $state){ ?>
                                    <option value="<?php echo $state->id; ?>" <?php if($state->id == $data['entity']->result_array[0]['state']){ echo "selected"; } ?>><?php echo $state->name; ?></option>
                                    <?php } ?>
                                </select></td></tr>
                        
                        <script>
                            $(window).load(function(){
                                url = "<?php echo base_url().'hospital/get_cities'; ?>";
                                state_id = $("#e_loc_state").val();
                                
                                user_city = "<?php echo $data['entity']->result_array[0]['city'] ?>";
                                GB.UTIL.getcities(url,state_id,user_city);
                            });
                                                    </script>
                                                    <script>
                                                        $("#e_loc_state").change(function(){
                                                            url = "<?php echo base_url().'hospital/get_cities'; ?>";
                                                            state_id = $("#e_loc_state").val();
                                                            GC.UTIL.getcities(url,state_id);
                                                        });
                                                     </script>
                        <tr><td style="width:20%">City:</td><td  style="width:80%"><select name="e_loc_city" id="e_loc_city"></select></td></tr>
                        <tr><td style="width:20%">Zip Code:</td><td  style="width:80%"><input type="text" name="e_loc_zipcode" id="e_loc_zipcode" value="<?php echo $data['entity']->result_array[0]['zipcode'] ?>" /></td></tr>
                        <tr><td style="width:20%">Phone:</td><td  style="width:80%"><input type="text" name="e_loc_phone" id="e_loc_phone" value="<?php echo $data['entity']->result_array[0]['landline'] ?>"/></td></tr>
                        <tr><td style="width:20%">Contact Person Details for This Location:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">First Name:</td><td  style="width:80%"><input type="text" name="e_poc_firstname" id="e_poc_firstname" value="<?php echo $data['entity']->result_array[0]['poc_name'] ?>"/></td></tr>
                        <tr><td style="width:20%">Last Name:</td><td  style="width:80%"><input type="text" name="e_poc_lastname" id="e_poc_lastname" value="<?php echo $data['entity']->result_array[0]['poc_name'] ?>"/></td></tr>
                        <tr><td style="width:20%">Email:</td><td  style="width:80%"><input type="text" name="e_poc_email" id="e_poc_email" value="<?php echo $data['entity']->result_array[0]['email'] ?>"/></td></tr>
                        <tr><td style="width:20%">Mobile Number:</td><td  style="width:80%"><input type="text" name="e_poc_mobile" id="e_poc_mobile" value="<?php echo $data['entity']->result_array[0]['mobile'] ?>"/></td></tr>
                        <tr><td style="width:20%">Select document type:</td><td  style="width:80%"><select name="e_doc_type" id="e_doc_type" class="e_doc_type">
                                    <option value="0">Select one</option>
                                    <option value="Registration">Registration..</option>
                                </select></td></tr>
                        <tr><td style="width:20%">Upload Document:</td><td  style="width:80%"><input type="file" name="e_poc_document" id="e_poc_document"/></td></tr>
                        <tr><td style="width:20%"></td><td  style="width:80%"><input type="submit" name="e_update_submit" value="Submit" id="e_update_submit"/></td></tr>                        
                        </table>
                    
                  
                </form>
            </div>
            <div style="clear: both"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>