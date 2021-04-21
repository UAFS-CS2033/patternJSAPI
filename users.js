"usestrict";

class Model{

    async getUsers(){
        let response = await fetch('http://localhost/projects/patternMVCJS/api/getUsers.php');
        let users = await response.json();
        return users;
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

       this.button = document.getElementById('refresh');
       this.button.addEventListener("click", ev => this.showUsers());
       setInterval(ev => this.showUsers(),5000);
   }

   handler(){
       this.showUsers();
   }

   async showUsers(){
       let users = await this.model.getUsers();
       await this.view.renderTable(users);
   }
}

const controller = new Controller(new Model(),new View());
controller.showUsers();

 
/*
    register(){

        let button = document.getElementById('refresh');
        button.addEventListener("click",function(event){
           getUsers();
        });
        
        setInterval(function(){
           getUsers();
        },10000);
        
        }
*/


