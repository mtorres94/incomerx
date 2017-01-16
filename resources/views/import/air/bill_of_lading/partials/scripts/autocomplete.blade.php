<script type="text/javascript">
    $("#division_name").focus(function () {$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
    });


        $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id : '{{ ( isset($bill_of_lading) ? $bill_of_lading->forwarding_agent_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->forwarding_agent_id > 0 ) ) ? $bill_of_lading->forwarding_agent->name : "")}}'
        },onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#forwarding_agent_id").val(0)}).blur(function(){var e=$("#forwarding_agent_id").val();0==e&&($(this).val(""))});

        $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->port_loading_id : "") }}',
            name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_loading_id > 0 ))? $bill_of_lading->port_loading_name->name : "") }}',
        },onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name), $("#port_loading").val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_loading_id").val(0)}).blur(function(){var e=$("#port_loading_id").val();0==e&&($(this).val(""))});


        $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->port_unloading_id : "") }}',
            name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_unloading_id > 0 ))? $bill_of_lading->port_unloading_name->name : "") }}',
            code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_unloading_id > 0 ))? $bill_of_lading->port_unloading_name->code : "") }}',
        },onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name), $("#port_unloading_code").val(e.code), $("#port_unloading").val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_unloading_id").val(0)}).blur(function(){var e=$("#port_unloading_id").val();0==e&&($(this).val(""))});


        $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->place_receipt_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->place_receipt_id > 0 ))? $bill_of_lading->place_receipt_name->name : "") }}',
        },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value), $("#place_receipt").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_receipt_id").val(0)}).blur(function(){var e=$("#place_receipt_id").val();0==e&&($(this).val(""))});

        $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->place_delivery_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->place_delivery_id > 0 ))? $bill_of_lading->place_delivery_name->name : "") }}',
        },onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value), $("#place_delivery").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_delivery_id").val(0)}).blur(function(){var e=$("#place_delivery_id").val();0==e&&($(this).val(""))});


        $("#destiny_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->destiny_country_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->destiny_country_id > 0 ))? $bill_of_lading->destiny_country ->name : "") }}',
        },onSelect:function(e,o){$("#destiny_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#destiny_country_name_img").removeClass("img-none").addClass("img-display"),$("#destiny_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destiny_country_name_img").removeClass("img-display").addClass("img-none"),$("#destiny_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destiny_country_id").val(0)}).blur(function(){var e=$("#destiny_country_id").val();0==e&&($(this).val(""))});


    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},selected:{
        id: '{{ (isset($bill_of_lading) ? $bill_of_lading->carrier_id : "") }}',
        name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->carrier_id > 0 ))? $bill_of_lading->carrier->name : "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name), $("#first_carrier").val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {
        $("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#carrier_id").val(0)}).blur(function(){var e=$("#carrier_id").val();0==e&&($(this).val(""))});


    $("#delivery_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},selected:{
        id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_carrier_id : "") }}',
        name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_carrier_id > 0 ))? $bill_of_lading->delivery_carrier->name : "") }}',
    },onSelect: function(e, o) {$("#delivery_carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#delivery_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#delivery_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#delivery_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#delivery_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_carrier_id").val(0)}).blur(function(){var e=$("#delivery_carrier_id").val();0==e&&($(this).val(""))});

        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_id > 0 ))? $bill_of_lading->shipper->name : "") }}',
            address: '{{  trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($bill_of_lading) ? $bill_of_lading->shipper_address : "") ))}}',
            city: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_city: "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_state_id > 0 ))? $bill_of_lading->shipper_state->name : "") }}',
            zip_code_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_zip_code_id > 0 ))? $bill_of_lading->shipper_zip_code->name : "")}}',
            phone: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_phone: "") }}',
            fax: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_fax: "") }}',

        },onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_id").val(0)}).blur(function(){var e=$("#shipper_id").val();0==e&&($(this).val(""), $("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))});

        $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->notify_id > 0 ))? $bill_of_lading->notify->name : "") }}',
            address: '{{  trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($bill_of_lading) ? $bill_of_lading->notify_address : "") ))}}',
            city: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_city: "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->notify_state_id > 0 ))? $bill_of_lading->notify_state->name : "") }}',
            zip_code_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->notify_zip_code_id > 0 ))? $bill_of_lading->notify_zip_code->name : "")}}',
            phone: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_phone: "") }}',
            fax: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_fax: "") }}',

        },onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_id").val(0)}).blur(function(){var e=$("#notify_id").val();0==e&&($(this).val(""), $("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))});

        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_id > 0 ))? $bill_of_lading->consignee->name : "") }}',
            address: '{{  trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($bill_of_lading) ? $bill_of_lading->consignee_address : "") ))}}',
            city: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_city: "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_state_id > 0 ))? $bill_of_lading->consignee_state->name : "") }}',
            zip_code_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_zip_code_id > 0 ))? $bill_of_lading->consignee_zip_code->name : "")}}',
            phone: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_phone: "") }}',
            fax: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_fax: "") }}',

        },onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_id").val(0)}).blur(function(){var e=$("#consignee_id").val();0==e&&($(this).val(""),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))});

        $("#location_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_id > 0 ))? $bill_of_lading->location->name : "") }}',
            address: '{{  trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($bill_of_lading) ? $bill_of_lading->location_address : "") ))}}',
            city: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_city: "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_state_id > 0 ))? $bill_of_lading->location_state->name : "") }}',
            zip_code_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_zip_code_id > 0 ))? $bill_of_lading->location_zip_code->name : "")}}',
            phone: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_phone: "") }}',
            fax: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_fax: "") }}',

        },onSelect:function(e,o){$("#location_id").val(e.id),$(this).val(e.value),$("#location_address").val(e.address),$("#location_city").val(e.city),$("#location_state_id").val(e.state_id),$("#location_state_name").val(e.state_name),$("#location_zip_code_id").val(e.zip_code_id),$("#location_zip_code_code").val(e.zip_code_code),$("#location_phone").val(e.phone),$("#location_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#location_name_img").removeClass("img-none").addClass("img-display"),$("#location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_name_img").removeClass("img-display").addClass("img-none"),$("#location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_id").val(0)}).blur(function(){var e=$("#location_id").val();0==e&&($(this).val(""),$("#location_address").val(""),$("#location_city").val(""),$("#location_state_id").val(""),$("#location_state_name").val(""),$("#location_zip_code_id").val(""),$("#location_zip_code_code").val(""),$("#location_phone").val(""),$("#location_fax").val(""))});

        $("#delivery_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_id > 0 ))? $bill_of_lading->place_delivery_name->name : "") }}',
            address: '{{  trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($bill_of_lading) ? $bill_of_lading->delivery_address : "") ))}}',
            city: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_city: "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_state_id > 0 ))? $bill_of_lading->delivery_state->name : "") }}',
            zip_code_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_zip_code_id > 0 ))? $bill_of_lading->delivery_zip_code->name : "")}}',
            phone: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_phone: "") }}',
            fax: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_fax: "") }}',

        },onSelect:function(e,o){$("#delivery_id").val(e.id),$(this).val(e.value),$("#delivery_address").val(e.address),$("#delivery_city").val(e.city),$("#delivery_state_id").val(e.state_id),$("#delivery_state_name").val(e.state_name),$("#delivery_zip_code_id").val(e.zip_code_id),$("#delivery_zip_code_code").val(e.zip_code_code),$("#delivery_phone").val(e.phone),$("#delivery_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#delivery_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_id").val(0)}).blur(function(){var e=$("#delivery_id").val();0==e&&($(this).val(""),$("#delivery_address").val(""),$("#delivery_city").val(""),$("#delivery_state_id").val(""),$("#delivery_state_name").val(""),$("#delivery_zip_code_id").val(""),$("#delivery_zip_code_code").val(""),$("#delivery_phone").val(""),$("#delivery_fax").val(""))});


        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_id > 0 ))? $bill_of_lading->shipper->name : "") }}',
        },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});


        $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_id > 0 ))? $bill_of_lading->shipper->name : "") }}',
        },onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")});

        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_state_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_state_id > 0 ))? $bill_of_lading->consignee_state->name : "") }}',
        },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});


        $("#location_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_state_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_state_id > 0 ))? $bill_of_lading->location_state->name : "") }}',
        },onSelect:function(e,o){$("#location_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#location_state_name_img").removeClass("img-none").addClass("img-display"),$("#location_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_state_name_img").removeClass("img-display").addClass("img-none"),$("#location_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_state_id").val(0)}).blur(function(){var e=$("#location_state_id").val();0==e&&$(this).val("")});


        $("#delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_state_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_state_id > 0 ))? $bill_of_lading->delivery_state->name : "") }}',
        },onSelect:function(e,o){$("#delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_state_id").val(0)}).blur(function(){var e=$("#delivery_state_id").val();0==e&&$(this).val("")});


        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_zip_code_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_zip_code_id > 0 ))? $bill_of_lading->shipper_zip_code->code : "") }}',
            name: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_city : "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_state_id > 0 ))? $bill_of_lading->shipper_state->name : "") }}',
        },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});

        $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_zip_code_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->notify_zip_code_id > 0 ))? $bill_of_lading->notify_zip_code->code : "") }}',
            name: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_city : "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->notify_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->notify_state_id > 0 ))? $bill_of_lading->notify_state->name : "") }}',
        },onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))});


        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_zip_code_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_zip_code_id > 0 ))? $bill_of_lading->consignee_zip_code->code : "") }}',
            name: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_city : "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_state_id > 0 ))? $bill_of_lading->consignee_state->name : "") }}',
        },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#origin_from_state_name").val(""))});


        $("#location_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_zip_code_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_zip_code_id > 0 ))? $bill_of_lading->location_zip_code->code : "") }}',
            name: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_city : "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->location_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->location_state_id > 0 ))? $bill_of_lading->location_state->name : "") }}',
        },onSelect:function(e,o){$("#location_zip_code_id").val(e.id),$(this).val(e.code),$("#location_city").val(e.name),$("#location_state_id").val(e.state_id),$("#location_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#location_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#location_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#location_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_zip_code_id").val(0)}).blur(function(){var e=$("#location_zip_code_id").val();0==e&&($(this).val(""),$("#location_city").val(""),$("#location_state_id").val(0),$("#origin_from_state_name").val(""))});


        $("#delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_zip_code_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_zip_code_id > 0 ))? $bill_of_lading->delivery_zip_code->code : "") }}',
            name: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_city : "") }}',
            state_id: '{{ (isset($bill_of_lading) ? $bill_of_lading->delivery_state_id : "") }}',
            state_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->delivery_state_id > 0 ))? $bill_of_lading->delivery_state->name : "") }}',
        },onSelect:function(e,o){$("#delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#delivery_city").val(e.name),$("#delivery_state_id").val(e.state_id),$("#delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_zip_code_id").val(0)}).blur(function(){var e=$("#delivery_zip_code_id").val();0==e&&($(this).val(""),$("#delivery_state_id").val(0),$("#origin_from_state_name").val(""))});


        $("#broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->broker_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->broker_id > 0 ))? $bill_of_lading->broker->code : "") }}',
        },onSelect:function(e,o){$("#broker_code").val(e.id),$(this).val(e.name), $("#broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#broker_name_img").removeClass("img-none").addClass("img-display"),$("#broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#broker_name_img").removeClass("img-display").addClass("img-none"),$("#broker_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#broker_id").val(0)}).blur(function(){var e=$("#broker_id").val();0==e&&($(this).val(""))});


        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->agent_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->agent_id > 0 ))? $bill_of_lading->agent->name : "") }}',
        },onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""))});


        $("#third_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->third_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->third_id > 0 ))? $bill_of_lading->third->name : "") }}',
        },onSelect:function(e,o){$("#third_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_name_img").removeClass("img-none").addClass("img-display"),$("#third_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_name_img").removeClass("img-display").addClass("img-none"),$("#third_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_id").val(0)}).blur(function(){var e=$("#third_id").val();0==e&&($(this).val(""))});


        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($bill_of_lading) ? $bill_of_lading->total_commodity_id : "") }}',
            value: '{{ ((isset($bill_of_lading) and ($bill_of_lading->total_commodity_id > 0 ))? $bill_of_lading->total_commodity->code : "") }}',
        },onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#total_commodity_id").val(0)}).blur(function(){var e=$("#total_commodity_id").val();0==e&&($(this).val(""))});

        $("#tmp_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#tmp_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_cargo_type_id").val(0)}).blur(function(){var e=$("#tmp_cargo_type_id").val();0==e&&($(this).val(""))});

        $("#tmp_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_commodity_id").val(0)}).blur(function(){var e=$("#tmp_commodity_id").val();0==e&&($(this).val(""))});


        $("#box_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#box_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#box_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#box_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_commodity_id").val(0)}).blur(function(){var e=$("#box_commodity_id").val();0==e&&($(this).val(""))});


        $("#box_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#box_scheduleb_id").val(e.code),$(this).val(e.code), $("#box_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#box_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#box_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_scheduleb_id").val(0)}).blur(function(){var e=$("#box_scheduleb_id").val();0==e&&($(this).val(""))});


        $("#box_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#box_hts_id").val(e.id),$(this).val(e.id), $("#box_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_hts_code_img").removeClass("img-none").addClass("img-display"),$("#box_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_hts_code_img").removeClass("img-display").addClass("img-none"),$("#box_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_hts_id").val(0)}).blur(function(){var e=$("#box_hts_id").val();0==e&&$(this).val("")});




        $("#box_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_export_code_img").removeClass("img-none").addClass("img-display"),$("#box_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_export_code_img").removeClass("img-display").addClass("img-none"),$("#box_export_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_export_id").val(0)}).blur(function(){var e=$("#box_export_id").val();0==e&&($(this).val(""))});



        $("#box_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#box_uns_id").val(e.id),$(this).val(e.code),$('#box_uns_description').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_uns_code_img").removeClass("img-none").addClass("img-display"),$("#box_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_uns_code_img").removeClass("img-display").addClass("img-none"),$("#box_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_uns_id").val(0)}).blur(function(){var e=$("#box_uns_id").val();0==e&&($(this).val(""))});


        $("#tmp_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_commodity_id").val(0)}).blur(function(){var e=$("#tmp_commodity_id").val();0==e&&($(this).val(""))});

    $("#tmp_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#tmp_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#tmp_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#tmp_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#tmp_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#tmp_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_carrier_id").val(0)}).blur(function(){var e=$("#tmp_carrier_id").val();0==e&&($(this).val(""))});

        $("#tmp_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_pickup_state_id").val(0)}).blur(function(){var e=$("#tmp_pickup_state_id").val();0==e&&$(this).val("")});

        $("#tmp_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_delivery_state_id").val(0)}).blur(function(){var e=$("#tmp_delivery_state_id").val();0==e&&$(this).val("")});

        $("#tmp_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_drop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_drop_state_id").val(0)}).blur(function(){var e=$("#tmp_drop_state_id").val();0==e&&$(this).val("")});


        $("#tmp_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#tmp_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#tmp_pickup_city").val(e.name),$("#tmp_pickup_state_id").val(e.state_id),$("#tmp_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#tmp_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#tmp_pickup_city").val(""),$("#tmp_pickup_state_id").val(0),$("#tmp_pickup_state_name").val(""))});


        $("#tmp_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#tmp_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#tmp_delivery_city").val(e.name),$("#tmp_delivery_state_id").val(e.state_id),$("#tmp_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#tmp_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#tmp_delivery_city").val(""),$("#tmp_delivery_state_id").val(0),$("#tmp_delivery_state_name").val(""))});


        $("#tmp_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#tmp_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#tmp_drop_city").val(e.name),$("#tmp_drop_state_id").val(e.state_id),$("#tmp_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_drop_zip_code_id").val(0)}).blur(function(){var e=$("#tmp_drop_zip_code_id").val();0==e&&($(this).val(""),$("#tmp_drop_city").val(""),$("#tmp_drop_state_id").val(0),$("#tmp_drop_state_name").val(""))});

    $("#tmp_pickup_type").change(function () {
        var url = $("#tmp_pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#tmp_pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#tmp_pickup_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#tmp_pickup_type").val() === '01' ?  e.name :  e.value;
                $("#tmp_pickup_id").val(e.id),
                        $(this).val(name),
                        $("#tmp_pickup_address").val(e.address),
                        $("#tmp_pickup_city").val(e.city),
                        $("#tmp_pickup_state_id").val(e.state_id),
                        $("#tmp_pickup_state_name").val(e.state_name),
                        $("#tmp_pickup_zip_code_id").val(e.zip_code_id),
                        $("#tmp_pickup_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#tmp_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#tmp_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_pickup_id").val(0)}).blur(function(){var e=$("#tmp_pickup_id").val();0==e&&($(this).val(""))});

    });

    $("#tmp_delivery_type").change(function () {
        var url = $("#tmp_delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#tmp_delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#tmp_delivery_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#tmp_delivery_type").val() === '01' ?  e.name :  e.value;
                $("#tmp_delivery_id").val(e.id),
                        $(this).val(name),
                        $("#tmp_delivery_address").val(e.address),
                        $("#tmp_delivery_city").val(e.city),
                        $("#tmp_delivery_state_id").val(e.state_id),
                        $("#tmp_delivery_state_name").val(e.state_name),
                        $("#tmp_delivery_zip_code_id").val(e.zip_code_id),
                        $("#tmp_delivery_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#tmp_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#tmp_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_delivery_id").val(0)}).blur(function(){var e=$("#tmp_delivery_id").val();0==e&&($(this).val(""))});
    });

    $("#tmp_drop_type").change(function () {
        var url = $("#tmp_drop_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#tmp_drop_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#tmp_drop_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#tmp_drop_type").val() === '01' ?  e.name :  e.value;
                $("#tmp_drop_id").val(e.id),
                        $(this).val(name),
                        $("#tmp_drop_address").val(e.address),
                        $("#tmp_drop_city").val(e.city),
                        $("#tmp_drop_state_id").val(e.state_id),
                        $("#tmp_drop_state_name").val(e.state_name),
                        $("#tmp_drop_zip_code_id").val(e.zip_code_id),
                        $("#tmp_drop_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#tmp_drop_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#tmp_drop_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_drop_id").val(0)}).blur(function(){var e=$("#tmp_drop_id").val();0==e&&($(this).val(""))});
    });



        $("#origin_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+ e.value},onSelect:function(e,o){$("#origin_billing_id").val(e.id),$(this).val(e.code), $("#origin_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_billing_code_img").removeClass("img-none").addClass("img-display"),$("#origin_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_billing_code_img").removeClass("img-display").addClass("img-none"),$("#origin_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_billing_id").val(0)}).blur(function(){var e=$("#origin_billing_id").val();0==e&&($(this).val(""),$("#origin_billing_description").val(""))});

        $("#origin_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_customer_name_img").removeClass("img-none").addClass("img-display"),$("#origin_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_customer_name_img").removeClass("img-display").addClass("img-none"),$("#origin_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_customer_id").val(0)}).blur(function(){var e=$("#origin_customer_id").val();0==e&&($(this).val(""))});

        $("#origin_cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#origin_cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#origin_cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_cost_unit_id").val(0)}).blur(function(){var e=$("#origin_cost_unit_id").val()});

        $("#origin_bill_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_bill_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_bill_unit_name_img").removeClass("img-none").addClass("img-display"),$("#origin_bill_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_bill_unit_name_img").removeClass("img-display").addClass("img-none"),$("#origin_bill_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_bill_unit_id").val(0)}).blur(function(){var e=$("#origin_bill_unit_id").val()});

        $("#origin_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#origin_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#origin_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#origin_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_vendor_id").val(0)}).blur(function(){var e=$("#origin_vendor_id").val();0==e&&($(this).val(""))});


        $("#destination_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#destination_billing_id").val(e.id),$(this).val(e.id), $("#destination_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_billing_code_img").removeClass("img-none").addClass("img-display"),$("#destination_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_billing_code_img").removeClass("img-display").addClass("img-none"),$("#destination_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_billing_id").val(0)}).blur(function(){var e=$("#destination_billing_id").val();0==e&&($(this).val(""))});

        $("#destination_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#destination_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_customer_name_img").removeClass("img-none").addClass("img-display"),$("#destination_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_customer_name_img").removeClass("img-display").addClass("img-none"),$("#destination_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_customer_id").val(0)}).blur(function(){var e=$("#destination_customer_id").val();0==e&&($(this).val(""))});

        $("#destination_cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#destination_cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#destination_cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#destination_cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_cost_unit_id").val(0)}).blur(function(){var e=$("#destination_cost_unit_id").val()});


        $("#destination_bill_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#destination_bill_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#destination_bill_unit_name_img").removeClass("img-none").addClass("img-display"),$("#destination_bill_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_bill_unit_name_img").removeClass("img-display").addClass("img-none"),$("#destination_bill_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_bill_unit_id").val(0)}).blur(function(){var e=$("#destination_bill_unit_id").val()});


        $("#destination_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#destination_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#destination_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#destination_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_vendor_id").val(0)}).blur(function(){var e=$("#destination_vendor_id").val();0==e&&($(this).val(""))});

        $("#destination_broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#destination_broker_code").val(e.id),$(this).val(e.name), $("#destination_broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_broker_name_img").removeClass("img-none").addClass("img-display"),$("#destination_broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_broker_name_img").removeClass("img-display").addClass("img-none"),$("#destination_broker_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_broker_id").val(0)}).blur(function(){var e=$("#destination_broker_id").val();0==e&&($(this).val(""))});



        $("#transportation_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transportation_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_service_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_service_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_service_id").val(0)}).blur(function(){var e=$("#transportation_service_id").val();0==e&&($(this).val(""))});


        $("#transportation_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#transportation_billing_id").val(e.id),$(this).val(e.id), $("#transportation_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#transportation_billing_code_img").removeClass("img-none").addClass("img-display"),$("#transportation_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_billing_code_img").removeClass("img-display").addClass("img-none"),$("#transportation_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_billing_id").val(0)}).blur(function(){var e=$("#transportation_billing_id").val();0==e&&($(this).val(""), $("#transportation_description").val(""))});

        $("#transportation_loading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_loading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_loading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_loading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_loading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_loading_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_loading_location_id").val(0)}).blur(function(){var e=$("#transportation_loading_location_id").val();0==e&&($(this).val(""))});

        $("#transportation_unloading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_unloading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_unloading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_unloading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_unloading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_unloading_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_unloading_location_id").val(0)}).blur(function(){var e=$("#transportation_unloading_location_id").val();0==e&&($(this).val(""))});

    $("#transportation_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#transportation_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#transportation_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#transportation_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#transportation_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#transportation_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_carrier_id").val(0)}).blur(function(){var e=$("#transportation_carrier_id").val();0==e&&($(this).val(""))});

    $("#origin_from_shipper_type").change(function () {
        var url = $("#origin_from_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#origin_from_shipper_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#origin_from_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#origin_from_type").val() === '01' ?  e.name :  e.value;
                $("#origin_from_shipper_id").val(e.id),
                        $(this).val(name),
                        $("#origin_from_address").val(e.address),
                        $("#origin_from_city").val(e.city),
                        $("#origin_from_state_id").val(e.state_id),
                        $("#origin_from_state_name").val(e.state_name),
                        $("#origin_from_zip_code_id").val(e.zip_code_id),
                        $("#origin_from_zip_code_code").val(e.zip_code_code)
                $("#origin_from_phone").val(e.phone)
                $("#origin_from_fax").val(e.fax)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#origin_from_shipper_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_shipper_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#origin_from_shipper_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_shipper_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_shipper_id").val(0)}).blur(function(){var e=$("#origin_from_shipper_id").val();0==e&&($(this).val(""))});
    });

        $("#tmp_equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#tmp_equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_equipment_type_id").val(0)}).blur(function(){var e=$("#tmp_equipment_type_id").val();0==e&&($(this).val(""))});



        $("#origin_from_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_state_id").val(0)}).blur(function(){var e=$("#origin_from_state_id").val();0==e&&$(this).val("")});


        $("#origin_from_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_from_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_country_id").val(0)}).blur(function(){var e=$("#origin_from_country_id").val();0==e&&($(this).val(""))});

        $("#origin_from_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_from_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_from_city").val(e.name),$("#origin_from_state_id").val(e.state_id),$("#origin_from_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_from_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_from_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_zip_code_id").val(0)}).blur(function(){var e=$("#origin_from_zip_code_id").val();0==e&&($(this).val(""),$("#origin_from_city").val(""),$("#origin_from_state_id").val(0),$("#origin_from_state_name").val(""))});


    $("#origin_to_type").change(function () {
        var url = $("#origin_to_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#origin_to_consignee_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#origin_to_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#origin_to_type").val() === '01' ?  e.name :  e.value;
                $("#origin_to_consignee_id").val(e.id),
                        $(this).val(name),
                        $("#origin_to_address").val(e.address),
                        $("#origin_to_city").val(e.city),
                        $("#origin_to_state_id").val(e.state_id),
                        $("#origin_to_state_name").val(e.state_name),
                        $("#origin_to_zip_code_id").val(e.zip_code_id),
                        $("#origin_to_zip_code_code").val(e.zip_code_code),
                        $("#origin_to_phone").val(e.phone),
                        $("#origin_to_fax").val(e.fax)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#origin_to_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_consignee_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#origin_to_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_consignee_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_consignee_id").val(0)}).blur(function(){var e=$("#origin_to_consignee_id").val();0==e&&($(this).val(""))});
    });


        $("#origin_to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_state_id").val(0)}).blur(function(){var e=$("#origin_to_state_id").val();0==e&&$(this).val("")});

        $("#origin_to_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_to_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_country_id").val(0)}).blur(function(){var e=$("#origin_to_country_id").val();0==e&&$(this).val("")});


        $("#origin_to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_to_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_to_city").val(e.name),$("#origin_to_state_id").val(e.state_id),$("#origin_to_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_zip_code_id").val(0)}).blur(function(){var e=$("#origin_to_zip_code_id").val();0==e&&($(this).val(""),$("#origin_to_city").val(""),$("#origin_to_state_id").val(0),$("#origin_to_state_name").val(""))});



    $("#routing_order_code").marcoPolo({url: "{{ route('ia_routing_order.autocomplete') }}",formatItem: function(e, o) {return  e.code},selected:{
        id : '{{ (isset($bill_of_lading) ? $bill_of_lading->routing_order_id : "") }}',
        code : '{{ ((isset($bill_of_lading) and ($bill_of_lading->routing_order_id > 0))? $bill_of_lading->routing_order->code : "") }}',
        incoterm_type: '{{ (isset($bill_of_lading)? $bill_of_lading->incoterm_type: "") }}',
        service_id: '{{ (isset($bill_of_lading)? $bill_of_lading->service_id : "") }}',
        service_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->service_id > 0))? $bill_of_lading->service->name : "") }}',
        carrier_id: '{{ (isset($bill_of_lading)? $bill_of_lading->carrier_id : "") }}',
        carrier_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->carrier_id > 0))? $bill_of_lading->carrier->name : "") }}',
        port_loading_id: '{{ (isset($bill_of_lading)? $bill_of_lading->port_loading_id : "") }}',
        port_unloading_id: '{{ (isset($bill_of_lading)? $bill_of_lading->port_unloading_id : "") }}',
        port_loading_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_loading_id > 0))? $bill_of_lading->port_loading_name->name : "") }}',
        port_unloading_code: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_unloading_id > 0))? $bill_of_lading->port_unloading_name->code : "") }}',
        port_unloading_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->port_unloading_id > 0))? $bill_of_lading->port_unloading_name->name : "") }}',
        place_receipt_id: '{{ (isset($bill_of_lading)? $bill_of_lading->place_receipt_id : "") }}',
        place_delivery_id: '{{ (isset($bill_of_lading)? $bill_of_lading->place_delivery_id : "") }}',
        place_receipt_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->place_receipt_id > 0))? $bill_of_lading->place_receipt_name->name : "") }}',
        place_delivery_name: '{{ ((isset($bill_of_lading) and ($bill_of_lading->place_delivery_id > 0))? $bill_of_lading->place_delivery_name->name : "") }}',
        shipper_id : '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_id : "" )  }}',
        shipper_name : '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_id >0))? $bill_of_lading->shipper->name : "" )  }}',
        shipper_address : '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_address : "" )  }}',
        shipper_phone : '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_phone : "" )  }}',
        shipper_fax : '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_fax : "" )  }}',
        shipper_state_id : '{{ (isset($bill_of_lading) ? $bill_of_lading->shipper_state_id : "" )  }}',
        shipper_state_name  : '{{ ((isset($bill_of_lading) and ($bill_of_lading->shipper_state_id > 0)) ? $bill_of_lading->shipper_state->name : "" )  }}',
        consignee_id : '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_id : "" )  }}',
        consignee_name : '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_id >0 )) ? $bill_of_lading->consignee->name  : "" )  }}',
        consignee_address : '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_address : "" )  }}',
        consignee_phone : '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_phone : "" )  }}',
        consignee_fax : '{{ (isset($bill_of_lading)? $bill_of_lading->consignee_fax : "") }}',
        consignee_state_id : '{{ (isset($bill_of_lading) ? $bill_of_lading->consignee_state_id : "" )  }}',
        consignee_state_name  : '{{ ((isset($bill_of_lading) and ($bill_of_lading->consignee_state_id > 0)) ? $bill_of_lading->consignee_state->name : "" )  }}'

    }
        ,onSelect: function(e, o) {
        $("#routing_order_id").val(e.id).change(), $("#routing_order_code").val(e.code).change(),
            $("#port_loading_id").val(e.port_loading_id),
                $("#port_unloading_id").val(e.port_unloading_id),
                $("#port_loading_name").val(e.port_loading_name),
                $("#port_unloading_name").val(e.port_unloading_name),
                $("#place_receipt_id").val(e.place_receipt_id),
                $("#place_delivery_id").val(e.place_delivery_id),
                $("#place_receipt_name").val(e.place_receipt_name),
                $("#place_delivery_name").val(e.place_delivery_name),
                $("#place_receipt").val(e.place_receipt_name),
                $("#place_delivery").val(e.place_delivery_name),
                $("#incoterm_type").val(e.incoterm_type).change(),
                $("#carrier_id").val(e.carrier_id).change(),
                $("#carrier_name").val(e.carrier_name), $("#first_carrier").val(e.carrier_name), $("#port_unloading_code").val(e.port_unloading_code), $("#shipper_id").val(e.shipper_id), $("#shipper_name").val(e.shipper_name), $("#shipper_phone").val(e.shipper_phone), $("#shipper_fax").val(e.shipper_fax), $("#shipper_address").val(e.shipper_address), $("#shipper_state_id").val(e.shipper_state_id), $("#shipper_state_name").val(e.shipper_state_name), $("#consignee_id").val(e.consignee_id), $("#consignee_name").val(e.consignee_name), $("#consignee_phone").val(e.consignee_phone), $("#consignee_fax").val(e.consignee_fax), $("#consignee_address").val(e.consignee_address), $("#consignee_state_id").val(e.consignee_state_id), $("#consignee_state_name").val(e.consignee_state_name), $("#port_loading").val(e.port_loading_name), $("#port_unloading").val(e.port_unloading_name)
    },minChars: 3,
        param: "term"
    }).on("marcopolorequestbefore", function() {
        $("#routing_order_code_img").removeClass("img-none").addClass("img-display"), $("#routing_order_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#routing_order_code_img").removeClass("img-display").addClass("img-none"), $("#routing_order_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_carrier_id").val(0)}).blur(function(){var e=$("#delivery_carrier_id").val();0==e&&($(this).val(""),  $("#port_loading_id").val(""), $("#port_unloading_id").val(""), $("#port_loading_name").val(""), $("#port_unloading_name").val(""),  $("#shipper_id").val(""), $("#shipper_name").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val(""), $("#shipper_address").val(""), $("#shipper_state_id").val(""), $("#shipper_state_name").val(""), $("#consignee_id").val(""), $("#consignee_name").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val(""), $("#consignee_address").val(""), $("#consignee_state_id").val(""), $("#consignee_state_name").val(""))});

</script>