



    // Logout function
    function logout() {
      localStorage.removeItem("isLoggedIn"); // Clear the login status
      window.location.href = "../index.html"; // Redirect to the login page
    }
        
    

/* reservation form */
function validateForm() {
	
	  var Email = document.myForm.email;
	  
	  if (Email.value === "")
    {
        window.alert("Please enter a valid email address.");
        Email.focus();
        return false;
    }
	if (Email.value.indexOf("@", 0) < 0) 
    {
        window.alert("Please enter a valid email address.");
        Email.focus();
        return false;
    }
    if (Email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid email address.");
        Email.focus();
        return false;
    }
	
	var regName = /^[a-zA-Z\s]+$/;
    var Fullname = document.myForm.fullname;
    if(!regName.test(Fullname.value)){
        alert('Please enter a valid name.');
        Fullname.focus();
        return false;
	}
	var id = document.myForm.id;
	if (id.value.length!=9 || isNaN(id.value))
   {
        window.alert("Error! Please enter a valid id.");
        id.focus();
        return false;
   }
   	var phone = document.myForm.phone;
	if (phone.value.length!=10 || isNaN(phone.value))
   {
        window.alert("Error! Please enter a valid phone number.");
        phone.focus();
        return false;
   }
  
   return true;
	
	
}



/* feedback validation*/


function addfeedback(){
    
    var regName = /^[a-zA-Z\s]+$/;
    var Name = document.myForm.name;
    if(!regName.test(Name.value)){
         window.alert("Error! Please enter a valid name");
        Name.focus();
        return false;
	}
	 
    var comeAgain = document.myForm.again;
     if(!regName.test(comeAgain.value)){
        window.alert('Please enter only letters');
        comeAgain.focus();
        return false;
	}
	
	 var feedbackNote = document.myForm.feedback;
     if(!regName.test(feedbackNote.value)){
       window.alert('Please enter only letters');
        feedbackNote.focus();
        return false;
	}
	
	alert ("Thank you for your feedback. Hope to see you again!");
    return true;
    
    
}





/* shopping cart */

function updateTotal() {
  // get all the rows of the table
  var rows = document.querySelectorAll('tbody tr');

  // initialize total and subtotal to zero
  var total = 0;
  var subtotal = 0;

  // loop through each row
  rows.forEach(function(row) {
    // get the quantity and price elements
    var quantityElement = row.querySelector('input[name="quantity"]');
    var priceElement = row.querySelector('.price');
    var subtotalElement = row.querySelector('.subtotal');

    // calculate the subtotal for this row
    var quantity = parseInt(quantityElement.value);
    var price = parseFloat(priceElement.innerText.replace('$', ''));
    subtotal = quantity * price;

    // update the subtotal element for this row
    subtotalElement.innerText = '$' + subtotal.toFixed(2);

    // add the subtotal to the total
    total += subtotal;
  });

  // update the HTML elements that display the total and subtotal
  document.querySelector('#total').innerText = '$' + total.toFixed(2);
  document.querySelector('#subtotal').innerText = '$' + subtotal.toFixed(2);
 
}


    
    


