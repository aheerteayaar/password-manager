<!DOCTYPE html>
<html>
<head>
    <title>Password Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Password Manager - MavinLink
    </div> 
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf
       <div class="form-group">
       <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Projects</label>
        </div>
        <select class="custom-select" name="projects" id="projects">
        <option selected>Choose...</option>
        @foreach ($items as $item)
          <option value="{{ $item->id }}">{{ $item->project_title}}</option>
          @endforeach
        </select>
</div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password Text</label>
          <input name="password" id="password" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</form>
<form method="GET" class="my-3">
        <div class="input-group mb-3">
            <input 
                type="text" 
                name="search" 
                value="{{ request()->get('search') }}" 
                class="form-control" 
                placeholder="Search..." 
                aria-label="Search" 
                aria-describedby="button-addon2">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
  

    
<!-- @foreach($getPasswords as $pass)
      <li> {{ $pass->project_title   }} -> {{ $pass->password   }} </li>
    @endforeach -->
   

    <!-- <ul class="list-group mt-3">
      @if(request()->get('search'))
          @forelse($getData as $user)
            <li class="list-group-item">{{ $user->project_title }} - {{ $user->password }} - {{ $user->title }}</li>
         @empty
            <li class="list-group-item list-group-item-danger">Not Found.</li>
          @endforelse
      @endif
    </ul> -->

    @if(request()->get('search'))
     <table class="my-2 table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <!-- <th scope="col">Projects</th> -->
            <th scope="col">Title</th>
            <th scope="col">Password</th>
          </tr>
        </thead>
        @forelse($getData as $pass)
      <tbody>
        <tr>
          <th scope="row"> {{ $loop->index + 1 }}</th>
          <!-- <td>{{ $pass->project_title   }}</td> -->
          <td>{{ $pass->title   }}</td>
          <td>{{ $pass->password   }}</td>
        </tr>
      </tbody>
      @empty
        <li class="list-group-item list-group-item-danger">Not Found.</li>
      @endforelse
  @endif
</table>





    
  <table class="my-2 table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Projects</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  @foreach($getPasswords as $pass)
  <tbody>
    <tr>
      <th scope="row"> {{ $loop->index + 1 }}</th>
      <td>{{ $pass->project_title   }}</td>
      <td>{{ $pass->password   }}</td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>  
</body>
</html>