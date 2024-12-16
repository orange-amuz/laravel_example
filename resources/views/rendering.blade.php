<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h3>지금 내 기분 : 뭔가 재밌는걸~</h3>
    <ul>
      <li><a href="{{ route('index') }}">index</a></li>
      <li><a href="{{ route('page') }}">page</a></li>
      <li><a href="{{ route('blog') }}">blog</a></li>
      <li><a href="{{ route('org') }}">org</a></li>
    </ul>
    <p>
      @foreach (App\Services\Messages::printMessage() as $message)
        {{ $message }} </br>
      @endforeach
    </p>
  </body>
</html>
