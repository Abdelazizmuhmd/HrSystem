function validateForm() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var combo = document.getElementById("combo").value;


     if (username.match(/^[0-9]+$/) != null){
     alert("username must be only string");
     document.getElementById("username").style.borderColor = "red";
        return (false);
     }

   if(username == "" || username > 30 || username < 6){
        alert("username must be filled out or the username length isn't right");
        
        document.getElementById("username").style.borderColor = "red";
        return (false);

  }


  if(password == "" || password > 30 || password < 6){
          alert("password must be filled out or the password length isn't right");
          document.getElementById("password").style.borderColor = "red";
          return (false);

  }

  if(combo == "" || combo == "Login As"){
    alert("Must Choose");
          document.getElementById("combo").style.borderColor = "red";
          return (false);
  }
}
