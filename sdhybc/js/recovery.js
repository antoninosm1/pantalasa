document.getElementById("button-change-pass").addEventListener("click", validate);



const pass1 = document.getElementById("input-pass-1");

const pass2 = document.getElementById("input-pass-2");

// Modal

const modal = document.getElementById("modal-recovery");

const modal_title = document.getElementById("modal-recovery-title");

const modal_description = document.getElementById("modal-recovery-description");

document.getElementById("modal-recovery-button-ok").addEventListener("click", closeModal);





function validate() {

    if (pass1.value != pass2.value) {

        pass1.style.backgroundColor = 'orchid';

        pass2.style.backgroundColor = 'orchid';

        openModal("ERROR DE INGRESO", "Verifique que ambas contraseñas sean iguales.", 5000);

    } else {

        if (pass1.value.length >= 8 && pass1.value.length <= 25) {

            sendNewPassword(pass1.value, pass2.value);

        } else {

            pass1.style.backgroundColor = 'orchid';

            pass2.style.backgroundColor = 'orchid';

            openModal("ERROR DE INGRESO", "La contraseña debe tener entre 8 y 50 caracteres.", 5000);

        }

    }

}



function sendNewPassword(p1, p2) {

    const formData = new FormData

    formData.append("p1", p1);

    formData.append("p2", p2);

    fetch("controller/session/recover_pass.php", {

        body: formData,

        method: "post"

    })

    .then(response => response.json())

    .then(data => verifyData(data))

    .catch(error => verifyData(error))

}



function verifyData(data) {

    if (data['success'] == true) {

        window.location.replace(data['url']);

    } else {

        openModal("ERROR", data['message'], 4000);

    }

}



function openModal(title, description, displayTime) {

    closeModal();

    modal_title.innerHTML = title;

    modal_description.innerHTML = description;

    modal.showModal();

    setTimeout(function() {

        modal.close();

        pass1.style.backgroundColor = 'white';

        pass2.style.backgroundColor = 'white';

    }, displayTime);

}



function closeModal() {

    modal.close();

}

