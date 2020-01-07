var start = 1990;
var end = 2020;
var options = "";
options+="<option>"+ "Year" +"</option>";

for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}

document.getElementById("year").innerHTML = options;

////////////////////////////////////////////////////////////////////////////
var start = 1;
var end = 12;
var options = "";
options+="<option>"+ "Month" +"</option>";
for(var month = start ; month <=end; month++){
  options += "<option>"+ month +"</option>";
}
document.getElementById("month").innerHTML = options;
//////////////////////////////////////////////////////////////////
var start = 1;
var end = 31;
var options = "";
options+="<option>"+ "Day" +"</option>";
for(var day = start ; day <=end; day++){
  options += "<option>"+ day +"</option>";
}
document.getElementById("day").innerHTML = options;
 
function validateForm() {
  var x = document.getElementById("name").value;
  var u = document.getElementById("username").value;
  var p = document.getElementById("password").value;
  var n = document.getElementById("Nationality").value;
  var y = document.getElementById("year").value;
  var m = document.getElementById("month").value;
  var d = document.getElementById("day").value;
  var cv=document.getElementById("cv").value;
  var photo=document.getElementById("photo").value;
  var mailformat = document.getElementById('email').value;

  if (x == "") {
    alert("Name must be filled out");
    document.getElementById("name").style.borderColor = "red";
    return false;

  }

  else if(x.length<5)
{
    alert("name id too short");
    document.getElementById("name").style.borderColor = "red";
    return false;
}

else if(x.length>20)
{
    alert("name is too long");
    document.getElementById("name").style.borderColor = "red";
    return false;   
}
if (!x.match(/^[a-zA-Z]+$/)) 
    {
        alert('name Only alphabets are allowed');
        return false;
    }

/////////////////////////////////////////////////////
  if(u == ""){
        alert("username must be filled out");
        
        document.getElementById("username").style.borderColor = "red";
        return false;

  }
  
else if(u.length<5)
{
        alert("username id too short");
    document.getElementById("username").style.borderColor = "red";
    return false;
}

else if(u.length>20)
{
    alert("username is too long");
    document.getElementById("username").style.borderColor = "red";
    return false;  
}else if (!u.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
        return false;
    }

///////////////////////////////////////////////////////////////////////
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mailformat))
  {
  }
 
  else{
        document.getElementById("email").style.borderColor = "red";

        alert("You have entered an invalid email address! or empty field")
    return (false)
  }
    
    //////////////////////////////////////////////////////
  if(p == ""){
          alert("password must be filled out ")
          document.getElementById("password").style.borderColor = "red";
          return (false)

  }

 else if(p.length>25)
{
        alert("pssword is too long");
    document.getElementById("pssword").style.borderColor = "red";
    return (false)   
}

else if(p.length<5)
{
        alert("password is too short");
    document.getElementById("password").style.borderColor = "red";
    return (false)   
}else if (!p.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
        return false;
    }

  ////////////////////////////////////////////////////////////////
if(n == ""){
          alert("Nationality must be filled out")
          document.getElementById("Nationality").style.borderColor = "red";
          return false;

  }
  
else if(n.length<5)
{
        alert("nationality is too short");
    document.getElementById("Nationality").style.borderColor = "red";
    return false;
}

else if(n.length>20)
{
        alert("nationality is too long");
    document.getElementById("Nationality").style.borderColor = "red";
    return false;
}
if (!n.match(/^[a-zA-Z]+$/)) 
    {
        alert(' nationality Only alphabets are allowed');
        return false;
    }
     
  //////////////////////////////////////////////////

  if(y.selectedIndex == 0){
          alert("you must choose year")
          document.getElementById("year").style.borderColor = "red";
          return (false)

  }
  if(m.selectedIndex == 0){
          alert("you must choose month")
          document.getElementById("month").style.borderColor = "red";
          return (false)

  }
  if(d.selectedIndex == 0){
          alert("you must choose day")
          document.getElementById("day").style.borderColor = "red";
          return false;

  }
   /////////////////////////////////////////////////
    if(!cv=="")
  { 
    if(!cv.endsWith(".pdf")){
    alert("wrong document file extination")
    return false;
  }

  }else{
      alert("please upload document");
      return false;
  }
            
  ////////////////////////////////////////////////
            
  if(!photo=="")
  { if(!photo.endsWith(".png")&&!photo.endsWith(".jpg")&&!photo.endsWith(".GIF")){
    alert("wrong  image file extination")
      return false;
  }}
else{
      alert("please upload image");
      return false;
  }
        
}


    
    