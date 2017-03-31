<script type="text/javascript">
    $("#carrier_type").change(function () {
        var holder = $("#carrier_type").val() === 'A' || $("#carrier_type").val() === 'W' ? "airports" :
            $("#carrier_type").val() === 'R' || $("#carrier_type").val() === 'T' ? "zip codes" :
                $("#carrier_type").val() === 'O' ? "ocean ports" : "";

        $("#origin_id").val(0);
        $("#destination_id").val(0);
        $("#origin_name").val("");
        $("#destination_name").val("");
        if($("#carrier_type").val() =='T'){
            $("#vessel_name").attr("readonly", true).val("");
            $("#voyage_name").attr("readonly", true).val("");
        }else{
            $("#vessel_name").attr("readonly", false);
            $("#voyage_name").attr("readonly", false);
        }

        $("#origin_name").attr("placeholder", holder);
        $("#destination_name").attr("placeholder", holder);

        var url = $("#carrier_type").val() === 'A' || $("#carrier_type").val() === 'W' ? "{{ route('airports.autocomplete') }}" :
            $("#carrier_type").val() === 'R' || $("#carrier_type").val() === 'T' ? "{{ route('zip_codes.autocomplete') }}" :
                $("#carrier_type").val() === 'O' ? "{{ route('ocean_ports.autocomplete') }}" : "";

        $("#origin_name").marcoPolo({

            url: url,
            formatItem: function(e, o) {
                return e.code + ' | ' + e.name
            },
            selected: {
                id: '{{ (isset($invoice) ? $invoice->origin_id : "")}}',
                name: '{{ ((isset($invoice) and $invoice->origin_id > 0) ? $invoice->origin->name : null)}}',
                code: '{{ ((isset($invoice) and $invoice->origin_id > 0) ? $invoice->origin->code : null)}}',
            },
            onSelect: function(e, o) {
                $("#origin_id").val(e.id), $(this).val(e.name), $("#destination_code").val(e.code)
            },
            minChars: 3,
            param: "term"
        }).on("marcopolorequestbefore", function() {
            $("#origin_name_img").removeClass("img-none").addClass("img-display"), $("#origin_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#origin_name_img").removeClass("img-display").addClass("img-none"), $("#origin_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#origin_id").val(0)
        }).blur(function() {
            var e = $("#origin_id").val();
            0 == e && $(this).val("")
        }),
            $("#destination_name").marcoPolo({
                url: url,
                formatItem: function(e, o) {
                    return e.code + ' | ' + e.name
                },
                selected: {
                    id: '{{ (isset($invoice) ? $invoice->destination_id : "")}}',
                    name: '{{ ((isset($invoice) and $invoice->destination_id > 0) ? $invoice->destination->name : null)}}',
                    code: '{{ ((isset($invoice) and $invoice->destination_id > 0) ? $invoice->destination->code : null)}}',
                    country_id: '{{ ((isset($invoice) and $invoice->country_id > 0) ?
$invoice->country_id: null)}}',
                    country_name: '{{ ((isset($invoice) and $invoice->country_id > 0) ?
$invoice->country->name : null)}}'
                },
                onSelect: function(e, o) {
                    $("#destination_id").val(e.id), $(this).val(e.name), $("#country_name").val(e.country_name), $("#country_id").val(e.country_id)
                },
                minChars: 3,
                param: "term"
            }).on("marcopolorequestbefore", function() {
                $("#destination_name_img").removeClass("img-none").addClass("img-display"), $("#destination_name_spn").removeClass("img-display").addClass("img-none")
            }).on("marcopolorequestafter", function() {
                $("#destination_name_img").removeClass("img-display").addClass("img-none"), $("#destination_name_spn").removeClass("img-none").addClass("img-display")
            }).keydown(function(e) {
                var o = e.keyCode ? e.keyCode : e.which;
                (8 == o || 46 == o) && $("#destination_id").val(0)
            }).blur(function() {
                var e = $("#destination_id").val();
                0 == e && ($(this).val(""), $("#country_id").val(0), $("#country_name").val(""))
            })
    });
    //$("#carrier_type").val('{{ (isset($invoice) ? $invoice->carrier_type : "") }}').change();


    $("#bill_to_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->bill_to_id : "") }}',
        value:'{{ ((isset($invoice) and $invoice->bill_to_id > 0) ? $invoice->bill_to->name : "") }}',
        address:'{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($invoice) ? $invoice->bill_to_address : ""))) }}',
        state_id:'{{ (isset($invoice)  ? $invoice->bill_to_state_id : "") }}',
        state_name:'{{ ((isset($invoice) and $invoice->bill_to_state_id > 0) ? $invoice->bill_to_state->name : "") }}',
        zip_code_id:'{{ (isset($invoice)  ? $invoice->bill_to_zip_code_id : "") }}',
        zip_code_code:'{{ ((isset($invoice) and $invoice->bill_to_zip_code_id > 0) ? $invoice->bill_to_zip_code->code : "") }}',
        city:'{{ (isset($invoice) ? $invoice->bill_to_city : "") }}',
        email:'{{ (isset($invoice) ? $invoice->bill_to_email : "") }}',
        phone:'{{ (isset($invoice) ? $invoice->bill_to_phone : "") }}',
        fax:'{{ (isset($invoice) ? $invoice->bill_to_fax : "") }}',

    },onSelect: function(e, o) {
            $("#bill_to_id").val(e.id), $(this).val(e.value),$("#bill_to_address").val(e.address),$("#bill_to_state_id").val(e.state_id),$("#bill_to_state_name").val(e.state_name),$("#bill_to_zip_code_id").val(e.zip_code_id),$("#bill_to_zip_code_code").val(e.zip_code_code),$("#bill_to_city").val(e.city),$("#bill_to_email").val(e.email),$("#bill_to_phone").val(e.phone),$("#bill_to_fax").val(e.fax)
        },minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#bill_to_name_img").removeClass("img-none").addClass("img-display"), $("#bill_to_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#bill_to_name_img").removeClass("img-display").addClass("img-none"), $("#bill_to_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#bill_to_id").val(0)}).blur(function(){var e=$("#bill_to_id").val();0==e&&($(this).val(""),  $("#bill_to_address").val(""), $("#bill_to_state_id").val(""), $("#bill_to_state_name").val(""), $("#bill_to_zip_code_id").val(""), $("#bill_to_zip_code_code").val(""), $("#bill_to_city").val(""), $("#bill_to_email").val(""), $("#bill_to_phone").val(""), $("#bill_to_fax").val(""))});

    $("#bill_to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($invoice) ? $invoice->bill_to_zip_code_id : "") }}',
        code:'{{ ((isset($invoice) and ($invoice->bill_to_zip_code_id > 0)) ? $invoice->bill_to_zip_code->code : "") }}',
        name:'{{ (isset($invoice)  ? $invoice->bill_to_city : "") }}',
        state_id:'{{ ((isset($invoice) and ($invoice->bill_to_zip_code_id > 0)) ? $invoice->bill_to_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($invoice) and ($invoice->bill_to_zip_code_id > 0)) ? $invoice->bill_to_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#bill_to_zip_code_id").val(e.id),$(this).val(e.code),$("#bill_to_city").val(e.name),$("#bill_to_state_id").val(e.state_id),$("#bill_to_state_name").val(e.state_name), $("#bill_to_country_id").val(e.country_id), $("#bill_to_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#bill_to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#bill_to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#bill_to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#bill_to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#bill_to_zip_code_id").val(0)}).blur(function(){var e=$("#bill_to_zip_code_id").val();0==e&&($(this).val(""),$("#bill_to_state_id").val(0),$("#bill_to_state_name").val(""))});

    $("#bill_to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->bill_to_state_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->bill_to_state_id >0)) ? $invoice->bill_to_state->name : "") }}',
    },onSelect:function(e,o){$("#bill_to_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#bill_to_state_name_img").removeClass("img-none").addClass("img-display"),$("#bill_to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#bill_to_state_name_img").removeClass("img-display").addClass("img-none"),$("#bill_to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#bill_to_state_id").val(0)}).blur(function(){var e=$("#bill_to_state_id").val();0==e&&$(this).val("")});

    $("#shipper_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return  e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->shipper_id : "") }}',
        value:'{{ ((isset($invoice) and $invoice->shipper_id > 0) ? $invoice->shipper->name : "") }}',
        address:'{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($invoice) ? $invoice->shipper_address : ""))) }}',
        state_id:'{{ (isset($invoice)  ? $invoice->shipper_state_id : "") }}',
        state_name:'{{ ((isset($invoice) and $invoice->shipper_state_id > 0) ? $invoice->shipper_state->name : "") }}',
        zip_code_id:'{{ (isset($invoice)  ? $invoice->shipper_zip_code_id : "") }}',
        zip_code_code:'{{ ((isset($invoice) and $invoice->shipper_zip_code_id > 0) ? $invoice->shipper_zip_code->code : "") }}',
        city:'{{ (isset($invoice) ? $invoice->shipper_city : "") }}',
        email:'{{ (isset($invoice) ? $invoice->shipper_email : "") }}',
        phone:'{{ (isset($invoice) ? $invoice->shipper_phone : "") }}',
        fax:'{{ (isset($invoice) ? $invoice->shipper_fax : "") }}',

    },onSelect: function(e, o) {
        $("#shipper_id").val(e.id), $(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_city").val(e.city),$("#shipper_email").val(e.email),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)
    },minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#shipper_name_img").removeClass("img-none").addClass("img-display"), $("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#shipper_name_img").removeClass("img-display").addClass("img-none"), $("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_id").val(0)}).blur(function(){var e=$("#shipper_id").val();0==e&&($(this).val(""),  $("#shipper_address").val(""), $("#shipper_state_id").val(""), $("#shipper_state_name").val(""), $("#shipper_zip_code_id").val(""), $("#shipper_zip_code_code").val(""), $("#shipper_city").val(""), $("#shipper_email").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val(""))});

    $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($invoice) ? $invoice->shipper_zip_code_id : "") }}',
        code:'{{ ((isset($invoice) and ($invoice->shipper_zip_code_id > 0)) ? $invoice->shipper_zip_code->code : "") }}',
        name:'{{ (isset($invoice)  ? $invoice->shipper_city : "") }}',
        state_id:'{{ ((isset($invoice) and ($invoice->shipper_zip_code_id > 0)) ? $invoice->shipper_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($invoice) and ($invoice->shipper_zip_code_id > 0)) ? $invoice->shipper_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name), $("#shipper_country_id").val(e.country_id), $("#shipper_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});

    $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->shipper_state_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->shipper_state_id >0)) ? $invoice->shipper_state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});

    $("#carrier_name").marcoPolo({url:"{{ route('carriers.autocomplete') }}",formatItem:function(e,o){return e.name}, selected:{
        id:'{{ (isset($invoice) ? $invoice->carrier_id : "") }}',
        name:'{{ ((isset($invoice) and ($invoice->carrier_id >0)) ? $invoice->carrier->name : "") }}',
    },onSelect:function(e,o){$("#carrier_id").val(e.id),$(this).val(e.name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#carrier_name_img").removeClass("img-none").addClass("img-display"),$("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#carrier_name_img").removeClass("img-display").addClass("img-none"),$("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#carrier_id").val(0)}).blur(function(){var e=$("#carrier_id").val();0==e&&$(this).val("")});

    $("#consignee_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->consignee_id : "") }}',
        value:'{{ ((isset($invoice) and $invoice->consignee_id > 0) ? $invoice->consignee->name : "") }}',
        address:'{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($invoice) ? $invoice->consignee_address : ""))) }}',
        state_id:'{{ (isset($invoice)  ? $invoice->consignee_state_id : "") }}',
        state_name:'{{ ((isset($invoice) and $invoice->consignee_state_id > 0) ? $invoice->consignee_state->name : "") }}',
        zip_code_id:'{{ (isset($invoice)  ? $invoice->consignee_zip_code_id : "") }}',
        zip_code_code:'{{ ((isset($invoice) and $invoice->consignee_zip_code_id > 0) ? $invoice->consignee_zip_code->code : "") }}',
        city:'{{ (isset($invoice) ? $invoice->consignee_city : "") }}',
        email:'{{ (isset($invoice) ? $invoice->consignee_email : "") }}',
        phone:'{{ (isset($invoice) ? $invoice->consignee_phone : "") }}',
        fax:'{{ (isset($invoice) ? $invoice->consignee_fax : "") }}',

    },onSelect: function(e, o) {
        $("#consignee_id").val(e.id), $(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_city").val(e.city),$("#consignee_email").val(e.email),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)
    },minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#consignee_name_img").removeClass("img-none").addClass("img-display"), $("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#consignee_name_img").removeClass("img-display").addClass("img-none"), $("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_id").val(0)}).blur(function(){var e=$("#consignee_id").val();0==e&&($(this).val(""),  $("#consignee_address").val(""), $("#consignee_state_id").val(""), $("#consignee_state_name").val(""), $("#consignee_zip_code_id").val(""), $("#consignee_zip_code_code").val(""), $("#consignee_city").val(""), $("#consignee_email").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val(""))});

    $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
        id:'{{ (isset($invoice) ? $invoice->consignee_zip_code_id : "") }}',
        code:'{{ ((isset($invoice) and ($invoice->consignee_zip_code_id > 0)) ? $invoice->consignee_zip_code->code : "") }}',
        name:'{{ (isset($invoice)  ? $invoice->consignee_city : "") }}',
        state_id:'{{ ((isset($invoice) and ($invoice->consignee_zip_code_id > 0)) ? $invoice->consignee_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($invoice) and ($invoice->consignee_zip_code_id > 0)) ? $invoice->consignee_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name), $("#consignee_country_id").val(e.country_id), $("#consignee_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});

    $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->consignee_state_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->consignee_state_id >0)) ? $invoice->consignee_state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});

    $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->place_receipt_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->place_receipt_id >0)) ? $invoice->place_receipt->name : "") }}',
    },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_receipt_id").val(0)}).blur(function(){var e=$("#place_receipt_id").val();0==e&&$(this).val("")});

    $("#ultimate_destination_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->ultimate_destination_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->ultimate_destination_id >0)) ? $invoice->ultimate_destination->name : "") }}',
    },onSelect:function(e,o){$("#ultimate_destination_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#ultimate_destination_name_img").removeClass("img-none").addClass("img-display"),$("#ultimate_destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#ultimate_destination_name_img").removeClass("img-display").addClass("img-none"),$("#ultimate_destination_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#ultimate_destination_id").val(0)}).blur(function(){var e=$("#ultimate_destination_id").val();0==e&&$(this).val("")});

    $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($invoice) ? $invoice->agent_id : "") }}',
        value:'{{ ((isset($invoice) and ($invoice->agent_id >0)) ? $invoice->agent->name : "") }}',
    },onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&$(this).val("")});

    $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.code), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_billing_id").val(0)}).blur(function(){var e=$("#billing_billing_id").val();0==e&&($(this).val(""))});

    $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_customer_id").val(0)}).blur(function(){var e=$("#billing_customer_id").val();0==e&&($(this).val(""))});

    $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_vendor_id").val(0)}).blur(function(){var e=$("#billing_vendor_id").val();0==e&&($(this).val(""))});

</script>