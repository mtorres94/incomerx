<script type="text/javascript">
    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('departments.close') }}');
    });
</script>