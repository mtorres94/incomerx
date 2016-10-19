<script type="text/javascript">
    $("#division_name").focus(function () {$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
    });

    $("#shipper_name").focus(function () {
        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))})
    });

    $("#notify_name").focus(function () {
        $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))})
    });


    $("#consignee_name").focus(function () {
        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))})
    });

    $("#supplier_name").focus(function () {
        $("#supplier_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_id").val(e.id),$(this).val(e.value),$("#supplier_address").val(e.address),$("#supplier_city").val(e.city),$("#supplier_state_id").val(e.state_id),$("#supplier_state_name").val(e.state_name),$("#supplier_zip_code_id").val(e.zip_code_id),$("#supplier_zip_code_code").val(e.zip_code_code),$("#supplier_phone").val(e.phone),$("#supplier_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#supplier_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#supplier_id").val(0),$("#supplier_address").val(""),$("#supplier_city").val(""),$("#supplier_state_id").val(""),$("#supplier_state_name").val(""),$("#supplier_zip_code_id").val(""),$("#supplier_zip_code_code").val(""),$("#supplier_phone").val(""),$("#supplier_fax").val(""))})
    });

    $("#place_receipt_name").focus(function () {
        $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_receipt_id").val(0)})
    });

    $("#place_delivery_name").focus(function () {
        $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_delivery_id").val(0)})
    });

    $("#carrier_name").focus(function() {$("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term",
        required: !0
    }).on("marcopolorequestbefore", function() {
        $("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#carrier_id").val(0)})
    });

    $("#container_carrier_name").focus(function() {$("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term",
        required: !0
    }).on("marcopolorequestbefore", function() {
        $("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#container_carrier_id").val(0)})
    });

    $("#inland_carrier_name").focus(function() {$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name)},
        minChars: 3,
        param: "term",
        required: !0
    }).on("marcopolorequestbefore", function() {
        $("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_carrier_id").val(0)})
    });

    $("#inland_driver_name").focus(function () {
        $("#inland_driver_name").marcoPolo({url:"{{ route('drivers.autocomplete') }}",formatItem:function(e,i){return e.name},onSelect:function(e,i){$("#inland_driver_id").val(e.id),$(this).val(e.name),$("#inland_driver_license").val(e.license)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#inland_driver_name_img").removeClass("img-none").addClass("img-display"),$("#inland_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#inland_driver_name_img").removeClass("img-display").addClass("img-none"),$("#inland_driver_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#inland_driver_id").val(0),$("#inland_driver_license").val(""))})
    });

    $("#port_loading_name").focus(function () {
        $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_loading_id").val(0))})
    });


    $("#transhipment_port_name").focus(function () {
        $("#transhipment_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transhipment_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transhipment_port_name_img").removeClass("img-none").addClass("img-display"),$("#transhipment_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transhipment_port_name_img").removeClass("img-display").addClass("img-none"),$("#transhipment_port_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transhipment_port_id").val(0))})
    });

    $("#port_unloading_name").focus(function () {
        $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_unloading_id").val(0))})
    });

    $("#agent_name").focus(function () {
        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#agent_id").val(0))})
    });

    $("#container_pickup_state_name").focus(function () {
        $("#container_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_state_id").val(0)}).blur(function(){var e=$("#container_pickup_state_id").val();0==e&&$(this).val("")})
    });

    $("#container_delivery_state_name").focus(function () {
        $("#container_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_state_id").val(0)}).blur(function(){var e=$("#container_delivery_state_id").val();0==e&&$(this).val("")})
    });

    $("#container_drop_state_name").focus(function () {
        $("#container_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_drop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_state_id").val(0)}).blur(function(){var e=$("#container_drop_state_id").val();0==e&&$(this).val("")})
    });

    $("#shipper_state_name").focus(function () {
        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")})
    });

    $("#notify_state_name").focus(function () {
        $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")})
    });

    $("#consignee_state_name").focus(function () {
        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")})
    });

    $("#supplier_state_name").focus(function () {
        $("#supplier_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#supplier_state_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_state_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#supplier_state_id").val(0)}).blur(function(){var e=$("#supplier_state_id").val();0==e&&$(this).val("")})
    });

    $("#shipper_country_name").focus(function () {
        $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#shipper_country_id").val(0)})
    });

    $("#notify_country_name").focus(function () {
        $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#notify_country_id").val(0)})
    });

    $("#consignee_country_name").focus(function () {
        $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#consignee_country_id").val(0)})
    });
    $("#supplier_country_name").focus(function () {
        $("#supplier_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#supplier_country_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_country_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_from_country_id").val(0)})
    });

    $("#shipper_zip_code_code").focus(function () {
        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))})
    });

    $("#notify_zip_code_code").focus(function () {
        $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_city").val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))})
    });

    $("#consignee_zip_code_code").focus(function () {
        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#origin_from_state_name").val(""))})
    });

    $("#supplier_zip_code_code").focus(function () {
        $("#supplier_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#supplier_zip_code_id").val(e.id),$(this).val(e.code),$("#supplier_city").val(e.name),$("#supplier_state_id").val(e.state_id),$("#supplier_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#supplier_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#supplier_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#supplier_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#supplier_zip_code_id").val(0)}).blur(function(){var e=$("#supplier_zip_code_id").val();0==e&&($(this).val(""),$("#supplier_city").val(""),$("#supplier_state_id").val(0),$("#supplier_state_name").val(""))})
    });

    $("#container_pickup_zip_code_code").focus(function () {
        $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_city").val(e.name),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_city").val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))})
    });

    $("#container_delivery_zip_code_code").focus(function () {
        $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#container_delivery_city").val(e.name),$("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_city").val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))})
    });

    $("#container_drop_zip_code_code").focus(function () {
        $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_city").val(e.name),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_city").val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))})
    });

    $("#service_name").focus(function () {
        $("#service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#service_name_img").removeClass("img-none").addClass("img-display"),$("#service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#service_name_img").removeClass("img-display").addClass("img-none"),$("#service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#service_id").val(0))})
    });

    $("#forwarding_agent_name").focus(function () {
        $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#forwarding_agent_id").val(0))})
    });

    $("#box_cargo_type_code").focus(function () {
        $("#box_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#box_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#box_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#box_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_cargo_type_id").val(0))})
    });

    $("#cargo_type_code").focus(function () {
        $("#cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_type_id").val(0))})
    });

    $("#total_cargo_type_code").focus(function () {
        $("#total_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#total_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#total_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#total_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#total_cargo_type_id").val(0))})
    });

    $("#equipment_type_code").focus(function () {
        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#equipment_type_id").val(0))})
    });

    $("#cargo_commodity_name").focus(function () {
        $("#cargo_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_commodity_id").val(0),$("#cargo_commodity_id").val(0),$("#cargo_commodity_name").val(""))})
    });

    $("#box_commodity_name").focus(function () {
        $("#box_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#box_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#box_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#box_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_commodity_id").val(0),$("#box_commodity_id").val(0),$("#box_commodity_name").val(""))})
    });

    $("#total_commodity_name").focus(function () {
        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#total_commodity_id").val(0),$("#total_commodity_id").val(0),$("#total_commodity_name").val(""))})
    });

    $("#container_commodity_name").focus(function () {
        $("#container_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#container_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#container_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#container_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#container_commodity_id").val(0),$("#container_commodity_id").val(0),$("#container_commodity_name").val(""))})
    });

    $("#container_pickup_name").focus(function () {
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
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_pickup_id").val(0)})
    });

    $("#container_delivery_name").focus(function () {
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
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_delivery_id").val(0)})
    });

    $("#container_drop_name").focus(function () {
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
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_drop_id").val(0)})
    });

    $("#billing_billing_code").focus(function () {
        $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.id), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_billing_id").val(0),$("#billing_billing_description").val(""),$("#billing_billing_code").val(""))})
    });


    $("#billing_customer_name").focus(function () {
        $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_customer_id").val(0))})
    });

    $("#billing_vendor_name").focus(function () {
        $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_vendor_code").val(0))})
    });

    $("#cost_unit_name").focus(function () {
        $("#cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cost_unit_id").val(0)}).blur(function(){var e=$("#cost_unit_id").val()})
    });
    $("#billing_unit_name").focus(function () {
        $("#billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_unit_id").val(0)}).blur(function(){var e=$("#billing_unit_id").val()})
    });

    $("#box_scheduleb_code").focus(function () {
        $("#box_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#box_scheduleb_id").val(e.code),$(this).val(e.code), $("#box_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#box_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#box_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_scheduleb_id").val(0))})
    });

    $("#box_hts_code").focus(function () {
        $("#box_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#box_hts_id").val(e.id),$(this).val(e.id), $("#box_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_hts_code_img").removeClass("img-none").addClass("img-display"),$("#box_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_hts_code_img").removeClass("img-display").addClass("img-none"),$("#box_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_hts_id").val(0)}).blur(function(){var e=$("#box_hts_id").val();0==e&&$(this).val("")})
    });

    $("#box_license_type_code").focus(function () {
        $("#box_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#box_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#box_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_license_type_id").val(0))})
    });

    $("#box_export_code").focus(function () {
        $("#box_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_export_code_img").removeClass("img-none").addClass("img-display"),$("#box_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_export_code_img").removeClass("img-display").addClass("img-none"),$("#box_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_export_id").val(0))})
    });

    $("#box_uns_code").focus(function () {
        $("#box_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#box_uns_id").val(e.id),$(this).val(e.code),$('#box_uns_description').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_uns_code_img").removeClass("img-none").addClass("img-display"),$("#box_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_uns_code_img").removeClass("img-display").addClass("img-none"),$("#box_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_uns_id").val(0),$("#box_uns_description").val(""))})
    });

    $("#vehicle_scheduleb_code").focus(function () {
        $("#vehicle_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#vehicle_scheduleb_id").val(e.code),$(this).val(e.code), $("#vehicle_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_scheduleb_id").val(0))})
    });

    $("#vehicle_hts_code").focus(function () {
        $("#vehicle_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#vehicle_hts_id").val(e.id),$(this).val(e.id), $("#vehicle_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_hts_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_hts_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_hts_id").val(0)}).blur(function(){var e=$("#vehicle_hts_id").val();0==e&&$(this).val("")})
    });

    $("#vehicle_license_type_code").focus(function () {
        $("#vehicle_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_license_type_id").val(0))})
    });

    $("#vehicle_export_code").focus(function () {
        $("#vehicle_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_export_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_export_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_export_id").val(0))})
    });

    $("#vehicle_state_province_name").focus(function () {
        $("#vehicle_state_province_name").marcoPolo({
            url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_state_province_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_state_province_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_state_province_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_state_province_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_state_province_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_state_province_id").val(0)}).blur(function(){var e=$("#vehicle_state_province_id").val();0==e&&$(this).val("")})
    });

    $("#vehicle_cargo_type_code").focus(function () {
        $("#vehicle_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#vehicle_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_cargo_type_id").val(0))})
    });

    $("#hazardous_uns_code").focus(function () {
        $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#hazardous_uns_id").val(0),$("#hazardous_uns_desc").val(""))})
    });


    $("#pick_search_for_name").focus(function () {
        var  type= $("#pick_search_type").val();  $("#pick_search_for_name").marcoPolo({url:"{{ route('receipts_entries.autocomplete') }}",formatItem:function(e,o){return e.value +'|'+ e.date_in +'|'+ e.division_name + '|' + e.shipper_name + '|' + e.consignee_name + '|'+ e.third_party_name + '|' + e.agent_name},
            onSelect:function(e,o)
            {var r=$("#pick_cargo_details tbody tr").length + 1,  n = $("#pick_cargo_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + r + " data-toggle = collapse data-target= ."+ r +">");
                $("#pick_search_for_id").val(e.id),
                        $(this).val(e.value),
                        p.append(createTableContent('pick_details_line', r, true, r))
                                .append('<td class="details-control sorting_1"></td>')
                                .append(createTableContent('pick_wr_number', e.value , false,r ))
                                .append(createTableContent('pick_date_in', e.date_in , false, r))
                                .append(createTableContent('pick_shipper_name', e.shipper_name , false, r))
                                .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
                                .append(createTableContent('pick_destination_name', '' , false, r))
                                .append(createTableContent('pick_qty','' , false, r))
                                .append(createTableContent('pick_weight', '' , false, r))
                                .append(createTableContent('pick_cubic', '', false, r))
                                .append(createTableContent('pick_unit', '' , false, r))
                                .append(createTableContent('pick_service', '' , false, r))
                t.append(p);
                p = $("<tr >");
                p.append('<td> </td>')
                p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
                p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r + '</div></td>')
                p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
                t.append(p);

            },minChars:3, data: {
                "type_for": type,
            },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#pick_search_for_id").val(0)})
    });

    $("#shipment_code").focus(function () {
        $("#shipment_code").marcoPolo({url:"{{ route('shipment_entries.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){
                    $("#shipment_id").val(e.id),
                    $(this).val(e.code),
                    $("#shipment_type").val(e.type).change(),
                    $("#bl_status").val(e.bl_status).change(),
                    $("#vessel_name").val(e.vessel),
                    $("#voyage_name").val(e.voyage),
                    $("#carrier_id").val(e.carrier_id),
                    $("#carrier_name").val(e.carrier_name),
                    $("#departure_date").val(e.departure),
                    $("#arrival_date").val(e.arrival),

                    $("#port_loading_id").val(e.loading_port_id),
                    $("#port_loading_name").val(e.loading_port_name),
                    $("#port_unloading_id").val(e.unloading_port_id),
                    $("#port_unloading_name").val(e.unloading_port_name),
                    $("#place_receipt_id").val(e.location_origin_id),
                    $("#place_receipt_name").val(e.location_origin_name),
                    $("#place_delivery_id").val(e.location_destination_id),
                    $("#place_delivery_name").val(e.location_destination_name),

                    $("#place_receipt").val(e.location_origin_name),
                    $("#place_delivery").val(e.location_destination_name),
                    $("#port_loading").val(e.loading_port_name),
                    $("#foreign_port").val(e.unloading_port_name),


                    $("#shipper_id").val(e.shipper_id),
                    $("#shipper_name").val(e.shipper_name),
                    $("#shipper_address").val(e.shipper_address),
                    $("#shipper_city").val(e.shipper_city),
                    $("#shipper_phone").val(e.shipper_phone),
                    $("#shipper_state_id").val(e.shipper_state_id),
                    $("#shipper_state_name").val(e.shipper_state_name),
                    $("#shipper_zip_code_id").val(e.shipper_zip_code_id),
                    $("#shipper_zip_code_code").val(e.shipper_zip_code_code),

                    $("#consignee_id").val(e.consignee_id),
                    $("#consignee_name").val(e.consignee_name),
                    $("#consignee_address").val(e.consignee_address),
                    $("#consignee_city").val(e.consignee_city),
                    $("#consignee_phone").val(e.consignee_phone),
                    $("#consignee_state_id").val(e.consignee_state_id),
                    $("#consignee_state_name").val(e.consignee_state_name),
                    $("#consignee_zip_code_id").val(e.consignee_zip_code_id),
                    $("#consignee_zip_code_code").val(e.consignee_zip_code_code),

                    $("#agent_name").val(e.agent_name),
                    $("#agent_id").val(e.agent_id),
                    $("#agent_phone").val(e.agent_phone),
                    $("#agent_fax").val(e.agent_fax),
                    $("#agent_contact").val(e.agent_contact),
                    $("#agent_commission").val(e.agent_commission),
                    $("#spotting_amount").val(e.agent_amount)
        },
            minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipment_code_img").removeClass("img-none").addClass("img-display"),$("#shipment_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipment_code_img").removeClass("img-display").addClass("img-none"),$("#shipment_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipment_id").val(0),$("#shipment_code").val(""))})
    });
</script>