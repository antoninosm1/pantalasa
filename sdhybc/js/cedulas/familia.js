const f_Apellido1 = document.getElementById('Apellido1');
const f_Apellido2 = document.getElementById('Apellido2');
const f_Nombres = document.getElementById('Nombres');
const f_Nacimiento = document.getElementById('Nacimiento');
const f_Edad = document.getElementById('Edad');
const f_DIhombre = document.getElementById('DIhombre');
const f_DImujer = document.getElementById('DImujer');
const f_DInd = document.getElementById('DInd');
const f_EstadoOrigen = document.getElementById('EstadoNacimiento');
const f_LenguaMaterna = document.getElementById('LenguaMaterna');
const f_EstadoCivil = document.getElementById('EstadoCivil');
const f_Parentesco = document.getElementById('Parentesco');
const f_Escolaridad = document.getElementById('Escolaridad');
const f_Ocupacion = document.getElementById('Ocupacion');
const f_Ingresos = document.getElementById('Ingresos');
const f_PADpapan = document.getElementById('PADpapan');
const f_PADhiper = document.getElementById('PADhiper');
const f_PADdiab = document.getElementById('PADdiab');
const f_PADtube = document.getElementById('PADtube');
const f_PADalco = document.getElementById('PADalco');
const f_PADtaba = document.getElementById('PADtaba');
const f_PADcanc = document.getElementById('PADcanc');
const f_PLAdiu = document.getElementById('PLAdiu');
const f_PLAora = document.getElementById('PLAora');
const f_PLApre = document.getElementById('PLApre');
const f_PLAinm = document.getElementById('PLAinm');
const f_PLAinb = document.getElementById('PLAinb');
const f_PLAsal = document.getElementById('PLAsal');
const f_PLAimp = document.getElementById('PLAimp');
const f_input_embarazada_si = document.getElementById('input-embarazada-si');
const f_input_embarazada_en_control = document.getElementById('input-embarazada-en-control');
const f_input_embarazada_nd = document.getElementById('input-embarazada-nd');
const f_BaCaRo = document.getElementById('BaCaRo');
const f_LavaDi = document.getElementById('LavaDi');
const f_LimVi = document.getElementById('LimVi');
const f_BeAl = document.getElementById('BeAl');
const f_Tabaco = document.getElementById('Tabaco');
const f_Medic = document.getElementById('Medic');
const f_Drogas = document.getElementById('Drogas');

const f_select_integrantes = document.getElementById('select-integrantes');

f_DIhombre.addEventListener('change', function() {
    f_input_embarazada_nd.checked = true;
});

document.getElementById('button-integrante-agregar').addEventListener('click', function() {
    validar_integrante();
});
document.getElementById('button-integrante-copiar').addEventListener('click', function() {
    if (f_select_integrantes.selectedIndex > -1) {
        integrante_copiar();
    }
});
document.getElementById('button-integrante-modificar').addEventListener('click', function() {
    if (f_select_integrantes.selectedIndex > -1) {
        openModalOkCancel("CÉDULA - FAMILIA", "¿Desea modificar los datos del integrante seleccionado?", "integrante-editar");
    }
    
});
document.getElementById('button-integrante-eliminar').addEventListener('click', function() {
    if (f_select_integrantes.selectedIndex > -1) {
        openModalOkCancel("CÉDULA - FAMILIA", "¿Desea eliminar los datos del integrante seleccionado?", "integrante-eliminar");
    }
});

document.getElementById('button-folio-guardar').addEventListener('click', function() {
    if (f_select_integrantes.length == 0) {
        openModalOkCancel("CÉDULA - FAMILIA", "No hay integrantes ¿Desea guardar y continuar?", "folio-guardar");
    } else {
        folio_guardar();
    }
});

function folio_guardar() {
    fetch('../controller/capture/familia.php', {
        method: 'post'
    })
    .then(response => response.json())
    .then(data => siguiente(data))
    .catch(error => openModalOk("ERROR", error, 5000)); 
}

document.getElementById('button-familia-limpiar-campos').addEventListener('click', function() {
    openModalOkCancel("CÉDULA - FAMILIA", "¿Desea limpiar el contenido de los campos?", "limpiar");
});
document.getElementById('button-familia-anterior');

function siguiente(response) {
    if (response['success'] == true) {
        window.location.href ="https://www.sdhybc.org/on/c_cedula.php";
    } else {
        openModalOk("ERROR", response['message'], 5000);    
    }
}

