@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.routes.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Pavadinimas <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $route->name) }}"/>
                            <input type="hidden" name="id" value="{{ $route->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start_point">Pradine stotele<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('start_point') is-invalid @enderror" type="text" name="start_point" id="start_point" value="{{ old('start_point', $route->start_point) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="end_point">Galine stotele<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('end_point') is-invalid @enderror" type="text" name="end_point" id="end_point" value="{{ old('end_point', $route->end_point) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="start_time">Isvykimo laikas<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('start_time') is-invalid @enderror" type="text" name="start_time" id="start_time" value="{{ old('start_time', $route->start_time) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="end_time">Atvykimo laikas<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('end_time') is-invalid @enderror" type="text" name="end_time" id="end_time" value="{{ old('end_time', $route->end_time) }}"/>
                        </div>
                    </div>
                    <h4 class="tile-title">Marsruto stoteles</h4>
                    @foreach($segments as $segment)
                    @if($segment->route_id == $route->route_code)
                    <div class="tile-body">
                    <div class="form-group">
                            <label class="control-label" for="id">id<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('id') is-invalid @enderror" type="text" name="id" id="id" value="{{ old('id', $segment->route_id) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="stop">Stotele<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('stop') is-invalid @enderror" type="text" name="stop" id="stop" value="{{ old('stop', $segment->name) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="arrival_time">Atvykimo laikas<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('arrival_time') is-invalid @enderror" type="text" name="arrival_time" id="arrival_time" value="{{ old('arrival_time', $segment->arrival_time) }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="arrival_time">Atvykimo laikas<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('arrival_time') is-invalid @enderror" type="text" name="arrival_time" id="arrival_time" value="{{ old('arrival_time', $segment->arrival_time) }}"/>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Atnaujinti</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.transports.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Atšaukti</a>
                    </div>
                </form>
            </div>
        </div>
@endsection