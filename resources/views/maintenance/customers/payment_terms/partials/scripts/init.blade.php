<script type="text/javascript">
    window.onload = (function () {
        openTab($("#data"));
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('payment_term.close') }}');

        function renameTab() {
            if ('edit' == '{{ \Request::segment(5) }}') {
                var gtab = window.parent.$('#tt');
                var htab = gtab.find('.tabs-header');
                var wtab = htab.find('.tabs-wrap');
                var ttab = wtab.find('.tabs');
                var stab = ttab.find('.tabs-selected');
                var itab = stab.find('.tabs-inner');
                var etab = itab.find('.tabs-title');
                var span = '{{ isset($payment_term) ? "Edit ".$payment_term->code : "New" }}';

                etab[1] = span
            }
        }
    });



</script>