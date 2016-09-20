@extends('layouts._tab')

@section('title', 'Adjustments')
@section('table-title', 'List of ajustments')

@section('content')
{!! Form::bsIndex('maintenance.reasons_comments.adjustments.create', 'maintenance.reasons_comments.adjustments.index') !!}
@if (isset($adjustments))
<table class="footable" data-filter="#search" data-filter-timeout="100" data-filter-minimum="1" data-page-size="{{ env('APP_PAGINATE') }}">
    <thead>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($adjustments as $adjustment)
        <tr data-id="{{ $adjustment->id }}">
            <td>{{ strtoupper($adjustment->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.reasons_comments.adjustments.show',
                        'maintenance.reasons_comments.adjustments.edit',
                        'maintenance.reasons_comments.adjustments.destroy',
                        $adjustment
                    )
                !!}
            </td>
        </tr>
        @empty
        <tr>
            <td>No adjustments</td>
        </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <div class="pagination"></div>
            </td>
        </tr>
    </tfoot>
</table>
{!! Form::open(['route' => ['maintenance.reasons_comments.adjustments.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
