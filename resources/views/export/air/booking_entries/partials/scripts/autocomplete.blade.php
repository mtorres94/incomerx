<script type="text/javascript">

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($booking_entries) ? $booking_entries->carrier_id : "") }}',
        name: '{{ ((isset($booking_entries) and ($booking_entries->carrier_id > 0)) ? $booking_entries->carrier->name: "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#carrier_id").val(0)}).blur(function() {var e = $("#carrier_id").val();0 == e && $(this).val("")});



    $("#consignee_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return  e.value}, selected:{
        id: '{{ (isset($booking_entries) ? $booking_entries->consignee_id : "") }}',
        value: '{{ ((isset($booking_entries) and ($booking_entries->consignee_id > 0)) ? $booking_entries->consignee->name: "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($booking_entries) ? $booking_entries->consignee_address : "")))  }}',
        state_id: '{{ (isset($booking_entries) ? $booking_entries->consignee_state_id : "") }}',
        state_name: '{{ ((isset($booking_entries) and ($booking_entries->consignee_state_id > 0)) ? $booking_entries->consignee_state->name: "") }}',
        zip_code_id: '{{ (isset($booking_entries) ? $booking_entries->consignee_zip_code_id : "") }}',
        zip_code_code: '{{ ((isset($booking_entries) and ($booking_entries->consignee_zip_code_id > 0)) ? $booking_entries->consignee_zip_code->code: "") }}',
        country_id: '{{ (isset($booking_entries) ? $booking_entries->consignee_country_id : "") }}',
        country_code: '{{ ((isset($booking_entries) and ($booking_entries->consignee_country_id > 0)) ? $booking_entries->consignee_country->code: "") }}',
        phone: '{{ (isset($booking_entries) ? $booking_entries->consignee_phone : "") }}',
        fax: '{{ (isset($booking_entries) ? $booking_entries->consignee_fax: "") }}',
        city: '{{ (isset($booking_entries) ? $booking_entries->consignee_city : "") }}',
    },onSelect: function(e, o) {$("#consignee_id").val(e.id), $(this).val(e.value),  $("#consignee_address").val(e.address), $("#consignee_city").val(e.city), $("#consignee_state_id").val(e.state_id), $("#consignee_state_name").val(e.state_name), $("#consignee_zip_code_id").val(e.zip_code_id), $("#consignee_zip_code_code").val(e.zip_code_code), $("#consignee_phone").val(e.phone), $("#consignee_fax").val(e.fax)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#consignee_name_img").removeClass("img-none").addClass("img-display"), $("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#consignee_name_img").removeClass("img-display").addClass("img-none"), $("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#consignee_id").val(0)}).blur(function() {var e = $("#consignee_id").val();0 == e && $(this).val(""), ("#consignee_address").val(""), $("#consignee_city").val(""), $("#consignee_state_id").val(0), $("#consignee_state_name").val(""), $("#consignee_zip_code_id").val(0), $("#consignee_zip_code_code").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val("")});


    $("#shipper_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return  e.value}, selected:{
        id: '{{ (isset($booking_entries) ? $booking_entries->shipper_id : "") }}',
        value: '{{ ((isset($booking_entries) and ($booking_entries->shipper_id > 0)) ? $booking_entries->shipper->name: "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($booking_entries) ? $booking_entries->shipper_address : "")))  }}',
        state_id: '{{ (isset($booking_entries) ? $booking_entries->shipper_state_id : "") }}',
        state_name: '{{ ((isset($booking_entries) and ($booking_entries->shipper_state_id > 0)) ? $booking_entries->shipper_state->name: "") }}',
        zip_code_id: '{{ (isset($booking_entries) ? $booking_entries->shipper_zip_code_id : "") }}',
        zip_code_code: '{{ ((isset($booking_entries) and ($booking_entries->shipper_zip_code_id > 0)) ? $booking_entries->shipper_zip_code->code: "") }}',
        country_id: '{{ (isset($booking_entries) ? $booking_entries->shipper_country_id : "") }}',
        country_code: '{{ ((isset($booking_entries) and ($booking_entries->shipper_country_id > 0)) ? $booking_entries->shipper_country->code: "") }}',
        phone: '{{ (isset($booking_entries) ? $booking_entries->shipper_phone : "") }}',
        fax: '{{ (isset($booking_entries) ? $booking_entries->shipper_fax: "") }}',
        city: '{{ (isset($booking_entries) ? $booking_entries->shipper_city : "") }}',
    },onSelect: function(e, o) {$("#shipper_id").val(e.id), $(this).val(e.value),  $("#shipper_address").val(e.address), $("#shipper_city").val(e.city), $("#shipper_state_id").val(e.state_id), $("#shipper_state_name").val(e.state_name), $("#shipper_zip_code_id").val(e.zip_code_id), $("#shipper_zip_code_code").val(e.zip_code_code), $("#shipper_phone").val(e.phone), $("#shipper_fax").val(e.fax)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#shipper_name_img").removeClass("img-none").addClass("img-display"), $("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#shipper_name_img").removeClass("img-display").addClass("img-none"), $("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#shipper_id").val(0)}).blur(function() {var e = $("#shipper_id").val();0 == e && $(this).val(""), ("#shipper_address").val(""), $("#shipper_city").val(""), $("#shipper_state_id").val(0), $("#shipper_state_name").val(""), $("#shipper_zip_code_id").val(0), $("#shipper_zip_code_code").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val("")});

    $("#agent_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.value}, selected:{
        id: '{{ (isset($booking_entries) ? $booking_entries->agent_id : "") }}',
        value: '{{ ((isset($booking_entries) and ($booking_entries->agent_id > 0)) ? $booking_entries->agent->name: "") }}',
        phone: '{{ (isset($booking_entries) ? $booking_entries->agent_phone: "") }}',
        fax: '{{ (isset($booking_entries)  ? $booking_entries->agent_fax : "") }}'

    },onSelect: function(e, o) {$("#agent_id").val(e.id), $(this).val(e.value), $("#agent_phone").val(e.phone), $("#agent_fax").val(e.fax)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#agent_name_img").removeClass("img-none").addClass("img-display"), $("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#agent_name_img").removeClass("img-display").addClass("img-none"), $("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#agent_id").val(0)}).blur(function() {var e = $("#agent_id").val();0 == e && $(this).val("")});

    $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->shipper_zip_code_id : "") }}',
        code:'{{ ((isset($booking_entries) and ($booking_entries->shipper_zip_code_id > 0)) ? $booking_entries->shipper_zip_code->code : "") }}',
        name:'{{ (isset($booking_entries)  ? $booking_entries->shipper_city : "") }}',
        state_id:'{{ ((isset($booking_entries) and ($booking_entries->shipper_zip_code_id > 0)) ? $booking_entries->shipper_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($booking_entries) and ($booking_entries->shipper_zip_code_id > 0)) ? $booking_entries->shipper_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name), $("#shipper_country_id").val(e.country_id), $("#shipper_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});


    $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->shipper_state_id : "") }}',
        value:'{{ ((isset($booking_entries) and ($booking_entries->shipper_state_id >0)) ? $booking_entries->shipper_state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});

    $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->shipper_country_id : "") }}',
        value:'{{ ((isset($booking_entries) and ($booking_entries->shipper_country_id > 0)) ? $booking_entries->shipper_country->name : "") }}',
    },onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_country_id").val(0)}).blur(function(){var e=$("#shipper_country_id").val();0==e&&$(this).val("")});

    $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->consignee_zip_code_id : "") }}',
        code:'{{ ((isset($booking_entries) and ($booking_entries->consignee_zip_code_id > 0)) ? $booking_entries->consignee_zip_code->code : "") }}',
        name:'{{ (isset($booking_entries)  ? $booking_entries->consignee_city : "") }}',
        state_id:'{{ ((isset($booking_entries) and ($booking_entries->consignee_zip_code_id > 0)) ? $booking_entries->consignee_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($booking_entries) and ($booking_entries->consignee_zip_code_id > 0)) ? $booking_entries->consignee_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name), $("#consignee_country_id").val(e.country_id), $("#consignee_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});


    $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->consignee_state_id : "") }}',
        value:'{{ ((isset($booking_entries) and ($booking_entries->consignee_state_id >0)) ? $booking_entries->consignee_state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});

    $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($booking_entries) ? $booking_entries->consignee_country_id : "") }}',
        value:'{{ ((isset($booking_entries) and ($booking_entries->consignee_country_id > 0)) ? $booking_entries->consignee_country->name : "") }}',
    },onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_country_id").val(0)}).blur(function(){var e=$("#consignee_country_id").val();0==e&&$(this).val("")});

    $("#origin_name").marcoPolo({url:"{{ route('airports.autocomplete') }}",formatItem:function(e,o){return e.name}, selected:{
        id: '{{ (isset($booking_entries)? $booking_entries->origin_id : "") }}',
        name: '{{ ((isset($booking_entries) and ($booking_entries->origin_id > 0))? $booking_entries->origin->name : "") }}',
    },onSelect:function(e,o){$("#origin_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_name_img").removeClass("img-none").addClass("img-display"),$("#origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_name_img").removeClass("img-display").addClass("img-none"),$("#origin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#origin_id").val(0)
    }).blur(function() {
        var e = $("#origin_id").val();
        0 == e && $(this).val("")
    });

    $("#destination_name").marcoPolo({url:"{{ route('airports.autocomplete') }}",formatItem:function(e,o){return e.name}, selected:{
        id: '{{ (isset($booking_entries)? $booking_entries->destination_id : "") }}',
        name: '{{ ((isset($booking_entries) and ($booking_entries->destination_id > 0))? $booking_entries->destination->name : "") }}',
    },onSelect:function(e,o){$("#destination_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_name_img").removeClass("img-none").addClass("img-display"),$("#destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_name_img").removeClass("img-display").addClass("img-none"),$("#destination_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#destination_id").val(0)
    }).blur(function() {
        var e = $("#destination_id").val();
        0 == e && $(this).val("")
    });
</script>