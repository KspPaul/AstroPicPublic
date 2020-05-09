# Astropics Site

This project is a simple Social Network which focuses on hosting Images related to Astrophotography. 
It includes User Pages and a Forum. 
It also uses the api from http://nova.astrometry.net/ to automatically find mory Information about the stars in the images.

This project includes everything a forum for astrophotography needs:

* a place to host your images
* add important information like ISO, exposure time etc.
* a way to follow other users
* a forum to start discussions about various subjects.
* a way to tag your images


## How astrometry is used:

When a user uploads a image the raw image gets uploaded to astrometry.net:
![base image](https://i.imgur.com/9GPV1NE.jpg)

After the image is processed the api returns a annoted image with more information like, which stars are in it, which other objects can be seen etc:

![base image](https://nova.astrometry.net/annotated_display/3444064)

A list of the found objects is also returned which is added to the database.

## Installation


Install it like any other Laravel project.
To use the API you have to run the PublicAstroForum/app/python/main.py Python script in the background.


Further Installation Guide Follows.



## TODO

UPDATE Design

