@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li class="active">Microbiolgy Export</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-adjust"></span>
            Download Microbiology Excel file
        </div>
        <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif

            {{ Form::open(array('route' => 'reports.microbiology.download', 'id' => 'form-create-testcategory')) }}

                <div class="form-group">
                    {{ Form::label('date_from', trans('messages.from')) }}
                    {{ Form::text('date_from', $dateFrom,
                        array('class' => 'form-control standard-datepicker')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('date_to', trans('messages.to')) }}
                    {{ Form::text('date_to', $dateTo,
                        array('class' => 'form-control standard-datepicker')) }}
                </div>
                <div class="form-group actions-row">
                    {{ Form::button("<span class='glyphicon glyphicon-download'></span> Download",
                        array('class' => 'btn btn-primary', 'onclick' => 'submit()')) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop
