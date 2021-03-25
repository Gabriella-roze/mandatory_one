<?php
  if( isset($display_error) ){
    echo '<div>Wrong credentials</div>';
  }
?>

<form action="/mandatory-1/login" method="POST">
    <input oninput="resetInputsError(event)" name="user_email" maxlength="50" data-validate="email" type="email"
        placeholder="email" required>
    <input oninput="resetInputsError(event)" name="user_password" maxlength="50" data-validate="password" data-min="5"
        data-max="50" type="password" placeholder="password" required>
    <button onclick="return validateForm()">login</button>
</form>

<script>
// Frontend form validation
function resetInputsError(element) {
    element.target.classList.remove('input-error')
}

function validateForm() {
    let error = false
    let min, max
    document.querySelectorAll("[data-validate]").forEach(element => {
        element.classList.remove('input-error')
        switch (element.getAttribute("data-validate")) {
            case "email":
                const reg = /^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/
                if (!reg.test(element.value.toLowerCase())) {
                    error = true
                    element.classList.add('input-error')
                }
                break
            case "password":
                min = parseInt(element.getAttribute("data-min"))
                max = parseInt(element.getAttribute("data-max"))
                password = element.value
                if (!password || password.length < min || password.length > max) {
                    error = true
                    element.classList.add('input-error')
                }
                break
        }
    })
    return error ? false : true
}
</script>