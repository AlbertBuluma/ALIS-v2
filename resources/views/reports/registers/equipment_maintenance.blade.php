@extends("layout")
@section("content")
  <div>
    <ol class="breadcrumb">
      <li><a href="{{{route('user.home')}}}">{{ trans('messages.home') }}</a></li>
      <li class="active">{{ Lang::choice('messages.report', 2) }}</li>
    </ol>
  </div>

  <br>
<div class="panel panel-primary">
  <div class="panel-heading ">
    <span class="glyphicon glyphicon-user"></span>
    Equipment Maintenance register
  </div>
  <div class="panel-body">

      @if(Session::has('message'))
      <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
      <table id="reports_patients_table" class="row-border hover table table-bordered table-condensed table-striped">

        <tr>
          <th scope="col"><strong>1.&nbsp;&nbsp;Date (DD/MM/YY)</strong></th>
          <th scope="col"><strong>2. Type of maintenance (preventive or curative/repair or calibration)</strong></th>
          <th scope="col"><p><strong>3.</strong></p>
          <p><strong>Frequency of maintenance</strong></p></th>
          <th scope="col"><p><strong>4.Next service date</strong></p>
          <p><strong>(</strong><strong>DD/MM/YYYY</strong><strong>)</strong></p></th>
          <th scope="col"><strong>5. Name of person carrying out maintenance</strong></th>
          <th scope="col"><p><strong>6. Equipment maintained by:</strong></p>
            <p><strong>a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>Biomedical engineer</strong></p>
          <p><strong>b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>Lab person</strong></p></th>
          <th scope="col"><strong>7. Contact of person carrying out maintenance</strong></th>
          <th scope="col"><strong>8. Comments</strong></th>
          <th scope="col"><strong>9. Signature</strong></th>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

    </table>
  </div>

</div>
@stop
