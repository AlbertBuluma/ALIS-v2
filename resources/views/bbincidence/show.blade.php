<!DOCTYPE html>
<html lang="en">
<head>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}
<style type="text/css">
  #report_content table, #report_content th, #report_content td {
     /*border: 1px solid black;*/
     font-size:12px;
  }
  #report_content p{
    font-size:12px;
   }
</style>
</head>
    <body>

    <table width="100%" style="font-size:12px;">
        <thead>
            <tr>
                <td>{{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}</td>
                <td colspan="3" style="text-align:center;">
                    <strong><p> {{ strtoupper(Config::get('constants.FACILITY_NAME')) }}<br>
                    {{ strtoupper(Config::get('kblis.address-info')) }}</p>
                    <p>Biosaftey and Biosecurity Incidence Report<br>
                </td>
                <td>
                    {{ HTML::image(Config::get('kblis.organization-logo'),  Config::get('kblis.country') . trans('messages.court-of-arms'), array('width' => '90px')) }}
                </td>
            </tr>
        </thead>
    </table>


        <table class="table table-bordered">
          <tbody>
        <tr>
          <th>ID #</th>
          <td>{{ $bbincidence->serial_no }}</td>

          <th>Facility</th>
          <td>{{ $bbincidence->facility->code }} - {{ $bbincidence->facility->name }}</td>
        </tr>

        <tr>
          <th>Occurrence Date & Time</th>
          <td>{{ date('d M Y', strtotime($bbincidence->occurrence_date)) }} {{ $bbincidence->occurrence_time }}</td>

          <th>Description</th>
          <td>{{ $bbincidence->description }}</td>
        </tr>

        <tr>
          <th>Location</th>
          <td>{{ $bbincidence->lab_section }}</td>

          <th>First Aid / Immediate Actions</th>
          <td>{{ $bbincidence->firstaid }}</td>
        </tr>

        <tr>
          <th>Nature of Incident/Occurrence</th>
          <td>
            @foreach ($bbincidence->bbnature as $nature)
              {{$nature->name}} ({{$nature->priority}}/{{$nature->class}})<br>
            @endforeach
          </td>

          <th>Completion Status</th>
          <td>{{ $bbincidence->status }}</td>
        </tr>

          </tbody>
        </table>

        <table class="table table-bordered">
          <tbody>

        <tr>
          <th>Victim ID</th>
          <td>{{ $bbincidence->personnel_id }}</td>

          <th>Gender</th>
          <td>{{ $bbincidence->personnel_gender }}</td>
        </tr>

        <tr>
          <th>Name</th>
          <td>{{ $bbincidence->personnel_surname }} {{ $bbincidence->personnel_othername }}</td>

          <th>DOB / Age</th>
          <td>{{ $bbincidence->personnel_dob }} / {{ $bbincidence->personnel_age }}</td>
        </tr>

        <tr>
          <th>Category</th>
          <td>{{ $bbincidence->personnel_category }}</td>

          <th>Telephone</th>
          <td>{{ $bbincidence->personnel_telephone }}</td>
        </tr>

        <tr>
          <th>Email</th>
          <td>{{ $bbincidence->personnel_email }}</td>

          <th>Next Of Kin Email</th>
          <td>{{ $bbincidence->nok_email }}</td>
        </tr>

        <tr>
          <th>Next Of Kin Name</th>
          <td>{{ $bbincidence->nok_name }}</td>

          <th>Next Of Kin Telephone</th>
          <td>{{ $bbincidence->nok_telephone }}</td>
        </tr>
          </tbody>
        </table>



        <table class="table table-bordered">
          <tbody>
        <tr>
          <th>Activity being performed</th>
          <td>{{ $bbincidence->task }}</td>

          <th>VHF Patient ULIN</th>
          <td>{{ $bbincidence->ulin }}</td>
        </tr>

        <tr>
          <th>Equipment Code</th>
          <td>{{ $bbincidence->equip_code }}</td>

          <th>Equipment Name</th>
          <td>{{ $bbincidence->equip_name }}</td>
        </tr>

        <tr>
          <th>Reporting Officer</th>
          <td>{{ $bbincidence->officer_fname }} {{ $bbincidence->officer_lname }}</td>

          <th>Designation</th>
          <td>{{ $bbincidence->officer_cadre }}</td>
        </tr>

        <tr>
          <th>Telephone</th>
          <td>{{ $bbincidence->officer_telephone }}</td>
          <td></td>
          <td></td>
        </tr>
          </tbody>
        </table>



        <table class="table table-bordered">
          <tbody>
        <tr>
          <th>Extent/Magnitude of injury</th>
          <td>{{ $bbincidence->extent }}</td>

          <th>Clinical Intervention</th>
          <td>{{ $bbincidence->intervention }}</td>
        </tr>

        <tr>
          <th>Date/Time of Intervention</th>
          <td>{{ $bbincidence->intervention_date }} {{ $bbincidence->intervention_time }}</td>

          <th>Intervention Followup</th>
          <td>{{ $bbincidence->intervention_followup }}</td>
        </tr>

        <tr>
          <th>Medical Officer</th>
          <td>{{ $bbincidence->mo_fname }} {{ $bbincidence->mo_lname }}</td>

          <th>Telephone</th>
          <td>{{ $bbincidence->mo_telephone }}</td>
        </tr>

        <tr>
          <th>Designation</th>
          <td>{{ $bbincidence->mo_designation }}</td>

          <th></th>
          <td></td>
        </tr>
          </tbody>
        </table>


<br>
<br>
<br>
<br>
<br>
<br>
<br>

        <table class="table table-bordered">
          <tbody>
        <tr>
          <th>Cause of Incident</th>
          <td>
            @foreach ($bbincidence->bbcause as $cause)
              {{$cause->causename}}<br>
            @endforeach
          </td>

          <th>Corrective Action</th>
          <td>
            @foreach ($bbincidence->bbaction as $action)
              {{$action->actionname}}<br>
            @endforeach
        </tr>

        <tr>
          <th>Referral Status</th>
          <td>{{ $bbincidence->referral_status }}</td>

          <th>Analysis Date/Time</th>
          <td>{{ $bbincidence->analysis_date }} {{ $bbincidence->analysis_time }}</td>
        </tr>

        <tr>
          <th>Bio-Safety Officer</th>
          <td>{{ $bbincidence->bo_fname }} {{ $bbincidence->bo_lname }}</td>

          <th>Telephone</th>
          <td>{{ $bbincidence->bo_telephone }}</td>
        </tr>

        <tr>
          <th>Designation</th>
          <td>{{ $bbincidence->bo_designation }}</td>

          <th></th>
          <td></td>
        </tr>
          </tbody>
        </table>




        <table class="table table-bordered">
          <tbody>
        <tr>
          <th>Investigation Findings</th>
          <td>{{ $bbincidence->findings }}</td>

          <th>Improvement Plan</th>
          <td>{{ $bbincidence->improvement_plan }}</td>
        </tr>

        <tr>
          <th>Response Date/Time</th>
          <td>{{ $bbincidence->response_date }} {{ $bbincidence->response_time }}</td>

          <th>BRM representative</th>
          <td>{{ $bbincidence->brm_fname }} {{ $bbincidence->brm_lname }}</td>
        </tr>

        <tr>
          <th>Designation</th>
          <td>{{ $bbincidence->brm_designation }}</td>

          <th>Telephone</th>
          <td>{{ $bbincidence->brm_telephone }}</td>
        </tr>
        <tr>
          <th colspan="4">**Record created by {{ $bbincidence->user->name }} at {{ $bbincidence->created_at }}</th>
        </tr>
          </tbody>
        </table>





    </body>
</html>
