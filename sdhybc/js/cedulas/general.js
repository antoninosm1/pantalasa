const g_PueIndTarahumara = document.getElementById('PueIndTarahumara');
const g_PueIndTepehuan = document.getElementById('PueIndTepehuan');
const g_PueIndWuarojio = document.getElementById('PueIndWuarojio');
const g_PueIndPima = document.getElementById('PueIndPima');
const g_PueIndMenonita = document.getElementById('PueIndMenonita');
const g_PueIndOtro = document.getElementById('PueIndOtro');
const g_DereINSABI = document.getElementById('DereINSABI');
const g_DereIMSS = document.getElementById('DereIMSS');
const g_DereISSSTE = document.getElementById('DereISSSTE');
const g_DerePEMEX = document.getElementById('DerePEMEX');
const g_DereSEDENA = document.getElementById('DereSEDENA');
const g_DereOtro = document.getElementById('DereOtro');
const g_MascotasPerros = document.getElementById('MascotasPerros');
const g_MascotasGatos = document.getElementById('MascotasGatos');
const g_MascotasOtros = document.getElementById('MascotasOtros');
const g_SiSalINSABI = document.getElementById('SiSalINSABI');
const g_SiSalIMSS = document.getElementById('SiSalIMSS');
const g_SiSalISSSTE = document.getElementById('SiSalISSSTE');
const g_SiSalPEMEX = document.getElementById('SiSalPEMEX');
const g_SiSalSEDENA = document.getElementById('SiSalSEDENA');
const g_SiSalOtro = document.getElementById('SiSalOtro');
const g_SiSalMedico = document.getElementById('SiSalMedico');
const g_SiSalClinica = document.getElementById('SiSalClinica');
const g_SiSalPartera = document.getElementById('SiSalPartera');
const g_SiSalCurandera = document.getElementById('SiSalCurandera');
const g_SiSalYerbero = document.getElementById('SiSalYerbero');
const g_SiSalHuesero = document.getElementById('SiSalHuesero');
const g_SiSalBoticario = document.getElementById('SiSalBoticario');
const g_Comentario = document.getElementById('Comentario');

document.getElementById('button-general-siguiente').addEventListener('click', function() {
    validar_general();
});
document.getElementById('button-general-limpiar-campos').addEventListener('click', function() {
    openModalOkCancel("CÉDULA - GENERAL", "¿Desea limpiar el contenido de los campos?", "limpiar");
});
document.getElementById('button-general-anterior').addEventListener('click', function() {
    window.location.href ="https://www.sdhybc.org/on/c_vivienda.php";
});

function getNowDatetime() {
    const now = new Date();
    const offsetMs = now.getTimezoneOffset() * 60 * 1000;
    const dateLocal = new Date(now.getTime() - offsetMs);
    return dateLocal.toISOString().slice(0, 19).replace(/-/g, "-").replace("T", " ");
}

// Modals
const modal_o = document.getElementById("modal-o");
const modal_o_title = document.getElementById("modal-o-title");
const modal_o_description = document.getElementById("modal-o-description");
document.getElementById("modal-o-button-ok").addEventListener('click', function() {
    closeModalOk();
})

var modal_oc_var = "";

const modal_oc = document.getElementById("modal-oc");
const modal_oc_title = document.getElementById("modal-oc-title");
const modal_oc_description = document.getElementById("modal-oc-description");
document.getElementById("modal-oc-button-ok").addEventListener('click', function() {
    switch(modal_oc_var) {
        case 'limpiar':
            limpiar_contenido();
            modal_oc_var = "";
            break;
        case 'enviar':
            enviar_datos();
            modal_oc_var = "";
            break;
        case 'cancelar':
            cancelar_captura();
            modal_oc_var = "";
            break;
        default:
            //nothing
    }
    closeModalOkCancel();
})
document.getElementById("modal-oc-button-cancel").addEventListener('click', function() {
    closeModalOkCancel();
})

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

function openModalOkCancel(title, description, action) {
    modal_oc_title.innerHTML = title;
    modal_oc_description.innerHTML = description;
    modal_oc_var = action;
    modal_oc.showModal();
}

function closeModalOkCancel() {
    modal_oc_var = "";
    modal_oc.close();
}

document.getElementById('button-general-cancelar-captura').addEventListener('click', function() {
    openModalOkCancel("CANCELAR CAPTURA", "¿Desea cancelar la captura actual?", "cancelar");
})

