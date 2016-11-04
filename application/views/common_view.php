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
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://localhost/docsapp/assets/js/common.js"></script>
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
<script>
    /*When the browser is ready...*/
    $(document).ready(function() {
        // Setup form validation on the #register-form element
        $("#e_create_form").validate({
            // Specify the validation rules
            rules: {
                e_name: "required",
                'e_spe[]': "required",
                e_description: "required",
                e_status: "required",
                e_loc_addressline1: "required",
                e_loc_state: "required",
                e_loc_city: "required",
                e_loc_zipcode: "required",
                e_loc_phone: {required: true,
                    number: true
                },
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
                'e_spe[]': "Please select atleast one specialization",
                e_description: "Please enter a valid description",
                e_status: "Please select status",
                e_loc_addressline1: "Please enter a valid address",
                e_loc_state: "Please select valid state",
                e_loc_city: "Please enter a valid city",
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
 <script>
  
  // When the browser is ready...
  $(document).ready(function(){
  
    // Setup form validation on the #register-form element
    $("#e_create_form_doc").validate({
    
        // Specify the validation rules
        rules: {
            e_firstname: "required",
            e_lastname: "required",
            e_password:{ required: true,
                         minlength: 6,
                         maxlength: 10
               }, 
            e_c_password:{equalTo: "#e_password",
                          minlength: 6,
                          maxlength: 10
               },               
           'e_service[]': "required",
            e_status: "required",
            e_addressline1: "required",
            e_city: "required",
            e_state: "required",
            e_zipcode: "required",
            e_phone:{required: true,
                          phoneIND: true},
           
            e_mobile:{required: true,
                       number: true,
                       minlength: 10,
                       maxlength: 10
                 },
            e_email: {
                required: true,
                email: true
            }
            
        },
        
        // Specify the validation error messages
        messages: {
            e_firstname: "Please enter firstname",
            e_lastname: "Please enter lastname",
            e_password: "Please enter Password with minimum 6 ",
            'e_service[]': "Please select atleast one specialization",
            e_description: "Please enter a valid description",
            e_status: "Please select status",
            e_addressline1: "Please enter a valid address",
            e_city: "Please enter a valid city",
            e_state: "Please enter a valid state",
            e_zipcode: "Please enter zipcode",
            e_phone: "Please enter a valid phone number",
            
                      
            e_email: "Please enter a valid email address",
            e_mobile: "Please enter valid mobile"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
</script>