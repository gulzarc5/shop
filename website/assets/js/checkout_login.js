 $(document).ready(function(){
    $("#checkout_method_success").click(function(){
        if ($("#chkid").val() != '') {
            $("#payment-1").removeClass("show");
            $("#billinginfo").attr( "data-toggle", "collapse" );
            $("#payment-2").addClass("show");
            }
        });

    $("#billing_info_button").click(function(){
        $("#payment-2").removeClass("show");
        $("#billinginfo").attr( "data-toggle", "collapse" );
        $("#payment-3").addClass("show");
    });


});     