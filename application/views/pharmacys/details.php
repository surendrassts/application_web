<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type='text/javascript' src="<?php echo $this->config->item('assets_base_url');?>assets/js/common.js"></script>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
	</style>
</head>
<body>

<div id="container">
    <div><h1>Welcome to Doctor App Admin module</h1>
        <div style="text-align:right;">Welcome <?php echo $_SESSION['user']->user_email;?> | <a href="<?php echo base_url();?>user/logout">Logout</a></div></div>
	<div id="body">
            <div style="width:20%;float: left;">Menu
             <?php $this->load->view('common_view.php'); ?>
            </div><div  style="width:80%;float: left;">Content
                <form name="k_search_f" id="k_search_f" method="post"><input type="text" name="k_search" id="k_search" value="<?php echo $k_search; ?>"/><input type="submit" name="k_s_submit" id="k_s_submit" value="Submit"/><input type="submit" name="k_c_submit" id="k_c_submit" value="Clear"/></form>
            <table>
              <tr>
                <th>Hospital Name</th>
                <th>Branch</th>
                <th>City</th>
                <th>Status</th>
                <th>Edit</th>
              </tr>
              <?php
              
              foreach($data as $row){
              ?>
              <tr>
                <td><?php echo $row->name;?></td>
                <td><?php echo $row->eb_branch;?></td>
                <td><?php echo $row->city;?></td>
                <td><a href="#"  id="<?php echo "status_".$row->id; ?>"><?php if($row->eb_status == 1){echo "Active";}else{echo "Inactive";}?></a>
              <script>
                  $('#status_<?php echo $row->id; ?>').click(function(){
                   var id = $(this).attr('id').split("_")[1];
                   var ele = $(this);
                   var status = $(this).html();
                   url = "<?php echo base_url().'pharmacy/update_status'?>";
                   US.UTIL.activedeactivate(url,id,status,ele);
               });
                             </script>
                    
                </td>
                <td><a href="edit?entity_id=<?php echo $row->id; ?>">Edit</a></td>
              </tr>
              <?php
              }?>              
            </table>
            </div>
            <div style="clear: both"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>