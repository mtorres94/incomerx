{!! Form::bsFile('Select files', 'file') !!}
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::hidden('unique_str', $unique_str, ['id' => 'unique_str', 'class' => 'form-control input-sm']) !!}
@include('warehouse.receipts.receipts_entries.partials.sections.general_info')
<div class="row">
    <div class="col-md-6">
        @include('warehouse.receipts.receipts_entries.partials.sections.shipper')
        @include('warehouse.receipts.receipts_entries.partials.sections.consignee')
        @include('warehouse.receipts.receipts_entries.partials.sections.third')
        @include('warehouse.receipts.receipts_entries.partials.sections.agent')
        @include('warehouse.receipts.receipts_entries.partials.sections.coloader')
    </div>
    <div class="col-md-6">
        @include('warehouse.receipts.receipts_entries.partials.sections.location')
        @include('warehouse.receipts.receipts_entries.partials.sections.tabs')
        @include('warehouse.receipts.receipts_entries.partials.sections.add_tabs')
    </div>
    <div class="col-md-12">
        <div style="padding-top: 10px;padding-bottom: 15px;">
            {!! Form::bsMemo(null, null, 'Comments', 'comments', null, 4, '') !!}
        </div>
    </div>
    <div class="col-md-12">
        @include('warehouse.receipts.receipts_entries.partials.sections.details')
        @include('warehouse.receipts.receipts_entries.partials.sections.charges')
    </div>
</div>

<!-- Modal forms section -->
@section('modals')
    <!-- UNs form -->
    @include('warehouse.receipts.receipts_entries.partials.modal.uns')
    @include('warehouse.receipts.receipts_entries.partials.modal.references')
    @include('warehouse.receipts.receipts_entries.partials.modal.pro-numbers')
    @include('warehouse.receipts.receipts_entries.partials.modal.cargo')
    @include('warehouse.receipts.receipts_entries.partials.modal.multiline')
    @include('warehouse.receipts.receipts_entries.partials.modal.charge')
@stop

<!-- Scripts sections -->
@section('scripts')
    @include('warehouse.receipts.receipts_entries.partials.scripts.compute')
    @include('warehouse.receipts.receipts_entries.partials.scripts.init')
    @include('warehouse.receipts.receipts_entries.partials.scripts.validation')
    @include('warehouse.receipts.receipts_entries.partials.scripts.autocomplete')
    @include('warehouse.receipts.receipts_entries.partials.scripts.tables')
@stop