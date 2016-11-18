<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                 <th>Edit</th>
              </tr>
              <?php foreach($data as $row){
              ?>
              <tr>
                <td><?php echo $row->first_name;?></td>
                <td><?php echo $row->last_name;?></td>
                <td><?php echo $row->user_email;?></td>
                 <td><a href="#"  id="<?php echo "status_".$row->user_id; ?>"><?php if($row->user_status == 1){echo "Active";}else{echo "Inactive";}?></a>
              <script>
                  $('#status_<?php echo $row->user_id; ?>').click(function(){
                   var id = $(this).attr('id').split("_")[1];
                   alert(id);
                   var ele = $(this);
                   var status = $(this).html();
                   url = "<?php echo base_url().'doctor/update_status'?>";
                   US.UTIL.activedeactivate(url,id,status,ele);
               });
                             </script>
                    
                </td>
                <td><a href="edit?entity_id=<?php echo $row->user_id; ?>"><?php echo $row->user_id; ?></a></td>
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