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

                            <h1 class="login__heading">Astronomy picture of the Day</h1>
                            <p>{{ $data['explanation'] }}</p>
                            <img class="spacing" src="{{ $data['url'] }}" width="100%" height="300">
                            <p class="spacing">{{ $data['title'] }}</p>
                            <p>© Copyright {{ $data['copyright'] }}. <span>Source: <a target="_blank" href="https://api.nasa.gov/">https://api.nasa.gov</a></span></p>

                            <div class="form__group" >
                                <a target="_blank" href="{{ $data['hdurl'] }}" class="form__btn spacing" type="submit">
                                    <span class="form__btn-text">See in HD</span>
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
