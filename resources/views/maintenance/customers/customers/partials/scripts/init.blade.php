<script type="text/javascript">
    window.onload = (function () {
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('customers.close') }}');
        $("#code").attr('disabled', true);
    });
    ($("#since").val= "" ? initDate($("#since"), 0) : "")
</script>