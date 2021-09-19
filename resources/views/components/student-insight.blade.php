@props(['user'=>auth()->user()])
<x-row>
<x-col>
    <x-card title="MY GRADES / TRANSCRIPTS" >
        <div class="d-flex justify-content-between">
            <form action="" class="mb-2" id="gradeChanger">
                <select name="grade" id="">
                    <option value="" selected disabled>---</option>
                    @foreach (App\Models\Year::get() as $year)
                        <option {{ request()->grade == '' }} value="{{ $year->value }}">{{ $year->label }}</option>
                    @endforeach
                </select>
                <button>submit</button>
            </form>
            @php
                $latestGrade = null;
                if(request()->has('grade')){
                    $latestGrade = request()->grade;
                }else {
                    $latestGrade = $user->grades()->orderBy('year', 'DESC')->first()->year;
                }
                $year = $user->grades()->where('year', $latestGrade)->get();
                $subjects = $year->where('quarter', 1)->pluck('subject_id');
                $q1 = collect();
                $q2 = collect();
                $q3 = collect();
                $q4 = collect();
            @endphp
        </div>
        <div id="cardPrint">
            <style>
                @media print {
                    table,td,th{
                        border:2px solid #000;
                        text-align:left;
                        border-collapse: collapse;
                    }
                }
            </style>
            <table class="table table-bordered table-sm" style="width:100%;">
                <thead>
                    <tr>
                        <th colspan="6" class="text-center">
                            Year {{ $latestGrade }}
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="text-center">
                            Subject
                        </th>
                        <th colspan="5" class="text-center">
                            Quarter 
                        </th>
                    </tr>
                    <tr class="text-center">
                        <td>
                            1
                        </td>
                        <td>
                            2
                        </td>
                        <td>
                            3
                        </td>
                        <td>
                            4
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $sub)
                        <tr class="text-center">
                            <td class="text-center">
                                {{ App\Models\Subject::find((int)$sub)->name }}
                            </td>
                            <td>
                                @php 
                                $q = $user->grades()->where('subject_id', $sub)->whereQuarter(1)->first();
                                @endphp
                                @if ($q)    
                                    {{ 
                                    $q->value;
                                    }}
                                    @php 
                                    $q1->push($q->value);
                                    @endphp
                                @else 
                                    -
                                @endif
                            </td>
                            <td>
                                @php 
                                $q = $user->grades()->where('subject_id', $sub)->whereQuarter(2)->first();
                                @endphp
                                @if ($q)     
                                    {{
                                    $q->value;
                                    }}
                                    @php 
                                    $q2->push($q->value);
                                    @endphp
                                @else 
                                    -
                                @endif
                            </td>
                            <td>
                                @php 
                                $q = $user->grades()->where('subject_id', $sub)->whereQuarter(3)->first();
                                @endphp
                                @if ($q)    
                                    {{ 
                                    $q->value;
                                    }}
                                    @php 
                                    $q3->push($q->value);
                                    @endphp
                                @else 
                                    -
                                @endif
                            </td>
                            <td>
                                @php 
                                $q = $user->grades()->where('subject_id', $sub)->whereQuarter(4)->first();
                                @endphp
                                @if ($q)    
                                    {{ 
                                    $q->value;
                                    }}
                                    @php 
                                    $q4->push($q->value);
                                    @endphp
                                @else 
                                    -
                                @endif
                            </td>
                        </tr>
                        
                    @endforeach
                    <tr class="text-center bg-success">
                            <th>
                                AVERAGES
                            </th>
                            <td>
                                {{ !$q1->avg()?'-': $q1->avg()}}
                            </td>
                            <td>
                                {{ !$q2->avg()?'-': $q2->avg()}}
                            </td>
                            <td>
                                {{ !$q3->avg()?'-': $q3->avg()}}
                            </td>
                            <td>
                                {{ !$q4->avg()?'-': $q4->avg()}}
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <a href="#" class="btn btn-primary" onclick="printJS({
            header:`<p>{{ $user->name }} - {{ $user->lrn }}</p>`,
            printable:'cardPrint',
            type:'html',
        })">Print</a>
        <a href="/grades/{{ $user->lrn }}" class="btn btn-secondary">View All Grades</a>
    </x-card>
    <x-card title="CLASSES" class="mt-2">
        <x-dtable class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        S.Y
                    </th>
                    <th>
                        
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($user->classes()->latest()->get() as $class)
                <tr>
                    <td>
                        {{ $class->name }}
                    </td>
                    <th>
                        {{ $class->created_at->format('Y') }}
                    </th>
                    <td class="text-right">
                        <a href="/class-room/{{ $class->id }}">
                            <button class="btn btn-success btn-sm">show</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </x-dtable>
    </x-card>
</x-col>
</x-row>
<x-row class="mt-2">
    <x-col>
        <x-card title="ATTENDANCES">
            <x-dtable class="table table-sm table-bordered">
                <thead>
                    <th>
                        Subject
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Teacher
                    </th>
                </thead>
                <tbody>
                    @php
                        $user->load('attendances')
                    @endphp
                    @foreach ($user->attendances as $att)
                        <tr>
                            <td>
                                {{ $att->subject->name }}
                            </td>
                            <td>
                                {{ $att->created_at->format('M/d/y h:i a') }}
                            </td>
                            <td>
                                {{ $att->teacher->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-dtable>
        </x-card>
    </x-col>
</x-row>