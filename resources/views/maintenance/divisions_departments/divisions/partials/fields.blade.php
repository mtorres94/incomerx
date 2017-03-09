{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="container-fluid">
    <div class="col-md-5">
        {!! Form::bsText('col-md-4', 'col-md-8', 'Code', 'code', null, 'Enter the code for the division') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Name', 'name', null, 'Enter the name for the division') !!}
        {!! Form::bsMemo('col-md-4', 'col-md-8', 'Address', 'address', null, 2, 'Enter the address for the division') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'City', 'city', null, 'Enter the city for the division') !!}
        {!! Form::bsComplete('col-md-4', 'col-md-8', 'State', 'state_id', '_57', Request::get('term'),
    ((isset($division) and $division->state_id > 0) ? $division->state->name : null), 'States...') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'ZIP/Postal Code', 'zip', null, 'Enter the zip/postal code for the division') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Phone', 'phone', null, 'Enter the phone for the division') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Fax', 'fax', null, 'Enter the fax for the division') !!}
    </div>
    <div class="col-md-7">
        {!! Form::bsText('col-md-5', 'col-md-7', 'Global file log counter', 'log_counter', null, 'Enter the global file log counter for the division') !!}
        {!! Form::bsComplete('col-md-5', 'col-md-7', 'Default cust. payment terms', 'payment_id', '_6', Request::get('term'),
    ((isset($division) and $division->payment_id > 0) ? $division->payment->name : null), 'Payment term...') !!}
        {!! Form::bsMemo('col-md-5', 'col-md-7', 'Comments', 'comments', null, 2, 'Enter some comments for this division') !!}
    </div>
</div>
@section('scripts')
    <script>
    </script>
    @include('maintenance.divisions_departments.divisions.partials.scripts.init')
@stop

