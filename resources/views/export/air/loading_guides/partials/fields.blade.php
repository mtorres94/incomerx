<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="pull-right">
    @if(isset($loading_guide))
        <button type="button" class="btn btn-primary btn-sm" id="btn_create_house"  ><span>Create Houses</span></button>
    @endif
</div>

@include('export.air.loading_guides.partials.sections.general')

<div class="row">
    <div class="col-md-6">
        @include('export.air.loading_guides.partials.sections.carrier')
    </div>
    <div class="col-md-6">
        @include('export.air.loading_guides.partials.sections.dates')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('export.air.loading_guides.partials.sections.container_details')
    </div>
</div>
<div class="row">
        <div class="col-md-6">{!! Form::bsMemo(null, null,'Comments', 'comments', null, 2, '') !!}</div>
        <div class="col-md-6">{!! Form::bsMemo(null, null,'Marks', 'marks', null, 2, '') !!}</div>
</div>

<!-- Modal forms section -->
@section('modals')
    @include('export.air.loading_guides.partials.modal.container_details')
    @include('export.air.loading_guides.partials.modal.load_warehouses')
    @include('export.air.loading_guides.partials.modal.create_airway_bill')


@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('export.air.loading_guides.partials.scripts.init')
    @include('export.air.loading_guides.partials.scripts.autocomplete')
    @include('export.air.loading_guides.partials.scripts.tables')
    @include('export.air.loading_guides.partials.scripts.compute')


@stop
