tinymce.init({ selector:'textarea' });
$(document).ready(function(){
    $('#selectAllboxes').click(function (){

    if(this.checked){
        $('.checkBoxes').each(function(){
           this.checked = true;
        });

    } else {
        $('.checkBoxes').each(function () {
            this.checked = false;
        });
    }


    });
});