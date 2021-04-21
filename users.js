"usestrict";

class Model{

    async getUsers(){
        let response = await fetch('http://localhost/projects/patternMVCJS/api/getUsers.php');
        let users = await response.json();
        return users;
    }

    async addUser(formData){
        const formDataText = Object.fromEntries(formData.entries());
        const formDataJSON = JSON.stringify(formDataText);
        console.log(formDataJSON);

        const fetchOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: formDataJSON
        };

        const response = await fetch('http://localhost/projects/patternJSAPI/api/addUser.php',fetchOptions);
        const result = response.json();
        console.log("result: "+result);
        return result;
    }



}

class View{

    async renderTable(users){
        let table = document.getElementById('usertable');
        let view = "<thead><tr><th>User ID</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Username</th><th>Password</th></tr></thead><tbody>";
        users.forEach(user => {
            view = view + "<tr><td>" + user['userID'] + "</td><td>" + user['lastname'] + "</td><td>" + 
                    user['firstname'] + "</td><td>" + user['email'] + "</td><td>"  + user['username']
                    + "</td><td>" + user['passwd'] + "</td></tr>";
        });
        table.innerHTML=view;
        let message = document.getElementById('message');
        message.innerHTML = "Updated: " + new Date();
    }

}

class Controller{

   constructor(model,view){
        this.model=model;
        this.view=view;
        this.attachListeners();
   }

   attachListeners(){
        const button = document.getElementById('refresh');
        button.addEventListener("click", (event) => this.showUsers());
        setInterval( (event) => this.showUsers(),5000);
        const userform = document.getElementById('user-form');
        userform.addEventListener('submit',(event) => this.handleFormSubmit(event));
   }

   async handleFormSubmit(event){
        event.preventDefault();

        const form = event.currentTarget;
        const formData = new FormData(form);
        console.log("FormData:" + formData);
        const responseData = await this.model.addUser(formData);
   }

   async showUsers(){
       let users = await this.model.getUsers();
       await this.view.renderTable(users);
   }
}

const controller = new Controller(new Model(),new View());
controller.showUsers();

  