@extends("layout")
@section("content")

    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
          <li><a href="{{ URL::route('unhls_test.index') }}">{{ Lang::choice('messages.test',2) }}</a></li>
          <li class="active">Culture and Sensitivity</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <span class="glyphicon glyphicon-adjust"></span>Culture and Sensitivity
                    <a class="btn btn-sm btn-success add-isolated-organism"
                        data-test-id="{{ $test->id }}"
                        data-url="{{ URL::route('isolatedorganism.store') }}"
                        data-toggle="modal"
                        data-target=".add-isolated-organism-modal"
                        data-drug-susceptibility-store-url="{{ URL::route('drugsusceptibility.store') }}"
                        title="Add Isolated Organism">
                        <span class="glyphicon glyphicon-plus"></span>
                        Add Isolated Organism
                    </a>
                </div>
            </div>
        </div>
        <div class="panel-body">
<!-- isolated organism -->
            <div class="row isolated-organism">
                <div class="col-md-12">Organisms Isolated
                </div>
                <div class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Organisms</th>
                          <th><!-- Action --></th>
                        </tr>
                      </thead>
                      <tbody class="isolated-organism-tbody">
                        @foreach($test->isolated_organisms as $isolated_organism)
                            <tr class="isolated-organism-tr-{{$isolated_organism->id}}">
                              <td class="col-md-9 isolated-organism-entry">{{$isolated_organism->organism->name}}</td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-success add-drug-susceptibility"
                                    data-url="{{ URL::route('drugsusceptibility.store') }}"
                                    data-antibiotics-url="{{ URL::route('organismantibiotic.show', [$isolated_organism->organism->id]) }}"
                                    data-isolated-organism-id="{{ $isolated_organism->id }}"
                                    data-isolated-organism-name="{{ $isolated_organism->organism->name }}"
                                    data-organism-id="{{ $isolated_organism->organism->id }}"
                                    data-verb="POST"
                                    data-toggle="modal"
                                    data-target=".add-drug-susceptibility-test-modal"
                                    title="Add Susceptibility Test Results">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Add Antibiotic
                                </a>
                                <a class="btn btn-sm btn-danger delete-isolated-organism"
                                    data-url="{{ URL::route('isolatedorganism.destroy',
                                        [$isolated_organism->id]) }}"
                                    data-id="{{ $isolated_organism->id }}"
                                    title="Delete Organism">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete Organism
                                </a>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
