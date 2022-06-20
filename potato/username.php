<div class="row mt-2 mb-2 ms-5">
    <div class="col-6">
        <label class="form-label h4 text-light">Username</label>
         <input type="text" class="form-control <?php
            if($uname_error==TRUE) {echo "border border-danger border-2";} 
            elseif($u_len_error == TRUE){echo "border border-warning border-2";}
            ?>" placeholder="Username123" name="uname"value="<?php if(!empty($uname)){echo $uname;} ?>">
    </div>
</div>