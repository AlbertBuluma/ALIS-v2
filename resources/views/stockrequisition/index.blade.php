@extends("layout")
@section("content")
<div>
  <ol class="breadcrumb">
    <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>

    <li class="active">{{ Lang::choice('messages.stock-requisition',2) }}</li>
  </ol>
</div>
@if (Session::has('message'))
  <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div class="row">

  <div class="col-md-12">
    <form class="form-horizontal">
      <fieldset>

         <div class="form-group">
            {{  Form::label('commodity_id', 'Item', array('class'=>'control-label')) }}
              <div class="col-md-4">
                {{ Form::select('commodity_id', array('' => 'Select item') + App\Models\Commodity::pluck('name','id')->toArray(), [], array('class' => 'form-control', 'id' => 'commodity_id', 'required'=>'required')) }}

                @if ($errors->has('commodity_id'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('commodity_id') }}</strong>
                    </span>
                @endif
              </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <a id="btn_get_stock_book" class="btn btn-primary">Submit</a>
            </div>
          </div>

      </fieldset>
    </form>

  </div>

</div>
<hr>
<div class="row hidden" id="stockcard_table">

  <div class="col-md-12">
    <p class="bg-primary col-sm-3">
                  <span class="label"><strong>Item code: <span id="item_code"></span></strong></span>
                </p>
                <p class="bg-primary col-sm-7">
                  <span class="label"><strong>Item description: <span id="item_description"></span></strong></span>
                </p>
                <p class="bg-primary col-sm-2">
                  <span class="label"><strong>Pack size: <span id="item_pack"></span></strong></span>
                </p>
      <div class="panel panel-default">

        <div class="panel-body">


            <div class="table-responsive">
              <table class="table table-condensed table-striped" id="stockbook">

                  <thead>
                    <tr>
                      <th>Period</th>
                      <th class="text-right">Quantity received</th>
                      <th class="text-right">Quantity issued</th>
                      <th class="text-right">Days out of stock</th>
                      <th class="text-right">Losses & Adjustments</th>
                      <th class="text-right">Balance on Hand</th>

                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
            </div>




          <?php Session::put('SOURCE_URL', URL::full());?>
        </div>

      </div>
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function($){

   $('#btn_get_stock_book').click(function(e){

            var data = {
                id: $("#commodity_id").val()
            };

        $.ajax({
            type: 'GET',
            url: '/stockbook/'+$("#commodity_id").val()+'/fetch',
            data: data
        }).done(function(response) {

                $("#stockbook tbody").empty();

                $("#item_code").text(response.commodity.item_code);
                $("#item_description").text(response.commodity.description);

                if(response.results.length>0)
                {

                     $.each(response.results,function( index, value ) {

                      $("#stockbook tbody").append("<tr><td class='text-left'>"+value.month+" "+value.year+"</td><td class='text-right'>"+value.stock_in+"</td><td class='text-right'>"+value.stock_out+"</td><td class='text-right'>0</td><td class='text-right'>"+value.adjustment+"</td><td class='text-right'>"+value.balance+"</td></tr>");

                     });
                }


        }).fail(function (jqXHR, textStatus, errorThrown) {
            //TODO handle fails on note post backs.
            console.log(textStatus + ' : ' + errorThrown);
        });


      $("#stockcard_table").removeClass("hidden").addClass("visible");
  });


});
</script>
@stop
