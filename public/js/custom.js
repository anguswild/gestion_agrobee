jQuery(function(){
    $("#tipo").select2({
        placeholder: "Seleccione Tipo de Usuario"
    });

    $("#roles").select2({
        placeholder: "Seleccione Roles del Usuario"
    });

    $("#empresa_id").select2({
        placeholder: "Seleccione Empresa"
    });

    $("#empresa_id").select2({
        placeholder: "Seleccione Empresa"
    });

    $("#user_id").select2({
        placeholder: "Seleccione Usuario"
    });

    $("#permission").select2({
        placeholder: "Seleccione Permisos"
    });

    $("#tipo_contrato").select2({
        placeholder: "Seleccione Tipo de Contrato"
    });





    $(".datepicker").datepicker({
        language: "es",
        format: "dd/mm/yyyy"
    });

});
