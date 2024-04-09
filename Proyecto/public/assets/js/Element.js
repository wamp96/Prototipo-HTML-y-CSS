//Constantes pagina Analista de inventario 
const idContAdm = "container-analista";
const listElem = "gestion-elementos";
const listInv = "gestion-inventario";
const contElement = new elements(idContAdm,listElem,listInv);
const formElements = document.getElementById('formElements');
const btnSubmit = document.getElementById('btnSubmit');
const elementModal = new bootstrap.Modal(document.getElementById("modal-element"), {});



//Constante globales 
const preload = document.getElementById('preload');
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";

var getIdElement = "";
var validate = true;

////////////////////////////////////////////////////////////////////////////////////////////
//FUNCIONES ELEMENTOS
///////////////////////////////////////////////////////////////////////////////////////////
/*Funcion para obtener datos de usuario*/
function getDataElement() {
    showPreload();
       contElement.getDataElements().then((result) => {
       hidePreload();
    });
}

function createE() {
    validate = true;
    cleanForm();
    enableForm();
    btnSubmit.disabled = false;
    showModal();
}

/**Funcion para visualizar Elementos*/
function showElement(id) {
    cleanForm();
    disableForm();
    showPreload();
    const dataElement = contElement.getDataElement(id);
    dataElement.then((data) => {
       setDataForm(data);
       hidePreload();
    });
    btnSubmit.disabled = true;
    showModal();
}

/**Funcion para editar Elementos*/
function editElement(id) {
    validate = false;
    cleanForm();
    enableForm();
    showPreload();
    getIdElement = id;
    const dataElement = contElement.getDataElement(id);
    
    dataElement.then((data) => {
        setDataForm(data);
        hidePreload();
    });
    btnSubmit.disabled = false;
    showModal();
}

/**Funcion para Eliminar elementos*/
function deleteElement(id) {
    showPreload();
    if (confirm(textConfirm) == true) {
        contElement.setDeleteElement(id).then((data) => {
            getDataElement();
        });
    }
    hidePreload();
}
/**Funcion para enviar data al modal Elementos*/
formElements.addEventListener('submit', (e) => {
    e.preventDefault();
    let inputId = document.getElementById('id');

    if (inputId.value.length === 0) {
        inputId.value = generarUUID();
    }
    let elements = formElements.querySelectorAll('input');
    var jsonArray = {};
    for (const elem of elements) {
        jsonArray[elem.id] = elem.value;
    }
    if (validate) {
        contElement.setCreateElement(jsonArray).then(hideModal());
    } else {
        contElement.setUpdateElement(getIdElement, jsonArray).then(hideModal());
    }
});

/**Funcion para visualizar el Modal Usuarios*/
function showModal() {
    elementModal.show();
};

/**Funcion para ocultar Modal Usuarios*/
function hideModal() {
    elementModal.hide();
}

/**Funcion para limpiar formulario del Modal Usuarios*/
function cleanForm() {
    formElements.reset();
};

/**Funcion para Habilitar Formulario del Modal Usuarios*/
function enableForm() {
    let elements = formElements.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = false;
    }
};

function disableForm() {
    let elements = formElements.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = true;
    }
};

/*Funcion para el envio de data a el formulario del Modal Usuarios*/
function setDataForm(data) {
    let elements = formElements.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        document.getElementById(elements[i].id).value = data[elements[i].id];
    }
};

/*Funcion para generar un UUID*/
function generarUUID() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0,
            v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}


/*Funcion de precarga de pagina*/
function showPreload() {
    preload.style.display = "block";
};

/*Funcion precarga oculta*/
function hidePreload() {
    preload.style.display = "none";
}

/*Vista de carga de usuarios primer evento que se ejecuta al cargar la pagina**/
window.addEventListener("load", (e) => {
    hidePreload()
});