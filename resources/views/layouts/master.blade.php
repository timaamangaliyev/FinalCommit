<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @section('header')
            <a href="{{ route('aedv.index') }}">Home</a> | <a href="{{ route('aedv.create') }}">Add aedv</a>
        @show
        
        @if(Session::has('flash_message'))
            <div style="color:green; border:1px solid #aaa; padding:4px; margin-top:10px">
                {{ Session::get('flash_message') }}
            </div>
        @endif
 
        @if($errors->any())
            <div style="color:red; border:1px solid #aaa; padding:4px; margin-top:10px">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div>            
            @yield('content')
        </div>
        
        <div>
            Footer @ 2016
        </div>    
    </body>
</html>