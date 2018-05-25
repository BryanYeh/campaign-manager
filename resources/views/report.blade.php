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
                    <p class="navbar-text"><a href="{{route('admin-view')}}">Admin Home</a></p>
                </div>
            </div>
        </nav>
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h3>Stores</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Store Name</th>
                        <th>Type</th>
                        <th>Region</th>
                        <th>Host Id</th>
                        <th>Distance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores as $store)
                    <tr>
                        <td>{{$store['id']}}</td>
                        <td>{{$store['name']}}</td>
                        <td>{{$store['type']}}</td>
                        <td>{{$store['region']}}</td>
                        <td>@if($store['type'] == 'Surrounding'){{$store['host_id']}}@endif</td>
                        <td>@if($store['type'] == 'Surrounding'){{$store['distance']}} miles @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach($typesTotal as $key => $value)
            <p><strong>{{$key}}</strong>: {{$value}}</p>
            @endforeach
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
