<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maybank Interview - Zahiruddin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="overlay">
        <div class="login">
            <div class="login__inner">
                <div class="login__header">
                    <div class="login__title">
                        <h1 class="login__heading">ISS Locator</h1>
                    </div>
                </div>

                <div class="login__content">
                    <div class="login__form">
                        <div class="form__group">
                            <p class="form__text">At your requested time<br>
                                which is<strong>{{ $requested_date->format('H:i A, j F Y') }}</strong>
                                <br>ISS is located at {{ $location_input[0]['longitude'] }}(longitude) and
                                <br>{{ $location_input[0]['latitude'] }}(latitude) <strong></strong>
                            </p>
                            <br>
                            <br>
                            <p class="form__text"><mark>Locations before every 10 minutes</mark></p><br>
                            @foreach ($locations_before as $location)
                                <p class="form__text">At {{ $location['masa'] }} <br> The longitude is at
                                    <strong>{{ $location['longitude'] }}</strong> and<br>the latitude is at
                                    <strong>{{ $location['latitude'] }}</strong>
                                </p>
                                <br>
                            @endforeach
                            <br><br>
                            <p class="form__text"><mark>Locations after every 10 minutes</mark></p><br>
                            @foreach ($locations_after as $location)
                                <p class="form__text">At {{ $location['masa'] }} <br> The longitude is at
                                    <strong>{{ $location['longitude'] }}</strong> and<br>the latitude is at
                                    <strong>{{ $location['latitude'] }}</strong>
                                </p>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="login__footer">
                    <div class="login__subtitle">
                        <h3 class="login__subheading">Maybank Interview December 2021</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>
