function dugme() {
    event.preventDefault();
}
// Register
$("#formRegister").submit(function () {
    event.preventDefault()
    const form = $(this)
    const serialized = form.serialize()


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

// Login
$('#formLogin').submit(function () {
    event.preventDefault()
    const form = $(this)
    const serialized = form.serialize()


    request = $.ajax({
        url: "../handler/loginHandler.php",
        type: "post",
        data: serialized
    })

    request.done(function (response, textStatus, jqXHR) {
        if (response == 'success') {
            document.location.href = '../pages/home.php'
        } else if (response == 'noResult') {
            alert('This username/password combination does not exist!')
        } else if (response == 'noFill') {
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

// Add beer
$('#addSubmenu').submit(function () {

    event.preventDefault()
    const form = $(this)
    var serialized = form.serialize()

    serialized = serialized + "&type=" + $('#typeSelectionAdd').val() + "&size=" + $('#sizeSelectionAdd').val()

    request = $.ajax({
        url: "../handler/add.php",
        type: "post",
        data: serialized
    })

    request.done(function (response, textStatus, jqXHR) {
        if (response == "success") {
            resetAddValues()
            appendLastAdded()
        } else {
            console.log(response)
        }
    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.log("Error occured: " + textStatus, errorThrown)
    })

})

function resetAddValues() {
    $('#addFormName').val("")
    $('#addFormCountry').val("")
    $("#addFormAlcohol").val("")
    $("#addFormRating").val("")
    $("#sizeSelectionAdd")[0].selectedIndex = 0
    $("#typeSelectionAdd")[0].selectedIndex = 0
}

function addObjectToTable(obj) {
    $('#table tbody').append(`
        <tr id="tr-${obj.beerID}">
            <td class="column1 radioStyle">
                <label class="radio-btn">
                    <input type="radio" class="form-check-input " name="flexRadioDisabled" id="radiobtn" value=${obj.beerID}>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td class="column2">${obj.name}</td>
            <td class="column3">${obj.country}</td>
            <td class="column4">${obj.type}</td>
            <td class="column5">${obj.size}</td>
            <td class="column6">${obj.alcohol}</td>
            <td class="column7">${obj.rating}</td>
        </tr>
    `)
}

function appendLastAdded() {
    $.get("../handler/getLastAddedBeer.php", function (response) {
        response = response.slice(1, -1)
        var obj = JSON.parse(response)
        addObjectToTable(obj)
    })
}



//Delete Beer

$('#btnDeleteBeer').click(function () {
    event.preventDefault()

    var selectedRadio = getRadioValue()
    if (selectedRadio == 0) {
        alert('Beer radio button must be selected first!')
        return
    }

    request = $.ajax({
        url: "../handler/deleteBeer.php",
        type: "post",
        data: "beerID=" + selectedRadio
    });

    request.done(function (response, textStatus, jqXHR) {
        if (response == "success") {
            alert("Beer successfully deleted!")
            $(`#tr-${selectedRadio}`).remove()

        } else {
            console.log("Failed")
        }
    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.log("Error occured: " + textStatus, errorThrown)
    })


})

function getRadioValue() {
    var buttons = $('#table .radio-btn input')

    for (i = 0; i < buttons.length; i++) {
        if (buttons[i].checked) {
            return buttons[i].value
        }
    }
    return 0
}

//Search


function show() {
    $('#searchByNameField').val('')
    $('#searchByIdField').val('')
    $('#table tbody').empty()

    $.get("../handler/getAllBeers.php", function (data) {
        let array = data.split("}")
        array.pop()
        array.forEach(element => {
            element = element + "}"

            let obj = JSON.parse(element)

            addObjectToTable(obj)
        })
    })
}

$('#btnShowCompleteList').click(function () {
    show()
})

$('#searchByNameField').keyup(function () {
    $('#searchByIdField').val("")
    let val = $(this).val()

    request = $.ajax({
        url: "../handler/getBeersByName.php",
        type: "post",
        data: "name=" + val
    })

    request.done(function (response, textStatus, jqXHR) {
        if (!(response == "failedUserID" || response == 'failedName')) {
            $('#table tbody').empty()
            let array = response.split("}")
            array.pop()
            array.forEach(element => {
                element = element + "}"

                let obj = JSON.parse(element)

                addObjectToTable(obj)
            })
        } else {
            console.log(response);
        }

    })

    request.fail(function (jqXHR, textStatus, errorThrown) {
        alert("Error occured: " + textStatus, errorThrown)
    })

})

$('#searchByIdField').keyup(function () {
    $('#searchByNameField').val("")
    let val = $(this).val()

    if (val == '') {
        show()
        return
    }

    request = $.ajax({
        url: "../handler/getBeerById.php",
        type: "post",
        data: "beerID=" + val
    })

    request.done(function (response, textStatus, jqXHR) {
        if (!(response == "failed" || response == 'userIDnotSet' || response == 'failedBeerID')) {
            $('#table tbody').empty()
            response = response.slice(1, -1)
            var obj = JSON.parse(response)
            addObjectToTable(obj)
        }

    })

})

