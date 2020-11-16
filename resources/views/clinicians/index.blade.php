@extends("layout")
@section("content")
<div>
    <ol class="breadcrumb">
      <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
      <li class="active">Clinicians</li>
    </ol>
</div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-adjust"></span>
        Clinicians
        <div class="panel-btn">
            <a class="btn btn-sm btn-info" href="{{ URL::to("clinicians/create") }}" >
                <span class="glyphicon glyphicon-plus-sign"></span>
                Create Clinician
            </a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed search-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Cadre</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($clinicians as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->cadre }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>

                    <!-- show the clinician (uses the show method found at GET /ward/{id} -->
                        <a class="btn btn-sm btn-success" href="{{ URL::to("clinicians/" . $value->id) }}" >
                            <span class="glyphicon glyphicon-eye-open"></span>
                            {{ trans('messages.view') }}
                        </a>

                    <!-- edit this clinician (uses edit method found at GET /ward/{id}/edit -->
                        <a class="btn btn-sm btn-info" href="{{ URL::to("clinicians/" . $value->id . "/edit") }}" >
                            <span class="glyphicon glyphicon-edit"></span>
                            {{ trans('messages.edit') }}
                        </a>
                        
                    <!-- delete this clinician (uses delete method found at GET /ward/{id}/delete -->
                       <!-- {{ Form::open(['route' => ['clinicians.destroy', $value->id], 'method' => 'DELETE',
                            'style' => 'display: inline-block;']) }}
                        <button class="btn btn-sm btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                            {{ trans('messages.delete') }}
                        </button>
                        {{ Form::close() }}
                    -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
