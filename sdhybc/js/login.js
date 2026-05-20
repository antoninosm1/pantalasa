document.getElementById("button-login").addEventListener("click", validate);

document.getElementById("modal-login-button-ok").addEventListener("click", closeModal);

// Login data

const user = document.getElementById("input-user");

const pass = document.getElementById("input-pass");

// Modal

const modal = document.getElementById("modal-login");

const modal_title = document.getElementById("modal-login-title");

const modal_description = document.getElementById("modal-login-description");



function validate() {

    if (user.value.length == 0 && pass.value.length == 0) {

        user.style.backgroundColor = 'orchid';

        pass.style.backgroundColor = 'orchid';

        openModal("ERROR DE AUTENTICACIÓN", "Ingresar Usuario y Contraseña.", 5000);

    } else if (user.value.length == 0) {

        user.style.backgroundColor = 'orchid';

        openModal("ERROR DE AUTENTICACIÓN", "Ingresar Usuario.", 5000);

    } else if (pass.value.length == 0) {

        pass.style.backgroundColor = 'orchid';

        openModal("ERROR DE AUTENTICACIÓN", "Ingresar Contraseña.", 5000);

    } else {

        login();

    }

}



function getNowDatetime() {

    const now = new Date();

    const offsetMs = now.getTimezoneOffset() * 60 * 1000;

    const dateLocal = new Date(now.getTime() - offsetMs);

    return dateLocal.toISOString().slice(0, 19).replace(/-/g, "-").replace("T", " ");

}



function login() {

    const formData = new FormData();

    formData.append('user', user.value);

    formData.append('pass', pass.value);

    formData.append('dt', getNowDatetime());

//    fetch("../controller/session/login.php", {
    fetch("controller/session/login.php", {

        body: formData,

        method: "post"

    })

    .then(response => response.json())

    .then(data => userAuth(data))

    .catch(error => openModal("ERROR", error, 5000));

}



function userAuth(answer) {

    if (answer['success'] == true) {

        window.location.replace(answer['url']);

    } else {

        user.style.backgroundColor = 'orchid';

        pass.style.backgroundColor = 'orchid';

        pass.value = '';

        openModal('ERROR DE AUTENTICACIÓN', 

        answer['message'], 

        4000);

    }

}



function openModal(title, description, displayTime) {

    closeModal();

    modal_title.innerHTML = title;

    modal_description.innerHTML = description;

    modal.showModal();

    setTimeout(function() {

        modal.close();

        user.style.backgroundColor = 'white';

        pass.style.backgroundColor = 'white';

    }, displayTime);

}



function closeModal() {

    modal.close();

}

