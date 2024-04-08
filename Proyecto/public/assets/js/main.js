/**DEFINE*/
//Constante globales 
const preload = document.getElementById('preload');
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";

//Constantes pagina administrador
const idcont = "container-adm";
const listUser = "gestion-usuario";
const containerBase = new User(idcont,listUser);
const formUser = document.getElementById('formUser');
const btnSubmit = document.getElementById('btnSubmit');
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});



//Variables pagina administrador
var getIdUser = "";

//Constantes pagina Analista de inventario 
const idContAdm = "container-analista";
const listElem = "gestion-elementos";
const listInv = "gestion-inventario";
const contElement = new elements(idContAdm,listElem,listInv);
const formElements = document.getElementById('formElements');
const elementModal = new bootstrap.Modal(document.getElementById("modal-element"), {});



//Variables globales 
var validate = true;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**Funcion para obtener datos de usuario*/

function getDataUser() {
    showPreload();
    containerBase.getDataUsers().then((result) => {
       hidePreload();
    });
}

/**Funcion para crear usuario*/

function createUser() {
    validate = true;
    cleanForm();
    enableForm();
    btnSubmit.disabled = false;
    showModal();
}

/**Funcion para visualizar usuarios*/

function showUser(id) {
    cleanForm();
    disableForm();
     showPreload();
    const dataUser = containerBase.getDataUser(id);
    dataUser.then((data) => {
        setDataForm(data);
       hidePreload();
    });
    btnSubmit.disabled = true;
    showModal();
}

/**Funcion para editar usuario*/
function editUser(id) {
    validate = false;
    cleanForm();
    enableForm();
    showPreload();
    getIdUser = id;
    const dataUser = containerBase.getDataUser(id);
    
    dataUser.then((data) => {
        setDataForm(data);
        hidePreload();
    });
    btnSubmit.disabled = false;
    showModal();
}

/**Funcion para eliminar usuarios*/

function deleteUser(id) {
    showPreload();
    if (confirm(textConfirm) == true) {
        containerBase.setDeleteUser(id).then((data) => {
            getDataUser();
        });
    }
    hidePreload();
}

/**Funcion para enviar data al modal*/

formUser.addEventListener('submit', (e) => {
    e.preventDefault();
    let inputId = document.getElementById('id');
    if (inputId.value.length === 0) {
        inputId.value = generarUUID();
    }
    let elements = formUser.querySelectorAll('input');
    var jsonArray = {};
    for (const elem of elements) {
        jsonArray[elem.id] = elem.value;
    }
    if (validate) {
        containerBase.setCreateUser(jsonArray).then(hideModal());
    } else {
        containerBase.setUpdateUser(getIdUser, jsonArray).then(hideModal());
    }
});

/*Funcion para visualizar el Modal Usuarios*/
function showModal() {
    myModal.show();
};

/**Funcion para ocultar Modal Usuarios*/

function hideModal() {
    myModal.hide();
}

/**Funcion para limpiar formulario del Modal Usuarios*/

function cleanForm() {
    formUser.reset();
};

/**Funcion para Habilitar Formulario del Modal Usuarios*/
function enableForm() {
    let user = formUser.querySelectorAll("input");
    for (let i = 0; i < user.length; i++) {
        user[i].disabled = false;
    }
};
/**Funcion para deshabilitar el Formulario del Modal Usuarios */

function disableForm() {
    let user = formUser.querySelectorAll("input");
    for (let i = 0; i < user.length; i++) {
        user[i].disabled = true;
    }
};
/*Funcion para el envio de data a el formulario del Modal Usuarios*/

function setDataForm(data) {
    let elements = formUser.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
      document.getElementById(elements[i].id).value = data[elements[i].id];
    }
  };





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

function createElement() {
    validate = true;
    cleanFormE();
    enableFormE();
    btnSubmit.disabled = false;
    showModalE();
}

/**Funcion para visualizar usuarios*/
function showElement(id) {
    cleanFormE();
    disableFormE();
     showPreloadE();
    const dataElement = containerElem.getDataElement(id);
    dataElement.then((data) => {
       setDataFormE(data);
       hidePreload();
    });
    btnSubmit.disabled = true;
    showModal();
}

/**Funcion para editar usuario*/
function editElement(id) {
    validate = false;
    cleanFormE();
    enableFormE();
    //showPreload();
    getIdUser = id;
    const dataUser = containerElem.getDataElement(id);
    
    dataElement.then((data) => {
        setDataFormE(data);
       // hidePreload();
    });
    btnSubmit.disabled = false;
    showModalE();
}
/**Funcion para eliminar usuarios*/
function deleteElement(id) {
    showPreload();
    if (confirm(textConfirm) == true) {
        containerBase.setDeleteElement(id).then((data) => {
            getDataElement();
        });
    }
    hidePreload();
}
/**Funcion para enviar data al modal*/
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
        containerElem.setCreateElement(jsonArray).then(hideModal());
    } else {
        containerElem.setUpdateElement(getIdUser, jsonArray).then(hideModal());
    }
});
/**Funcion para visualizar el Modal Usuarios*/
function showModalE() {
    elementModal.show();
};
/**Funcion para ocultar Modal Usuarios*/
function hideModalE() {
    elementModal.hide();
}
/**Funcion para limpiar formulario del Modal Usuarios*/
function cleanFormE() {
    elementModal.reset();
};
/**Funcion para Habilitar Formulario del Modal Usuarios*/
function enableFormE() {
    let elements = formElements.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = false;
    }
};

function disableFormE() {
    let elements = formElements.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = true;
    }
};
/*Funcion para el envio de data a el formulario del Modal Usuarios*/
function setDataFormE(data) {
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
window.addEventListener('load', (e) => {
    hidePreload()
});