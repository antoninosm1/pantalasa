var num_page;

const body_table = document.getElementById('table-records-body');

const pagination_backward = document.getElementById('page_backward');
const pagination_forward = document.getElementById('page_forward');

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

function openModal(title, description) {
    modal_o_title.innerHTML = title;
    modal_o_description.innerHTML = description;
    modal_o.showModal();
}

function closeModalOk() {
    modal_o.close();
}

var modal_oc_var = "";
var user_id = "";

const modal_oc = document.getElementById("modal-oc");
const modal_oc_title = document.getElementById("modal-oc-title");
const modal_oc_description = document.getElementById("modal-oc-description");

document.getElementById("modal-oc-button-ok").addEventListener('click', function() {
    switch(modal_oc_var) {
        case 'delete-user':
            modal_oc_var = "";
            deleting_user(user_id);
            user_id = "";
            break;
        default:
            //nothing
    }
    closeModalOkCancel();
});
document.getElementById("modal-oc-button-cancel").addEventListener('click', function() {
    closeModalOkCancel();
});

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

var modal_user_var = "";
const modal_user = document.getElementById("modal-user");
const modal_user_title = document.getElementById("modal-user-title");
const modal_user_description = document.getElementById("modal-user-description");
const modal_nombre = document.getElementById("input-user-nombre");
const modal_apellido1 = document.getElementById("input-user-apellido1");
const modal_apellido2 = document.getElementById("input-user-apellido2");
const modal_correo = document.getElementById("input-user-correo");
const modal_acceso = document.getElementById("input-user-nivel");

document.getElementById("modal-user-button-ok").addEventListener('click', function() {
    switch(modal_user_var) {
        case 'create-user':
            modal_user_var = "";
            new_user();
            break;
        case 'update-user':
            modal_user_var = "";
            update_user(modal_user_description.innerText);
            break;
        default:
            //nothing
    }
    closeModalUser();
});
document.getElementById("modal-user-button-cancel").addEventListener('click', function() {
    closeModalUser();
});

function closeModalUser() {
    modal_user_var = "";
    modal_nombre.value = "";
    modal_apellido1.value = "";
    modal_apellido2.value = "";
    modal_correo.value = "";
    modal_acceso.value= "4";
    modal_user.close();
}

function openModalUser(title, description, action) {
    modal_user_var = action;
    modal_user_title.innerHTML = title;
    modal_user_description.innerHTML = description;
    modal_user.showModal();
}

function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]);
}

document.getElementById('table-user-add').addEventListener('click', function() {
    openModalUser('AGREGAR NUEVO USUARIO', 'INGRESE DATOS', 'create-user');
});

