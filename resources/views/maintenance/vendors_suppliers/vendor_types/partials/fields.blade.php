{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the vendor type') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Name', 'name', null, 'Enter the description for the vendor type') !!}

@section('scripts')
    <script>
    </script>
    @include('maintenance.vendors_suppliers.vendor_types.partials.scripts.init')
@stop