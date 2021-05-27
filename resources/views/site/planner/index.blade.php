@extends('site.app')
@section('title', 'Homepage')

@section('content')
<script>

      function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 55.1694, lng: 23.8813 },
          zoom: 8,
        });

        directionsRenderer.setMap(map);

        var travelMode;

        init1();
        init2();

        /*document.getElementById("auto").addEventListener("click", () => {
          travelMode = google.maps.TravelMode.DRIVING;
        });*/

        document.getElementById("auto").addEventListener("click", () => {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        });

        var code;

        var route_markers = [
          <?php 
          if(isset($_GET['route_code'])){
          $code = $_GET['route_code'];
          foreach($route as $rot){
                  if($rot->start_point == $_GET['start'] && $rot->end_point == $_GET['end'])
                  foreach($segments as $segment){
                    if($segment->route_id == $code){
                      echo '["'.$segment->name.'", '.$segment->lat.', '.$segment->lng.'],';
                    }
                  }
                }
              }
          ?>
        ];

        var acc_markers = [
          <?php 
          foreach($accommodations as $acc){
                      echo '["'.$acc->name.'", '.$acc->lat.', '.$acc->lng.'],';
                    }
          ?>
        ];

        var land_markers = [
          <?php 
          foreach($landmarks as $land){
                      echo '["'.$land->name.'", '.$land->lat.', '.$land->lng.'],';
                    }
          ?>
        ];



        createRouteMarkers(route_markers, map);
        
        document.getElementById("accommodation").addEventListener("click", () => {
          createAccMarkers(acc_markers, map);
        });

        document.getElementById("landmark").addEventListener("click", () => {
          createLandMarkers(land_markers, map);
        });
        
        

        
}

      function createRouteMarkers(markers, map){
        // Place each marker on the map  
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            marker = new google.maps.Marker({
                position: position,
                map: map,
            });
        }
      }

      function createAccMarkers(markers, map){
        // Place each marker on the map  
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            var iconBase = {
                url: "http://maps.google.com/mapfiles/kml/shapes/lodging.png", // url
                scaledSize: new google.maps.Size(30, 30), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            const contentString =
            markers[i][0]

            var infowindow = new google.maps.InfoWindow()
    

  
            marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: iconBase
            });

            google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(contentString);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow));
        }
      }

      function createLandMarkers(markers, map){
        // Place each marker on the map  
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            var iconBase = {
                url: "http://maps.google.com/mapfiles/kml/shapes/flag.png", // url
                scaledSize: new google.maps.Size(30, 30), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            const contentString =
            markers[i][0]

            var infowindow = new google.maps.InfoWindow()
    

  
            marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: iconBase
            });

            google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(contentString);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow)); 
        }
      }

      function init1(){
        const input1 = document.getElementById("start_point");
        const searchBox = new google.maps.places.SearchBox(input1);
      }

      function init2(){
        const input2 = document.getElementById("end_point");
        const searchBox = new google.maps.places.SearchBox(input2);
      }
  

          function calculateAndDisplayRoute(directionsService, directionsRenderer) {
          directionsService.route(
            {
              origin: {
                query: document.getElementById("start_point").value,
              },
              destination: {
                query: document.getElementById("end_point").value,
              },
              travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) => {
              if (status === "OK") {
                directionsRenderer.setDirections(response);
              } else {
                window.alert("Directions request failed due to " + status);
              }
            }
          );
          }

          function togBus() {
            var nav = document.getElementById("bus_table");
            if (nav.style.display === 'none') {
                nav.style.display = 'block';
                nav.style.width = "500px";
                nav.style.opacity = 1;
            } else {
                nav.style.display = 'none';
                nav.style.width = '0';
                nav.style.opacity = 0;
            }
        }

        function togAcc() {
            var nav = document.getElementById("acc_table");
            if (nav.style.display === 'none') {
                nav.style.display = 'block';
                nav.style.width = "500px";
                nav.style.opacity = 1;
            } else {
                nav.style.display = 'none';
                nav.style.width = '0';
                nav.style.opacity = 0;
            }
        }

        function togLand() {
            var nav = document.getElementById("land_table");
            if (nav.style.display === 'none') {
                nav.style.display = 'block';
                nav.style.width = "500px";
                nav.style.opacity = 1;
            } else {
                nav.style.display = 'none';
                nav.style.width = '0';
                nav.style.opacity = 0;
            }
        }

        

function duplicate() {
    var original = document.getElementById('duplicater' + i);
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "duplicetor" + ++i; // there can only be one element with an ID
    clone.onclick = duplicate; // event handlers are not cloned
    original.parentNode.appendChild(clone);
}

