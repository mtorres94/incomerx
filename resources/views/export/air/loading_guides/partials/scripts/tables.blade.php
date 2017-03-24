<script type="text/javascript">
    $("#btn_container_details").click(function(){
        clearTableCondition("cargo_details");
        $("#total_weight_unit").val("L").change();
        $("#reference").attr("readonly", true);
        $("#autocheck").prop('checked', true);
    });

    $("#pick_cargo_save").click(function(){
        var whr_select = new Array(), c=0, d=0, x=0;
        $("input[name='pick_select[]']:checked").each(function() {
            whr_select.push($(this).val());
        });
        //=============================================
        var n = $("#cargo_details"),
            t = n.find("tbody");
        var tr=  $("#load_warehouse_details tbody tr"),
            _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            r_1 = tr.length; d = _ -1;

        for(var a =0; a< r_1 ; a++) {
            for (c=0; c< whr_select.length ; c ++){
                if(whr_select[c] == tr[a].childNodes[1].textContent){
                    var p_1 = $("<tr id="+ tr[a].childNodes[1].textContent +" >");
                    p_1.append(createTableContent('warehouse_id', whr_select[c], true, d))
                        .append(createTableContent('warehouse_number', tr[a].childNodes[3].textContent, false, d))
                        .append(createTableContent('date_in', tr[a].childNodes[4].textContent, false, d))
                        .append(createTableContent('shipper_id', tr[a].childNodes[5].textContent, true, d))
                        .append(createTableContent('shipper_name', tr[a].childNodes[6].textContent, false, d))
                        .append(createTableContent('consignee_id', tr[a].childNodes[7].textContent, true, d))
                        .append(createTableContent('consignee_name', tr[a].childNodes[8].textContent, false, d))
                        .append(createTableContent('status', tr[a].childNodes[9].textContent, false, d))
                        .append(createTableContent('sum_pieces', tr[a].childNodes[10].textContent, false, d))
                        .append(createTableContent('sum_weight', tr[a].childNodes[11].textContent, false, d))
                        .append(createTableContent('sum_cubic', tr[a].childNodes[12].textContent, false, d))
                        .append(createTableContent('sum_volume_weight', tr[a].childNodes[13].textContent, true, d))
                        .append(createTableContent('warehouse_id', tr[a].childNodes[14].textContent, true, d))
                        .append(createTableContent('hazardous', tr[a].childNodes[15].textContent, true, d))
                        .append(createTableContent('destination_name', tr[a].childNodes[16].textContent, true, d))
                        .append(createTableBtns());
                    t.append(p_1);


                }
            }
        }
        //=============================================
        $("#LoadWarehouse").modal("hide");
      total_cargo_details();
    });



    $("#container-save").click(function(){
        var _ = ($("#containers tbody tr").length == 0 ? 1 : parseInt($("#containers tbody tr")[$("#containers tbody tr").length - 1].childNodes[0].textContent) + 1 ),
          c1 = $("#container_id").val(),
          d = (c1 == 0 ? _ : c1) - 1,
          c2 = ($("#equipment_type_id").val() == '' ? 0 : $("#equipment_type_id").val()),
          c3 = $("#equipment_type_code").val(),
          c4 = $("#container_number").val(),
          c5 = $("#container_seal_number1").val(),
          c6 = $("#container_seal_number2").val(),
          c7 = $("#container_order_number").val(),
          c8 = $("#cubic_max").val(),
          c9 = $("#cubic_load").val(),
          c10 = $("#cubic_load_p").val(),
          c11 = $("#cubic_excess").val(),
          c12 = $("#pieces_loaded").val(),
          c13 = $("#max_weight").val(),
          c14 = $("#weight_load").val(),
          c15 = $("#weight_load_p").val(),
          c16 = $("#weight_excess").val(),
          c17 = $("#reference").val(),
          c18 = $("#sum_volume_weight").val(),
          n = $("#containers"),
          t = n.find("tbody"),
          p = $("<tr id=" + (c1 == 0 ? _ : c1) + " >");
        p.append(createTableContent('container_line', (c1 == 0 ? _ : c1), true, d))
            .append(createTableContent('equipment_type_id', c2, true, d))
            .append(createTableContent('equipment_type_code', c3, false, d))
            .append(createTableContent('container_number', c4, false, d))
            .append(createTableContent('container_seal_number', c5, false, d))
            .append(createTableContent('container_seal_number2', c6, true, d))
            .append(createTableContent('container_order_number', c7, false, d))
            .append(createTableContent('cubic_max', c8, true, d))
            .append(createTableContent('cubic_load', c9, false, d))
            .append(createTableContent('cubic_load_p', c10, true, d))
            .append(createTableContent('cubic_excess', c11, true, d))
            .append(createTableContent('pieces_loaded', c12, true, d))
            .append(createTableContent('max_weight', c13, true, d))
            .append(createTableContent('weight_load', c14, false, d))
            .append(createTableContent('weight_load_p', c15, true, d))
            .append(createTableContent('weight_excess', c16, true, d))
            .append(createTableContent('reference', c17, false, d))
            .append(createTableContent('volume_weight', c18, true, d))
            .append(createTableBtns()); 0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p);
            total_containers();

        var id_row = (c1 == 0 ? _ : c1);
        $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
        n = $("#hidden_warehouse");
        t = n.find("tbody");
        var tr = $("#cargo_details tbody tr"),
            tr_1 = $("#hidden_warehouse tbody tr");
        var r_1 = tr.length;
        d = tr_1.length + 1;

        for (var a = 0; a < r_1; a++) {
            var p_1 = $("<tr data-id=" + id_row + ">");
            p_1.append(createTableContent('hidden_warehouse_line',(a + 1), true, d))
                .append(createTableContent('hidden_warehouse_number', tr[a].childNodes[1].textContent, false, d))
                .append(createTableContent('hidden_date_in', tr[a].childNodes[2].textContent, false, d))
                .append(createTableContent('hidden_shipper_id', tr[a].childNodes[3].textContent, true, d))
                .append(createTableContent('hidden_shipper_name', tr[a].childNodes[4].textContent, false, d))
                .append(createTableContent('hidden_consignee_id', tr[a].childNodes[5].textContent, true, d))
                .append(createTableContent('hidden_consignee_name', tr[a].childNodes[6].textContent, false, d))
                .append(createTableContent('hidden_status', tr[a].childNodes[7].textContent, false, d))
                .append(createTableContent('hidden_sum_pieces', tr[a].childNodes[8].textContent, true, d))
                .append(createTableContent('hidden_sum_weight', tr[a].childNodes[9].textContent, true, d))
                .append(createTableContent('hidden_sum_cubic', tr[a].childNodes[10].textContent, true, d))
                .append(createTableContent('hidden_sum_volume_weight', tr[a].childNodes[11].textContent, true, d))
                .append(createTableContent('hidden_warehouse_id', tr[a].childNodes[12].textContent, true, d))
                .append(createTableContent('hazardous', tr[a].childNodes[13].textContent, true, d))
                .append(createTableContent('hidden_flag', '0', true, d))
                .append(createTableContent('destination', tr[a].childNodes[14].textContent, true, d))
                .append(createTableContent('line',  id_row, true, d));
            t.append(p_1);
            d += 1;
        }
        cleanModalFields("container_details"); clearTableCondition("cargo_details"); $("#equipment_type_id").val("").change(), $("#equipment_type_code").val(""); $("#container_details").modal("show");

    });

    $("#containers").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                var id_row = td.closest('tr').attr('id');
                $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
                td.closest('tr').remove();
                total_containers();
            }
        });
    });
    $("#containers").on("click", "a.btn-default", function() {
        clearTableCondition("cargo_details");
        var t = $(this).closest("tr"),
            c1 = t[0].childNodes[0].textContent,
            c2 = t[0].childNodes[1].textContent,
            c3 = t[0].childNodes[2].textContent,
            c4 = t[0].childNodes[3].textContent,
            c5 = t[0].childNodes[4].textContent,
            c6 = t[0].childNodes[5].textContent,
            c7 = t[0].childNodes[6].textContent,
            c8 = t[0].childNodes[7].textContent,
            c9 = t[0].childNodes[8].textContent,
            c10 = t[0].childNodes[9].textContent,
            c11 = t[0].childNodes[10].textContent,
            c12 = t[0].childNodes[11].textContent,
            c13 = t[0].childNodes[12].textContent,
            c14 = t[0].childNodes[13].textContent,
            c15 = t[0].childNodes[14].textContent,
            c16 = t[0].childNodes[15].textContent,
            c17 = t[0].childNodes[16].textContent,
            c18 = t[0].childNodes[17].textContent;

        $("#container_id").val(c1);
        $("#equipment_type_id").val(c2);
        $("#equipment_type_code").val(c3);
        $("#container_number").val(c4);
        $("#container_seal_number1").val(c5);
        $("#container_seal_number2").val(c6);
        $("#container_order_number").val(c7);
        $("#cubic_max").val(c8);
        $("#cubic_load").val(c9);
        $("#cubic_load_p").val(c10);
        $("#cubic_excess").val(c11);
        $("#pieces_loaded").val(c12);
        $("#max_weight").val(c13);
        $("#weight_load").val(c14);
        $("#weight_load_p").val(c15);
        $("#weight_excess").val(c16);
        $("#reference").val(c17);
        $("#sum_volume_weight").val(c18);

        var r= $("#hidden_warehouse tbody [data-id='"+ c1 +"']").length,
            t_hidden= $("#hidden_warehouse tbody [data-id='"+ c1 +"']"),
            t1= $("#cargo_details tbody tr"),
            n= $("#cargo_details");
        t = n.find("tbody");
        for (var a=0; a< r; a++) {
            var d = t1.length + 1,
                p = $("<tr id="+ c1 +" >");
            p.append(createTableContent('cargo_id', d, true, d))
                .append(createTableContent('warehouse_number', t_hidden[a].childNodes[1].textContent, false, d))
                .append(createTableContent('date_in', t_hidden[a].childNodes[2].textContent, false, d))
                .append(createTableContent('shipper_id', t_hidden[a].childNodes[3].textContent, true, d))
                .append(createTableContent('shipper_name', t_hidden[a].childNodes[4].textContent, false, d))
                .append(createTableContent('consignee_id', t_hidden[a].childNodes[5].textContent, true, d))
                .append(createTableContent('consignee_name', t_hidden[a].childNodes[6].textContent, false, d))
                .append(createTableContent('status', t_hidden[a].childNodes[7].textContent, false, d))
                .append(createTableContent('sum_pieces', t_hidden[a].childNodes[8].textContent, false, d))
                .append(createTableContent('sum_weight', t_hidden[a].childNodes[9].textContent, false, d))
                .append(createTableContent('sum_cubic', t_hidden[a].childNodes[10].textContent, false, d))
                .append(createTableContent('sum_volume_weight', t_hidden[a].childNodes[11].textContent, true, d))
                .append(createTableContent('warehouse_id', t_hidden[a].childNodes[12].textContent, true, d))
                .append(createTableContent('hazardous', t_hidden[a].childNodes[13].textContent, true, d))
                .append(createTableContent('hidden_flag', t_hidden[a].childNodes[14].textContent, true, d))
                .append(createTableContent('destination', t_hidden[a].childNodes[15].textContent, true, d))
                .append(createTableBtns());
            t.append(p);
        }
        $("#container_details").modal("show");
    });

    $("#cargo_details").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest('tr').remove();
                total_cargo_details();
            }
        });
    });

    $("#delete_container").click(function(){
        var td = $("#containers");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition("cargo_details");
                clearTableCondition("hidden_warehouse");
                clearTableCondition("containers");
                total_containers();
            }
        });
    });

    $("#delete_cargo").click(function(){
        var td = $("#cargo_details");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition("cargo_details");
                total_cargo_details();
            }
        });
    });


    //=======================================================================
