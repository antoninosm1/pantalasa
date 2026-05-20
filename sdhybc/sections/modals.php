<dialog class="modals-capture" id="modal-o">
    <h4 class="modals-contents modals-text" id="modal-o-title"></h4>
    <p class="modals-contents modals-text" id="modal-o-description"></p>
    <form method="dialog">
        <input type="button" value="OK" class="modal-buttons modals-contents" id="modal-o-button-ok">
    </form>
</dialog>

<dialog class="modals-capture" id="modal-oc">
    <h4 class="modals-contents modals-text" id="modal-oc-title"></h4>
    <p class="modals-contents modals-text" id="modal-oc-description"></p>
    <form method="dialog">
        <input type="button" value="OK" class="modal-buttons modals-contents" id="modal-oc-button-ok">
        <input type="button" value="Cancelar" class="modal-buttons modals-contents" id="modal-oc-button-cancel">
    </form>
</dialog>

<dialog class="modals-capture" id="modal-user">
    <h4 class="modals-contents modals-text" id="modal-user-title"></h4>
    <b><p class="modals-contents modals-text" id="modal-user-description"></p></b>
    <form method="dialog">
        <div class='user-div'>
            <label class='user-modal form-margin-bottom-0px' for='input-user-nombre'>NOMBRE:</label>
        </div>
        <div class='user-div'>
            <input class='user-modal input-text' type='text' id='input-user-nombre'>
        </div>
        <div class='user-div'>
            <label class='user-modal form-margin-bottom-0px' for='input-user-apellido1'>PRIMER APELLIDO:</label>
        </div>
        <div class='user-div'>
            <input class='user-modal input-text' type='text' id='input-user-apellido1'>
        </div>
        <div class='user-div'>
            <label class='user-modal form-margin-bottom-0px' for='input-user-apellido2'>SEGUNDO APELLIDO:</label>
        </div>
        <div class='user-div'>
            <input class='user-modal input-text' type='text' id='input-user-apellido2'>
        </div>
        <div class='user-div'>
            <label class='user-modal form-margin-bottom-0px' for='input-user-correo'>CORREO:</label>
        </div>
        <div class='user-div'>
            <input class='user-modal input-text' type='email' id='input-user-correo'>
        </div>
        <div class='user-div'>
            <label class='user-modal form-margin-bottom-0px' for='input-user-nivel'>NIVEL DE ACCESO:</label>
        </div>
        <div class='user-div'>
            <select class='user-modal input-text form-margin-bottom-10px' id="select-user-nivel">
                <option value="1">ADMINISTRADOR</option>
                <option value="2">ORGANIZADOR</option>
                <option value="3">CAPTURISTA</option>
                <option value="4">VISOR DE RESUMEN</option>
                <option value="5">SIN ACCESO</option>
            </select>
        </div>
        <input type="button" value="OK" class="modal-buttons modals-contents" id="modal-user-button-ok">
        <input type="button" value="Cancelar" class="modal-buttons modals-contents" id="modal-user-button-cancel">
    </form>
</dialog>

<dialog class="modals-capture" id="modal-dd">
    <h4 class="modals-contents modals-text" id="modal-dd-title"></h4>
    <p class="modals-contents modals-text no-display" id="modal-dd-description"></p>
    <form method="dialog">
        <input type="button" value="CÉDULAS" class="modal-buttons modals-contents" id="modal-dd-button-ced">
        <input type="button" value="INTEGRANTES" class="modal-buttons modals-contents" id="modal-dd-button-int">
        <input type="button" value="CÉDULAS INTEGRANTES" class="modal-buttons modals-contents" id="modal-dd-button-cid">
        <input type="button" value="Cancelar" class="modal-buttons modals-contents" id="modal-dd-button-cancel">
    </form>
</dialog>