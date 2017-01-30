<script type="text/javascript">

    $("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value}, selected:{
        id: '{{ (isset($shipment_entries) ? $shipment_entry->division_id : "") }}',
        value: '{{ ((isset($shipment_entries) and ($shipment_entry->division_id > 0)) ? $shipment_entry->division->name : "") }}',
    },onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#division_id").val(0)}).blur(function(){var e=$("#division_id").val(); 0 == e && ($(this).val(""))
    });


        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: '{{ (isset($shipment_entry)? $shipment_entry->shipper_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_id > 0))? $shipment_entry->shipper->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), '',(isset($shipment_entry) ? $shipment_entry->shipper_address : ""))) }}',
            city: '{{ (isset($shipment_entry)?  $shipment_entry->shipper_city : "") }}',
            phone: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_id > 0))? $shipment_entry->shipper->phone : "") }}',
            fax: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_id > 0))? $shipment_entry->shipper->fax : "") }}',
            state_id: '{{ (isset($shipment_entry)? $shipment_entry->shipper_state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_state_id > 0))? $shipment_entry->shipper_state->name : "") }}',
            zip_code_id: '{{ (isset($shipment_entry)? $shipment_entry->shipper_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_zip_code_id > 0))? $shipment_entry->shipper_zip_code->code: "") }}',
        },onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_id").val(0)}).blur(function(){var e=$("#shipper_id").val(); 0 == e && ($(this).val(""), $("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))});



        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_id > 0 )) ? $shipment_entry->consignee->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),'',(isset($shipment_entry) ? $shipment_entry->consignee_address : ""))) }}',
            city: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_city : "") }}',
            phone: '{{ (isset($shipment_entry)  ? $shipment_entry->consignee_phone : "") }}',
            fax: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_fax : "") }}',
            state_id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_state_id > 0 )) ? $shipment_entry->consignee_state->name : "") }}',
            zip_code_id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_zip_code_id > 0 )) ? $shipment_entry->consignee_zip_code->code: "") }}',
        },onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_id").val(0)}).blur(function(){var e=$("#shipper_id").val(); 0 == e && ($(this).val(""), $("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))});



        $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
            id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_id > 0))? $shipment_entry->notify->name : "") }}',
            address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),'',(isset($shipment_entry)? $shipment_entry->notify_address : ""))) }}',
            city: '{{ (isset($shipment_entry) ? $shipment_entry->notify_city : "") }}',
            phone: '{{ (isset($shipment_entry) ? $shipment_entry->notify_phone : "") }}',
            fax: '{{ (isset($shipment_entry)? $shipment_entry->notify_fax : "") }}',
            state_id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_state_id > 0))? $shipment_entry->notify_state->name : "") }}',
            zip_code_id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_zip_code_id : "") }}',
            zip_code_code: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_zip_code_id > 0))? $shipment_entry->notify_zip_code->code : "") }}',

        },onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_id").val(0)}).blur(function(){var e=$("#notify_id").val(); 0 == e && ($(this).val(""), $("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))
        });


        $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: ' {{ (isset($shipment_entry) ? $shipment_entry->place_receipt_id : "") }}',
            value: ' {{ ((isset($shipment_entry) and ($shipment_entry->place_receipt_id > 0)) ? $shipment_entry->place_receipt->name : "") }}',
        },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_receipt_id").val(0)}).blur(function(){var e=$("#place_receipt_id").val(); 0 == e && ($(this).val(""))
        });


        $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: '{{ (isset($shipment_entry) ? $shipment_entry->place_delivery_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->place_delivery_id > 0 )) ? $shipment_entry->place_delivery->name : "") }}',
        },onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_delivery_id").val(0)}).blur(function(){var e=$("#place_delivery_id").val(); 0 == e && ($(this).val(""))
        });


        $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name}, selected: {
            id: '{{ (isset($shipment_entry)  ? $shipment_entry->port_loading_id : "") }}',
            name: '{{ ((isset($shipment_entry) and  ($shipment_entry->port_loading_id  > 0)) ? $shipment_entry->port_loading->name : "") }}',
        },onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_loading_id").val(0)}).blur(function(){var e=$("#port_loading_id").val(); 0 == e && ($(this).val(""))
        });


        $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->port_unloading_id : "") }}',
            name: '{{ ((isset($shipment_entry) and ($shipment_entry->port_unloading_id > 0)) ? $shipment_entry->port_unloading->name : "") }}',

        },onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_unloading_id").val(0)}).blur(function(){var e=$("#port_unloading_id").val(); 0 == e && ($(this).val(""))
        });


        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: '{{ (isset($shipment_entry)? $shipment_entry->shipper_state_id : "") }}',
            valur: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_state_id))? $shipment_entry->shipper_state->name : "")}}',
        },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});


        $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
            id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_state_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_state_id > 0 )) ? $shipment_entry->notify_state->name : "") }}',
        },onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")});


        $("#state_of_origin_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->state_of_origin_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->state_of_origin_id > 0)) ? $shipment_entry->state_of_origin->name : "") }}',
        },onSelect:function(e,o){$("#state_of_origin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#state_of_origin_name_img").removeClass("img-none").addClass("img-display"),$("#state_of_origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#state_of_origin_name_img").removeClass("img-display").addClass("img-none"),$("#state_of_origin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#state_of_origin_id").val(0)}).blur(function(){var e=$("#state_of_origin_id").val();0==e&&$(this).val("")});


        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: ' {{ (isset($shipment_entry) ? $shipment_entry->consignee_state_id : "") }}',
            valur: ' {{ ((isset($shipment_entry) and ($shipment_entry->consignee_state_id > 0)) ? $shipment_entry->consignee_state->name : "") }}',
        },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});


        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_zip_code_id : "") }}',
            code: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_zip_code_id > 0)) ? $shipment_entry->shipper_zip_code->code : "") }}',
            name: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_id > 0)) ? $shipment_entry->shipper_city : "") }}',
            state_id: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_zip_code_id > 0)) ? $shipment_entry->shipper_zip_code->state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_zip_code_id > 0)) ? $shipment_entry->shipper_zip_code->state->name : "") }}'
        },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""))});


        $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_zip_code_id : "") }}',
            code: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_zip_code_id > 0)) ? $shipment_entry->notify_zip_code->code : "") }}',
            name: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_id > 0)) ? $shipment_entry->notify_city : "") }}',
            state_id: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_zip_code_id > 0)) ? $shipment_entry->notify_zip_code->state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->notify_zip_code_id > 0)) ? $shipment_entry->notify_zip_code->state->name : "") }}'
        },onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""))});


        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name}, selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_zip_code_id : "") }}',
            code: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_zip_code_id > 0)) ? $shipment_entry->consignee_zip_code->code : "") }}',
            name: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_id > 0)) ? $shipment_entry->consignee_city : "") }}',
            state_id: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_zip_code_id > 0)) ? $shipment_entry->consignee_zip_code->state_id : "") }}',
            state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_zip_code_id > 0)) ? $shipment_entry->consignee_zip_code->state->name : "") }}'
        },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""))});

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($shipment_entry) ? $shipment_entry->carrier_id : "") }}',
        name: '{{ ((isset($shipment_entry) and ($shipment_entry->carrier_id > 0 )) ? $shipment_entry->carrier->name : "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#carrier_id").val(0)}).blur(function(){var e=$("#carrier_id").val();0==e&&($(this).val(""))});

    $("#broker_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return  e.value}, selected:{
        id: '{{ (isset($shipment_entry) ? $shipment_entry->broker_id : "") }}',
        value: '{{ ((isset($shipment_entry) and ($shipment_entry->broker_id > 0 )) ? $shipment_entry->broker->name : "") }}',
    },onSelect: function(e, o) {$("#broker_id").val(e.id), $(this).val(e.value)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#broker_name_img").removeClass("img-none").addClass("img-display"), $("#broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#broker_name_img").removeClass("img-display").addClass("img-none"), $("#broker_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#broker_id").val(0)}).blur(function(){var e=$("#broker_id").val();0==e&&($(this).val(""))});


        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
            id: '{{ (isset($shipment_entry) ? $shipment_entry->agent_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->agent_id > 0 )) ? $shipment_entry->agent->name : "") }}',
        },onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""))});


        $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
            id: '{{ (isset($shipment_entry) ? $shipment_entry->forwarding_agent_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->forwarding_agent_id > 0 )) ? $shipment_entry->forwarding_agent->name : "") }}',
            phone: '{{ ((isset($shipment_entry) and ($shipment_entry->forwarding_agent_id > 0 )) ? $shipment_entry->forwarding_agent->phone: "") }}',
            fax: '{{ ((isset($shipment_entry) and ($shipment_entry->forwarding_agent_id > 0 )) ? $shipment_entry->forwarding_agent->fax : "") }}',
        },onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value),$("#forwarding_agent_phone").val(e.phone),$("#forwarding_agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#forwarding_agent_id").val(0)}).blur(function(){var e=$("#forwarding_agent_id").val();0==e&&($(this).val(""))});


        $("#service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->service_id : "") }}',
            name: '{{ ((isset($shipment_entry) and ($shipment_entry->service_id > 0 )) ? $shipment_entry->service->name : "") }}',
        },onSelect:function(e,o){$("#service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#service_name_img").removeClass("img-none").addClass("img-display"),$("#service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#service_name_img").removeClass("img-display").addClass("img-none"),$("#service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#service_id").val(0)}).blur(function(){var e=$("#service_id").val();0==e&&($(this).val(""))});


        $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->notify_country_id : "") }}',
            value : '{{ ((isset($shipment_entry) and ($shipment_entry->notify_country_id > 0)) ? $shipment_entry->notify_country->name : "") }}',
        },onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_country_id").val(0)}).blur(function(){var e=$("#notify_country_id").val();0==e&&($(this).val(""))});


        $("#total_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->total_cargo_type_id : "") }}',
            code: '{{ ((isset($shipment_entry) and ($shipment_entry->total_cargo_type_id > 0 )) ? $shipment_entry->total_cargo_type_id : "") }}',
        },onSelect:function(e,o){$("#total_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#total_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#total_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#total_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#total_cargo_type_id").val(0)}).blur(function(){var e=$("#total_cargo_type_id").val();0==e&&($(this).val(""))});


        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
            id: '{{ (isset($shipment_entry) ? $shipment_entry->total_commodity_id : "") }}',
            value: '{{ ((isset($shipment_entry) and ($shipment_entry->total_commodity_id > 0)) ? $shipment_entry->total_commodity->name : "") }}',
        },onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#total_commodity_id").val(0)}).blur(function(){var e=$("#total_commodity_id").val();0==e&&($(this).val(""))});


        $("#quote_code").marcoPolo({url:"{{ route('quotes.autocomplete') }}",formatItem:function(e,o){return e.code},
            selected:{
                id: '{{ (isset($shipment_entry) ? $shipment_entry->quote_id : "") }}',
                code: '{{ ((isset($shipment_entry) and ($shipment_entry->quote_id > 0)) ? $shipment_entry->quotes->code : "") }}',
                shipper_id: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_id : "") }}',
                shipper_name: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_id > 0 )) ? $shipment_entry->shipper->name : "") }}',
                shipper_address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($shipment_entry) ? $shipment_entry->shipper_address : ""))) }}',
                shipper_phone: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_phone : "") }}',
                shipper_city: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_city : "") }}',
                shipper_state_id: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_state_id : "") }}',
                shipper_state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_state_id > 0 )) ? $shipment_entry->shipper_state->name : "") }}',
                shipper_zip_code_id: '{{ (isset($shipment_entry) ? $shipment_entry->shipper_zip_code_icode : "") }}',
                shipper_zip_code: '{{ ((isset($shipment_entry) and ($shipment_entry->shipper_zip_code_icode > 0 )) ? $shipment_entry->shipper_zip_code->code : "") }}',
                consignee_id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_id : "") }}',
                consignee_name: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_id > 0 )) ? $shipment_entry->consignee->name : "") }}',
                consignee_address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'),' ',(isset($shipment_entry) ? $shipment_entry->consignee_address : ""))) }}',
                consignee_phone: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_phone : "") }}',
                consignee_city: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_city : "") }}',
                consignee_state_id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_state_id : "") }}',
                consignee_state_name: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_state_id > 0 )) ? $shipment_entry->consignee_state->name : "") }}',
                consignee_zip_code_id: '{{ (isset($shipment_entry) ? $shipment_entry->consignee_zip_code_icode : "") }}',
                consignee_zip_code: '{{ ((isset($shipment_entry) and ($shipment_entry->consignee_zip_code_icode > 0 )) ? $shipment_entry->consignee_zip_code->code : "") }}',

                agent_id: '{{ (isset($shipment_entry) ? $shipment_entry->agent_id : "") }}',
                agent_name: '{{ ((isset($shipment_entry) and ($shipment_entry->agent_id > 0 )) ? $shipment_entry->agent->name : "") }}',
                agent_phone: '{{ (isset($shipment_entry) ? $shipment_entry->agent_phone: "") }}',
                carrier_id: '{{ (isset($shipment_entry) ? $shipment_entry->carrier_id : "") }}',
                carrier_name: '{{ ((isset($shipment_entry) and ($shipment_entry->carrier_id > 0 )) ? $shipment_entry->carrier->name : "") }}',
                service_id: '{{ (isset($shipment_entry) ? $shipment_entry->service_id : "") }}',
                service_name: '{{ ((isset($shipment_entry) and ($shipment_entry->service_id > 0 )) ? $shipment_entry->service->name : "") }}',

                port_loading_id: '{{ (isset($shipment_entry) ? $shipment_entry->port_loading_id : "") }}',
                port_loading_name: '{{ ((isset($shipment_entry) and ($shipment_entry->port_loading_id > 0 )) ? $shipment_entry->port_loading->name : "") }}',

                port_unloading_id: '{{ (isset($shipment_entry) ? $shipment_entry->port_unloading_id : "") }}',
                port_unloading_name: '{{ ((isset($shipment_entry) and ($shipment_entry->port_unloading_id > 0 )) ? $shipment_entry->port_unloading->name : "") }}',

                place_receipt_id: '{{ (isset($shipment_entry) ? $shipment_entry->place_receipt_id : "") }}',
                place_receipt_name: '{{ ((isset($shipment_entry) and ($shipment_entry->place_receipt_id > 0 )) ? $shipment_entry->place_receipt->name : "") }}',
                place_delivery_id: '{{ (isset($shipment_entry) ? $shipment_entry->place_delivery_id : "") }}',
                place_delivery_name: '{{ ((isset($shipment_entry) and ($shipment_entry->place_delivery_id > 0 )) ? $shipment_entry->place_delivery->name : "") }}',

            },onSelect:function(e,o){
                    $("#quote_id").val(e.id),
                    $(this).val(e.code).change(),
                    $("#shipper_id").val(e.shipper_id),
                    $("#shipper_name").val(e.shipper_name),
                    $("#shipper_address").val(e.shipper_address),
                    $("#shipper_phone").val(e.shipper_phone),
                    $("#shipper_city").val(e.shipper_city),
                    $("#shipper_state_id").val(e.shipper_state_id),
                    $("#shipper_state_name").val(e.shipper_state_name),
                    $("#shipper_zip_code_id").val(e.shipper_zip_code_id),
                    $("#shipper_zip_code_code").val(e.shipper_zip_code),

                    $("#consignee_id").val(e.consignee_id),
                    $("#consignee_name").val(e.consignee_name),
                    $("#consignee_address").val(e.consignee_address),
                    $("#consignee_phone").val(e.consignee_phone),
                    $("#consignee_city").val(e.consignee_city),
                    $("#consignee_state_id").val(e.consignee_state_id),
                    $("#consignee_state_name").val(e.consignee_state_name),
                    $("#consignee_zip_code_id").val(e.consignee_zip_code_id),
                    $("#consignee_zip_code_code").val(e.consignee_zip_code),

                    $("#agent_id").val(e.agent_id),
                    $("#agent_name").val(e.agent_name),
                    $("#agent_phone").val(e.agent_phone),

                    $("#port_loading_id").val(e.port_loading_id),
                    $("#port_loading_name").val(e.port_loading_name),
                    $("#port_unloading_name").val(e.port_unloading_name),
                    $("#port_unloading_id").val(e.port_unloading_id),

                    $("#place_receipt_id").val(e.place_receipt_id),
                    $("#place_delivery_id").val(e.place_delivery_id),
                    $("#place_receipt_name").val(e.place_receipt_name),
                    $("#place_delivery_name").val(e.place_delivery_name)
                    $("#carrier_id").val(e.carrier_id),
                    $("#carrier_name").val(e.carrier_name)
                    $("#service_id").val(e.service_id),
                    $("#service_name").val(e.service_name)
        },minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#quote_code_img").removeClass("img-none").addClass("img-display"),$("#quote_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#quote_code_img").removeClass("img-display").addClass("img-none"),$("#quote_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#quote_id").val(0))});


        $("#container_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_state_id").val(0)}).blur(function(){var e=$("#container_pickup_state_id").val();0==e&&$(this).val("")});


        $("#container_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_state_id").val(0)}).blur(function(){var e=$("#container_delivery_state_id").val();0==e&&$(this).val("")});


        $("#container_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_drop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_state_id").val(0)}).blur(function(){var e=$("#container_drop_state_id").val();0==e&&$(this).val("")});


        $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_city").val(e.name),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))});


        $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#container_delivery_city").val(e.name),$("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))});


        $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_city").val(e.name),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))});

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
            param:"term",

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
            param:"term",

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
            param:"term",

        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_id").val(0)}).blur(function(){var e=$("#container_drop_id").val();0==e&&($(this).val(""))});
    });

    $("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_carrier_id").val(0)}).blur(function(){var e=$("#container_carrier_id").val();0==e&&($(this).val(""))});


        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code}, selected:{
            id:'{{ (isset($shipment_entry)? $shipment_entry->equipment_type_id : "") }}',
            code :'{{ ((isset($shipment_entry) and ($shipment_entry->equipment_type_id > 0))? $shipment_entry->equipment_type->code : "") }}',
        },onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#equipment_type_id").val(0)}).blur(function(){var e=$("#equipment_type_id").val();0==e&&($(this).val(""))});


        $("#container_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#container_commodity_id").val(e.id),$(this).val(e.name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#container_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#container_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_commodity_id").val(0)}).blur(function(){var e=$("#container_commodity_id").val();0==e&&($(this).val(""))});


        $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#hazardous_uns_id").val(0)}).blur(function(){var e=$("#hazardous_uns_id").val();0==e&&($(this).val(""))});
</script>