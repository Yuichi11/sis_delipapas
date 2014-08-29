$(document).ready(function() {
    
    $('#telefono_emp').inputmask("mask", {"mask": "(99) 999-9999"});
    $('#dni_emp').number(true, 0, ',', '');
    $('#afp_emp').number(true, 1);
    $('#afp_emp').keyup(function() {
        var afp = $(this).val();
        if (afp > 100) {
            $(this).val("100");
        }
    });

    $('#dni_emp').keyup(function() {
        var dni = $(this).val();
        var sw = true;
        $('#empleados-reg tr').each(function() {
            var dni_reg = $(this).find('td').eq(4).html();
            if (dni == dni_reg) {
                $('#dni_emp').parent().addClass('has-error');
                $('#dni_emp').parent().find('label').html('<i class="fa fa-times-circle-o"></i> D.N.I.: * Ya se encuentra asociado con otro empleado');
                $('#registrar_emp').prop('disabled', true);
                sw = false;
                return false;
            }
        });
        if (sw) {
            $('#dni_emp').parent().removeClass('has-error');
            $('#dni_emp').parent().find('label').html('D.N.I.: * <span class="text-muted" style="font-style: italic;">(Debe contener 8 dígitos)</span>');
            $('#registrar_emp').prop('disabled', false);

            if ($('#dni_emp').length == 8) {
                $('#dni_emp').parent().addClass('has-success');
                $('#dni_emp').parent().find('label').html('<i class="fa fa-check"></i> D.N.I.: * ¡Correcto!');
            }
        }
    });

});