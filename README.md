# International Space Station (ISS) Locator

This system is basically a simple tracker to locate where is the ISS are at a given time. It also provide where it has been in every 10 minutes ago and where it will be in every after 10 minutes onward. The data collection is then presented visually as a route path along the earth map. Another than that this system also provide API backend where any developers can request satellite info, satellite location by timestamp, satellite existence in a give specific latitude and longitude. Lastly, the system also provide some news/info from NASA API such as photo of the day and mars weather.

The demo of the website is served here at [https://interview.zvhir.com](https://interview.zvhir.com)
Microservice for the API can be reached here at [https://interview.zvhir.com](https://interview.zvhir.com)

Repo for the system demo [ISS LOCATOR](https://github.com/zahiruddinzainal/maybank-interview-iss-location) and
repo for the API is here [ISS API](https://github.com/zahiruddinzainal/api-iss-locator)

## Installation

Copy '.env example' file and rename as '.env' then run following command:
```bash
php artisan key:generate
```

To serve the system run following command:
```bash
php artisan serve
```

Done. There you go!

## Screenshot of the system
![](https://interview.zvhir.com/public/iss/1.png)
Mainpage of the system

![](https://interview.zvhir.com/public/iss/2.png)
ISS Locator - by timestamp

![](https://interview.zvhir.com/public/iss/3.png)
ISS Locator - location 10 minutes before and after.

![](https://interview.zvhir.com/public/iss/4.png)
ISS Path visualized on google map.

![](https://interview.zvhir.com/public/iss/5.png)
API details / documentation page. It can be reached here at [https://api.zvhir.com](https://api.zvhir.com)

![](https://interview.zvhir.com/public/iss/6.png)
Astronomy picture of the day. Source from NASA API.

![](https://interview.zvhir.com/public/iss/7.png)
Mars weather. Source from NASA API.

## About developer
[Visit all my works here](https://zvhir.com)