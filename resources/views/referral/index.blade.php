@extends("layout")
@section("content")
<div>
    <ol class="breadcrumb">
      <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
      <li class="active">Referals</li>
    </ol>
</div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-adjust"></span>
        Facilities
        <div class="panel-btn">
            <a class="btn btn-sm btn-info" href="#" >
                <span class="glyphicon glyphicon-plus-sign"></span>
                Add New Facility
            </a>
        </div>
    </div>
    <div class="panel-body">
    	<table class="table table-striped table-hover table-condensed search-table">
            <thead>
                <tr>
                    <th>{{ 'Facility Name' }}</th>
                    <th>{{ 'Attach' }}</th>
                </tr>
            </thead>
            <tbody>
            	 @foreach($referral as $facility)
                <tr>
                    <td>{{ $facility->name }}</td>
                    <td><input type="checkbox" name="facility[]" value="{{ $facility->id }}"> </td>
                    <td>
                    	<a class="btn btn-sm btn-success" href="#" >
                            <span class="glyphicon glyphicon-eye-open"></span>
                            {{ 'Attach' }}
                        </a>
                    </td>


         		</tr>
         		@endforeach
            </tbody>

        </table>
        </div>








</div>
@stop
