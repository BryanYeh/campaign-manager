<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> </button>
                        <a href="#" class="navbar-brand">Campaign Manager</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
                    <p class="navbar-text"><a href="{{route('admin-reports')}}">Reports</a></p>
                </div>
            </div>
        </nav>
    <div class="container">
        <div class="col-md-8 col-md-offset-2">

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Region</th>
                        <th>Store Id</th>
                        <th>Store Name</th>
                        <th>Store Region</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supervisors as $supervisor)
                    <tr>
                        <td>{{$supervisor->firstname}} {{$supervisor->lastname}}</td>
                        <td>{{$supervisor->email}}</td>
                        <td>{{$supervisor->region}}</td>
                        <td>@if($supervisor->store){{$supervisor->store->store->id}}@endif</td>
                        <td>@if($supervisor->store){{$supervisor->store->store->name}}@endif</td>
                        <td>@if($supervisor->store){{$supervisor->store->store->region}}@endif</td>
                        <td><a href="{{ route('supervisor-view', ['id' => $supervisor->id,'key' => $supervisor->ownerkey->key]) }}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
