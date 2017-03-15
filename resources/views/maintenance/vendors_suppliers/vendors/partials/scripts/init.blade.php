<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('vendors.close') }}');
        $("#code").attr('disabled', true);
        initDate($("#since"), 0);

        $("#currency_id").val(1).change();
    });

</script>