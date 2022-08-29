$(document).ready(function(){
  //alert("Hii manoj kumar");
  $('#selectAllBoxes').click(function(event){
    if(this.checked){
      $('.checkBoxes').each(function(){
        this.checked=true;
      });
    }else{
      $('.checkBoxes').each(function(){
        this.checked=false;
      });
    }
  });
});
