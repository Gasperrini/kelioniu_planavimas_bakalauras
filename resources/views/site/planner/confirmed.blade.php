@extends('site.app')
@section('title', 'Homepage')

@section('content')

  

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="text-align:center">

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    <h2>Jūsų kelionė išsaugota!</h2>
    
</div>
<br>
<br>
<br>
<button type="button" class="btn btn-primary"><a href="{{ route('planner.index') }}">Planuoti naują kelionę</a></button>

</div>
</div>

@stop