@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'bill_of_lading.manifest_report', 'method' => 'POST', 'target' => '_blank']) !!}
    @include('export.oceans.manifest.partials.fields')
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-print">
                <span><i class="fa fa-print fa-2x" aria-hidden="true"></i></span>
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection