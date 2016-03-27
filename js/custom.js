document.getElementById("loginButton").onclick = function() {
    if (document.getElementById("userName").value.length > 0 && document.getElementById("password").value.length > 0){
        window.location.href = "welcome.html";
    }
    else if (document.getElementById("userName").value.length == 0){
        window.alert("Fill user name box!");
    }
    else{
        window.alert("Fill password!");
    }

};
