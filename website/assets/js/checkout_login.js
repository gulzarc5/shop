 var billing = '<div id="ship_to_diff">'+
                    '<div class="row">'+
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
                                    '<input type="text" name="shipping_address_of">'+
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
                        '</div>'+
                    '</div>'+
                    '<div class="billing-btn">'+
                        '<button type="submit" id="shipping_info_save">Save</button>'+
                    '</div>';

// Script for view form of new shipping address add
 $(document).on('click', '#add_new_address',function(){
    $("#new_billing_info").html(billing);
    $("#billing_info_button").hide();
 });  

//Script for save new added address
$(document).on('click', '#shipping_info_save',function(){
    // $("#new_billing_info").html('');
    var shipping_fname = $("input[name='shipping_fname']").val();
    var shipping_lname = $("input[name='shipping_lname']").val();
    var shipping_email = $("input[name='shipping_email']").val();
    var shipping_address_of = $("input[name='shipping_address_of']").val();
    var shipping_state = $("input[name='shipping_state']").val();
    var shipping_city = $("input[name='shipping_city']").val();
    var shipping_pin = $("input[name='shipping_pin']").val();
    var shipping_mobile = $("input[name='shipping_mobile']").val();
    var shipping_company = $("input[name='shipping_company']").val();
    // alert(shipping_fname);
    var pass=true;
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
    // alert(shipping_address_of);
    if (!shipping_address_of) {
        $("input[name='shipping_address_of']").focus();
        $("input[name='shipping_address_of']").css({
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

    if (pass == true) {
        $("#shipping_info_save").hide();
        $.ajax({
            type: "POST",
            url: "ajax/add_new_shipping_address.php",
            data:{
                shipping_fname : shipping_fname,
                shipping_lname : shipping_lname,
                shipping_email : shipping_email,
                shipping_address_of : shipping_address_of,
                shipping_state : shipping_state,
                shipping_company: shipping_company,
                shipping_city : shipping_city,
                shipping_pin : shipping_pin,
                shipping_mobile : shipping_mobile,
            },
            success: function(data){

                console.log(data);
                if (data == 1) {
                 window.location.href = "checkout.php";
                }else if(data == 2){

                }
            }
        });
    }

 });    

// If input field is not empty
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
 
$(document).on('keyup', 'input[name=shipping_address_of]',function(){
    var shipping_address_of = $("input[name='shipping_address_of']").val();
    if (shipping_address_of){
        $("input[name='shipping_address_of']").css({
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



////////////////// If Shipping Info selected Then Continue for the next process///////////


$(document).on('click', '#shippinfo_info_button',function(){
    var shiping_info_id = $("input[name='shipping_address']:checked").val();
    
    var shipping_info_html = $("#"+shiping_info_id).html();
    $("#payment-2").removeClass("show");
    $("#billinginfo").attr( "data-toggle", "" );
    $("#order_review").attr( "data-toggle", "collapse" );
    $("#payment-6").addClass("show");
    $("#shipping_review").html(shipping_info_html);
 }); 


$(document).on('click', '#order_review_button',function(){
    $("#payment-6").removeClass("show");
    $("#order_review").attr( "data-toggle", "" );
    $("#payment_informaation").attr( "data-toggle", "collapse" );
    $("#payment-5").addClass("show");
 });



/////////////////final submit of form//////////////////////////

$(document).on('click', '#final_order',function(){
    var shiping_info_id = $("input[name='shipping_address']:checked").val();
    var payment_type =$("input[name='payment_type']:checked").val();
    var pass = true;
    if (!payment_type) {
        $("#payment_div").css({
            border:'1px solid red'
        });
        pass = false;
        return;
    }else{
    $.ajax({
        type: "POST",
        url: "ajax/order.php",
        data:{
            shiping_info_id : shiping_info_id,
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
        }
        });
        
    }
 }); 