<!-- drug susceptibility -->
            <div class="row drug-susceptibility">
                <h5 class="col-md-12">Drug Susceptibility</h5>
                <div class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Organism</th>
                          <th>Drug</th>
                          <th>Zone Diameter</th>
                          <th>Result</th>
                          <th><!-- Action --></th>
                        </tr>
                      </thead>
                      <tbody class="drug-susceptibility-tbody">
                        @foreach($test->isolated_organisms as $isolated_organism)
                            @foreach($isolated_organism->drug_susceptibilities as $drug_susceptibility)
                            <tr class="drug-susceptibility-tr-{{$drug_susceptibility->id}}">
                              <td class="col-md-3 isolated-organism-entry">
                                {{$isolated_organism->organism->name}}</td>
                              <td class="col-md-3 drug-entry">
                                {{$drug_susceptibility->drug->name}}</td>
                              <td class="col-md-3 zone-diameter-entry">
                                  {{$drug_susceptibility->zone_diameter}}</td>
                              <td class="col-md-1 result-entry">
                                {{$drug_susceptibility->drug_susceptibility_measure->interpretation}}</td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-info edit-drug-susceptibility"
                                    data-url="{{ URL::route('drugsusceptibility.update',
                                        [$drug_susceptibility->id]) }}"
                                    data-id="{{ $drug_susceptibility->id }}"
                                    data-antibiotics-url="{{ URL::route('organismantibiotic.show',
                                        [$drug_susceptibility->isolated_organism->organism->id]) }}"
                                    data-drug-id="{{ $drug_susceptibility->drug_id }}"
                                    data-isolated-organism-id="{{ $drug_susceptibility->isolated_organism_id }}"
                                    data-zone-diameter="{{$drug_susceptibility->zone_diameter}}"
                                    data-organism-id="{{ $drug_susceptibility->isolated_organism->organism->id }}"
                                    data-drug-susceptibility-measure-id="{{
                                        $drug_susceptibility->drug_susceptibility_measure_id }}"
                                    data-verb="PUT"
                                    data-toggle="modal"
                                    data-target=".add-drug-susceptibility-test-modal"
                                    title="Edit Susceptibility Test Result">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger delete-drug-susceptibility"
                                    data-url="{{ URL::route('drugsusceptibility.destroy',
                                        [$drug_susceptibility->id]) }}"
                                    data-id="{{ $drug_susceptibility->id }}"
                                    title="Delete Susceptibility Test Result">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                              </td>
                            </tr>
                            @endforeach
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
<!-- culture observation -->
            <div class="row culture-worksheet">
            @if($test->culture_observation)
                <div class="col-md-12">
                    Comments: <span class="observation-entry">{{$test->culture_observation->observation}}</span>
                </div>
            @endif

            </div>
            @if(!$test->isCompleted())
            <div class="col-md-12">
                <div class="form-group actions-row">
                @if(!$test->culture_observation)
                    <a class="btn btn-sm btn-success add-culture-observation"
                        data-url="{{ URL::route('cultureobservation.store') }}"
                        data-test-id="{{ $test->id }}"
                        data-verb="POST"
                        data-toggle="modal"
                        data-target=".add-culture-observation-modal"
                        title="Add Observation">
                        <span class="glyphicon glyphicon-plus"></span>
                        Add Comment
                    </a>
                @endif
                @if($test->culture_observation)
                    <a class="btn btn-sm btn-info edit-culture-observation"
                        data-url="{{ URL::route('cultureobservation.update',
                            [$test->culture_observation->id]) }}"
                        data-toggle="modal"
                        data-verb="PUT"
                        data-id="{{ $test->culture_observation->id }}"
                        data-target=".add-culture-observation-modal"
                        data-observation="{{ $test->culture_observation->observation }}"
                        title="Edit Observation">
                        <span class="glyphicon glyphicon-edit"></span>
                        Edit Comment
                    </a>
                @endif
                    {{ Form::button(
                        '<span class="glyphicon glyphicon-save"></span> '.trans('messages.set-to-completed'),
                            ['class' => 'btn btn-primary prepare-culture-sensitivity-completion']
                    ) }}
                </div>
            </div>
            @endif
            <div class="col-md-12 hidden complete-culture-sensitivity">
                <div class="form-group">
                    <div class="form-group">
                        {{ Form::label('interpretation', trans('messages.comment')) }}
                        {{ Form::textarea('interpretation', Input::old('interpretation'),
                            ['class' => 'form-control interpretation', 'rows' => '2']) }}
                    </div>
                </div>
                <div class="form-group actions-row">
                    {{ Form::button(
                        '<span class="glyphicon glyphicon-save"></span> '.trans('messages.submit'), [
                            'class' => 'btn btn-primary submit-completed-culture-sensitivity-analysis',
                            'data-redirect-url' => URL::route('unhls_test.viewDetails',[$test->id]),
                            'data-url' => URL::route('unhls_test.saveResults',[$test->id])]
                    ) }}
                    {{ Form::button(trans('messages.cancel'),
                        ['class' => 'btn btn-default cancel-completion-of-culture-sensitivity-analysis']) }}
                </div>
            </div>
        </div>
    </div>

<!-- isolated organism -->
                    <table>
                        <tbody class="hidden isolatedOrganismEntryLoader">
                            <tr class="new-isolated-organism-tr">
                              <td class="col-md-9 isolated-organism-entry"></td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-success add-drug-susceptibility"
                                    data-verb="POST"
                                    data-toggle="modal"
                                    data-target=".add-drug-susceptibility-test-modal"
                                    title="Add Susceptibility Test Results">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Add Antibiotic
                                </a>
                                <a class="btn btn-sm btn-danger delete-isolated-organism"
                                    data-url-verb="DELETE"
                                    title="Delete Organism">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete Organism
                                </a>
                              </td>
                            </tr>
                        </tbody>
                    </table>
