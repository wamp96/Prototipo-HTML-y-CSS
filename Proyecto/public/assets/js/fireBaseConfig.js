// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries


// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDqKeSUTxZXP1YaW1DJQmmh5YDtHR35v2Q",
    authDomain: "wm-inventory.firebaseapp.com",
    databaseURL: "https://wm-inventory-default-rtdb.firebaseio.com",
    projectId: "wm-inventory",
    storageBucket: "wm-inventory.appspot.com",
    messagingSenderId: "1059515154764",
    appId: "1:1059515154764:web:eabf72f687cf3b3134cfe9"
};


// Initialize Firebase
export const app = initializeApp(firebaseConfig);
// Obtener el objeto de autenticación de Firebase
export const auth = getAuth(app);


