<script type="text/javascript">

$("#bill_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
id:'{{ (isset($customer) ? $customer->bill_id : "") }}',
value:'{{ ((isset($customer) and ($customer->bill_id > 0)) ? $customer->bill->name : "") }}'
},onSelect:function(e,o){$("#bill_id").val(e.id),$(this).val(e.value),
    $("#bill_city").val(e.city),
        $("#bill_state_id").val(e.state_id),
        $("#bill_state_name").val(e.state_name),
        $("#bill_zip_code").val(e.zip_code),
        $("#bill_zip_code_id").val(e.zip_code_id),
        $("#bill_address").val(e.address),
        $("#bill_country_id").val(e.country_id),
        $("#bill_country_name").val(e.country_name),
        $("#bill_phone").val(e.phone),
        $("#bill_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#bill_name_img").removeClass("img-none").addClass("img-display"),$("#bill_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#bill_name_img").removeClass("img-display").addClass("img-none"),$("#bill_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
var o = e.keyCode ? e.keyCode : e.which;
(8 == o || 46 == o) && $("#bill_id").val(0)
}).blur(function() {
var e = $("#bill_id").val();
0 == e && $(this).val("")
});

$("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""))});


$("#coloader_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#coloader_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#coloader_name_img").removeClass("img-none").addClass("img-display"),$("#coloader_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#coloader_name_img").removeClass("img-display").addClass("img-none"),$("#coloader_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#coloader_id").val(0)}).blur(function(){var e=$("#coloader_id").val();0==e&&($(this).val(""))});

$("#origin_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_name_img").removeClass("img-none").addClass("img-display"),$("#origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_name_img").removeClass("img-display").addClass("img-none"),$("#origin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_id").val(0)}).blur(function(){var e=$("#origin_id").val();0==e&&($(this).val(""))});

$("#destination_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#destination_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_name_img").removeClass("img-none").addClass("img-display"),$("#destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_name_img").removeClass("img-display").addClass("img-none"),$("#destination_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_id").val(0)}).blur(function(){var e=$("#destination_id").val();0==e&&($(this).val(""))});


$("#delivery_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#delivery_id").val(e.id),
    $(this).val(e.value),
$("#delivery_city").val(e.city),
$("#delivery_state_id").val(e.state_id),
$("#delivery_state_name").val(e.state_name),
$("#delivery_zip_code").val(e.zip_code),
$("#delivery_zip_code_id").val(e.zip_code_id),
$("#delivery_address").val(e.address),
    $("#delivery_country_id").val(e.country_id),
    $("#delivery_country_name").val(e.country_name),
    $("#delivery_phone").val(e.phone),
    $("#delivery_fax").val(e.fax)
},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_id").val(0)}).blur(function(){var e=$("#delivery_id").val();0==e&&($(this).val(""))});
</script>