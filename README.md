# Avanti Engineer Test
## International Space Station

The task was resolved in Simfony 4 framework

###### Deployment: `composer install`

###### Run local webserver: `bin/console server:run` 
 
1. The current position of the ISS (longitude and latitude)
```
http://127.0.0.1:8000/api/position
```

```
{
    "latitude": -44.227326828166,
    "longitude": 87.885956968037
}
```


2. Calculate an estimated distance between the current ISS location (latitude/longitude) and a given latitude/longitude (in km)
```
http://127.0.0.1:8000/api/distance?long=149.52865880332&lat=-39.441228441423
```
##### Calculated distance:
```
{
    "distance": 101.545188281768
}
```
