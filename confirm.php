<?php
	// CONFIRM?
	echo '<div class="modal fade" id="confirm_this" role="dialog" style="margin-top:50px;">
			<div class="modal-dialog">';
		
	// CONFIRM CONTENT (DELETE)
	echo 		'<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Confirmation</h4>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this record?</p>
						<div style="display:none;" id="id_ident" >'.$_GET["profilepage"].'</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" onclick="redirect_this()" >Delete</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</div>';
				// CONFIRM CONTENT END
	echo 	'</div>
		</div>';
		// CONFIRM? END
		//SCRIPT
	echo '<script>
			function redirect_this(){
				var profile_p = document.getElementById("id_ident").innerHTML;
				var delete_token = document.getElementById("del_button").value;
				var link = delete_token+".php?delete="+profile_p;
				window.location = link;
			}
		</script>';
		//SCRIPT END
?>

<?php
		// CONFIRM?
	echo '<div class="modal fade" id="add_new" role="dialog" style="margin-top:50px;">
			<div class="modal-dialog">';
		
	// CONFIRM CONTENT (ADD NEW)
	echo 		'<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" id="add_head">Add New</h4>
					</div>
					<div class="modal-body">
						<p>Do you want to add a new <i id="add_para"></i>? You will be redirected out of this page.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" onclick="redirect_form()" >Proceed</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
				</div>';
				// CONFIRM CONTENT END
	echo 	'</div>
		</div>';
		// CONFIRM? END

		//SCRIPT
	echo '<script>
			function redirect_form(){
				var to = document.getElementById("add_para").innerHTML;
				var link_there = "#";
				if(to=="doctor"){
					link_there = "form_doctors.php";
				}else if(to=="staff"){
					link_there = "#";
				}
				window.location = link_there;
			}
		</script>';
		//SCRIPT END
?>
