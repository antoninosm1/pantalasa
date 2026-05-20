const v_techoConcreto = document.getElementById("TechoConcreto");
const v_techoGalvanizada = document.getElementById("TechoGalvanizada");
const v_techoMadera = document.getElementById("TechoMadera");
const v_techoCarton = document.getElementById("TechoCarton");
const v_techoOtro = document.getElementById("TechoOtro");
const v_paredTabique = document.getElementById("ParedTabique");
const v_paredAdobe = document.getElementById("ParedAdobe");
const v_paredBlock = document.getElementById("ParedBlock");
const v_paredMadera = document.getElementById("ParedMadera");
const v_paredPiedra = document.getElementById("ParedPiedra");
const v_paredCarton = document.getElementById("ParedCarton");
const v_pisoCemento = document.getElementById("PisoCemento");
const v_pisoMadera = document.getElementById("PisoMadera");
const v_pisoTierra = document.getElementById("PisoTierra");
const v_pisoPiedra = document.getElementById("PisoPiedra");
const v_agusoPotable = document.getElementById("AgUsoPotable");
const v_agusoNoria = document.getElementById("AgUsoNoria");
const v_agusoRio = document.getElementById("AgUsoRio");
const v_agusoLluvia = document.getElementById("AgUsoLluvia");
const v_agconPotable = document.getElementById("AgConPotable");
const v_agconPurificada = document.getElementById("AgConPurificada");
const v_agconHervida = document.getElementById("AgConHervida");
const v_agconClorada = document.getElementById("AgConClorada");
const v_agconFiltrada = document.getElementById("AgConFiltrada");
const v_excFosa = document.getElementById("ExcFosa");
const v_excLetrina = document.getElementById("ExcLetrina");
const v_excRas = document.getElementById("ExcRas");
const v_combGas = document.getElementById("CombGas");
const v_combCarbon = document.getElementById("CombCarbon");
const v_combLena = document.getElementById("CombLena");
const v_combOtros = document.getElementById("CombOtros");
const v_basuMunicipal = document.getElementById("BasuMunicipal");
const v_basuEnterramiento = document.getElementById("BasuEnterramiento");
const v_basuAbierto = document.getElementById("BasuAbierto");
const v_basuIncineracion = document.getElementById("BasuIncineracion");
const v_alumElectrica = document.getElementById("AlumElectrica");
const v_alumVelas = document.getElementById("AlumVelas");
const v_alumQuinque = document.getElementById("AlumQuinque");
const v_alumPlaca = document.getElementById("AlumPlaca");
const v_Habitaciones = document.getElementById("Habitaciones");
const v_Recamara = document.getElementById("Recamara");
const v_Estancia = document.getElementById("Estancia");
const v_Comedor = document.getElementById("Comedor");
const v_Multiple = document.getElementById("Multiple");
const v_Cocina = document.getElementById("Cocina");

