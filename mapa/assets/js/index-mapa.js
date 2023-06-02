//####################################### INICIAMOS EL MAPA ##############################################//
var 
    sat =  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 17,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
    calles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    maxZoom: 17,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

    osm     = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});


//const mbAttr  = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
//const mbUrl   = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

//var 
    //sat     = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1});
    //calles  = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1});
    //osm     = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //    maxZoom: 19,
    //    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    //});
   

//############################ INICIO DEL MAPA A MOSTRAR ################################//
let miMapa = L.map('mapID', {
    layers: [osm],
    measureControl: true,
    attributionControl: false,//quita la marca de agua del plugins usado
    zoomControl: false 
}).setView([0,0], 5);//CARGA EL MAPA PREDETERMINADO
//########################### FIN  INICIO DEL MAPA A MOSTRAR ############################//

//##################### ESCALA ##########################################################//
L.control.scale().addTo(miMapa);
//##################### FIN ESCALA #######################################################//

//################## UBICACION Y DEFINICION DE LAS CAPAS LAYERS #########################//
var baselayers = 
    {
        //################ ITEMS PARA SELECCIONAR EL TIPO DE LAYER ##########################//
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(assets/img/icongris.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Calles</span>": calles,
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F;font-weight: bold; background-image:url(assets/img/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block;'>Satelite</span>": sat,
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F;font-weight: bold; background-image:url(assets/img/icontopo.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block;'>Topográfico</span>": osm,
            //"<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F;font-weight: bold; background-image:url(assets/img/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block;'>Topo Map</span>": OpenTopoMap
        //################ ITEMS PARA SELECCIONAR EL TIPO DE LAYER ##########################//
    };

L.control.layers(
    baselayers, null, 
    {position: 'bottomleft',collapsed: false}
).addTo(miMapa);
//################## FIN UBICACION Y DEFINICION DE LAS CAPAS LAYERS ####################//

//################## MUESTRA COORDENADAS AL PASAR EL MOUSE - CAJA BLANCA ###############//
L.control.coordinates({
            position:"bottomright",
            decimals:2,
            decimalSeperator:",",
            labelTemplateLat:"Latitude: {y}",
            labelTemplateLng:"Longitude: {x}"
        }).addTo(miMapa);
//################# FIN MUESTRA COORDENADAS AL PASAR EL MOUSE - CAJA BLANCA ############//


//################## COORDENADAS EN TIEMPO REAL SEGUN UBICACION ########################//
miMapa.on('move', function(e) 
{
    var c = miMapa.getCenter();
    document.getElementById('divUTM').innerHTML = c + '<br>UTM: ' + c.utm();
});
miMapa.fire('move');
//################## FIN COORDENADAS EN TIEMPO REAL SEGUN UBICACION ###################//

//################## PLUGIN PARA MOSTRAR MINIMAPA EN ESQUINA #########################//
//var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
//var osm = new L.TileLayer(osmUrl, {minZoom: 5, maxZoom: 18});
//var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13});
//miMapa.addLayer(osm);
//var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(miMapa);
//################## FIN PLUGIN PARA MOSTRAR MINIMAPA EN ESQUINA ####################//

//######################## HERRAMIENTA ZOOM BOTONES [ + / -] ###################//
L.control.zoom({
    position: 'topright',
    zoomInText: '+',
    zoomOutText: '-',
    zoomInTitle: "Acercar",
    zoomOutTitle: "Alejar"
}).addTo(miMapa);    

//################## REINICIAR UBICACION  ############################################//
L.easyButton('icon-location', function(btn, map)
{
    map.setView([-8.757, -75], 15);//CARGA MAPA DE FORMA PREDETERMINADA 
},{position: 'topright'}).addTo(miMapa);
//################## FIN REINICIAR UBICACION  #########################################//

//####################### CARGAMOS LAS HERRAMIENTAS PARA MARCAR ###############//
function createAreaTooltip(layer) 
{
    if(layer.areaTooltip) 
    {
        return;
    }

    layer.areaTooltip = L.tooltip({
        permanent: true,
        direction: 'center',
        className: 'area-tooltip'
    });

    layer.on('remove', function(event) {
        layer.areaTooltip.remove();
    });

    layer.on('add', function(event) {
        updateAreaTooltip(layer);
        layer.areaTooltip.addTo(miMapa);
    });

    if(miMapa.hasLayer(layer)) {
        updateAreaTooltip(layer);
        layer.areaTooltip.addTo(miMapa);
    }
}

    function updateAreaTooltip(layer) 
    {
        var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
        var readableArea = L.GeometryUtil.readableArea(area, true);
        var latlng = layer.getCenter();

        layer.areaTooltip
        .setContent(readableArea)
        .setLatLng(latlng);
    }


//######### CARGAMOS LOS CONTROLES ####################################//
var drawnItems = L.featureGroup().addTo(miMapa);
    miMapa.addControl(new L.Control.Draw({

    edit: {featureGroup: drawnItems},
    
    position: 'topright',
        draw: {
                    marker: true,
                    circle: true,
                    circlemarker: true,
                    rectangle: true,
                    polyline: true,
                    polygon: {
                            shapeOptions: {
                                color: 'yellow'
                            },
                        allowIntersection: false,
                        drawError: {
                            color: 'red',
                            timeout: 1000
                        },
                        showArea: true,
                        metric: true,
                        repeatMode: true
                    },
                    polyline: {
                        shapeOptions: {
                        color: 'orange'
                        },
                    }

                }
    }));

        miMapa.on(L.Draw.Event.CREATED, function(event) {
            var layer = event.layer;

            if(layer instanceof L.Polygon) {
                createAreaTooltip(layer);
            }

            drawnItems.addLayer(layer);
        });

        miMapa.on(L.Draw.Event.EDITED, function(event) {
            event.layers.getLayers().forEach(function(layer) {
                if(layer instanceof L.Polygon) {
                    updateAreaTooltip(layer);
                }
            })
        });


//####################### FIN CARGAMOS LAS HERRAMIENTAS PARA MARCAR ###########//
//L.control.coordinates().addTo(miMapa);

//###################### CARGAREMOS LA DATA DE LA UBICACION DEL PROYECTO SEGUN EL ENLACE ACCEDIDO ##########//
//miMapa.flyTo([-8.757, -75], 17); 

// originally from https://globalwindatlas.info/downloads/gis-files
var url_to_geotiff_file = "assets/img/tiff/01.tif";

fetch(url_to_geotiff_file)
        .then(response => response.arrayBuffer())
        .then(arrayBuffer => {
          parseGeoraster(arrayBuffer).then(georaster => {
            const min = georaster.mins[0];
            const max = georaster.maxs[0];
            const range = georaster.ranges[0];

            // available color scales can be found by running console.log(chroma.brewer);
            console.log(chroma.brewer);
            var scale = chroma.scale("Viridis");

            var layer = new GeoRasterLayer({
                georaster: georaster,
                opacity: 0.7,
                pixelValuesToColorFn: function(pixelValues) {
                  var pixelValue = pixelValues[0]; // there's just one band in this raster

                  // if there's zero wind, don't return a color
                  if (pixelValue === 0) return null;

                  // scale to 0 - 1 used by chroma
                  var scaledPixelValue = (pixelValue - min) / range;

                  var color = scale(scaledPixelValue).hex();

                  return color;
                },
                resolution: 256
            });
            console.log("layer:", layer);
            layer.addTo(miMapa);

            miMapa.fitBounds(layer.getBounds());
          });
        });