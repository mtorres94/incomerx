<script type="text/javascript">
    $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->shipper_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->shipper_id > 0)) ? $routing_order->shipper->name : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($routing_order) and ($routing_order->shipper_id > 0)) ? $routing_order->shipper->address : ""))) }}',

        phone: '{{  (isset($routing_order)? $routing_order->shipper_phone : "") }}',
        email: '{{  (isset($routing_order)? $routing_order->shipper_email: "") }}',
        fax: '{{  (isset($routing_order) ? $routing_order->shipper_fax : "") }}'
    },onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address), $("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax), $("#shipper_email").val(e.email)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#shipper_id").val(0)
    }).blur(function() {
        var e = $("#shipper_id").val();
        0 == e && ($(this).val(""), $("#shipper_address").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""),$("#shipper_email").val(""))
    });

    $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->consignee_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->consignee_id > 0)) ? $routing_order->consignee->name : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($routing_order) and ($routing_order->consignee_id > 0)) ? $routing_order->consignee->address : ""))) }}',

        phone: '{{  (isset($routing_order)? $routing_order->consignee_phone : "") }}',
        email: '{{  (isset($routing_order)? $routing_order->consignee_email: "") }}',
        fax: '{{  (isset($routing_order) ? $routing_order->consignee_fax : "") }}'
    },onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax), $("#consignee_email").val(e.email)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#consignee_id").val(0)
    }).blur(function() {
        var e = $("#consignee_id").val();
        0 == e && ($(this).val(""), $("#consignee_address").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""),$("#consignee_email").val(""))
    });

    $("#supplier_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->supplier_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->supplier_id > 0)) ? $routing_order->supplier->name : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($routing_order) and ($routing_order->supplier_id > 0)) ? $routing_order->supplier->address : ""))) }}',

        phone: '{{  (isset($routing_order)? $routing_order->supplier_phone : "") }}',
        email: '{{  (isset($routing_order)? $routing_order->supplier_email: "") }}',
        fax: '{{  (isset($routing_order) ? $routing_order->supplier_fax : "") }}'
    },onSelect:function(e,o){$("#supplier_id").val(e.id),$(this).val(e.value),$("#supplier_address").val(e.address),$("#supplier_phone").val(e.phone),$("#supplier_fax").val(e.fax), $("#supplier_email").val(e.email)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#supplier_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#supplier_id").val(0)
    }).blur(function() {
        var e = $("#supplier_id").val();
        0 == e && ($(this).val(""), $("#supplier_address").val(""),$("#supplier_phone").val(""),$("#supplier_fax").val(""),$("#supplier_email").val(""))
    });

    $("#origin_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->origin_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->origin_id > 0)) ? $routing_order->origin->name : "") }}',
        country_id: '{{  (isset($routing_order) ? $routing_order->origin_country_id : "") }}',
        country_name: '{{  ((isset($routing_order) and ($routing_order->origin_country_id > 0)) ? $routing_order->origin_country->name : "") }}',
    },onSelect:function(e,o){$("#origin_id").val(e.id),$(this).val(e.value), $("#origin_country_id").val(e.country_id), $("#origin_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_name_img").removeClass("img-none").addClass("img-display"),$("#origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_name_img").removeClass("img-display").addClass("img-none"),$("#origin_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#origin_id").val(0)
    }).blur(function() {
        var e = $("#origin_id").val();
        0 == e && ($(this).val(""), $("#origin_country_id").val(""), $("#origin_country_name").val("") )
    });

    $("#origin_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->origin_country_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->origin_country_id > 0)) ? $routing_order->origin_country->name : "") }}',

    },onSelect:function(e,o){$("#origin_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_country_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#origin_country_id").val(0)
    }).blur(function() {
        var e = $("#origin_country_id").val();
        0 == e && ($(this).val(""))
    });

    $("#destination_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->destination_country_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->destination_country_id > 0)) ? $routing_order->destination_country->name : "") }}',

    },onSelect:function(e,o){$("#destination_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_country_name_img").removeClass("img-none").addClass("img-display"),$("#destination_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_country_name_img").removeClass("img-display").addClass("img-none"),$("#destination_country_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#destination_country_id").val(0)
    }).blur(function() {
        var e = $("#destination_country_id").val();
        0 == e && ($(this).val(""))
    });

    $("#destination_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->destination_id : "") }}',
        value: '{{  ((isset($routing_order) and ($routing_order->destination_id > 0)) ? $routing_order->destination->name : "") }}',
        email: '{{  (isset($routing_order) ? $routing_order->destination_email : "") }}',
        phone: '{{  (isset($routing_order) ? $routing_order->destination_phone : "") }}',
        fax: '{{  (isset($routing_order) ? $routing_order->destination_fax : "") }}',
        country_id: '{{  (isset($routing_order) ? $routing_order->destination_country_id : "") }}',
        country_name: '{{  ((isset($routing_order) and ($routing_order->destination_country_id > 0)) ? $routing_order->destination_country->name : "") }}',
    },onSelect:function(e,o){$("#destination_id").val(e.id),$(this).val(e.value), $("#destination_country_id").val(e.country_id), $("#destination_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_name_img").removeClass("img-none").addClass("img-display"),$("#destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_name_img").removeClass("img-display").addClass("img-none"),$("#destination_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#destination_id").val(0)
    }).blur(function() {
        var e = $("#destination_id").val();
        0 == e && ($(this).val(""), $("#destination_country_id").val(""), $("#destination_country_name").val("") )
    });

    $("#origin_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->origin_port_id : "") }}',
        name: '{{  ((isset($routing_order) and ($routing_order->origin_port_id > 0)) ? $routing_order->origin_port->name : "") }}'

    },onSelect:function(e,o){$("#origin_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_port_name_img").removeClass("img-none").addClass("img-display"),$("#origin_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_port_name_img").removeClass("img-display").addClass("img-none"),$("#origin_port_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#origin_port_id").val(0)
    }).blur(function() {
        var e = $("#origin_port_id").val();
        0 == e && ($(this).val(""))
    });

    $("#destination_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
        id: '{{  (isset($routing_order) ? $routing_order->destination_port_id : "") }}',
        name: '{{  ((isset($routing_order) and ($routing_order->destination_port_id > 0)) ? $routing_order->destination_port->name : "") }}'

    },onSelect:function(e,o){$("#destination_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_port_name_img").removeClass("img-none").addClass("img-display"),$("#destination_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_port_name_img").removeClass("img-display").addClass("img-none"),$("#destination_port_name_spn").removeClass("img-none").addClass("img-display")}).
    keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#destination_port_id").val(0)
    }).blur(function() {
        var e = $("#destination_port_id").val();
        0 == e && ($(this).val(""))
    });

    $("#service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name}, selected: {
        id: '{{ (isset($routing_order) ? $routing_order->service_id : "") }}',
        name: '{{ ((isset($routing_order) and ($routing_order->service_id > 0)) ? $routing_order->service->name : "") }}',
    },onSelect:function(e,o){$("#service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#service_name_img").removeClass("img-none").addClass("img-display"),$("#service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#service_name_img").removeClass("img-display").addClass("img-none"),$("#service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#service_id").val(0)}).blur(function(){var e=$("#service_id").val();0==e&&($(this).val(""))});

    $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_vendor_code").val(0))});

    $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){ return e.code + '|' + e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.code), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_billing_id").val(0)}).blur(function(){var e=$("#billing_billing_id").val();0==e&&($(this).val(""))});

    $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_customer_id").val(0)}).blur(function(){var e=$("#billing_customer_id").val();0==e&&($(this).val(""))});

    $("#quote_code").marcoPolo({url:"{{ route('io_quotes.autocomplete') }}",formatItem:function(e,o){return e.code}, selected:{
        id: '{{ (isset($routing_order)? $routing_order->quote_id : "") }}',
        code: '{{ ((isset($routing_order) and ($routing_order->quote_id > 0))? $routing_order->quote->code : "") }}',
        incoterm_type: '{{ (isset($routing_order)? $routing_order->incoterm_type: "") }}',
        service_id: '{{ (isset($routing_order)? $routing_order->service_id : "") }}',
        service_name: '{{ ((isset($routing_order) and ($routing_order->service_id > 0))? $routing_order->service->name : "") }}',
        carrier_id: '{{ (isset($routing_order)? $routing_order->carrier_id : "") }}',
        carrier_name: '{{ ((isset($routing_order) and ($routing_order->carrier_id > 0))? $routing_order->carrier->name : "") }}',
        port_loading_id: '{{ (isset($routing_order)? $routing_order->port_loading_id : "") }}',
        port_unloading_id: '{{ (isset($routing_order)? $routing_order->port_unloading_id : "") }}',
        port_loading_name: '{{ ((isset($routing_order) and ($routing_order->port_loading_id > 0))? $routing_order->port_loading->name : "") }}',
        port_unloading_name: '{{ ((isset($routing_order) and ($routing_order->port_unloading_id > 0))? $routing_order->port_unloading->name : "") }}',
        place_receipt_id: '{{ (isset($routing_order)? $routing_order->place_receipt_id : "") }}',
        place_delivery_id: '{{ (isset($routing_order)? $routing_order->place_delivery_id : "") }}',
        place_receipt_name: '{{ ((isset($routing_order) and ($routing_order->place_receipt_id > 0))? $routing_order->place_receipt->name : "") }}',
        place_delivery_name: '{{ ((isset($routing_order) and ($routing_order->place_delivery_id > 0))? $routing_order->place_delivery->name : "") }}',

        shipper_id: '{{ (isset($routing_order)? $routing_order->shipper_id : "") }}',
        shipper_name: '{{ ((isset($routing_order) and ($routing_order->shipper_id > 0))? $routing_order->shipper->name  : "") }}',
        shipper_address: '{{ (isset($routing_order)? $routing_order->shipper_address : "") }}',
        shipper_phone: '{{ (isset($routing_order)? $routing_order->shipper_phone : "") }}',
        shipper_fax: '{{ (isset($routing_order)? $routing_order->shipper_fax : "") }}',

        consignee_id: '{{ (isset($routing_order)? $routing_order->consignee_id : "") }}',
        consignee_name: '{{ ((isset($routing_order) and ($routing_order->consignee_id >0))? $routing_order->consignee->name: "") }}',
        consignee_address: '{{ (isset($routing_order)? $routing_order->consignee_address : "") }}',
        consignee_phone: '{{ (isset($routing_order)? $routing_order->consignee_phone : "") }}',
        consignee_fax: '{{ (isset($routing_order)? $routing_order->consignee_fax : "") }}'
    },onSelect:function(e,o){
        $("#quote_id").val(e.id).change(),
        $(this).val(e.code).change(),
            $("#service_id").val(e.service_id),
            $("#service_name").val(e.service_name),
            $("#port_loading_id").val(e.port_loading_id),
            $("#port_unloading_id").val(e.port_unloading_id),
            $("#port_loading_name").val(e.port_loading_name),
            $("#port_unloading_name").val(e.port_unloading_name),
            $("#place_receipt_id").val(e.place_receipt_id),
            $("#place_delivery_id").val(e.place_delivery_id),
            $("#place_receipt_name").val(e.place_receipt_name),
            $("#place_delivery_name").val(e.place_delivery_name),
            $("#incoterm_type").val(e.incoterm_type).change(),
            $("#carrier_id").val(e.carrier_id),
            $("#carrier_name").val(e.carrier_name),

            $("#shipper_id").val(e.shipper_id),
            $("#shipper_name").val(e.shipper_name),
            $("#shipper_address").val(e.shipper_address),
            $("#shipper_phone").val(e.shipper_phone),
            $("#shipper_fax").val(e.shipper_fax),

            $("#consignee_id").val(e.consignee_id),
            $("#consignee_name").val(e.consignee_name),
            $("#consignee_address").val(e.consignee_address),
            $("#consignee_phone").val(e.consignee_phone),
            $("#consignee_fax").val(e.consignee_fax)
    },minChars:3,param:"term"
    }).on("marcopolorequestbefore",function(){$("#quote_code_img").removeClass("img-none").addClass("img-display"),$("#quote_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#quote_code_img").removeClass("img-display").addClass("img-none"),$("#quote_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#quote_id").val(0)}).blur(function(){var e=$("#quote_id").val();0==e&&(
        $(this).val(""), $("#service_id").val(""), $("#service_name").val(""), $("#port_loading_id").val(""), $("#port_unloading_id").val(""), $("#port_loading_name").val(""), $("#port_unloading_name").val(""), $("#place_receipt_id").val(""), $("#place_delivery_id").val(""), $("#place_receipt_name").val(""), $("#place_delivery_name").val(""),
 $("#shipper_id").val(""), $("#shipper_name").val(""), $("#shipper_address").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val(""), $("#consignee_id").val(""), $("#consignee_name").val(""), $("#consignee_address").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val(""))});

    $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($routing_order) ? $routing_order->place_receipt_id  : "")}}',
        value:'{{ ((isset($routing_order) and ($routing_order->place_receipt_id > 0))? $routing_order->place_receipt->name : "") }}'
    },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#place_receipt_id").val(0)
    }).blur(function() {
        var e = $("#place_receipt_id").val();
        0 == e && $(this).val("")
    });

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name}, selected: {
        id: '{{ (isset($routing_order) ? $routing_order->carrier_id : "") }}',
        name: '{{ ((isset($routing_order) and ($routing_order->carrier_id > 0) )? $routing_order->carrier->name: "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#carrier_id").val(0)
    }).blur(function() {
        var e = $("#carrier_id").val();
        0 == e && $(this).val("")
    });

    $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{ (isset($routing_order) ? $routing_order->place_delivery_id : "") }}',
        value: '{{ ((isset($routing_order) and ($routing_order->place_delivery_id > 0 )) ? $routing_order->place_delivery->name: "") }}'
    },onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#place_delivery_id").val(0)
    }).blur(function() {
        var e = $("#place_delivery_id").val();
        0 == e && $(this).val("")
    });
</script>