<x-layout>
    <div class="row">
        <div class="col">
            <x-card title="Dashboard">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                @if (auth()->user()->type == 'student')
                <div class="row">
                    <div class="col-md-6">
                        <x-grades :user="auth()->user()"></x-grades>
                    </div>

                    <div class="col-md-6">
                        <x-attendances :user="auth()->user()"></x-attendances>
                    </div>
                </div>
                @else
                    @foreach (auth()->user()->students as $user)
                        <div class="card">
                            <div class="card-header">
                                Attendances and Grades Report of {{$user->name}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-grades :user="$user"></x-grades>
                                    </div>

                                    <div class="col-md-6">
                                        <x-attendances :user="$user"></x-attendances>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
