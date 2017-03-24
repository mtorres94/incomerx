<script type="text/javascript">

    $("#agent_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.value},     selected: {
        id: '{{ (isset($airway_bill) ? $airway_bill->agent_id : "")}}',
        value: '{{ ((isset($airway_bill) and $airway_bill->agent_id > 0) ? $airway_bill->agent->name : "")}}',
        phone: '{{ (isset($airway_bill) ? $airway_bill->agent_phone: "")}}'}
        ,onSelect: function(e, o) {$("#agent_id").val(e.id), $(this).val(e.value)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#agent_name_img").removeClass("img-none").addClass("img-display"), $("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#agent_name_img").removeClass("img-display").addClass("img-none"), $("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""))});

    $("#coloader_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.value},     selected: {
        id: '{{ (isset($airway_bill) ? $airway_bill->coloader_id : "")}}',
        value: '{{ ((isset($airway_bill) and $airway_bill->coloader_id > 0) ? $airway_bill->coloader->name : "")}}'}
        ,onSelect: function(e, o) {$("#coloader_id").val(e.id), $(this).val(e.value)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#coloader_name_img").removeClass("img-none").addClass("img-display"), $("#coloader_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#coloader_name_img").removeClass("img-display").addClass("img-none"), $("#coloader_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#coloader_id").val(0)}).blur(function(){var e=$("#coloader_id").val();0==e&&($(this).val(""))});

    $("#origin_name").marcoPolo({url: "{{ route('airports.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},     selected: {
        id: '{{ (isset($airway_bill) ? $airway_bill->origin_id : "")}}',
        name: '{{ ((isset($airway_bill) and $airway_bill->origin_id > 0) ? $airway_bill->origin->name : "")}}'}
        ,onSelect: function(e, o) {$("#origin_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#origin_name_img").removeClass("img-none").addClass("img-display"), $("#origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#origin_name_img").removeClass("img-display").addClass("img-none"), $("#origin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_id").val(0)}).blur(function(){var e=$("#origin_id").val();0==e&&($(this).val(""))});

    $("#destination_name").marcoPolo({url: "{{ route('airports.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},     selected: {
        id: '{{ (isset($airway_bill) ? $airway_bill->destination_id : "")}}',
        name: '{{ ((isset($airway_bill) and $airway_bill->destination_id > 0) ? $airway_bill->destination->name : "")}}'}
        ,onSelect: function(e, o) {$("#destination_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#destination_name_img").removeClass("img-none").addClass("img-display"), $("#destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#destination_name_img").removeClass("img-display").addClass("img-none"), $("#destination_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_id").val(0)}).blur(function(){var e=$("#destination_id").val();0==e&&($(this).val(""))});

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},     selected: {
        id: '{{ (isset($airway_bill) ? $airway_bill->carrier_id : "")}}',
        name: '{{ ((isset($airway_bill) and $airway_bill->carrier_id > 0) ? $airway_bill->carrier->name : "")}}'}
        ,onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#carrier_id").val(0)}).blur(function(){var e=$("#carrier_id").val();0==e&&($(this).val(""))});


    $("#shipper_name").marcoPolo({
        url: "{{ route('customers.autocomplete') }}",
        formatItem: function(e, o) {
            return e.value
        },
        selected: {
            id: '{{ (isset($airway_bill) ? $airway_bill->shipper_id : "")}}',
            value: '{{ ((isset($airway_bill) and $airway_bill->shipper_id > 0) ? $airway_bill->shipper->name : "")}}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($airway_bill) ? $airway_bill->shipper->address : ""))) }}',
            city: '{{ (isset($airway_bill) ? $airway_bill->shipper_city : null) }}',
            state_id: '{{ (isset($airway_bill) ? $airway_bill->shipper_state_id : "")}}',
            state_name: '{{ ((isset($airway_bill) and $airway_bill->shipper_state_id > 0) ? $airway_bill->shipper_state->name : null)}}',             zip_code_id: '{{ (isset($airway_bill) ? $airway_bill->shipper_zip_code_id : "")}}',
            zip_code_code: '{{ ((isset($airway_bill) and $airway_bill->shipper_zip_code_id > 0) ? $airway_bill->shipper_zip_code->code : null)}}',
            phone: '{{ (isset($airway_bill) ? $airway_bill->shipper_phone : "")}}',
            fax: '{{ (isset($airway_bill) ? $airway_bill->shipper_fax : "")}}'
        },
        onSelect: function(e, o) {
            $("#shipper_id").val(e.id), $(this).val(e.value), $("#shipper_address").val(e.address), $("#shipper_city").val(e.city), $("#shipper_state_id").val(e.state_id), $("#shipper_state_name").val(e.state_name), $("#shipper_zip_code_id").val(e.zip_code_id), $("#shipper_zip_code_code").val(e.zip_code_code), $("#shipper_phone").val(e.phone), $("#shipper_fax").val(e.fax)
        },
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#shipper_name_img").removeClass("img-none").addClass("img-display"), $("#shipper_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter", function() {
        $("#shipper_name_img").removeClass("img-display").addClass("img-none"), $("#shipper_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#shipper_id").val(0)
    }).blur(function() {
        var e = $("#shipper_id").val();
        0 == e && ($(this).val(""),  $("#shipper_address").val(""), $("#shipper_city").val(""), $("#shipper_state_id").val(0), $("#shipper_state_name").val(""), $("#shipper_zip_code_id").val(0), $("#shipper_zip_code_code").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val("") )
    });

    $("#consignee_name").marcoPolo({
        url: "{{ route('customers.autocomplete') }}",
        formatItem: function(e, o) {
            return e.value
        },
        selected: {
            id: '{{ (isset($airway_bill) ? $airway_bill->consignee_id : "")}}',
            value: '{{ ((isset($airway_bill) and $airway_bill->consignee_id > 0) ? $airway_bill->consignee->name : "")}}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($airway_bill) ? $airway_bill->consignee->address : ""))) }}',
            city: '{{ (isset($airway_bill) ? $airway_bill->consignee_city : null) }}',
            state_id: '{{ (isset($airway_bill) ? $airway_bill->consignee_state_id : "")}}',
            state_name: '{{ ((isset($airway_bill) and $airway_bill->consignee_state_id > 0) ? $airway_bill->consignee_state->name : null)}}',             zip_code_id: '{{ (isset($airway_bill) ? $airway_bill->consignee_zip_code_id : "")}}',
            zip_code_code: '{{ ((isset($airway_bill) and $airway_bill->consignee_zip_code_id > 0) ? $airway_bill->consignee_zip_code->code : null)}}',
            phone: '{{ (isset($airway_bill) ? $airway_bill->consignee_phone : "")}}',
            fax: '{{ (isset($airway_bill) ? $airway_bill->consignee_fax : "")}}'
        },
        onSelect: function(e, o) {
            $("#consignee_id").val(e.id), $(this).val(e.value), $("#consignee_address").val(e.address), $("#consignee_city").val(e.city), $("#consignee_state_id").val(e.state_id), $("#consignee_state_name").val(e.state_name), $("#consignee_zip_code_id").val(e.zip_code_id), $("#consignee_zip_code_code").val(e.zip_code_code), $("#consignee_phone").val(e.phone), $("#consignee_fax").val(e.fax)
        },
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#consignee_name_img").removeClass("img-none").addClass("img-display"), $("#consignee_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter", function() {
        $("#consignee_name_img").removeClass("img-display").addClass("img-none"), $("#consignee_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#consignee_id").val(0)
    }).blur(function() {
        var e = $("#consignee_id").val();
        0 == e && ($(this).val(""),  $("#consignee_address").val(""), $("#consignee_city").val(""), $("#consignee_state_id").val(0), $("#consignee_state_name").val(""), $("#consignee_zip_code_id").val(0), $("#consignee_zip_code_code").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val("") )
    });

    $("#issued_name").marcoPolo({
        url: "{{ route('customers.autocomplete') }}",
        formatItem: function(e, o) {
            return e.value
        },
        selected: {
            id: '{{ (isset($airway_bill) ? $airway_bill->issued_id : "")}}',
            value: '{{ ((isset($airway_bill) and $airway_bill->issued_id > 0) ? $airway_bill->issued->name : "")}}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',((isset($airway_bill) and $airway_bill->issued_id > 0)? $airway_bill->issued->address : ""))) }}',
            city: '{{ ((isset($airway_bill) and $airway_bill->issued_id > 0) ? $airway_bill->issued_city : null) }}',
            state_id: '{{ ((isset($airway_bill) and $airway_bill->issued_id > 0) ? $airway_bill->issued_state_id : "")}}',
            state_name: '{{ ((isset($airway_bill) and $airway_bill->issued_state_id > 0) ? $airway_bill->issued_state->name : null)}}',             zip_code_id: '{{ (isset($airway_bill) ? $airway_bill->issued_zip_code_id : "")}}',
            zip_code_code: '{{ ((isset($airway_bill) and $airway_bill->issued_zip_code_id > 0) ? $airway_bill->issued_zip_code->code : null)}}',
            phone: '{{ (isset($airway_bill) ? $airway_bill->issued_phone : "")}}',
            fax: '{{ (isset($airway_bill) ? $airway_bill->issued_fax : "")}}'
        },
        onSelect: function(e, o) {
            $("#issued_id").val(e.id), $(this).val(e.value), $("#issued_address").val(e.address), $("#issued_city").val(e.city), $("#issued_state_id").val(e.state_id), $("#issued_state_name").val(e.state_name), $("#issued_zip_code_id").val(e.zip_code_id), $("#issued_zip_code_code").val(e.zip_code_code), $("#issued_phone").val(e.phone), $("#issued_fax").val(e.fax)
        },
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#issued_name_img").removeClass("img-none").addClass("img-display"), $("#issued_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter", function() {
        $("#issued_name_img").removeClass("img-display").addClass("img-none"), $("#issued_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#issued_id").val(0)
    }).blur(function() {
        var e = $("#issued_id").val();
        0 == e && ($(this).val(""),  $("#issued_address").val(""), $("#issued_city").val(""), $("#issued_state_id").val(0), $("#issued_state_name").val(""), $("#issued_zip_code_id").val(0), $("#issued_zip_code_code").val(""), $("#issued_phone").val(""), $("#issued_fax").val("") )
    });

    $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($airway_bill) ? $airway_bill->shipper_state_id : "") }}',
        value:'{{ ((isset($airway_bill) and ($airway_bill->shipper_state_id >0)) ? $airway_bill->shipper_state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});

    $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($airway_bill) ? $airway_bill->consignee_state_id : "") }}',
        value:'{{ ((isset($airway_bill) and ($airway_bill->consignee_state_id >0)) ? $airway_bill->consignee_state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});

    $("#issued_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($airway_bill) ? $airway_bill->issued_state_id : "") }}',
        value:'{{ ((isset($airway_bill) and ($airway_bill->issued_state_id >0)) ? $airway_bill->issued_state->name : "") }}',
    },onSelect:function(e,o){$("#issued_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#issued_state_name_img").removeClass("img-none").addClass("img-display"),$("#issued_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#issued_state_name_img").removeClass("img-display").addClass("img-none"),$("#issued_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#issued_state_id").val(0)}).blur(function(){var e=$("#issued_state_id").val();0==e&&$(this).val("")});

    $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($airway_bill)? $airway_bill->consignee_zip_code_id : "") }}',
        code:'{{ ((isset($airway_bill) and ($airway_bill->consignee_zip_code_id > 0 ))? $airway_bill->consignee_zip_code->code : "") }}',
        name:'{{ (isset($airway_bill)? $airway_bill->consignee_city : "") }}',
        state_id:'{{ ((isset($airway_bill) and ($airway_bill->consignee_zip_code_id > 0 ))? $airway_bill->consignee_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($airway_bill) and ($airway_bill->consignee_zip_code_id > 0 ))? $airway_bill->consignee_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name), $("#consignee_country_id").val(e.country_id), $("#consignee_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#origin_from_state_name").val(""))});


    $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($airway_bill)? $airway_bill->shipper_zip_code_id : "") }}',
        code:'{{ ((isset($airway_bill) and ($airway_bill->shipper_zip_code_id > 0 ))? $airway_bill->shipper_zip_code->code : "") }}',
        name:'{{ (isset($airway_bill)? $airway_bill->shipper_city : "") }}',
        state_id:'{{ ((isset($airway_bill) and ($airway_bill->shipper_zip_code_id > 0 ))? $airway_bill->shipper_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($airway_bill) and ($airway_bill->shipper_zip_code_id > 0 ))? $airway_bill->shipper_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name), $("#shipper_country_id").val(e.country_id), $("#shipper_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0))});

    $("#issued_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($airway_bill)? $airway_bill->issued_zip_code_id : "") }}',
        code:'{{ ((isset($airway_bill) and ($airway_bill->issued_zip_code_id > 0 ))? $airway_bill->issued_zip_code->code : "") }}',
        name:'{{ (isset($airway_bill)? $airway_bill->issued_city : "") }}',
        state_id:'{{ ((isset($airway_bill) and ($airway_bill->issued_zip_code_id > 0 ))? $airway_bill->issued_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($airway_bill) and ($airway_bill->issued_zip_code_id > 0 ))? $airway_bill->issued_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#issued_zip_code_id").val(e.id),$(this).val(e.code),$("#issued_city").val(e.name),$("#issued_state_id").val(e.state_id),$("#issued_state_name").val(e.state_name), $("#issued_country_id").val(e.country_id), $("#issued_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#issued_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#issued_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#issued_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#issued_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#issued_zip_code_id").val(0)}).blur(function(){var e=$("#issued_zip_code_id").val();0==e&&($(this).val(""),$("#issued_state_id").val(0))});

    $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.code), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_billing_id").val(0)}).blur(function(){var e=$("#billing_billing_id").val();0==e&&($(this).val(""))});

    $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_customer_id").val(0)}).blur(function(){var e=$("#billing_customer_id").val();0==e&&($(this).val(""))});

    $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_vendor_code").val(0))});
</script>