<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Maybank Interview - Zahiruddin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .spacing {
            margin-top: 15px;
        }

        .spacing-large {
            margin-top: 50px;
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
                            <h1 class="login__heading spacing-large">International Space Station simple portal</h1>
                            <img class="spacing"
                                src="https://images.theconversation.com/files/340465/original/file-20200609-176580-1qp5oqg.jpg?ixlib=rb-1.1.0&rect=0%2C350%2C4588%2C2294&q=45&auto=format&w=1356&h=668&fit=crop"
                                width="100%" height="250">

                            <p class="spacing">The International Space Station (ISS) is a modular space station
                                (habitable artificial satellite) in low Earth orbit. It is a multinational collaborative
                                project involving five participating space agencies: NASA (United States), Roscosmos
                                (Russia), JAXA (Japan), ESA (Europe), and CSA (Canada).[7][8] The ownership and use of
                                the space station is established by intergovernmental treaties and agreements.</p>

                            <div class="form__group spacing-large">
                                <a href="/locator" class="form__btn" type="submit">
                                    <span class="form__btn-text">ISS Locator</span>
                                </a>
                            </div>
                            <form method="get" action="/visualizer" class="form">
                                @csrf
                                <div class="form__group">
                                    <button id="text" class="form__btn" type="submit">
                                        <span class="form__btn-text">PATH VISUALIZER</span>
                                    </button>
                                </div>
                            </form>
                            <div id="loader" class="loader" style="display: none; margin-top: 50px;"></div>
                            <div class="form__group">
                                <p id="loading_text" style="display: none; margin: auto;">Setting up the map.. Please wait..</p>
                            </div>
                            <div class="form__group">
                                <a href="http://api.zvhir.com" class="form__btn" type="submit">
                                    <span class="form__btn-text">API GATEWAY</span>
                                </a>
                            </div>
                            <div class="form__group">
                                <a href="/more" class="form__btn" type="submit">
                                    <span class="form__btn-text">Random info</span>
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
    <script>
        var loader = document.getElementById('loader');
        var loading_text = document.getElementById('loading_text');
        var button = document.getElementById('text');
        button.onclick = function() {
            loader.style.display = "block";
            loading_text.style.display = "block";
        };
    </script>
</body>

</html>
