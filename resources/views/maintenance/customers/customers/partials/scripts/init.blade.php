<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('customers.close') }}');
        $("#code").attr('disabled', true);
    });
</script>