<?php ob_start(); ?>

<div class="vh">
    <div class="upload">
        <form action="index.php?action=uploadProfilePicture" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit" class="profile_pic_send">Upload your new profile picture</button>
        </form>
    </div>

</div>




















<?php $content = ob_get_clean(); ?> <!-- PHP function to inject the template -->
<?php require 'templates/template.php'; ?>