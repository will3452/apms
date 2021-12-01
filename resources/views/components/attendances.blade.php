<div class="card">
    <div class="card-header">
        {{now()->format('M')}} - Attendances
    </div>
    @props(['user'])
    <div class="card-body">
        @php
        $dates = collect();
        $date = now()->format('F Y');//Current Month Year
        while (strtotime($date) <= strtotime(date('Y-m') . '-' . date('t', strtotime($date)))) {
                if(in_array(date('l', strtotime($date)), ['Sunday', 'Saturday'])) {
                    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));//Adds 1 day onto current date
                    continue;
                }
                $date = date("Y-m-d", strtotime($date));
                $dates->push($date);
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));//Adds 1 day onto current date
        }
        $counting = 0;
    @endphp
    <style>
        .cell {
            background:#D76C7E;
            border:dashed 1px;
            display:inline-block;
            width:20px;
            height:20px;
            position: relative;
            cursor: pointer;
        }

        .absent {
            background:#D76C7E;
        }

        .cell:hover .cell-item {
            visibility: visible;
            z-index: 999;
        }
        .cell-item {
            position: absolute;
            background:#19CBB1;
            width:100px;
            visibility: hidden;
            display: block;
            text-align: center;
            padding:2px;
            border-radius: 2px;
            font-size: 10px;
            bottom: -50px;
        }

        .present {
            background:#19CBB1;

        }
        .not-yet {
            background:#fff !important;
        }
        .dice {
            width: 10px;
            height: 10px;
        }
    </style>
    @foreach ($dates as $key=>$date)
        @if (!$loop->first && $key % 10 == 0)
            <br/>
        @endif
        <span class="cell {{!$user->isPresent($date) ? :'present' }} {{(\Carbon\Carbon::parse($date)->isPast()) ?:'not-yet'}}">
            <span class="cell-item">{{$date}}</span>
        </span>



@endforeach
<div class="d-flex">
    <div class="d-flex align-items-center mr-4">
        <div class="dice present mr-2">
        </div>
        Present
    </div>
    <div class="d-flex align-items-center mr-4">
        <div class="dice absent mr-2">
        </div>
        Absent
    </div>
</div>
    </div>

</div>
