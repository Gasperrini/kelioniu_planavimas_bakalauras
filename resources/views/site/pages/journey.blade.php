@extends('site.app')
@section('title', $journey->name)
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">{{ $journey->name }}</h2>
    </div>
</section>
<table class="table" id="land_table">
                    <thead>
                        <tr>
                        <th scope="col">Išvykimo laikas</th>
                        <th scope="col">Grįžimo laikas</th>
                        <th scope="col">Išvykimas iš:</th>
                        <th scope="col">Atvykimas į:</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>    
                              <td>{{ $journey->start_time }}</th>
                              <td>{{ $journey->end_time }}</th>
                              <td>{{ $journey->start_point }}</th>
                              <td>{{ $journey->end_point }}</th>
                              <td>{{ str_replace("public/files/","",$journey->path) }}</th>
                              <?php $val = str_replace("public/files/","",$journey->path); ?>
                              <td><button><a href="{{ route('journey.pdf', $journey->slug) }}">Atsisiųsti PDF failą</a></button></td>
                      </tr>
                    </tbody>    
                </table>
@stop