<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}

<div class="col-md-12">
    @include('export.air.booking_entries.partials.sections.general')
</div>
<div class="col-md-12">
    @include('export.air.booking_entries.partials.sections.agent')
</div>
<div class="row">
    <div class="col-md-6">    @include('export.air.booking_entries.partials.sections.shipper')    </div>
    <div class="col-md-6">    @include('export.air.booking_entries.partials.sections.consignee')    </div>
</div>

<!-- Modal forms section -->
@section('modals')
@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.air.booking_entries.partials.scripts.init')
    @include('export.air.booking_entries.partials.scripts.autocomplete')
    @include('export.air.booking_entries.partials.scripts.validation')


@stop
