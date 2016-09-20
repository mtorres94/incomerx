<fieldset id="agent_section">
    <legend>Agent</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'agent_id', 'agent_name', Request::get('term'), ((isset($wr_entry) and $wr_entry->agent_id > 0) ? $wr_entry->agent->name : null), 'Customers...') !!}
        </div>
    </div>
</fieldset>