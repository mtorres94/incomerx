{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="container-fluid">
    <div class="col-md-6">
        {!! Form::bsText('col-md-2', 'col-md-10', 'Code', 'code', null, 'Enter the code for the warehouse') !!}
        {!! Form::bsSelect('col-md-2', 'col-md-10', 'Division', 'division_id', Sass\Division::all()->lists('name', 'id'), 'Choose one of the following divisions...') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'Name', 'name', null, 'Enter the name for the warehouse') !!}
        {!! Form::bsMemo('col-md-2', 'col-md-10', 'Address', 'address', null, 2, 'Enter the address for this warehouse') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'City', 'city', null, 'Enter the city for the warehouse') !!}
        {!! Form::bsSelect('col-md-2', 'col-md-10', 'State', 'state_id', Sass\State::all()->lists('name', 'id'), 'Choose one of the following states...') !!}
        {!! Form::bsText('col-md-2', 'col-md-10', 'ZIP', 'zip', null, 'Enter the postal code for the warehouse') !!}
    </div>
    <div class="col-md-6">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Contact name', 'contact_name', null, 'Enter the contact name for the warehouse') !!}
        {!! Form::bsText('col-md-3', 'col-md-9', 'Phone', 'phone', null, 'Enter the contact phone for the warehouse') !!}
        {!! Form::bsText('col-md-3', 'col-md-9', 'Fax', 'fax', null, 'Enter the contact fax cont for the warehouse') !!}
        {!! Form::bsSelect('col-md-3', 'col-md-9', 'Location', 'location_id', Sass\WorldLocation::all()->lists('name', 'id'), 'Choose one of the following locations...') !!}
    </div>
</div>
@section('scripts')
    <script>
    </script>
    @include('maintenance.warehouse.warehouse_facilities.partials.scripts.init')
@stop