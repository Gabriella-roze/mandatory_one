<section id="error_wrapper">
    <?php
        if( isset($display_error) ) {
            echo urldecode($error_message);
        }
    ?>
</section>
<form action="/mandatory-1/signup" method="POST">
    <label for="name">Name (min 2 max 50 characters)
        <input oninput="resetInputsError(event)" id="name" type="text" name="name" maxlength="50" data-validate="str"
            data-min="2" required>
    </label>

    <label for="last_name">Last name (min 2 max 50 characters)
        <input oninput="resetInputsError(event)" id="last_name" type="text" name="last_name" maxlength="50"
            data-validate="str" data-min="2" required>
    </label>

    <label for="age">Age (min 1 max 200)
        <input oninput="resetInputsError(event)" id="age" type="number" name="age" value="18" min="1" max="200"
            data-validate="num" data-min="1" data-max="200" required>
    </label>

    <label for="email">Email
        <input oninput="resetInputsError(event)" id="email" type="email" name="email" maxlength="50"
            data-validate="email" required>
    </label>

    <label for="password">Password (min 5 max 20 characters)
        <input oninput="resetInputsError(event)" id="password" type="text" name="password" maxlength="40"
            data-validate="password" data-min="5" data-max="20" required>
    </label>

    <label for="repeat_password">Repeat Password (must match password)
        <input oninput="resetInputsError(event)" id="repeat_password" type="text" name="repeat_password" maxlength="40"
            data-validate="repeat_password" data-min="5" data-max="20" required>
    </label>
    <button type="submit" onclick="return validateForm()">Submit</button>
</form>
<?php
    if ( isset($display_error) ) {
        $js_path = '../../form_validation.js';
    } else {
        $js_path = './form_validation.js';
    }
?>
<script src=<?= $js_path?>></script>