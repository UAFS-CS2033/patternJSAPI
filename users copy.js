async function getUsers(){
    let response = await fetch('http://localhost/projects/patternMVCJS/api/getUsers.php');
    let users = await response.json();
    await renderTable(users);
    return users;
}

async function renderTable(users){
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

let button = document.getElementById('refresh');
button.addEventListener("click",function(event){
   getUsers();
});

setInterval(function(){
   getUsers();
},10000);