function table_update() {
    let page = (typeof get('page') === 'undefined') ? 1 : get('page');
    const formData = new FormData();
    formData.append('action', 'update-table')
    formData.append('page', page);
    fetch('../../controller/home/users.php', {
        method: 'post',
        body: formData
    })
    .then(response => response.json())
    .then(data => updating(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function updating(data) {
    let i = body_table.rows.length;
    for (body_table.rows.length; i > 0;i--) {
        body_table.deleteRow(i -1);
    }
    i = 0;
    while (i < data['records'].length) {
        let r = body_table.insertRow(-1);
        let c0 = r.insertCell(0);
        let c1 = r.insertCell(1);
        let c2 = r.insertCell(2);
        let c3 = r.insertCell(3);
        let c4 = r.insertCell(4);
        let c5 = r.insertCell(5);
        let c6 = r.insertCell(6);
        let c7 = r.insertCell(7);
        let c8 = r.insertCell(8);
        let c9 = r.insertCell(9);
        let c10 = r.insertCell(10);
        c0.innerText = data['records'][i]['ID'];
        c1.innerHTML = "<td class='table-use-acc'><svg class='image-menu-table' onclick=edit_user(" + data['records'][i]['ID'] + ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg></td>";
        c2.innerHTML = "<td class='table-use-acc'><svg class='image-menu-table' onclick=delete_user(" + data['records'][i]['ID'] + ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/></svg></td>";
        c3.innerHTML = "<td class='table-use-nom'>" + data['records'][i]['Nombre'] + "</td>";
        c4.innerHTML = "<td class='table-use-ap1'>" + data['records'][i]['Apellido1'] + "</td>";
        c5.innerHTML = "<td class='table-use-ap2'>" + data['records'][i]['Apellido2'] + "</td>";
        c6.innerHTML = "<td class='table-use-cor'>" + data['records'][i]['Correo'] + "</td>";
        c7.innerHTML = "<td class='table-use-nac'>" + data['records'][i]['Privilegios'] + "</td>";
        c8.innerHTML = "<td class='table-use-mid'>" + data['records'][i]['MembresiaDesde'] + "</td>";
        c9.innerHTML = "<td class='table-use-uin'>" + ((data['records'][i]['UltimoIngreso'] == null) ? '' : data['records'][i]['UltimoIngreso']) + "</td>";
        c10.innerHTML = "<td class='table-use-cec'>" + data['records'][i]['NumeroCedulas'] + "</td>";
        c1.classList.add("table-use-acc");
        c2.classList.add("table-use-acc");
        c3.classList.add("table-use-nom");
        c4.classList.add("table-use-ap1");
        c5.classList.add("table-use-ap2");
        c6.classList.add("table-use-cor");
        c7.classList.add("table-use-nac");
        c8.classList.add("table-use-mid");
        c9.classList.add("table-use-uin");
        c10.classList.add("table-use-cec");
        i++;
    }
}

function new_user() {
    let page = (typeof get('page') === 'undefined') ? 1 : get('page');
    const formData = new FormData();
    formData.append('action', 'create-user')
    formData.append('page', page);
    formData.append('Nombre', modal_nombre.value);
    formData.append('Apellido1', modal_apellido1.value);
    formData.append('Apellido2', modal_apellido2.value);
    formData.append('Correo', modal_correo.value);
    formData.append('Privilegios', modal_acceso.value);
    fetch('../../controller/home/users.php', {
        method: 'post',
        body: formData
    })
    .then(response => response.json())
    .then(data => new_user_done(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function new_user_done(data) {
    openModalOk((data['success'] == true) ? 'SOLICITUD REALIZADA' : 'SOLICITUD TRUNCA', data['message'], 5000);
    if (data['success'] == true) {
        closeModalUser();
        table_update();
    }
}

function edit_user(id) {
    const formData = new FormData();
    formData.append('action', 'get-user')
    formData.append('id', id);
    fetch('../../controller/home/users.php', {
        method: 'post',
        body: formData
    })
    .then(response => response.json())
    .then(data => editing_user(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function editing_user(data) {
    modal_nombre.value = data['Nombre'];
    modal_apellido1.value = data['Apellido1'];
    modal_apellido2.value = data['Apellido2'];
    modal_correo.value = data['Correo'];
    modal_acceso.value = data['Privilegios'];
    openModalUser('¿ACTUALIZAR USUARIO?', data['ID'], 'update-user');
}

function update_user(id) {
    const formData = new FormData();
    formData.append('action', 'edit-user')
    formData.append('id', id);
    formData.append('Nombre', modal_nombre.value);
    formData.append('Apellido1', modal_apellido1.value);
    formData.append('Apellido2', modal_apellido2.value);
    formData.append('Correo', modal_correo.value);
    formData.append('Privilegios', modal_acceso.value);
    fetch('../../controller/home/users.php', {
        method: 'post',
        body: formData
    })
    .then(response => response.json())
    .then(data => updated_user(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function updated_user(data) {
    closeModalUser();
    openModalOk("SOLICITUD PROCESADA", data['message'], 5000);
    table_update();
}

function delete_user(id) {
    user_id = id;
    openModalOkCancel("ELIMINAR USUARIO", "¿Desea eliminar usuario " + id + " permanentemente?", 'delete-user');
}

function deleting_user(id) {
    let page = (typeof get('page') === 'undefined') ? 1 : get('page');
    const formData = new FormData();
    formData.append('action', 'delete-user')
    formData.append('page', page);
    formData.append('id', id);
    fetch('../../controller/home/users.php', {
        method: 'post',
        body: formData
    })
    .then(response => response.json())
    .then(data => delete_user_done(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function delete_user_done(data) {
    openModalOk((data['success'] == true) ? 'SOLICITUD REALIZADA' : 'SOLICITUD TRUNCA', data['message'], 5000);
    if (data['success'] == true) {
        closeModalOkCancel();
        table_update();
    }
}

table_update();