function validar_integrante() {
    if (f_Edad.value == '') {
        f_Edad.value = 0;
    }

    let msg = "";
    if (f_Apellido1.value == "") {
        msg += " -Especificar PRIMER APELLIDO.<br>";
    }
    if (f_Apellido2.value == "") {
        msg += " -Especificar SEGUNDO APELLIDO.<br>";
    }
    if (f_Nombres.value == "") {
        msg += " -Especificar NOMBRE.<br>";
    }
    if (f_Nacimiento.value == "") {
        msg += " -Especificar FECHA DE NACIMIENTO.<br>";
    }
    let d1 = new Date(getNowDatetime());
    let d2 = new Date(f_Nacimiento.value);
    if (f_Edad.value == "0" && Math.ceil((d1 - d2) / (1000 * 60 * 60 * 24 * 365)) > 0) {
        msg += " -Especificar EDAD.<br>";
    }
    if (f_DInd.checked == true) {
        msg += " -Especificar GENERO.<br>";
    }
    if (f_EstadoOrigen.value == 'ND') {
        msg += " -Especificar ESTADO EN DONDE NACE.<br>";
    }
    if (f_LenguaMaterna.value == 'ND') {
        msg += " -Especificar LENGUA MATERNA.<br>";
    }
    if (f_EstadoCivil.value == 'ND') {
        msg += " -Especificar ESTADO CIVIL.<br>";
    }
    if (f_Parentesco.value == 'ND') {
        msg += " -Especificar PARENTESCO.<br>";
    }
    if (f_Escolaridad.value == 'ND') {
        msg += " -Especificar ESCOLARIDAD.<br>";
    }
    if (f_Ocupacion.value == 'ND') {
        msg += " -Especificar OCUPACIÓN.<br>";
    }
    if (f_Ingresos.value == 'ND') {
        msg += " -Especificar INGRESOS.<br>";
    }
    if (f_DIhombre.checked == true && f_input_embarazada_nd.checked == false) {
        msg += " -Genero Masculino y en Embarazo.<br>";
    }
    if (f_BaCaRo.value == 'ND') {
        msg += " -Especificar BAÑO Y CAMBIO DE ROPA.<br>";
    }
    if (f_LavaDi.value == 'ND') {
        msg += " -Especificar LAVADO DE DIENTES.<br>";
    }
    if (f_LimVi.value == 'ND') {
        msg += " -Especificar LIMPIEZA DE VIVIENDA.<br>";
    }
    if (f_BeAl.value == 'ND') {
        msg += " -Especificar BEBIDAS ALCOHOLICAS.<br>";
    }
    if (f_Tabaco.value == 'ND') {
        msg += " -Especificar TABACO.<br>";
    }
    if (f_Medic.value == 'ND') {
        msg += " -Especificar MEDICAMENTOS.<br>";
    }
    if (f_Drogas.value == 'ND') {
        msg += " -Especificar DROGAS.<br>";
    }

    if (msg != "") {
        msg = msg + "<br><b>¿Desear guardar?</b>";
        openModalOkCancel("ERROR DE CAPTURA", msg, "enviar");
    } else {
        enviar_datos();
    }
}

function f_genero() {
    return document.querySelector('input[name="DIgenero"]:checked').value;
}

function f_embarazada() {
    return document.querySelector('input[name="input-embarazada"]:checked').value;
}

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
        case 'integrante-editar':
            integrante_editar();
            modal_oc_var = "";
            break;
        case 'integrante-eliminar':
            integrante_eliminar();
            modal_oc_var = "";
            break;
        case 'enviar':
            enviar_datos();
            modal_oc_var = "";
            break;
        case 'folio-guardar':
            folio_guardar();
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


