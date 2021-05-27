@extends('site.app')
@section('title', 'Homepage')

@section('content')

    <div style="text-align:center">
        <h1>Mano kelionės</h1>
      </div>
      @if(count($journeys)>0)
            <div>
            
                <table class="table" id="bus_table" >
                    <thead>
                        <tr>
                        <th scope="col">Kelionės pavadinimas</th>
                        <th scope="col">Veiksmai</th>
                        </tr>
                    </thead>
                    @foreach($journeys as $journey)
                    <tbody>
                      <tr>    
                              <td>{{$journey->name}}</th>
                              <td>
                                @csrf
                                <button type="submit" id="choose"><a href="{{ route('journey.show', $journey->slug) }}">Plačiau</a></button>
                      
                                @csrf
                                <button type="submit" id="choose"><a href="{{ route('journey.delete', $journey->id) }}">Pašalinti</a></button>
                      </th>
                    </tbody>    
                    @endforeach
                </table>
            </div>
            @else
            <div style="text-align:center">
        <h3>Dar nesate sukūrę savo kelionės..</h1>
      </div>
      @endif


@stop