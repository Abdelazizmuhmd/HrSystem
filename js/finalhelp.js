function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}



function validateForm() {

 var stringA=/^[A-Za-z ]+$/;
  var q = document.getElementById("question").value;
  newT= q.replace(/\s+/g,' ').trim();
  q=newT;
               
    

  if(q == ""){
        alert("Question mustn't be empty");
        document.getElementById("question").style.borderColor = "red";
        return (false);
  }else if(q.length < 15){
        alert("Question must be greater than 15 char");
        document.getElementById("question").style.borderColor = "red";
        return (false);
  }else if (!q.match(stringA)) {
        alert('Question Only String is allowed');
        document.getElementById("question").style.borderColor = "red";
        return (false);
  }else if(q.length > 75){
        alert('Question too long');
        document.getElementById("question").style.borderColor = "red";
      return false;
   }
//////////////////////////////////////////////////////////////////////////////////////////
  var a = document.getElementById("answer").value;
  newA= a.replace(/\s+/g,' ').trim();
  a=newA;
              

  if(a == ""){
        alert("Answer mustn't be empty");
        document.getElementById("answer").style.borderColor = "red";
        return (false);
  }else if(a.length < 15){
        alert("Answer must be greater than 15 char");
        document.getElementById("answer").style.borderColor = "red";
        return (false);
  }else if (!a.match(stringA)) {
        alert('Answer Only String is allowed');
        document.getElementById("answer").style.borderColor = "red";
        return (false);
  }else if(a.length > 75){
        alert('answer too long');
        document.getElementById("answer").style.borderColor = "red";
      return false;
   }
}


function validateForm2() {
  
 var stringA=/^[A-Za-z ]+$/;
var q2 = document.getElementById("question2").value;
newq= q2.replace(/\s+/g,' ').trim();
   q2=newq;

  if(q2 == ""){
        alert("Question mustn't be empty");
        document.getElementById("question2").style.borderColor = "red";
        return (false);
  }else if(q2.length < 15){
        alert("Question must be greater than 15 char");
        document.getElementById("question2").style.borderColor = "red";
        return (false);
  }else if (!q2.match(stringA)) {
        alert('Question Only String is allowed');
        document.getElementById("question2").style.borderColor = "red";
        return (false);
  }else if(q2.length > 75){
        alert('answer too long');
        document.getElementById("question2").style.borderColor = "red";
      return false;
   }  
//////////////////////////////////////////////////////////////////////////////////////////
var a2 = document.getElementById("answer2").value;
newq= a2.replace(/\s+/g,' ').trim();
  a2=newq;

  if(a2 == ""){
        alert("Answer mustn't be empty");
        document.getElementById("answer2").style.borderColor = "red";
        return (false);
  }else if(a2.length < 15){
        alert("Answer must be greater than 15 char");
        document.getElementById("answer2").style.borderColor = "red";
        return (false);
  }else if (!a2.match(stringA)) {
        alert('Answer Only String is allowed');
        document.getElementById("answer2").style.borderColor = "red";
        return (false);
  }else if(a2.length > 75){
        alert('answer too long');
        document.getElementById("answer2").style.borderColor = "red";
      return false;
   } 

}


  function checkDelete(){
    return confirm('Are you sure?');
  }