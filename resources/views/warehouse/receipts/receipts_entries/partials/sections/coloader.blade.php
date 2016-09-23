<fieldset id="coloader_section">
    <legend>Coloader</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'coloader_id', 'coloader_name', Request::get('term'), ((isset($receipt_entry) and $receipt_entry->coloader_id > 0) ? $receipt_entry->coloader->name : null), 'Customers...') !!}
        </div>
    </div>
</fieldset>