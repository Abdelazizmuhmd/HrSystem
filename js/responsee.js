document.getElementById("EmployeeNameId").innerHTML = document.getElementById("employeeNameId").innerHTML;
         function transfer(){
             var check= true;
             var numbers = /^[0-9]+$/;
             var String =/^[A-Za-z]+$/;
             var stringA=/^[A-Za-z ]+$/;
             
             
    var vA= document.getElementById("addressId").value;
    newA= vA.replace(/\s+/g,' ').trim();
    document.getElementById("addressId").value=newA;
             
             
    var vT= document.getElementById("letterId").value;
    newT= vT.replace(/\s+/g,' ').trim();
    document.getElementById("letterId").value=newT;
               
             

             
     if(!document.getElementById("zipId").value.match(numbers))
      {
          alert("enter numbers only in zip");
          check=false;
          document.getElementById("zipId").style.borderColor = "red";
      }  
      
     else if (document.getElementById("zipId").value.length <2){
             alert("please zip code is too short");
                   check=false;
         document.getElementById("zipId").style.borderColor = "red";


         } else  if(!document.getElementById("zipId").value>5)
      {
          alert("please zip is too long");
                   check=false;
            document.getElementById("zipId").style.borderColor = "red";

      }   
             
             
                      
   else  if(!document.getElementById("telephoneId").value.match(numbers))
      {
          alert("enter numbers only in Telephone");
             check=false;
          document.getElementById("telephoneId").style.borderColor = "red";

      }   
    else  if (document.getElementById("telephoneId").value.length > 12){
             alert("telephone is too long ");
                   check=false;
     document.getElementById("telephoneId").style.borderColor = "red";


      }  else  if (document.getElementById("telephoneId").value.length <8){
             alert("telephone is too short");
                   check=false;
     document.getElementById("telephoneId").style.borderColor = "red";


      }else if (newA.length>18){
             alert("too long address");
                check=false;
               document.getElementById("addressId").style.borderColor = "red";

          
      }else if (!newA.match(stringA)){
             alert("Addres Must be String Only");
             check=false;
            document.getElementById("addressId").style.borderColor = "red";

      }else if (newA.length<5){
             alert("too short address");
          check=false;
          document.getElementById("addressId").style.borderColor = "red";

      } else if (document.getElementById("cityId").value.length>7){
             alert("too long city ");check=false;
                      document.getElementById("cityId").style.borderColor = "red";

      }else if (!document.getElementById("cityId").value.match(String)){
             alert("city Must be String Only");check=false;
                                document.getElementById("cityId").style.borderColor = "red";

      }else if (document.getElementById("cityId").value.length<2){
             alert(" city is too short ");check=false;
                                document.getElementById("cityId").style.borderColor = "red";

      }else if (document.getElementById("stateId").value.length>4){
             alert("too long state ");check=false;
                document.getElementById("stateId").style.borderColor = "red";

      }else if (!document.getElementById("stateId").value.match(String)){
             alert("state Must be String Only");check=false;
           document.getElementById("stateId").style.borderColor = "red";
      }else if (document.getElementById("stateId").value.length<2){
             alert(" state is too short ");check=false;
           document.getElementById("stateId").style.borderColor = "red";
      }else if (newT.length>18){
             alert("too long Title  ");check=false;
           document.getElementById("letterId").style.borderColor = "red";
      }else if (!newT.match(stringA)){
             alert("title Must be String Only");check=false;
           document.getElementById("letterId").style.borderColor = "red";
      }else if (newT.length<4){
             alert(" Title is too short ");check=false;
           document.getElementById("letterId").style.borderColor = "red";
      }
             
        if(check){
    if(document.getElementById("cityId").value!=""&&document.getElementById("stateId").value!=""&&document.getElementById("zipId").value!=""&&document.getElementById/("telephoneId").value!=""&&document.getElementById("addressId").value!=""&&document.getElementById("letterId").value!=""){
     document.getElementById("locationId").innerHTML=
     document.getElementById("cityId").value+"/"+document.getElementById("stateId").value+"/"+document.getElementById("zipId").value;
     document.getElementById("telephone").innerHTML = document.getElementById("telephoneId").value;
     document.getElementById("address").innerHTML = document.getElementById("addressId").value;
     document.getElementById("letterType").innerHTML = document.getElementById("letterId").value;
  
        
        document.getElementById("cityId").style.borderColor = "	#F8F8F8		";
        document.getElementById("stateId").style.borderColor = "	#F8F8F8			";
        document.getElementById("zipId").style.borderColor = "	#F8F8F8			";
        document.getElementById("telephoneId").style.borderColor = "	#F8F8F8			";
        document.getElementById("addressId").style.borderColor = "	#F8F8F8			";
        document.getElementById("letterId").style.borderColor = "	#F8F8F8			";
          return true;
        
    }
             else{
                alert("please fill all fields");
                 
             }
         }else{
             return false;
         }
         }



function messageCheck(){
    
      var v= document.getElementById("messageId").value;
    newM= v.replace(/\s+/g,' ').trim();
    document.getElementById("messageId").value=newM;
    
        if(newM.length>700){
            alert("comment is too large");
            return false;
        }
       else if(newM.length<8){
            alert("comment is too small");
            return false;
        }
        else if(!newM.match(/^[a-zA-Z0-9 ]*$/)){
            alert("comment must be string only");
            return false;
        }else if(newM==""){
            alert("message can't be empty");
            return false;
        }
    
 
    return true;
}























