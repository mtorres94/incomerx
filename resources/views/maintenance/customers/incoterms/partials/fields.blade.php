{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the incoterm') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the incoterm') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Additional description', 'description', null, 2, 'Enter some addtional description for this incoterm') !!}

@section('scripts')
    <script>
    </script>
    @include('maintenance.customers.incoterms.partials.scripts.init')
@stop