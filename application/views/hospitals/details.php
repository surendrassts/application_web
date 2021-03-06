<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    
    <script type='text/javascript' src="<?php echo $this->config->item('assets_base_url');?>assets/js/common.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                <td><?php echo $row->eb_city;?></td>
                <td><a href="#"  id="<?php echo "status_".$row->id; ?>"><?php if($row->eb_status == 1){echo "Active";}else{echo "Inactive";}?></a>
              <script>
                  $('#status_<?php echo $row->id; ?>').click(function(){
                   var id = $(this).attr('id').split("_")[1];
                   var ele = $(this);
                   var status = $(this).html();
                   url = "<?php echo base_url().'hospital/update_status'?>";
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