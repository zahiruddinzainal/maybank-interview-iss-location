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
                        <form method="POST" action="{{ route('search') }}" class="form">
                            @csrf
                            <div class="form__group">
                                <input id="input" class="form__input" type="datetime-local" name="date"
                                    placeholder="Pick a date" required>
                                <div class="form__input-after"></div>
                            </div>
                            <div class="form__group">
                                <button id="text" class="form__btn" type="submit">
                                    <span class="form__btn-text">Search</span>
                                </button>
                            </div>
                            <div id="loader" class="loader" style="display: none;"></div>
                            <div class="form__group">
                                <p id="loading_text" style="display: none; margin: auto;">Searching.. Please wait..</p>
                            </div>
                            <div class="form__group">
                                <p class="form__text">Crafted by
                                    <a href="https://zvhir.com" class="form__link"> zvhir.com</a>.
                                </p>
                            </div>
                        </form>
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
            var input = document.getElementById('input').value;
            if (input) {
                loader.style.display = "block";
                loading_text.style.display = "block";
            }
        };
    </script>

</body>

</html>
