$(document).ready(function(){

    $(document).on("click", "#picture", function(event){
        document.getElementById('imageUri').value += this.alt+',';
    });

});