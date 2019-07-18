jQuery(document).ready(function () {
	jQuery('#submit').on('click',document,function(){
			if(jQuery('#captcha_val').val()!=jQuery('#submit').val()){
				$('#captcha_text').parent('div').append('<span class="error">Captch is not match</span>');
			}
			else{
				jQuery("#Geekpage").validate({
					submitHandler : function (e) {
						submitSignupFormNow(jQuery("#Geekpage"))
					},
					rules : {
						fname : {
							required : true
						},
						lname : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						phone : {
							required : true
						},
						adress : {
							required : true
						},
					},
					errorElement : "span",
					errorPlacement : function (e, t) {
						e.appendTo(t.parent())
					}
				});
				submitSignupFormNow = function (e) {
					var t = e.serialize();
					var n = "geek-form.php";
					jQuery.ajax({
						url : n,
						type : "POST",
						data : t,
						success : function (e) {
							var t = jQuery.parseJSON(e);
							if (t.status = "Success") {
								jQuery("#form_result").html('<span class="form-success">' + t.msg + "</span>")
							} else {
								jQuery("#form_result").html('<span class="form-error">' + t.msg + "</span>")
							}
							jQuery("#form_result").show();
						}
					});
					return false
				}
		}
	});
	
})
