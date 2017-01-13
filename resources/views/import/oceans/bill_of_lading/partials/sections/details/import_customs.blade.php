<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsText('col-md-4', 'col-md-8', 'Entry #', 'entry_number', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Date', 'entry_date', null, ' ') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsText('col-md-4', 'col-md-8', 'IT #', 'it_number', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-8', 'IT date', 'it_date', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'IT Port', 'it_port', null, ' ') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsText('col-md-4', 'col-md-8', 'GO #', 'go_number', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Available', 'go_available', null, ' ') !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'GO date', 'go_date', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Expired Date', 'go_expired_date', null, ' ') !!}</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class=row>{!! Form::bsSelect('col-md-4', 'col-md-6', ' AMS Status', 'ams_status', array('O' => 'OPEN','P' => 'POSTED','C' => 'CLOSED','H' => 'HOLD','V' => 'VOID'), '') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'AMS date', 'ams_date', null, ' ') !!}</div>
            </div>
        </div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'AMS Number', 'ams_number', null, ' ') !!}</div>
        <div class="row">{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'pod_comments', null, 2, ' ') !!}</div>

    </div>
</div>
