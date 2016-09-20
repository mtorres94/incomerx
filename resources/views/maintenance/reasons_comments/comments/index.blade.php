@extends('layouts._tab')

@section('title', 'Comments')
@section('table-title', 'List of comments')

@section('content')
{!! Form::bsIndex('maintenance.reasons_comments.comments.create', 'maintenance.reasons_comments.comments.index') !!}
@if (isset($comments))
<table class="footable" data-filter="#search" data-filter-timeout="100" data-filter-minimum="1" data-page-size="{{ env('APP_PAGINATE') }}">
    <thead>
        <tr>
            <th>Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($comments as $comment)
        <tr data-id="{{ $comment->id }}">
            <td>{{ strtoupper($comment->name) }}</td>
            <td>
                {!!
                    Form::bsBtnG(
                        'maintenance.reasons_comments.comments.show',
                        'maintenance.reasons_comments.comments.edit',
                        'maintenance.reasons_comments.comments.destroy',
                        $comment
                    )
                !!}
            </td>
        </tr>
        @empty
        <tr>
            <td>No comments</td>
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
{!! Form::open(['route' => ['maintenance.reasons_comments.comments.destroy', ':_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endif
@endsection
