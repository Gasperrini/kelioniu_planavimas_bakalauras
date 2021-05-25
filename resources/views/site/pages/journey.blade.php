@extends('site.app')
@section('title', $journey->name)
@section('content')
<section class="section-pagetop bg-dark">
    <div class="container clearfix">
        <h2 class="title-page">{{ $journey->name }}</h2>
    </div>
</section>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                    <div class="col-md-4">
                        <figure class="card card-product">
                            <figcaption class="info-wrap">
                                <h4 class="title">{{ $journey->name }}</h4>
                            </figcaption>
                        </figure>
                    </div>
            </div>
        </div>
    </div>
</section>
<table class="table" id="land_table">
                    <thead>
                        <tr>
                        <th scope="col">Isvykimo laikas</th>
                        <th scope="col">Grizimo laikas</th>
                        <th scope="col">Keliones pradzia</th>
                        <th scope="col">Keliones pabaiga</th>
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
                              <td><button><a href="{{ route('journey.download', ['file_name' => $val]) }}" >Atsisiųsti </a></button></th>
                              <td><button><a href="{{ route('journey.pdf', $journey->slug) }}">Atsisiųsti PDF failą</a></button></td>
                      </tr>
                    </tbody>    
                </table>
@stop