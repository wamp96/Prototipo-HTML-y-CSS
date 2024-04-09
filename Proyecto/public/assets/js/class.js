
/**
 * Author:WILLIAN ANDRES MORENO PRIETO
 * Date:26/03/2024
 * Description:Clases de proyecto
 * 
*/

class User {
  /*Metodo constructor*/
  constructor(idcont,listUser) {
    this.objTbody = document.getElementById(idcont);
    this.objformUser = document.getElementById(listUser);
    this.URL = "https://wm-inventory-default-rtdb.firebaseio.com/api/usuario"

  }

  /*Método para obtener datos de los usuarios*/
  
  async getDataUsers() {
    return fetch(this.URL + ".json")    
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        this.setTableUser(data);
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*Método asíncrono para obtener datos del usuario por identificación.*/
  async getDataUser(id) {
    return fetch(this.URL + "/" + id + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*Método para crear las filas de la tabla usando el formato Json del usuario.*/

  setTableUser(data) {
    let contRow = 1;
    let rowTable = "";
    let btnActions = "";

    let tableR = '<div style=" margin-top: 120px;" id="tableUser" class="table-responsive tableApp"><div class="d-flex btn-add"><button type="button" onclick="createUser()" class="btn btn-success" style"width: 100px;"><img class="img img-fluid" src="./public/assets/img/icons/plus-square-fill.svg"></button><h6>NUEVO USUARIO</h6></div><br><br><table class="table table-dark table-striped table-hover"><thead><tr class="text-center"><th>#</th><th>NOMBRE</th><th>N° DOCUMENTO</th><th>AREA</th><th>CIUDAD</th><th>CORREO</th><th>NOMBRE_PERFIL</th><th>ESTADO</th><th>ROL</th><th>TELEFONO</th><th>ACTIONS</th></tr></thead><tbody id="tbody">'
    let tableA = ' </tbody><tfoot><tr class="text-center"><th>#</th><th>NOMBRE</th><th>N° DOCUMENTO</th><th>AREA</th><th>CIUDAD</th><th>CORREO</th><th>NOMBRE_PERFIL</th><th>ESTADO</th><th>ROL</th><th>TELEFONO</th><th>ACTIONS</th></tr></tfoot></table></div>'
    for (const user  in data) {
      
      /*let datauser= data[user].perfil;
      let dataperfil = Object.values(datauser);*/
      let getId = "'" + user + "'";

      btnActions = '<div class="btn-group " role="group" aria-label="Basic mixed styles example">' +
        '<button type="button" onclick="showUser(' + getId + ')" class="btn btn-info"><img class="img img-fluid" src="./public/assets/img/icons/eye-fill.svg"></button>' +
        '<button type="button" onclick="editUser(' + getId + ')" class="btn btn-warning"><img class="img img-fluid" src="./public/assets/img/icons/pencil-square.svg"></button>' +
        '<button type="button" onclick="deleteUser(' + getId + ')" class="btn btn-danger"><img class="img img-fluid" src="./public/assets/img/icons/trash3-fill.svg"></button>' +
        '</div>';
        
      rowTable += "<tr>" +
        "<td>" + contRow + "</td>" +        
        "<td>" + data[user].nombre + "</td>" +
        "<td>" + data[user].documento + "</td>" +
        "<td>" + data[user].area + "</td>" +
        "<td>" + data[user].ciudad + "</td>" +
        "<td>" + data[user].correo + "</td>" +
        "<td>" + data[user].perfil + "</td>" +
        "<td>" + data[user].estado + "</td>" +
        "<td>" + data[user].rol + "</td>" +
        "<td>" + data[user].telefono + "</td>" +
        /*"<td>" + dataperfil[3]+ "</td>" +*/
        "<td class='text-center'>" + btnActions + "</td>" +
        "<tr>";
      contRow++;
    }
    this.objTbody.innerHTML = tableR+rowTable+tableA;
  }
  /*Método para crear el nuevo usuario de datos en formato Json de usuario.*/

  async setCreateUser(data) {
    return fetch(this.URL + ".json", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        this.getDataUsers();
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*método para actualizar el usuario enviando un conjunto de datos en formato Json por parte del usuario.*/

  async setUpdateUser(id, data) {
    return fetch(this.URL + "/" + id + ".json", {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        this.getDataUsers();
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*Método para eliminar el usuario. */

  async setDeleteUser(id) {
    return fetch(this.URL + "/" + id + ".json", {
      method: 'DELETE'
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }
}


class elements {

  constructor(idContAdm,listElement,listInv){
    this.objcontAdm = document.getElementById(idContAdm);
    this.objlistElement = document.getElementById(listElement);
    this.objlistInv = document.getElementById(listInv);
    this.URL = "https://wm-inventory-default-rtdb.firebaseio.com/api/elemento"
  }  

    /*Método para obtener datos de los elementos*/
    async getDataElements() {
      try {
        const res = await fetch(this.URL + ".json");
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        const data = await res.json();
        this.setTableElements(data);
      } catch (error) {
        console.error(error);
      }
    }

    async getDataElement(id) {
      return fetch(this.URL + "/" + id + ".json")
        .then((res) => {
          if (!res.ok) {
            console.log('Result: Problem');
            return;
          }
          return res.json();
        })
        .then((data) => {
         
          return data;
        })
        .catch((error) => {
          console.error(error);
        })
        .finally();
    }

    
  /*Método para crear las filas de la tabla usando el formato Json del usuario.*/
    setTableElements(data) {
    let contRow = 1;
    let rowTable = "";
    let btnActions = "";
    let tableR = '<div style=" margin-top: 120px;" id="createElement" class="table-responsive tableApp"><div class="d-flex btn-add"><button type="button" onclick="createE()" class="btn btn-success"><img class="img img-fluid"src="./public/assets/img/icons/plus-square-fill.svg"></button><h6>NUEVO ELEMENTO</h6></div><br><br><table class="table table-dark table-striped table-hover"><thead><tr class="text-center"><th>#</th><th>NOMBRE</th><th>CATEGORIA</th><th>ESTADO</th><th>FECHA INGRESO</th><th>SERIAL</th><th>MARCA</th><th>MODELO</th><th>IMAGEN</th><th>TAMAÑA DISCO</th><th>TAMAÑO MEMORIA</th><th>VALOR U</th><th>ACTIONS</th></tr></thead><tbody id="tbody">'
    let tableA = ' </tbody><tfoot><tr class="text-center"><th>#</th><th>NOMBRE</th><th>CATEGORIA</th><th>ESTADO</th><th>FECHA INGRESO</th><th>SERIAL</th><th>MARCA</th><th>MODELO</th><th>IMAGEN</th><th>TAMAÑA DISCO</th><th>TAMAÑO MEMORIA</th><th>VALOR U</th><th>ACTIONS</th></tr></tfoot></table></div>'
    for (const element  in data) {
      let getId = "'" + element + "'";
   
      btnActions = '<div class="btn-group " role="group" aria-label="Basic mixed styles example">' +
        '<button type="button" onclick="showElement(' + getId + ')" class="btn btn-info"><img class="img img-fluid" src="./public/assets/img/icons/eye-fill.svg"></button>' +
        '<button type="button" onclick="editElement(' + getId + ')" class="btn btn-warning"><img class="img img-fluid" src="./public/assets/img/icons/pencil-square.svg"></button>' +
        '<button type="button" onclick="deleteElement(' + getId + ')" class="btn btn-danger"><img class="img img-fluid" src="./public/assets/img/icons/trash3-fill.svg"></button>' +
        '</div>';
        
      rowTable += "<tr>" +
        "<td>" + contRow + "</td>" +        
        "<td>" + data[element].nombre + "</td>" +
        "<td>" + data[element].categoria + "</td>" +
        "<td>" + data[element].estado + "</td>" +
        "<td>" + data[element].fecha_ingreso + "</td>" +
        "<td>" + data[element].serial + "</td>" +
        "<td>" + data[element].marca + "</td>" +
        "<td>" + data[element].modelo + "</td>" +
        "<td>" + data[element].imagen + "</td>" +
        "<td>" + data[element].tamano_disco_duro + "</td>" +
        "<td>" + data[element].tamano_memoria_ram + "</td>" +
        "<td>" + data[element].valor_unitario + "</td>" +
        /*"<td>" + dataperfil[3]+ "</td>" +*/
        "<td class='text-center'>" + btnActions + "</td>" +
        "<tr>";
     
      contRow++;
    }
    this.objcontAdm.innerHTML = tableR+rowTable+tableA;
  }

  async setCreateElement(data) {
    return fetch(this.URL + ".json", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        this.getDataElements();
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*método para actualizar el usuario enviando un conjunto de datos en formato Json por parte del usuario.*/

  async setUpdateElement(id, data) {
    return fetch(this.URL + "/" + id + ".json", {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        this.getDataElements();
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }

  /*Método para eliminar el usuario. */

  async setDeleteElement(id) {
    return fetch(this.URL + "/" + id + ".json", {
      method: 'DELETE'
    })
      .then((res) => {
        if (!res.ok) {
          console.log('Result: Problem');
          return;
        }
        return res.json();
      })
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      })
      .finally();
  }
  
}