
const username = document.getElementById('account-input-name');
const lastname1 = document.getElementById('account-input-lastname1');
const lastname2 = document.getElementById('account-input-lastname2');
const email = document.getElementById('account-input-email');
const pass1 = document.getElementById('account-input-pass1');
const pass2 = document.getElementById('account-input-pass2');

document.getElementById('button-account-update').addEventListener('click', change_data);

document.getElementById('button-account-pass').addEventListener('click', change_pass);

function change_data() {
    if (username.value == "") {
        openModalOk("ERROR", "Nombre de usuario vacío", 5000);
    } else if (lastname1.value == "") {
        openModalOk("ERROR", "Primer apellido vacío", 5000);
    } else if (lastname2.value == "") {
        openModalOk("ERROR", "Segundo apellido vacío", 5000);
    } else if (email.value == "") {
        openModalOk("ERROR", "Correo electrónico vacío", 5000);
    } else {
        const formData = new FormData();
        formData.append('home', 'account-update');
        formData.append('username', username.value);
        formData.append('lastname1', lastname1.value);
        formData.append('lastname2', lastname2.value);
        formData.append('email', email.value);
        fetch('../../controller/home/my_account.php', {
            body: formData,
            method: 'post'
        })
        .then(response => response.json())
        .then(data => openModalOk(data['title'], data['message'], 5000))
        .catch(error => openModalOk("ERROR", error, 5000));
    }
}

function change_pass() {
    if (pass1.value == "") {
        openModalOk("ERROR", "Ingresar contraseña", 5000);
    } else if (pass2.value == "") {
        openModalOk("ERROR", "Confirmar contraseña", 5000);
    } else if (pass1.value != pass2.value) {
        openModalOk("ERROR", "Las contraseñas ingresadas son diferentes", 5000);
    } else if (pass1.value.length < 8 || pass1.value.length > 25) {
        openModalOk("ERROR", "La contraseña debe tener entre 8 y 25 caracteres", 5000);
    } else {
        const formData = new FormData();
        formData.append('home', 'password-update');
        formData.append('pass1', pass1.value);
        formData.append('pass2', pass2.value);
        fetch('../../controller/home/my_account.php', {
            body: formData,
            method: 'post'
        })
        .then(response => response.json())
        .then(data => changed_pass(data))
        .catch(error => openModalOk("ERROR", error, 5000));
    }
}

function changed_pass(data) {
    if (data['success'] == true) {
        pass1.value = '';
        pass2.value = '';
    }
    openModalOk(data['title'], data['message'], 5000)
}

// Modals
const modal_o = document.getElementById("modal-o");
const modal_o_title = document.getElementById("modal-o-title");
const modal_o_description = document.getElementById("modal-o-description");
document.getElementById("modal-o-button-ok").addEventListener('click', function() {
    closeModalOk();
});

function openModalOk(title, description, displayTime) {
    modal_o_title.innerHTML = title;
    modal_o_description.innerHTML = description;
    modal_o.showModal();
    setTimeout(function() {
        modal_o.close();
    }, displayTime);
}

function closeModalOk() {
    modal_o.close();
}