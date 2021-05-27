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
                            <label class="control-label" for="name">Pavadinimas </label>
                            <input required class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $landmark->name) }}"/>
                            <input type="hidden" name="id" value="{{ $landmark->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Adresas</label>
                            <input required class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $landmark->address) }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lat">Platuma</label>
                            <input required class="form-control @error('lat') is-invalid @enderror" type="text" name="lat" id="lat" value="{{ old('lat', $landmark->lat) }}"/>
                            @error('lat') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lng">Ilguma</label>
                            <input required class="form-control @error('lng') is-invalid @enderror" type="text" name="lng" id="lng" value="{{ old('lng', $landmark->lng) }}"/>
                            @error('lng') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">Svetainė</label>
                            <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('url', $landmark->url) }}"/>
                            @error('url') {{ $message }} @enderror
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