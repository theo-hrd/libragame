<?php ob_start(); ?>    


<div class="vh">
    
    <div class="container">
        
        <form name="selectChoice" method="post" action="index.php?action=confirmUserDelete">
            <h2 class="delete_account">Do you really want to delete your account ?</h2> 
            
            <!-- <div class="choice">
            <input type="radio" name="radio" value="1"> Yes<br>
            </div>
            <div class="choice">
            <input type="radio" name="radio" value="2"> No<br>
            </div> -->
            
            <select name="choice">
                <option value="no">no</option>
                <option value="yes">Yes</option>
            </select>


            <span class="error">
                
                <?php
                    if(isset($errors["choice_required"])){
                        echo $errors["choice_required"];
                    }
                ?>
            </span>
            <input type="submit" value="Submit">
        </form>

    </div>

</div>




<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>