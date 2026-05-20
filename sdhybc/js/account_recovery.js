document.getElementById("button-recovery").addEventListener("click", validate);

document.getElementById("modal-account-button-ok").addEventListener("click", closeModal);

// Recovery data

const user = document.getElementById("input-user");

// Modal

const modal = document.getElementById("modal-account");

const modal_title = document.getElementById("modal-account-title");

const modal_description = document.getElementById("modal-account-description");



function validate() {

    if (user.value.length == 0) {

        user.style.backgroundColor = 'orchid';

        openModal("ERROR DE INGRESO", "Especifique el USUARIO.", 5000);

    } else {

        openModal("VALIDANDO", "Solicitud en proceso.", 5000);

        accountRecovery();

    }

}



function accountRecovery() {

    const formData = new FormData();

    formData.append("user", user.value);

    fetch("controller/session/token.php", {

        body: formData,

        method: "post"

    })

    .then(response => response.json())

    .then(data => verifyData(data))

    .catch(error => openModal("ERROR", error, 5000));

}



function verifyData(data) {

    if (data['success'] == true) {

        openModal('SOLICITUD PROCESADA', data['message'], 5000);

    } else {

        openModal('ERROR', data['message'], 5000);

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

    }, displayTime);

}



function closeModal() {

    modal.close();

}

