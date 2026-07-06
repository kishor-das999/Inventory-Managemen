function login() {

    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    let message = document.getElementById("message");

    if (username === "kishor" && password === "123456") {

        message.innerHTML = "Login Successful";
        message.style.color = "green";

        
        setTimeout(function () {

            window.location.href = "home_page.html";

        }, 1000);

    }
    else {

        message.innerHTML = "Invalid Username or Password";
        message.style.color = "red";

    }

}