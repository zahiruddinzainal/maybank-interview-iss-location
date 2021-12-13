<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maybank Interview - Zahiruddin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .spacing{
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="overlay">
        <div class="login">
            <div class="login__inner">
                <div class="login__content">
                    <div class="login__form">
                        <div class="form">

                            <h1 class="login__heading">Mars weather captured by InSight, last updated at {{($data['1081']['First_UTC'])}}</h1>
                            <img class="spacing" src="https://mars.nasa.gov/system/content_pages/main_images/370_insight-lander-PIA22743-16x9.jpg" width="100%" height="300">
                            <p class="spacing">InSight probe retrieving data from Mars. Location is at Elysium Planitia </p>
                            <p class="spacing"><strong>Average Temperature: {{$data['1081']['AT']['av']}} ℉</strong></p>
                            <p class="spacing"><strong>Minimum Temperature: {{$data['1081']['AT']['mn']}} ℉</strong></p>
                            <p class="spacing"><strong>Maximum Temperature: {{$data['1081']['AT']['mx']}} ℉</strong></p>
                            <a class="spacing" target="_blank" href="https://mars.nasa.gov/insight/weather/">Source URL: https://mars.nasa.gov/insight/weather/</a>

                            <div class="form__group" >
                                <a href="https://mars.nasa.gov/insight/weather/" class="form__btn spacing" type="submit">
                                    <span class="form__btn-text">Read more</span>
                                </a>
                            </div>

                            <div id="loader" class="loader"></div>
                            <div class="form__group">
                                <p class="form__text">Crafted by
                                    <a href="https://zvhir.com" class="form__link"> zvhir.com</a>.
                                </p>
                            </div>
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
</body>

</html>
