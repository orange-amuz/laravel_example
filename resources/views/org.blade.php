<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div>
      <a href="{{ route('index') }}">index<a>
    </div>
    @foreach ($divisions as $division)
      <ul style='list-style-type: none; display: flex; flex-direction: row; align-items: baseline;'>
        <li><h1>{{ $division['title'] }}</h1></li>
        <li><h3 style='padding-left: 10px'>대장 : {{ $division['user']['name'] ?? "공석" }}</h3></li>
      </ul>
      <div style='padding-left: 20px'>
        @if ($division['departments'] != null)
          @foreach ($division['departments'] as $department)
            <ul style='list-style-type: none; display: flex; flex-direction: row; align-items: baseline;'>
              <li><h2>{{ $department['title'] }}</h2></li>
              <li><h3 style='padding-left: 10px'>대장 : {{ $department['user']['name'] ?? "공석" }}</h3></li>
            </ul>
            <div style='padding-left: 20px'>
              @if ($department['teams'] != null)
                @foreach ($department['teams'] as $team)
                  <ul style='list-style-type: none; display: flex; flex-direction: row; align-items: baseline;'>
                    <li><h3>{{ $team['title'] }}</h3></li>
                    <li><h3 style='padding-left: 10px'>대장 : {{ $team['leader']['name'] ?? "공석"}}</h3></li>
                  </ul>
                  <div style='padding-left: 20px'>
                    <ul style='list-style-type: none;'>
                    @foreach ($team['users'] as $user)
                      <li><p>{{ $user['name'] }}</p></li>
                    @endforeach
                    </ul>
                  </div>
                @endforeach

              @endif
            </div>
          @endforeach
        @endif
      </div>
    @endforeach
  </body>
</html>
