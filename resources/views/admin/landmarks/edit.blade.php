@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i>Lankytini objektai</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Redaguoti lankytiną objektą</h3>
                <form action="{{ route('admin.landmarks.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Pavadinimas <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $landmark->name) }}"/>
                            <input type="hidden" name="id" value="{{ $landmark->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Adresas</label>
                            <textarea class="form-control" rows="4" name="address" id="address">{{ old('address', $landmark->address) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">lat</label>
                            <textarea class="form-control" rows="4" name="lat" id="lat">{{ old('lat', $landmark->lat) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">lng</label>
                            <textarea class="form-control" rows="4" name="lng" id="lng">{{ old('lng', $landmark->lng) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">url</label>
                            <textarea class="form-control" rows="4" name="url" id="url">{{ old('url', $landmark->url) }}</textarea>
                        </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Atnaujinti</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.landmarks.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Atšaukti</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection