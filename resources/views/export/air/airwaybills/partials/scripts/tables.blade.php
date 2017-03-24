<script type="text/javascript">
    $("#btn_charges").click(function(){
        $("#billing_bill_party").val("C").change();
        $("#billing_bill_type").val("C").change();
        $("#billing_currency_type").val("1").change();
        $("#cost_currency_type").val("1").change();
        $("#billing_unit_id").val("0").change();
        $("#cost_unit_id").val("0").change();
    });

    $("#btn_cargo").click(function(){
        $("#cargo_rate_class").val("Q").change();
        $("#cargo_unit_weight").val("L").change();
    });

    $("#cargo-save").click(function() {
            var _ =  ($("#cargos tbody tr").length == 0 ? 1 : parseInt($("#cargos tbody tr")[$("#cargos tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                l = $("#cargo_line").val(),
                c = (0 == l ? _  : l)-1,
                c1 = $("#cargo_pieces").val(),
                c2 = $("#cargo_unit_weight").val(),
                c3 = $("#cargo_gross_weight").val(),
                c4 = $("#cargo_volume_weight").val(),
                c5 = $("#cargo_rate").val(),
                c6 = $("#cargo_total").val(),
                c7 = $("#cargo_rate_class").val(),
                c8 = $("#cargo_commodity").val(),
                c9 = $("#cargo_show_rate").val(),
                c10 = $("#cargo_show_total").val(),
                c11 = $("#cargo_comments").val(),
                c12 = $("#cargo_charge_weight").val(),
                n = $("#cargos"),
                t = n.find("tbody"),
                p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('cargo_line', (0==l? _ : l) , true, c))
                .append(createTableContent('pieces', c1, false, c))
                .append(createTableContent('unit_weight', c2, false, c))
                .append(createTableContent('gross_weight', c3, true, c))
                .append(createTableContent('volume_weight', c4, false, c))
                .append(createTableContent('rate', c5, false, c))
                .append(createTableContent('total', c6, false, c))
                .append(createTableContent('rate_class', c7, false, c))
                .append(createTableContent('commodity', c8, true, c))
                .append(createTableContent('show_rate', c9, true, c))
                .append(createTableContent('show_total', c10, true, c))
                .append(createTableContent('comments', c11, true, c))
                .append(createTableContent('charge_weight', c12, true, c))
                .append(createTableBtns()); 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p);
                cleanModalFields('cargo_details'); $("#cargo_details").modal("hide"); total_cargo();

    });
        $('#cargos').on('click', 'a.btn-danger', function() {
            var td = $(this);
            preventDeleteCondition(td, function (td, eval) {
                if (eval) {
                    var id_row = td.closest('tr').attr('id');
                    $("#hidden_details tbody [data-id='" + id_row + "']").remove();
                    td.closest('tr').remove();
                    total_cargo();
                }
            });
        });

        $("#cargos").on("click", "a.btn-default", function() {
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
                c13 = t[0].childNodes[12].textContent;
            $("#cargo_line").val(c1);
                $("#cargo_pieces").val(c2);
                $("#cargo_unit_weight").val(c3);
                $("#cargo_gross_weight").val(c4);
                $("#cargo_volume_weight").val(c5);
                $("#cargo_rate").val(c6);
                $("#cargo_total").val(c7);
                $("#cargo_rate_class").val(c8);
                $("#cargo_commodity").val(c9);
                $("#cargo_show_rate").val(c10);
                $("#cargo_show_total").val(c11);
                $("#cargo_comments").val(c12);
                $("#cargo_charge_weight").val(c13);

                //==============================================================================================
            clearTableCondition('details_cargo');
            var r= $("#hidden_houses tbody [data-id='"+ c1 +"']").length,
                t_hidden= $("#hidden_houses tbody [data-id='"+ c1 +"']"),
                n= $("#details_cargo"),
                t1 = n.find("tbody");
            for (var a=0; a< r; a++) {
                var d = t1.length + 1,
                    p = $("<tr id="+ c1 +" >");
                p.append(createTableContent('quantity', t_hidden[a].childNodes[0].textContent, false, d))
                    .append(createTableContent('unit_weight_detail', t_hidden[a].childNodes[1].textContent, false, d))
                    .append(createTableContent('length', t_hidden[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('width', t_hidden[a].childNodes[3].textContent, false, d))
                    .append(createTableContent('height', t_hidden[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('weight', t_hidden[a].childNodes[5].textContent, false, d))
                    .append(createTableContent('volume_weight', t_hidden[a].childNodes[6].textContent, false, d));
                t1.append(p);
            }//==============================================================================================


                $("#cargo_details").modal("show");
        });

    $("#charges-save").click(function() {
            var _ =  ($("#charges tbody tr").length == 0 ? 1 : parseInt($("#charges tbody tr")[$("#charges tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                charge_id = $("#charge_line").val(),
                d= (0== charge_id? _: charge_id)-1,
                g_1 = $("#billing_billing_id").val(),
                g_2 = $("#billing_billing_code").val(),
                g_3 = $("#billing_billing_description").val(),
                g_4 = $("#billing_bill_type").val(),
                g_5 = $("#billing_bill_party").val(),
                g_6 = $("#billing_notes").val(),
                g_7 = $("#billing_quantity").val(),
                g_8 = $("#billing_unit_id").val(),
                g_9 = $("#billing_unit_name").val().toUpperCase(),
                g_10 = $("#billing_increase").val(),
                g_11 = $("#billing_rate").val(),
                g_12 = $("#billing_amount").val(),
                g_13 = $("#billing_currency_type").val(),
                g_14 = $("#billing_exchange_rate").val(),
                g_15 = $("#billing_customer_id").val(),
                g_16 = $("#billing_customer_name").val().toUpperCase(),
                g_17 = $("#cost_quantity").val(),
                g_18 = $("#cost_unit_id").val(),
                g_19 = $("#cost_unit_name").val().toUpperCase(),
                g_20 = $("#cost_rate").val(),
                g_21 = $("#cost_amount").val(),
                g_22 = $("#cost_currency_type").val(),
                g_23 = $("#cost_exchange_rate").val(),
                g_24 = $("#billing_vendor_code").val(),
                g_25 = $("#billing_vendor_name").val().toUpperCase(),
                g_26 = $("#cost_date").val(),
                g_27 = $("#cost_invoice").val().toUpperCase(),
                g_28 = $("#cost_cost_center").val().toUpperCase(),
                g_29 = $("#cost_reference").val().toUpperCase(),
                b = $("#charges"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");


            C.append(createTableContent('charge_id', (0== charge_id? _ : charge_id) , true,d))
                .append(createTableContent('billing_billing_id', g_1, true, d))
                .append(createTableContent('billing_billing_code', g_2, false, d))
                .append(createTableContent('billing_billing_description', g_3, false, d))
                .append(createTableContent('billing_bill_type', g_4, false, d))
                .append(createTableContent('billing_bill_party', g_5, false, d))
                .append(createTableContent('billing_quantity', g_7, false, d))
                .append(createTableContent('billing_rate', g_11, true, d))
                .append(createTableContent('billing_amount', g_12, false, d))
                .append(createTableContent('billing_currency_type', g_13, true, d))
                .append(createTableContent('billing_customer_name', g_16, true, d))
                .append(createTableContent('cost_amount', g_21, false, d))
                .append(createTableContent('cost_currency_type', g_22, true, d))
                .append(createTableContent('cost_invoice', g_27, true, d))
                .append(createTableContent('cost_reference', g_29, true, d))


                .append(createTableContent('billing_notes', g_6, true, d))
                .append(createTableContent('billing_unit_id', g_8, true, d))
                .append(createTableContent('billing_unit_name', g_9, true, d))
                .append(createTableContent('billing_exchange_rate', g_14, true, d))
                .append(createTableContent('billing_customer_id', g_15, true, d))
                .append(createTableContent('cost_quantity', g_17, true, d))
                .append(createTableContent('cost_unit_id', g_18, true, d))
                .append(createTableContent('cost_unit_name', g_19, true, d))
                .append(createTableContent('cost_rate', g_20, true, d))
                .append(createTableContent('cost_cost_center', g_28, true, d))
                .append(createTableContent('cost_exchange_rate', g_23, true, d))
                .append(createTableContent('billing_vendor_code', g_24, true, d))
                .append(createTableContent('billing_vendor_name', g_25, true, d))
                .append(createTableContent('cost_date', g_26, true, d))
                .append(createTableContent('billing_increase', g_10, true, d))
                .append(createTableBtns()),

                0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C),cleanModalFields("charge_details"),$("#billing_bill_party").val("C").change(),$("#billing_bill_type").val("C").change(), $("#billing_currency_type").val("1").change(), $("#cost_currency_type").val("1").change(), $("#billing_unit_id").val("0").change(),  $("#cost_unit_id").val("0").change(),  $("#charge_details").modal("show"); $("#billing_billing_code").focus(); total_charge_details();


    }), $("#charges").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                total_charge_details();
            }
        });
    }), $("#charges").on("click", "a.btn-default", function() {

        var t = $(this).closest("tr"),
            g1 = t[0].childNodes[0].textContent,
            g2 = t[0].childNodes[1].textContent,
            g3 = t[0].childNodes[2].textContent,
            g4 = t[0].childNodes[3].textContent,
            g5 = t[0].childNodes[4].textContent,
            g6 = t[0].childNodes[5].textContent,
            g7 = t[0].childNodes[6].textContent,
            g8 = t[0].childNodes[7].textContent,
            g9 = t[0].childNodes[8].textContent,
            g10 = t[0].childNodes[9].textContent,
            g11 = t[0].childNodes[10].textContent,
            g12 = t[0].childNodes[11].textContent,
            g13 = t[0].childNodes[12].textContent,
            g14 = t[0].childNodes[13].textContent,
            g15 = t[0].childNodes[14].textContent,
            g16 = t[0].childNodes[15].textContent,
            g17 = t[0].childNodes[16].textContent,
            g18 = t[0].childNodes[17].textContent,
            g19 = t[0].childNodes[18].textContent,
            g20 = t[0].childNodes[19].textContent,
            g21 = t[0].childNodes[20].textContent,
            g22 = t[0].childNodes[21].textContent,
            g23 = t[0].childNodes[22].textContent,
            g24 = t[0].childNodes[23].textContent,
            g25 = t[0].childNodes[24].textContent,
            g26 = t[0].childNodes[25].textContent,
            g27 = t[0].childNodes[26].textContent,
            g28 = t[0].childNodes[27].textContent,
            g29 = t[0].childNodes[28].textContent,
            g30 = t[0].childNodes[29].textContent;

        $("#charge_line").val(g1);
            $("#billing_billing_id").val(g2);
            $("#billing_billing_code").val(g3);
            $("#billing_billing_description").val(g4);
            $("#billing_bill_type").val(g5).change();
            $("#billing_bill_party").val(g6).change();
            $("#billing_quantity").val(g7);
            $("#billing_rate").val(g8);
            $("#billing_amount").val(g9);
            $("#billing_currency_type").val(g10).change();
            $("#billing_customer_name").val(g11);
            $("#cost_amount").val(g12);
            $("#cost_currency_type").val(g13).change();
            $("#cost_invoice").val(g14);
            $("#cost_reference").val(g15);

            $("#billing_notes").val(g16);
            $("#billing_unit_id").val(g17).change();
            $("#billing_unit_name").val(g18);
            $("#billing_exchange_rate").val(g19);
            $("#billing_customer_id").val(g20);
            $("#cost_quantity").val(g21);
            $("#cost_unit_id").val(g22).change();
            $("#cost_unit_name").val(g23);
            $("#cost_rate").val(g24);
            $("#cost_cost_center").val(g25);
            $("#cost_exchange_rate").val(g26);
            $("#billing_vendor_code").val(g27);
            $("#billing_vendor_name").val(g28);
            $("#cost_date").val(g29);
            $("#billing_increase").val(g30);

            $("#charge_details").modal("show");  $("#billing_billing_code").focus();
    });
    function arrayEmpty(message){
        swal({
            title: "Wait!",
            text: message,
            type: "warning",
            confirmButtonText: "Ok"
        });
    }

    $("#btn_link_house").click(function(){
       if($("#shipment_id").val() != ''){
           var id= $("#shipment_id").val(),  status= "{{ (isset($airway_bill)? 'E': 'N') }}";
           $.ajax({
               url: "{{ route('ea_airwaybills.get') }}",
               data: {id: id, status: status},
               type: 'GET',
               success: function (e) {
                    if(e.length == 0){
                        arrayEmpty("There are not elements to Link. All the elements have already been taken.");
                    }else{
                        $("#link_house").modal("show");
                        clearTableCondition("houses");
                        var d =0, n = $("#houses"),
                            t= n.find("tbody");
                        while(e[d].id !=''){
                            var p_1 = $("<tr id="+ (d + 1 )+" >");
                                p_1.append(createTableContent('house_line', d, true, d))
                                    .append("<td><input type='checkbox' name='house_select[]' id='house_select' value='" + e[d].id +"' "+ (e[d].status == 'C' ? 'checked': '')+ "></td>")
                                   .append(createTableContent('house_number', e[d].code, false, d))
                                   .append(createTableContent('date_in', e[d].date, false, d))
                                   .append(createTableContent('status', e[d].status, false, d))
                                   .append(createTableContent('sum_pieces', e[d].sum_pieces, false, d))
                                   .append(createTableContent('sum_weight', e[d].sum_weight, false, d))
                                   .append(createTableContent('sum_cubic', e[d].sum_cubic, true, d))
                                   .append(createTableContent('sum_volume_weight', e[d].sum_volume_weight, true, d))
                                   .append(createTableContent('house_id', e[d].id, true, d))
                                   .append(createTableContent('destination_name', e[d].destination_name, false, d));
                                t.append(p_1);
                            d++;
                        }
                    }
               }
           });
       }else{
           arrayEmpty("Select a FILE# first");
       }
    });


    $("#link_house_save").click(function(){
        var select = new Array(), sum_pieces=0, sum_weight=0, sum_volume_weight=0;
        clearTableCondition('hidden_house');
        clearTableCondition('hidden_id_houses');
        clearTableCondition('cargos');
        $("input[name='house_select[]']:checked").each(function() {
            select.push($(this).val());
        });
        var n = $("#hidden_id_houses"), t= n.find("tbody");
        var tr= $("#houses tbody tr");
        for(var x=0; x < select.length; x ++){
            for(var y=0; y < tr.length; y ++){
                if(select[x] == tr[y].childNodes[9].textContent){
                    sum_pieces=  parseFloat(tr[y].childNodes[5].textContent) + sum_pieces;
                    sum_weight=  parseFloat(tr[y].childNodes[6].textContent) + sum_weight;
                    sum_volume_weight=  parseFloat(tr[y].childNodes[8].textContent) + sum_volume_weight;
                    var p = $("<tr id= 1 >");
                    p.append(createTableContent('house_id', tr[y].childNodes[9].textContent , true, x));
                    t.append(p);
                }
            }
        }

        n = $("#cargos"); t= n.find("tbody");

            p = $("<tr id= 1 >");
            p.append(createTableContent('cargo_line', 1 , true, 0))
                .append(createTableContent('pieces', sum_pieces, false, 0))
                .append(createTableContent('unit_weight', '', false, 0))
                .append(createTableContent('gross_weight', sum_weight, true, 0))
                .append(createTableContent('volume_weight', sum_volume_weight, false, 0))
                .append(createTableContent('rate','', false, 0))
                .append(createTableContent('total','', false, 0))
                .append(createTableContent('rate_class', '', false, 0))
                .append(createTableContent('commodity', '', true, 0))
                .append(createTableContent('show_rate', '', true, 0))
                .append(createTableContent('show_total', '', true, 0))
                .append(createTableContent('comments', '', true, 0))
                .append(createTableContent('charge_weight', sum_volume_weight, true, 0))
                .append(createTableBtns());
            t.append(p);

        $("#link_house").modal("hide");
        total_cargo();
        load_house_details();


    });

    $("#delete_cargo").click(function(){
        var td = $("#cargos");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition('cargos');
                clearTableCondition('hidden_house');
                total_cargo();
            }
        });
    });

    function load_house_details(){
        var select = new Array();
        $("input[name='house_select[]']:checked").each(function() {
            select.push($(this).val());
        });

        for( var x=0; x< select.length; x++ ){
            $.ajax({
                url: "{{ route('ea_airwaybills.get_details') }}",
                data: {id_select: select[x]},
                type: 'GET',
                success: function (e) {
                    var n= $("#hidden_houses"), t= n.find("tbody"), r= $("#hidden_houses tbody tr").length + 1;
                    for(var y= 0; y < e.length; y++){

                        var p= $("<tr data-id= '1'>");
                        p.append(createTableContent('quantity', e[y].quantity, false, r))
                            .append(createTableContent('unit_weight_detail', e[y].weight_unit,true,r))
                            .append(createTableContent('length',e[y].length,true,r))
                            .append(createTableContent('width',e[y].width,true,r))
                            .append(createTableContent('height',e[y].height ,true,r))
                            .append(createTableContent('weight',e[y].total_weight,true,r))
                            .append(createTableContent('volume_weight_detail',e[y].volume_weight ,true,r));
                        t.append(p);
                        r++;
                    }
                }
            });
        }
    }
</script>