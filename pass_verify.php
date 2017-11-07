<?php

//USING TEMPORARY PASSWORD "ABC"

echo '<div style="margin-top:200px;" class="modal fade" id="enter_pass" role="dialog">
	<div class="modal-dialog modal-sm">';
    
// VERIFY CONTENT
echo '<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Enter Password</h4>
  </div>

  <div class="modal-body">
    <div class="container-fluid" style="width:100%;">
    	<div class="collapse" id="wrong_pass" data-toggle="collapse" data-target="#wrong_pass" >
	    	<div class="alert alert-danger">
	    		<div style="margin:0px;"> Wrong Password.</div>
	  		</div>
  		</div>
      <div class="container-fluid" style="width:100%; text-align:center;">
    		<input type="password" class="form-control" id="verity" style="width:200px; margin:auto;" name="authorization" maxlength="36">
  		</div>

    </div>
  </div>

  <div class="modal-footer" style="text-align:center;">
    <button type="button" class="btn btn-default" onclick="redirect_pass()" id="verify">Verify</button>
    <button type="button" class="btn btn-default" onclick="cancel_down()" >Cancel</button>
  </div>
</div>';
// CONFIRM CONTENT END
      
echo '</div>
  </div>';
// CONFIRM? END

//SCRIPT
echo '<script>
  $("#verity").keyup(function(event){
    if(event.keyCode == 13){
      $("#verify").click();
    }
  });
  function redirect_pass(){
  	var password_input = document.getElementById("verity").value;
  	var password = "ABC";
  	if(password==password_input){
  		document.getElementById("verity").value = "";
  		$("#enter_pass").modal("hide");
  		go_on();
  	}else{
  		$("#wrong_pass").collapse("show");
  		document.getElementById("verity").value = "";
  	}
  }
  function cancel_down(){
    document.getElementById("verity").value = "";
    $("#wrong_pass").collapse("hide");
    $("#enter_pass").modal("hide");
  }

</script>';
//SCRIPT END

?>
