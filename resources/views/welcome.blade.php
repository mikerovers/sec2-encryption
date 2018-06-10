<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <div class="container">
            @if(Session::has('status'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
            @endif
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <h1>Encrypt-R-Us</h1>
                    {!! Form::open(['url' => route('postEncryptMessage'), 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('message', 'Message') !!}
                            {!! Form::text('message', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Send!') !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h1>Decrypt-R-Us</h1>
                    {!! Form::open(['url' => route('postDecryptMessage'), 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('id', 'ID') !!}
                            {!! Form::text('id', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Send!') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