document.getElementById('button-familia-cancelar-captura').addEventListener('click', function() {
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
document.getElementById("button-familia-anterior").addEventListener('click', function() {
    window.location.href ="https://www.sdhybc.org/on/c_general.php";
});

function enviar_datos() {
    const formData = new FormData();
    formData.append('f_NumInt', f_select_integrantes.length + 1);
    formData.append('f_Apellido1', f_Apellido1.value);
    formData.append('f_Apellido2', f_Apellido2.value);
    formData.append('f_Nombres', f_Nombres.value);
    formData.append('f_Nacimiento', f_Nacimiento.value);
    formData.append('f_Edad', f_Edad.value);
    formData.append('f_Genero', f_genero());
    formData.append('f_EstadoOrigen', f_EstadoOrigen.value);
    formData.append('f_LenguaMaterna', f_LenguaMaterna.value);
    formData.append('f_EstadoCivil', f_EstadoCivil.value);
    formData.append('f_Parentesco', f_Parentesco.value);
    formData.append('f_Escolaridad', f_Escolaridad.value);
    formData.append('f_Ocupacion', f_Ocupacion.value);
    formData.append('f_Ingresos', f_Ingresos.value);
    formData.append('f_PADpapan', f_PADpapan.checked ? 1 : 0);
    formData.append('f_PADhiper', f_PADhiper.checked ? 1 : 0);
    formData.append('f_PADdiab', f_PADdiab.checked ? 1 : 0);
    formData.append('f_PADtube', f_PADtube.checked ? 1 : 0);
    formData.append('f_PADalco', f_PADalco.checked ? 1 : 0);
    formData.append('f_PADtaba', f_PADtaba.checked ? 1 : 0);
    formData.append('f_PADcanc', f_PADcanc.checked ? 1 : 0);
    formData.append('f_PLAdiu', f_PLAdiu.checked ? 1 : 0);
    formData.append('f_PLAora', f_PLAora.checked ? 1 : 0);
    formData.append('f_PLApre', f_PLApre.checked ? 1 : 0);
    formData.append('f_PLAinm', f_PLAinm.checked ? 1 : 0);
    formData.append('f_PLAinb', f_PLAinb.checked ? 1 : 0);
    formData.append('f_PLAsal', f_PLAsal.checked ? 1 : 0);
    formData.append('f_PLAimp', f_PLAimp.checked ? 1 : 0);
    formData.append('f_Embarazada', f_embarazada());
    formData.append('f_BaCaRo', f_BaCaRo.value);
    formData.append('f_LavaDi', f_LavaDi.value);
    formData.append('f_LimVi', f_LimVi.value);
    formData.append('f_BeAl', f_BeAl.value);
    formData.append('f_Tabaco', f_Tabaco.value);
    formData.append('f_Medic', f_Medic.value);
    formData.append('f_Drogas', f_Drogas.value);
    formData.append('fec_reg_int', getNowDatetime());

    fetch('../controller/capture/integrante_agregar.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => integrante_agregado(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function integrante_agregado(response) {
    if (response['success'] == true) {
        var opt = document.createElement('option');
        opt.value = response['id'];
        opt.innerHTML = response['name'];
        f_select_integrantes.appendChild(opt);
        limpiar_contenido();
        openModalOk("CÉDULA - FAMILIA", 'Integrante "' + response['name'] + '", agregado exitosamente.', 3000);
    } else {
        openModalOk("ERROR", response['message'], 5000);    
    }
}

function showGeneralData() {
}

function limpiar_contenido() {
    f_Apellido1.value = "";
    f_Apellido2.value = "";
    f_Nombres.value = "";
    f_Nacimiento.value = "";
    f_Edad.value = "";
    f_DIhombre.checked = false;
    f_DImujer.checked = false;
    f_DInd.checked = true;
    f_EstadoOrigen.selectedIndex = 0;
    f_LenguaMaterna.selectedIndex = 0;
    f_EstadoCivil.selectedIndex = 0;
    f_Parentesco.selectedIndex = 0;
    f_Escolaridad.selectedIndex = 0;
    f_Ocupacion.selectedIndex = 0;
    f_Ingresos.selectedIndex = 0;
    f_PADpapan.checked = false;
    f_PADhiper.checked = false;
    f_PADdiab.checked = false;
    f_PADtube.checked = false;
    f_PADalco.checked = false;
    f_PADtaba.checked = false;
    f_PADcanc.checked = false;
    f_PLAdiu.checked = false;
    f_PLAora.checked = false;
    f_PLApre.checked = false;
    f_PLAinm.checked = false;
    f_PLAinb.checked = false;
    f_PLAsal.checked = false;
    f_PLAimp.checked = false;
    f_input_embarazada_si.checked = false;
    f_input_embarazada_en_control.checked = false;
    f_input_embarazada_nd.checked = true;
    f_BaCaRo.selectedIndex = 0;
    f_LavaDi.selectedIndex = 0;
    f_LimVi.selectedIndex = 0;
    f_BeAl.selectedIndex = 0;
    f_Tabaco.selectedIndex = 0;
    f_Medic.selectedIndex = 0;
    f_Drogas.selectedIndex = 0;
}

function integrante_copiar() {
    integrante_obtener_datos(false);
}

function integrante_editar() {
    integrante_obtener_datos(true);
    let i = f_select_integrantes.selectedIndex;
    f_select_integrantes.selectedIndex = -1;
    f_select_integrantes.remove(i);
}

function integrante_eliminar() {
    const formData = new FormData();
    formData.append('integranteId', f_select_integrantes.value);
    fetch('../controller/capture/integrante_eliminar.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => integrante_eliminado(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function integrante_obtener_datos(delete_record) {
    const formData = new FormData();
    formData.append('integranteId', f_select_integrantes.value);
    formData.append('borrar', delete_record);
    fetch('../controller/capture/integrante_obtener.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => integrante_datos(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function integrante_datos(response) {
    f_Apellido1.value = response['Apelli1'];
    f_Apellido2.value = response['Apelli2'];
    f_Nombres.value = response['Nombres'];
    f_Nacimiento.value = response['FecNac'].split(" ")[0];
    f_Edad.value = response['Edad'];
    f_DIhombre.checked = response['Genero'] == "Hombre" ? true : false;
    f_DImujer.checked = response['Genero'] == "Mujer" ? true : false;
    f_DInd.checked = response['Genero'] == "ND" ? true : false;
    f_EstadoOrigen.value = response['EstOrig'];
    f_LenguaMaterna.value = response['LenMat'];
    f_EstadoCivil.value = response['EstCiv'];
    f_Parentesco.value = response['Parente'];
    f_Escolaridad.value = response['Escola'];
    f_Ocupacion.value = response['Ocupa'];
    f_Ingresos.value = response['Ingres'];
    f_PADpapan.checked = response['Papani'] == 1 ? true : false;
    f_PADhiper.checked = response['Hipert'] == 1 ? true : false;
    f_PADdiab.checked = response['Diabet'] == 1 ? true : false;
    f_PADtube.checked = response['Tuberc'] == 1 ? true : false;
    f_PADalco.checked = response['Alcoho'] == 1 ? true : false;
    f_PADtaba.checked = response['Tabaqu'] == 1 ? true : false;
    f_PADcanc.checked = response['Cancer'] == 1 ? true : false;
    f_PLAdiu.checked = response['Diu'] == 1 ? true : false;
    f_PLAora.checked = response['Orales'] == 1 ? true : false;
    f_PLApre.checked = response['Preser'] == 1 ? true : false;
    f_PLAinm.checked = response['InyMens'] == 1 ? true : false;
    f_PLAinb.checked = response['InyBien'] == 1 ? true : false;
    f_PLAsal.checked = response['Salping'] == 1 ? true : false;
    f_PLAimp.checked = response['Implant'] == 1 ? true : false;
    f_input_embarazada_si.checked = response['Embaraz'] == "Sí" ? true : false;
    f_input_embarazada_en_control.checked = response['Embaraz'] == "En Control" ? true : false;
    f_input_embarazada_nd.checked = response['Embaraz'] == "ND" ? true : false;
    f_BaCaRo.value = response['Bacamro'];
    f_LavaDi.value = response['LavDien'];
    f_LimVi.value = response['LimVivi'];
    f_BeAl.value = response['BebAlco'];
    f_Tabaco.value = response['Tabaco'];
    f_Medic.value = response['Medica'];
    f_Drogas.value = response['Drogas'];
}

function integrante_eliminado(response) {
    if (response['success'] == true) {
        let i = f_select_integrantes.selectedIndex;
        f_select_integrantes.selectedIndex = -1;
        f_select_integrantes.remove(i);
        openModalOk("CÉDULA - FAMILIA", "Integrante eliminado exitosamente.", 3000);
    }
}

function init() {
    fetch('../controller/capture/integrantes_obtener.php', {
        method: 'post'
    })
    .then(response => response.json())
    .then(data => integrantes(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function integrantes(response) {
    if (response['success'] == true) {
        for (i = 0; i < response['integrantes'].length; i++){
            var opt = document.createElement('option');
            opt.value = response['integrantes'][i]['id']
            opt.innerHTML = response['integrantes'][i]['nombre'];
            f_select_integrantes.appendChild(opt);
        }
    }
}

f_Nacimiento.addEventListener('change', function(){
    f_Edad.value = getAge(f_Nacimiento.value);
});

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

init();