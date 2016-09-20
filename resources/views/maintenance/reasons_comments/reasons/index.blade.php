@extends('layouts._tab')

@section('title', 'Reasons')
@section('table-title', 'List of reasons')

@section('content')
{!! Form::bsIndex('maintenance.reasons_comments.reasons.create', 'maintenance.reasons_comments.reasons.index') !!}
@if (isset($reasons))
<table class="footable" data-filter="#search" data-filter-timeout="100" data-filter-minimum="1" data-page-size="{{ env('APP_PAGINATE') }}">
    <thead>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reasons as $reason)
        <tr data-id="{{ $reason->id }}">
            <td>{{ strtoupper($reason->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.reasons_comments.reasons.show',
                        'maintenance.reasons_comments.reasons.edit',
                        'maintenance.reasons_comments.reasons.destroy',
                        $reason
                    )
                !!}
            </td>
        </tr>
        @empty
        <tr>
            <td>No reasons</td>
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
{!! Form::open(['route' => ['maintenance.reasons_comments.reasons.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
