/**
 * 
 */
function validate()
{
    var id = document.getElementById("PatientID").value;
    
    errors = [];
    if(id.length < 8)
    {
      errors.push("Enter patient's ID number. \nID number must be 8 digit");
    }
    if (id.length > 8)
    {
      errors.push("Enter patient's ID number \nID number must be 8 digit");
    }
    if (id.length == 8)
    {
  
      if(id.search(/[A-Z][a-z]/) >= 0)
      {
        errors.push("Enter patient's ID number cannot contain any characters");
      }
      
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
    

}