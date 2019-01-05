var checkout_method = null
var shipping_html = '<div class="row">'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>First Name</label>'+
                                '<input type="text" name="shipping_fname">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>Last Name</label>'+
                                '<input type="text" name="shipping_lname">'+
                             '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>Company</label>'+
                                '<input type="text" name="shipping_company">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>Email Address</label>'+
                                '<input type="email" name="shipping_email">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-12 col-md-12">'+
                            '<div class="billing-info">'+
                                '<label>Address</label>'+
                                '<input type="text" name="shipping_address">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>State/Province</label>'+
                                '<input type="text" name="shipping_state">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>city</label>'+
                                '<input type="text" name="shipping_city">'+
                            '</div>'+
                        '</div>'+                                         
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>Zip/Postal Code</label>'+
                                '<input type="text" name="shipping_pin">'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-lg-6 col-md-6">'+
                            '<div class="billing-info">'+
                                '<label>Mobile</label>'+
                                '<input type="text" name="shipping_mobile">'+
                             '</div>'+
                        '</div>'+
                    '</div>';
    $(document).ready(function(){
        $("#checkout_method_button").click(function(){
            if ($("input[name='checkout_method_guest']").prop('checked')) {
               checkout_method=1;
            }
            if ($('input[name=checkout_method_register]').prop('checked')) {
                checkout_method=2;
            }

            if (checkout_method > 0) {
                $("#payment-1").removeClass("show");
                $("#checkout_method").attr( "data-toggle", "" );
                $("#billinginfo").attr( "data-toggle", "collapse" );
                $("#payment-2").addClass("show");
            }else{
                $("#error_checkout_method").html(' <p class="alert alert-danger">Please Check The Checkbox</p>');
            }
        });


// /////////////////////billing info form values/////////////////////////////
        $("#billing_info_button").click(function(){
        ///////////////// All Data of billing addres into variable//////////////////////
            var billing_fname = $("input[name='billing_fname']").val();
            var billing_lname = $("input[name='billing_lname']").val();
            var billing_email = $("input[name='billing_email']").val();
            var billing_address = $("input[name='billing_address']").val();
            var billing_state = $("input[name='billing_state']").val();
            var billing_company = $("input[name='billing_company']").val();
            var billing_city = $("input[name='billing_city']").val();
            var billing_pin = $("input[name='billing_pin']").val();
            var billing_mobile = $("input[name='billing_mobile']").val();
            var shiping_billing =$("input[name='shiping_billing']:checked").val();
            var pass = true;
           if (!billing_fname) {
                $("input[name='billing_fname']").focus();
                $("input[name='billing_fname']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }

            if (!billing_lname) {
                $("input[name='billing_lname']").focus();
                $("input[name='billing_lname']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
           if (!billing_email) {
                $("input[name='billing_email']").focus();
                $("input[name='billing_email']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
           if (!billing_address) {
                $("input[name='billing_address']").focus();
                $("input[name='billing_address']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
           if (!billing_state) {
                $("input[name='billing_state']").focus();
                $("input[name='billing_state']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
           if (!billing_city) {
                $("input[name='billing_city']").focus();
                $("input[name='billing_city']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
           if (!billing_pin) {
                $("input[name='billing_pin']").focus();
                $("input[name='billing_pin']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }
            if (!billing_mobile) {
                $("input[name='billing_mobile']").focus();
                $("input[name='billing_mobile']").css({
                    border:'1px solid red'
                });
                pass = false;
                return;
           }

////////////// If all validation success in billing info and shipping address same /////
           if (pass == true) {

            if (shiping_billing == 1) {
                $("#payment-2").removeClass("show");
                $("#billinginfo").attr( "data-toggle", "" );
                $("#order_review").attr( "data-toggle", "collapse" );
                $("#payment-6").addClass("show");
                
                //prepare product review for view products
                var shipping_info_review = billing_fname+" "+billing_lname+"<br>"+
                billing_company+"<br>"+billing_address+","+billing_city+","+billing_state+"-"+billing_pin
                +"<br>"+billing_mobile+"<br>"+billing_email;
                $("#shipping_review").html(shipping_info_review);                
               }else if(shiping_billing == 2){
                    var shipping_fname = $("input[name='shipping_fname']").val();
                    var shipping_lname = $("input[name='shipping_lname']").val();
                    var shipping_email = $("input[name='shipping_email']").val();
                    var shipping_address = $("input[name='shipping_address']").val();
                    var shipping_state = $("input[name='shipping_state']").val();
                    var shipping_company = $("input[name='shipping_company']").val();
                    var shipping_city = $("input[name='shipping_city']").val();
                    var shipping_pin = $("input[name='shipping_pin']").val();
                    var shipping_mobile = $("input[name='shipping_mobile']").val();
                    // alert(shipping_fname);
                    if (!shipping_fname) {
                        $("input[name='shipping_fname']").focus();
                        $("input[name='shipping_fname']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }

                    if (!shipping_lname) {
                        $("input[name='shipping_lname']").focus();
                        $("input[name='shipping_lname']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_email) {
                        $("input[name='shipping_email']").focus();
                        $("input[name='shipping_email']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_address) {
                        $("input[name='shipping_address']").focus();
                        $("input[name='shipping_address']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_state) {
                        $("input[name='shipping_state']").focus();
                        $("input[name='shipping_state']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_city) {
                        $("input[name='shipping_city']").focus();
                        $("input[name='shipping_city']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_pin) {
                        $("input[name='shipping_pin']").focus();
                        $("input[name='shipping_pin']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (!shipping_mobile) {
                        $("input[name='shipping_mobile']").focus();
                        $("input[name='shipping_mobile']").css({
                            border:'1px solid red'
                        });
                        pass = false;
                        return;
                   }
                   if (pass== true) {
                        $("#payment-2").removeClass("show");
                        $("#billinginfo").attr( "data-toggle", "" );
                        $("#order_review").attr( "data-toggle", "collapse" );
                        $("#payment-6").addClass("show");
                        
                        //prepare product review for view products
                        var shipping_info_review = shipping_fname+" "+shipping_lname+"<br>"+
                        shipping_company+"<br>"+shipping_address+","+shipping_city+","+shipping_state+"-"+billing_pin
                        +"<br>"+shipping_mobile+"<br>"+shipping_email;
                        $("#shipping_review").html(shipping_info_review);
                   }

                   
               }
           }           

        });
    });


//////////////////// If Product Reviewed Successfully //////////////////////////////


$(document).on('click', '#order_review_button',function(){
    $("#payment-6").removeClass("show");
    $("#order_review").attr( "data-toggle", "" );
    $("#payment_informaation").attr( "data-toggle", "collapse" );
    $("#payment-5").addClass("show");
 });

//////////////////////// billing info input checked//////////////////////////////////
     $("input[name='billing_fname']").keyup(function(){
        var billing_fname = $("input[name='billing_fname']").val();
        if (billing_fname){
             $("input[name='billing_fname']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });

    $("input[name='billing_lname']").keyup(function(){
        var billing_lname = $("input[name='billing_lname']").val();
        if (billing_lname){
             $("input[name='billing_lname']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });

    $("input[name='billing_email']").keyup(function(){
        var billing_email = $("input[name='billing_email']").val();
        if (billing_email){
             $("input[name='billing_email']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });
     $("input[name='billing_address']").keyup(function(){
        var billing_address = $("input[name='billing_address']").val();
        if (billing_address){
             $("input[name='billing_address']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });
    $("input[name='billing_state']").keyup(function(){
        var billing_state = $("input[name='billing_state']").val();
        if (billing_state){
             $("input[name='billing_state']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });
    $("input[name='billing_city']").keyup(function(){
        var billing_city = $("input[name='billing_city']").val();
        if (billing_city){
             $("input[name='billing_city']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });

     $("input[name='billing_pin']").keyup(function(){
        var billing_pin = $("input[name='billing_pin']").val();
        if (billing_pin){
             $("input[name='billing_pin']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });

    $("input[name='billing_mobile']").keyup(function(){
        var billing_mobile = $("input[name='billing_mobile']").val();
        if (billing_mobile){
             $("input[name='billing_mobile']").css({
                    border: '1px solid #ebebeb'
                });
             
        }
     });


/////////////////////// Shiping info input checked//////////////////////////////////
 $(document).on('keyup', 'input[name=shipping_fname]',function(){
    var shipping_fname = $("input[name='shipping_fname']").val();
    if (shipping_fname){
        $("input[name='shipping_fname']").css({
            border: '1px solid #ebebeb'
        });
    }
 });

$(document).on('keyup', 'input[name=shipping_lname]',function(){
    var shipping_lname = $("input[name='shipping_lname']").val();
    if (shipping_lname){
        $("input[name='shipping_lname']").css({
            border: '1px solid #ebebeb'
        });
    }
 });

$(document).on('keyup', 'input[name=shipping_email]',function(){
    var shipping_email = $("input[name='shipping_email']").val();
    if (shipping_email){
        $("input[name='shipping_email']").css({
            border: '1px solid #ebebeb'
        });
    }
 });
 
$(document).on('keyup', 'input[name=shipping_address]',function(){
    var shipping_address = $("input[name='shipping_address']").val();
    if (shipping_address){
        $("input[name='shipping_address']").css({
            border: '1px solid #ebebeb'
        });
    }
 });

 $(document).on('keyup', 'input[name=shipping_state]',function(){
    var shipping_state = $("input[name='shipping_state']").val();
    if (shipping_state){
        $("input[name='shipping_state']").css({
            border: '1px solid #ebebeb'
        });
    }
 });
    
 $(document).on('keyup', 'input[name=shipping_city]',function(){
    var shipping_city = $("input[name='shipping_city']").val();
    if (shipping_city){
        $("input[name='shipping_city']").css({
            border: '1px solid #ebebeb'
        });
    }
 });  

$(document).on('keyup', 'input[name=shipping_pin]',function(){
    var shipping_pin = $("input[name='shipping_pin']").val();
    if (shipping_pin){
        $("input[name='shipping_pin']").css({
            border: '1px solid #ebebeb'
        });
    }
 }); 
 
$(document).on('keyup', 'input[name=shipping_mobile]',function(){
    var shipping_mobile = $("input[name='shipping_mobile']").val();
    if (shipping_mobile){
        $("input[name='shipping_mobile']").css({
            border: '1px solid #ebebeb'
        });
    }
 }); 


/////////////////////Ship to different address Script ////////////////////////

$("#ship_to_different_address").click(function(){
    if ($("#ship_to_different_address").is(":checked") && $("#ship_to_different_address").val() ==2 ){
        // alert($("#ship_to_different_address").val());
        $("#ship_to_diff").append(shipping_html);
    }

});


/////////////////final submit of form//////////////////////////

$(document).on('click', '#final_order',function(){
    var payment_type =$("input[name='payment_type']:checked").val();
    var shiping_billing =$("input[name='shiping_billing']:checked").val();
    var pass = true;
    if (!payment_type) {
        $("#payment_div").css({
            border:'1px solid red'
        });
        pass = false;
        return;
    }else{
        var billing_fname = $("input[name='billing_fname']").val();
        var billing_lname = $("input[name='billing_lname']").val();
        var billing_email = $("input[name='billing_email']").val();
        var billing_address = $("input[name='billing_address']").val();
        var billing_state = $("input[name='billing_state']").val();
        var billing_company = $("input[name='billing_company']").val();
        var billing_city = $("input[name='billing_city']").val();
        var billing_pin = $("input[name='billing_pin']").val();
        var billing_mobile = $("input[name='billing_mobile']").val();
        var shiping_billing =$("input[name='shiping_billing']:checked").val();

        var shipping_fname = $("input[name='shipping_fname']").val();
        var shipping_lname = $("input[name='shipping_lname']").val();
        var shipping_email = $("input[name='shipping_email']").val();
        var shipping_address = $("input[name='shipping_address']").val();
        var shipping_state = $("input[name='shipping_state']").val();
        var shipping_company = $("input[name='shipping_company']").val();
        var shipping_city = $("input[name='shipping_city']").val();
        var shipping_pin = $("input[name='shipping_pin']").val();
        var shipping_mobile = $("input[name='shipping_mobile']").val();

        $.ajax({
        type: "POST",
        url: "ajax/order.php",
        data:{
            billing_fname : billing_fname,
            billing_lname : billing_lname,
            billing_email : billing_email,
            billing_address : billing_address,
            billing_state : billing_state,
            billing_company : billing_company,
            billing_city : billing_city,
            billing_pin : billing_pin,
            billing_mobile : billing_mobile,
            shiping_billing: shiping_billing,

            shipping_fname : shipping_fname,
            shipping_lname : shipping_lname,
            shipping_email : shipping_email,
            shipping_address : shipping_address,
            shipping_state : shipping_state,
            shipping_company: shipping_company,
            shipping_city : shipping_city,
            shipping_pin : shipping_pin,
            shipping_mobile : shipping_mobile,
            payment_type: payment_type,
        },
        success: function(data){

            console.log(data);
            if (data == 1) {
                if (payment_type == 1) {
                    window.location.href = "order_success.php";
                }else if (payment_type == 2) {

                }
            }else if(data == 2){

            }
            // $("#suggesstion-box").show();
            // $("#city").html(data);
            // $("#trnto").css("background","#FFF");
        }
        });
        
    }
 }); 