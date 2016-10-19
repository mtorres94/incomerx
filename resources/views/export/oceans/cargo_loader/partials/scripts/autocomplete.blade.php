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
        .append(createTableContent('pick_shipper_city', e.shipper_city, true, r))
        .append(createTableContent('pick_shipper_state_id', e.shipper_state_id, true, r))
        .append(createTableContent('pick_shipper_state_name', e.shipper_state_name , true, r))
        .append(createTableContent('pick_shipper_zip_code_id', e.shipper_zip_code_id, true, r))
        .append(createTableContent('pick_shipper_zip_code_code', e.shipper_zip_code_code, true, r))
        .append(createTableContent('pick_shipper_phone', e.shipper_phone, true, r))
        .append(createTableContent('pick_shipper_fax', e.shipper_fax, true, r))

        .append(createTableContent('pick_consignee_id', e.consignee_id, true, r))
        .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
        .append(createTableContent('pick_consignee_city', e.consignee_city, true, r))
        .append(createTableContent('pick_consignee_state_id', e.consignee_state_id, true, r))
        .append(createTableContent('pick_consignee_state_name', e.consignee_state_name , true, r))
        .append(createTableContent('pick_consignee_zip_code_id', e.consignee_zip_code_id, true, r))
        .append(createTableContent('pick_consignee_zip_code_code', e.consignee_zip_code_code, true, r))
        .append(createTableContent('pick_consignee_phone', e.consignee_phone, true, r))
        .append(createTableContent('pick_consignee_fax', e.consignee_fax, true, r))

        .append(createTableContent('pick_destination_name', e.destination_name , false, r))
        .append(createTableContent('pick_quantity',e.quantity , false, r))
        .append(createTableContent('pick_weight', e.sum_weight , false, r))
        .append(createTableContent('pick_cubic', e.sum_cubic, false, r))
        .append(createTableContent('pick_unit', '' , false, r))
        .append(createTableContent('pick_status', e.status, true, r))
        .append(createTableContent('pick_service_name', e.service_name , false, r))
        .append(createTableContent('pick_service_id', e.service_id , true, r))
        t.append(p);

        p = $("<tr >");
            p.append('<td> </td>')
            p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
            p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r + '</div></td>')
            p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
            t.append(p);
    warehouse_details();

    },minChars:3, data: {
    "type_for": type,
    },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&& $("#pick_search_for_id").val(0), $("#pick_search_for_name").val("")})
    });

$("#hazardous_uns_code").focus(function () {
    $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#hazardous_uns_id").val(0),$("#hazardous_uns_desc").val(""))})
});

$("#equipment_type_code").focus(function () {
    $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#equipment_type_id").val(0))})
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

$("#shipper_name").focus(function () {
    $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))})
});

$("#consignee_name").focus(function () {
    $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))})
});

$("#notify_name").focus(function () {
    $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))})
});

$("#shipper_state_name").focus(function () {
    $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")})
});

$("#consignee_state_name").focus(function () {
    $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")})
});

$("#notify_state_name").focus(function () {
    $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")})
});

$("#shipper_zip_code_code").focus(function () {
    $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))})
});

$("#consignee_zip_code_code").focus(function () {
    $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))})
});

$("#notify_zip_code_code").focus(function () {
    $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_city").val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))})
});

$("#carrier_name").focus(function() {$("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#carrier_id").val(0)})
});

$("#inland_carrier_name").focus(function() {$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_carrier_id").val(0)})
});


$("#inland_driver_name").focus(function() {$("#inland_driver_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#inland_driver_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_driver_name_img").removeClass("img-none").addClass("img-display"), $("#inland_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_driver_name_img").removeClass("img-display").addClass("img-none"), $("#inland_driver_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_driver_id").val(0)})
});

$("#agent_name").focus(function () {
    $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#agent_id").val(0))})
});

$("#forwarding_agent_name").focus(function () {
    $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value),$("#forwarding_agent_phone").val(e.phone),$("#forwarding_agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#forwarding_agent_id").val(0))})
});

$("#place_receipt_name").focus(function () {
    $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value), $("#place_receipt").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_receipt_id").val(0)})
});

$("#place_delivery_name").focus(function () {
    $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value), $("#place_delivery").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#place_delivery_id").val(0)})
});

$("#port_loading_name").focus(function () {
    $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name), $("#port_loading").val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_loading_id").val(0))})
});

$("#port_unloading_name").focus(function () {
    $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name), $("#foreign_port").val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#port_unloading_id").val(0))})
});

$("#division_name").focus(function () {$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
});

$("#shipper_country_name").focus(function () {
    $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#shipper_country_id").val(0)})
});

$("#consignee_country_name").focus(function () {
    $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#consignee_country_id").val(0)})
});

$("#notify_country_name").focus(function () {
    $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#notify_country_id").val(0)})
});

