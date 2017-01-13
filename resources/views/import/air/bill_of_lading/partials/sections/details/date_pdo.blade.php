<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Revised Date', 'revised_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Clear Date', 'clear_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Release Date', 'release_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Pick up Date', 'pickup_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Notified Date', 'notified_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Follow up Date', 'follow_up_date', null, ' ') !!}</div>
                <div class="row">{!! Form::bsDate('col-md-5', 'col-md-7', 'Un stuffed Date', 'un_stuffed_date', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'revised_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'clear_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'release_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'pickup_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'notified_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'follow_up_detail', null, ' ') !!}</div>
                <div class="row">{!! Form::bsText('col-md-2', 'col-md-9', '', 'un_stuffed_detail', null, ' ') !!}</div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Date', 'pod_date', null, ' ') !!}</div>
            </div>
            <div class="col-md-6">
                <div class="row">{!! Form::bsDate('col-md-4', 'col-md-6', 'Expected date', 'pod_expected_date', null, ' ') !!}</div>
            </div>
        </div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'Received By', 'received_by', null, ' ') !!}</div>
        <div class="row">{!! Form::bsText('col-md-4', 'col-md-6', 'Incident', 'incident', null, ' ') !!}</div>
        <div class="row">{!! Form::bsMemo('col-md-4', 'col-md-6', 'Notes', 'notes', null, 2, ' ') !!}</div>
    </div>
</div>
