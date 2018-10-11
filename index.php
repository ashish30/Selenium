<?php
include 'config.php';

if(isset($_POST['sub']))
{
$name=$_POST['name'];
//$email=$_POST['mail'];
$phone= $_POST['phone'];
//$phones=$_POST['phones'];
 
$sql="insert into user(name,phone) values('$name','$phone')";

//echo  $sql;die;
if(mysql_query($sql))
{
$lID= mysql_insert_id();

//echo  $lID;die;

if($lID > 0){

foreach($_POST['settings'] as $key => $val) {
	if(!empty($val)) {
		foreach($val as $v) {
		
			$sqlEach="insert into user_settings(user_id,code, value) values('$lID','$key','$v')";
			
			
			mysql_query($sqlEach);
			
			
		}
	}
}
}

header('Location: display.php');

}

//echo'<pre>';  print_r($_POST);die;

 
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">

$(function () {
    $('input[type=radio]').change(function () {
		
	$(this).prev().removeClass("required");
    });
});


jQuery(function($){
	$('#myform').validate({
		
	});
});


</script>
<script type="text/javascript">
 $(document).ready(function () {
        var max_fields = 5; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $("#add_field_button"); //Add button ID
		var add_button_new = $("#add_field_button_new"); //Add button ID
//alert(add_button);
        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
		//alert('hello');
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="col-md-2"><div class="form-group"><label>Email </label><input type="text" name="settings[mail][]" value="" placeholder="email" class="form-control" /><a href="#" class="remove_field btn btn-danger">X</a></div></div>'); //add input box
                $('.chzn').chosen({search_contains: true});
            }
        });

		
        $(add_button_new).click(function (e) { //on add input button click
		//alert('hello');
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="col-md-2"><div class="form-group"><label>Phone </label><input type="text" name="settings[phones][]" value="" placeholder="Phone" class="form-control" /><a href="#" class="remove_field btn btn-danger">X</a></div></div>'); //add input box
                $('.chzn').chosen({search_contains: true});
            }
        });		
		
		
        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
<title>hello</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<form action="" name="myform" id="myform" method="post">
<table border="0" cellspacing="5" id="tbl" cellpadding="5" align="center">
<th align="center" colspan="2">New Contact Form</font></th>
<div class="col-md-12 input_fields_wrap"></div>
<tr><td> <input type="text" name="name" id="name" class="required" placeholder="name"  /></td></tr>


<tr class="clr"><td> <input type="text" name="settings[mail][]" id="mail" class="required email" placeholder="email" /><input type="radio" name="mail" id="mail" />Primary <button type="button" id="add_field_button" class="btn btn-success">Add More</button></td></tr>

<tr class="clr"><td> <input type="text" name="phone" id="phone" class="required number" placeholder="phone"/><input type="radio" name="phone" id="mail" />Primary</td></tr>


<tr class="clr"><td> <input type="text" name="settings[phones][]" id="phone" class="required number" placeholder="phone1" /><input type="radio" name="phones" id="mail" />Primary<button type="button" id="add_field_button_new" class="btn btn-success">Add More</button></td></tr>
 

<tr><td colspan="2" align="center"><input type="submit" value="save"  name="sub"/></td></tr>

</table>
</form>
</body>
</html>

