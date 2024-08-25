var is_visible = false;



function check()
{
    var input = document.getElementById("password").value;
    
    input=input.trim();
    document.getElementById("password").value=input;
    if(input.length>=8)
    {
        document.getElementById("check0").style.color="green";
    }
    else
    {
       document.getElementById("check0").style.color="#919aa3"; 
    }
    
    if(input.match(/[A-Z]/g))
    {
        document.getElementById("check1").style.color="green";
    }
    else
    {
       document.getElementById("check1").style.color="#919aa3"; 
    }
    
    if(input.match(/[0-9]/g))
    {
        document.getElementById("check2").style.color="green";
    }
    else
    {
       document.getElementById("check2").style.color="#919aa3"; 
    }
    
    if(input.match(/[^a-zA-Z\d]/g))
    {
        document.getElementById("check3").style.color="green";
    }
    else
    {
       document.getElementById("check3").style.color="#919aa3"; 
    }
    if(input.match(/[a-z]/g))
    {
        document.getElementById("check3").style.color="green";
    }
    else
    {
       document.getElementById("check3").style.color="#919aa3"; 
    }    
}