<!-- drug susceptibility -->
                    <table>
                        <tbody class="hidden drugSusceptibilityEntryLoader">
                            <tr class="new-drug-susceptibility-tr">
                              <td class="col-md-3 isolated-organism-entry"></td>
                              <td class="col-md-3 drug-entry"></td>
                              <td class="col-md-3 zone-diameter-entry"></td>
                              <td class="col-md-1 result-entry"></td>
                              <td class="col-md-3">
                                <a class="btn btn-sm btn-info edit-drug-susceptibility"
                                    data-verb="PUT"
                                    data-toggle="modal"
                                    data-target=".add-drug-susceptibility-test-modal"
                                    title="Edit Susceptibility Test Result">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a class="btn btn-sm btn-danger delete-drug-susceptibility"
                                    data-url-verb="DELETE"
                                    title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                              </td>
                            </tr>
                        </tbody>
                    </table>
<!-- MODALS -->
<div class="modal fade add-culture-observation-modal"
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
                    Comment
                </h4>
            </div>
            <div class="modal-body">
                <div class="culture-observation">
                    <div class="form-group">
                        {{ Form::label('observation', 'Comment') }}
                        <textarea  class="form-control observation" name="observation">
                        @if($test->culture_observation)
                            {{ $test->culture_observation->observation }}
                        @endif
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
                array('class' => 'btn btn-primary  save-culture-observation',
                'data-dismiss' => 'modal')) }}
            {{ Form::button(trans('messages.cancel'),
                ['class' => 'btn btn-default cancel-culture-observation-edition',
                'data-dismiss' => 'modal']) }}
            </div>
        </div>
    </div>
</div><!-- /.add-culture-observation-modal -->
<div class="modal fade add-isolated-organism-modal"
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
                    Add Organism Isolated
                </h4>
            </div>
            <div class="modal-body">
                <div class="isolated-organism-addition">
                    <div class="col-md-12">
                       <div class="form-group">
                           {{ Form::label('isolated-organism', 'Organism Isolated') }}
                       </div>
                    </div>
                    <div class="col-md-12">
                       <div class="form-group">
                           <select class="form-control isolated-organism-input" name="isolated-organism">
                               @foreach($organisms as $key => $organism)
                                   <option value="{{$key}}">{{$organism}}</option>
                               @endforeach
                           </select>
                       </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),[
                'class' => 'btn btn-primary  save-isolated-organism',
                'data-antibiotics-url' => URL::to('/'),
                'data-dismiss' => 'modal'
                ]) }}
            {{ Form::button(trans('messages.cancel'),
                ['class' => 'btn btn-default cancel-isolated-organism-addition',
                'data-dismiss' => 'modal']) }}
            </div>
        </div>
    </div>
</div><!-- /.add-isolated-organism-modal -->
<div class="modal fade add-drug-susceptibility-test-modal"
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
                    Drug Susceptibility Test Result
                </h4>
            </div>
            <div class="modal-body">
                <input class="organism" name="organism" type="hidden">
                <div class="susceptibility-result">
                <h5 class="col-md-12 isolated-organism-input-header"></h5>
                    <div class="drugs">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('drug', 'Antibiotic') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('zone_diameter', 'Zone Diameter') }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('susceptibility', 'Susceptibility') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control drug" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::text('zone_diameter', Input::old('zone_diameter'),
                                        array('class' => 'form-control zone-diameter')) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::select('susceptibility', $drugSusceptibilityMeasures,
                                        Input::old('susceptibility'), array('class' => 'form-control susceptibility')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            {{ Form::button("<span class='glyphicon glyphicon-save'></span> ".trans('messages.save'),
                ['class' => 'btn btn-primary  save-drug-susceptibility',
                    'data-dismiss' => 'modal']) }}
            {{ Form::button(trans('messages.cancel'),
                ['class' => 'btn btn-default cancel-drug-susceptibility-edition',
                    'data-dismiss' => 'modal']) }}
            </div>
        </div>
    </div>
</div><!-- /.add-drug-susceptibility-modal -->
@stop
