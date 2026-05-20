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

var modal_oc_var = "";
var delete_index = 0;

const modal_oc = document.getElementById("modal-oc");
const modal_oc_title = document.getElementById("modal-oc-title");
const modal_oc_description = document.getElementById("modal-oc-description");
document.getElementById("modal-oc-button-ok").addEventListener('click', function() {
    switch(modal_oc_var) {
        case 'delete-record':
            deleting_record();
            modal_oc_var = "";
            delete_index = 0;
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

function openModal(title, description) {
    modal_o_title.innerHTML = title;
    modal_o_description.innerHTML = description;
    modal_o.showModal();
}

function get(name){
    if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
       return decodeURIComponent(name[1]);
 }

function closeModalOk() {
    modal_o.close();
}

document.getElementById('table-ced-refresh').addEventListener('click', function() {
    loadTable();
});

function loadTable() {
    document.getElementById('table-ced-refresh').style.background = "rgb(130, 30, 124)";
    const formData = new FormData();
    formData.append('action', 'update-table');
    let p = (typeof get('page') === 'undefined') ? 1 : get('page');
    formData.append('page', p);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => update_table(data))
    .catch(error => update_table_error(error));
}

function update_table(data) {
    document.getElementById('table-ced-refresh').style.background = 'none';
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
        c0.innerText = data['records'][i]['ID'];
        // Edit Button
        c1.innerHTML = "<td class='table-ced-acc'><svg class='image-menu-table' onclick=edit_record(" + data['records'][i]['ID'] + ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg></td>";
        c1.classList.add('table-ced-acc');
        // Delete Button
        c2.innerHTML = "<td><svg class='image-menu-table' onclick=delete_record(" + data['records'][i]['ID'] + ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/></svg></td>";
        c2.classList.add('table-ced-acc');
        // Show User
        c3.innerHTML = "<td><a class='table-links' onclick='return show_user(" + data['records'][i]['UsuarioId'] + ")'>" + data['records'][i]['UsuarioId'] + "</a></td>";
        c3.classList.add('table-ced-uId');
        c4.innerHTML = "<td>" + data['records'][i]['MunicipioNom'] + "</td>";
        c4.classList.add('table-ced-mun');
        c5.innerHTML = (data['records'][i]['FecRegCed'] == null) ? ' ' : "<td><a class='table-links' onclick='return show_ced(" + data['records'][i]['ID'] + ")'>" + data['records'][i]['FecRegCed'] + "</a></td>";
        c5.classList.add('table-ced-ced');
        c6.innerHTML = (data['records'][i]['FecRegViv'] == null) ? ' ' : "<td><a class='table-links' onclick='return show_viv(" + data['records'][i]['ID'] + ")'>" + data['records'][i]['FecRegViv'] + "</a></td>";
        c6.classList.add('table-ced-viv');
        c7.innerHTML = (data['records'][i]['FecRegGen'] == null) ? ' ' : "<td><a class='table-links' onclick='return show_gen(" + data['records'][i]['ID'] + ")'>" + data['records'][i]['FecRegGen'] + "</a></td>";
        c7.classList.add('table-ced-gen');
        c8.innerHTML = (data['records'][i]['NumInteg'] == 0) ? '0' : "<td><a class='table-links' onclick='return show_fam(" + data['records'][i]['ID'] + ")'>" + data['records'][i]['NumInteg'] + "</a></td>";
        c8.classList.add('table-ced-fam');
        i++;
    }
}

function update_table_error(error) {
    document.getElementById('table-ced-refresh').style.background = 'none';
    openModalOk("ERROR", error, 5000)
}

function edit_record(index) {
    const formData = new FormData();
    formData.append('action', 'edit-record');
    formData.append('id', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => start_editing(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function start_editing(data) {
    if (data['success']) {
        window.location = "https://www.sdhybc.org/on/c_cedula.php";
    }
}

function delete_record(index) {
    delete_index = index;
    openModalOkCancel("<b class='font-size-13px'>Eliminar registro</b>", "<p class='font-size-13px'>¿Desea eliminar definitivamente el registro " + index + "?</p>", 'delete-record');
}

function deleting_record() {
    const formData = new FormData();
    formData.append('action', 'delete-record');
    let p = (typeof get('page') === 'undefined') ? 1 : get('page');
    formData.append('page', p);
    formData.append('id', delete_index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => update_table(data))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function show_user(index) {
    const formData = new FormData();
    formData.append('action', 'show-user');
    formData.append('userId', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => openModal(data['name'], data['user']))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function show_ced(index) {
    const formData = new FormData();
    formData.append('action', 'show-ced');
    formData.append('id', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => openModal(data['name'], data['content']))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function show_viv(index) {
    const formData = new FormData();
    formData.append('action', 'show-viv');
    formData.append('id', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => openModal(data['name'], data['content']))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function show_gen(index) {
    const formData = new FormData();
    formData.append('action', 'show-gen');
    formData.append('id', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => openModal(data['name'], data['content']))
    .catch(error => openModalOk("ERROR", error, 5000));
}

function show_fam(index) {
    const formData = new FormData();
    formData.append('action', 'show-fam');
    formData.append('id', index);
    fetch('https://www.sdhybc.org/controller/home/home.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => openModal(data['name'], data['content']))
    .catch(error => openModalOk("ERROR", error, 5000));
}

loadTable();