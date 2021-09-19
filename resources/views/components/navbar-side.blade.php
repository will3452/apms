@auth
    <div class="sidebar" data-color="purple" data-background-color="white" style="background:#fff;">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo" style="background:#fff;">
        <div class="text-center">
            {{ config('app.name') }}
        </div>
      </div>
      <div class="sidebar-wrapper" style="background:#fff;">
        <ul class="nav">
          <x-nav-item link="{{ url('home') }}" icon="face">
            Profile
          </x-nav-item>

          @if (auth()->user()->type == 'student')
              <x-nav-item link="{{ url('grades/'.auth()->user()->id) }}" icon="library_books">
                My Grades
              </x-nav-item>

              <x-nav-item link="{{ url('class/'.auth()->user()->id) }}" icon="class">
                My Classes
              </x-nav-item>

              <x-nav-item link="{{ url('activities') }}" icon="task">
                My Activities
              </x-nav-item>

               <x-nav-item link="{{ url('certificates') }}" icon="badge">
                My Certificates
              </x-nav-item>
          @endif
          
          <x-nav-item link="{{ url('announcement') }}" icon="campaign">
            Announcements
          </x-nav-item>

          <x-nav-item link="{{ url('messages') }}" icon="mail">
            Messages
          </x-nav-item>

          <x-nav-item link="{{ url('write-message') }}" icon="create">
            Write Message
          </x-nav-item>
          
          <x-nav-item link="{{ url('recognitions') }}" icon="emoji_events">
            Recognitions
          </x-nav-item>

          <x-nav-item link="{{ url('logout') }}" icon="settings_power">
            Logout
          </x-nav-item>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
@endauth