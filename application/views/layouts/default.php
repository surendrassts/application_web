 <html>
     <head><title>Admin Layout</title> </head>
     <body>
         <h1>Hello Admin<?php echo $title_for_layout ?></h1>
          <?php echo $this->layouts->print_includes() ?>
          <?php echo $content_for_layout; ?>
         <?php echo base_url(); ?>
        
         
     </body>
        
    </html>



