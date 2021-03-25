<body>
    <form action="/mandatory-1/signup" method="POST">
        <section id="error_wrapper"></section>
        <label for="name">Name
            <input oninput="resetInputsError(event)" id="name" type="text" name="name" maxlength="50"
                data-validate="str" data-min="2" required>
        </label>

        <label for="last_name">Last name
            <input oninput="resetInputsError(event)" id="last_name" type="text" name="last_name" maxlength="50"
                data-validate="str" data-min="2" required>
        </label>

        <label for="age">Age
            <input oninput="resetInputsError(event)" id="age" type="number" name="age" min="1" max="200"
                data-validate="str" data-min="2" data-max="3" required>
        </label>

        <label for="email">Email
            <input oninput="resetInputsError(event)" id="email" type="email" name="email" maxlength="50"
                data-validate="email" required>
        </label>

        <label for="password">Password (min 5 max 20 characters)
            <input oninput="resetInputsError(event)" id="password" type="text" name="password" maxlength="40"
                data-validate="password" data-min="5" data-max="20" required>
        </label>

        <label for="repeat_password">Repeat Password
            <input oninput="resetInputsError(event)" id="repeat_password" type="text" name="repeat_password"
                maxlength="40" data-validate="repeat_password" data-min="5" data-max="20" required>
        </label>

        <button onclick="return validateForm()">Submit</button>
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
                case "str":
                    min = element.getAttribute("data-min")
                    let total_characters = element.value.length
                    if (total_characters < min) {
                        console.log("Error in str");
                        element.classList.add('input-error')
                        error = true
                    }
                    break
                case "email":
                    const reg = /^[a-z0-9]+[\._]?[a-z0-9]+[@]\w+[.]\w{2,3}$/
                    if (!reg.test(element.value.toLowerCase())) {
                        console.log("Error in email")
                        element.classList.add('input-error')
                        error = true
                    }
                    break
                case "password":
                    min = parseInt(element.getAttribute("data-min"))
                    max = parseInt(element.getAttribute("data-max"))
                    password = element.value
                    if (!password || password.length < min || password.length > max) {
                        console.log("Error in password");
                        element.classList.add('input-error')
                        error = true
                    }
                    break
                case "repeat_password":
                    let repeat_password = element.value
                    if (!password || !repeat_password || password !== repeat_password) {
                        console.log("Error in repeat password")
                        element.classList.add('input-error')
                        error = true
                    }
                    break
            }
        })

        return error ? false : true
    }
    </script>
</body>