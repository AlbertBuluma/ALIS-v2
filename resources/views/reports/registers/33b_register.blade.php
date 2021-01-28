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
    {{ trans('messages.patient-report') }}
  </div>
  <div class="panel-body">

      @if(Session::has('message'))
      <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
    @endif
      <table id="reports_patients_table" class="row-border hover table table-bordered table-condensed table-striped">

  <tr>
    <td width="101" colspan="2" rowspan="2" valign="top"><p><strong>&nbsp;</strong></p>
        <p><strong>1.    CASES.</strong><strong> </strong></p></td>
    <td width="42" rowspan="2" valign="top"><p><strong>&nbsp;</strong></p>
        <p><strong>Code</strong><strong> </strong></p></td>
    <td width="64" rowspan="2" valign="top"><p><strong>Total Cases this    week</strong><strong> </strong></p></td>
    <td width="97" valign="top"><p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEATH.</strong></p></td>
    <td width="66" rowspan="2" valign="top"><p><strong>&nbsp;</strong></p>
        <p><strong>Tested Cases</strong><strong> </strong></p></td>
    <td width="96" rowspan="2" valign="top"><p><strong>&nbsp;</strong></p>
        <p><strong>Pos(+ve) cases</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="97" valign="top"><p><strong>Total Death this    week</strong><strong> </strong></p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>1 </p></td>
    <td width="75" valign="top"><p>Malaria (diagnosed) </p></td>
    <td width="42" valign="top"><p align="center"><strong>MA.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>2 </p></td>
    <td width="75" valign="top"><p>Dysentery </p></td>
    <td width="42" valign="top"><p align="center"><strong>DY.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>3 </p></td>
    <td width="75" valign="top"><p>Severe    Acute Respiratory Infection (SARI) </p></td>
    <td width="42" valign="top"><p align="center"><strong>SA.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>4 </p></td>
    <td width="75" valign="top"><p>Acute Flaccid Paralysis </p></td>
    <td width="42" valign="top"><p align="center"><strong>AF.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>5 </p></td>
    <td width="75" valign="top"><p>Adverse    Events Following Immuniza- tion (AEFI) </p></td>
    <td width="42" valign="top"><p align="center"><strong>AE.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>6 </p></td>
    <td width="75" valign="top"><p>Animal Bites (suspected rabies) </p></td>
    <td width="42" valign="top"><p align="center"><strong>AB.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>7 </p></td>
    <td width="75" valign="top"><p>Bacterial Meningitis </p></td>
    <td width="42" valign="top"><p align="center"><strong>MG.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>8 </p></td>
    <td width="75" valign="top"><p>Cholera </p></td>
    <td width="42" valign="top"><p align="center"><strong>CH.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>9 </p></td>
    <td width="75" valign="top"><p>Guinea Worm </p></td>
    <td width="42" valign="top"><p align="center"><strong>GW.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>10 </p></td>
    <td width="75" valign="top"><p>Measles </p></td>
    <td width="42" valign="top"><p align="center"><strong>ME.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>11 </p></td>
    <td width="75" valign="top"><p>Neonatal tetanus </p></td>
    <td width="42" valign="top"><p align="center"><strong>NT.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>12 </p></td>
    <td width="75" valign="top"><p>Plague </p></td>
    <td width="42" valign="top"><p align="center"><strong>PL.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>13 </p></td>
    <td width="75" valign="top"><p>Typhoid Fever </p></td>
    <td width="42" valign="top"><p align="center"><strong>TF.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>14 </p></td>
    <td width="75" valign="top"><p>Hepatitis B </p></td>
    <td width="42" valign="top"><p align="center"><strong>HB.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>15 </p></td>
    <td width="75" valign="top"><p>Rifampicin resistant TB cases </p></td>
    <td width="42" valign="top"><p align="center"><strong>DR.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>16 </p></td>
    <td width="75" valign="top"><p>Yellow Fever </p></td>
    <td width="42" valign="top"><p align="center"><strong>YF.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>17 </p></td>
    <td width="75" valign="top"><p>Other    Viral Hemorrhagic Fevers (<strong>EVD,</strong><strong> </strong><br>
            <strong>MVD, RVF,    CCHF)</strong><strong> </strong></p></td>
    <td width="42" valign="top"><p align="center"><strong>VF.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>18 </p></td>
    <td width="75" valign="top"><p>Leprosy </p></td>
    <td width="42" valign="top"><p align="center"><strong>LP.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>19 </p></td>
    <td width="75" valign="top"><p>Anthrax </p></td>
    <td width="42" valign="top"><p align="center"><strong>AX.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>20 </p></td>
    <td width="75" valign="top"><p>Maternal death </p></td>
    <td width="42" valign="top"><p align="center"><strong>MD.</strong><strong> </strong></p></td>
    <td width="64" rowspan="3" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>21 </p></td>
    <td width="75" valign="top"><p>Macerated Still births </p></td>
    <td width="42" valign="top"><p align="center"><strong>MB.</strong><strong> </strong></p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="162" colspan="2" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>22 </p></td>
    <td width="75" valign="top"><p>Fresh Still Birth </p></td>
    <td width="42" valign="top"><p align="center"><strong>FB.</strong><strong> </strong></p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="25" valign="top"><p>23 </p></td>
    <td width="75" valign="top"><p>Early Neonatal deaths 0-7 days </p></td>
    <td width="42" valign="top"><p align="center"><strong>ND.</strong><strong> </strong></p></td>
    <td width="64" valign="top"><p>&nbsp;</p></td>
    <td width="97" valign="top"><p>&nbsp;</p></td>
    <td width="66" valign="top"><p>&nbsp;</p></td>
    <td width="96" valign="top"><p>&nbsp;</p></td>
  </tr>

    </table>
  </div>

</div>
@stop