function cancelar_captura() {
    fetch("../../controller/capture/cancelar.php", {
        method: "post"
    })
    .then(response => response.json())
    .then(data => cancelado(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function cancelado(data) {
    if (data['success']) {
        window.location.href ="https://www.sdhybc.org/home.php";
    }
}

//

function validar_general() {
    if (g_MascotasPerros.value == '') {
        g_MascotasPerros.value = 0;
    }
    if (g_MascotasGatos.value == '') {
        g_MascotasGatos.value = 0;
    }
    if (g_MascotasOtros.value == '') {
        g_MascotasOtros.value = 0;
    }
    
    let msg = "";
    if (g_PueIndTarahumara.checked == false && g_PueIndTepehuan.checked == false && g_PueIndWuarojio.checked == false && g_PueIndPima.checked == false && g_PueIndMenonita.checked == false && g_PueIndOtro.checked == false) {
        msg += " -Especificar PUEBLO INDIGENA.<br>";
    }
    if (g_DereINSABI.checked == false && g_DereIMSS.checked == false && g_DereISSSTE.checked == false && g_DerePEMEX.checked == false && g_DereSEDENA.checked == false && g_DereOtro.checked == false) {
        msg += " -Especificar DERECHOHABIENCIA.<br>";
    }
    if (g_SiSalINSABI.checked == false && g_SiSalIMSS.checked == false && g_SiSalISSSTE.checked == false && g_SiSalPEMEX.checked == false && g_SiSalSEDENA.checked == false && g_SiSalOtro.checked == false && g_SiSalMedico.checked == false && g_SiSalClinica.checked == false && g_SiSalPartera.checked == false && g_SiSalCurandera.checked == false && g_SiSalYerbero.checked == false && g_SiSalHuesero.checked == false && g_SiSalBoticario.checked == false) {
        msg += " -Especificar material de SISTEMA DE SALUD.<br>";
    }

    if (msg != "") {
        msg = msg + "<br><b>¿Desear guardar?</b>";
        openModalOkCancel("ERROR DE CAPTURA", msg, "enviar");
    } else {
        enviar_datos();
    }
}

function enviar_datos() {
    const formData = new FormData();
    formData.append('g_PueIndTarahumara', g_PueIndTarahumara.checked ? 1 : 0);
    formData.append('g_PueIndTepehuan', g_PueIndTepehuan.checked ? 1 : 0);
    formData.append('g_PueIndWuarojio', g_PueIndWuarojio.checked ? 1 : 0);
    formData.append('g_PueIndPima', g_PueIndPima.checked ? 1 : 0);
    formData.append('g_PueIndMenonita', g_PueIndMenonita.checked ? 1 : 0);
    formData.append('g_PueIndOtro', g_PueIndOtro.checked ? 1 : 0);
    formData.append('g_DereINSABI', g_DereINSABI.checked ? 1 : 0);
    formData.append('g_DereIMSS', g_DereIMSS.checked ? 1 : 0);
    formData.append('g_DereISSSTE', g_DereISSSTE.checked ? 1 : 0);
    formData.append('g_DerePEMEX', g_DerePEMEX.checked ? 1 : 0);
    formData.append('g_DereSEDENA', g_DereSEDENA.checked ? 1 : 0);
    formData.append('g_DereOtro', g_DereOtro.checked ? 1 : 0);
    formData.append('g_MascotasPerros', g_MascotasPerros.value);
    formData.append('g_MascotasGatos', g_MascotasGatos.value);
    formData.append('g_MascotasOtros', g_MascotasOtros.value);
    formData.append('g_SiSalINSABI', g_SiSalINSABI.checked ? 1 : 0);
    formData.append('g_SiSalIMSS', g_SiSalIMSS.checked ? 1 : 0);
    formData.append('g_SiSalISSSTE', g_SiSalISSSTE.checked ? 1 : 0);
    formData.append('g_SiSalPEMEX', g_SiSalPEMEX.checked ? 1 : 0);
    formData.append('g_SiSalSEDENA', g_SiSalSEDENA.checked ? 1 : 0);
    formData.append('g_SiSalOtro', g_SiSalOtro.checked ? 1 : 0);
    formData.append('g_SiSalMedico', g_SiSalMedico.checked ? 1 : 0);
    formData.append('g_SiSalClinica', g_SiSalClinica.checked ? 1 : 0);
    formData.append('g_SiSalPartera', g_SiSalPartera.checked ? 1 : 0);
    formData.append('g_SiSalCurandera', g_SiSalCurandera.checked ? 1 : 0);
    formData.append('g_SiSalYerbero', g_SiSalYerbero.checked ? 1 : 0);
    formData.append('g_SiSalHuesero', g_SiSalHuesero.checked ? 1 : 0);
    formData.append('g_SiSalBoticario', g_SiSalBoticario.checked ? 1 : 0);
    formData.append('g_Comentario', g_Comentario.value);
    formData.append('fec_reg_gen', getNowDatetime());
    fetch('../controller/capture/general.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => siguiente(data))
    .catch(error => openModalOk("ERROR", error, 5000));    
}

function siguiente(response) {
    if (response['success'] == true) {
        window.location.href ="https://www.sdhybc.org/on/c_familia.php";
    } else {
        openModalOk("ERROR", response['message'], 5000);    
    }
}

function showGeneralData() {
}

function limpiar_contenido() {
    g_PueIndTarahumara.checked =  false;
    g_PueIndTepehuan.checked =  false;
    g_PueIndWuarojio.checked =  false;
    g_PueIndPima.checked =  false;
    g_PueIndMenonita.checked =  false;
    g_PueIndOtro.checked =  false;
    g_DereINSABI.checked =  false;
    g_DereIMSS.checked =  false;
    g_DereISSSTE.checked =  false;
    g_DerePEMEX.checked =  false;
    g_DereSEDENA.checked =  false;
    g_DereOtro.checked =  false;
    g_MascotasPerros.value =  0;
    g_MascotasGatos.value =  0;
    g_MascotasOtros.value =  0;
    g_SiSalINSABI.checked =  false;
    g_SiSalIMSS.checked =  false;
    g_SiSalISSSTE.checked =  false;
    g_SiSalPEMEX.checked =  false;
    g_SiSalSEDENA.checked =  false;
    g_SiSalOtro.checked =  false;
    g_SiSalMedico.checked =  false;
    g_SiSalClinica.checked =  false;
    g_SiSalPartera.checked =  false;
    g_SiSalCurandera.checked =  false;
    g_SiSalYerbero.checked =  false;
    g_SiSalHuesero.checked =  false;
    g_SiSalBoticario.checked =  false;
    g_Comentario.value =  "";
}
