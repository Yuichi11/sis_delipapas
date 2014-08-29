$(document).ready(function() {
    
    $('#telefono_emp').number(true,0,',','');
    $('#dni_emp').number(true,0,',','');
    $('#afp_emp').number(true,1);
    $('#afp_emp').keyup(function (){
        var afp = $(this).val();
        if (afp > 100){
            $(this).val("100");
        }
    });
    
    
});