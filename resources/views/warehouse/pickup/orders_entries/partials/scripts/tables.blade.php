<script type="text/javascript">

    $("#btn-cargo").click(function() {
        $("#cargo_quantity").val(1);
        $("#cargo_pieces").val(1);
        $("#cargo_metric_unit_measurement_id").val("I").change();
        $("#cargo_weight_unit_measurement_id").val("L").change();
        $("#cargo_dim_fact").val("I").change();

          for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });



    $("#btn-vehicle").click(function() {
        $("#vehicle_quantity").val(1);
        $("#vehicle_pieces").val(1);
        $("#vehicle_metric_unit_measurement_id").val("I").change();
        $("#vehicle_weight_unit_measurement_id").val("L").change();
        $("#vehicle_dim_fact").val("I").change();

        for (var t = $("#vehicles-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn-charges").click(function() {
        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn-pick-cargo").click(function() {
        $("#load_cargo").val("1").change();
        for (var t = $("#pick-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });


    $("#btn-transportation").click(function() {
        for (var t = $("#transportation-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_charge").click(function() {
        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_cargo").click(function() {
        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_vehicle").click(function() {
        for (var t = $("#vehicles-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_transportation").click(function() {
        for (var t = $("#transportation-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#po-save").click(function() {
        if( $("#PO_number").val() == ''){
            show_alert();
            $("#PO_number").focus()
        }else{
            var r = ($('#PO_details tbody tr').length + 1),
                   _ =  ($("#PO_details tbody tr").length == 0 ? 1 : parseInt($("#PO_details tbody tr")[$("#PO_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#PO_line").val(),
                    c= (0 == l ? _ : l)-1,
                    a = $("#PO_number").val().toUpperCase(),
                    d = $("#PO_project_reference").val().toUpperCase(),
                    s = $("#PO_remarks").val().toUpperCase(),
                    n = $("#PO_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0 == l ? _ : l) + ">");
                    p.append(createTableContent('references_line', (0 == l ? _ : l) , true, c))
                    .append(createTableContent('references_po_number', a, false, c))
                    .append(createTableContent('references_ref_number', d, false, c))
                    .append(createTableContent('references_note', s, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l  ).replaceWith(p), cleanModalFields('PO-Numbers'), $("#PO_number").focus();
console.log('if  '+(0 == l ? _ : l) + ' l ' + l);

        }
    }),
        $('#PO_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

        $("#PO_details").on("click", "a.btn-default", function() {
            removeEmptyNodes('PO_details');
            var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        a = t[0].childNodes[3].textContent;
            $('#PO_line').val(o), $("#PO_number").val(r), $("#PO_project_reference").val(s), $("#PO_remarks").val(a), $("#PO-Numbers").modal("show"), $("#PO_number").focus()

            }),

    $("#so-save").click(function() {
        if($("#SO_number").val() == ''){
            show_alert();
            $("#SO_number").focus()
        }else {
            var r = ($('#SO_details tbody tr').length + 1),
                    _ =  ($("#SO_details tbody tr").length == 0 ? 1 : parseInt($("#SO_details tbody tr")[$("#SO_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#SO_line").val(),
                    c = (0 == l ? _ : l)-1,
                    a = $("#SO_number").val().toUpperCase(),
                    d = $("#SO_reference").val().toUpperCase(),
                    s = $("#SO_remarks").val().toUpperCase(),
                    n = $("#SO_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0 == l ? _ : l) + ">");
            p.append(createTableContent('SO_line', (0 == l ? _ : l), true, c))
                    .append(createTableContent('SO_number', a, false, c))
                    .append(createTableContent('SO_reference', d, false, c))
                    .append(createTableContent('SO_remarks', s, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                    cleanModalFields('SO-Numbers'), $("#SO_number").focus()
        }
    }),
            $('#SO_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#SO_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('SO_details');
                var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        a = t[0].childNodes[3].textContent;
                $('#SO_line').val(o), $("#SO_number").val(r), $("#SO_reference").val(s), $("#SO_remarks").val(a), $("#SO-Numbers").modal("show"), $("#SO_number").focus()
            }),

    $("#stops-save").click(function() {
        var r = ($('#stop-details tbody tr').length + 1),
                _ =  ($("#stop-details tbody tr").length == 0 ? 1 : parseInt($("#stop-details tbody tr")[$("#stop-details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                l = $("#stop_id").val(),
                c = (0 == l ? _ : l)-1,
                g1 = $("#stop_customer_name").val().toUpperCase(),
                g2 = $("#stop_city").val().toUpperCase(),
                g3 = $("#stop_phone").val(),
                g4 = $("#stop_quantity").val(),
                g5 = $("#stop_cargo_type_id").val(),
                g6 = $("#stop_cargo_type_code").val(),
                g7 = $("#stop_unit").val(),
                g8 = $("#stop_length").val(),
                g9 = $("#stop_width").val(),
                g10 = $("#stop_height").val(),
                g11 = $("#stop_weight").val(),
                g12 = $("#stop_appt").val(),
                g13 = $("#stop_date").val(),
                g14 = $("#stop_customer_id").val(),
                g15 = $("#stop_address").val(),
                g16 = $("#stop_state_id").val(),
                g17 = $("#stop_state_name").val().toUpperCase(),
                g18 = $("#stop_zip_code_id").val(),
                g19 = $("#stop_zip_code_code").val(),
                g20 = $("#stop_contact").val(),
                g21 = $("#stop_ref").val(),
                g22 = $("#stop_reference").val().toUpperCase(),
                g23 = $("#stop_direction").val().toUpperCase(),
                g24 = $("#stop_instruction").val(),
                g25 = $("#stop_type").val(),

                n = $("#stop-details"),
                t = n.find("tbody"),
                p = $("<tr id=" + (0==l? _ : l) + ">");
        p.append(createTableContent('stop_id', (0 == l ? _ : l) , false, c))
                .append(createTableContent('stop_customer_name', g1, false, c))
                .append(createTableContent('stop_city', g2, false, c))
                .append(createTableContent('stop_phone', g3, false, c))
                .append(createTableContent('stop_quantity', g4, true, c))
                .append(createTableContent('stop_cargo_type_id', g5, true, c))
                .append(createTableContent('stop_cargo_type_code', g6, true, c))
                .append(createTableContent('stop_unit', g7, true, c))
                .append(createTableContent('stop_length', g8, true, c))
                .append(createTableContent('stop_width', g9, true, c))
                .append(createTableContent('stop_height', g10, true, c))
                .append(createTableContent('stop_weight', g11, true, c))
                .append(createTableContent('stop_appt', g12, true, c))
                .append(createTableContent('stop_date', g13, true, c))
                .append(createTableContent('stop_customer_id', g14, true, c))
                .append(createTableContent('stop_address', g15, true, c))
                .append(createTableContent('stop_state_id', g16, true, c))
                .append(createTableContent('stop_state_name', g17, true, c))
                .append(createTableContent('stop_zip_code_id', g18, true, c))
                .append(createTableContent('stop_zip_code_code', g19, true, c))
                .append(createTableContent('stop_contact', g20, true, c))
                .append(createTableContent('stop_ref', g21, true, c))
                .append(createTableContent('stop_reference', g22, true, c))
                .append(createTableContent('stop_direction', g23, true, c))
                .append(createTableContent('stop_instruction', g24, true, c))
                .append(createTableContent('stop_type', g25, true, c))
                .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                cleanModalFields('Stop_Details'),$("#stop_type").focus()
    }),
            $('#stop-details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#stop-details").on("click", "a.btn-default", function() {
                removeEmptyNodes('stop-details');
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
                        g26 = t[0].childNodes[25].textContent;

                        $('#stop_id').val(g1),
                        $("#stop_customer_name").val(g2),
                        $("#stop_city").val(g3),
                        $("#stop_phone").val(g4),
                        $("#stop_quantity").val(g5),
                        $("#stop_cargo_type_id").val(g6),
                        $("#stop_cargo_type_code").val(g7),
                        $("#stop_unit").val(g8),
                        $("#stop_length").val(g9),
                        $("#stop_width").val(g10),
                        $("#stop_height").val(g11),
                        $("#stop_weight").val(g12),
                        $("#stop_appt").val(g13),
                        $("#stop_date").val(g14),
                        $("#stop_customer_id").val(g15),
                        $("#stop_address").val(g16),
                        $("#stop_state_id").val(g17),
                        $("#stop_state_name").val(g18),
                        $("#stop_zip_code_id").val(g19),
                        $("#stop_zip_code_code").val(g20),
                        $("#stop_contact").val(g21),
                        $("#stop_ref").val(g22),
                        $("#stop_reference").val(g23),
                        $("#stop_direction").val(g24),
                        $("#stop_instruction").val(g25),
                        $("#stop_type").val(g26),
                        $("#Stop_Details").modal("show"), $("#stop_customer_name").focus()
            }),


            $("#pro-save").click(function() {
               if($("#PRO_number").val()== ''){
                   show_alert();
                   $("#PRO_number").focus()
               }else{
                   var r = ($('#PRO_details tbody tr').length + 1),
                           _ =  ($("#PRO_details tbody tr").length == 0 ? 1 : parseInt($("#PRO_details tbody tr")[$("#PRO_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                           l = $("#PRO_line").val(),
                           c = (0 == l ? _  : l)-1,
                           a = $("#PRO_number").val().toUpperCase(),
                           d = $("#PRO_reference").val().toUpperCase(),
                           s = $("#PRO_remarks").val().toUpperCase(),
                           n = $("#PRO_details"),
                           t = n.find("tbody"),
                           p = $("<tr id=" + (0==l? _ : l) + ">");
                   p.append(createTableContent('PRO_line', (0 == l ? _  : l) , true, c))
                           .append(createTableContent('PRO_number', a, false, c))
                           .append(createTableContent('PRO_reference', d, false, c))
                           .append(createTableContent('PRO_remarks', s, true, c))
                           .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                           cleanModalFields('PRO-Numbers'),$("#PRO_number").focus()
               }
            }),
            $('#PRO_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#PRO_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('PRO_details');
                var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        a = t[0].childNodes[3].textContent;
                $('#PRO_line').val(o), $("#PRO_number").val(r), $("#PRO_reference").val(s), $("#PRO_remarks").val(a), $("#PRO-Numbers").modal("show"), $("#PRO_number").focus()
            }),

            $("#hazardous-save").click(function() {
                if($("#tmp_hazardous_uns_code").val()== ''){
                    show_alert();
                    $("#tmp_hazardous_uns_code").focus()
                }else{
                    var r = ($('#hazardous-details tbody tr').length + 1),
                            l = $("#tmp_hazardous_uns_line").val(),
                            _ =  ($("#hazardus-details tbody tr").length == 0 ? 1 : parseInt($("#hazardous-details tbody tr")[$("#hazardous-details tbody tr").length - 1].childNodes[1].textContent) + 1 ),
                            c = (0 == l ? _ : l)-1,
                            a = $("#tmp_hazardous_uns_id").val(),
                            d = $("#tmp_hazardous_uns_code").val().toUpperCase(),
                            s = $("#tmp_hazardous_uns_desc").val().toUpperCase(),
                            e = $("#tmp_hazardous_uns_note").val().toUpperCase(),
                            n = $("#hazardous-details"),
                            t = n.find("tbody"),
                            p = $("<tr id=" + (0==l? _ : l) + ">");
                    p.append(createTableContent('hazardous_uns_id', (0==l? _ : l), true, c))
                            .append(createTableContent('hazardous_uns_line', c , true, c))
                            .append(createTableContent('hazardous_uns_code', d, false, c))
                            .append(createTableContent('hazardous_uns_desc', s, false, c))
                            .append(createTableContent('hazardous_uns_note', e, true, c))
                            .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNs'), $("#tmp_hazardous_uns_code").focus()
                }

            }),
            $('#hazardous-details').on('click', 'a.btn-danger', function() {
        $(this).closest('tr').remove()
    }), $("#hazardous-details").on("click", "a.btn-default", function() {
        removeEmptyNodes('hazardous-details');
        var t = $(this).closest("tr"),
                o = t[0].childNodes[0].textContent,
                r = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent,
                d = t[0].childNodes[4].textContent;
        $('#tmp_hazardous_uns_line').val(r), $("#tmp_hazardous_uns_id").val(o), $("#tmp_hazardous_uns_code").val(s), $("#tmp_hazardous_uns_desc").val(a), $("#tmp_hazardous_uns_note").val(d), $("#UNs").modal("show"), $("#tmp_hazardous_uns_code").focus()
    }),

            $("#container-save").click(function() {
                if($("#container_equipment_type_code").val() == ''){
                    show_alert();
                    $("#container_equipment_type_code").focus()
                }else{
                    var r = ($('#container_details tbody tr').length + 1),
                            _ =  ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                            l = $("#container_line").val(),
                            c = (0 == l ? _ : l)-1,
                            a = $("#container_equipment_type_code").val().toUpperCase(),
                            b = $("#container_equipment_type_id").val(),
                            d = $("#container_container").val().toUpperCase(),
                            s = $("#container_seal_number").val().toUpperCase(),
                            f = $("#container_comments").val().toUpperCase(),
                            n = $("#container_details"),
                            t = n.find("tbody"),
                            p = $("<tr id=" + (0==l? _: l) + ">");
                    p.append(createTableContent('container_line', (0==l? _: l) , true, c))
                            .append(createTableContent('container_equipment_type_code', a, false, c))
                            .append(createTableContent('container_equipment_type_id', b, true, c))
                            .append(createTableContent('container_number', d, false, c))
                            .append(createTableContent('container_seal_number', s, false, c))
                            .append(createTableContent('container_remarks', f, false, c))
                            .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                            cleanModalFields('Container_Details'),$("#container_equipment_type").focus()
                }
            }),
            $('#container_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#container_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('container_details');
                var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        a = t[0].childNodes[3].textContent,
                        u = t[0].childNodes[4].textContent,
                        v = t[0].childNodes[5].textContent;
                $('#container_line').val(o), $("#container_equipment_type_code").val(r), $("#container_equipment_type_id").val(s), $("#container_container").val(a), $("#container_seal_number").val(u),$("#container_comments").val(v), $("#Container_Details").modal("show"), $("#container_equipment_type_code").focus()
            }),

            $("#dr-details-save").click(function() {
              if($("#dr_pieces").val()==''){
                  show_alert();
                  $("#dr_pieces").focus()
              }else{
                  var r = ($('#dr_details tbody tr').length + 1),
                          _ =  ($("#dr_details tbody tr").length == 0 ? 1 : parseInt($("#dr_details tbody tr")[$("#dr_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                          l = $("#dr_line").val(),
                          c = (0 == l ? _ : l)-1,
                          d1 = $("#dr_cargo_marks").val().toUpperCase(),
                          d2 = $("#dr_cargo_pieces").val(),
                          d3 = $("#dr_cargo_description").val().toUpperCase(),
                          d4 = $("#dr_cargo_container").val().toUpperCase(),
                          d5 = $("#cargo_commodity_id").val(),
                          d6 = $("#cargo_commodity_name").val().toUpperCase(),
                          d7 = $("#dr_cargo_weight_metric").val(),
                          d8 = $("#dr_cargo_grossw").val(),
                          d9 = $("#dr_cargo_cubic").val(),
                          d10 = $("#dr_cargo_chgrw").val(),
                          d11 = $("#dr_cargo_rate").val(),
                          d12 = $("#dr_cargo_amount").val(),
                          d13 = $("#dr_cargo_comments").val().toUpperCase(),
                          n = $("#dr_details"),
                          t = n.find("tbody"),
                          p = $("<tr id=" + (0==l? _ : l) + ">");
                  p.append(createTableContent('dr_line', (0==l? _ : l) , true, c))
                          .append(createTableContent('dr_cargo_marks', d1, false, c))
                          .append(createTableContent('dr_cargo_pieces', d2, false, c))
                          .append(createTableContent('dr_cargo_description', d3, false, c))
                          .append(createTableContent('dr_cargo_container', d4, true, c))
                          .append(createTableContent('dr_cargo_commodity_id', d5, true, c))
                          .append(createTableContent('dr_cargo_commodity_name', d6, true, c))
                          .append(createTableContent('dr_cargo_weight_metric', d7, false, c))
                          .append(createTableContent('dr_cargo_grossw', d8, false, c))
                          .append(createTableContent('dr_cargo_cubic', d9, false, c))
                          .append(createTableContent('dr_cargo_chgrw', d10, false, c))
                          .append(createTableContent('dr_cargo_rate', d11, true, c))
                          .append(createTableContent('dr_cargo_amount', d12, true, c))
                          .append(createTableContent('dr_cargo_comments', d13, true, c))
                          .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                          cleanModalFields('DR_Details'),$("#dr_cargo_pieces").focus()
              }
            }),
            $('#dr_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#dr_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('dr_details');
                var t = $(this).closest("tr"),
                        d1 = t[0].childNodes[0].textContent,
                        d2 = t[0].childNodes[1].textContent,
                        d3 = t[0].childNodes[2].textContent,
                        d4 = t[0].childNodes[3].textContent,
                        d5 = t[0].childNodes[4].textContent,
                        d6 = t[0].childNodes[5].textContent,
                        d7 = t[0].childNodes[6].textContent,
                        d8 = t[0].childNodes[7].textContent,
                        d9 = t[0].childNodes[8].textContent,
                        d10 = t[0].childNodes[9].textContent,
                        d11 = t[0].childNodes[10].textContent,
                        d12 = t[0].childNodes[11].textContent,
                        d13 = t[0].childNodes[12].textContent,
                        d14 = t[0].childNodes[13].textContent;
                        $('#dr_line').val(d1),
                                $("#dr_cargo_marks").val(d2),
                                $("#dr_cargo_pieces").val(d3),
                                $("#dr_cargo_description").val(d4),
                                $("#dr_cargo_container").val(d5),
                                $("#cargo_commodity_id").val(d6),
                                $("#cargo_commodity_name").val(d7),
                                $("#dr_cargo_weight_metric").val(d8),
                                $("#dr_cargo_grossw").val(d9),
                                $("#dr_cargo_cubic").val(d10),
                                $("#dr_cargo_chgrw").val(d11),
                                $("#dr_cargo_rate").val(d12),
                                $("#dr_cargo_amount").val(d13),
                                $("#dr_cargo_comments").val(d14),
                                $("#DR_Details").modal("show"), $("#dr_cargo_pieces").focus()
            }),

    $("#item-save").click(function() {
        var r = ($('#items_details tbody tr').length + 1),
                _ =  ($("#items_details tbody tr").length == 0 ? 1 : parseInt($("#items_details tbody tr")[$("#items_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                l = $("#item_line").val(),
                c = (0 == l ? _ : l)-1,
                i1 = $("#item_pieces").val().toUpperCase(),
                i2 = $("#item_item_name").val().toUpperCase(),
                i3 = $("#item_unit_weight").val().toUpperCase(),
                i4 = $("#item_brand").val().toUpperCase(),
                i5 = $("#item_vendor_name").val().toUpperCase(),
                i6 = $("#item_origin").val().toUpperCase(),
                i7 = $("#item_exp_date").val(),
                i8 = $("#item_item_id").val().toUpperCase(),
                i9 = $("#item_vendor_code").val().toUpperCase(),

                n = $("#items_details"),
                t = n.find("tbody"),
                p = $("<tr id=" + (0==l? _ : l) + ">");
        p.append(createTableContent('item_line', (0==l? _ : l) , true, c))

                .append(createTableContent('item_pieces', i1, true, c))
                .append(createTableContent('item_item_name', i2, false, c))
                .append(createTableContent('item_unit_weight', i3, true, c))
                .append(createTableContent('item_brand', i4, true, c))
                .append(createTableContent('item_vendor_name', i5, false, c))
                .append(createTableContent('item_origin', i6, false, c))
                .append(createTableContent('item_exp_date', i7, false, c))
                .append(createTableContent('item_item_id', i8, true, c))
                .append(createTableContent('item_vendor_code', i9, true, c))
                .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                cleanModalFields('ItemModal'),$("#item_pieces").focus()
    }),
            $('#items_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#items_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('items_details');
                var t = $(this).closest("tr"),
                        i1 = t[0].childNodes[0].textContent,
                        i2 = t[0].childNodes[1].textContent,
                        i3 = t[0].childNodes[2].textContent,
                        i4 = t[0].childNodes[3].textContent,
                        i5 = t[0].childNodes[4].textContent,
                        i6 = t[0].childNodes[5].textContent,
                        i7 = t[0].childNodes[6].textContent,
                        i8 = t[0].childNodes[7].textContent,
                        i9 = t[0].childNodes[8].textContent,
                        i10 = t[0].childNodes[9].textContent;
                $('#item_line').val(i1),
                        $("#item_pieces").val(i2),
                        $("#item_item_name").val(i3),
                        $("#item_unit_weight").val(i4),
                        $("#item_brand").val(i5),
                        $("#item_vendor_name").val(i6),
                        $("#item_origin").val(i7),
                        $("#item_exp_date").val(i8),
                        $("#item_item_id").val(i9),
                        $("#item_vendor_code").val(i10),
                        $("#ItemModal").modal("show"), $("#item_pieces").focus()
            }),

    $("#charges-save").click(function() {
        if($("#billing_billing_code").val()==''){
            show_alert();
            $("#billing_billing_code").focus();
        }else{
            var t = $("#charge_details tbody tr").length + 1,
                    _ =  ($("#charge_details tbody tr").length == 0 ? 1 : parseInt($("#charge_details tbody tr")[$("#charge_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    charge_id = $("#charge_id").val(),
                    d= (0== charge_id? _ : charge_id)-1,
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

                    b = $("#charge_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");


            C.append(createTableContent('charge_id', (0== charge_id? _ : charge_id) , true,d))
                    .append(createTableContent('billing_billing_id', g_1, true, d))
                    .append(createTableContent('billing_billing_code', g_2, false, d))
                    .append(createTableContent('billing_billing_description', g_3, false, d))
                    .append(createTableContent('billing_bill_type', g_4, false, d))
                    .append(createTableContent('billing_bill_party', g_5, false, d))
                    .append(createTableContent('billing_quantity', g_7, false, d))
                    .append(createTableContent('billing_rate', g_11, false, d))
                    .append(createTableContent('billing_amount', g_12, false, d))
                    .append(createTableContent('billing_currency_type', g_13, true, d))
                    .append(createTableContent('billing_customer_name', g_16, false, d))
                    .append(createTableContent('cost_amount', g_21, false, d))
                    .append(createTableContent('cost_currency_type', g_22, true, d))
                    .append(createTableContent('cost_invoice', g_27, false, d))
                    .append(createTableContent('cost_reference', g_29, false, d))


                    .append(createTableContent('billing_notes', g_6, true, d))
                    .append(createTableContent('billing_unit_id', g_8, true, d))
                    .append(createTableContent('billing_unit_name', g_9, true, d))
                    .append(createTableContent('billing_exchange_rate', g_14, true, d))
                    .append(createTableContent('billing_customer_id', g_15, true, d))
                    .append(createTableContent('cost_quantity', g_17, true, d))
                    .append(createTableContent('cost_unit_id', g_18, true, d))
                    .append(createTableContent('cost_unit_name', g_19, true, d))
                    .append(createTableContent('cost_rate', g_20, true, d))
                    .append(createTableContent('cost_cost_center', g_28, false, d))
                    .append(createTableContent('cost_exchange_rate', g_23, true, d))
                    .append(createTableContent('billing_vendor_code', g_24, true, d))
                    .append(createTableContent('billing_vendor_name', g_25, true, d))
                    .append(createTableContent('cost_date', g_26, true, d))
                    .append(createTableContent('billing_increase', g_10, true, d))

                    .append(createTableBtns()),

                    0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C),values_charges(), $("#Charge_Details").modal("hide"), $("#billing_billing_code").focus()
        }

    }), $("#charge_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
                values_charges()
    }), $("#charge_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('charge_details');
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

        $("#charge_id").val(g1),
        $("#billing_billing_id").val(g2),
        $("#billing_billing_code").val(g3),
        $("#billing_billing_description").val(g4),
        $("#billing_bill_type").val(g5),
        $("#billing_bill_party").val(g6),
        $("#billing_quantity").val(g7),
        $("#billing_rate").val(g8),
        $("#billing_amount").val(g9),
        $("#billing_currency_type").val(g10),
        $("#billing_customer_name").val(g11),
        $("#cost_amount").val(g12),
        $("#cost_currency_type").val(g13),
        $("#cost_invoice").val(g14),
        $("#cost_reference").val(g15),

                $("#billing_notes").val(g16),
                $("#billing_unit_id").val(g17),
                $("#billing_unit_name").val(g18),
                $("#billing_exchange_rate").val(g19),
                $("#billing_customer_id").val(g20),
                $("#cost_quantity").val(g21),
                $("#cost_unit_id").val(g22),
                $("#cost_unit_name").val(g23),
                $("#cost_rate").val(g24),
                $("#cost_cost_center").val(g25),
                $("#cost_exchange_rate").val(g26),
                $("#billing_vendor_code").val(g27),
                $("#billing_vendor_name").val(g28),
                $("#cost_date").val(g29),
                $("#billing_increase").val(g30),

                $("#Charge_Details").modal("show"), $("#billing_billing_code").focus()
    }),

            $("#transportation-save").click(function() {
                if($("#transportation_billing_code").val()== '' || $("#transportation_carrier_name").val() == '' || $("#transportation_amount").val()=='' || $("#transportation_loading_reference").val()==''){
                    show_alert();
                    $("#transportation_billing_code").focus();
                }else{
                    var t = $("#transportation_details tbody tr").length + 1,
                            _ =  ($("#transportation_details tbody tr").length == 0 ? 1 : parseInt($("#transportation_details tbody tr")[$("#transportation_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                            transportation_id = $("#transportation_id").val(),
                            d= (0==transportation_id? _ : transportation_id)-1,
                            g_1 = $("#transportation_leg").val(),
                            g_2 = $("#transportation_mode").val(),
                            g_3 = $("#transportation_billing_id").val(),
                            g_4 = $("#transportation_billing_code").val(),
                            g_5 = $("#transportation_description").val(),
                            g_6 = $("#transportation_amount").val(),
                            g_7 = $("#transportation_leg_status").val(),
                            g_8 = $("#transportation_service_id").val(),
                            g_9 = $("#transportation_service_name").val(),
                            g_10 = $("#transportation_carrier_id").val(),
                            g_11 = $("#transportation_carrier_name").val(),
                            g_12 = $("#transportation_notify").val(),
                            g_13 = $("#transportation_loading_location_id").val(),
                            g_14 = $("#transportation_loading_location_name").val(),
                            g_15 = $("#transportation_loading_reference").val(),
                            g_16 = $("#transportation_ETD_date").val(),
                            g_17 = $("#transportation_unloading_location_id").val(),
                            g_18 = $("#transportation_unloading_location_name").val(),
                            g_19 = $("#transportation_unloading_reference").val(),
                            g_20 = $("#transportation_ETA_date").val(),
                            g_21 = $("#origin_from_type").val(),
                            g_22 = $("#origin_from_shipper_id").val(),
                            g_23 = $("#origin_from_shipper_name").val(),
                            g_24 = $("#origin_from_address").val(),
                            g_25 = $("#origin_from_city").val(),
                            g_26 = $("#origin_from_state_id").val(),
                            g_27 = $("#origin_from_state_name").val(),
                            g_28 = $("#origin_from_country_id").val(),
                            g_29 = $("#origin_from_country_name").val(),
                            g_30 = $("#origin_from_zip_code_id").val(),
                            g_31 = $("#origin_from_zip_code_code").val(),
                            g_32 = $("#origin_from_contact").val(),
                            g_33 = $("#origin_from_phone").val(),
                            g_34 = $("#origin_from_fax").val(),
                            g_35 = $("#origin_to_type").val(),
                            g_36 = $("#origin_to_consignee_id").val(),
                            g_37 = $("#origin_to_consignee_name").val(),
                            g_38 = $("#origin_to_address").val(),
                            g_39 = $("#origin_to_city").val(),
                            g_40 = $("#origin_to_state_id").val(),
                            g_41 = $("#origin_to_state_name").val(),
                            g_42 = $("#origin_to_country_id").val(),
                            g_43 = $("#origin_to_country_name").val(),
                            g_44 = $("#origin_to_zip_code_id").val(),
                            g_45 = $("#origin_to_zip_code_code").val(),
                            g_46 = $("#origin_to_contact").val(),
                            g_47 = $("#origin_to_phone").val(),
                            g_48 = $("#origin_to_fax").val(),

                            b = $("#transportation_details"),
                            x = b.find("tbody"),
                            C = $("<tr id=" + (0==transportation_id? _ : transportation_id)+ ">");

                    C.append(createTableContent('transportation_id', (0==transportation_id? _ : transportation_id), true,d))
                            .append(createTableContent('transportation_leg', g_1, false, d))
                            .append(createTableContent('transportation_mode', g_2, false, d))
                            .append(createTableContent('transportation_carrier_id', g_10, true, d))
                            .append(createTableContent('transportation_carrier_name', g_11, false, d))
                            .append(createTableContent('transportation_loading_location_id', g_13, true, d))
                            .append(createTableContent('transportation_loading_location_name', g_14, false, d))
                            .append(createTableContent('transportation_unloading_location_id', g_17, true, d))
                            .append(createTableContent('transportation_unloading_location_name', g_18, false, d))
                            .append(createTableContent('transportation_ETD_date', g_16, false, d))
                            .append(createTableContent('transportation_ETA_date', g_20, false, d))
                            .append(createTableContent('transportation_leg_status', g_7, false, d))
                            .append(createTableContent('transportation_amount', g_6, false, d))

                            .append(createTableContent('transportation_billing_id', g_3, true, d))
                            .append(createTableContent('transportation_billing_code', g_4, true, d))
                            .append(createTableContent('transportation_description', g_5, true, d))
                            .append(createTableContent('transportation_service_id', g_8, true, d))
                            .append(createTableContent('transportation_service_name', g_9, true, d))
                            .append(createTableContent('transportation_notify', g_12, true, d))
                            .append(createTableContent('transportation_loading_reference', g_15, true, d))
                            .append(createTableContent('transportation_unloading_reference', g_19, true, d))
                            .append(createTableContent('origin_from_type', g_21, true, d))
                            .append(createTableContent('origin_from_shipper_id', g_22, true, d))
                            .append(createTableContent('origin_from_shipper_name', g_23, true, d))
                            .append(createTableContent('origin_from_address', g_24, true, d))
                            .append(createTableContent('origin_from_city', g_25, true, d))
                            .append(createTableContent('origin_from_state_id', g_26, true, d))
                            .append(createTableContent('origin_from_state_name', g_27, true, d))
                            .append(createTableContent('origin_from_country_id', g_28, true, d))
                            .append(createTableContent('origin_from_country_name', g_29, true, d))
                            .append(createTableContent('origin_from_zip_code_id', g_30, true, d))
                            .append(createTableContent('origin_from_zip_code_code', g_31, true, d))
                            .append(createTableContent('origin_from_contact', g_32, true, d))
                            .append(createTableContent('origin_from_phone', g_33, true, d))
                            .append(createTableContent('origin_from_fax', g_34, true, d))
                            .append(createTableContent('origin_to_type', g_35, true, d))
                            .append(createTableContent('origin_to_consignee_id', g_36, true, d))
                            .append(createTableContent('origin_to_consignee_name', g_37, true, d))
                            .append(createTableContent('origin_to_address', g_38, true, d))
                            .append(createTableContent('origin_to_city', g_39, true, d))
                            .append(createTableContent('origin_to_state_id', g_40, true, d))
                            .append(createTableContent('origin_to_state_name', g_41, true, d))
                            .append(createTableContent('origin_to_country_id', g_42, true, d))
                            .append(createTableContent('origin_to_country_name', g_43, true, d))
                            .append(createTableContent('origin_to_zip_code_id', g_44, true, d))
                            .append(createTableContent('origin_to_zip_code_code', g_45, true, d))
                            .append(createTableContent('origin_to_contact', g_46, true, d))
                            .append(createTableContent('origin_to_phone', g_47, true, d))
                            .append(createTableContent('origin_to_fax', g_48, true, d))
                            .append(createTableBtns()), 0 == transportation_id ? x.append(C) : x.find("tr#" + transportation_id).replaceWith(C),transportation_plan(), $("#Transportation_Details").modal("hide"), $("#transportation_leg").focus()
                }

            }), $("#transportation_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
        transportation_plan()
    }), $("#transportation_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('transportation_details');
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
                g30 = t[0].childNodes[29].textContent,
                g31 = t[0].childNodes[30].textContent,
                g32 = t[0].childNodes[31].textContent,
                g33 = t[0].childNodes[32].textContent,
                g34 = t[0].childNodes[33].textContent,
                g35 = t[0].childNodes[34].textContent,
                g36 = t[0].childNodes[35].textContent,
                g37 = t[0].childNodes[36].textContent,
                g38 = t[0].childNodes[37].textContent,
                g39 = t[0].childNodes[38].textContent,
                g40 = t[0].childNodes[39].textContent,
                g41 = t[0].childNodes[40].textContent,
                g42 = t[0].childNodes[41].textContent,
                g43 = t[0].childNodes[42].textContent,
                g44 = t[0].childNodes[43].textContent,
                g45 = t[0].childNodes[44].textContent,
                g46 = t[0].childNodes[45].textContent,
                g47 = t[0].childNodes[46].textContent,
                g48 = t[0].childNodes[47].textContent,
                g49 = t[0].childNodes[48].textContent;


        $("#transportation_id").val(g1),
                $("#transportation_leg").val(g2),
                $("#transportation_mode").val(g3),
                $("#transportation_carrier_id").val(g4),
                $("#transportation_carrier_name").val(g5),
                $("#transportation_loading_location_id").val(g6),
                $("#transportation_loading_location_name").val(g7),
                $("#transportation_unloading_location_id").val(g8),
                $("#transportation_unloading_location_name").val(g9),
                $("#transportation_ETD_date").val(g10),
                $("#transportation_ETA_date").val(g11),
                $("#transportation_leg_status").val(g12),
                $("#transportation_amount").val(g13),

                $("#transportation_billing_id").val(g14),
                $("#transportation_billing_code").val(g15),
                $("#transportation_description").val(g16),
                $("#transportation_service_id").val(g17),
                $("#transportation_service_name").val(g18),
                $("#transportation_notify").val(g19),
                $("#transportation_loading_reference").val(g20),
                $("#transportation_unloading_reference").val(g21),
                $("#origin_from_type").val(g22),
                $("#origin_from_shipper_id").val(g23),
                $("#origin_from_shipper_name").val(g24),
                $("#origin_from_address").val(g25),
                $("#origin_from_city").val(g26),
                $("#origin_from_state_id").val(g27),
                $("#origin_from_state_name").val(g28),
                $("#origin_from_country_id").val(g29),
                $("#origin_from_country_name").val(g30),
                $("#origin_from_zip_code_id").val(g31),
                $("#origin_from_zip_code_code").val(g32),
                $("#origin_from_contact").val(g33),
                $("#origin_from_phone").val(g34),
                $("#origin_from_fax").val(g35),
                $("#origin_to_type").val(g36),
                $("#origin_to_consignee_id").val(g37),
                $("#origin_to_consignee_name").val(g38),
                $("#origin_to_address").val(g39),
                $("#origin_to_city").val(g40),
                $("#origin_to_state_id").val(g41),
                $("#origin_to_state_name").val(g42),
                $("#origin_to_country_id").val(g43),
                $("#origin_to_country_name").val(g44),
                $("#origin_to_zip_code_id").val(g45),
                $("#origin_to_zip_code_code").val(g46),
                $("#origin_to_contact").val(g47),
                $("#origin_to_phone").val(g48),
                $("#origin_to_fax").val(g49),
        $("#Transportation_Details").modal("show"), $("#transportation_leg").focus()
    }),


            $("#cargo-warehouse-save").click(function() {
                var r = ($('#warehouse_details tbody tr').length + 1),
                        _ =  ($("#warehouse_details tbody tr").length == 0 ? 1 : parseInt($("#warehouse_details tbody tr")[$("#warehouse_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                        l = $("#cargo_id").val(),
                        c = (0==l? _ : l)-1,
                        g1 = $("#cargo_quantity").val().toUpperCase(),
                        g2 = $("#cargo_cargo_type_id").val(),
                        g3 = $("#cargo_cargo_type_code").val(),
                        g4 = $("#cargo_length").val(),
                        g5 = $("#cargo_width").val(),
                        g6 = $("#cargo_height").val(),
                        g7 = $("#cargo_total_weight").val(),
                        g8 = $("#cargo_net_weight").val(),
                        g9 = $("#cargo_weight_unit_measurement_id").val(),
                        g10 = $("#cargo_cubic").val(),
                        g11 = $("#part_info_po_number").val(),

                        g12 = $("#cargo_volume_weight").val(),
                        g13 = $("#cargo_metric_unit_measurement_id").val(),
                        g14 = $("#cargo_material").val().toUpperCase(),
                        g15 = $("#cargo_pieces").val(),
                        g16 = $("#cargo_unit_weight").val(),
                        g17 = $("#cargo_dim_fact").val(),
                        g18 = $("#cargo_location_id").val(),
                        g19 = $("#cargo_location_name").val().toUpperCase(),
                        g20 = $("#cargo_location_bin_id").val(),
                        g21 = $("#cargo_location_bin_name").val().toUpperCase(),
                        g22 = $("#cargo_tare_weight").val(),
                        g23 = $("#cargo_square_foot").val(),

                        pi1= $("#part_info_serial_number").val(),
                        pi2= $("#part_info_barcode").val(),
                        pi3= $("#part_info_Model").val(),
                        pi4= $("#part_info_commodity_id").val(),
                        pi5= $("#part_info_commodity_name").val(),
                        pi6= $("#part_info_pro_number").val(),
                        pi7= $("#part_info_project").val(),
                        pi8= $("#part_info_inv_number").val(),
                        pi9= $("#part_info_lot_number").val(),
                        pi10= $("#part_info_sku_number").val(),
                        pi11= $("#part_info_destination_point").val(),
                        pi12= $("#part_info_attention").val(),

                        eei1= $("#eei_info_scheduleb_id").val(),
                        eei2= $("#eei_info_scheduleb_code").val(),
                        eei3= $("#eei_info_scheduleb_description").val(),
                        eei4= $("#eei_info_hts_id").val(),
                        eei5= $("#eei_info_hts_name").val(),
                        eei6= $("#eei_info_hts_description").val(),
                        eei7= $("#eei_info_value").val(),
                        eei8= $("#eei_info_eccn").val(),
                        eei9= $("#eei_info_export_id").val(),
                        eei10= $("#eei_info_export_code").val(),
                        eei11= $("#eei_info_license_type_id").val(),
                        eei12= $("#eei_info_license_type_code").val(),
                        eei13= $("#eei_info_origin").val(),

                        hzd1=$("#hazardous_proper_shipping_name").val(),
                        hzd2=$("#hazardous_un_id").val(),
                        hzd3=$("#hazardous_un_code").val(),
                        hzd4=$("#hazardous_un_description").val(),
                        hzd5=$("#hazardous_class_id").val(),
                        hzd6=$("#hazardous_class_description").val(),
                        hzd7=$("#hazardous_packing_group").val(),
                        hzd8=$("#hazardous_flash_point").val(),
                        hzd9=$("#hazardous_flashing_point_type").val(),
                        hzd10=$("#hazardous_special_instructions").val(),
                        hzd11=$("#hazardous_units").val(),
                        hzd12=$("#hazardous_material_page").val(),
                        hzd13=$("#hazardous_quantity").val(),
                        hzd14=$("#hazardous_label_required").val(),
                        hzd15=$("#hazardous_emergency_contact").val(),
                        hzd16=$("#hazardous_emergency_contact_phone").val(),

                        ref1=$("#reference_vendor_code").val(),
                        ref2=$("#reference_vendor_name").val(),
                        ref3=$("#reference_final_dest").val(),
                        ref4=$("#reference_customer_reference").val(),

                        shp1=$("#shipping_type").val(),
                        shp2=$("#shipping_date_in").val(),
                        shp3=$("#shipping_date_out").val(),
                        shp4=$("#user_id").val(),
                        shp5=$("#shipping_reference").val(),
                        shp6=$("#shipping_file").val(),

                        oth1=$("#other_vendor_delivery").val(),
                        oth2=$("#other_shipping_date").val(),
                        oth3=$("#other_department_id").val(),
                        oth4=$("#other_department_name").val(),
                        oth5=$("#other_from_system").val(),
                        oth6=$("#other_concession").val(),
                        oth7=$("#other_ultimate_consignee_id").val(),
                        oth8=$("#other_ultimate_consignee_name").val(),

                        comm=$("#comments_comment").val(),

                        n = $("#warehouse_details"),
                        t = n.find("tbody"),
                        p = $("<tr id=" + (0==l? _ : l) + ">");
                /* Items details*/

                p.append(createTableContent('cargo_line', (0==l? _ : l) , true, c))
                        .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                        .append(createTableContent('cargo_quantity', g1, false, c))
                        .append(createTableContent('cargo_type_id', g2, true, c))
                        .append(createTableContent('cargo_type_code', g3, false, c))
                        .append(createTableContent('cargo_length', g4, false, c))
                        .append(createTableContent('cargo_width', g5, false, c))
                        .append(createTableContent('cargo_height', g6, false, c))
                        .append(createTableContent('cargo_total_weight', g7, false, c))
                        .append(createTableContent('cargo_net_weight', g8, false, c))
                        .append(createTableContent('cargo_weight_unit_measurement_id', g9, false, c))
                        .append(createTableContent('cargo_cubic', g10, false, c))

                        /*GENERAL */
                        .append(createTableContent('part_info_po_number', g11, false, c))
                        .append(createTableContent('cargo_volume_weight', g12, true, c))
                        .append(createTableContent('cargo_metric_unit_measurement_id', g13, true, c))
                        .append(createTableContent('cargo_material_description', g14, true, c))
                        .append(createTableContent('cargo_pieces', g15, true, c))
                        .append(createTableContent('cargo_unit_weight', g16, true, c))
                        .append(createTableContent('cargo_dim_fact', g17, true, c))
                        .append(createTableContent('cargo_location_id', g18, true, c))
                        .append(createTableContent('cargo_location_name', g19, true, c))
                        .append(createTableContent('cargo_location_bin_id', g20, true, c))
                        .append(createTableContent('cargo_location_bin_name', g21, true, c))
                        .append(createTableContent('cargo_tare_weight', g22, true, c))
                        .append(createTableContent('cargo_square_foot', g23, true, c))
                                /*PART INFO */
                        .append(createTableContent('part_info_serial_number', pi1, true, c))
                        .append(createTableContent('part_info_barcode', pi2, true, c))
                        .append(createTableContent('part_info_Model', pi3, true, c))
                        .append(createTableContent('part_info_commodity_id', pi4, true, c))
                        .append(createTableContent('part_info_commodity_name', pi5, true, c))
                        .append(createTableContent('part_info_pro_number', pi6, true, c))
                        .append(createTableContent('part_info_project', pi7, true, c))
                        .append(createTableContent('part_info_inv_number', pi8, true, c))
                        .append(createTableContent('part_info_lot_number', pi9, true, c))
                        .append(createTableContent('part_info_sku_number', pi10, true, c))
                        .append(createTableContent('part_info_destination_point', pi11, true, c))
                        .append(createTableContent('part_info_attention', pi12, true, c))
                                /*EEI INFO*/
                        .append(createTableContent('eei_info_scheduleb_id', eei1, true, c))
                        .append(createTableContent('eei_info_scheduleb_code', eei2, true, c))
                        .append(createTableContent('eei_info_scheduleb_description', eei3, true, c))
                        .append(createTableContent('eei_info_hts_id', eei4, true, c))
                        .append(createTableContent('eei_info_hts_name', eei5, true, c))
                        .append(createTableContent('eei_info_hts_description', eei6, true, c))
                        .append(createTableContent('eei_info_value', eei7, true, c))
                        .append(createTableContent('eei_info_eccn', eei8, true, c))
                        .append(createTableContent('eei_info_export_id', eei9, true, c))
                        .append(createTableContent('eei_info_export_code', eei10, true, c))
                        .append(createTableContent('eei_info_license_type_id', eei11, true, c))
                        .append(createTableContent('eei_info_license_type_code', eei12, true, c))
                        .append(createTableContent('eei_info_origin', eei13, true, c))
                                /* HAZARDOUS */
                        .append(createTableContent('hazardous_proper_shipping_name', hzd1, true, c))
                        .append(createTableContent('hazardous_un_id', hzd2, true, c))
                        .append(createTableContent('hazardous_un_code', hzd3, true, c))
                        .append(createTableContent('hazardous_un_description', hzd4, true, c))
                        .append(createTableContent('hazardous_class_id', hzd5, true, c))
                        .append(createTableContent('hazardous_class_description', hzd6, true, c))
                        .append(createTableContent('hazardous_packing_group', hzd7, true, c))
                        .append(createTableContent('hazardous_flash_point', hzd8, true, c))
                        .append(createTableContent('hazardous_flashing_point_type', hzd9, true, c))
                        .append(createTableContent('hazardous_special_instructions', hzd10, true, c))
                        .append(createTableContent('hazardous_units', hzd11, true, c))
                        .append(createTableContent('hazardous_material_page', hzd12, true, c))
                        .append(createTableContent('hazardous_quantity', hzd13, true, c))
                        .append(createTableContent('hazardous_label_required', hzd14, true, c))
                        .append(createTableContent('hazardous_emergency_contact', hzd15, true, c))
                        .append(createTableContent('hazardous_emergency_contact_phone', hzd16, true, c))
                                /*REFERENCE*/
                        .append(createTableContent('reference_vendor_code', ref1, true, c))
                        .append(createTableContent('reference_vendor_name', ref2, true, c))
                        .append(createTableContent('reference_final_dest', ref3, true, c))
                        .append(createTableContent('reference_customer_reference', ref4, true, c))
                                /* SHIPPING REFERENCE*/
                        .append(createTableContent('shipping_type', shp1, true, c))
                        .append(createTableContent('shipping_date_in', shp2, true, c))
                        .append(createTableContent('shipping_date_out', shp3, true, c))
                        .append(createTableContent('user_id', shp4, true, c))
                        .append(createTableContent('shipping_reference', shp5, true, c))
                        .append(createTableContent('shipping_file', shp6, true, c))
                                    /* OTHER REFERENCE */
                        .append(createTableContent('other_vendor_delivery', oth1, true, c))
                        .append(createTableContent('other_shipping_date', oth2, true, c))
                        .append(createTableContent('other_department_id', oth3, true, c))
                        .append(createTableContent('other_department_name', oth4, true, c))
                        .append(createTableContent('other_from_system', oth5, true, c))
                        .append(createTableContent('other_concession', oth6, true, c))
                        .append(createTableContent('other_ultimate_consignee_id', oth7, true, c))
                        .append(createTableContent('other_ultimate_consignee_name', oth8, true, c))

                        .append(createTableContent('comments_comment', comm, true, c))

                        /* VEHICLE DETAILS */
                        .append(createTableContent('vehicle_vin', '', true, c))
                        .append(createTableContent('vehicle_type', '', true, c))
                        .append(createTableContent('vehicle_color', '', true, c))
                        .append(createTableContent('vehicle_year', '', true, c))
                        .append(createTableContent('vehicle_condition', '', true, c))
                        .append(createTableContent('vehicle_make', '', true, c))
                        .append(createTableContent('vehicle_keys', '', true, c))
                        .append(createTableContent('vehicle_model', '', true, c))
                        .append(createTableContent('vehicle_running', '', true, c))
                        .append(createTableContent('vehicle_trim', '', true, c))
                        .append(createTableContent('vehicle_mileage', '', true, c))
                        .append(createTableContent('vehicle_engine', '', true, c))
                        .append(createTableContent('vehicle_tag', '', true, c))
                        .append(createTableContent('vehicle_body', '', true, c))
                        .append(createTableContent('vehicle_other', '', true, c))
                        .append(createTableContent('vehicle_number', '', true, c))
                        .append(createTableContent('vehicle_state_province_id', '', true, c))
                        .append(createTableContent('vehicle_state_province_name', '', true, c))
                        .append(createTableContent('vehicle_received', '', true, c))
                        .append(createTableContent('vehicle_inspection_number', '', true, c))
                        .append(createTableContent('vehicle_inspection_date', '', true, c))
                        .append(createTableContent('vehicle_inspection_by', '', true, c))
                        .append(createTableContent('vehicle_lot_number', '', true, c))
                        .append(createTableContent('vehicle_buyer_number', '', true, c))
                        .append(createTableContent('type_package', '0' , true, c))

                        .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),values_warehouse(),cleanModalFields('cargo-warehouse'), $("#cargo_quantity").focus();


             var id_row =  (0== l? _ : l);
              $("#items_warehouse_details tbody [data-id='" + id_row + "']").remove();

                //===================
                n = $("#items_warehouse_details"),
                t = n.find("tbody");
                var tr=  $("#items_details tbody tr"),
                    tr_1= $("#items_warehouse_details tbody tr");
                var l_1 = $("#item_line").val();
                var  r_1= tr.length;
                var count =tr_1.length + 1;
                for(var a =0; a< r_1 ; a++){
                    var  p_1=  $("<tr data-id=" + id_row + ">");
                        p_1.append(createTableContent('cargo_whr_id', id_row , true, count))
                                .append(createTableContent('item_whr_line',tr[a].childNodes[0].textContent, true, count))
                                .append(createTableContent('item_whr_pieces', tr[a].childNodes[1].textContent, true, count))
                                .append(createTableContent('item_whr_item_name', tr[a].childNodes[2].textContent, true, count))
                                .append(createTableContent('item_whr_unit_weight', tr[a].childNodes[3].textContent, true, count))
                                .append(createTableContent('item_whr_brand', tr[a].childNodes[4].textContent, true, count))
                                .append(createTableContent('item_whr_vendor_name', tr[a].childNodes[5].textContent, true, count))
                                .append(createTableContent('item_whr_origin', tr[a].childNodes[6].textContent, true, count))
                                .append(createTableContent('item_whr_exp_date', tr[a].childNodes[7].textContent, true, count))
                                .append(createTableContent('item_whr_item_id', tr[a].childNodes[8].textContent, true, count))
                                .append(createTableContent('item_whr_vendor_code', tr[a].childNodes[9].textContent, true, count))
                                ,t.append(p_1);
                    count =count + 1 ;

                  }
                clearTable('items_details');

                //===================
            }),
            $('#warehouse_details').on('click', 'a.btn-danger', function() {
                //==========================
                var id_row = $(this).closest('tr').attr('id');
                $("#items_warehouse_details tbody [data-id='" + id_row + "']").remove();
                $(this).closest('tr').remove();
                values_warehouse();

            }),

            $("#warehouse_details").on("click", "a.btn-default", function() {
                cleanModalFields('cargo-warehouse');
                removeEmptyNodes('warehouse_details');
                removeEmptyNodes('items_warehouse_details');
                var t = $(this).closest("tr"),
                        g1 = t[0].childNodes[0].textContent,
                        g2 = t[0].childNodes[2].textContent,
                        g3 = t[0].childNodes[3].textContent,
                        g4 = t[0].childNodes[4].textContent,
                        g5 = t[0].childNodes[5].textContent,
                        g6 = t[0].childNodes[6].textContent,
                        g7 = t[0].childNodes[7].textContent,
                        g8 = t[0].childNodes[8].textContent,
                        g9 = t[0].childNodes[9].textContent,
                        g10 = t[0].childNodes[10].textContent,
                        g11 = t[0].childNodes[11].textContent,

                        g12 = t[0].childNodes[12].textContent,
                        g13 = t[0].childNodes[13].textContent,
                        g14 = t[0].childNodes[14].textContent,
                        g15 = t[0].childNodes[15].textContent,
                        g16 = t[0].childNodes[16].textContent,
                        g17 = t[0].childNodes[17].textContent,
                        g18 = t[0].childNodes[18].textContent,
                        g19 = t[0].childNodes[19].textContent,
                        g20 = t[0].childNodes[20].textContent,
                        g21 = t[0].childNodes[21].textContent,
                        g22 = t[0].childNodes[22].textContent,
                        g23 = t[0].childNodes[23].textContent,
                        g24 = t[0].childNodes[24].textContent,

                        pi1 = t[0].childNodes[25].textContent,
                        pi2 = t[0].childNodes[26].textContent,
                        pi3 = t[0].childNodes[27].textContent,
                        pi4 = t[0].childNodes[28].textContent,
                        pi5 = t[0].childNodes[29].textContent,
                        pi6 = t[0].childNodes[30].textContent,
                        pi7 = t[0].childNodes[31].textContent,
                        pi8 = t[0].childNodes[32].textContent,
                        pi9 = t[0].childNodes[33].textContent,
                        pi10 = t[0].childNodes[34].textContent,
                        pi11 = t[0].childNodes[35].textContent,
                        pi12 = t[0].childNodes[36].textContent,

                        eei1 = t[0].childNodes[37].textContent,
                        eei2 = t[0].childNodes[38].textContent,
                        eei3 = t[0].childNodes[39].textContent,
                        eei4 = t[0].childNodes[40].textContent,
                        eei5 = t[0].childNodes[41].textContent,
                        eei6 = t[0].childNodes[42].textContent,
                        eei7 = t[0].childNodes[43].textContent,
                        eei8 = t[0].childNodes[44].textContent,
                        eei9 = t[0].childNodes[45].textContent,
                        eei10 = t[0].childNodes[46].textContent,
                        eei11 = t[0].childNodes[47].textContent,
                        eei12 = t[0].childNodes[48].textContent,
                        eei13 = t[0].childNodes[49].textContent,

                        hzd1 = t[0].childNodes[50].textContent,
                        hzd2 = t[0].childNodes[51].textContent,
                        hzd3 = t[0].childNodes[52].textContent,
                        hzd4 = t[0].childNodes[53].textContent,
                        hzd5 = t[0].childNodes[54].textContent,
                        hzd6 = t[0].childNodes[55].textContent,
                        hzd7 = t[0].childNodes[56].textContent,
                        hzd8 = t[0].childNodes[57].textContent,
                        hzd9 = t[0].childNodes[58].textContent,
                        hzd10 = t[0].childNodes[59].textContent,
                        hzd11 = t[0].childNodes[60].textContent,
                        hzd12 = t[0].childNodes[61].textContent,
                        hzd13 = t[0].childNodes[62].textContent,
                        hzd14 = t[0].childNodes[63].textContent,
                        hzd15 = t[0].childNodes[64].textContent,
                        hzd16 = t[0].childNodes[65].textContent,

                        ref1 = t[0].childNodes[66].textContent,
                        ref2 = t[0].childNodes[67].textContent,
                        ref3 = t[0].childNodes[68].textContent,
                        ref4 = t[0].childNodes[69].textContent,

                        shp1 = t[0].childNodes[70].textContent,
                        shp2 = t[0].childNodes[71].textContent,
                        shp3 = t[0].childNodes[72].textContent,
                        shp4 = t[0].childNodes[73].textContent,
                        shp5 = t[0].childNodes[74].textContent,
                        shp6 = t[0].childNodes[75].textContent,


                        oth1 = t[0].childNodes[76].textContent,
                        oth2 = t[0].childNodes[77].textContent,
                        oth3 = t[0].childNodes[78].textContent,
                        oth4 = t[0].childNodes[79].textContent,
                        oth5 = t[0].childNodes[80].textContent,
                        oth6 = t[0].childNodes[81].textContent,
                        oth7 = t[0].childNodes[82].textContent,
                        oth8 = t[0].childNodes[83].textContent,

                        comm = t[0].childNodes[84].textContent,
                        type= t[0].childNodes[109].textContent;


                //Items
                clearTable("items_details");
                var n = $("#items_details");
                        t = n.find("tbody");
                var tr=  $("#items_warehouse_details tbody tr");
                var tr_1=  $("#items_details tbody tr");
                var  r_1= tr.length;
                var c =1;

                for(var a =0; a< r_1 ; a++){
                    if( tr[a].childNodes[0].textContent == g1){
                        var  p_1=  $("<tr id=" + c + ">");
                        p_1.append(createTableContent('item_line',tr[a].childNodes[1].textContent, true, c))
                                .append(createTableContent('item_pieces', tr[a].childNodes[2].textContent, true, c))
                                .append(createTableContent('item_item_name', tr[a].childNodes[3].textContent, false, c))
                                .append(createTableContent('item_unit_weight', tr[a].childNodes[4].textContent, true, c))
                                .append(createTableContent('item_brand', tr[a].childNodes[5].textContent, true, c))
                                .append(createTableContent('item_vendor_name', tr[a].childNodes[6].textContent, false, c))
                                .append(createTableContent('item_origin', tr[a].childNodes[7].textContent, false, c))
                                .append(createTableContent('item_exp_date', tr[a].childNodes[8].textContent, false, c))
                                .append(createTableContent('item_item_id', tr[a].childNodes[9].textContent, true, c))
                                .append(createTableContent('item_vendor_code', tr[a].childNodes[10].textContent, true, c))
                                .append(createTableBtns()),t.append(p_1);

                    c = c+1;
                    }

                }


                $('#cargo_id').val(g1),
                        $("#cargo_quantity").val(g2),
                        $("#cargo_cargo_type_id").val(g3),
                        $("#cargo_cargo_type_code").val(g4),
                        $("#cargo_length").val(g5),
                        $("#cargo_width").val(g6),
                        $("#cargo_height").val(g7),
                        $("#cargo_total_weight").val(g8),
                        $("#cargo_net_weight").val(g9),
                        $("#cargo_weight_unit_measurement_id").val(g10),
                        $("#cargo_cubic").val(g11),
                        $("#part_info_po_number").val(g12),
                            /* GENERAL*/
                        $("#cargo_volume_weight").val(g13),
                        $("#cargo_metric_unit_measurement_id").val(g14),
                        $("#cargo_material").val(g15),
                        $("#cargo_pieces").val(g16),
                        $("#cargo_unit_weight").val(g17),
                        $("#cargo_dim_fact").val(g18),
                        $("#cargo_location_id").val(g19),
                        $("#cargo_location_name").val(g20),
                        $("#cargo_location_bin_id").val(g21),
                        $("#cargo_location_bin_name").val(g22),
                        $("#cargo_tare_weight").val(g23),
                        $("#cargo_square_foot").val(g24),
                            /*PART INFO*/
                        $("#part_info_serial_number").val(pi1),
                        $("#part_info_barcode").val(pi2),
                        $("#part_info_Model").val(pi3),
                        $("#part_info_commodity_id").val(pi4),
                        $("#part_info_commodity_name").val(pi5),
                        $("#part_info_pro_number").val(pi6),
                        $("#part_info_project").val(pi7),
                        $("#part_info_inv_number").val(pi8),
                        $("#part_info_lot_number").val(pi9),
                        $("#part_info_sku_number").val(pi10),
                        $("#part_info_destination_point").val(pi11),
                        $("#part_info_attention").val(pi12),
                            /*EEI INFO*/
                        $("#eei_info_scheduleb_id").val(eei1),
                        $("#eei_info_scheduleb_name").val(eei2),
                        $("#eei_info_scheduleb_description").val(eei3),
                        $("#eei_info_hts_id").val(eei4),
                        $("#eei_info_hts_name").val(eei5),
                        $("#eei_info_hts_description").val(eei6),
                        $("#eei_info_value").val(eei7),
                        $("#eei_info_eccn").val(eei8),
                        $("#eei_info_export_id").val(eei9),
                        $("#eei_info_export_code").val(eei10),
                        $("#eei_info_license_type_id").val(eei11),
                        $("#eei_info_license_type_code").val(eei12),
                        $("#eei_info_origin").val(eei13),
                            /*HAZARDOUS*/
                        $("#hazardous_proper_shipping_name").val(hzd1),
                        $("#hazardous_un_id").val(hzd2),
                        $("#hazardous_un_code").val(hzd3),
                        $("#hazardous_un_description").val(hzd4),
                        $("#hazardous_class_id").val(hzd5),
                        $("#hazardous_class_description").val(hzd6),
                        $("#hazardous_packing_group").val(hzd7),
                        $("#hazardous_flash_point").val(hzd8),
                        $("#hazardous_flashing_point_type").val(hzd9),
                        $("#hazardous_special_instructions").val(hzd10),
                        $("#hazardous_units").val(hzd11),
                        $("#hazardous_material_page").val(hzd12),
                        $("#hazardous_quantity").val(hzd13),
                        $("#hazardous_label_required").val(hzd14),
                        $("#hazardous_emergency_contact").val(hzd15),
                        $("#hazardous_emergency_contact_phone").val(hzd16),
                        /* REFERENCE */
                        $("#reference_vendor_code").val(ref1),
                        $("#reference_vendor_name").val(ref2),
                        $("#reference_final_dest").val(ref3),
                        $("#reference_customer_reference").val(ref4),
                                /*SHIPPING REF*/
                        $("#shipping_type").val(shp1),
                        $("#shipping_date_in").val(shp2),
                        $("#shipping_date_out").val(shp3),
                        $("#user_id").val(shp4),
                        $("#shipping_reference").val(shp5),
                        $("#shipping_file").val(shp6),
                                /*OTHER REF*/
                        $("#other_vendor_delivery").val(oth1),
                        $("#other_shipping_date").val(oth2),
                        $("#other_department_id").val(oth3),
                        $("#other_department_name").val(oth4),
                        $("#other_from_system").val(oth5),
                        $("#other_concession").val(oth6),
                        $("#other_ultimate_consignee_id").val(oth7),
                        $("#other_ultimate_consignee_name").val(oth8),
                        $("#comments_comment").val(comm),

                        (type== '0' ? $("#cargo-warehouse").modal("show") : $("#vehicle-warehouse").modal("show")),
                        $("#cargo_quantity").focus()
            }),


            $("#vehicle-warehouse-save").click(function() {
               if ($("#vehicle_vin").val() == ''){
                   show_alert();
                   $("#vehicle_vin").focus()
               }else{
                   var r = ($('#warehouse_details tbody tr').length + 1),
                           _ =  ($("#warehouse_details tbody tr").length == 0 ? 1 : parseInt($("#warehouse_details tbody tr")[$("#warehouse_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                           l = $("#vehicle_id").val(),
                           c = (0==l? _ : l)-1,
                           g1 = $("#vehicle_quantity").val().toUpperCase(),
                           g2 = $("#vehicle_cargo_type_id").val().toUpperCase(),
                           g3 = $("#vehicle_cargo_type_code").val().toUpperCase(),
                           g4 = $("#vehicle_length").val(),
                           g5 = $("#vehicle_width").val(),
                           g6 = $("#vehicle_height").val(),
                           g7 = $("#vehicle_total_weight").val(),
                           g8 = $("#vehicle_net_weight").val(),
                           g9 = $("#vehicle_weight_unit_measurement_id").val(),
                           g10 = $("#vehicle_cubic_weight").val(),

                           g11 = $("#vehicle_volume_weight").val(),
                           g12 = $("#vehicle_metric_unit_measurement_id").val(),
                           g13 = $("#vehicle_material").val(),
                           g14 = $("#vehicle_pieces").val(),
                           g15 = $("#vehicle_unit_weight").val(),
                           g16 = $("#vehicle_dim_fact").val(),
                           g17 = $("#vehicle_location_id").val(),
                           g18 = $("#vehicle_location_name").val().toUpperCase(),
                           g19 = $("#vehicle_tare_weight").val(),
                           g20 = $("#vehicle_location_bin_id").val(),
                           g21 = $("#vehicle_location_bin_name").val().toUpperCase(),
                           g22 = $("#vehicle_square_foot").val(),

                           ve1= $("#vehicle_vin").val(),
                           ve2= $("#vehicle_type").val(),
                           ve3= $("#vehicle_color").val(),
                           ve4= $("#vehicle_year").val(),
                           ve5= $("#vehicle_condition").val(),
                           ve6= $("#vehicle_make").val(),
                           ve7= $("#vehicle_keys").val(),
                           ve8= $("#vehicle_model").val(),
                           ve9= $("#vehicle_running").val(),
                           ve10= $("#vehicle_trim").val(),
                           ve11= $("#vehicle_mileage").val(),
                           ve12= $("#vehicle_engine").val(),
                           ve13= $("#vehicle_tag").val(),
                           ve14= $("#vehicle_body").val(),
                           ve15= $("#vehicle_other").val(),
                           ve16= $("#vehicle_number").val(),
                           ve17= $("#vehicle_state_province_id").val(),
                           ve18= $("#vehicle_state_province_name").val(),
                           ve19= $("#vehicle_received").val(),
                           ve20= $("#vehicle_inspection_number").val(),
                           ve21= $("#vehicle_inspection_date").val(),
                           ve22= $("#vehicle_inspection_by").val(),
                           ve23= $("#vehicle_lot_number").val(),
                           ve24= $("#vehicle_buyer_number").val(),

                           eei1= $("#vehicle_eei_info_scheduleb_id").val(),
                           eei2= $("#vehicle_eei_info_scheduleb_code").val(),
                           eei3= $("#vehicle_eei_info_scheduleb_description").val(),
                           eei4= $("#vehicle_eei_info_hts_id").val(),
                           eei5= $("#vehicle_eei_info_hts_code").val(),
                           eei6= $("#vehicle_eei_info_hts_description").val(),
                           eei7= $("#vehicle_eei_info_value").val(),
                           eei8= $("#vehicle_eei_info_eccn").val(),
                           eei9= $("#vehicle_eei_info_export_id").val(),
                           eei10= $("#vehicle_eei_info_export_code").val(),
                           eei11= $("#vehicle_eei_info_license_type_id").val(),
                           eei12= $("#vehicle_eei_info_license_type_code").val(),
                           eei13= $("#vehicle_eei_info_origin").val(),

                           comm=$("#vehicle_comments").val(),

                           n = $("#warehouse_details"),
                           t = n.find("tbody"),
                           p = $("<tr id=" + (0==l? _ : l) + ">");
                   p.append(createTableContent('cargo_line', (0==l? _ : l), true, c))
                           .append($("<td><i class='fa fa-car' aria-hidden='true'></td>"))
                           .append(createTableContent('cargo_quantity', g1, false, c))
                           .append(createTableContent('cargo_type_id', g2, true, c))
                           .append(createTableContent('cargo_type_code', g3, false, c))
                           .append(createTableContent('cargo_length', g4, false, c))
                           .append(createTableContent('cargo_width', g5, false, c))
                           .append(createTableContent('cargo_height', g6, false, c))
                           .append(createTableContent('cargo_total_weight', g7, false, c))
                           .append(createTableContent('cargo_net_weight', g8, false, c))
                           .append(createTableContent('cargo_weight_unit_measurement_id', g9, false, c))
                           .append(createTableContent('cargo_cubic', g10, false, c))
                           .append(createTableContent('part_info_po_number', '', false, c))
                           /*GENERAL */
                           .append(createTableContent('cargo_volume_weight', g11, true, c))
                           .append(createTableContent('cargo_metric_unit_measurement_id', g12, true, c))
                           .append(createTableContent('cargo_material_description', g13, true, c))
                           .append(createTableContent('cargo_pieces', g14, true, c))
                           .append(createTableContent('cargo_unit_weight', g15, true, c))
                           .append(createTableContent('cargo_dim_fact', g16, true, c))
                           .append(createTableContent('cargo_location_id', g17, true, c))
                           .append(createTableContent('cargo_location_name', g18, true, c))
                           .append(createTableContent('cargo_location_bin_id', g20, true, c))
                           .append(createTableContent('cargo_location_bin_name', g21, true, c))
                           .append(createTableContent('cargo_tare_weight', g19, true, c))
                           .append(createTableContent('cargo_square_foot', g22, true, c))

                           //
                           /*PART INFO */
                           .append(createTableContent('part_info_serial_number','', true, c))
                           .append(createTableContent('part_info_barcode', '', true, c))
                           .append(createTableContent('part_info_Model', '', true, c))
                           .append(createTableContent('part_info_commodity_id', '', true, c))
                           .append(createTableContent('part_info_commodity_name', '', true, c))
                           .append(createTableContent('part_info_pro_number', '', true, c))
                           .append(createTableContent('part_info_project', '', true, c))
                           .append(createTableContent('part_info_inv_number', '', true, c))
                           .append(createTableContent('part_info_lot_number', '', true, c))
                           .append(createTableContent('part_info_sku_number', '', true, c))
                           .append(createTableContent('part_info_destination_point', '', true, c))
                           .append(createTableContent('part_info_attention', '', true, c))

                           /*EEI INFO*/
                           .append(createTableContent('eei_info_scheduleb_id', eei1, true, c))
                           .append(createTableContent('eei_info_scheduleb_code', eei2, true, c))
                           .append(createTableContent('eei_info_scheduleb_description', eei3, true, c))
                           .append(createTableContent('eei_info_hts_id', eei4, true, c))
                           .append(createTableContent('eei_info_hts_name', eei5, true, c))
                           .append(createTableContent('eei_info_hts_description', eei6, true, c))
                           .append(createTableContent('eei_info_value', eei7, true, c))
                           .append(createTableContent('eei_info_eccn', eei8, true, c))
                           .append(createTableContent('eei_info_export_id', eei9, true, c))
                           .append(createTableContent('eei_info_export_code', eei10, true, c))
                           .append(createTableContent('eei_info_license_type_id', eei11, true, c))
                           .append(createTableContent('eei_info_license_type_code', eei12, true, c))
                           .append(createTableContent('eei_info_origin', eei13, true, c))

                                /* HAZARDOUS */
                           .append(createTableContent('hazardous_proper_shipping_name', '', true, c))
                           .append(createTableContent('hazardous_un_id', '', true, c))
                           .append(createTableContent('hazardous_un_code', '', true, c))
                           .append(createTableContent('hazardous_un_description', '', true, c))
                           .append(createTableContent('hazardous_class_id', '', true, c))
                           .append(createTableContent('hazardous_class_description', '', true, c))
                           .append(createTableContent('hazardous_packing_group', '', true, c))
                           .append(createTableContent('hazardous_flash_point', '', true, c))
                           .append(createTableContent('hazardous_flashing_point_type', '', true, c))
                           .append(createTableContent('hazardous_special_instructions', '', true, c))
                           .append(createTableContent('hazardous_units', '', true, c))
                           .append(createTableContent('hazardous_material_page', '', true, c))
                           .append(createTableContent('hazardous_quantity', '', true, c))
                           .append(createTableContent('hazardous_label_required', '', true, c))
                           .append(createTableContent('hazardous_emergency_contact', '', true, c))
                           .append(createTableContent('hazardous_emergency_contact_phone', '', true, c))
                           /*REFERENCE*/
                           .append(createTableContent('reference_vendor_code', '', true, c))
                           .append(createTableContent('reference_vendor_name', '', true, c))
                           .append(createTableContent('reference_final_dest', '', true, c))
                           .append(createTableContent('reference_customer_reference', '', true, c))
                           /* SHIPPING REFERENCE*/
                           .append(createTableContent('shipping_type', '', true, c))
                           .append(createTableContent('shipping_date_in', '', true, c))
                           .append(createTableContent('shipping_date_out', '', true, c))
                           .append(createTableContent('user_id', '', true, c))
                           .append(createTableContent('shipping_reference', '', true, c))
                           .append(createTableContent('shipping_file', '', true, c))
                           /* OTHER REFERENCE */
                           .append(createTableContent('other_vendor_delivery', '', true, c))
                           .append(createTableContent('other_shipping_date', '', true, c))
                           .append(createTableContent('other_department_id', '', true, c))
                           .append(createTableContent('other_department_name', '', true, c))
                           .append(createTableContent('other_from_system', '', true, c))
                           .append(createTableContent('other_concession', '', true, c))
                           .append(createTableContent('other_ultimate_consignee_id', '', true, c))
                           .append(createTableContent('other_ultimate_consignee_name', '', true, c))
                           .append(createTableContent('comments_comment', comm, true, c))


                           /* VEHICLE DETAILS */
                           .append(createTableContent('vehicle_vin', ve1, true, c))
                           .append(createTableContent('vehicle_type', ve2, true, c))
                           .append(createTableContent('vehicle_color', ve3, true, c))
                           .append(createTableContent('vehicle_year', ve4, true, c))
                           .append(createTableContent('vehicle_condition', ve5, true, c))
                           .append(createTableContent('vehicle_make', ve6, true, c))
                           .append(createTableContent('vehicle_keys', ve7, true, c))
                           .append(createTableContent('vehicle_model', ve8, true, c))
                           .append(createTableContent('vehicle_running', ve9, true, c))
                           .append(createTableContent('vehicle_trim', ve10, true, c))
                           .append(createTableContent('vehicle_mileage', ve11, true, c))
                           .append(createTableContent('vehicle_engine', ve12, true, c))
                           .append(createTableContent('vehicle_tag', ve13, true, c))
                           .append(createTableContent('vehicle_body', ve14, true, c))
                           .append(createTableContent('vehicle_other', ve15, true, c))
                           .append(createTableContent('vehicle_number', ve16, true, c))
                           .append(createTableContent('vehicle_state_province_id', ve17, true, c))
                           .append(createTableContent('vehicle_state_province_name', ve18, true, c))
                           .append(createTableContent('vehicle_received', ve19, true, c))
                           .append(createTableContent('vehicle_inspection_number', ve20, true, c))
                           .append(createTableContent('vehicle_inspection_date', ve21, true, c))
                           .append(createTableContent('vehicle_inspection_by', ve22, true, c))
                           .append(createTableContent('vehicle_lot_number', ve23, true, c))
                           .append(createTableContent('vehicle_buyer_number', ve24, true, c))

                           .append(createTableContent('type_package', '1' , true, c))
                                           .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),values_warehouse(),
                           cleanModalFields('vehicle-warehouse'),$("#vehicle_quantity").focus()
               }

            }),
            $('#warehouse_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove(),
                        values_warehouse()
            }),

            $("#warehouse_details").on("click", "a.btn-default", function() {
                cleanModalFields('vehicle-warehouse');

                var t = $(this).closest("tr"),
                        g1 = t[0].childNodes[0].textContent,
                        g2 = t[0].childNodes[2].textContent,
                        g3 = t[0].childNodes[3].textContent,
                        g4 = t[0].childNodes[4].textContent,
                        g5 = t[0].childNodes[5].textContent,
                        g6 = t[0].childNodes[6].textContent,
                        g7 = t[0].childNodes[7].textContent,
                        g8 = t[0].childNodes[8].textContent,
                        g9 = t[0].childNodes[9].textContent,
                        g10 = t[0].childNodes[10].textContent,

                        g11 = t[0].childNodes[11].textContent,
                        g12 = t[0].childNodes[12].textContent,
                        g13 = t[0].childNodes[14].textContent,
                        g14 = t[0].childNodes[15].textContent,
                        g15 = t[0].childNodes[16].textContent,
                        g16 = t[0].childNodes[17].textContent,
                        g17 = t[0].childNodes[18].textContent,
                        g18 = t[0].childNodes[19].textContent,
                        g19 = t[0].childNodes[20].textContent,
                        g20 = t[0].childNodes[21].textContent,
                        g21 = t[0].childNodes[22].textContent,
                        g22 = t[0].childNodes[23].textContent,
                        g23 = t[0].childNodes[24].textContent,


                        ve1 = t[0].childNodes[85].textContent,
                        ve2 = t[0].childNodes[86].textContent,
                        ve3 = t[0].childNodes[87].textContent,
                        ve4 = t[0].childNodes[88].textContent,
                        ve5 = t[0].childNodes[89].textContent,
                        ve6 = t[0].childNodes[90].textContent,
                        ve7 = t[0].childNodes[91].textContent,
                        ve8 = t[0].childNodes[92].textContent,
                        ve9 = t[0].childNodes[93].textContent,
                        ve10 = t[0].childNodes[94].textContent,
                        ve11 = t[0].childNodes[95].textContent,
                        ve12 = t[0].childNodes[96].textContent,
                        ve13 = t[0].childNodes[97].textContent,
                        ve14 = t[0].childNodes[98].textContent,
                        ve15 = t[0].childNodes[99].textContent,
                        ve16= t[0].childNodes[100].textContent,
                        ve17 = t[0].childNodes[101].textContent,
                        ve18 = t[0].childNodes[102].textContent,
                        ve19 = t[0].childNodes[103].textContent,
                        ve20 = t[0].childNodes[104].textContent,
                        ve21= t[0].childNodes[105].textContent,
                        ve22 = t[0].childNodes[106].textContent,
                        ve23 = t[0].childNodes[107].textContent,
                        ve24 = t[0].childNodes[108].textContent,

                        eei1 = t[0].childNodes[37].textContent,
                        eei2 = t[0].childNodes[38].textContent,
                        eei3 = t[0].childNodes[39].textContent,
                        eei4 = t[0].childNodes[40].textContent,
                        eei5 = t[0].childNodes[41].textContent,
                        eei6 = t[0].childNodes[42].textContent,
                        eei7 = t[0].childNodes[43].textContent,
                        eei8 = t[0].childNodes[44].textContent,
                        eei9 = t[0].childNodes[45].textContent,
                        eei10 = t[0].childNodes[46].textContent,
                        eei11 = t[0].childNodes[47].textContent,
                        eei12 = t[0].childNodes[48].textContent,
                        eei13 = t[0].childNodes[49].textContent,
                        comm = t[0].childNodes[84].textContent,
                        type = t[0].childNodes[109].textContent;

                $('#vehicle_id').val(g1),
                        $("#vehicle_quantity").val(g2),
                        $("#vehicle_cargo_cargo_type_id").val(g3),
                        $("#vehicle_cargo_cargo_type_code").val(g4),
                        $("#vehicle_length").val(g5),
                        $("#vehicle_width").val(g6),
                        $("#vehicle_height").val(g7),
                        $("#vehicle_total_weight").val(g8),
                        $("#vehicle_net_weight").val(g9),
                        $("#vehicle_weight_unit_measurement_id").val(g10),
                        $("#vehicle_cubic_weight").val(g11),


                        /* GENERAL*/
                        $("#vehicle_volume_weight").val(g12),
                        $("#vehicle_metric_unit_measurement_id").val(g13),
                        $("#vehicle_material").val(g14),
                        $("#vehicle_pieces").val(g15),
                        $("#vehicle_unit_weight").val(g16),
                        $("#vehicle_dim_fact").val(g17),
                        $("#vehicle_location_id").val(g18),
                        $("#vehicle_location_name").val(g19),
                        $("#vehicle_location_bin_id").val(g20),
                        $("#vehicle_location_bin_name").val(g21),
                        $("#vehicle_tare_weight").val(g22),
                        $("#vehicle_square_foot").val(g23),

                        /*VEHICLE DETAILS*/
                        $("#vehicle_vin").val(ve1),
                        $("#vehicle_type").val(ve2),
                        $("#vehicle_color").val(ve3),
                        $("#vehicle_year").val(ve4),
                        $("#vehicle_condition").val(ve5),
                        $("#vehicle_make").val(ve6),
                        $("#vehicle_keys").val(ve7),
                        $("#vehicle_model").val(ve8),
                        $("#vehicle_running").val(ve9),
                        $("#vehicle_trim").val(ve10),
                        $("#vehicle_mileage").val(ve11),
                        $("#vehicle_engine").val(ve12),
                        $("#vehicle_tag").val(ve13),
                        $("#vehicle_body").val(ve14),
                        $("#vehicle_other").val(ve15),
                        $("#vehicle_number").val(ve16),
                        $("#vehicle_state_province_id").val(ve17),
                        $("#vehicle_state_province_name").val(ve18),
                        $("#vehicle_received").val(ve19),
                        $("#vehicle_inspection_number").val(ve20),
                        $("#vehicle_inspection_date").val(ve21),
                        $("#vehicle_inspection_by").val(ve22),
                        $("#vehicle_lot_number").val(ve23),
                        $("#vehicle_buyer_number").val(ve24),
                        /*EEI INFO*/
                        $("#vehicle_eei_info_scheduleb_id").val(eei1),
                        $("#vehicle_eei_info_scheduleb_name").val(eei2),
                        $("#vehicle_eei_info_scheduleb_description").val(eei3),
                        $("#vehicle_eei_info_hts_id").val(eei4),
                        $("#vehicle_eei_info_hts_name").val(eei5),
                        $("#vehicle_eei_info_hts_description").val(eei6),
                        $("#vehicle_eei_info_value").val(eei7),
                        $("#vehicle_eei_info_eccn").val(eei8),
                        $("#vehicle_eei_info_export_id").val(eei9),
                        $("#vehicle_eei_info_export_code").val(eei10),
                        $("#vehicle_eei_info_license_type_id").val(eei11),
                        $("#vehicle_eei_info_license_type_code").val(eei12),
                        $("#vehicle_eei_info_origin").val(eei13),
                        $("#vehicle_comments").val(comm),
                        calculate_vehicle(),
                        (type== '0' ? $("#cargo-warehouse").modal("show") : $("#vehicle-warehouse").modal("show"))
                        , $("#vehicle_quantity").focus()
            });




</script>