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
       table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

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
              <!--  <ul style="list-style: none;">
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
                    <li><a href="<?php echo base_url();?>specialization/details">Specializations</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>specialization/create">Create</a></li>
                        </ul>
                    </li>
                    <li><a href="">Profile</a></li>                    
                </ul>
              -->
            </div><div  style="width:80%;float: left;">Content
                <form name="k_search_f" id="k_search_f" method="post">
                    <input type="text" name="k_search" id="k_search" value="<?php echo $k_search; ?>"/>
                    <input type="submit" name="k_s_submit" id="k_s_submit" value="Submit"/>
                    <input type="submit" name="k_c_submit" id="k_c_submit" value="Clear"/></form>
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
                 <td>
              <a href="#"  id="<?php echo "status_".$row->user_id; ?>"><?php if($row->user_status == 1){echo "Active";}else{echo "Inactive";}?></a>
              <script>
                  $('#status_<?php echo $row->user_id; ?>').click(function(){
                   var id = $(this).attr('id').split("_")[1];
                   var ele = $(this);
                   var status = $(this).html();
                   url = "<?php echo base_url().'user/update_status';?>";
                   US.UTIL.activedeactivate(url,id,status,ele);
               });
                             </script>
                 </td>
                 <td><a href="edit?user_id=<?php echo $row->user_id; ?>">Edit</a></td>
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