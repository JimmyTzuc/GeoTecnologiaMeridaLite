<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
	
	<!-- Bibliothèque de base: Leaflet-->
    <!-- <link rel="stylesheet" href="libs/leaflet.css"/> -->
	<!-- <script src="libs/leaflet.js"></script> -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
	<!-- Draw-->
	<script src= "https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw-src.js"></script>
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw.css">
	<script src= "https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw.js"></script>
	
	<!-- Slide menu-->
	<link rel="stylesheet" href="libs/slide_menu/SlideMenu.css" />
	<script src="libs/slide_menu/SlideMenu.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<!-- GeoCoder-->
	<link rel="stylesheet" href="libs/Control.OSMGeocoder.css"/>
	<script src="libs/Control.OSMGeocoder.js"></script>
	
	<!-- Overview-->
	<link rel="stylesheet" href="libs/overview/MiniMap.css" />
	<script src="libs/overview/MiniMap.js"></script>
 
	<!-- Localisation-->
	<link rel="stylesheet" href="libs/L.Control.Locate.min.css" />
    <script src="libs/L.Control.Locate.js"></script>
	
	<!-- Mouse position-->
	<link rel="stylesheet" href="libs/L.Control.MousePosition.css" />
    <script src="libs/L.Control.MousePosition.js"></script>
	
	<!-- Navigation Bar-->
    <link rel="stylesheet" href="libs/NavBar/NavBar.css"/>
	<script src="libs/NavBar/NavBar.js"></script>
	
	<!-- Font-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- jquery-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

	
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
	
		///// Fond de base
		var merida_base = L.tileLayer.wms("http://geodesarrollo2.merida.gob.mx:8080/geoserver/geotecnologia/wms", {
			layers: 'geotecnologia:merida_base',
			format: 'image/png',
			transparent: true,
			version: '1.1.1',
			attribution: "myattribution"
		});
		
			
	
		///// Configuration de la map	
		var map = L.map('map', {
				layers: [merida_base], /// fond de base
				center: [ 20.9753704, -89.6169586],/// coordonnées
				zoom: 12	//// zoom par defaut
			});
		

		/////layers de base		
		var baseLayers = {
			"merida_base": merida_base,
		};

		
		///// layers à partir de Geoserver (format WMS)

		var colonias = L.tileLayer.wms("http://geodesarrollo2.merida.gob.mx:8080/geoserver/geotecnologia/wms", {
			layers: 'geotecnologia:colonias',
			format: 'image/png',
			transparent: true,
			version: '1.1.1',
			attribution: "myattribution",
            styles: "colonias_base"
		});
		var escuelas = L.tileLayer.wms("http://geodesarrollo2.merida.gob.mx:8080/geoserver/geotecnologia/wms", {
			layers: 'geotecnologia:escuelas',
			format: 'image/png',
			transparent: true,
			version: '1.1.1',
            styles: 'escuelas',
		});
		var parques = L.tileLayer.wms("http://geodesarrollo2.merida.gob.mx:8080/geoserver/geotecnologia/wms", {
			layers: 'geotecnologia:parques',
			format: 'image/png',
			transparent: true,
			version: '1.1.1',
            styles: "parques",
		});
		
						  
		///// Groupe layers
		var overlays = {
			"colonias": colonias,
			"escuelas": escuelas,
			"parques": parques,
		};
		
		
		
		///// Add the scale control to the map
		L.control.scale().addTo(map);
			
		///// Add the Navigation Bar to the map 
		L.control.navbar({position: 'topleft'}).addTo(map);
		
		///// Ajout des couches de base + couches geoserver
		L.control.layers(baseLayers,overlays).addTo(map);

		


    </script>
	
	
</body>
</html>