@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
    <li><a href="{{{route('user.home')}}}">{{trans('messages.home')}}</a></li>

    <li class="active">{{ Lang::choice('messages.stock-requisition',2) }}</li>
  </ol>
</div>
@if (Session::has('message'))
  <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif
<div class="panel panel-primary">
  <div class="panel-heading ">
    <span class="glyphicon glyphicon-user"></span>
        Internal Requisition and Issue Voucher
    <div class="panel-btn">

      <a class="btn btn-sm btn-info" href="javascript:void(0)"
                                data-toggle="modal" data-target="#new-stock-modal">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                {{trans('messages.add-stock')}}
      </a>

    </div>
  </div>


  <div class="panel-body">


<div class="table-responsive">
  <table class="table table-striped">
      <thead>
        <tr>
          <th>Issue date</th>
          <th>Item</th>
          <th>Facility</th>
          <th>District</th>
          <th>Year</th>
          <th>Issued to</th>
          <th>Voucher number</th>
          <th>Quantity required</th>
          <th>Quantity issued</th>
          <th>Batch No.</th>
          <th>Balance on Hand</th>
          <th>Initials</th>
        </tr>
      </thead>
      <tbody>
        <td>Aspirin</td>
        <td>20-Jun-2016</td>
        <td></td>
        <td>9016</td>
        <td>20</td>
        <td>10</td>
        <td>10</td>
        <td>3</td>
        <td>2-Feb-2019</td>
        <td>A6y888</td>
        <td></td>
        <td>PA</td>
      </tbody>
  </table>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="new-stock-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Parameters</h4>
      </div>
      <div class="modal-body">
      {{ Form::open(array('url' => 'stockrequisition/create')) }}
      <div class="form-group">
      {{ Form::label('district', 'District', array('class'=>'control-label')) }}
        {{ Form::select('district', array(null => '')+ $districts,
                    old('district'), array('class' => 'form-control', 'id' => 'district-id')) }}
      </div>

        <div class="form-group hidden" id="div-facility">
      {{ Form::label('facility', 'Facility', array('class'=>'control-label')) }}
            <div id="facility-id">

            </div>
        </div>

      <div class="form-group">
      {{ Form::label('year', 'Financial Year', array('class'=>'control-label')) }}
        {{ Form::select('year', array(null => '')+ $years,
                    old('year'), array('class' => 'form-control', 'id' => 'year-id')) }}
      </div>

      <div class="form-group">
      {{ Form::label('item', 'Item', array('class'=>'control-label')) }}
        {{ Form::select('item', array(null => '')+ $items,
                    old('item'), array('class' => 'form-control', 'id' => 'item-id')) }}
      </div>

      <div class="row">
        <div class="col-sm-4">
         <label for="recipient-name" class="control-label">Action</label>
      </div>


                <div class="form-group">
                {{ Form::label('redirect', 'Redirect',array('class'=>'hidden')) }}
                {{ Form::hidden('redirect', 0 ,old('redirect'), array('class' => 'form-control')) }}
            </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Continue</a>
      </div>
    {{ Form::close() }}

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <?php Session::put('SOURCE_URL', URL::full());?>
  </div>

</div>


<script type="text/javascript">
  $(document).ready(function($){
   $('#district-id').change(function(e){

            var data = {
                districtId: e.target.value
            };


        $.ajax({
            type: 'POST',
            url: '/apite/facility',
            data: data
        }).done(function(response) {
          $('#div-facility').removeClass('hidden');
          $('#facility').remove();
          var sel = $('<select>').appendTo('#facility-id');
            sel.attr('id', 'facility').attr('name', 'facility').addClass('form-control');
              $.each(response, function(index,value) {

          console.log(value.id);
          sel.append($('<option>', { value : value.id }).text(value.name));
      });
        }).fail(function (jqXHR, textStatus, errorThrown) {
            //TODO handle fails on note post backs.
            console.log(textStatus + ' : ' + errorThrown);
        });

  });
});
</script>
@stop
