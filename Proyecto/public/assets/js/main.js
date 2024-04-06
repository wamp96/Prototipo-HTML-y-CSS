/**DEFINE*/
const idcont = "container";
const formUser = "gestionUsuario";
const containerBase = new User(idcont,formUser);
const idgestionUser = document.getElementById('gestionUsuario');
const btnSubmit = document.getElementById('btnSubmit');
const preload = document.getElementById('preload');
//const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";

var getIdUser = "";
var validate = true;



/**Funcion para obtener datos de usuario*/
function getDataUser() {
    //showPreload();
    containerBase.getDataUsers().then((result) => {
        // hidePreload();

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
/*formUser.addEventListener('submit', (e) => {
    e.preventDefault();
    let inputId = document.getElementById('id');
    if (inputId.value.length === 0) {
        inputId.value = uuid.v1();
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
});*/

/**Funcion para visualizar el Modal*/
function showModal() {
    myModal.show();
};

/**Funcion para ocultar Modal*/
function hideModal() {
    myModal.hide();
}

/**Funcion para limpiar formulario*/
function cleanForm() {
    formUser.reset();
};

/**Funcion para Habilitar Formulario*/
function enableForm() {
    let elements = formUser.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = false;
    }
};

/**Funcion para deshabilitar el Formulario*/
function disableForm() {
    let elements = formUser.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = true;
    }
};

/**FFuncion para el envio de data a el fomulario*/
function setDataForm(data) {
    let elements = formUser.querySelectorAll("input");
    for (let i = 0; i < elements.length; i++) {
        document.getElementById(elements[i].id).value = data[elements[i].id];
    }
};
/*
/**Funcion de precarga de pagina
function showPreload() {
    preload.style.display = "block";
};*/

/**Funcion precarga ocula
function hidePreload() {
    preload.style.display = "none";
}*/

/*Vista de carga de usuarios primer evento que se ejecuta al cargar la pagina**/
/*window.addEventListener('load', (e) => {
    getDataUser();
});*/