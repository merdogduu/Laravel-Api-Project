<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Foursquare Mekan Arama</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body>


  @include('header');


    <!--PLACE-SEARCH-->
    <div class="container">
      <div class="row" style="margin-top:50px">
        <h1>Mekan Arama</h1>
        <div class="input-group mb-3">
          <!--  <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">  -->
          <form class="input-group" action="#" method="get">
            @csrf
            <input class="form-control" type="text" name="userquery" id="userquery" value="">
            <input class="input-group-text" type="submit" value="Arama">
          </form>
        </div>

          @foreach ($collection as $item)
          <div class="col-md-3">
            <div class="card" style="width: 18rem; height: 12rem;">
              <div class="card-body">
                <h5 class="card-title" style="text-transform:uppercase">{{$item['name']}}</h5>

                <p class="card-text">

                  @if(empty($item['location']['address']))
                      Adres Girdisi Yok!,

                  @else
                    {{$item['location']['address']}},
                  @endif

                    @if (empty($item['location']['city']))
                        İlçe Girdisi Yok!
                    @else
                      {{$item['location']['city']}}

                    @endif
                </p>

              </div>
              <a href="{{route('places.details', $item['id'])}}" class="btn btn-primary" style="padding-bottom" >Detaylar</a>
            </div><br>
          </div>
          @endforeach
      </div>
    </div>

    <!--PLACE-SEARCH-->

  </body>
</html>
