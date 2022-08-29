/*******************username validation**********************/

const emp_name=document.getElementById('emp_name');
const emp_email=document.getElementById('emp_email');
if(emp_name){
  emp_name.addEventListener('blur',validateName);
}
if(emp_email){
  emp_email.addEventListener('blur',validateEmail);
}
function validateName(){
  const name=document.getElementById('emp_name');
  const valid=document.querySelector('.validate-name');
  // console.log(valid);
  const re=/^[a-zA-z]{3,28}$/;

  if(!re.test(name.value)){
      valid.style.display='block';
  }else{
    valid.style.display='none';
  }
}

function validateEmail(){
  const email=document.getElementById('emp_email');
  const valid=document.querySelector('.validate-email');
  // console.log(valid);
  const re=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

  if(!re.test(email.value)){
      valid.style.display='block';
  }else{
    valid.style.display='none';
  }
}

/*****************submissiom of add form****************/
const add_form=document.querySelector(".add-form");
if(add_form){
  add_form.addEventListener('submit',sendMessage);
}
function sendMessage(){
  console.log("hello");
     //document.querySelector('.loading').style.display='block';
     setTimeout(messageResult,2000);
  //e.preventDefault();
}

function messageResult(){
  const name =  document.getElementById('emp_name');
const email =  document.getElementById('emp_email');
const manager =  document.getElementById('manager');

     if(name.value===''||email.value===''||manager.value===''){
        showError("Please fill all  details");
     }else{
        //clear values
        name.value='';email.value='';manager.value='';
        //display sent message
        document.querySelector('.sent-message').style.display='block';
        //clear sent message after 5 seconds
        setTimeout(clearSentMessage,5000);
     }
}

/*******ClearSentMessage****/
function clearSentMessage(){
  console.log("jai manoj");
  document.querySelector('.sent-message').style.display='none';
}


/********showError*******/
function showError(errormsg){
  const valid=document.querySelector('.validate-name');
  valid.style.display='block';

  const evalid=document.querySelector('.validate-email');
  evalid.style.display='block';

  const mvalid=document.querySelector('.validate-manager');
  mvalid.style.display='block';

  //Create div element
 const errorDiv=document.createElement('div');
 //Get elements
  const formGroup=document.querySelector(".adc");
  const formSend=document.querySelector(".add-form");
  //Add class
  errorDiv.className='error';
  //Create text node and append to div
  console.log(errormsg);
  errorDiv.appendChild(document.createTextNode(errormsg));

  //Insert error above submit button
  formGroup.insertBefore(errorDiv,formSend);
  //Clear error after 3 seconds
  setTimeout(clearError,3000);
}

//Clear error div
function clearError(){
  const valid=document.querySelector('.validate-name');
  valid.style.display='none';
  const evalid=document.querySelector('.validate-email');
  evalid.style.display='none';
  const mvalid=document.querySelector('.validate-manager');
  mvalid.style.display='none';
  document.querySelector('.error').remove();
}

/***************************Submission of update form******************************/

const update_form=document.querySelector(".update-form");
if(update_form){
  update_form.addEventListener('submit',usendMessage);
}
function usendMessage(){
  console.log("hello");
     //document.querySelector('.loading').style.display='block';
     setTimeout(umessageResult,2000);
  //e.preventDefault();
}

function umessageResult(){
  const name =  document.getElementById('emp_name');
const email =  document.getElementById('emp_email');
const manager =  document.getElementById('manager');

     if(name.value===''||email.value===''||manager.value===''){
        ushowError("Please fill all  details");
     }else{
        //clear values
        // name.value='';email.value='';manager.value='';
        //display sent message
        document.querySelector('.sent-message').style.display='block';
        //clear sent message after 5 seconds
        setTimeout(uclearSentMessage,5000);
     }
}

/*******ClearSentMessage****/
function uclearSentMessage(){
  console.log("jai manoj");
  document.querySelector('.sent-message').style.display='none';
}


/********showError*******/
function ushowError(errormsg){
  const valid=document.querySelector('.validate-name');
  valid.style.display='block';

  const evalid=document.querySelector('.validate-email');
  evalid.style.display='block';

  const mvalid=document.querySelector('.validate-manager');
  mvalid.style.display='block';

  //Create div element
 const errorDiv=document.createElement('div');
 //Get elements
  const formGroup=document.querySelector(".adc");
  const formSend=document.querySelector(".add-form");
  //Add class
  errorDiv.className='error';
  //Create text node and append to div
  console.log(errormsg);
  errorDiv.appendChild(document.createTextNode(errormsg));

  //Insert error above submit button
  formGroup.insertBefore(errorDiv,formSend);
  //Clear error after 3 seconds
  setTimeout(uclearError,3000);
}

//Clear error div
function uclearError(){
  const valid=document.querySelector('.validate-name');
  valid.style.display='none';
  const evalid=document.querySelector('.validate-email');
  evalid.style.display='none';
  const mvalid=document.querySelector('.validate-manager');
  mvalid.style.display='none';
  document.querySelector('.error').remove();
}
