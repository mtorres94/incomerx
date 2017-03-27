<script type="text/javascript">

    $("#btn_generate").click(function() {
        $("#carrier_type").val(1).change();
        $("#type").val(1).change();
        $("#status").val(1).change();
        $("#total_codes").attr("readonly", true);

    });


    $("#generate-save").click(function(){
        var _ =  ($("#details tbody tr").length == 0 ? 1 : parseInt($("#details tbody tr")[$("#details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            code= 0, y =0 , x=0,
            l = $("#line").val(),
            c = (0 == l ? _  : l)-1,
            g1 = $("#division_id").val(),
            g2 = ($("#division_id").val() != ''? $("#division_id option:selected").text() : "" ),
            g3 = $("#carrier_type").val(),
            g4 = $("#type").val(),
            g5 = $("#agent_id").val(),
            g6 = $("#agent_name").val(),
            g7 = $("#status").val(),
            g8 = $("#starting").val(),
            g9 = $("#ending").val(),
            g10 = $("#file_number").val(),
            n = $("#details"),
            t = n.find("tbody");

            while($("#starting").val() <= $("#ending").val()){
                code= $("#starting").val();

                var p = $("<tr id=" + (0==l? _ : l) + ">");
                p.append(createTableContent('line', (0==l? _ : l) , true, c))
                    .append(createTableContent('division_id', g1, true, c))
                    .append(createTableContent('division_name', g2, true, c))
                    .append(createTableContent('awb_number', code, false, c))
                    .append(createTableContent('awb_type', g3, true, c))
                    .append(createTableContent('awb_type_text', (g3 == '1' ? "INTERNATIONAL" : "DOMESTIC"), false, c))
                    .append(createTableContent('sequence_type', g4, true, c))
                    .append(createTableContent('agent_id', g5, true, c))
                    .append(createTableContent('agent_name', g6, true, c))
                    .append(createTableContent('status', g7, true, c))
                    .append(createTableContent('status_text', (g7 =='1'? "AVAILABLE" : (g7 =='2' ? "BOOKED" : (g7 == '3' ? "CANCELLED" : (g7 =='4'? "USED" : "VOID")))), false, c))
                    .append(createTableContent('starting', code, true, c))
                    .append(createTableContent('ending', g9, true, c))
                    .append(createTableContent('file_number', g10, false, c));
                t.append(p);
                _ =  ($("#details tbody tr").length == 0 ? 1 : parseInt($("#details tbody tr")[$("#details tbody tr").length - 1].childNodes[0].textContent) + 1 );
                c++;
                x= $("#starting").val().substring(7,8);
                y = (x == 6 ? parseInt($("#starting").val()) + 4 : parseInt($("#starting").val()) + 11);
                y= pad(y, 8);
                $("#starting").val(y);
            }

        cleanModalFields('generate_codes');
    });


    $("#contact-save").click(function(){
        var _ =  ($("#contact_details tbody tr").length == 0 ? 1 : parseInt($("#contact_details tbody tr")[$("#contact_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            l = $("#line").val(),
            c = (0 == l ? _  : l)-1,
            g1 = $("#contact_name").val(),
            g2 = $("#contact_type").val(),
            g3 = $("#contact_fax").val(),
            g4 = $("#contact_phone").val(),
            g5 = $("#contact_mobile").val(),
            g6 = $("#contact_email").val(),
            n = $("#contact_details"),
            t = n.find("tbody"),
            p = $("<tr id=" + (0==l? _ : l) + ">");
        p.append(createTableContent('line', (0==l? _ : l) , true, c))
            .append(createTableContent('contact_name', g1, false, c))
            .append(createTableContent('contact_type', g2, true, c))
            .append(createTableContent('contact_fax', g3, false, c))
            .append(createTableContent('contact_phone', g4, false, c))
            .append(createTableContent('contact_mobile', g5, false, c))
            .append(createTableContent('contact_email', g6, true, c))
            .append(createTableBtns());
        0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p);
        cleanModalFields('contact');
    });
    $('#contact_details').on('click', 'a.btn-danger', function() {
        preventDelete($(this));
    });
        $("#contact_details").on("click", "a.btn-default", function() {
            var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[1].textContent,
                g3 = t[0].childNodes[2].textContent,
                g4 = t[0].childNodes[3].textContent,
                g5 = t[0].childNodes[4].textContent,
                g6 = t[0].childNodes[5].textContent,
                g7 = t[0].childNodes[6].textContent;

            $("#line").val(g1);
            $("#contact_name").val(g2);
                $("#contact_type").val(g3);
                $("#contact_fax").val(g4);
                $("#contact_phone").val(g5);
                $("#contact_mobile").val(g6);
                $("#contact_email").val(g7);

        });
</script>