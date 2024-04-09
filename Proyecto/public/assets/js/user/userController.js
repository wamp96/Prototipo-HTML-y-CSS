/* These lines of code are importing specific functions and objects from external modules or scripts.
Here's a breakdown of what each import statement is doing: */
import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { auth } from "../app/firebase.js";
import * as FunApp from "../app/functions.js";


/**Define */
/* These lines of code are defining constants and selecting elements from the DOM using their IDs.
Here's what each line is doing: */
const idInputPasswordRP = 'repeatPassword';
const idInputPassword = 'password';
const btnPasswordRP = document.getElementById('btn-passwordRP');
const btnPassword = document.getElementById('btn-password');
const objForm = document.getElementById('formUser');
const objFormPasswordRecover = document.getElementById('formPasswordRecover');
const objFormLogin= document.getElementById('formLogin');

/* Detector de eventos al elemento del botón con el ID 'btn-password'. Cuando
Al hacer clic en este botón, se ejecuta la función `FunApp.viewText(idInputPassword)` */
if(btnPassword)
btnPassword.addEventListener('click', (e) => {
  FunApp.viewText(idInputPassword);
});

/*Detector de eventos al elemento del botón con el ID 'btnPasswordRP'.
Cuando se hace clic en este botón, se llama a la función `FunApp.viewText(idInputPasswordRP)`. Este
La función probablemente sea responsable de mostrar o manipular la entrada de texto asociada con el ID.
'Repita la contraseña'.  */
if(btnPasswordRP)
btnPasswordRP.addEventListener('click', (e) => {
  FunApp.viewText(idInputPasswordRP);
});


/*Detector de eventos de envío al elemento `objForm`, que probablemente sea un formulario
elemento en el DOM. Cuando se envía el formulario, se toman las siguientes acciones: */
if(objForm)
objForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  let jsonUser = FunApp.sendData(objForm.id);
  console.log("password"+jsonUser.password);
  if (typeof jsonUser.password !== 'undefined' && typeof jsonUser.correo !== 'undefined') {
    try {
      let pass = jsonUser.password;
      let user = (jsonUser.correo).toLowerCase();
      const userCredentials = await createUserWithEmailAndPassword(auth, user, pass).then((data) => {
        //console.log(data);
        alert("User Create");
        FunApp.cleanForm(objForm);
      });
    }
    catch (error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error(errorCode);
      console.error(errorMessage);
      alert("Validate the data entered");
    }
  } else {
    alert("Validate the data entered");
  }

});

/* This code snippet is adding a submit event listener to the `objFormPasswordRecover` element, which
is likely a form element in the DOM. When the form associated with `objFormPasswordRecover` is
submitted, the following actions are taken: */
if(objFormPasswordRecover)
objFormPasswordRecover.addEventListener("submit", async (e) => {
  e.preventDefault();
  let jsonUser = FunApp.sendData(objFormPasswordRecover.id);

  if (typeof jsonUser.user !== 'undefined') {
    try {
      let user = (jsonUser.user).toLowerCase();
      const userCredentials = await sendPasswordResetEmail(auth, user).then((data) => {
        console.log(data);
        alert("Password reset email sent!");
        FunApp.cleanForm(objFormPasswordRecover);
      });
      console.log(userCredentials);
      
    }
    catch (error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error(errorCode);
      console.error(errorMessage);
      alert("Validate the data entered");
    }
  } else {
    alert("Validate the data entered");
  }

});

/* This code snippet is adding a submit event listener to the `objFormLogin` element, which is likely a
form element in the DOM. When the form associated with `objFormLogin` is submitted, the following
actions are taken: */
if(objFormLogin)
objFormLogin.addEventListener("submit", async (e) => {
  e.preventDefault();
  let jsonUser = FunApp.sendData(objFormLogin.id);
  if (typeof jsonUser.password !== 'undefined' && typeof jsonUser.user !== 'undefined') {
    try {
      let pass = jsonUser.password;
      let user = (jsonUser.user).toLowerCase();
      const userCredentials = await signInWithEmailAndPassword(auth, user, pass).then((userCredential) => {
      console.log(userCredential.user);
      alert("User Login");
      });

    }
    catch (error) {
      const errorCode = error.code;
      const errorMessage = error.message;
      console.error(errorCode);
      console.error(errorMessage);
      alert("Validate the data entered");
    }
  } else {
    alert("Validate the data entered");
  }

});


