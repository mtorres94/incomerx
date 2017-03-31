<script type="text/javascript">
$("#btn_account").click(function(){
    $("#type").val("P").change();
    $("#currency").val("1").change();
});

    $("#mapping_save").click(function(){
        var _ =  ($("#customer_table tbody tr").length == 0 ? 1 : parseInt($("#customer_table tbody tr")[$("#customer_table tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            l = $("#mapping_line").val(),
            c = (0 == l ? _  : l)-1,
            c1 = $("#customer_id").val(),
            c2 = $("#customer_name").val(),
            c3 = $("#code_mapping").val(),
            n= $("#customer_table"),
            t = n.find("tbody"),
            p= $("<tr id="+ (0 == l ? _  : l) +">");
        p.append(createTableContent('mapping_line', (0==l? _ : l) , true, c))
            .append(createTableContent('customer_id', c1, true, c))
            .append(createTableContent('customer_name', c2, false, c))
            .append(createTableContent('code_mapping', c3, false, c))
            .append(createTableBtns()); 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p);
        cleanModalFields('customer_mapping'); $("#customer_mapping").modal("show");

    });

    $('#customer_table').on('click', 'a.btn-danger', function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest('tr').remove();
            }
        });
    });

    $("#customer_table").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
            c1 = t[0].childNodes[0].textContent,
            c2 = t[0].childNodes[1].textContent,
            c3 = t[0].childNodes[2].textContent,
            c4 = t[0].childNodes[3].textContent;
        $("#mapping_line").val(c1);
        $("#customer_id").val(c2);
        $("#customer_name").val(c3);
        $("#code_mapping").val(c4);
        $("#customer_mapping").modal("show");
    });


    $("#account_save").click(function(){
        var _ =  ($("#account_table tbody tr").length == 0 ? 1 : parseInt($("#account_table tbody tr")[$("#account_table tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            l = $("#general_line").val(),
            c = (0 == l ? _  : l)-1,
            c1 = $("#general_id").val(),
            c2 = $("#general_code").val(),
            c3 = $("#type").val(),
            c4 = $("#state_id").val(),
            c5 = $("#state_name").val(),
            c6 = $("#descriptions").val(),
            c7 = $("#currency_id").val(),
            n= $("#account_table"),
            t = n.find("tbody"),
            p= $("<tr id="+ (0 == l ? _  : l) +">");
        p.append(createTableContent('general_line', (0==l? _ : l) , true, c))
            .append(createTableContent('general_id', c1, true, c))
            .append(createTableContent('general_code', c2, false, c))
            .append(createTableContent('type', c3, false, c))
            .append(createTableContent('state_id', c4, true, c))
            .append(createTableContent('state_name', c5, false, c))
            .append(createTableContent('descriptions', c6, false, c))
            .append(createTableContent('currency_id', c7, true, c))
            .append(createTableBtns()); 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p);
        cleanModalFields('gl_account'); $("#gl_account").modal("show");

    });

    $('#account_table').on('click', 'a.btn-danger', function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest('tr').remove();
            }
        });
    });

    $("#account_table").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
            c1 = t[0].childNodes[0].textContent,
            c2 = t[0].childNodes[1].textContent,
            c3 = t[0].childNodes[2].textContent,
            c4 = t[0].childNodes[3].textContent,
            c5 = t[0].childNodes[4].textContent,
            c6 = t[0].childNodes[5].textContent,
            c7 = t[0].childNodes[6].textContent,
            c8 = t[0].childNodes[7].textContent;

        $("#general_line").val(c1);
            $("#general_id").val(c2);
            $("#general_code").val(c3);
            $("#type").val(c4);
            $("#state_id").val(c5);
            $("#state_name").val(c6);
            $("#descriptions").val(c7);
            $("#currency_id").val(c8);
        $("#gl_account").modal("show");
    });
</script>