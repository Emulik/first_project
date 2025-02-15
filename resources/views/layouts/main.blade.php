<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('post.index')}}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about.index')}}">About</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
   @yield('content')
</div>

</body>
</html>