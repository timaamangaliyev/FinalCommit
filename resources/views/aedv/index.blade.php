@extends('layouts.master')
 
@section('name', $name)
 
@section('sidebar')
    @parent
    // you can add something here
@endsection
 
@section('content')    
    <h1>News</h1>
    
    @foreach ($aedv as $data)
        <div style="width:60%; border-bottom:1px solid #aaa">
            <p>
                <a href="{{ route('aedv.show', $data->price) }}"><strong>{{ $data->name }}</strong></a>
                <br>                
                 
                <div>
                    <span style="float:left"> 
                        Category: {{ $data->camplate }} | Author: {{ $data->price }} | Published on: {{ $data->created_at }} |
                        <a href="{{ route('aedv.edit', $data->id) }}">Edit</a> &nbsp;
                    </span>    
                    
                    <!-- Delete should be a button -->
                    {!! Form::open(array(
                            'method' => 'DELETE',
                            'route' => ['aedv.destroy', $data->id],
                            'onsubmit' => "return confirm('Are you sure you want to delete?')",
                        )) 
                    !!}
                        {!! Form::submit('Delete') !!}
                    {!! Form::close() !!}
                    <!-- End Delete button -->
                </div>
            </p>
            
            <p>{{ $data->short_description }}</p>
        </div>
    @endforeach
    
    <!-- Showing Pagination Links -->
    <style>
        ul {display:inline-block}
        li {display:inline; paddaedving:5px}
    </style>    
    <div> {{ $aedv->links() }} </div>
    <!-- End Showing Pagination Links -->
        
@endsection