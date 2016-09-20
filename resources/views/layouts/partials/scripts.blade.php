<script>
    /** States */
    $('#_6').autocomplete({
        source: "{{ route('payment_terms.autocomplete') }}",
        minLength: 3,
        autoFocus: true,
        select: function(event, ui) {
            $('#payment_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#payment_id').val(0);
        }
    }).blur(function() {
        var _id = $('#payment_id').val();
        if (_id == 0) { $(this).val("") }
    });

    /** World Locations */
    $('#_22').autocomplete({
        source: "{{ route('world_locations.autocomplete') }}",
        minLength: 3,
        autoFocus: true,
        select: function(event, ui) {
            $('#location_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#location_id').val(0);
        }
    }).blur(function() {
        var _id = $('#location_id').val();
        if (_id == 0) { $(this).val("") }
    });

    /** Countries */
    $('#_28').autocomplete({
        source: "{{ route('countries.autocomplete') }}",
        minLength: 3,
        autoFocus: true,
        select: function(event, ui) {
            $('#country_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#country_id').val(0);
        }
    }).blur(function() {
        var _id = $('#country_id').val();
        if (_id == 0) { $(this).val("") }
    });

    /** Divisions */
    $('#_41').autocomplete({
        source: "{{ route('divisions.autocomplete') }}",
        minLength: 3,
        autoFocus: true,
        select: function(event, ui) {
            $('#division_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#division_id').val(0);
        }
    }).blur(function() {
        var _id = $('#division_id').val();
        if (_id == 0) { $(this).val("") }
    });

    /** States */
    $('#_57').autocomplete({
        source: "{{ route('states.autocomplete') }}",
        minLength: 2,
        autoFocus: true,
        select: function(event, ui) {
            $('#state_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#state_id').val(0);
        }
    }).blur(function() {
        var _id = $('#state_id').val();
        if (_id == 0) { $(this).val("") }
    });

    /** Schedule D & K */
    $('#_58').autocomplete({
        source: "{{ route('scheduled.autocomplete') }}",
        minLength: 3,
        autoFocus: true,
        select: function(event, ui) {
            $('#scheduled_id').val(ui.item.id);
            $(this).val(ui.item.value);
        }
    }).keydown(function(e) {
        var keyCode =  e.keyCode ? e.keyCode : e.which;
        if (keyCode == 8 || keyCode == 46) {
            $('#scheduled_id').val(0);
        }
    }).blur(function() {
        var _id = $('#scheduled_id').val();
        if (_id == 0) { $(this).val("") }
    });
</script>