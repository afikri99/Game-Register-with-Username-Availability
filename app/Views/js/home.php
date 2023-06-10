<script>
var check_password,check_nick;
check_password=0;
check_nick=0;
function checkbutton(){
    if(check_nick==1 && check_password==1) $("#btn_register").attr("disabled",false);
    else $("#btn_register").attr("disabled",true);
}
$('#pass1, #pass2').on('keyup', function () {
    if($('#pass1').val() == $('#pass2').val()) {
        $('#msg').html('');
        check_password=1;
        checkbutton();
    }else {
        $('#msg').html('<span class="text-danger">| Password do not match!</span>');
        check_password=0;
        checkbutton();
    }
});
$('#nickname').on('input',function(){
    $("#btn_register").attr("disabled",true);
});
$('#nickname').on('focusout',function(){
    var nick = $('#nickname').val();
    $.ajax({
		type: "POST",
		url: '/checkuser',
		data: {
            nick : nick
        },
		beforeSend: function() {
			$('#loader').css("display","block");
            $("#btn_register").attr("disabled",true);
		},
		success: function(response)
		{
            $("#btn_register").attr("disabled",true);
			setTimeout(function(){
				var jsonData = JSON.parse(response);
				if(jQuery.inArray(nick.toLowerCase(), jsonData) != -1) {
                    $('#msg2').html('<span class="text-danger">| Nickname already used!</span>');
                    check_nick=0
                }
                else {
                    $('#msg2').html('<span class="text-success">| Nickname is ready!</span>');
                    check_nick=1
                }
                $('#loader').css("display","none");
                checkbutton();
			},100);
		},
		error: function(response){
            alert("Bug found! Please capture this error and send to admin");
		}
	});
	return false;
    //check_nick=1; success event
    //$('#msg2').html('<span class="text-success">Nickname is ready!</span>');
    checkbutton();
});

</script>