// Frontend form validation
function resetInputsError(event) {
    event.target.classList.remove('input-error')
}

function validateForm() {
    let error = false
    let min, max
    document.querySelectorAll("[data-validate]").forEach(element => {
        element.classList.remove('input-error')
        switch (element.getAttribute("data-validate")) {
            case "num":
                min = Number(element.getAttribute("data-min"))
                max = Number(element.getAttribute("data-max"))
                input = element.value
                if (input < min || input > max) {
                    console.log("Error in number")
                    element.classList.add('input-error')
                    error = true
                }
                break
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