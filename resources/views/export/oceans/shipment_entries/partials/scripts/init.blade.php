<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('eo_shipment_entries.close') }}')

        if ($("#open_status").val() == "1") {
            disableFields('data');
        }

removeEmptyNodes('container_details');
removeEmptyNodes('hzd_details');


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
        $("#bl_status").val("O").change();

        $("#quote_code").change(function () {

            var id = $("#quote_id").val(), x = 0;
                $.ajax({
                    url: "{{ route('eo_quotes.get_details') }}",
                    data: {id: id},
                    type: 'GET',
                    success: function (e) {
                        //=============================================
                        x = 0;
                        clearTable("container_details");
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
                                .append (createTableBtns())
                            t.append(p);
                            x= x+1;
                        }
                    }
                });
            removeEmptyNodes('container_details');
        });


    });

    $('#confirmed').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#spot_rate').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });


    initDate($("#date_today"), 0);
    $("#user_id").attr("disabled", true);
    $("#code").attr("disabled", true);
    $("#total_weight").number(true, 3);
    $("#total_cubic").number(true, 3);
    $("#total_volume_weight").number(true, 3);
    $("#total_pieces").number(true);
    $("#total_actual_weight").number(true, 3);
    $("#total_charge_weight").number(true, 3);
    $("#agent_commission").number(true, 3);

</script>