$("#btn_create_house").click( function () {
   clearTableCondition('house_warehouse_details');
   cleanModalFields('create_house');
   $("#house_search_type").val("1").change();
    $('#tmp_loading_guide_id').val( $("#loading_guide_id").val());
    $('#tmp_departure_date').val( $("#departure_date").val());
    $('#tmp_arrival_date').val( $("#arrival_date").val());
    $('#tmp_booking_code').val($("#booking_code").val());
    $('#tmp_flight').val($("#flight").val());
    $('#tmp_shipment_id').val($("#shipment_id").val());
    $('#tmp_booking_id').val($("#booking_id").val());
    $('#tmp_shipment_type').val($("#shipment_type").val());
    $('#tmp_shipment_code').val($("#shipment_id option:selected").text());
    $('#tmp_date').val( $("#date").val());
    var id = '{{ isset($loading_guide) ? $loading_guide->id : ""}}',
        t= $("#house_warehouse_details").find('tbody'),
        x = 0;
    $.ajax({
        url: "{{ route('ea_loading_guides.get_warehouses') }}",
        data: {id: id},
        type: 'GET',
        success: function (e) {
            if(e.length == 0){
                arrayEmpty('There are no items linked to this Loading Guide. Add some warehouses at Cargo Details');
            }else{
                while (e[x] != '') {
                    var p = $("<tr id=" + x + ">");
                    p.append(createTableContent('line', x, true, x))
                        .append("<input type='checkbox' name ='warehouse_select[]' id= 'warehouse_select' value= '"+ e[x].id+"' />")
                        .append(createTableContent('warehouse_code', e[x].value, false, x))
                        .append(createTableContent('date_in', e[x].date_in, false, x))
                        .append(createTableContent('shipper_id', e[x].shipper_id, true, x))
                        .append(createTableContent('shipper_name', e[x].shipper_name, false, x))
                        .append(createTableContent('consignee_id', e[x].consignee_id, true, x))
                        .append(createTableContent('consignee_name', e[x].consignee_name , false, x))
                        .append(createTableContent('pieces', e[x].sum_pieces, false, x))
                        .append(createTableContent('status', e[x].status , true, x))
                        .append(createTableContent('weight', e[x].sum_weight , false, x))
                        .append(createTableContent('volume_weight', e[x].sum_volume_weight , true, x))
                        .append(createTableContent('cubic', e[x].sum_cubic , false, x))
                        .append(createTableContent('hazardous', e[x].hazardous , false, x))
                        .append(createTableContent('destination', e[x].destination , false, x))
                        .append(createTableContent('warehouse_id', e[x].id , true, x));
                    t.append(p);
                    x++;
                    $("#create_airway_bill").modal("show");
                }
            }

        }
    });
});

</script>