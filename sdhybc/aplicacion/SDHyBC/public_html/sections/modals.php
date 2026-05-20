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
            <input class='user-modal input-text form-margin-bottom-10px' type='number' id='input-user-nivel' min='2' max='4' value='4'>
        </div>
        <input type="button" value="OK" class="modal-buttons modals-contents" id="modal-user-button-ok">
        <input type="button" value="Cancelar" class="modal-buttons modals-contents" id="modal-user-button-cancel">
    </form>
</dialog>