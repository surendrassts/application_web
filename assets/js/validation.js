 $(function() {
     $("#e_create_form").validate({
         rules: {
             e_firstname: "required",
             e_lastname: "required",
             e_password: {
                 required: true,
                 minlength: 6,
                 maxlength: 10
             },
             e_c_password:{
                 equalTo: "#e_password",
                 minlength: 6,
                 maxlength: 10
             },
             'e_service[]': "required",
             e_status: "required",
             e_addressline1: "required",
             e_city: "required",
             e_state: "required",
             e_zipcode: "required",
             e_phone: {required: true,
                 phoneIND: true},
             e_mobile: {required: true,
                 number: true,
                 minlength: 10,
                 maxlength: 10
             },
             e_email: {
                 required: true,
                 email: true
             }
         },
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