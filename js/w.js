
var start = 1990;
var end = 2020;
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;
////////////////////////////////////////////////////////////////////////////
var start = 1;
var end = 12;
var options = "";
for(var month = start ; month <=end; month++){
  options += "<option>"+ month +"</option>";
}
document.getElementById("month").innerHTML = options;
//////////////////////////////////////////////////////////////////
var start = 1;
var end = 31;
var options = "";
for(var day = start ; day <=end; day++){
  options += "<option>"+ day +"</option>";
}
        document.getElementById("day").innerHTML = options;
        document.getElementById("gender").value="<?php echo $row['gender'];  ?>"
        document.getElementById("worktype").value="<?php echo $row['worktype'];  ?>"
        document.getElementById("worklocation").value="<?php echo $row['location'];  ?>"
        document.getElementById("jobtitle").value="<?php echo $row['jobtitle'];  ?>"
        document.getElementById("day").value="<?php echo $row['day'];  ?>"
        document.getElementById("month").value="<?php echo $row['month'];  ?>"
        document.getElementById("year").value="<?php echo $row['year'];  ?>"  


      function validateForm() {
  var x = document.getElementById("name").value;
  var u = document.getElementById("username").value;
  var p = document.getElementById("password").value;
  var n = document.getElementById("nationality").value;
  var y = document.getElementById("year");
  var m = document.getElementById("month");
  var d = document.getElementById("day");
  var cv=document.getElementById("cv").value;
  var photo=document.getElementById("photo").value;
  var mailformat = document.getElementById('email').value;

          if(x!=0){

if(x.length<5)
{
    alert("name id too short");
    document.getElementById("name").style.borderColor = "red";
    return (false)   
}

else if(x.length>15)
{
        alert("name is too long");
    document.getElementById("name").style.borderColor = "red";
    return (false)   
}
else if (!x.match(/^[a-zA-Z]+$/)) 
    {
        alert('name Only alphabets are allowed');
        return false;
    }else{

        document.getElementById("name").style.borderColor = "white";

    }
          }
/////////////////////////////////////////////////////

            if(u!=0){

 if(u.length<5)
{
        alert("username id too short");
    document.getElementById("username").style.borderColor = "red";
    return (false)   
}

else if(u.length>15)
{
    alert("username is too long");
    document.getElementById("username").style.borderColor = "red";
    return (false)   
}else if (!u.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
      document.getElementById("username").style.borderColor = "red";
        return false;
    }else{

        document.getElementById("username").style.borderColor = "white";

    }
            }
///////////////////////////////////////////////////////////////////////
          if(mailformat!=0){
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mailformat))
  {
              document.getElementById("email").style.borderColor = "white";

  }
 
  else {
        document.getElementById("email").style.borderColor = "red";

        alert("You have entered an invalid email address! or empty field")
    return (false)
  }
          }
    //////////////////////////////////////////////////////
  if(p != ""){
  if(p.length>25)
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
    }else{

        document.getElementById("password").style.borderColor = "white";

    }
  }

  ////////////////////////////////////////////////////////////////
          
  if(n != ""){

  
 if(n.length<5)
{
        alert("nationality is too short");
    document.getElementById("nationality").style.borderColor = "red";
    return (false)   
}

else if(n.length>20)
{
        alert("nationality is too long");
    document.getElementById("nationality").style.borderColor = "red";
    return (false)   
}
else if (!n.match(/^[a-zA-Z]+$/)) 
    {
        alert(' nationality Only alphabets are allowed');
        return false;
    }else{

        document.getElementById("nationality").style.borderColor = "white";

    }
  }
  //////////////////////////////////////////////////


   /////////////////////////////////////////////////
  if(!cv=="")
  { 
     if(!cv.endsWith(".doc")&&!cv.endsWith(".txt")&&!cv.endsWith(".pdf")){
    alert("wrong document file extination")
       return false;
  }

  }
            
  ////////////////////////////////////////////////
            
  if(!photo=="")
  { if(!photo.endsWith(".png")&&!photo.endsWith(".jpg")&&!photo.endsWith(".GIF")){
    alert("wrong  image file extination")
      return false;

  }
            



}

      }
