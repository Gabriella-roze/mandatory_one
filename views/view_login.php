<section id="error_wrapper">
    <?php
        if( isset($display_error) ) {
            echo urldecode($login_error);
        }
    ?>
</section>

<form action="/mandatory-1/login" method="POST">
    <label for="user_email">Email</label>
    <input oninput="resetInputsError(event)" name="user_email" maxlength="50" data-validate="email" type="email"
        placeholder="email" required>
    <label for="user_password">Psssword</label>
    <input oninput="resetInputsError(event)" name="user_password" maxlength="50" data-validate="password" data-min="5"
        data-max="50" type="password" placeholder="password" required>
    <button type="submit" onclick="return validateForm()">login</button>
</form>

<?php
    if ( isset($display_error) ) {
        $js_path = '../../form_validation.js';
    } else {
        $js_path = './form_validation.js';
    }
?>
<script src=<?= $js_path?>></script>