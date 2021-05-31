@extends('site.app')
@section('title', 'Homepage')

@section('content')

  

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="text-align:center">

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    <h1>Sveiki, </h1>
</div>

<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    <h2>Pradėkite planuoti savo keliones jau dabar!</h2>
    
</div>
<br>
<br>
<br>
<a href="{{ route('planner.index') }}"><button type="button" class="btn btn-primary">Planuoti kelionę</button></a>

</div>
</div>

@stop