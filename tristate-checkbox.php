<!DOCTYPE html>
<html>
	<head>
		<title>Tristate Checkboxes</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>
		$( document ).ready(function() {
		
			// initiating all checkboxs unchecked (it can be anything)
			$("input:checkbox").prop("indeterminate", false);
			$("input:checkbox").data("checked", 0);
			$("input:checkbox").prop("checked", false);
		
			//handling click event on checkboxes 
			//assigning states
			$('input:checkbox[class=indeterminate]').live('click', function(){
				switch($(this).data("checked")) {
				// unchecked, going indeterminate
					case 0:
						$(this).data("checked",1);
						$(this).prop("indeterminate",true);
					break;

					// indeterminate, going checked
					case 1:
						$(this).data("checked",2);
						$(this).prop("indeterminate",false);
						$(this).prop("checked",true);                
					break;

					// checked, going unchecked
					default:  
						$(this).data("checked",0);
						$(this).prop("indeterminate",false);
						$(this).prop("checked",false);
				}
			});
		
		});
		 
		//catching states on form submission
		function submittristateform(){
			var checked_opts = [];
			var unchecked_opts = [];
			var indeterminate_opts = [];

			$("input[type=checkbox]").each(function() {
				if($(this).data('checked') == 2){
					checked_opts.push($(this).val());
				}else if($(this).data('checked') == 1){
					indeterminate_opts.push($(this).val());
				}
				else if($(this).data('checked') == 0 || "undefined"==$(this).data('checked')){
					unchecked_opts.push($(this).val());
				}
			});
			
			alert(checked_opts);
			alert(unchecked_opts);
			alert(indeterminate_opts);
		}
		</script>
		
	</head>
	<body>
		<form name="input" action="" method="POST">
			<input class='indeterminate' type="checkbox" name="opt1" value="option 1" >option 1<br>
			<input class='indeterminate' type="checkbox" name="opt2" value="option 2" >option 2<br>
			<input class='indeterminate' type="checkbox" name="opt3" value="option 3" >option 3<br>
			<input class='indeterminate' type="checkbox" name="opt4" value="option 4" >option 4<br>
			<input class='indeterminate' type="checkbox" name="opt5" value="option 5" >option 5<br><br>
			<input type="submit" value="Submit" onclick="submittristateform()">
		</form> 
	</body>
</html>

<?php 
?>
