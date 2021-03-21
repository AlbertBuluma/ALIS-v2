<html>
<head>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
</head>
<body>
@include("reportHeader")
<style>
    table, th, td{
        border: 1px solid black;
        padding: 10px;
    }
</style>
<div id="content">
    <strong>
        <p>
            {{trans('messages.rejected-specimen')}}
            @if($testCategory)
                {{' - '.App\Models\TestCategory::find($testCategory)->name}}
            @endif
            @if($testType)
                {{' ('.App\Models\TestType::find($testType)->name.') '}}
            @endif
            <?php $from = isset($input['start'])?$input['start']:date('Y-m-d'); ?>
            <?php $to = isset($input['end'])?$input['end']:date('Y-m-d'); ?>
            @if($from!=$to)
                {{trans('messages.from').' '.$from.' '.trans('messages.to').' '.$to}}
            @else
                {{trans('messages.for').' '.date('d-m-Y')}}
            @endif
        </p>
    </strong>
    <br>
    <table class="table table-bordered">
        <tbody>
        <th>{{trans('messages.specimen-number-title')}}</th>
        <th>{{trans('messages.specimen')}}</th>
        <th>{{trans('messages.lab-receipt-date')}}</th>
        <th>{{ Lang::choice('messages.test', 2) }}</th>
        <th>{{Lang::choice('messages.test-category', 1)}}</th>
        <th>{{trans('messages.rejection-reason-title')}}</th>
        <th>{{trans('messages.reject-explained-to')}}</th>
        <th>{{trans('messages.date-rejected')}}</th>
        @forelse($test_specimen as $specimen)
            <tr>
                <td>{{ $specimen->getSpecimenId() }}</td>
                <td>{{ $specimen->specimen->specimentype->name }}</td>
                <td>{{ $specimen->specimen->time_accepted }}</td>
                <td>{{ $specimen->testType->name }}</td>
                <td>{{ $specimen->testType->testCategory->name }}</td>
                <td><ul>
                        @foreach(getRejectionReasons($specimen->id) as $reason)
                            <li>{{ $reason->reason }}</li>
                        @endforeach
                    </ul></td>
                <td>{{ $specimen->analyticSpecimenRejections->reject_explained_to }}</td>
                <td>{{ $specimen->analyticSpecimenRejections->time_rejected }}</td>
            </tr>
        @empty
            <tr><td colspan="8">{{trans('messages.no-records-found')}}</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
