@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a href="{{ URL::route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
          <li class="active">Gram Staining</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <span class="glyphicon glyphicon-adjust"></span>Gram Staining | Lab Id: {{$test->specimen->lab_id }}
                    <a class="btn btn-sm btn-success add-gram-stain-range"
                        data-test-id="{{ $test->id }}"
                        data-url="{{ URL::route('gramstain.store') }}"
                        data-toggle="modal"
                        data-target=".add-gram-stain-range-modal"
                        data-drug-susceptibility-store-url="{{ URL::route('drugsusceptibility.store') }}"
                        title="Add Isolated Organism">
                        <span class="glyphicon glyphicon-plus"></span>
                        Add Gram Staining Result
                    </a>
                </div>
            </div>
        </div>
        <div class="panel-body">
<!-- gram stain range -->
            <div class="row gram-stain-range">
                <div class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Gram Staining</th>
                          <th><!-- Action --></th>
                        </tr>
                      </thead>
                      <tbody class="gram-stain-range-tbody">
                        @foreach($test->gramStainResults as $gramStainResult)
                            <tr class="gram-stain-range-tr-{{$gramStainResult->id}}">
                              <td class="col-md-9 gram-stain-range-entry">{{$gramStainResult->gramStainRange->name}}</td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-danger delete-gram-stain-range"
                                    data-url="{{ URL::route('gramstain.destroy',
                                        [$gramStainResult->id]) }}"
                                    data-id="{{ $gramStainResult->id }}"
                                    title="Delete Gram Stain Result">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete Result
                                </a>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
<!-- save action -->
            @if($test->isCompleted())
            <div class="col-md-12">
                <div class="form-group actions-row">
                    {{ Form::button(
                        '<span class="glyphicon glyphicon-save"></span> '.'Update Results', [
                            'class' => 'btn btn-default save-gram-stain-results',
                            'data-redirect-url' => URL::route('unhls_test.viewDetails',[$test->id]),
                            'data-url' => URL::route('unhls_test.saveResults',[$test->id])]
                    ) }}
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="form-group actions-row">
                    {{ Form::button(
                        '<span class="glyphicon glyphicon-save"></span> '.'Set To Completed', [
                            'class' => 'btn btn-default save-gram-stain-results',
                            'data-redirect-url' => URL::route('unhls_test.viewDetails',[$test->id]),
                            'data-url' => URL::route('unhls_test.saveResults',[$test->id])]
                    ) }}
                </div>
            </div>
            @endif
        </div>
    </div>

<!-- gram stain range -->
                    <table>
                        <tbody class="hidden gramStainRangeEntryLoader">
                            <tr class="new-gram-stain-range-tr">
                              <td class="col-md-9 gram-stain-range-entry"></td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-danger delete-gram-stain-range"
                                    title="Delete Gram Stain Result">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete Result
                                </a>
                              </td>
                            </tr>
                        </tbody>
                    </table>
<!-- MODALS -->
<div class="modal fade add-gram-stain-range-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <span class="glyphicon glyphicon-plus"></span>
                    Add Gram Staining
                </h4>
            </div>
            <div class="modal-body">
                <div class="gram-stain-range-addition">
                    <div class="col-md-12">
                       <div class="form-group">
                           {{ Form::label('gram-stain-range', 'Gram Staining') }}
                       </div>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                          {{ Form::select('name', $gramStainRanges,
                              Input::get('name'), ['class' => 'form-control gram-stain-range-input'])}}
                       </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),[
                'class' => 'btn btn-primary  save-gram-stain-range',
                'data-url' => URL::to('/'),
                'data-test-id' => $test->id,
                'data-dismiss' => 'modal'
                ]) }}
            {{ Form::button(trans('messages.cancel'),
                ['class' => 'btn btn-default cancel-gram-stain-range-addition',
                'data-dismiss' => 'modal']) }}
            </div>
        </div>
    </div>
</div><!-- /.add-gram-stain-range-modal -->
@stop
