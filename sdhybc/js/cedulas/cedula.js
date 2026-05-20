
const municipios = JSON.parse('{"municipios":[{"numero":"001", "nombre":"Ahumada"},{"numero":"002", "nombre":"Aldama"},{"numero":"003", "nombre":"Allende"},{"numero":"004",' +
' "nombre":"Aquiles Serdán"},{"numero":"005", "nombre":"Ascensión"},{"numero":"006", "nombre":"Bachíniva"},{"numero":"007",' +
' "nombre":"Balleza"},{"numero":"008", "nombre":"Batopilas de Manuel Gómez Morín"},{"numero":"009", "nombre":"Bocoyna"},{"numero":"010",' +
' "nombre":"Buenaventura"},{"numero":"011", "nombre":"Camargo"},{"numero":"012", "nombre":"Carichí"},{"numero":"013", "nombre":"Casas' +
' Grandes"},{"numero":"014", "nombre":"Coronado"},{"numero":"015", "nombre":"Coyame del Sotol"},{"numero":"016", "nombre":"La Cruz"},{"numero":"017",' +
' "nombre":"Cuauhtémoc"},{"numero":"018", "nombre":"Cusihuiriachi"},{"numero":"019", "nombre":"Chihuahua"},{"numero":"020",' +
' "nombre":"Chínipas"},{"numero":"021", "nombre":"Delicias"},{"numero":"022", "nombre":"Dr. Belisario Domínguez"},{"numero":"023",' +
' "nombre":"Galeana"},{"numero":"024", "nombre":"Santa Isabel"},{"numero":"025", "nombre":"Gómez Farías"},{"numero":"026", "nombre":"Gran' +
' Morelos"},{"numero":"027", "nombre":"Guachochi"},{"numero":"028", "nombre":"Guadalupe"},{"numero":"029", "nombre":"Guadalupe y Calvo"},{"numero":"030",' +
' "nombre":"Guazapares"},{"numero":"031", "nombre":"Guerrero"},{"numero":"032", "nombre":"Hidalgo del Parral"},{"numero":"033",' +
' "nombre":"Huejotitán"},{"numero":"034", "nombre":"Ignacio Zaragoza"},{"numero":"035", "nombre":"Janos"},{"numero":"036",' +
' "nombre":"Jiménez"},{"numero":"037", "nombre":"Juárez"},{"numero":"038", "nombre":"Julimes"},{"numero":"039", "nombre":"López"},{"numero":"040",' +
' "nombre":"Madera"},{"numero":"041", "nombre":"Maguarichi"},{"numero":"042", "nombre":"Manuel Benavides"},{"numero":"043",' +
' "nombre":"Matachí"},{"numero":"044", "nombre":"Matamoros"},{"numero":"045", "nombre":"Meoqui"},{"numero":"046", "nombre":"Morelos"},{"numero":"047",' +
' "nombre":"Moris"},{"numero":"048", "nombre":"Namiquipa"},{"numero":"049", "nombre":"Nonoava"},{"numero":"050", "nombre":"Nuevo Casas' +
' Grandes"},{"numero":"051", "nombre":"Ocampo"},{"numero":"052", "nombre":"Ojinaga"},{"numero":"053", "nombre":"Praxedis G. Guerrero"},{"numero":"054",' +
' "nombre":"Riva Palacio"},{"numero":"055", "nombre":"Rosales"},{"numero":"056", "nombre":"Rosario"},{"numero":"057", "nombre":"San Francisco de' +
' Borja"},{"numero":"058", "nombre":"San Francisco de Conchos"},{"numero":"059", "nombre":"San Francisco del Oro"},{"numero":"060", "nombre":"Santa' +
' Bárbara"},{"numero":"061", "nombre":"Satevó"},{"numero":"062", "nombre":"Saucillo"},{"numero":"063", "nombre":"Temósachic"},{"numero":"064",' +
' "nombre":"El Tule"},{"numero":"065", "nombre":"Urique"},{"numero":"066", "nombre":"Uruachi"},{"numero":"067", "nombre":"Valle de Zaragoza"}]}');

