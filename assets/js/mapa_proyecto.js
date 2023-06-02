//####################################### INICIAMOS EL MAPA ##############################################//
var sat =  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 19,
    maxNativeZoom: 17
});
  calles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    maxZoom: 19,
    maxNativeZoom: 17
});

//######################## VARIABLES PARA PONER UN FONDO PREDETERMINADO DE LA ZONA #####################//
//var carpeta_raiz = $('#carpeta_raiz').val();
var x1 = '-8.757895141069671';
var y1 = '-75.01125923442378';
var x2 = '-8.755536976516238';
var y2 = '-75.0025308404169';
//######################## FIN DE VARIABLES ############################################################//

//###### coordenas de la ubicacion a mostrar y traidas desde la bd ##################//
let map = L.map('mapID', {
    zoomControl: false,
    layers: [sat]
}).setView([x2,y2],18);//17 default -  aumentamos para el enfoque de esa zona al momento de iniciar 
//###### fin coordenas de la ubicacion a mostrar y traidas desde la bd #############//

//################## PANEL DE OPCIONES O HERRAMIENTAS #############################//
var LeafIcon = L.Icon.extend({//marcador icono gps
      options: {//propiedades para el pin de ubicacion
        iconAnchor:   [17, 46],
        popupAnchor:  [0, -46]
      }
    });
//############################ FIN DEL PANEL ####################################//

//########################### CAJA DE DISTANCIA EN KM A MOSTRAR #################//
 L.control.scale({
    position: 'bottomright',
    metric: true,
    imperial: false,
    maxWidth: 100
}).addTo(map);
//########################### FIN DE CAJA #######################################//

//################# POSITION DE LAS COORDENADAS AL PASAR EL MOUSE ##############//
L.control.mousePosition({
    position: 'bottomleft',
    separator: ' : ',
    emptyString: 'Cargando...',
    lngFirst: false,
    numDigits: 5,
    lngFormatter: undefined,
    latFormatter: undefined,
    prefix: ""
}).addTo(map);
//################# FIN POSITION DE LAS COORDENADAS AL PASAR EL MOUSE #########//

//######################## HERRAMIENTA ZOOM BOTONES [ + / -] ###################//
L.control.zoom({
    position: 'topleft',
    zoomInText: '+',
    zoomOutText: '-',
    zoomInTitle: "Acercar",
    zoomOutTitle: "Alejar"
}).addTo(map);    

//######################## FIN HERRAMIENTA ZOOM BOTONES [ + / -] ##############/

//######################## HERRAMIENTA FULLSCREEN #############################//
L.control.fullscreen({
  position: 'topleft', // change the position of the button can be topleft, topright, bottomright or bottomleft, default topleft
  title: 'Show me the fullscreen !', // change the title of the button, default Full Screen
  titleCancel: 'Exit fullscreen mode', // change the title of the button when fullscreen is on, default Exit Full Screen
  content: null, // change the content of the button, can be HTML, default null
  forceSeparateButton: true, // force separate button to detach from zoom buttons, default false
  forcePseudoFullscreen: true, // force use of pseudo full screen even if full screen API is available, default false
  fullscreenElement: false // Dom element to render in full screen, false by default, fallback to map._container
}).addTo(map);
//######################## FIN HERRAMIENTA FULLSCREEN #########################//

//######################## HERRAMIENTA MODELO DE MAPA #########################//
//zona = L.imageOverlay(url=imagen, imageBounds).addTo(miMapa);
zona = L.imageOverlay("assets/img/demo/sinFondo.png", [[x2,y2],[x1,y1]]).addTo(map); //cargamos la img de mapa de calor

var baselayers = {
    "Esri satelital": sat,
    "OpenStreetMap": calles
}
var overlays = {
    "Mi imagen": zona
}

L.control.layers(baselayers, overlays).addTo(map);
//####################### FIN HERRAMIENTA DE MAPA #############################//

//####################### CARGAMOS LAS HERRAMIENTAS PARA MARCAR ###############//
    var greenIcon = new LeafIcon({
      iconUrl: 'assets/img/marker-icon-2x.png'//icono de marcado gps
      });

    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
      position: 'topright',
      draw: {
        polygon: {
          shapeOptions: {
            color: 'yellow'
          },
          allowIntersection: false,
          drawError: {
            color: 'orange',
            timeout: 1000
          },
          showArea: true,
          metric: true,
          repeatMode: true
        },
        polyline: {
          shapeOptions: {
            color: 'red'
          },
        },
        rect: {
          shapeOptions: {
            color: 'green'
          },
        },
        circle: {
          shapeOptions: {
            color: 'yellow'
          },
        },
        circlemarker: {
            shapeOptions: {
                color: 'green'
          },
        },
        marker: {
          icon: greenIcon
        },
      },
      edit: {
        featureGroup: drawnItems
      }
    });
    map.addControl(drawControl);
//############################### pop up de ubicacion #######################################//
map.on(L.Draw.Event.CREATED, function (e) {
  console.clear();
  //###################//
  var type  = e.layerType,
  layer = e.layer;

  console.log("Coordinates:");

if (type == "marker" || type == "circle" || type == "circlemarker"){
    //console.log([layer.getLatLng().lat, layer.getLatLng().lng]);
    var lat1 = layer.getLatLng().lat;
    var lng1 = layer.getLatLng().lng;

    layer.bindPopup("Ubicación :  "+lat1.toString().substr(0, 8)+" y "+lng1.toString().substr(0, 8));
    //layer.bindPopup((layer.getLatLng().lat).toString(), (layer.getLatLng().lng).toString());
    //console.log((layer.getLatLng().lat).toString(), (layer.getLatLng().lng).toString());
  }
  else {
    var objects = layer.getLatLngs()[0];
    for (var i = 0; i < objects.length; i++){
      console.log([objects[i].lat,objects[i].lng]);
    }
  }
      drawnItems.addLayer(layer);
    });
//################################ IMPRESIÓN #########################################//
var printer = L.easyPrint({
          tileLayer: calles,
          sizeModes: ['Current'],
          filename: 'map',
          exportOnly: true,
          hideControlContainer: true
    }).addTo(map);

function manualPrint () {
      printer.printMap('CurrentSize', 'MyManualPrint')
    }
//########################## FIN DE IMPRESIÓN #####################################//