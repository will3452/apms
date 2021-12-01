<x-layout>
    <div class="row">
        <div class="col">
            <x-card title="Dashboard">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                @if (auth()->user()->type == 'student')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div>Latest Grades</div>
                                <div>
                                    Total Average: {{auth()->user()->latest_grades_average}}
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="grades"></canvas>
                            </div>
                        </div>
                    </div>
                    <script>


                        const labels = [
                            '1',
                            '2',
                            '3',
                            '4',
                            ];
                            const data = {
                            labels: labels,
                            datasets: [
                                @foreach(auth()->user()->latest_grades as $key=>$items)
                                {
                                    label: `{{\App\Models\Subject::find($key)->name}}`,
                                    backgroundColor: '#{{dechex(rand(0,10000000))}}',
                                    borderColor: '#{{dechex(rand(0,10000000))}}',
                                    data: [
                                        @foreach($items as $item)
                                            {{$item->value}},
                                        @endforeach
                                    ],
                                },
                                @endforeach
                            ]
                            };

                            const config = {
                            type: 'bar',
                            data: data,
                            options: {}
                        };
                        const myChart = new Chart(
                                document.getElementById('grades'),
                                config
                            );
                    </script>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Attendances
                            </div>
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
                                    padding:1px;margin:1px;
                                    background:#D76C7E;
                                }

                                .present {
                                    background:#19CBB1;
                                }
                            </style>
                            @foreach ($dates as $key=>$date)
                                @if ($key % 5 == 0)
                                    <br>
                                @endif
                                <span class="cell {{!auth()->user()->isPresent($date) ? :'present' }}">
                                    {{$date}}
                                </span>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </x-card>
        </div>
    </div>
    <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Personal Information</h4>
                </div>
                <div class="card-body">
                  <form action="/update-profile" method="POST">
                    @csrf
                    @method('PUT')
                      <x-input label="Name" required type="text" value="{{ auth()->user()->name }}" name="name"></x-input>
                      <x-input label="Address" required type="text" value="{{ auth()->user()->address }}" name="address"></x-input>
                      <x-input label="Contact No." required type="text" value="{{ auth()->user()->contact_no }}" name="contact_no"></x-input>
                      <x-input label="Gender" name="gender"  value="{{ auth()->user()->gender }}"></x-input>

                      <x-form-group>
                          <x-button-primary>
                              Update
                          </x-button-primary>
                      </x-form-group>
                  </form>
                </div>
              </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Account Information</h4>
                </div>
                <div class="card-body">
                  <form action="password-change" method="POST">
                    @csrf
                      <x-input name="lrn" required value="{{ auth()->user()->lrn }}" label="LRN" disabled></x-input>
                      <x-input name="email" required value="{{ auth()->user()->email }}" label="email" disabled></x-input>
                      <x-input name="password" label="Change Password" type="password" required></x-input>
                      <x-form-group>
                          <x-button-primary>
                              Update
                          </x-button-primary>
                      </x-form-group>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <x-card-profile
              img="/storage/{{ auth()->user()->picture }}"
              category="{{ auth()->user()->type }}"
              title="{{ auth()->user()->name }}"
              >
                  {{ auth()->user()->lrn }}
                  </x-card-profile>
              @if (auth()->user()->type == 'student')
                  @php
                      $prnt = auth()->user()->guardian;
                  @endphp
                  <x-card-profile
                  category="Parent"
                  title="{{ $prnt->name}}"
                  >
                  </x-card-profile>
              @else
                  <x-card title="Students">
                    <ul class="list-group">
                      @foreach (auth()->user()->students as $item)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->name }}
                            <a href="/user-profile/{{ $item->id }}" class="btn btn-sm btn-primary">show</a>
                          </li>
                      @endforeach
                    </ul>
                  </x-card>
              @endif
            </div>
          </div>
</x-layout>