const c_unidad = document.getElementById('cedula-input-unidad');
const c_asistente = document.getElementById('cedula-input-asistente');

const buscar_municipio = document.getElementById('input-municipio-buscar');
const select_municipio = document.getElementById('select-municipio');
const c_municipio = document.getElementById('cedula-input-municipio');

const buscar_localidad = document.getElementById('input-localidad-buscar');
const select_localidad = document.getElementById('select-localidad');
const c_localidad = document.getElementById('cedula-input-localidad');

const input_tipo_de_localidad_s = document.getElementById('input-tipo-localidad-s');
const input_tipo_de_localidad_lai = document.getElementById('input-tipo-localidad-lai');
const input_tipo_de_localidad_none = document.getElementById('input-tipo-localidad-none');

const c_reg_v_min = document.getElementById('input-region-vehiculo-minutos');
const c_reg_v_km = document.getElementById('input-region-vehiculo-kilometros');
const c_reg_p_min = document.getElementById('input-region-pie-minutos');
const c_reg_p_km = document.getElementById('input-region-pie-kilometros');

const c_sed_v_min = document.getElementById('input-sede-vehiculo-minutos');
const c_sed_v_km = document.getElementById('input-sede-vehiculo-kilometros');
const c_sed_p_min = document.getElementById('input-sede-pie-minutos');
const c_sed_p_km = document.getElementById('input-sede-pie-kilometros');



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