var i = 0;
        function addJourney() {
            var nav = document.getElementById('template' + i);
            var clone = nav.cloneNode(true); // "deep" clone
            clone.id = "template" + ++i; // there can only be one element with an ID
            clone.onclick = duplicate; // event handlers are not cloned
            nav.parentNode.appendChild(clone);
        }

    </script>


    <h2 style="text-align:center">Planuokite savo kelionę!</h2>

            <!--@foreach($route as $rot)
                        <tr>    
                            <td>{{$rot->name}}</th>
                            <td>{{$rot->start_point}}</td>
                            <td>{{$rot->start_time}}</th>
                            <td>{{$rot->end_time}}</th>
                            <td><form>
                                @csrf
                                <button><a href="https://www.autobusubilietai.lt/checkout/19633e8b-c44f-414e-8d74-651d0544fb92">Pirkti bilietus</a></button>
                            </form></th>
                        </tr>
                        <br>
                        @foreach($segments as $segment)
                        @if($segment->route_id == $rot->route_code)
                        <tr>    
                            <td>{{$segment->name}}</th>
                            <td>{{$segment->arrival_time}}</td>
                        </tr>
                        <br>
                        @endif
                    @endforeach
                    @endforeach   -->          
    <?php  

    $name="";
    $start_value="";
    $end_value="";
    $start_time="";
    $end_time="";
    ?>

    <!--<div id="template0">-->
            <div id="info_form" class="d-flex justify-content-center" style="margin-top: 20px; text-align:center">
                <form method="get" action="{{ route('planner.generated') }}">
                
                
                <div class="row">
                <div class="col">
                <label for="start_time">Pradžios data:</label>
                @if(isset($_GET['start_time']))
                    <?php $start_time = $_GET['start_time']; ?>
                @endif
                <input type="date" class="form-control mb-2 mr-sm-2" id="start_time" name="start_time" value="{{$start_time}}" placeholder="Kelionės pradžia" >
      </div>
      <div class="col">
                <label for="end_time">Pabaigos data:</label>
                @if(isset($_GET['end_time']))
                    <?php $end_time = $_GET['end_time']; ?>
                @endif
                <input type="date" class="form-control mb-2 mr-sm-2" id="end_time" name="end_time" value="{{$end_time}}" placeholder="Kelionės pabaiga" >
      </div>
      </div>    

                    @if(isset($_GET['start']))
                    <?php $start_value = $_GET['start']; ?>
                    @endif
                    <input required type="text" class="form-control mb-2 mr-sm-2" id="start_point" name="start" value="{{$start_value}}" placeholder="Iš kur keliaujate?" >

                    <label class="sr-only" for="inlineFormInputName2">Kur keliaujate?</label>
                    @if(isset($_GET['end']))
                    <?php $end_value = $_GET['end']; ?>
                    @endif
                    <input required type="text" class="form-control mb-2 mr-sm-2" id="end_point" name="end" value="{{$end_value}}" placeholder="Kur keliaujate?" >
                    <button type="submit" id="choose">Sukurti maršrutą!</button>
                  </form>
            </div>
        
            <h5 style="margin-top: 20px; text-align:center">Keliausiu su:</h5>
            <div id="transport_form" class="d-flex justify-content-center" style="text-align:center; margin-bottom: 20px">
            <div class="row">
            <div class="col">
              <button id="auto" class="btn btn-outline-secondary">Savo transportu</button>
      </div>
      <div class="col">
              <button id="bus" onclick="togBus()" class="btn btn-outline-secondary">Autobusu</button>
      </div>
      </div>
            </div>

            <!--<div id="form" class="d-flex justify-content-center" style="margin-top: 80px; text-align:center">
              <button id="submit" class="btn btn-primary mb-2">Ieškoti</button>
            </div>-->

                    <div id="map"></div>
                    <div id="main_form">
        
            <div>
            @if(isset($_GET['start']) && isset($_GET['end']))
                    
                <table class="table" id="bus_table" style="width:800px; display:none">
                    <thead>
                        <tr>
                        <th scope="col">Maršrutas</th>
                        <th scope="col">Išvykimo laikas</th>
                        <th scope="col">Atvykimo laikas</th>
                        <th scope="col">Transporto įmonė</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($route as $rot)
                    @if($rot->start_point == $_GET['start'] && $rot->end_point == $_GET['end'])
                      <tr>    
                              <td>{{$rot->name}}</th>
                              <td>{{$rot->start_time}}</th>
                              <td>{{$rot->end_time}}</th>
                              @foreach($transports as $transport)
                                        @if( $rot->transport == $transport->id)
                                        <td>{{ $transport->name }}</th>
                                        @endif
                                        @endforeach
                              <td><form method="get" action="{{ route('planner.generated') }}">
                                @csrf
                                <input type="hidden"  name="route_code" value="{{$rot->route_code}}">
                                <input type="hidden"  name="start" value="{{$rot->start_point}}">
                                <input type="hidden"  name="end" value="{{$rot->end_point}}">
                                <input type="hidden"  name="start_time" value="{{$_GET['start_time']}}">
                                <input type="hidden"  name="end_time" value="{{$_GET['end_time']}}">
                                <button type="submit" id="choose">Rodyti žemėlapyje</button>
                                <button><a href="{{$rot->url}}" target="_blank">Pirkti bilietus</a></button>
                               
                            </form></th>
                      </tr>
                      
                    @endif
                    @endforeach
                    @endif
                    </tbody>    
                </table>
            </div>

            <div id="accommodation_form" class="d-flex justify-content-center" style="margin-top: 20px; text-align:center">
                <button type="button" id="accommodation" onclick="togAcc()" class="btn btn-primary mb-2">Nakvynės vietos</button>
              </div>

              

            <div>
            
                <table class="table" id="acc_table" style=" display:none">
                    <thead>
                        <tr>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Adresas</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($accommodations as $acc)
                      <tr>    
                              <td>{{$acc->name}}</th>
                              <td>{{$acc->address}}</th>
                              <td><form method="get" action="{{ route('planner.generated') }}">
                                @csrf
                                <button><a href="{{$acc->url}}" target="_blank">Rezervuoti</a></button>
                               
                            </form></th>
                      </tr>
                    @endforeach
                    </tbody>    
                </table>
            </div>

            <div id="landmark_form" class="d-flex justify-content-center" style="margin-top: 20px; text-align:center">
                <button type="button" id="landmark" onclick="togLand()" class="btn btn-primary mb-2">Lankytini objektai</button>
              </div>

            <div>
            
                <table class="table" id="land_table" style="display:none">
                    <thead>
                        <tr>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Adresas</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($landmarks as $land)
                      <tr>    
                              <td>{{$land->name}}</th>
                              <td>{{$land->address}}</th>
                              <td><form method="get" action="{{ route('planner.generated') }}">
                                @csrf
                                <input type="hidden"  name="route_code" value="{{$rot->route_code}}">
                                <input type="hidden"  name="start" value="{{$rot->start_point}}">
                                <input type="hidden"  name="end" value="{{$rot->end_point}}">
                                <button><a href="{{$land->url}}" target="_blank">Plačiau</a></button>
                               
                            </form></th>
                      </tr>
                    @endforeach
                    </tbody>    
                </table>
            </div>     <br>

      <!--</div>-->
      
      <div style="text-align:center">
      <form method="post" action="{{ route('planner.confirmed') }}" enctype="multipart/form-data">
      @csrf
      <label for="bus_file">Pridėti autobuso bilietą(-us):</label><br>
      <button type="button" class="btn btn-primary"><input type="file" name="bus_file"></input></button><br>
      <label for="acc_file">Pridėti nakvynės vietos bilietą(-us):</label><br>
      <button type="button" class="btn btn-primary"><input type="file" name="acc_file"></input></button><br>
      <label for="land_file">Pridėti lankytino objekto bilietą(-us):</label><br>
      <button type="button" class="btn btn-primary"><input type="file" name="land_file"></input></button><br>
     <br> 
     <h3>Įveskite kelionės pavadinimą</h3>
      <div  class="d-flex justify-content-center">
                <input type="text" class="form-control " style="width:500px" id="name" name="name" placeholder="Kelionės pavadinimas" required>
      </div>
      <br>
            @if(isset($_GET['start']))
                                <input type="hidden" name="start" value="{{$_GET['start']}}">
                                @endif
                                @if(isset($_GET['end']))
                                <input type="hidden" name="end" value="{{$_GET['end']}}">
                                @endif
                                @if(isset($_GET['start_time']))
                                <input type="hidden" name="start_time" value="{{$_GET['start_time']}}">
                                @endif
                                @if(isset($_GET['end_time']))
                                <input type="hidden" name="end_time" value="{{$_GET['end_time']}}">
                                @endif
            <button type="submit" class="btn btn-success">Išsaugoti kelionę</button>
            </form>
      </div>  
      </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxMQ5bqcM6npYXPZ03EppVsGk8-8xlIsI&libraries=places&callback=initMap">
</script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxMQ5bqcM6npYXPZ03EppVsGk8-8xlIsI&callback=initMap&libraries=&v=weekly"
      async
    ></script>

    <script
			  src="https://code.jquery.com/jquery-3.6.0.js"></script>

@stop