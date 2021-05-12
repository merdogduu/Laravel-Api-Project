<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Foursquare Mekan Detayları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  </head>
  <body>

    <!--HEADER START-->
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-dark bg-primary">
          <div class="container-fluid">
            <a class="navbar-brand mb-0 h1"  href="{{route('places')}}">Foursquare Mekan Arama</a>
          </div>
        </nav>
      </div>
    </div>
    <!--HEADER END-->


    <!--DETAIL-PAGE-->
<div class="container">
  <div class="row" style="margin-top: 50px">
      <div class="col-md-8">
      <h2>{{$place['name']}} Mekan Detayları</h2>
          <div class=" col-md-10 col-lg-10 ">
          <table class="table table-striped" border=3 >
              <tbody>
                  <tr>
                      <th>Adres:</th>
                      <td>{{$place['location']['formattedAddress'][0]}}</td>
                  </tr>
                  <tr>
                    <th>İl:</th>
                    <td><?php  if (empty($place['location']['state'])) {
                        echo '-';
                    }
                    else {
                      echo $place['location']['state'];
                    }?></td>

                  </tr>
                  <tr>
                    <th>İlçe:</th>
                    <td><?php  if (empty($place['location']['city'])) {
                        echo '-';
                    }
                    else {
                      echo $place['location']['city'];
                    }?>
                    </td>

                  </tr>


                  <tr>
                      <th>İletişim:</th>
                      <td><?php  if (empty($item['contact'])) {
                          echo '-';
                      }
                      else {
                        echo $item['contact'].",";
                      }?></td>
                  </tr>
                  <tr>
                      <th>Kategoriler:</th>
                      <td>{{$place['categories'][0]['pluralName']}}</td>
                  </tr>
                  <tr>
                    <th>Lokasyon Enlem/Boylam:</th>
                    <td>{{$place['location']['lat']}},{{$place['location']['lng']}}</td>
                  </tr>
                  <tr>
                    <th>Mekan Linki:</th>
                    <td><a href="{{$place['shortUrl']}}">{{$place['canonicalUrl']}}</a></td>
                  </tr>

              </tbody>
          </table>
      </div>
  </div>
</div>
</div>
<!--DETAIL-PAGE-->

  </body>
</html>
