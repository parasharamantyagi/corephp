$.validator.setDefaults( {
			submitHandler: function () {
				// alert( "submitted!" );
				// alert($('#fullname').val());
				$.ajax({
				  type: "POST",
				  url: "request.php",
				  data:'fullname='+$('#fullname').val()+'&email='+$('#email').val()+'&password='+$('#password').val()+'&insertUser=true',
				  success: function(data){
						alert('user insert successfully');
						window.location.href='';
				  }
				  });
			}
		} );


$( document ).ready( function () {
	$("#signupForm").validate({
		rules: {
					fullname: "required",
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					}
				},
				messages: {
					fullname: "Please enter your fullname",
					email: "Please enter a valid email address",
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					}
				},
				errorPlacement: function ( error, element ) {
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
		
	});
});


$(document).on('click', '.deleteuser', function(){
	var user_id = $(this).data('id');
	var tabe_tr = $(this).parents('tr');
	if(confirm('Are you sure to delete this user')){
				$.ajax({
						  type: "POST",
						  url: "request.php",
						  data:'id='+user_id+'&deleteuser=true',
						  success: function(data){
							  tabe_tr.remove();
						  }
					});
			}
});

$( document ).ready( function () {
	$(".img-rounded").click(function() {
		$("input[id='my_file']").click();
	});
});


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#userimage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }