<script type="text/javascript">
    $("#contact_save").click(function() {
        var r = ($("#contacts  tbody tr").length == 0 ? 1 : parseInt($("#contacts  tbody tr")[$("#contacts  tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            l = $("#customer_line").val(),
            c =(0 == l ? r : l)-1,
            c2 = $("#tmp_contact").val().toUpperCase(),
            c3 = $("#tmp_type").val().toUpperCase(),
            c4 = $("#tmp_phone").val().toUpperCase(),
            c5 = $("#tmp_fax").val().toUpperCase(),
            c6 = $("#tmp_mobile").val(),
            c7 = $("#tmp_email").val().toUpperCase(),
            c8 = $("#tmp_job_title").val().toUpperCase(),
            n = $("#contacts_details"),
            t = n.find("tbody"),
            p = $("<tr id=" + (0 == l ? r : l) + ">");
        p.append(createTableContent('customer_line', (0 == l ? r : l), true, c))
            .append(createTableContent('customer_contact', c2, false, c))
            .append(createTableContent('customer_type', c3, false, c))
            .append(createTableContent('customer_phone', c4, true, c))
            .append(createTableContent('customer_fax', c5, false, c))
            .append(createTableContent('customer_mobile', c6, true, c))
            .append(createTableContent('customer_email', c7, true, c))
            .append(createTableContent('customer_job', c8, true, c))
            .append(createTableBtns()); 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p); cleanModalFields('ContactDetails');
            $("#tmp_contact").focus();
    }), $('#contacts_details').on('click', 'a.btn-danger', function() {
        preventDelete($(this))
    }), $("#contacts_details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
            c1 = t[0].childNodes[0].textContent,
            c2 = t[0].childNodes[1].textContent,
            c3 = t[0].childNodes[2].textContent,
            c4 = t[0].childNodes[3].textContent,
            c5 = t[0].childNodes[4].textContent,
            c6 = t[0].childNodes[5].textContent,
            c7 = t[0].childNodes[6].textContent,
            c8 = t[0].childNodes[7].textContent;
            $("#tmp_customer_line").val(c1); $("#tmp_contact").val(c2); $("#tmp_type").val(c3); $("#tmp_phone").val(c4); $("#tmp_fax").val(c5); $("#tmp_mobile").val(c6); $("#tmp_email").val(c7); $("#tmp_job_title").val(c8); $("#ContactDetails").modal("show")
    });


    $("#delivery_save").click(function() {
        var r = ($("#delivery  tbody tr").length == 0 ? 1 : parseInt($("#delivery  tbody tr")[$("#delivery  tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            l = $("#delivery_line").val(),
            c =(0 == l ? r : l)-1,
            c2 = $("#delivery_id").val().toUpperCase(),
            c3 = $("#delivery_name").val().toUpperCase(),
            c4 = $("#delivery_address").val().toUpperCase(),
            c5 = $("#delivery_state_id").val().toUpperCase(),
            c6 = $("#delivery_state_name").val(),
            c7 = $("#delivery_zip_code_id").val().toUpperCase(),
            c8 = $("#delivery_zip_code").val().toUpperCase(),
            c9 = $("#delivery_country_id").val().toUpperCase(),
            c10 = $("#delivery_country_name").val().toUpperCase(),
            c11 = $("#delivery_phone").val().toUpperCase(),
            c12 = $("#delivery_fax").val().toUpperCase(),
            n = $("#delivery"),
            t = n.find("tbody"),
            p = $("<tr id=" + (0 == l ? r : l) + ">");
        p.append(createTableContent('delivery_line', (0 == l ? r : l), true, c))
            .append(createTableContent('delivery_id', c2, false, c))
            .append(createTableContent('delivery_name', c3, false, c))
            .append(createTableContent('delivery_address', c4, true, c))
            .append(createTableContent('delivery_state_id', c5, false, c))
            .append(createTableContent('deliver_state_name', c6, true, c))
            .append(createTableContent('delivery_zip_code_id', c7, true, c))
            .append(createTableContent('delivery_zip_code', c8, true, c))
            .append(createTableContent('delivery_country_id', c9, true, c))
            .append(createTableContent('delivery_country_name', c10, true, c))
            .append(createTableContent('delivery_phone', c11, true, c))
            .append(createTableContent('delivery_fax', c12, true, c))
            .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p); cleanModalFields('deliveryAddress'); $("#tmp_references_po_number").focus()
    }), $('#delivery').on('click', 'a.btn-danger', function() {
        preventDelete($(this))
    }), $("#delivery").on("click", "a.btn-default", function() {
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
            c10 = t[0].childNodes[10].textContent,
            c11 = t[0].childNodes[11].textContent,
            c12 = t[0].childNodes[12].textContent;
            $("#delivery_line").val(c1);
            $("#delivery_id").val(c2);
            $("#delivery_name").val(c3);
            $("#delivery_address").val(c4);
            $("#delivery_state_id").val(c5);
            $("#delivery_state_name").val(c6);
            $("#delivery_zip_code_id").val(c7);
            $("#delivery_zip_code").val(c8);
            $("#delivery_country_id").val(c9);
            $("#delivery_country_name").val(c10);
            $("#delivery_phone").val(c11);
            $("#delivery_fax").val(c12);
       ; $("#References").modal("show")
    });
</script>