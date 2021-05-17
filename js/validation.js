const form  = document.getElementsByTagName('form')[0];
const email = document.getElementById('email');
const error = document.querySelector('.error');
const formValidate = document.querySelector('.form-content');
const checkbox = document.querySelector('.checkbox-content__input');
const validationContentStart = document.querySelector('.content');

formValidate.setAttribute('novalidate', true);

email.addEventListener("input", function (event) {
  
  let domainArray = new Array();
  let simbolPointArray = new Array();
  let domainFirstLetter = "";
  let domainSecondLetter = "";
  
  window.onkeyup = keyup;
    function keyup(e){
      let inputTextValue = e.target.value;
      let emailArray = inputTextValue.split('');
          for (var i = 0; i < emailArray.length; i++){
            var index = emailArray[i];
              if(index == "."){
                  simbolPointArray.push(i);    
                }  
            }
    
    for (let i = (simbolPointArray[simbolPointArray.length - 1] + 1); i < emailArray.length; i++) {
      domainArray.push(emailArray[i]); 
              if(domainArray.length == 2){
                      domainFirstLetter = domainArray[0];
                      domainSecondLetter = domainArray[1]; 
                  }
                  if (domainArray.length == 2 && (domainFirstLetter == "c" && domainSecondLetter == "o")) {
                    error.innerHTML = "We are not accepting subscriptions from Colombia emails";
                    error.className = "error"; 
                    event.preventDefault();
                  } else {
                      error.innerHTML = "";
                    }
      } 
    
  }

  if(email.validity.valueMissing) {
    error.innerHTML = "Email adress is required";
     error.className = "error";          
     event.preventDefault();
  } else if (!email.validity.valid) {
       error.innerHTML = "Please provide a valid e-mail adress";
       error.className = "error";
       event.preventDefault(); 
  } else {
       error.innerHTML = "";
     }

   }, false);

   function validation(val) { 
    
    const emailArray = val.split('');
    let simbolPointArray = new Array();
    let domainArray = new Array();
    let domainFirstLetter = "";
    let domainSecondLetter = "";
    for (var i = 0; i < emailArray.length; i++) {
          var index = emailArray[i];
              if(index == "."){
                  simbolPointArray.push(i);    
            }     
    }
    for (let i = (simbolPointArray[simbolPointArray.length - 1] + 1); i < emailArray.length; i++) {
      domainArray.push(emailArray[i]); 
              if(domainArray.length == 2){
                              domainFirstLetter = domainArray[0];
                              domainSecondLetter = domainArray[1]; 
                  }
    }   
  
     form.addEventListener("submit", function (event) {
      
      if(email.validity.valueMissing) {
        error.innerHTML = "Email adress is required";
         error.className = "error";          
         event.preventDefault();
      } else if (!email.validity.valid) {
        error.innerHTML = "Please provide a valid e-mail adress";
        error.className = "error _active";
        event.preventDefault();
        
      } else if (domainArray.length == 2 && (domainFirstLetter == "c" && domainSecondLetter == "o")) {
        error.innerHTML = "We are not accepting subscriptions from Colombia emails";
        event.preventDefault();
       
        
      }else if(!checkbox.checked) {
        error.innerHTML = "You must accept the terms and conditions";
        error.className = "error _active";
        event.preventDefault();
      }else{
        document.body.appendChild(form);
        
        // alert("Form Sent");
      
      }
    }, false);
};
  
     