<?php 
    require ‘restclient.php’;
    $TEST_SERVER_URL = 'http://geodesarrollo2.merida.gob.mx:8080/geoserver/produccion/wms?SERVICE=WMS&VERSION=1.1.1&REQUEST=GetMap&FORMAT=image%2Fpng&TRANSPARENT=true&LAYERS=produccion%3Aescuelas_des_social_2016&exceptions=application%2Fvnd.ogc.se_inimage&SRS=EPSG%3A4326&STYLES=&WIDTH=682&HEIGHT=768&BBOX=-89.65547561645508%2C20.898571014404297%2C-89.59693908691406%2C20.964488983154297';
    
    $api = new RestClient;
    $result = $api->post($TEST_SERVER_URL, “{\”foo\”:\”bar\”}”,
    array(‘Content-Type’ => ‘application/json’));
    $response_json = $result->decode_response();
    
    $this->assertEquals(‘application/json’, 
    $response_json->headers->{“Content-Type”});
    $this->assertEquals(‘POST’, 
    $response_json->SERVER->REQUEST_METHOD);
    $this->assertEquals(“{\”foo\”:\”bar\”}”, 
    $response_json->body);
?>
