const URI = "https://wm-inventory-default-rtdb.firebaseio.com/api/usuario";

window.addEventListener('DOMContentLoaded', function () {
    return fetch(URI + ".json")
        .then((res) => {
            if (!res.ok) {
                console.log('Result: Problem');
                return;
            }
            return res.json();
        })
        .then((data) => {
            //this.setTableUser(data);
            console.log(data[1].ciudad);
        })
        .catch((error) => {
            console.error(error);
        })
        .finally();
});

class Usuario {
    constructor(idcont) {
        this.URL = "https://wm-inventory-default-rtdb.firebaseio.com/api/";
        this.UrlUser = this.URL + "user/";
        this.getDataUsers();
    }


    async getDataUsers() {
        return fetch(this.UrlUser + ".json")
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






}



