<div class="row">
    <div class="col-md-12 gen-container">
        <div class="col-md-6">
            {!! Form::bsText('col-md-4', 'col-md-8', 'Code', 'code', null, 'Enter the code for the vendor') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Name', 'name', null, 'Enter the name for the vendor') !!}
            {!! Form::bsMemo('col-md-4', 'col-md-8', 'Address', 'address', null, 2, 'Enter the address for this vendor') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'City', 'city', null, 'Enter the city for the vendor') !!}

            {!! Form::bsComplete('col-md-4', 'col-md-8', 'State', 'state_id', 'state_name', Request::get('term'), ((isset($vendor) and $vendor->state_id > 0) ? $vendor->state->name : null), 'States...', 'options.maintenance.countries.states', 'options.maintenance.countries.states', 'maintenance.countries_destinations.states.index') !!}

            {!! Form::bsText('col-md-4', 'col-md-8', 'Postal Code', 'zip', null, 'Enter the postal code for the vendor') !!}
            {!! Form::bsSelect('col-md-4', 'col-md-8', 'Country', 'country_id', Sass\Country::all()->lists('name', 'id'), 'Choose one of the following country...') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Phone', 'phone', null, 'Enter the phone for the vendor') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Fax', 'fax', null, 'Enter the fax for the vendor') !!}
            {!! Form::bsText('col-md-4', 'col-md-8', 'Mobile', 'mobile', null, 'Enter the mobile phone for the vendor') !!}
        </div>
        <div class="col-md-6">
            {!! Form::bsDate('col-md-4', 'col-md-8', 'Since', 'since', null, null) !!}
            {!! Form::bsSelect('col-md-4', 'col-md-8', 'Currency', 'currency_id', Sass\Currency::all()->lists('code', 'id'), 'Choose one of the following currencies') !!}
            {!! Form::bsSelect('col-md-4', 'col-md-8', 'Status', 'status', array('1' => 'ACTIVE', '2' => 'ON HOLD', '3' => 'NON ACTIVE'), null) !!}
            <div id="subpanel" class="panel panel-default">
                <div class="panel-header">Account type</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-9', 'Airline', 'airline', (isset($vendor) ? $vendor->airline : 'off')) !!}</div>
                        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-9', 'Agent', 'agent', (isset($vendor) ? $vendor->agent : 'off')) !!}</div>
                        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-9', 'Ocean Carrier', 'ocean_carrier', (isset($vendor) ? $vendor->ocean_carrier : 'off')) !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-9', 'Other', 'other', (isset($vendor) ? $vendor->other : 'off')) !!}</div>
                        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-9', 'Truck', 'truck', (isset($vendor) ? $vendor->truck : 'off')) !!}</div>
                    </div>
                </div>
            </div>
            <div id="subpanel" class="panel panel-default">
                <div class="panel-header">Contact info</div>
                <div class="panel-body">
                    {!! Form::bsText('col-md-3', 'col-md-8', 'Contact', 'contact_name', null, 'Enter the contact name for the vendor') !!}
                    {!! Form::bsText('col-md-3', 'col-md-8', 'Email', 'email_contact', null, 'Enter the contact email for the vendor') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 gen-container">
        @include('maintenance.vendors_suppliers.vendors.partials.sections.tabs')
    </div>
</div>

<!-- Scripts sections -->
@section('scripts')
    @include('maintenance.vendors_suppliers.vendors.partials.scripts.init')
    <script>
        $(window).load(function () {
            openTab($("#vendors"));

            $("#customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected: {
                    id: '{{ (isset($vendor) ? $vendor->customer_id : "")}}',
                    value: '{{ ((isset($vendor) and $vendor->customer_id > 0) ? $vendor->customer->name : null)}}'
                },
                onSelect:function(e,o) {
                    $("#customer_id").val(e.id), $(this).val(e.value)
                },
                minChars:3,
                param:"term",
                required:!0
            }).on("marcopolorequestbefore",function () {
                $("#customer_name_img").removeClass("img-none").addClass("img-display"),$("#customer_name_spn").removeClass("img-display").addClass("img-none")
            }).on("marcopolorequestafter",function () {
                $("#customer_name_img").removeClass("img-display").addClass("img-none"),$("#customer_name_spn").removeClass("img-none").addClass("img-display")
            }).keydown(function(e) {
                var o = e.keyCode ? e.keyCode : e.which;
                (8 == o || 46 == o) && $("#customer_id").val(0)
            }).blur(function() {
                var e = $("#customer_id").val();
                0 == e && ($(this).val(""))
            });

            $("#master_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},
                selected: {
                    id: '{{ (isset($vendor) ? $vendor->master_id : "")}}',
                    name: '{{ ((isset($vendor) and $vendor->master_id > 0) ? $vendor->master->name : null)}}'
                },
                onSelect:function(e,o) {
                    $("#master_id").val(e.id), $(this).val(e.name)
                },
                minChars:3,
                param:"term",
                required:!0
            }).on("marcopolorequestbefore",function () {
                $("#master_name_img").removeClass("img-none").addClass("img-display"),$("#master_name_spn").removeClass("img-display").addClass("img-none")
            }).on("marcopolorequestafter",function () {
                $("#master_name_img").removeClass("img-display").addClass("img-none"),$("#master_name_spn").removeClass("img-none").addClass("img-display")
            }).keydown(function(e) {
                var o = e.keyCode ? e.keyCode : e.which;
                (8 == o || 46 == o) && $("#master_id").val(0)
            }).blur(function() {
                var e = $("#master_id").val();
                0 == e && ($(this).val(""))
            });

            $("#state_name").marcoPolo({
                url: "{{ route('states.autocomplete') }}",
                formatItem: function(e, o) {
                    return e.value
                },
                selected: {
                    id: '{{ (isset($vendor) ? $vendor->state_id : "")}}',
                    value: '{{ ((isset($vendor) and $vendor->state_id > 0) ? $vendor->state->name : null)}}'
                },
                onSelect: function(e, o) {
                    $("#state_id").val(e.id), $(this).val(e.value)
                },
                minChars: 2,
                param: "term",
                required: !0
            }).on("marcopolorequestbefore", function() {
                $("#state_name_img").removeClass("img-none").addClass("img-display"), $("#state_name_spn").removeClass("img-display").addClass("img-none")
            }).on("marcopolorequestafter", function() {
                $("#state_name_img").removeClass("img-display").addClass("img-none"), $("#state_name_spn").removeClass("img-none").addClass("img-display")
            }).on("marcopoloblur", function() {
                "" == $(this).val().trim() && $("#state_id").val(0)
            })
        });
    </script>
@stop