document.getElementById("button-vivienda-siguiente").addEventListener('click', function() {
    validar_vivienda();
});
document.getElementById("button-vivienda-limpiar-campos").addEventListener('click', function() {
    openModalOkCancel("CÉDULA - VIVIENDA", "¿Desea limpiar el contenido de los campos?", "limpiar");
});
document.getElementById("button-vivienda-anterior").addEventListener('click', function() {
    window.location.href ="https://www.sdhybc.org/on/c_cedula.php";
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

document.getElementById('button-vivienda-cancelar-captura').addEventListener('click', function() {
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

function validar_vivienda() {
    if (v_Habitaciones.value == '') {
        v_Habitaciones.value = 0;
    }
    
    let msg = "";
    if (v_techoConcreto.checked == false && v_techoGalvanizada.checked == false && v_techoMadera.checked == false && v_techoCarton.checked == false && v_techoOtro.checked == false) {
        msg += " -Especificar material de TECHO.<br>";
    }
    if (v_paredTabique.checked == false && v_paredAdobe.checked == false && v_paredBlock.checked == false && v_paredMadera.checked == false && v_paredPiedra.checked == false && v_paredCarton.checked == false) {
        msg += " -Especificar material de PAREDES.<br>";
    }
    if (v_pisoCemento.checked == false && v_pisoMadera.checked == false && v_pisoTierra.checked == false && v_pisoPiedra.checked == false) {
        msg += " -Especificar material de PISO.<br>";
    }
    if (v_agusoPotable.checked == false && v_agusoNoria.checked == false && v_agusoRio.checked == false && v_agusoLluvia.checked == false) {
        msg += " -Especificar origen de AGUA DE USO.<br>";
    }
    if (v_agconPotable.checked == false && v_agconPurificada.checked == false && v_agconHervida.checked == false && v_agconClorada.checked == false && v_agconFiltrada.checked == false) {
        msg += " -Especificar origen de AGUA DE CONSUMO.<br>";
    }
    if (v_excFosa.checked == false && v_excLetrina.checked == false && v_excRas.checked == false) {
        msg += " -Especificar disposición de EXCRETA.<br>";
    }
    if (v_combGas.checked == false && v_combCarbon.checked == false && v_combLena.checked == false && v_combOtros.checked == false) {
        msg += " -Especificar tipo de COMBUSTIBLE.<br>";
    }
    if (v_basuMunicipal.checked == false && v_basuEnterramiento.checked == false && v_basuAbierto.checked == false && v_basuIncineracion.checked == false) {
        msg += " -Especificar disposición de BASURA.<br>";
    }
    if (v_alumElectrica.checked == false && v_alumVelas.checked == false && v_alumQuinque.checked == false && v_alumPlaca.checked == false) {
        msg += " -Especificar tipo de ALUMBRADO.<br>";
    }
    if (v_Habitaciones.value == "0") {
        msg += " -Especificar Número de Habitaciones.<br>";
    } else if (v_Habitaciones.value < ((v_Recamara.checked ? 1 : 0) + (v_Estancia.checked ? 1 : 0) + (v_Comedor.checked ? 1 : 0) + (v_Multiple.checked ? 1 : 0) + (v_Cocina.checked ? 1 : 0))) {
        msg += " -Verificar campos de DISTRIBUCIÓN HABITACIONAL.<br>";
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
    formData.append('v_techoConcreto', v_techoConcreto.checked ? 1 : 0);
    formData.append('v_techoGalvanizada', v_techoGalvanizada.checked ? 1 : 0);
    formData.append('v_techoMadera', v_techoMadera.checked ? 1 : 0);
    formData.append('v_techoCarton', v_techoCarton.checked ? 1 : 0);
    formData.append('v_techoOtro', v_techoOtro.checked ? 1 : 0);
    formData.append('v_paredTabique', v_paredTabique.checked ? 1 : 0);
    formData.append('v_paredAdobe', v_paredAdobe.checked ? 1 : 0);
    formData.append('v_paredBlock', v_paredBlock.checked ? 1 : 0);
    formData.append('v_paredMadera', v_paredMadera.checked ? 1 : 0);
    formData.append('v_paredPiedra', v_paredPiedra.checked ? 1 : 0);
    formData.append('v_paredCarton', v_paredCarton.checked ? 1 : 0);
    formData.append('v_pisoCemento', v_pisoCemento.checked ? 1 : 0);
    formData.append('v_pisoMadera', v_pisoMadera.checked ? 1 : 0);
    formData.append('v_pisoTierra', v_pisoTierra.checked ? 1 : 0);
    formData.append('v_pisoPiedra', v_pisoPiedra.checked ? 1 : 0);
    formData.append('v_agusoPotable', v_agusoPotable.checked ? 1 : 0);
    formData.append('v_agusoNoria', v_agusoNoria.checked ? 1 : 0);
    formData.append('v_agusoRio', v_agusoRio.checked ? 1 : 0);
    formData.append('v_agusoLluvia', v_agusoLluvia.checked ? 1 : 0);
    formData.append('v_agconPotable', v_agconPotable.checked ? 1 : 0);
    formData.append('v_agconPurificada', v_agconPurificada.checked ? 1 : 0);
    formData.append('v_agconHervida', v_agconHervida.checked ? 1 : 0);
    formData.append('v_agconClorada', v_agconClorada.checked ? 1 : 0);
    formData.append('v_agconFiltrada', v_agconFiltrada.checked ? 1 : 0);
    formData.append('v_excFosa', v_excFosa.checked ? 1 : 0);
    formData.append('v_excLetrina', v_excLetrina.checked ? 1 : 0);
    formData.append('v_excRas', v_excRas.checked ? 1 : 0);
    formData.append('v_combGas', v_combGas.checked ? 1 : 0);
    formData.append('v_combCarbon', v_combCarbon.checked ? 1 : 0);
    formData.append('v_combLena', v_combLena.checked ? 1 : 0);
    formData.append('v_combOtros', v_combOtros.checked ? 1 : 0);
    formData.append('v_basuMunicipal', v_basuMunicipal.checked ? 1 : 0);
    formData.append('v_basuEnterramiento', v_basuEnterramiento.checked ? 1 : 0);
    formData.append('v_basuAbierto', v_basuAbierto.checked ? 1 : 0);
    formData.append('v_basuIncineracion', v_basuIncineracion.checked ? 1 : 0);
    formData.append('v_alumElectrica', v_alumElectrica.checked ? 1 : 0);
    formData.append('v_alumVelas', v_alumVelas.checked ? 1 : 0);
    formData.append('v_alumQuinque', v_alumQuinque.checked ? 1 : 0);
    formData.append('v_alumPlaca', v_alumPlaca.checked ? 1 : 0);
    formData.append('v_Habitaciones', v_Habitaciones.value);
    formData.append('v_Recamara', v_Recamara.checked ? 1 : 0);
    formData.append('v_Estancia', v_Estancia.checked ? 1 : 0);
    formData.append('v_Comedor', v_Comedor.checked ? 1 : 0);
    formData.append('v_Multiple', v_Multiple.checked ? 1 : 0);
    formData.append('v_Cocina', v_Cocina.checked ? 1 : 0);
    formData.append('fec_reg_viv', getNowDatetime());
    fetch('../controller/capture/vivienda.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => siguiente(data))
    .catch(error => openModalOk("ERROR", error, 5000));    
}

function siguiente(response) {
    if (response['success'] == true) {
        window.location.href ="https://www.sdhybc.org/on/c_general.php";
    } else {
        openModalOk("ERROR", response['message'], 5000);    
    }
}

function showViviendaData() {
}

function limpiar_contenido() {
    v_techoConcreto.checked = false;
    v_techoGalvanizada.checked = false;
    v_techoMadera.checked = false;
    v_techoCarton.checked = false;
    v_techoOtro.checked = false;
    v_paredTabique.checked = false;
    v_paredAdobe.checked = false;
    v_paredBlock.checked = false;
    v_paredMadera.checked = false;
    v_paredPiedra.checked = false;
    v_paredCarton.checked = false;
    v_pisoCemento.checked = false;
    v_pisoMadera.checked = false;
    v_pisoTierra.checked = false;
    v_pisoPiedra.checked = false;
    v_agusoPotable.checked = false;
    v_agusoNoria.checked = false;
    v_agusoRio.checked = false;
    v_agusoLluvia.checked = false;
    v_agconPotable.checked = false;
    v_agconPurificada.checked = false;
    v_agconHervida.checked = false;
    v_agconClorada.checked = false;
    v_agconFiltrada.checked = false;
    v_excFosa.checked = false;
    v_excLetrina.checked = false;
    v_excRas.checked = false;
    v_combGas.checked = false;
    v_combCarbon.checked = false;
    v_combLena.checked = false;
    v_combOtros.checked = false;
    v_basuMunicipal.checked = false;
    v_basuEnterramiento.checked = false;
    v_basuAbierto.checked = false;
    v_basuIncineracion.checked = false;
    v_alumElectrica.checked = false;
    v_alumVelas.checked = false;
    v_alumQuinque.checked = false;
    v_alumPlaca.checked = false;
    v_Habitaciones.value = 0;
    v_Recamara.checked = false;
    v_Estancia.checked = false;
    v_Comedor.checked = false;
    v_Multiple.checked = false;
    v_Cocina.checked = false;
}


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