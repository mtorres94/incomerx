<script type="text/javascript">

    $("#pick_search_for_name").focus(function () {
        var  type= $("#pick_search_type").val();  $("#pick_search_for_name").marcoPolo({url:"{{ route('receipts_entries.autocomplete') }}",formatItem:function(e,o){return e.value +'|'+ e.date_in +'|'+ e.division_name + '|' + e.shipper_name + '|' + e.consignee_name + '|'+ e.third_party_name + '|' + e.agent_name},
            onSelect:function(e,o)
            {var r=$("#load_warehouse_details tbody tr").length + 1,  n = $("#load_warehouse_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + r + " data-toggle = collapse data-target= ."+ r +">");
                $("#pick_search_for_id").val(e.id),
                        $(this).val(e.value),
                        p.append(createTableContent('pick_details_line', r, true, r))
                                .append(createTableContent('pick_wr_id', e.id, true, r))
                                .append("<td><input type='checkbox' name='pick_select[]' id='pick_select' value='" + e.id + "'></td>")
                                .append(createTableContent('pick_wr_number', e.value , false,r ))
                                .append(createTableContent('pick_date_in', e.date_in , false, r))
                                .append(createTableContent('pick_shipper_id', e.shipper_id, true, r))
                                .append(createTableContent('pick_shipper_name', e.shipper_name , false, r))
                                .append(createTableContent('pick_shipper_address', e.shipper_address, true, r))
                                .append(createTableContent('pick_shipper_city', e.shipper_city, true, r))
                                .append(createTableContent('pick_shipper_state_id', e.shipper_state_id, true, r))
                                .append(createTableContent('pick_shipper_state_name', e.shipper_state_name , true, r))
                                .append(createTableContent('pick_shipper_zip_code_id', e.shipper_zip_code_id, true, r))
                                .append(createTableContent('pick_shipper_zip_code_code', e.shipper_zip_code_code, true, r))
                                .append(createTableContent('pick_shipper_phone', e.shipper_phone, true, r))
                                .append(createTableContent('pick_shipper_fax', e.shipper_fax, true, r))

                                .append(createTableContent('pick_consignee_id', e.consignee_id, true, r))
                                .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
                                .append(createTableContent('pick_consignee_address', e.consignee_address, true, r))
                                .append(createTableContent('pick_consignee_city', e.consignee_city, true, r))
                                .append(createTableContent('pick_consignee_state_id', e.consignee_state_id, true, r))
                                .append(createTableContent('pick_consignee_state_name', e.consignee_state_name , true, r))
                                .append(createTableContent('pick_consignee_zip_code_id', e.consignee_zip_code_id, true, r))
                                .append(createTableContent('pick_consignee_zip_code_code', e.consignee_zip_code_code, true, r))
                                .append(createTableContent('pick_consignee_phone', e.consignee_phone, true, r))
                                .append(createTableContent('pick_consignee_fax', e.consignee_fax, true, r))

                                .append(createTableContent('pick_destination_name', e.destination_name , true, r))
                                .append(createTableContent('pick_quantity',e.quantity , false, r))
                                .append(createTableContent('pick_weight', e.sum_weight , false, r))
                                .append(createTableContent('pick_cubic', e.sum_cubic, false, r))
                                .append(createTableContent('pick_unit', '' , false, r))
                                .append(createTableContent('pick_status', e.status, true, r))
                                .append(createTableContent('pick_service_name', e.service_name , true, r))
                                .append(createTableContent('pick_service_id', e.service_id , true, r))
                                .append(createTableContent('pick_volume_weight', e.volume_weight, true, r))
                                .append(createTableContent('pick_warehouse_id', e.warehouse_id, true, r))
                                .append(createTableContent('pick_warehouse_name', e.warehouse_name, true, r))
                t.append(p);
            },minChars:3, data: {
                "type_for": type,
            },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&& $("#pick_search_for_id").val(0), $("#pick_search_for_name").val("")})
    });

    $("#place_receipt_name").focus(function () {
        $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value),$("#place_receipt").val(e.value), $("#transportation_loading_location_name").val(e.value), $("#transportation_loading_location_id").val(e.id)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_receipt_id").val(0)})
    });

    $("#place_delivery_name").focus(function () {
        $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value),$("#place_delivery").val(e.value), $("#transportation_unloading_location_name").val(e.value), $("#transportation_unloading_location_id").val(e.id)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_delivery_id").val(0)})
    });

    $("#port_loading_name").focus(function () {
        $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name),$("#port_loading").val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_loading_id").val(0))})
    });

    $("#port_unloading_name").focus(function () {
        $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name),$("#foreign_port").val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_unloading_id").val(0))})
    });

    $("#shipper_state_name").focus(function () {
        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")})
    });

    $("#consignee_state_name").focus(function () {
        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")})
    });

    $("#shipper_zip_code_code").focus(function () {
        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))})
    });

    $("#consignee_zip_code_code").focus(function () {
        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))})
    });

    $("#shipper_name").focus(function () {
        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))})
    });

    $("#consignee_name").focus(function () {
        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))})
    });

    $("#carrier_name").focus(function() {$("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#carrier_id").val(0)})
    });

    $("#division_name").focus(function () {$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
    });

    $("#inland_carrier_name").focus(function() {$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name),$("#add_inland_carrier_id").val(e.id), $("#add_inland_carrier_name").val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_carrier_id").val(0)})
    });

    $("#add_inland_carrier_name").focus(function() {$("#add_inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},onSelect: function(e, o) {$("#add_inland_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#add_inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#add_inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#add_inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#add_inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#add_inland_carrier_id").val(0)})
    });


    $("#inland_driver_name").focus(function() {$("#inland_driver_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#inland_driver_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_driver_name_img").removeClass("img-none").addClass("img-display"), $("#inland_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_driver_name_img").removeClass("img-display").addClass("img-none"), $("#inland_driver_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_driver_id").val(0)})
    });

    $("#total_cargo_type_code").focus(function () {
        $("#total_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#total_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#total_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#total_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#total_cargo_type_id").val(0))})
    });

    $("#total_commodity_name").focus(function () {
        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#total_commodity_id").val(0),$("#total_commodity_id").val(0),$("#cargo_commodity_name").val(""))})
    });

    $("#forwarding_agent_name").focus(function () {
        $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#forwarding_agent_id").val(0))})
    });

    $("#service_name").focus(function () {
        $("#service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#service_name_img").removeClass("img-none").addClass("img-display"),$("#service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#service_name_img").removeClass("img-display").addClass("img-none"),$("#service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#service_id").val(0))})
    });

    $("#supplier_name").focus(function () {
        $("#supplier_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_id").val(e.id),$(this).val(e.value),$("#supplier_address").val(e.address),$("#supplier_city").val(e.city),$("#supplier_state_id").val(e.state_id),$("#supplier_state_name").val(e.state_name),$("#supplier_zip_code_id").val(e.zip_code_id),$("#supplier_zip_code_code").val(e.zip_code_code),$("#supplier_phone").val(e.phone),$("#supplier_fax").val(e.fax), $("#supplier_country_id").val(e.country_id), $("#supplier_country_name").val(e.country_name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#supplier_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#supplier_id").val(0),$("#supplier_address").val(""),$("#supplier_city").val(""),$("#supplier_state_id").val(""),$("#supplier_state_name").val(""),$("#supplier_zip_code_id").val(""),$("#supplier_zip_code_code").val(""),$("#supplier_phone").val(""),$("#supplier_fax").val(""))})
    });

    $("#supplier_state_name").focus(function () {
        $("#supplier_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_state_id").val(e.id),$(this).val(e.value), $("supplier_country_id").val(e.country_id), $("#supplier_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#supplier_state_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_state_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#supplier_state_id").val(0)}).blur(function(){var e=$("#supplier_state_id").val();0==e&&$(this).val("")})
    });

    $("#supplier_country_name").focus(function () {
        $("#supplier_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#supplier_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#supplier_country_name_img").removeClass("img-none").addClass("img-display"),$("#supplier_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_country_name_img").removeClass("img-display").addClass("img-none"),$("#supplier_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_from_country_id").val(0)})
    });

    $("#supplier_zip_code_code").focus(function () {
        $("#supplier_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#supplier_zip_code_id").val(e.id),$(this).val(e.code),$("#supplier_city").val(e.name),$("#supplier_state_id").val(e.state_id),$("#supplier_state_name").val(e.state_name),$("#supplier_country_id").val(e.country_id), $("#supplier_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#supplier_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#supplier_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#supplier_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#supplier_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#supplier_zip_code_id").val(0)}).blur(function(){var e=$("#supplier_zip_code_id").val();0==e&&($(this).val(""),$("#supplier_city").val(""),$("#supplier_state_id").val(0),$("#supplier_state_name").val(""))})
    });

    $("#transhipment_port_name").focus(function () {
        $("#transhipment_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transhipment_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transhipment_port_name_img").removeClass("img-none").addClass("img-display"),$("#transhipment_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transhipment_port_name_img").removeClass("img-display").addClass("img-none"),$("#transhipment_port_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transhipment_port_id").val(0))})
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

    $("#agent_name").focus(function () {
        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_address").val(e.address),$("#agent_city").val(e.city),$("#agent_state_id").val(e.state_id),$("#agent_state_name").val(e.state_name),$("#agent_zip_code_id").val(e.zip_code_id),$("#agent_zip_code_code").val(e.zip_code_code),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#agent_id").val(0),$("#agent_address").val(""),$("#agent_city").val(""),$("#agent_state_id").val(""),$("#agent_state_name").val(""),$("#agent_zip_code_id").val(""),$("#agent_zip_code_code").val(""),$("#agent_phone").val(""),$("#agent_fax").val(""))})
    });

    $("#agent_state_name").focus(function () {
        $("#agent_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_state_id").val(e.id),$(this).val(e.value), $("#agent_state_country_id").val(e.country_id), $("#agent_state_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_state_name_img").removeClass("img-none").addClass("img-display"),$("#agent_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_state_name_img").removeClass("img-display").addClass("img-none"),$("#agent_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_state_id").val(0)}).blur(function(){var e=$("#agent_state_id").val();0==e&&$(this).val("")})
    });



    $("#agent_country_name").focus(function () {
        $("#agent_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_country_name_img").removeClass("img-none").addClass("img-display"),$("#agent_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_country_name_img").removeClass("img-display").addClass("img-none"),$("#agent_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#agent_country_id").val(0)})
    });

    $("#agent_zip_code_code").focus(function () {
        $("#agent_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#agent_zip_code_id").val(e.id),$(this).val(e.code),$("#agent_city").val(e.name),$("#agent_state_id").val(e.state_id),$("#agent_state_name").val(e.state_name), $("#agent_country_id").val(e.country_id), $("#agent_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#agent_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#agent_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_zip_code_id").val(0)}).blur(function(){var e=$("#agent_zip_code_id").val();0==e&&($(this).val(""),$("#agent_city").val(""),$("#agent_state_id").val(0),$("#agent_state_name").val(""))})
    });

    $("#notify_name").focus(function () {
        $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))})
    });

    $("#notify_country_name").focus(function () {
        $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#notify_country_id").val(0)})
    });

    $("#notify_state_name").focus(function () {
        $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value), $("#notify_country_id").val(e.country_id), $("#notify_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")})
    });

    $("#notify_zip_code_code").focus(function () {
        $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name), $("#notify_country_id").val(e.country_id), $("#notify_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_city").val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))})
    });

    $("#inland_carrier_name").focus(function() {$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_carrier_id").val(0)})
    });

    $("#third_country_name").focus(function () {
        $("#third_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_country_name_img").removeClass("img-none").addClass("img-display"),$("#third_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_country_name_img").removeClass("img-display").addClass("img-none"),$("#third_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#third_country_id").val(0)})
    });

    $("#third_state_name").focus(function () {
        $("#third_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#third_state_name_img").removeClass("img-none").addClass("img-display"),$("#third_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_state_name_img").removeClass("img-display").addClass("img-none"),$("#third_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_state_id").val(0)}).blur(function(){var e=$("#third_state_id").val();0==e&&$(this).val("")})
    });

    $("#third_zip_code_code").focus(function () {
        $("#third_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#third_zip_code_id").val(e.id),$(this).val(e.code),$("#third_city").val(e.name),$("#third_state_id").val(e.state_id),$("#third_state_name").val(e.state_name), $("#third_country_id").val(e.country_id), $("#third_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#third_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#third_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#third_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_zip_code_id").val(0)}).blur(function(){var e=$("#third_zip_code_id").val();0==e&&($(this).val(""),$("#third_city").val(""),$("#third_state_id").val(0),$("#third_state_name").val(""))})
    });

    $("#third_name").focus(function () {
        $("#third_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_id").val(e.id),$(this).val(e.value),$("#third_address").val(e.address),$("#third_city").val(e.city),$("#third_state_id").val(e.state_id),$("#third_state_name").val(e.state_name),$("#third_zip_code_id").val(e.zip_code_id),$("#third_zip_code_code").val(e.zip_code_code),$("#third_phone").val(e.phone),$("#third_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_name_img").removeClass("img-none").addClass("img-display"),$("#third_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_name_img").removeClass("img-display").addClass("img-none"),$("#third_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#third_id").val(0),$("#third_address").val(""),$("#third_city").val(""),$("#third_state_id").val(""),$("#third_state_name").val(""),$("#third_zip_code_id").val(""),$("#third_zip_code_code").val(""),$("#third_phone").val(""),$("#third_fax").val(""))})
    });

    $("#broker_name").focus(function () {
        $("#broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#broker_code").val(e.id),$(this).val(e.name), $("#broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#broker_name_img").removeClass("img-none").addClass("img-display"),$("#broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#broker_name_img").removeClass("img-display").addClass("img-none"),$("#broker_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#broker_code").val(0))})
    });

    $("#destination_broker_name").focus(function () {
        $("#destination_broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#destination_broker_code").val(e.id),$(this).val(e.name), $("#destination_broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_broker_name_img").removeClass("img-none").addClass("img-display"),$("#destination_broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_broker_name_img").removeClass("img-display").addClass("img-none"),$("#destination_broker_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#destination_broker_code").val(0))})
    });

    $("#container_carrier_name").focus(function() {$("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#container_carrier_id").val(0)})
    });


    $("#equipment_type_code").focus(function () {
        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#equipment_type_id").val(0))})
    });

    $("#container_commodity_name").focus(function () {
        $("#container_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#container_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#container_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#container_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#container_commodity_id").val(0),$("#container_commodity_id").val(0),$("#container_commodity_name").val(""))})
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

    $("#container_pickup_zip_code_code").focus(function () {
        $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_city").val(e.name),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_city").val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))})
    });

    $("#container_delivery_zip_code_code").focus(function () {
        $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#container_delivery_city").val(e.name),$("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_city").val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))})
    });

    $("#container_drop_zip_code_code").focus(function () {
        $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_city").val(e.name),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_city").val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))})
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

    $("#warehouse_shipper_country_name").focus(function () {
        $("#warehouse_shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_shipper_country_id").val(0)})
    });

    $("#warehouse_consignee_country_name").focus(function () {
        $("#warehouse_consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_consignee_country_id").val(0)})
    });

    $("#warehouse_shipper_name").focus(function () {
        $("#warehouse_shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_id").val(e.id),$(this).val(e.value),$("#warehouse_shipper_address").val(e.address),$("#warehouse_shipper_city").val(e.city),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name),$("#warehouse_shipper_zip_code_id").val(e.zip_code_id),$("#warehouse_shipper_zip_code_code").val(e.zip_code_code),$("#warehouse_shipper_phone").val(e.phone),$("#warehouse_shipper_fax").val(e.fax), $("#warehouse_shipper_country_id").val(e.country_id),  $("#warehouse_shipper_country_name").val(e.country_name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#warehouse_shipper_id").val(0),$("#warehouse_shipper_address").val(""),$("#warehouse_shipper_city").val(""),$("#warehouse_shipper_state_id").val(""),$("#warehouse_shipper_state_name").val(""),$("#warehouse_shipper_zip_code_id").val(""),$("#warehouse_shipper_zip_code_code").val(""),$("#warehouse_shipper_phone").val(""),$("#warehouse_shipper_fax").val(""))})
    });

    $("#warehouse_consignee_name").focus(function () {
        $("#warehouse_consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_id").val(e.id),$(this).val(e.value),$("#warehouse_consignee_address").val(e.address),$("#warehouse_consignee_city").val(e.city),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name),$("#warehouse_consignee_zip_code_id").val(e.zip_code_id),$("#warehouse_consignee_zip_code_code").val(e.zip_code_code),$("#warehouse_consignee_phone").val(e.phone),$("#warehouse_consignee_fax").val(e.fax),$("#warehouse_consignee_country_id").val(e.country_id),  $("#warehouse_consignee_country_name").val(e.country_name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#warehouse_consignee_id").val(0),$("#warehouse_consignee_address").val(""),$("#warehouse_consignee_city").val(""),$("#warehouse_consignee_state_id").val(""),$("#warehouse_consignee_state_name").val(""),$("#warehouse_consignee_zip_code_id").val(""),$("#warehouse_consignee_zip_code_code").val(""),$("#warehouse_consignee_phone").val(""),$("#warehouse_consignee_fax").val(""))})
    });


    $("#warehouse_shipper_state_name").focus(function () {
        $("#warehouse_shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_state_id").val(e.id),$(this).val(e.value), $("#warehouse_shipper_country_id").val(e.country_id),$("#warehouse_shipper_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_state_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_state_id").val();0==e&&$(this).val("")})
    });

    $("#warehouse_consignee_state_name").focus(function () {
        $("#warehouse_consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_state_id").val(e.id),$(this).val(e.value),$("#warehouse_consignee_country_id").val(e.country_id),$("#warehouse_consignee_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_state_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_state_id").val();0==e&&$(this).val("")})
    });

    $("#warehouse_shipper_zip_code_code").focus(function () {
        $("#warehouse_shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_shipper_city").val(e.name),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name), $("#warehouse_shipper_country_id").val(e.country_id), $("#warehouse_shipper_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_shipper_city").val(""),$("#warehouse_shipper_state_id").val(0),$("#warehouse_shipper_state_name").val(""), $("#warehouse_shipper_country_id").val(0),$("#warehouse_shipper_country_name").val(""))})
    });

    $("#warehouse_consignee_zip_code_code").focus(function () {
        $("#warehouse_consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_consignee_city").val(e.name),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name), $("#warehouse_consignee_country_id").val(e.country_id), $("#warehouse_consignee_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_consignee_city").val(""),$("#warehouse_consignee_state_id").val(0),$("#warehouse_consignee_state_name").val(""))})
    });

    $("#cargo_location_name").focus(function () {
        $("#cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_id").val(0),$("#cargo_location_bin_id").val(0),$("#cargo_location_bin_name").val(""))})
    });

    $("#cargo_location_bin_name").focus(function () {
        $("#cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_bin_id").val(0))})
    });

    $("#transportation_service_name").focus(function () {
        $("#transportation_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transportation_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_service_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_service_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_service_id").val(0))})
    });

    $("#transportation_billing_code").focus(function () {
        $("#transportation_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#transportation_billing_id").val(e.id),$(this).val(e.id), $("#transportation_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#transportation_billing_code_img").removeClass("img-none").addClass("img-display"),$("#transportation_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_billing_code_img").removeClass("img-display").addClass("img-none"),$("#transportation_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_billing_id").val(0),$("#transportation_description").val(""),$("#transportation_billing_code").val(""))})
    });

    $("#transportation_loading_location_name").focus(function () {
        $("#transportation_loading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_loading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_loading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_loading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_loading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_loading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_loading_location_id").val(0)})
    });

    $("#transportation_unloading_location_name").focus(function () {
        $("#transportation_unloading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_unloading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_unloading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_unloading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_unloading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_unloading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_unloading_location_id").val(0)})
    });

    $("#transportation_carrier_name").focus(function() {$("#transportation_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},onSelect: function(e, o) {$("#transportation_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#transportation_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#transportation_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#transportation_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#transportation_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#transportation_carrier_id").val(0)})
    });

    $("#origin_from_shipper_name").focus(function () {
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
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#origin_from_shipper_id").val(0)})
    });

    $("#origin_from_state_name").focus(function () {
        $("#origin_from_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_state_id").val(e.id),$(this).val(e.value), $("#origin_from_country_id").val(e.country_id), $("#origin_from_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_state_id").val(0)}).blur(function(){var e=$("#origin_from_state_id").val();0==e&&$(this).val("")})
    });

    $("#origin_from_country_name").focus(function () {
        $("#origin_from_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_from_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_from_country_id").val(0)})
    });

    $("#origin_from_zip_code_code").focus(function () {
        $("#origin_from_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_from_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_from_city").val(e.name),$("#origin_from_state_id").val(e.state_id),$("#origin_from_state_name").val(e.state_name), $("#origin_from_country_id").val(e.country_id), $("#origin_from_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_from_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_from_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_zip_code_id").val(0)}).blur(function(){var e=$("#origin_from_zip_code_id").val();0==e&&($(this).val(""),$("#origin_from_city").val(""),$("#origin_from_state_id").val(0),$("#origin_from_state_name").val(""))})
    });


    $("#origin_to_consignee_name").focus(function () {
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
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#origin_to_consignee_id").val(0)})
    });

    $("#origin_to_state_name").focus(function () {
        $("#origin_to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_state_id").val(e.id),$(this).val(e.value), $("#origin_to_country_id").val(e.country_id), $("#origin_to_country_name").val(e.country_name)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_state_id").val(0)}).blur(function(){var e=$("#origin_to_state_id").val();0==e&&$(this).val("")})
    });

    $("#origin_to_country_name").focus(function () {
        $("#origin_to_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_to_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_to_country_id").val(0)})
    });

    $("#origin_to_zip_code_code").focus(function () {
        $("#origin_to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_to_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_to_city").val(e.name),$("#origin_to_state_id").val(e.state_id),$("#origin_to_state_name").val(e.state_name),  $("#origin_to_country_id").val(e.country_id), $("#origin_to_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_zip_code_id").val(0)}).blur(function(){var e=$("#origin_to_zip_code_id").val();0==e&&($(this).val(""),$("#origin_to_city").val(""),$("#origin_to_state_id").val(0),$("#origin_to_state_name").val(""))})
    });

    $("#item_name").focus(function () {
        $("#item_name").marcoPolo({url:"{{ route('items.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#item_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_name_img").removeClass("img-none").addClass("img-display"),$("#item_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_name_img").removeClass("img-display").addClass("img-none"),$("#item_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#item_id").val(0),$("#item_name").val(""))})
    });

    $("#item_type_name").focus(function () {
        $("#item_type_name").marcoPolo({
            url: "{{ route('cargo_types.autocomplete') }}", formatItem: function (e, o) {
                return e.code
            }, onSelect: function (e, o) {
                $("#item_type_code").val(e.id), $(this).val(e.code)
            }, minChars: 3, param: "term", required: !0
        }).on("marcopolorequestbefore", function () {
            $("#item_type_name_img").removeClass("img-none").addClass("img-display"), $("#item_type_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function () {
            $("#item_type_name_img").removeClass("img-display").addClass("img-none"), $("#item_type_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur", function () {
            "" == $(this).val().trim() && ($("#item_type_code").val(0))
        })
    });

    $("#customer_name").focus(function () {
        $("#customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#customer_name_img").removeClass("img-none").addClass("img-display"),$("#customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_name_img").removeClass("img-display").addClass("img-none"),$("#customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#customer_id").val(0))})
    });

    $("#hazardous_uns_code").focus(function () {
        $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#hazardous_uns_id").val(0),$("#hazardous_uns_desc").val(""))})
    });


    $("#coloader_name").focus(function () {
        $("#coloader_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#coloader_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#coloader_name_img").removeClass("img-none").addClass("img-display"),$("#coloader_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#coloader_name_img").removeClass("img-display").addClass("img-none"),$("#coloader_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#coloader_id").val(0))})
    });

    $("#origin_country_name").focus(function () {
        $("#origin_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_country_id").val(0)})
    });

    $("#warehouse_code").focus(function () {
        $("#warehouse_code").marcoPolo({url:"{{ route('warehouses.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#warehouse_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_id").val(0)})
    });

    $("#quote_code").focus(function () {
        $("#quote_code").marcoPolo({url:"{{ route('quotes.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){
            $("#quote_id").val(e.id),
                    $(this).val(e.code),
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

                    $("#carrier_id").val(e.carrier_id),
                    $("#carrier_name").val(e.carrier_name),

                    $("#port_loading_id").val(e.port_loading_id),
                    $("#port_loading_name").val(e.port_loading_name),
                    $("#port_unloading_name").val(e.port_unloading_name),
                    $("#port_unloading_id").val(e.port_unloading_id),

                    $("#place_receipt_id").val(e.place_receipt_id),
                    $("#place_delivery_id").val(e.place_delivery_id),
                    $("#place_receipt_name").val(e.place_receipt_name),
                    $("#place_delivery_name").val(e.place_delivery_name)
        },minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#quote_code_img").removeClass("img-none").addClass("img-display"),$("#quote_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#quote_code_img").removeClass("img-display").addClass("img-none"),$("#quote_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#quote_id").val(0))})
    });
</script>