$("#cargo_location_name").focus(function () {
    $("#cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_id").val(0),$("#cargo_location_bin_id").val(0),$("#cargo_location_bin_name").val(""))})
});

$("#cargo_location_bin_name").focus(function () {
    $("#cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_bin_id").val(0))})
});

$("#warehouse_shipper_country_name").focus(function () {
    $("#warehouse_shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_shipper_country_id").val(0)})
});

$("#warehouse_consignee_country_name").focus(function () {
    $("#warehouse_consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_consignee_country_id").val(0)})
});

$("#warehouse_notify_country_name").focus(function () {
    $("#warehouse_notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_notify_country_id").val(0)})
});


$("#warehouse_shipper_name").focus(function () {
    $("#warehouse_shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_id").val(e.id),$(this).val(e.value),$("#warehouse_shipper_address").val(e.address),$("#warehouse_shipper_city").val(e.city),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name),$("#warehouse_shipper_zip_code_id").val(e.zip_code_id),$("#warehouse_shipper_zip_code_code").val(e.zip_code_code),$("#warehouse_shipper_phone").val(e.phone),$("#warehouse_shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#warehouse_shipper_id").val(0),$("#warehouse_shipper_address").val(""),$("#warehouse_shipper_city").val(""),$("#warehouse_shipper_state_id").val(""),$("#warehouse_shipper_state_name").val(""),$("#warehouse_shipper_zip_code_id").val(""),$("#warehouse_shipper_zip_code_code").val(""),$("#warehouse_shipper_phone").val(""),$("#warehouse_shipper_fax").val(""))})
});

$("#warehouse_consignee_name").focus(function () {
    $("#warehouse_consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_id").val(e.id),$(this).val(e.value),$("#warehouse_consignee_address").val(e.address),$("#warehouse_consignee_city").val(e.city),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name),$("#warehouse_consignee_zip_code_id").val(e.zip_code_id),$("#warehouse_consignee_zip_code_code").val(e.zip_code_code),$("#warehouse_consignee_phone").val(e.phone),$("#warehouse_consignee_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#warehouse_consignee_id").val(0),$("#warehouse_consignee_address").val(""),$("#warehouse_consignee_city").val(""),$("#warehouse_consignee_state_id").val(""),$("#warehouse_consignee_state_name").val(""),$("#warehouse_consignee_zip_code_id").val(""),$("#warehouse_consignee_zip_code_code").val(""),$("#warehouse_consignee_phone").val(""),$("#warehouse_consignee_fax").val(""))})
});

$("#warehouse_notify_name").focus(function () {
    $("#warenouse_notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_id").val(e.id),$(this).val(e.value),$("#warehouse_notify_address").val(e.address),$("#warehouse_notify_city").val(e.city),$("#warehouse_notify_state_id").val(e.state_id),$("#warehouse_notify_state_name").val(e.state_name),$("#warehouse_notify_zip_code_id").val(e.zip_code_id),$("#warehouse_notify_zip_code_code").val(e.zip_code_code),$("#warehouse_notify_phone").val(e.phone),$("#warehouse_notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_notify_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#warehouse_notify_id").val(0),$("#warehouse_notify_address").val(""),$("#warehouse_notify_city").val(""),$("#warehouse_notify_state_id").val(""),$("#warehouse_notify_state_name").val(""),$("#warehouse_notify_zip_code_id").val(""),$("#warehouse_notify_zip_code_code").val(""),$("#warehouse_notify_phone").val(""),$("#warehouse_notify_fax").val(""))})
});

$("#warehouse_shipper_state_name").focus(function () {
    $("#warehouse_shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_state_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_state_id").val();0==e&&$(this).val("")})
});

$("#warehouse_consignee_state_name").focus(function () {
    $("#warehouse_consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_state_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_state_id").val();0==e&&$(this).val("")})
});

$("#warehouse_notify_state_name").focus(function () {
    $("#warehouse_notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_notify_state_id").val(0)}).blur(function(){var e=$("#warehouse_notify_state_id").val();0==e&&$(this).val("")})
});

$("#warehouse_shipper_zip_code_code").focus(function () {
    $("#warehouse_shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_shipper_city").val(e.name),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_shipper_city").val(""),$("#warehouse_shipper_state_id").val(0),$("#warehouse_shipper_state_name").val(""))})
});

$("#warehouse_consignee_zip_code_code").focus(function () {
    $("#warehouse_consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_consignee_city").val(e.name),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_consignee_city").val(""),$("#warehouse_consignee_state_id").val(0),$("#warehouse_consignee_state_name").val(""))})
});

$("#warehouse_notify_zip_code_code").focus(function () {
    $("#warehouse_notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_notify_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_notify_city").val(e.name),$("#warehouse_notify_state_id").val(e.state_id),$("#warehouse_notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_notify_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_notify_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_notify_city").val(""),$("#warehouse_notify_state_id").val(0),$("#warehouse_notify_state_name").val(""))})
});

</script>