<!DOCTYPE html>
<html>
<head>
    <title>QCCJABOOUTER UPLOAD DATA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            QCCJABOOUTER UPLOAD DATA
        </div>
        
        <div class="card-body">
            @if(Session::has('success'))
            @php($msg = Session::get('success'))
            <div class="alert alert-success" role="alert">
            {{$msg}}
            </div>
            @endif
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            {!! Form::token() !!}
                <input type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Import Data Penalty</button>
                <a class="btn btn-danger" href="{{url('/')}}" style="color: white">Back</a>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>