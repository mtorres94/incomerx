<script type="text/javascript">
    $("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},selected:{
      id: '{{ (isset($quotes) ? $quotes->division_id : 0) }}', value: '{{ ((isset($quotes) and ($quotes->division_id > 0)) ? $quotes->division->name  : "")}}',
    },onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#division_id").val(0)
    }).blur(function() {
        var e = $("#division_id").val();
        0 == e && $(this).val("")
    });


        $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id:'{{ (isset($quotes) ? $quotes->place_receipt_id  : "")}}',
            value:'{{ ((isset($quotes) and ($quotes->place_receipt_id > 0))? $quotes->place_receipt->name : "") }}'
        },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#place_receipt_id").val(0)
        }).blur(function() {
            var e = $("#place_receipt_id").val();
            0 == e && $(this).val("")
        });

        $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes) ? $quotes->place_delivery_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->place_delivery_id > 0 )) ? $quotes->place_delivery->name: "") }}'
        },onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#place_delivery_id").val(0)
        }).blur(function() {
            var e = $("#place_delivery_id").val();
            0 == e && $(this).val("")
        });

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name}, selected: {
        id: '{{ (isset($quotes) ? $quotes->carrier_id : "") }}',
        name: '{{ ((isset($quotes) and ($quotes->carrier_id > 0) )? $quotes->carrier->name: "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term",
        required: !0
    }).on("marcopolorequestbefore", function() {
        $("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#carrier_id").val(0)
    }).blur(function() {
        var e = $("#carrier_id").val();
        0 == e && $(this).val("")
    });


        $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected: {
            id: '{{ (isset($quotes) ? $quotes->port_loading_id : "")  }}',
            name: '{{ ((isset($quotes) and ($quotes->port_loading_id > 0))? $quotes->port_loading->name: "")  }}',
        },onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#port_loading_id").val(0)
        }).blur(function() {
            var e = $("#port_loading_id").val();
            0 == e && $(this).val("")
        });


        $("#transhipment_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected: {
            id: '{{ (isset($quotes)? $quotes->transhipment_port_id : "") }}',
            name: '{{ ((isset($quotes) and ($quotes->transhipment_port_id > 0))? $quotes->transhipment_port->name : "") }}',

        },onSelect:function(e,o){$("#transhipment_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transhipment_port_name_img").removeClass("img-none").addClass("img-display"),$("#transhipment_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transhipment_port_name_img").removeClass("img-display").addClass("img-none"),$("#transhipment_port_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#transhipment_port_id").val(0)
        }).blur(function() {
            var e = $("#transhipment_port_id").val();
            0 == e && $(this).val("")
        });


        $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected: {
            id: '{{ (isset($quotes) ? $quotes->port_unloading_id : "") }}',
            name: '{{ ((isset($quotes) and ($quotes->port_unloading_id > 0)) ? $quotes->port_unloading->name : "") }}',
        },onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#port_unloading_id").val(0)
        }).blur(function() {
            var e = $("#port_unloading_id").val();
            0 == e && $(this).val("")
        });


        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{  (isset($quotes) ? $quotes->shipper_id : "") }}',
            value: '{{  ((isset($quotes) and ($quotes->shipper_id > 0)) ? $quotes->shipper->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($quotes) and ($quotes->shipper_id > 0)) ? $quotes->shipper->address : ""))) }}',
            city: '{{  ((isset($quotes) and ($quotes->shipper_id > 0)) ? $quotes->shipper_city: "") }}',
            state_id: '{{  (isset($quotes) ? $quotes->shipper_state_id : "") }}',
            state_name: '{{  ((isset($quotes) and ($quotes->shipper_state_id > 0)) ? $quotes->shipper_state->name: "") }}',
            zip_code_id: '{{  (isset($quotes) ? $quotes->shipper_zip_code_id : "") }}',
            zip_code_code: '{{  ((isset($quotes) and ($quotes->shipper_zip_code_id > 0)) ? $quotes->shipper_zip_code->code: "") }}',
            country_id: '{{  (isset($quotes)  ? $quotes->shipper_country_id : "") }}',
            country_name: '{{  ((isset($quotes) and ($quotes->shipper_country_id > 0)) ? $quotes->shipper_country->name: "") }}',
            phone: '{{  ((isset($quotes) and ($quotes->shipper_id > 0)) ? $quotes->shipper_phone : "") }}',
            fax: '{{  ((isset($quotes) and ($quotes->shipper_id > 0)) ? $quotes->shipper_fax : "") }}'
        },onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_country_id").val(e.country_id),$("#shipper_country_name").val(e.country_name),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).
        keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#shipper_id").val(0)
        }).blur(function() {
            var e = $("#shipper_id").val();
            0 == e && ($(this).val(""), $("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""), $("#shipper_country_id").val(""),$("#shipper_country_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))
        });


        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes) ? $quotes->shipper_state_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->shipper_state_id > 0)) ? $quotes->shipper_state->name : "") }}',
            country_id: '{{ (isset($quotes)  ? $quotes->shipper_country_id : "") }}',
            country_name: '{{ ((isset($quotes) and ($quotes->shipper_country_id > 0)) ? $quotes->shipper_country->name : "") }}',

        },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value), $("#shipper_country_id").val(e.country_id), $("#shipper_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});



        $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes) ? $quotes->shipper_country_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->shipper_country_id > 0)) ? $quotes->shipper_country->name : "") }}',
        },onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_country_id").val(0)}).blur(function(){var e=$("#shipper_country_id").val();0==e&&$(this).val("")});



        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($quotes) ? $quotes->shipper_zip_code_id : "") }}',
            code: '{{ ((isset($quotes) and ($quotes->shipper_zip_code_id > 0)) ? $quotes->shipper_zip_code->code : "") }}',

            state_id: '{{ ((isset($quotes) and ($quotes->shipper_zip_code_id > 0)) ? $quotes->shipper_zip_code->state_id: "") }}',
            state_name: '{{ ((isset($quotes) and ($quotes->shipper_zip_code_id > 0)) ? $quotes->shipper_zip_code->state->name: "") }}',
        },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});



        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes)? $quotes->consignee_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->consignee_id > 0))? $quotes->consignee->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($quotes) and ($quotes->consignee_id > 0))? $quotes->consignee->address : ""))) }}',
            city: '{{ ((isset($quotes) and ($quotes->consignee_id > 0))? $quotes->consignee_city : "") }}',
            phone: '{{ ((isset($quotes) and ($quotes->consignee_id > 0))? $quotes->consignee_phone : "") }}',
            fax: '{{ ((isset($quotes) and ($quotes->consignee_id > 0))? $quotes->consignee_fax : "") }}',
            state_id: '{{ (isset($quotes) ? $quotes->consignee_state_id : "") }}',
            state_name: '{{ ((isset($quotes) and ($quotes->consignee_state_id > 0))? $quotes->consignee_state->name : "") }}',
            country_id: '{{ (isset($quotes) ? $quotes->consignee_country_id : "") }}',
            country_name: '{{ ((isset($quotes) and ($quotes->consignee_country_id > 0))? $quotes->consignee_country->name : "") }}',
            zip_code_id: '{{ (isset($quotes) ? $quotes->consignee_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($quotes) and ($quotes->consignee_zip_code_id > 0))? $quotes->consignee_zip_code->name : "") }}',
            agent_id: '{{ ((isset($quotes) and ($quotes->agent_id > 0))? $quotes->consignee->agent_id : "") }}',
            agent_name: '{{ ((isset($quotes) and ($quotes->agent_id > 0))? $quotes->agent->name  : "") }}',
            agent_phone: '{{ ((isset($quotes) and ($quotes->agent_id > 0))? $quotes->agent->phone  : "") }}',
            agent_fax: '{{ ((isset($quotes) and ($quotes->agent_id > 0))? $quotes->agent->fax  : "") }}',

        },onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code), $("#consignee_country_id").val(e.country_id),$("#consignee_country_name").val(e.country_name), $("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax), $("#agent_id").val(e.agent_id), $("#agent_name").val(e.agent_name), $('#agent_phone').val(e.agent_phone), $("#agent_fax").val(e.agent_fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_id").val(0)}).blur(function(){var e=$("#consignee_id").val();0==e&& ($(this).val(""), $("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))});



        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes) ? $quotes->consignee_state_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->consignee_state_id > 0 )) ? $quotes->consignee_state->name : "") }}',
            country_id: '{{ (isset($quotes)  ? $quotes->consignee_country_id : "") }}',
            country_name: '{{ ((isset($quotes) and ($quotes->consignee_country_id > 0)) ? $quotes->consignee_country->name : "") }}',
        },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value), $("#consignee_country_id").val(e.country_id), $("#consignee_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});



        $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},  selected: {
            id: '{{ (isset($quotes) ? $quotes->consignee_country_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->consignee_country_id > 0)) ? $quotes->consignee_country->name: "") }}',
        },onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_country_id").val(0)}).blur(function(){var e=$("#consignee_country_id").val();0==e&&$(this).val("")});

        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
            id: '{{ (isset($quotes) ? $quotes->consignee_zip_code_id : "") }}',
            code: '{{ ((isset($quotes) and ($quotes->consignee_zip_code_id > 0)) ? $quotes->consignee_zip_code->code: "") }}',
            state_id: '{{ ((isset($quotes) and ($quotes->consignee_zip_code_id > 0)) ? $quotes->consignee_zip_code->state_id: "") }}',
            state_name: '{{ ((isset($quotes) and ($quotes->consignee_zip_code_id > 0)) ? $quotes->consignee_zip_code->state->name: "") }}',
        },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});



        $("#customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($quotes) ? $quotes->customer_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->customer_id > 0)) ? $quotes->customer->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),  ' ',((isset($quotes) and ($quotes->customer_id > 0)) ? $quotes->customer->address : ""))) }}',
            city: '{{ ((isset($quotes) and ($quotes->customer_id > 0)) ? $quotes->customer->city : "") }}',
            phone: '{{ ((isset($quotes) and ($quotes->customer_id > 0)) ? $quotes->customer->phone : "") }}',
            fax: '{{ ((isset($quotes) and ($quotes->customer_id > 0)) ? $quotes->customer->fax : "") }}',
            state_id: '{{ (isset($quotes) ? $quotes->customer_state_id : "") }}',
            state_name: '{{ ((isset($quotes) and ($quotes->customer_state_id > 0)) ? $quotes->customer_state->name : "") }}',
            zip_code_id: '{{ (isset($quotes) ? $quotes->customer_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($quotes) and ($quotes->customer_zip_code_id > 0)) ? $quotes->customer_zip_code->code : "") }}',
            country_id: '{{ (isset($quotes) ? $quotes->customer_country_id : "") }}',
            country_name: '{{ ((isset($quotes) and ($quotes->customer_country_id > 0 )) ? $quotes->customer_country->name : "") }}'
        },onSelect:function(e,o){$("#customer_id").val(e.id),$(this).val(e.value),$("#customer_address").val(e.address),$("#customer_city").val(e.city),$("#customer_state_id").val(e.state_id),$("#customer_state_name").val(e.state_name),$("#customer_zip_code_id").val(e.zip_code_id),$("#customer_zip_code_code").val(e.zip_code_code),$("#customer_country_id").val(e.country_id),$("#customer_country_name").val(e.country_name),$("#customer_phone").val(e.phone),$("#customer_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#customer_name_img").removeClass("img-none").addClass("img-display"),$("#customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_name_img").removeClass("img-display").addClass("img-none"),$("#customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#customer_id").val(0)}).blur(function(){var e=$("#customer_id").val();0==e&&($("#customer_id").val(0),$("#customer_address").val(""),$("#customer_city").val(""),$("#customer_state_id").val(""),$("#customer_state_name").val(""),$("#customer_zip_code_id").val(""),$("#customer_zip_code_code").val(""),$("#customer_phone").val(""),$("#customer_fax").val(""))});



        $("#customer_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: '{{ (isset($quotes) ? $quotes->customer_state_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->customer_state_id )) ? $quotes->customer_state->name : "") }}',
            country_id: '{{ (isset($quotes)  ? $quotes->customer_country_id : "") }}',
            country_name: '{{ ((isset($quotes) and ($quotes->customer_country_id > 0)) ? $quotes->customer_country->name : "") }}',
        },onSelect:function(e,o){$("#customer_state_id").val(e.id),$(this).val(e.value), $("customer_country_id").val(e.country_id), $("customer_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#customer_state_name_img").removeClass("img-none").addClass("img-display"),$("#customer_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_state_name_img").removeClass("img-display").addClass("img-none"),$("#customer_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#customer_state_id").val(0)}).blur(function(){var e=$("#customer_state_id").val();0==e&&$(this).val("")});


        $("#customer_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
            id: '{{ (isset($quotes) ? $quotes->customer_country_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->customer_country_id > 0))? $quotes->customer_country->name : "" ) }}',
        }, onSelect:function(e,o){$("#customer_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#customer_country_name_img").removeClass("img-none").addClass("img-display"),$("#customer_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_country_name_img").removeClass("img-display").addClass("img-none"),$("#customer_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#customer_country_id").val(0)}).blur(function(){var e=$("#customer_country_id").val();0==e&&$(this).val("")});


        $("#customer_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
            id: '{{ (isset($quotes) ? $quotes->customer_zip_code_id : "") }}',
            code: '{{ ((isset($quotes) and ($quotes->customer_zip_code_id > 0)) ? $quotes->customer_zip_code->code : "") }}',

            state_id: '{{ ((isset($quotes) and ($quotes->customer_zip_code_id > 0)) ? $quotes->customer_zip_code->state_id : "") }}',
            state_name: '{{ ((isset($quotes) and ($quotes->customer_zip_code_id > 0)) ? $quotes->customer_zip_code->state->name : "") }}',
           },onSelect:function(e,o){$("#customer_zip_code_id").val(e.id),$(this).val(e.code),$("#customer_state_id").val(e.state_id),$("#customer_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#customer_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#customer_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#customer_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#customer_zip_code_id").val(0)}).blur(function(){var e=$("#customer_zip_code_id").val();0==e&&($(this).val(""),$("#customer_state_id").val(0),$("#customer_state_name").val(""))});


        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
            id: '{{ (isset($quotes)? $quotes->agent_id : "") }}',
            value: '{{ ((isset($quotes) and ($quotes->agent_id > 0 ))? $quotes->agent->name : "") }}',
        },onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_phone").val(e.phone)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""))});


        $("#total_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},selected:{
            id: '{{ (isset($quotes) ? $quotes->total_cargo_type_id : "") }}',
            code: '{{ ((isset($quotes) and ($quotes->total_cargo_type_id > 0)) ? $quotes->total_cargo_type->code : "") }}',
        },onSelect:function(e,o){$("#total_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#total_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#total_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#total_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#total_cargo_type_id").val(0)}).blur(function(){var e=$("#total_cargo_type_id").val();0==e&&($(this).val(""))});


        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.name}, selected:{
            id: '{{ (isset($quotes) ? $quotes->total_commodity_id : "") }}',
            name: '{{ ((isset($quotes) and ($quotes->total_commodity_id > 0)) ? $quotes->total_commodity->name: "") }}',
        },onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#total_commodity_id").val(0)}).blur(function(){var e=$("#total_commodity_id").val();0==e&&($(this).val(""))});


        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},selected:{
            id: '{{ (isset($quotes)? $quotes->equipment_type_id : "") }}',
            code: '{{ ((isset($quotes) and ($quotes->equipment_type_id > 0))? $quotes->equipment_type->code : "") }}',
        },onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#equipment_type_id").val(0)}).blur(function(){var e=$("#equipment_type_id").val();0==e&&($(this).val(""))});


        $("#service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name}, selected: {
            id: '{{ (isset($quotes) ? $quotes->service_id : "") }}',
            name: '{{ ((isset($quotes) and ($quotes->service_id > 0)) ? $quotes->service->name : "") }}',
        },onSelect:function(e,o){$("#service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#service_name_img").removeClass("img-none").addClass("img-display"),$("#service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#service_name_img").removeClass("img-display").addClass("img-none"),$("#service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#service_id").val(0)}).blur(function(){var e=$("#service_id").val();0==e&&($(this).val(""))});

        $("#container_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#container_commodity_id").val(e.id),$(this).val(e.name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#container_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#container_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_commodity_id").val(0)}).blur(function(){var e=$("#container_commodity_id").val();0==e&&($(this).val(""))});

    $("#container_pickup_type").change(function () {
        var url = $("#container_pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_pickup_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_pickup_type").val() === '01' ?  e.name :  e.value;
                $("#container_pickup_id").val(e.id),
                        $(this).val(name),
                        $("#container_pickup_address").val(e.address),
                        $("#container_pickup_city").val(e.city),
                        $("#container_pickup_state_id").val(e.state_id),
                        $("#container_pickup_state_name").val(e.state_name),
                        $("#container_pickup_zip_code_id").val(e.zip_code_id),
                        $("#container_pickup_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_id").val(0)}).blur(function(){var e=$("#container_pickup_id").val();0==e&&($(this).val(""))});
    });

    $("#container_delivery_type").change(function () {
        var url = $("#container_delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_delivery_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_delivery_type").val() === '01' ?  e.name :  e.value;
                $("#container_delivery_id").val(e.id),
                        $(this).val(name),
                        $("#container_delivery_address").val(e.address),
                        $("#container_delivery_city").val(e.city),
                        $("#container_delivery_state_id").val(e.state_id),
                        $("#container_delivery_state_name").val(e.state_name),
                        $("#container_delivery_zip_code_id").val(e.zip_code_id),
                        $("#container_delivery_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_id").val(0)}).blur(function(){var e=$("#container_delivery_id").val();0==e&&($(this).val(""))});
    });

    $("#container_drop_type").change(function () {
        var url = $("#container_drop_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_drop_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_drop_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_drop_type").val() === '01' ?  e.name :  e.value;
                $("#container_drop_id").val(e.id),
                        $(this).val(name),
                        $("#container_drop_address").val(e.address),
                        $("#container_drop_city").val(e.city),
                        $("#container_drop_state_id").val(e.state_id),
                        $("#container_drop_state_name").val(e.state_name),
                        $("#container_drop_zip_code_id").val(e.zip_code_id),
                        $("#container_drop_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_id").val(0)}).blur(function(){var e=$("#container_drop_id").val();0==e&&($(this).val(""))});
    });



        $("#box_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#box_uns_id").val(e.id),$(this).val(e.code),$('#box_uns_description').val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#box_uns_code_img").removeClass("img-none").addClass("img-display"),$("#box_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_uns_code_img").removeClass("img-display").addClass("img-none"),$("#box_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_uns_id").val(0)}).blur(function(){var e=$("#box_uns_id").val();0==e&&($(this).val(""))});


        $("#box_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#box_scheduleb_id").val(e.id),$(this).val(e.code), $("#box_scheduleb_description").val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#box_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#box_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#box_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_scheduleb_id").val(0)}).blur(function(){var e=$("#box_scheduleb_id").val();0==e&&($(this).val(""))});



        $("#box_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#box_hts_id").val(e.id),$(this).val(e.code), $("#box_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_hts_code_img").removeClass("img-none").addClass("img-display"),$("#box_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_hts_code_img").removeClass("img-display").addClass("img-none"),$("#box_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_hts_id").val(0)}).blur(function(){var e=$("#box_hts_id").val();0==e&&$(this).val("")});



        $("#box_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#box_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#box_license_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_license_type_id").val(0)}).blur(function(){var e=$("#box_license_type_id").val();0==e&&($(this).val(""))});


        $("#box_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_export_code_img").removeClass("img-none").addClass("img-display"),$("#box_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_export_code_img").removeClass("img-display").addClass("img-none"),$("#box_export_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_export_id").val(0)}).blur(function(){var e=$("#box_export_id").val();0==e&&($(this).val(""))});


        $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.code), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_billing_id").val(0)}).blur(function(){var e=$("#billing_billing_id").val();0==e&&($(this).val(""))});



        $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_customer_id").val(0)}).blur(function(){var e=$("#billing_customer_id").val();0==e&&($(this).val(""))});


        $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_vendor_code").val(0)}).blur(function(){var e=$("#billing_vendor_code").val();0==e&&($(this).val(""))});


        $("#cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cost_unit_id").val(0)}).blur(function(){var e=$("#cost_unit_id").val()});


        $("#billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_unit_id").val(0)}).blur(function(){var e=$("#billing_unit_id").val()});


    $("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_carrier_id").val(0)}).blur(function(){var e=$("#container_carrier_id").val()});


        $("#container_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_pickup_state_id").val(e.id),$(this).val(e.value), $("#container_pickup_country_id").val(e.country_id), $("#container_pickup_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_state_id").val(0)}).blur(function(){var e=$("#container_pickup_state_id").val();0==e&&$(this).val("")});



        $("#container_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_delivery_state_id").val(e.id),$(this).val(e.value), $("#container_delivery_country_id").val(e.country_id), $("#container_delivery_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_state_id").val(0)}).blur(function(){var e=$("#container_delivery_state_id").val();0==e&&$(this).val("")});



        $("#container_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_drop_state_id").val(e.id),$(this).val(e.value), $("#container_drop_country_id").val(e.country_id), $("#container_drop_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_state_id").val(0)}).blur(function(){var e=$("#container_drop_state_id").val();0==e&&$(this).val("")});



        $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))});



        $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code), $("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))});



        $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))});


    $("#container_pickup_type").change(function () {
        var url = $("#container_pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_pickup_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_pickup_type").val() === '01' ?  e.name :  e.value;
                $("#container_pickup_id").val(e.id).change(),
                        $(this).val(name),
                        $("#container_pickup_address").val(e.address),
                        $("#container_pickup_city").val(e.city),
                        $("#container_pickup_state_id").val(e.state_id).change(),
                        $("#container_pickup_state_name").val(e.state_name),
                        $("#container_pickup_zip_code_id").val(e.zip_code_id).change(),
                        $("#container_pickup_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_id").val(0)}).blur(function(){var e=$("#container_pickup_id").val()});
    });

    $("#container_delivery_type").change(function () {
        var url = $("#container_delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_delivery_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_delivery_type").val() === '01' ?  e.name :  e.value;
                $("#container_delivery_id").val(e.id).change(),
                        $(this).val(name),
                        $("#container_delivery_address").val(e.address),
                        $("#container_delivery_city").val(e.city),
                        $("#container_delivery_state_id").val(e.state_id).change(),
                        $("#container_delivery_state_name").val(e.state_name),
                        $("#container_delivery_zip_code_id").val(e.zip_code_id).change(),
                        $("#container_delivery_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_id").val(0)}).blur(function(){var e=$("#container_delivery_id").val()});
    });

    $("#container_drop_type").change(function () {
        var url = $("#container_drop_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_drop_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_drop_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_drop_type").val() === '01' ?  e.name :  e.value;
                $("#container_drop_id").val(e.id),
                        $(this).val(name),
                        $("#container_drop_address").val(e.address),
                        $("#container_drop_city").val(e.city),
                        $("#container_drop_state_id").val(e.state_id).change(),
                        $("#container_drop_state_name").val(e.state_name),
                        $("#container_drop_zip_code_id").val(e.zip_code_id).change(),
                        $("#container_drop_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_id").val(0)}).blur(function(){var e=$("#container_drop_id").val()});
    });

    /*if($("#container_pickup_type").val() == ""){ $("#container_pickup_type").val("02").change()};
    if($("#container_delivery_type").val() == ""){ $("#container_delivery_type").val("02").change()};
    if($("#container_drop_type").val() == ""){ $("#container_drop_type").val("02").change()};*/


</script>
