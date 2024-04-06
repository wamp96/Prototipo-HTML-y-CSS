
/**
 * Author:WILLIAN ANDRES MORENO PRIETO
 * Date:26/03/2024
 * Description:Clases de proyecto
 * 
*/

class User {
  /*Metodo constructor*/
  constructor(idcont,formUser) {
    this.objTbody = document.getElementById(idcont);
    this.objformUser = document.getElementById(formUser);
    this.URL = "https://wm-inventory-default-rtdb.firebaseio.com/api/usuario"

  }

  /*Método para obtener datos de los usuarios*/
  async getDataUsers() {
    console.log(this.objformUser)
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
    let tableR = '<div style=" margin-top: 120px;" class="table-responsive tableApp"><table class="table table-dark table-striped table-hover"><thead><tr class="text-center"><th>#</th><th>NOMBRE</th><th>AREA</th><th>CIUDAD</th><th>CORREO</th><th>ID_PERFIL</th><th>NOMBRE_PERFIL</th><th>ESTADO</th><th>ROL</th><th>CONTRASEÑA</th><th>ACTIONS</th></tr></thead><tbody id="tbody">'
    let tableA = ' </tbody><tfoot><tr class="text-center"><th>#</th><th>NOMBRE</th><th>AREA</th><th>CIUDAD</th><th>CORREO</th><th>ID_PERFIL</th><th>NOMBRE_PERFIL</th><th>ESTADO</th><th>ROL</th><th>CONTRASEÑA</th><th>ACTIONS</th></tr></tfoot></table></div>'
    for (const user  in data) {
      
      let datauser= data[user].perfil;
      //console.log(datauser);
      
      let dataperfil = Object.values(datauser);

      console.log(dataperfil);

      let getId = "'" + user + "'";
      btnActions = '<div class="btn-group " role="group" aria-label="Basic mixed styles example">' +
        '<button type="button" onclick="showUser(' + getId + ')" class="btn btn-info"><img class="img img-fluid" src="./public/assets/img/icons/eye-fill.svg"></button>' +
        '<button type="button" onclick="editUser(' + getId + ')" class="btn btn-warning"><img class="img img-fluid" src="./public/assets/img/icons/pencil-square.svg"></button>' +
        '<button type="button" onclick="deleteUser(' + getId + ')" class="btn btn-danger"><img class="img img-fluid" src="./public/assets/img/icons/trash3-fill.svg"></button>' +
        '</div>';
        
      rowTable += "<tr>" +
        "<td>" + contRow + "</td>" +
        "<td>" + data[user].nombre + "</td>" +
        "<td>" + data[user].area + "</td>" +
        "<td>" + data[user].ciudad + "</td>" +
        "<td>" + data[user].correo + "</td>" +
        "<td>" + dataperfil[2]+ "</td>" +
        "<td>" + dataperfil[3]+ "</td>" +
        "<td>" + dataperfil[1]+ "</td>" +
        "<td>" + dataperfil[4]+ "</td>" +
        "<td>" + dataperfil[0]+ "</td>" +
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