document.getElementById('button-cedula-cancelar-captura').addEventListener('click', function() {
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

var localidades = [];


document.getElementById('input-button-buscar-municipio').addEventListener('click', function() {
    searchMunicipios(buscar_municipio.value.toUpperCase());
});

document.getElementById('input-button-borrar-municipio').addEventListener('click', function() {
    buscar_municipio.value = "";
    c_municipio.innerText = "-";
    clearMunicipios();
    loadMunicipios();
    
    buscar_localidad.value = "";
    c_localidad.value = "";
    clearLocalidades();
});

document.getElementById('input-button-elegir-municipio').addEventListener('click', function() {
    if (select_municipio.selectedIndex > -1) {
        c_municipio.innerText = select_municipio.value;
        const formData = new FormData();
        formData.append("num_mun", select_municipio.value.substring(0, 3));
        fetch("../../controller/capture/localidades.php", {
            body: formData,
            method: "post"
        })
        .then(response => response.json())
        .then(data => getLocalidades(data))
        .catch(error => openModalOk("ERROR", error, 5000));
    }
});

document.getElementById('input-button-buscar-localidad').addEventListener('click', function() {
    if (c_municipio.innerText != "-") {
        searchLocalidades(buscar_localidad.value.toUpperCase());
    }
});

document.getElementById('input-button-borrar-localidad').addEventListener('click', function() {
    buscar_localidad.value = "";
    c_localidad.value = "";
    clearLocalidades();
    loadLocalidades();
});

document.getElementById('input-button-elegir-localidad').addEventListener('click', function() {
    if (select_localidad.selectedIndex > -1) {
        c_localidad.value = select_localidad.options[select_localidad.selectedIndex].text;
    }
})

document.getElementById('button-cedula-limpiar-campos').addEventListener('click', function() {
    openModalOkCancel("CÉDULA - CAPTURA", "¿Desea limpiar el contenido de los campos?", "limpiar");
});

document.getElementById('button-cedula-siguiente').addEventListener('click', function() {
    validar_cedula();
});

function getNowDatetime() {
    const now = new Date();
    const offsetMs = now.getTimezoneOffset() * 60 * 1000;
    const dateLocal = new Date(now.getTime() - offsetMs);
    return dateLocal.toISOString().slice(0, 19).replace(/-/g, "-").replace("T", " ");
}

function loadMunicipios() {
    for (var i=0; i < municipios.municipios.length; i++) {
        var optionM = document.createElement('option');
        var mun = municipios.municipios[i].numero + " - " + municipios.municipios[i].nombre;
        optionM.value = mun;
        optionM.innerHTML = mun;
        select_municipio.appendChild(optionM);
    }
}

function searchMunicipios(mun) {
    if (mun != "") {
        clearMunicipios();
        let nombre;
        for (var i=0; i < municipios.municipios.length; i++) {
            nombre = municipios.municipios[i].numero + " - " + municipios.municipios[i].nombre;
            if (nombre.toUpperCase().includes(mun)) {
                var optionM = document.createElement('option');
                optionM.value = nombre;
                optionM.innerText = nombre;
                select_municipio.appendChild(optionM);
            }
        }
    }
}

function clearMunicipios() {
    let i;
    let total = select_municipio.options.length - 1;
    localidades = [];
    for (i = total; i >= 0; i--) {
        select_municipio.remove(i);
    }
}

function getLocalidades(data) {
    if (data['success']) {
        clearLocalidades();
        let i = 0;
        let idL = [];
        data['message'].forEach(row => {
            idL = [];
            idL[0] = row['localidad_num'];
            idL[1] = row['localidad_nom'];
            localidades[i] = idL;
            i++;
        });
        loadLocalidades();
    } else {
        openModalOk("ERROR", data['message'], 5000);
    }
}

function loadLocalidades() {
    let optionL;
    for (var i=0; i < localidades.length; i++) {
        optionL = document.createElement('option');
        optionL.value = localidades[i][0];
        optionL.innerText = localidades[i][0] + " - " + localidades[i][1];
        select_localidad.appendChild(optionL);
    }
}

function searchLocalidades(loc) {
    if (loc != "") {
        clearLocalidades();
        var optionM;
        for (var i=0; i < localidades.length; i++) {
            if (localidades[i][1].toUpperCase().includes(loc)) {
                optionM = document.createElement('option');
                optionM.value = localidades[i][0];
                optionM.innerText = localidades[i][0] + " - " + localidades[i][1];
                select_localidad.appendChild(optionM);
            }
        }
    }
}

function clearLocalidades() {
    let i;
    let total = select_localidad.options.length - 1;
    c_localidad.value = "";
    for (i = total; i >= 0; i--) {
        select_localidad.remove(i);
    }
}

function c_tipo_de_localidad() {
    return document.querySelector('input[name="input-tipo-localidad"]:checked').value;
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

function mostrar_datos() {
    let m = "MUN_NUM: " + c_municipio.innerText.substring(0, 4) + "\r\n" + "MUN_NOM: " + c_municipio.innerText.substring(60, 6) + "\r\n" + 
    "UNID: " + c_unidad.value + "\r\n" + "ASIST: " + c_asistente.value + "\r\n" + 
    "LOC_NUM: " + select_localidad.value + "\r\n" + "LOC_NOM: " + c_localidad.value + "\r\n" + 
    "TIPO_LOC: " + c_tipo_de_localidad() + "\r\n" + "RVM: " + 
    c_reg_v_min.value + "\r\n" + "RVK: " + c_reg_v_km.value + "\r\n" + "RPM: " + c_reg_p_min.value + "\r\n" + "RPK: " + c_reg_p_km.value + "\r\n" + 
    "SVM: " + c_sed_v_min.value + "\r\n" + "SVK: " + c_sed_v_km.value + "\r\n" + "SPM: " + c_sed_p_min.value + "\r\n" + "SPK: " + c_sed_p_km.value;
    alert(m);
}

function limpiar_contenido() {
    c_unidad.value = "";
    c_asistente.value = "";
    buscar_municipio.value = "";
    select_municipio.selectedIndex = -1;
    c_municipio.innerText = "-";
    buscar_localidad.value = "";
    clearLocalidades();
    c_localidad.value = "";
    input_tipo_de_localidad_none.checked = true;
    c_reg_v_min.value = 0;
    c_reg_v_km.value = 0;
    c_reg_p_min.value = 0;
    c_reg_p_km.value = 0;
    c_sed_v_min.value = 0;
    c_sed_v_km.value = 0;
    c_sed_p_min.value = 0;
    c_sed_p_km.value = 0;
}

function validar_cedula() {
    if (c_reg_v_min.value == '') {
        c_reg_v_min.value = '0';
    }
    if (c_reg_v_km.value == '') {
        c_reg_v_km.value = '0';
    }
    if (c_reg_p_min.value == '') {
        c_reg_p_min.value = '0';
    }
    if (c_reg_p_km.value == '') {
        c_reg_p_km.value = '0';
    }
    if (c_sed_v_min.value == '') {
        c_sed_v_min.value = '0';
    }
    if (c_sed_v_km.value == '') {
        c_sed_v_km.value = '0';
    }
    if (c_sed_p_min.value == '') {
        c_sed_p_min.value = '0';
    }
    if (c_sed_p_km.value == '') {
        c_sed_p_km.value = '0';
    }
    let msg = "";
    if (c_unidad.value == "") {
        msg = msg + " -Especificar UNIDAD.<br>";
    }
    if (c_asistente.value == "") {
        msg = msg + " -Especificar ASISTENTE SOCIAL.<br>";
    }
    if (c_municipio.innerText == "-") {
        msg = msg + " -Especificar MUNICIPIO.<br>";
    }
    if (c_localidad.value == "") {
        msg = msg + " -Especificar LOCALIDAD.<br>";
    }
    /*
    if (input_tipo_de_localidad_none.checked == true) {
        msg = msg + " -Especificar TIPO DE LOCALIDAD.<br>";
    }
    */
    if (msg != "") {
        msg = msg + "<br><b>¿Desear guardar?</b>";
        openModalOkCancel("ERROR DE CAPTURA", msg, "enviar");
    } else {
        enviar_datos();
    }
}

function enviar_datos() {
    const formData = new FormData();
    formData.append('unidad', c_unidad.value);
    formData.append('asistente', c_asistente.value);
    formData.append('mun-num', c_municipio.innerText.substring(0, 3));
    formData.append('mun-nom', c_municipio.innerText.substring(60, 6));
    formData.append('loc-num', c_localidad.value.substring(0, 4));
    formData.append('loc-nom', c_localidad.value.substring(60, 7));
    formData.append('fec-reg-ced', getNowDatetime());
    formData.append('tipo-loc', c_tipo_de_localidad());
    formData.append('rvm', c_reg_v_min.value);
    formData.append('rvk', c_reg_v_km.value);
    formData.append('rpm', c_reg_p_min.value);
    formData.append('rpk', c_reg_p_km.value);
    formData.append('svm', c_sed_v_min.value);
    formData.append('svk', c_sed_v_km.value);
    formData.append('spm', c_sed_p_min.value);
    formData.append('spk', c_sed_p_km.value);

    fetch('../controller/capture/cedula.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => siguiente(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function siguiente(response) {
    if (response['success'] == true) {
        window.location.href ="https://www.sdhybc.org/on/c_vivienda.php";
    }
}

function showCedulaData() {
    alert('id: ' + response['id'] + '\n' +
        'unidad: ' + response['unidad'] + '\n' +
        'asistencia: ' + response['asistente'] + '\n' +
        'mun-num: ' + response['mun-num'] + '\n' +
        'mun-nom: ' + response['mun-nom'] + '\n' +
        'loc-num: ' + response['loc-num'] + '\n' +
        'loc-nom: ' + response['loc-nom'] + '\n' +
        'fec-reg-ced: ' + response['fec-reg-ced'] + '\n' +
        'tipo-loc: ' + response['tipo-loc'] + '\n' +
        'rvm: ' + response['rvm'] + '\n' +
        'rvk: ' + response['rvk'] + '\n' +
        'rpm: ' + response['rpm'] + '\n' +
        'rpk: ' + response['rpk'] + '\n' +
        'svm: ' + response['svm'] + '\n' +
        'svk: ' + response['svk'] + '\n' +
        'spm: ' + response['spm'] + '\n' +
        'spk: ' + response['spk']
        );

    alert('id-inserted: ' + response['id-inserted']);
}

loadMunicipios();
