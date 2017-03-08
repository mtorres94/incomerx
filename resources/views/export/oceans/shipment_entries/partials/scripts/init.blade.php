<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('eo_shipment_entries.close') }}');

        if ($("#open_status").val() == "1" || $("#status").val() == 'C') {
            disableFields('data');
        }
        $('#printer').change(function () {
            var _type = $('.select-header .dropdown-menu .selected').data('original-index');
            var _id = $('.btn-print[data-id]').data('id');
            var _token = '{{ str_random(120) }}';

            var url = $('.btn-print[data-id]').data('route');
            $('.btn-print[data-id]').attr('href', url + '?_token=' + _token + '&_type=' + _type + '&_id=' + _id);
        });


        removeEmptyNodes('container_details');
        removeEmptyNodes('hzd_details');
        removeEmptyNodes('hbl_details');
        removeEmptyNodes('shipment_booking');


        for (var t2 = $("#container_tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        $("#shipment_type").val("C").change();
        $("#rate_class").val("1").change();
        $("#total_weight_unit").val("L").change();
        $("#status").val("{{ (isset($shipment_entry) ? $shipment_entry->status : "O") }}").change();

        $("#equipment_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#equipment_type_code").val(e[0].code);

                }
            });
        });

        $("#quote_id").change(function () {

            var id = $("#quote_id").val(), x = 0;
            $.ajax({
                url: "{{ route('quotes.autocomplete') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    $("#shipper_id").val(e[0].shipper_id);
                        $("#shipper_name").val(e[0].shipper_name);
                        $("#shipper_address").val(e[0].shipper_address);
                        $("#shipper_phone").val(e[0].shipper_phone);
                        $("#shipper_city").val(e[0].shipper_city);
                        $("#shipper_state_id").val(e[0].shipper_state_id);
                        $("#shipper_state_name").val(e[0].shipper_state_name);
                        $("#shipper_zip_code_id").val(e[0].shipper_zip_code_id);
                        $("#shipper_zip_code_code").val(e[0].shipper_zip_code);

                        $("#consignee_id").val(e[0].consignee_id);
                        $("#consignee_name").val(e[0].consignee_name);
                        $("#consignee_address").val(e[0].consignee_address);
                        $("#consignee_phone").val(e[0].consignee_phone);
                        $("#consignee_city").val(e[0].consignee_city);
                        $("#consignee_state_id").val(e[0].consignee_state_id);
                        $("#consignee_state_name").val(e[0].consignee_state_name);
                        $("#consignee_zip_code_id").val(e[0].consignee_zip_code_id);
                        $("#consignee_zip_code_code").val(e[0].consignee_zip_code);

                        $("#agent_id").val(e[0].agent_id);
                        $("#agent_name").val(e[0].agent_name);
                        $("#agent_phone").val(e[0].agent_phone);

                        $("#port_loading_id").val(e[0].port_loading_id);
                        $("#port_loading_name").val(e[0].port_loading_name);
                        $("#port_unloading_name").val(e[0].port_unloading_name);
                        $("#port_unloading_id").val(e[0].port_unloading_id);

                        $("#place_receipt_id").val(e[0].place_receipt_id);
                        $("#place_delivery_id").val(e[0].place_delivery_id);
                        $("#place_receipt_name").val(e[0].place_receipt_name);
                        $("#place_delivery_name").val(e[0].place_delivery_name);
                        $("#carrier_id").val(e[0].carrier_id);
                        $("#carrier_name").val(e[0].carrier_name);
                        $("#service_id").val(e[0].service_id);
                        $("#service_name").val(e[0].service_name);

                        $("#total_quantity").val(e[0].total_quantity);
                        $("#total_cargo_type_id").val(e[0].total_cargo_type_id).change();
                        $("#total_cargo_type_code").val(e[0].total_cargo_type_code);
                        $("#total_commodity_name").val(e[0].total_commodity);
                        $("#total_unit_weight").val(e[0].total_unit_weight).change();
                        $("#total_weight").val(e[0].total_weight);
                        $("#total_cubic").val(e[0].total_cubic);
                        $("#freight_charges").val(e[0].freight_charges);
                        $("#other_charges").val(e[0].other_charges);
                }
            });
        });
                        //=============================================
                      /*  x = 0;
                        clearTableCondition("container_details");
                        while (e[x].id != "") {
                            var r= $("#container_details tbody tr").length ,
                                n = $("#container_details"),
                                t = n.find("tbody"),
                                p = $("<tr id=" + (r + 1) + ">");

                            p.append (createTableContent('container_line',(r + 1 ) , true, r) )
                                 .append (createTableContent('equipment_type_id', e[x].equipment_type_id , true, r))
                                 .append (createTableContent('equipment_type_code', e[x].equipment_type_name , false, r) )
                                 .append (createTableContent('container_number', e[x].container_number , false, r) )
                                 .append (createTableContent('container_seal_number', e[x].seal_number, false, r) )
                                 .append (createTableContent('total_weight_unit', e[x].total_weight_unit, false, r) )
                                 .append (createTableContent('container_seal_number2', e[x].seal_number2 , true, r) )
                                 .append (createTableContent('container_commodity_id', "", true, r) )
                                 .append (createTableContent('container_commodity_name',"", true, r) )
                                 .append (createTableContent('pd_status', e[x].pd_status , false, r) )
                                 .append (createTableContent('container_spotting_date', "", true, r) )
                                 .append (createTableContent('container_pull_date', "", true, r) )
                                 .append (createTableContent('container_carrier_id', e[x].carrier_id , true, r) )
                                 .append (createTableContent('container_carrier_name',e[x].carrier_name, true, r) )
                                 .append (createTableContent('container_ventilation', e[x].ventilation, true, r) )
                                 .append (createTableContent('container_degrees', e[x].degrees , true, r) )
                                 .append (createTableContent('container_temperature', e[x].temperature, true, r) )
                                 .append (createTableContent('container_max', e[x].temperature_max , true, r) )
                                 .append (createTableContent('container_min', e[x].temperature_min , true, r) )

                                 .append (createTableContent('container_pickup_id', e[x].pickup_id , true, r) )
                                 .append (createTableContent('container_pickup_name', e[x].pickup_name, true, r) )
                                 .append (createTableContent('container_pickup_type', e[x].pickup_type , true, r) )
                                 .append (createTableContent('container_pickup_address', e[x].pickup_address, true, r) )
                                 .append (createTableContent('container_pickup_city', e[x].pickup_city , true, r) )
                                 .append (createTableContent('container_pickup_state_id', e[x].pickup_state_id, true, r) )
                                 .append (createTableContent('container_pickup_state_name', e[x].pickup_state_name, true, r) )
                                 .append (createTableContent('container_pickup_zip_code_id', e[x].pickup_zip_code_id , true, r) )
                                 .append (createTableContent('container_pickup_zip_code_code', e[x].pickup_zip_code, true, r) )
                                 .append (createTableContent('container_pickup_phone', e[x].pickup_phone, true, r) )
                                 .append (createTableContent('container_pickup_contact', e[x].pickup_contact, true, r) )
                                 .append (createTableContent('container_pickup_date', e[x].pickup_date, true, r) )
                                 .append (createTableContent('container_pickup_number', e[x].pickup_number, true, r) )

                                 .append (createTableContent('container_delivery_id', e[x].delivery_id, true, r) )
                                 .append (createTableContent('container_delivery_name', e[x].delivery_name, true, r) )
                                 .append (createTableContent('container_delivery_type', e[x].delivery_type, true, r) )
                                 .append (createTableContent('container_delivery_address', e[x].delivery_address, true, r) )
                                 .append (createTableContent('container_delivery_city', e[x].delivery_city, true, r) )
                                 .append (createTableContent('container_delivery_state_id', e[x].delivery_state_id, true, r) )
                                 .append (createTableContent('container_delivery_state_name', e[x].delivery_state_name, true, r) )
                                 .append (createTableContent('container_delivery_zip_code_id', e[x].delivery_zip_code_id, true, r) )
                                 .append (createTableContent('container_delivery_zip_code_code', e[x].delivery_zip_code, true, r) )
                                 .append (createTableContent('container_delivery_phone', e[x].delivery_phone, true, r) )
                                 .append (createTableContent('container_delivery_contact', e[x].delivery_contact, true, r) )
                                 .append (createTableContent('container_delivery_date', e[x].delivery_date, true, r) )
                                 .append (createTableContent('container_delivery_number', e[x].delivery_number, true, r) )

                                 .append (createTableContent('container_drop_id', e[x].drop_id, true, r) )
                                 .append (createTableContent('container_drop_name',  e[x].drop_name, true) )
                                 .append (createTableContent('container_drop_type', e[x].drop_type, true, r) )
                                 .append (createTableContent('container_drop_address', e[x].drop_address, true, r) )
                                 .append (createTableContent('container_drop_city', e[x].drop_city, true, r) )
                                 .append (createTableContent('container_drop_state_id', e[x].drop_state_id, true, r) )
                                 .append (createTableContent('container_drop_state_name', e[x].drop_state_name, true, r) )
                                 .append (createTableContent('container_drop_zip_code_id', e[x].drop_zip_code_id, true, r) )
                                 .append (createTableContent('container_drop_zip_code_code', e[x].drop_zip_code, true, r) )
                                 .append (createTableContent('container_drop_phone', e[x].drop_phone, true, r) )
                                 .append (createTableContent('container_drop_contact', e[x].drop_contact, true, r) )
                                 .append (createTableContent('container_drop_date', e[x].drop_date, true, r) )
                                 .append (createTableContent('container_drop_number', e[x].drop_number, true, r) )

                                .append(createTableContent('container_hazardous_contact', "", true, r))
                                .append(createTableContent('container_hazardous_phone', "", true, r))

                                .append(createTableContent('container_inner_code', "", true, r))
                                .append(createTableContent('container_inner_quantity', "", true, r))
                                .append(createTableContent('container_net_weight', "", false, r))
                                .append(createTableContent('container_number_equipment', "", true, r))
                                .append(createTableContent('container_outer_code', "", true, r))
                                .append(createTableContent('container_outer_quantity', "", true, r))
                                .append(createTableContent('container_release_number', "", true, r))
                                .append(createTableContent('container_requested_equipment', "", true, r))
                                .append(createTableContent('container_tare_weight', "", true, r))

                                .append(createTableContent('container_comments', "", true, r))
                                .append (createTableBtns());
                            t.append(p);
                            x= x+1;
                        }
                    }
                });
            removeEmptyNodes('container_details');*/


        sum_hbl();

    });



    if($("#date_today").val() == ''){
        initDate($("#date_today"), 0);
    }
    $("#user_id").attr("disabled", true);
    $("#code").attr("disabled", true);
    $("#total_volume_weight").number(true, 3);
    $("#total_pieces").number(true);
    $("#total_actual_weight").number(true, 3);
    $("#total_charge_weight").number(true, 3);
    $("#agent_commission").number(true, 3);
    $("#hbl_pieces").attr("readonly", true);
    $("#hbl_actual_weight").attr("readonly", true);
    $("#hbl_charge_weight").attr("readonly", true);

</script>