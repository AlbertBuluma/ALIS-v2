@extends("layout")
@section("content")
<div>
    <ol class="breadcrumb">
      <li><a href="{{ route('user.home') }}">{{ trans('messages.home') }}</a></li>
      <li class="active">Health Units</li>
    </ol>
</div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-adjust"></span>
        Health Units
        <div class="panel-btn">
            <a class="btn btn-sm btn-info" href="{{ URL::to("ward/create") }}" >
                <span class="glyphicon glyphicon-plus-sign"></span>
                Create Health Unit
            </a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed search-table">
            <thead>
                <tr>
                    <th>{{ Lang::choice('messages.name',1) }}</th>
                    <th>{{ trans('messages.description') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($ward as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->description }}</td>

                    <td>

                    <!-- show the ward (uses the show method found at GET /ward/{id} -->
                        <a class="btn btn-sm btn-success" href="{{ URL::to("ward/" . $value->id) }}" >
                            <span class="glyphicon glyphicon-eye-open"></span>
                            {{ trans('messages.view') }}
                        </a>

                    <!-- edit this ward (uses edit method found at GET /ward/{id}/edit -->
                        <a class="btn btn-sm btn-info" href="{{ URL::to("ward/" . $value->id . "/edit") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            {{ trans('messages.edit') }}
                        </a>

                    <!-- delete this ward (uses delete method found at GET /ward/{id}/delete -->
                        {{ Form::open(['route' => ['ward.destroy', $value->id], 'method' => 'DELETE',
                            'style' => 'display: inline-block;']) }}
                        <button class="btn btn-sm btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                            {{ trans('messages.delete') }}
                        </button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
