function dugme() {
    event.preventDefault();
}

$("#formRegister").submit(function () {
    event.preventDefault()
    const form = $(this)
    const serialized = form.serialize()

    const registerData = form.serializeArray().reduce(function (json, { name, value }) {
        json[name] = value
        return json
    }, {}
    )


    // console.log(registerData);
    // console.log(serialized)

    request = $.ajax({
        url: "../handler/registerHandler.php",
        type: "post",
        data: serialized
    })

    request.done(function (response, textStatus, jqXHR) {
        if (response == 'success') {
            alert("You have successfully registered! Procees to login!")
            document.location.href = '../pages/login.php'
        } else if (response == 'alreadyExixts') {
            alert('This username already exixts!')
        } else if (response == 'error') {
            alert("Error while registering!")
        } else if (response == 'noMatch') {
            alert("Password and password check fields do not match!")
        } else if (response == 'notFilled') {
            alert("You must fill all fields!")
        } else {
            console.log("Error")
        }
        console.log(response);
    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.log("Error occured: " + textStatus, errorThrown)
    })

})