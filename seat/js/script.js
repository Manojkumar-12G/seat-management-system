         /********************Dependent dropdowns*************************/
// window.onload=function(){
var buildings={
  MTP:['1','2','3','4','5','6','7','8','9','10'],
  EGL:['1','2','3','4','5','6','7','8','9','10','11','12','13','14'],
  FTP:['1','2','3','4','5']
}


//getting the main and sub menus

var main=document.getElementById('main_menu');
var sub=document.getElementById('sub_menu');

//trigger the event when main change occurs
if(main){//if staement is used to avoid error in console because script file is loading before document loads
main.addEventListener('change',function(){

    //getting  a selected option

    var selected_option =buildings[this.value];

    //removing the sub menu options using while loop


    while(sub.options.length>0){
        sub.options.remove(0);
    }



    //convert the selected object into array and create options for each array elements
        //using options constructor it will create html element with the given value and innerText

        Array.from(selected_option).forEach(function(e){
            let option =new Option(e,e);

            //append the child option in sub menu

            sub.appendChild(option);
        });
    });
  }


    /*******************seat validation**********************/

  main_menu=  document.getElementById('main_menu');
  sub_menu=  document.getElementById('sub_menu');

  if(main_menu){
    // to avoid error because script file is loading before document loads
    main_menu.addEventListener('blur',validateBuilding);
  }
  if(sub_menu){
    sub_menu.addEventListener('blur',validateFloor);
  }

    function validateBuilding(){
      const building=document.getElementById('main_menu');
      const valid=document.querySelector('.validate-building');
      // console.log(valid);
      const re=/^[a-zA-z]{3,28}$/;

      if(!re.test(building.value)){
          valid.style.display='block';
      }else{
        valid.style.display='none';
      }
    }

    function validateFloor(){
      const floor=document.getElementById('sub_menu');
      const valid=document.querySelector('.validate-floor');
      // console.log(valid);
      const re=/^([1-9]{1,3})$/;

      if(!re.test(floor.value)){
          valid.style.display='block';
      }else{
        valid.style.display='none';
      }
    }

    /*****************submissiom of add form****************/
  add_form=  document.querySelector(".add-form");
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
      const building =  document.getElementById('main_menu');
    const floor =  document.getElementById('sub_menu');
    const type =  document.getElementById('type');
    const wifi =  document.getElementById('wifi');

         if(building.value===''||floor.value===''||type.value===''||wifi.value===''){
            showError("Please Select all  details");
         }else{
            //clear values
          building.value='';floor.value='';type.value='';wifi.value='';

            //display sent message
            document.querySelector('.sent-message').style.display='block';
            //clear sent message after 3 seconds
            setTimeout(clearSentMessage,3000);
         }
    }

    /*******ClearSentMessage****/
    function clearSentMessage(){
      console.log("jai manoj");
      document.querySelector('.sent-message').style.display='none';
    }


    /********showError*******/
    function showError(errormsg){
      const valid=document.querySelector('.validate-building');
      valid.style.display='block';

      const evalid=document.querySelector('.validate-floor');
      evalid.style.display='block';

      const tvalid=document.querySelector('.validate-type');
      tvalid.style.display='block';

      const wvalid=document.querySelector('.validate-wifi');
      wvalid.style.display='block';
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
      //Clear error after 5 seconds
      setTimeout(clearError,5000);
    }

    //Clear error div
    function clearError(){
      const valid=document.querySelector('.validate-building');
      valid.style.display='none';
      const evalid=document.querySelector('.validate-floor');
      evalid.style.display='none';
      const tvalid=document.querySelector('.validate-type');
      tvalid.style.display='none';
      const wvalid=document.querySelector('.validate-wifi');
      wvalid.style.display='none';
      document.querySelector('.error').remove();
    }




    /*********************update form**************************/

    update_form=document.getElementById('update_form');
    if(update_form){
      update_form.addEventListener('submit',usendMessage);
    }

    function usendMessage(e){
      console.log("hello");
         //document.querySelector('.loading').style.display='block';
         setTimeout(umessageResult,2000);
      //e.preventDefault();
    }

    function umessageResult(){
      const building =  document.getElementById('main_menu');
    const floor =  document.getElementById('sub_menu');
    const type =  document.getElementById('type');
    const wifi =  document.getElementById('wifi');

         if(building.value===''||floor.value===''||type.value===''||wifi.value===''){
            ushowError("Please Select all  details");
         }else{
            //clear values
          // building.value='';floor.value='';type.value='';wifi.value='';

            //display sent message
            document.querySelector('.sent-message').style.display='block';
            //clear sent message after 3 seconds
            setTimeout(uclearSentMessage,3000);
         }
    }

    /*******ClearSentMessage****/
    function uclearSentMessage(){
      console.log("jai manoj");
      document.querySelector('.sent-message').style.display='none';
    }


    /********showError*******/
    function ushowError(errormsg){
      const valid=document.querySelector('.validate-building');
      valid.style.display='block';

      const evalid=document.querySelector('.validate-floor');
      evalid.style.display='block';

      const tvalid=document.querySelector('.validate-type');
      tvalid.style.display='block';

      const wvalid=document.querySelector('.validate-wifi');
      wvalid.style.display='block';
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
      //Clear error after 5 seconds
      setTimeout(uclearError,5000);
    }

    //Clear error div
    function uclearError(){
      const valid=document.querySelector('.validate-building');
      valid.style.display='none';
      const evalid=document.querySelector('.validate-floor');
      evalid.style.display='none';
      const tvalid=document.querySelector('.validate-type');
      tvalid.style.display='none';
      const wvalid=document.querySelector('.validate-wifi');
      wvalid.style.display='none';
      document.querySelector('.error').remove();
    }

    // apply=document.querySelector('.apply-form');
    // if(apply){
    //   apply.addEventListener('click',asendMessage);
    // }
    //
    // function asendMessage(){
    //   confirm("Are you sure you want to apply");
    // }
