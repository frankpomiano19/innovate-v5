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


   
    
    map.on('click', function(e) {});
    
    if ($.trim(agbidrur) != "") {
        graficaPrurAgb();
    }
    dojo.connect(dom.byId("viewmap"), "dragenter", function(event) {
        event.preventDefault();
    });
    dojo.connect(dom.byId("viewmap"), "dragover", function(event) {
        event.preventDefault();
    });
    dojo.connect(dom.byId("viewmap"), "drop", function(event) {
        cargarCsvTxt(event);
    });
    dojo.connect(dom.byId("btnCancelaAlerta"), "click", function(event) {
        cancelacompartirAlerta();
    });
    dojo.connect(dom.byId("btnComparteAlerta"), "click", function(event) {
        compartirAlerta();
    });
    dojo.connect(dom.byId("btnDescKml"), "click", function(event) {
        descargaKML(idAreaActiva);
    });
    dojo.connect(dom.byId("btnHomeArea"), "click", function(event) {
        zoomAreaActiva();
    });
    dojo.connect(dom.byId("btnConcent"), "click", function(event) {
        getFocosPrincipales(idAreaActiva);
    });
    dojo.connect(dom.byId("chk_ANPDEFINI"), "onclick", function(event) {
        if (event.target.id == "chk_ANPDEFINI") {
            if (event.srcElement.checked) {
                sernanp.addTo(map);
            } else {
                map.removeLayer(sernanp);
            }
        }
    });
    dojo.connect(dom.byId("chk_zonaprioreg"), "onclick", function(event) {
        if (event.target.id == "chk_zonaprioreg") {
            if (event.srcElement.checked) {
                ZonaPrioRegion.addTo(map);
            } else {
                map.removeLayer(ZonaPrioRegion);
            }
        }
    });
    dojo.connect(dom.byId("chk_AnpDefinitiva"), "onclick", function(event) {
        if (event.target.id == "chk_AnpDefinitiva") {
            if (event.srcElement.checked) {
                AnpDefinitiva.addTo(map);
            } else {
                map.removeLayer(AnpDefinitiva);
            }
        }
    });
    dojo.connect(dom.byId("chk_AnpTransi"), "onclick", function(event) {
        if (event.target.id == "chk_AnpTransi") {
            if (event.srcElement.checked) {
                AnpTransitorias.addTo(map);
            } else {
                map.removeLayer(AnpTransitorias);
            }
        }
    });
    dojo.connect(dom.byId("chk_AnpRegional"), "onclick", function(event) {
        if (event.target.id == "chk_AnpRegional") {
            if (event.srcElement.checked) {
                AnpRegional.addTo(map);
            } else {
                map.removeLayer(AnpRegional);
            }
        }
    });
    dojo.connect(dom.byId("chk_AnpPrivada"), "onclick", function(event) {
        if (event.target.id == "chk_AnpPrivada") {
            if (event.srcElement.checked) {
                AnpPrivada.addTo(map);
            } else {
                map.removeLayer(AnpPrivada);
            }
        }
    });
    dojo.connect(dom.byId("chk_ZonaAmortig"), "onclick", function(event) {
        if (event.target.id == "chk_ZonaAmortig") {
            if (event.srcElement.checked) {
                ZonaAmortig.addTo(map);
            } else {
                map.removeLayer(ZonaAmortig);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoBosLoc"), "onclick", function(event) {
        if (event.target.id == "chk_SefoBosLoc") {
            if (event.srcElement.checked) {
                SerforBosLoc.addTo(map);
            } else {
                map.removeLayer(SerforBosLoc);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoBosPro"), "onclick", function(event) {
        if (event.target.id == "chk_SefoBosPro") {
            if (event.srcElement.checked) {
                SerforBosPro.addTo(map);
            } else {
                map.removeLayer(SerforBosPro);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoBosPP"), "onclick", function(event) {
        if (event.target.id == "chk_SefoBosPP") {
            if (event.srcElement.checked) {
                SerforBosPP.addTo(map);
            } else {
                map.removeLayer(SerforBosPP);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoFoco"), "onclick", function(event) {
        if (event.target.id == "chk_SefoFoco") {
            if (event.srcElement.checked) {
                SerforFoco.addTo(map);
            } else {
                map.removeLayer(SerforFoco);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoIncendio"), "onclick", function(event) {
        if (event.target.id == "chk_SefoIncendio") {
            if (event.srcElement.checked) {
                SerforIncendio.addTo(map);
            } else {
                map.removeLayer(SerforIncendio);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoCicatriz"), "onclick", function(event) {
        if (event.target.id == "chk_SefoCicatriz") {
            if (event.srcElement.checked) {
                SerforCicatriz.addTo(map);
            } else {
                map.removeLayer(SerforCicatriz);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoAutPfd"), "onclick", function(event) {
        if (event.target.id == "chk_SefoAutPfd") {
            if (event.srcElement.checked) {
                SerforAutPfd.addTo(map);
            } else {
                map.removeLayer(SerforAutPfd);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoAutCuafa"), "onclick", function(event) {
        if (event.target.id == "chk_SefoAutCuafa") {
            if (event.srcElement.checked) {
                SerforCuafa.addTo(map);
            } else {
                map.removeLayer(SerforCuafa);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoPermis"), "onclick", function(event) {
        if (event.target.id == "chk_SefoPermis") {
            if (event.srcElement.checked) {
                SerforPermisos.addTo(map);
            } else {
                map.removeLayer(SerforPermisos);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoUnidAprov"), "onclick", function(event) {
        if (event.target.id == "chk_SefoUnidAprov") {
            if (event.srcElement.checked) {
                SerforUnidAprov.addTo(map);
            } else {
                map.removeLayer(SerforUnidAprov);
            }
        }
    });
    dojo.connect(dom.byId("chk_SefoConces"), "onclick", function(event) {
        if (event.target.id == "chk_SefoConces") {
            if (event.srcElement.checked) {
                SerforConces.addTo(map);
            } else {
                map.removeLayer(SerforConces);
            }
        }
    });
    dojo.connect(dom.byId("chk_PrediosRur"), "onclick", function(event) {
        if (event.target.id == "chk_PrediosRur") {
            if (event.srcElement.checked) {
                PerdioRural.addTo(map);
            } else {
                map.removeLayer(PerdioRural);
            }
        }
    });
    dojo.connect(dom.byId("chk_ComuCampe"), "onclick", function(event) {
        if (event.target.id == "chk_ComuCampe") {
            if (event.srcElement.checked) {
                ComuniCamp.addTo(map);
            } else {
                map.removeLayer(ComuniCamp);
            }
        }
    });
    dojo.connect(dom.byId("chk_ComuNativ"), "onclick", function(event) {
        if (event.target.id == "chk_ComuNativ") {
            if (event.srcElement.checked) {
                ComuNativ.addTo(map);
            } else {
                map.removeLayer(ComuNativ);
            }
        }
    });
    dojo.connect(dom.byId("uploadFormPoint"), "onchange", lang.hitch(this, function(event) {
        if (event.target.type != "file" || event.target.id != "inFilePoint") {
            return;
        }
        var fileName = event.target.value.toLowerCase();
        if (sniff("ie")) {
            var arr = fileName.split("\\");
            fileName = arr[arr.length - 1];
        }
        if (fileName.indexOf(".zip") !== -1) {
            generateFeatureCollection(fileName, "uploadFormPoint", "esriGeometryPolygon");
        } else {
            alert('Solo se puede cargar archivo en formato .zip !');
        }
    }));
    var btnsubmedir = dom.byId("btnsubmedir");
    dojo.connect(btnsubmedir, "click", lang.hitch(this, function(event) {
        $("#divLeyendasNews").hide();
    }));
    var button_map_base = dom.byId("button-map-base");
    dojo.connect(button_map_base, "click", lang.hitch(this, function(event) {
        $("#divLeyendasNews").show();
    }));
    var dojoButtonShape = dom.byId("shapeUpload");
    dojo.connect(dojoButtonShape, "click", lang.hitch(this, function(event) {
        $("#divLeyendasNews").hide();
        var $el = $(dojoButtonShape);
        if (!$el.data('render')) {
            var container = $(".leaflet-top.leaflet-right").eq(0);
            var $html = $(['<div class="share-upload leaflet-control leaflet-control-layers-expanded leaflet-default" style="display:none;">', '<strong class="title-module"> Carga un shape</strong>', '<form enctype="multipart/form-data" method="post" id="uploadFormPoint">', '<input type="file" name="file" style="font-size:11px;" id="inFilePoint">', '</form>', '<div id="datosreporteinside"></div>', '</div>'].join(''));
            container.append($html);
            $el.data('render', true).attr('onclick', "toogleElement(this, event, {'target':'.share-upload', 'fade': true})").trigger('click');
        }
    }));
    var BtnMapServExternos = dom.byId("BtnMapServiceExternos");
    dojo.connect(BtnMapServExternos, "click", lang.hitch(this, function(event) {
        $("#divLeyendasNews").hide();
        let $el = $(BtnMapServExternos);
        if (!$el.data('render')) {
            let container = $(".leaflet-top.leaflet-right").eq(0);
            let html = $(['<div style="max-height: 500px !important ; overflow-y:scroll !important  ; z-index:5 !important;" class="share-uploadx leaflet-control leaflet-control-layers-expanded leaflet-default" >', '<strong class="title-module"> Información de Otras Instituciones </strong>', '<strong>SERNANP</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_ANPDEFINI" class="filled-in" type="checkbox" /> Zonas Prioritarias de Conservación Nacional <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_zonaprioreg" class="filled-in" type="checkbox" /> Zonas Prioritarias de Conservación Regional <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_AnpDefinitiva" class="filled-in" type="checkbox" /> ANP Nacional Definitiva <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_AnpTransi" class="filled-in" type="checkbox" /> ANP Nacional Transitoria <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_AnpRegional" class="filled-in" type="checkbox" /> ANP Regional <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_AnpPrivada" class="filled-in" type="checkbox" /> ANP Privada <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_ZonaAmortig" class="filled-in" type="checkbox" /> Zona Amortiguamiento <br><br><br>', '<strong>SERFOR</strong><br>', '&nbsp;&nbsp;<strong>UNIDADES DE ORDENAMIENTO FORESTAL</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoBosLoc" class="filled-in" type="checkbox" /> Bosque Locales <br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoBosPro" class="filled-in" type="checkbox" /> Bosque de Protección<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoBosPP" class="filled-in" type="checkbox" /> Bosque de Producción Permanente<br>', '&nbsp;&nbsp;<strong>FOCOS DE CALOR</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoFoco" class="filled-in" type="checkbox" /> Foco de Calor<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoIncendio" class="filled-in" type="checkbox" /> Incendio Forestal<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoCicatriz" class="filled-in" type="checkbox" /> Cicatriz de Incendio<br>', '&nbsp;&nbsp;<strong>AUTORIZACIONES</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoAutPfd" class="filled-in" type="checkbox" /> Autorizaciones PFDMAVND<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoAutCuafa" class="filled-in" type="checkbox" /> Autorizaciones CUAFA<br>', '&nbsp;&nbsp;<strong>PERMISOS</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoPermis" class="filled-in" type="checkbox" /> Permisos<br>', '&nbsp;&nbsp;<strong>CONCESIONES</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoUnidAprov" class="filled-in" type="checkbox" /> Unidad de Aprovechamiento<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_SefoConces" class="filled-in" type="checkbox" /> Concesiones<br>', '<strong>DIGESPARC</strong><br>', '&nbsp;&nbsp;&nbsp;<input id="chk_ComuNativ" class="filled-in" type="checkbox" /> Comunidades Nativas<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_ComuCampe" class="filled-in" type="checkbox" /> Comunidades Campesinas<br>', '&nbsp;&nbsp;&nbsp;<input id="chk_PrediosRur" class="filled-in" type="checkbox" /> Predios Rurales<br>', '</div>'].join(''));
            container.append(html);
            $el.data('render', true).attr('onclick', "toogleElement(this, event, {'target':'.share-uploadx', 'fade': true})").trigger('click');
        } else {}
    }));
    if (flgHandlerShare == true) {
        zoomFromShared();
    }
    $('#dr-departamento').on('change', function() {
        SUBTITLGRF = $("#dr-departamento option:selected").text();
        if (this.value === '00') {
            limpiarListas("dr-distrito");
            limpiarListas("dr-provincia");
            getEstadisticos("0", "00", "1");
            return;
        }
        buscarProvincias(this.value);
        getEstadisticos("1", this.value, "1");
    });
    $('#dr-provincia').on('change', function() {
        SUBTITLGRF = $("#dr-departamento option:selected").text() + "-" + $("#dr-provincia option:selected").text();
        buscarDistritos(this.value);
        getEstadisticos("2", this.value, "1");
    });
    $('#dr-distrito').on('change', function() {
        SUBTITLGRF = $("#dr-departamento option:selected").text() + "-" + $("#dr-provincia option:selected").text() + "-" + $("#dr-distrito option:selected").text();
        getEstadisticos("3", this.value, "1");
    });
    $('#pstPorLimitesHead').on('click', function() {
        SUBTITLGRF = "NACIONAL";
        $("#pstPorLimites").show();
        $("#pstPorAreas").hide();
        $("#pstPorAreasHead").removeClass("activa")
        $('#pstPorLimitesHead').addClass("activa")
        getEstadisticos("0", "00", "1");
        gj.clearLayers();
    });
    $('#pstPorAreasHead').on('click', function() {
        gj.clearLayers();
        $("#pstPorLimites").hide();
        $("#pstPorAreas").show();
        $('#pstPorLimitesHead').removeClass("activa")
        $("#pstPorAreasHead").addClass("activa")
    });
    $('#dr-misareas').on('change', function() {
        SUBTITLGRF = $("#dr-misareas option:selected").text();
        getEstadisticos("", this.value, "2");
        getCoordenadasCobertura(this.value);
    });
    $('#chkComparativo').on('change', function(evt) {
        if (this.checked) {
            activaCompara();
            CHK_COMPARA = true;
        } else {
            desactivaCompara();
            CHK_COMPARA = false;
        }
    });

    function getQuerystring_core(key, default_) {
        if (default_ == null)
            default_ = "";
        key = key.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
        var regex = new RegExp("[\\?&amp;]" + key + "=([^&amp;#]*)");
        var qs = regex.exec(window.location.href);
        if (qs == null)
            return default_;
        else
            return qs[1];
    }

   
    function preparaParaQuery(valorToFind, codBus, tipoClauseWhere) {
        var find_;
        $.each(busquedas, function(i, item) {
            if (item.id === codBus) {
                find_ = item;
            }
        });
        find_.idRegLay = valorToFind;
        find_.tipWhere = tipoClauseWhere;
        var camposOut = "";
        $.each(find_.outFields, function(i, item) {
            camposOut += $.trim(item) + ",";
        });
        camposOut = camposOut.substr(0, camposOut.length - 1);
        var strWh = "";
        $.each(find_.searchFields, function(i, item) {
            if (item.tipo === "texto") {
                strWh += " upper(" + item.campo + ") ";
                if (tipoClauseWhere === "igual") {
                    strWh += "= @" + valorToFind.toUpperCase() + "@  or";
                }
                if (tipoClauseWhere === "like") {
                    strWh += " like @%" + valorToFind.toUpperCase() + "%@ or";
                }
            } else {
                strWh += item.campo + "=" + valorToFind + " or";
            }
        });
        strWh = strWh.substr(0, strWh.length - 2);
        var param = "&esqData=" + find_.esqData + "&nomLayer=" + find_.nomLayer + "&fieldPk=" + find_.fieldPk + "&nomFieldGeo=" + find_.nomFieldGeo + "&idRegLay=" + find_.idRegLay + "&tipWhere=" + find_.tipWhere + "&camposOut=" + camposOut + "&strWh=" + strWh;
        return param;
    }

    function zoomFromShared() {
        var latlng = L.latLng(shareLat, shareLng);
        var escala = parseInt(shareZoom);
        map.setView([shareLat, shareLng], escala);
    }

    function iniControlCompartirAlertas() {
        var ourCustomControl = L.Control.extend({
            options: {
                position: 'topleft'
            },
            onAdd: function(map) {
                var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
                container.style.backgroundColor = 'white';
                container.style.backgroundImage = "url(img/share.png)";
                container.style.backgroundSize = "20px 20px";
                container.style.width = '35px';
                container.style.height = '35px';
                container.onclick = function() {
                    flgClickComparte = true;
                }
                return container;
            }
        });
        map.addControl(new ourCustomControl());
    }

  

    function oncadaFeature(feature, layer) {
        if (feature.properties && feature.properties.popupContent) {
            layer.bindPopup(feature.properties.popupContent);
        }
    }

    
    function generaFetureSave(lat, lon) {
        var point = new Point({
            "x": lon,
            "y": lat,
            "spatialReference": {
                "wkid": 4326
            }
        });
        graphicSaveCob = new Graphic(point, null, null);
    }


    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function cargarKernel() {
        addressPoints = addressPoints.map(function(p) {
            return [p[0], p[1]];
        });
        heat = L.heatLayer(addressPoints).addTo(map);
    }

    function generateFeatureCollection(fileName, nombForm, tipoInfo) {
        var name = fileName.split(".");
        name = name[0].replace("c:\\fakepath\\", "");
        var spatialRef = new SpatialReference({
            wkid: 4326
        });
        var params = {
            'name': name,
            'targetSR': spatialRef,
            'maxRecordCount': 1,
            'enforceInputFileSizeLimit': true,
            'enforceOutputJsonSizeLimit': true
        };
        params.generalize = false;
        params.maxAllowableOffset = 10;
        params.reducePrecision = false;
        params.numberOfDigitsAfterDecimal = 0;
        var myContent = {
            'filetype': 'shapefile',
            'publishParameters': JSON.stringify(params),
            'f': 'json',
            'callback.html': 'textarea'
        };
        var objForm = dom.byId(nombForm);
        request({
            url: 'https://www.arcgis.com/sharing/rest/content/features/generate',
            content: myContent,
            form: objForm,
            handleAs: 'json',
            load: lang.hitch(this, function(response) {
                if (response.error) {
                    errorHandler(response.error);
                    return;
                }
                var layerName = response.featureCollection.layers[0].layerDefinition.name;
                var tipoGeom = response.featureCollection.layers[0].featureSet.geometryType;
                var geometria = response.featureCollection.layers[0].featureSet.features[0].geometry.rings[0];
                var extent = response.featureCollection.layers[0].layerDefinition.extent;
                if (tipoGeom != tipoInfo) {
                    alert('El tipo de dato geometrico es diferente al que se esperaba ');
                    return;
                } else {
                    showCoberturaFromShapeFile(geometria, extent);
                }
            }),
            error: lang.hitch(this, errorHandler)
        });
    }

    function errorHandler(error) {
        console.log("Exception en errorHandler");
    }

    function initControles() {
        iniControlEscala();
        iniControlTocLayers();
        iniControlBotonExtentPeru();
    }

    function iniControlEscala() {
        L.control.scale().addTo(map);
    }

    function iniControlTocLayers() {
        var baseMaps = {
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(assets/img/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Mosaico imágenes</span>": mb_Imagery,
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(assets/img/icontopo.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block;'>Topográfico</span>": mb_Topographic,
            "<i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(assets/img/icongris.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block;'>Gris</span>": mb_Gray
        };
        var overlayMaps = {
            "<i style='font-size:15px;' title='Muestra la concentración de las alertas detectadas la ultima semana monitoreada en tonos de colores que ayudan a identificar las áreas de ALTA concentración de alertas' class='icon-info'></i><span style='font-size:11px; display: inline-block; width:140px;'>Concentración de Alertas </span><span> &nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/iconsemana2.png'  width='175px;' /><br>": heat,
            "<span style='font-size:11px;'>ATD 2023</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Muestra las Alertas Tempranas de Deforestación (ATD), detectadas el ultimo año, en color AZUL están las alertas acumuladas a lo largo ultimo año y en color ROJO las alertas detectadas la ultima semana monitoreada.' class='icon-info' style='font-size:15px;'></i><i  class='icon-grid' style='color: red; background-color: red;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Última semana</span>  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Muestra las Alertas Tempranas de Deforestación (ATD), detectadas el ultimo año, en color AZUL están las alertas acumuladas a lo largo ultimo año y en color ROJO las alertas detectadas la ultima semana monitoreada.' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color:#0A61F4; background-color: #0A61F4;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Acumulado</span>  <br> ": ALERTAS_PNCB_2023,
            "<i title='Muestra las Alertas Tempranas de Deforestación (ATD), detectadas el año 2022' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: red; background-color: #FE2EF7;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>ATD 2022</span>": ALERTAS_PNCB_2022,
            "<i title='Muestra la pérdida de bosque ocurrida durante el periodo 2001 al 2021' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #FFD37F; background-color: #FFD37F;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Pérdida 2001-2021</span>&nbsp;": lyRasterP2001_2014,
            "<i title='Muestra Bosque Húmedo Amazónico al 2021' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #A1C562; background-color: #A1C562;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Bosque Húmedo Amazónico</span>&nbsp;": lyRasterBosqueAl_2019,
            "<i title='Muestra el No Bosque al 2000, año línea de base en el que se definió que era Bosque y que No Bosque, y luego se monitorea anualmente la pérdida de bosques' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #B3B3B3; background-color: #B3B3B3;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>No Bosque 2000</span>&nbsp;": lyRasterNoB2000,
            "<i title='Muestra caminos detectadas del año 2017' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: yellow; background-color: yellow;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Caminos detectados 2017</span>": lyCaminos2017,
            "<i title='Muestra caminos detectadas del año 2018' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #8AFF33; background-color: #8AFF33;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Caminos detectados 2018</span>": lyCaminos2018,
            "<i title='Muestra caminos detectadas del año 2019' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #4EE5E3; background-color: #4EE5E3;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Caminos detectados 2019</span>": lyCaminos2019,
            "<i title='Muestra caminos detectadas del año 2020' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #be008d; background-color: #be008d;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Caminos detectados 2020</span>": lyCaminos2020,
            "<i title='Muestra caminos detectadas del año 2021' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #ff9933; background-color: #ff9933;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Caminos detectados 2021</span>": lyCaminos2021,
            "<span style='font-size:11px;'>Riesgo de Deforestación 2018</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Riesgo Muy Bajo' class='icon-info' style='font-size:15px;'></i><i  class='icon-grid' style='color: #e9ffbe; background-color: #e9ffbe;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Muy Bajo</span>  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Riesgo Bajo' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color:#a3ff73; background-color: #a3ff73;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Bajo</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Riesgo Medio' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color:#38a800; background-color: #38a800;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Medio</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Riesgo Alto' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color:#ffaa00; background-color: #ffaa00;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Alto</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i title='Riesgo Muy Alto' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color:#ff0000; background-color: #ff0000;'>&nbsp;&nbsp;</i><span style='font-size:11px; display: inline-block;  text-align: left;'>&nbsp;Muy Alto</span> <br> ": lyRasterRiesgoDeforest
        };
        var overlayMaps2 = {
            "<i title='Muestra información de Bosque Estacionalmente Seco' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #A1A100; background-color: #A1A100;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Bosque Estacionalmente Seco</span>&nbsp;": lyRasterBosqueEstacionSeco,
            "<i title='Muestra Bosque Tropical del Pacífico' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #0CA583; background-color: #0CA583;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Bosque Tropical del Pacífico</span>&nbsp;": lyRasterBosqueTropicalPacific,
            "<i title='Muestra Actividad Antrópica en bosque seco ' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #FF0000; background-color: #FF0000;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Actividad Antrópica</span>&nbsp;": lyRasterBosqueSecoAntropico
        };
        var overlayMaps1 = {
            "<i title='Muestra el área de interés definida por el usuario' class='icon-info' style='font-size:15px;'></i><i class='icon-none'style='border-style: solid;border-color:#5DADE2 ; margin-top:2px; padding-top:2px; '>&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Área de interés</span>&nbsp;": gj,
            "<i title='' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Sentinel 2 - L2A</span>": wmsLayer,
            "<i title='El Sistema de Alerta Temprana Forestal (JJ-FAST) basado en imágenes de radar, con frecuencia de 1.5 mes. Mayor información.  http://www.eorc.jaxa.jp/jjfast/note.html  ' class='icon-info' style='font-size:15px;'></i><i class='icon-grid' style='color: #E0680A; background-color: #E0680A;'>&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Alertas - JJ Fast</span><a href='http://www.eorc.jaxa.jp/jjfast/note.html' target='_blank' >  (+)</a>": jjFast,
            "<i title='' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>LANDSAT 8-9</span>": wmsLayerLansat8_9
        };
        var overlayMaps_Planet = {
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Enero 2022 </span>": wmtsEnero2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Febrero 2022 </span>": wmtsFeb2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Marzo 2022 </span>": wmtsMarch2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Abril 2022 </span>": wmtsAbril2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Mayo 2022 </span>": wmtsMay2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Junio 2022 </span>": wmtsJun2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Julio 2022 </span>": wmtsJuli2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Agosto 2022 </span>": wmtsAgost2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Setiembre 2022 </span>": wmtsSetiembre2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Octubre 2022 </span>": wmtsOctubebre2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Noviembre 2022 </span>": wmtsNoviembre2022,
            "<i title='Mosaico de 5m de resolución de Planet brindados a través del gobierno Noruego' class='icon-info' style='font-size:15px;'></i><i class='icon-none' style='color: #FFD37F;  background-color: #FFD37F; background-image:url(images/iconsatelite.png)'>&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;<span style='font-size:11px; display: inline-block; '>Diciembre 2022 </span>": wmtsDiciembre2022
        };
        var ctrlLayersCapas = L.control.layers(null, overlayMaps, {
            collapsed: false,
        });
        ctrlLayersCapas.addTo(map);
        divLeyendaNew.appendChild(ctrlLayersCapas.getContainer());
        var ctrlLayersCapas2 = L.control.layers(null, overlayMaps2, {
            collapsed: false
        });
        ctrlLayersCapas2.addTo(map);
        divLeyendaNew2.appendChild(ctrlLayersCapas2.getContainer());
        var ctrlLayersCapas1 = L.control.layers(null, overlayMaps1, {
            collapsed: false
        });
        ctrlLayersCapas1.addTo(map);
        var ctrlLayersMaps_Planet = L.control.layers(null, overlayMaps_Planet, {
            collapsed: false
        });
        ctrlLayersMaps_Planet.addTo(map);
        divLeyendaNew3.appendChild(ctrlLayersCapas1.getContainer());
        divLeyendaNew5.appendChild(ctrlLayersMaps_Planet.getContainer());
        var ctrlLayersBase = L.control.layers(baseMaps, null, {
            collapsed: false,
            position: "bottomleft"
        });
        ctrlLayersBase.addTo(map);
        map.on('baselayerchange', function(e) {});
        map.on('overlayadd', function(e) {
            loadLayerAsociate(e);
        });
        map.on('overlayremove', function(e) {
            remLayerAsociate(e);
        });
    }

    function loadLayerAsociate(e) {
        lyCaminos2017.bringToFront();
        lyRasterNoB2000.bringToFront();
        lyRasterP2001_2014.bringToFront();
        lyRasterP2001_2014.bringToFront();
        lyRasterBosqueAl_2019.bringToFront();
        ALERTAS_PNCB_2023.bringToFront();
        lyRasterBosqueSecoAntropico.bringToFront();
        lyRasterBosqueTropicalPacific.bringToFront();
        lyRasterBosqueEstacionSeco.bringToFront();
    }

    function remLayerAsociate(e) {}

    function iniControlBotonExtentPeru() {
        var ourCustomControl = L.Control.extend({
            options: {
                position: 'topleft'
            },
            onAdd: function(map) {
                var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
                container.style.backgroundColor = 'white';
                container.style.backgroundImage = "url(assets/img/mundo.png)";
                container.style.backgroundSize = "30px 30px";
                container.style.width = '35px';
                container.style.height = '35px';
                container.onclick = function() {
                    setExtentPeru();
                }
                return container;
            }
        });
        map.addControl(new ourCustomControl());
    }

    function iniCtrlAnalisisConcentrac() {
        var ourCustomControl2 = L.Control.extend({
            options: {
                position: 'topleft'
            },
            onAdd: function(map) {
                var container = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
                container.style.backgroundColor = 'white';
                container.style.backgroundImage = "url(img/radar.png)";
                container.style.backgroundSize = "20px 20px";
                container.style.width = '20px';
                container.style.height = '20px';
                container.onclick = function() {
                    getFocosPrincipales(idAreaActiva);
                }
                return container;
            }
        });
        map.addControl(new ourCustomControl2());
    }

    function setExtentPeru() {
        map.setView([-9.774, -74.562], 5);
    }

    function cargaMapaBase(opt) {
        switch (opt) {
            case "mb_ImageryLabels":
                return;
                break;
            case "mb_OceansLabels":
                return;
                break;
            case "mb_GrayLabels":
                return;
                break;
            case "mb_DarkGrayLabels":
                return;
                break;
            case "mb_TerrainLabels":
                return;
                break;
        }
        map.removeLayer(mb_ImageryLabels);
        map.removeLayer(mb_OceansLabels);
        map.removeLayer(mb_GrayLabels);
        map.removeLayer(mb_DarkGrayLabels);
        map.removeLayer(mb_TerrainLabels);
        switch (opt) {
            case "Imágenes":
                mb_ImageryLabels.addTo(map);
                break;
            case "Oceanos":
                mb_OceansLabels.addTo(map);
                break;
            case "Gris":
                mb_GrayLabels.addTo(map);
                break;
            case "Gris Oscuro":
                mb_DarkGrayLabels.addTo(map);
                break;
            case "Terrain":
                mb_TerrainLabels.addTo(map);
                break;
        }
    }

  

    function zoomAreaActiva() {
        map.fitBounds([
            [eAAa2, eAAa1],
            [eAAb2, eAAb1]
        ]);
    }

    function zoomMap() {
        if (map) {
            alert('si');
        } else {
            alert('no');
        }
        map.zoomIn(2);
    }

    function inicompartePunto(x, y) {
        xPoint = x;
        yPoint = y;
        $('#divComparteAlertas').css("display", "block");
    }



    function showAlertas(result, fechas) {
        $(".title-alert").html("Resumen de Áreas Monitoreadas <br>" + " Del " + fechas.menor + " al " + fechas.mayor);
        var len = result[0].datos.length;
        var html = "<table cellpadding='0' cellspacing='0'  style='width: 98%; max-height: 600px !important;' class='custom' >";
        html += "<tr><th >Área Monitoreada</th> <th ><div >N° Alertas</div></th>    <th ><div >Ha. Aprox</div></th>";
        html += "<th>kml</th>";
        html += "</tr>";
        var list = "<option value=-1> -Seleccionar- </option>";
        for (var i = 0; i <= len - 1; i++) {
            name1 = "linkcobA_" + result[0].datos[i].idarea_;
            name2 = "linkcobB_" + result[0].datos[i].idarea_;
            var ha = ((result[0].datos[i].total_) * ((27.8 * 27.8) / 10000)).toFixed(1);
            html += "<tr><td ><a href='#'   id='" + name1 + "' style='font-size:11px; text-decoration:none;'   >" + result[0].datos[i].descripcion_ + "<a></td><td    ><div ><a href='#' id='" + name2 + "'  style='text-decoration:none;' >" + result[0].datos[i].total_ + "<a></div></td>     <td   ><div ><a href='#' style='text-decoration:none;' >" + ha + "<a></div></td>";
            html += "<td> ";
            list += "<option value=" + result[0].datos[i].idarea_ + "> " + result[0].datos[i].descripcion_ + " </option>";
            if (result[0].datos[i].total_ > 0) {
                name3 = "linkDown_" + result[0].datos[i].idarea_;
                name4 = "PllinkDown_" + result[0].datos[i].idarea_;
                html += "<a alt='Desgargar kml' href='#' style='text-decoration:none;' ><i id='" + name3 + "' class='icon-map-pin' style='color: green; '></i></a>";
            }
            html += "</td>";
            html += "</tr>";
        }
        html += "</table>";
        $("#divListaAlertas").html(html);
        $("#dr-misareas").find('option').remove().end().append(list).trigger('chosen:updated');
        for (var i = 0; i <= len - 1; i++) {
            name1 = "linkcobA_" + result[0].datos[i].idarea_;
            name2 = "linkcobB_" + result[0].datos[i].idarea_;
            name3 = "linkDown_" + result[0].datos[i].idarea_;
            name4 = "PllinkDown_" + result[0].datos[i].idarea_;
            idarea = result[0].datos[i].idarea_;
            var ha = ((result[0].datos[i].total_) * ((27.8 * 27.8) / 10000)).toFixed(1);
            document.getElementById(name1).onclick = lang.hitch(this, function(objeto) {
                id = objeto.target.id;
                id2 = id.split("_");
                getCoordenadasCobertura(id2[1]);
                SUBTITLGRF = $("#" + id).html();
                getEstadisticos("", id2[1], "2");
                setAreaActiva(id2[1], $(objeto.target).closest('tr')[0].children[2].innerText);
                $(objeto.target).closest('tr').addClass('active').siblings().removeClass('active');
                $("#pstPorLimites").hide();
                $("#pstPorAreas").show();
                $('#pstPorLimitesHead').removeClass("activa")
                $("#pstPorAreasHead").addClass("activa")
                $("#dr-misareas option[value='" + id2[1] + "']").attr("selected", true);
            });
            document.getElementById(name2).onclick = lang.hitch(this, function(objeto) {
                ida = objeto.target.id;
                ida2 = ida.split("_");
                getCoordenadasCobertura(ida2[1]);
                setAreaActiva(ida2[1], $(objeto.target).closest('tr')[0].children[2].innerText);
                $(objeto.target).closest('tr').addClass('active').siblings().removeClass('active');
            });
            if (result[0].datos[i].total_ > 0) {
                document.getElementById(name3).onclick = lang.hitch(this, function(objeto) {
                    ida = objeto.target.id;
                    ida2 = ida.split("_");
                    descargaKML(ida2[1]);
                });
            }
        }
    }

    function setAreaActiva(idarea, ha) {
        var idRowNomb = "linkcobA_" + idarea;
        $("#divContenOptAreaActiva").show();
        $("#divNombreAreaActiva").html(" " + $("#" + idRowNomb).html() + ", Aproximadamente " + ha + "(ha) deforestadas");
        idAreaActiva = idarea;
    }

  

    function zoomFoco(posicionArray) {
        var res1 = limpiaResponse(arrFocos[0].data[posicionArray].centro);
        var coordsTxt = res1.split(",");
        var mins = coordsTxt[0];
        var maxs = coordsTxt[2];
        var coordsmins = mins.split(" ");
        var coordsmaxs = maxs.split(" ");
        map.fitBounds([
            [coordsmins[1], coordsmins[0]],
            [coordsmaxs[1], coordsmaxs[0]]
        ]);
    }

    function showFocos(result) {
        arrFocos = result;
        var len = result[0].data.length;
        if (len > 0) {
            var tblFocos = "<table>";
            for (var y = 0; y <= (len - 1); y++) {
                var name1 = "foc_" + y;
                tblFocos += "<tr><td><a href='#' id='" + name1 + "'   >" + result[0].data[y].total + " Alertas concentradas<a></td></tr>";
                var res1 = limpiaResponse(result[0].data[y].radio);
                var coordsTxt = res1.split(",");
                var coord = [];
                for (var x = 0; x <= (coordsTxt.length - 1); x++) {
                    pnto = coordsTxt[x];
                    pnto2 = pnto.split(" ");
                    coord.push([pnto2[0], pnto2[1]]);
                }
                var pntoOne = coordsTxt[0];
                var pntoOne2 = pntoOne.split(" ");
                coord.push([pntoOne2[0], pntoOne2[1]]);
                var formObject = {
                    type: "Feature",
                    geometry: {
                        type: "Polygon",
                        coordinates: [coord]
                    },
                    properties: {
                        name: "Mis coberturas"
                    }
                };
                gj.addData(formObject);
            }
            tblFocos += "</table>";
            $("#divRstFocosRes").html(tblFocos);
            $("#divRstFocosLoading").hide();
            for (var y = 0; y <= (len - 1); y++) {
                var name1 = "foc_" + y;
                document.getElementById(name1).onclick = lang.hitch(this, function(objeto) {
                    id = objeto.target.id;
                    id2 = id.split("_");
                    zoomFoco(id2[1])
                });
            }
        }
    }

   

    function getSeparator(string) {
        var separators = [",", "      ", ";", "|"];
        var maxSeparatorLength = 0;
        var maxSeparatorValue = "";
        arrayUtils.forEach(separators, function(separator) {
            var length = string.split(separator).length;
            if (length > maxSeparatorLength) {
                maxSeparatorLength = length;
                maxSeparatorValue = separator;
            }
        });
        return maxSeparatorValue;
    }

    function preparafetaureDrop(datos, UTM) {
        var tipo = getTipoEntidad(datos)
        if (tipo == "punto") {
            loadPuntoCsv(datos, UTM);
        }
        if (tipo == "linea") {
            loadLineaCsv(datos, UTM);
        }
        if (tipo == "polygon") {
            loadPoligonoCsv(datos, UTM);
        }
    }

    function loadPoligonoCsv(datos, UTM) {
        var arrCoords = [];
        for (x = 0; x <= datos.length - 1; x++) {
            arrCoords.push([datos[x].x, datos[x].y]);
        }
        if (UTM) {
            var zona = this.cboOptZona.value;
            var polygonJson = {
                "rings": [arrCoords],
                "spatialReference": {
                    "wkid": zona
                }
            };
            var polygon = new Polygon(polygonJson);
            this.paramsProject.geometries = [polygon];
            this.paramsProject.outSR = this.mapa.spatialReference;
            this.srvGeometria.project(this.paramsProject, lang.hitch(this, function(geometries) {
                var geometry_ = geometries[0];
                var graphic = new Graphic(geometry_, null, {
                    ren: 1
                });
                this.clearGraphicsCobertura();
                this.polygonGraphics.add(graphic);
                this.graphicSaveCob = new Graphic(graphic.geometry, null, null);
                var extent = geometry_.getExtent();
                this.mapa.setExtent(extent);
                this.btnGuardaActividadIlegal.setDisabled(false);
            }), function(errPry) {
                alert('Error en la proyeccion : ' + errPry.details);
            });
        } else {
            var polygonJson = {
                "rings": [arrCoords],
                "spatialReference": {
                    "wkid": 4326
                }
            };
            var polygon = new Polygon(polygonJson);
            var graphic = new Graphic(polygon, null, {
                ren: 1
            });
            this.clearGraphicsCobertura();
            this.polygonGraphics.add(graphic);
            this.graphicSaveCob = new Graphic(graphic.geometry, null, null);
            var extent = polygon.getExtent();
            this.mapa.setExtent(extent);
        }
    }


});
var toogleElement = function(element, event, jsn) {
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
    var $element = $(element),
        $target = jsn.family ? $element[jsn.family]((jsn.target || "")) : $(jsn.target),
        $target = jsn.find ? $target.find(jsn.find) : $target,
        className = jsn.class || "x-active";
    if (!$element.hasClass(className)) {
        if ($element.data('siblings')) $element.closest($element.data('siblings')).find('.x-active').trigger('click');
        $target.addClass(className);
        $element.addClass(className);
        if (jsn.home) {
            if (jsn.sclass) {
                $('body').removeClass('open').addClass(jsn.sclass);
            } else {
                $('body').removeClass('jsn.class').addClass('open');
            }
        }
        if (jsn.slide) $target.slideDown('fast');
        if (jsn.fade) $target.fadeIn('fast');
    } else {
        $target.removeClass(className);
        $element.removeClass(className);
        if (jsn.home) {
            if (jsn.sclass) {
                $('body').removeClass(jsn.sclass);
            } else {
                $('body').removeClass('open');
            }
        }
        if (jsn.slide) $target.slideUp('fast');
        if (jsn.fade) $target.fadeOut('fast');
    }
}

function closeMenu(element, event) {
    event.preventDefault ? event.preventDefault() : event.returnValue = false;
    $('#menu-app').find('.x-active').trigger('click');
}
var geo = {};
(function(geo, $, $win) {
    var lightbox = function(element, event, callback) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var that = this;
        this.element = $(element);
        this.popup = null;
        this.clone = null;
        this.callback = callback;
        this.data = this.element.data('x');
        this.popup = $(that.data.content);
        this.element.removeAttr('onclick').on('click', function(e) {
            e.preventDefault();
            that.show();
        }).trigger('click');
        that.binned();
    }
    lightbox.prototype.center = function(init) {
        if (isBody) $('html').addClass('ui-popup-on');
        else $('html,body').animate({
            scrollTop: parseInt($to.offset().top)
        }, 'slow', 'quint');
        this.popup.css({
            width: isBody ? $win.width() : $to.outerWidth(true),
            height: isBody ? $win.height() : $to.outerHeight(true),
            position: isBody ? 'fixed' : 'absolute'
        });
        this.popup.show();
        var top = ((isBody ? dim('Height', 'min') : $to.outerHeight(true)) - $inner.outerHeight(true)) / 2;
        if (init) $inner.css({
            top: -$inner.outerHeight(true)
        });
        $inner.css({
            left: ((isBody ? $('body').width() : $to.outerWidth(true)) - $inner.width()) / 2
        }).animate({
            top: top > 0 ? top : 0
        }, 'quint');
    }
    lightbox.prototype.binned = function() {
        var that = this;
        var remove = function(e) {
            that.popup.removeClass('active');
        }
        this.popup.on('click', function(e) {
            e.stopPropagation();
            if ($(e.target).is('.popup-map')) {
                e.preventDefault();
                if (e.gesture) e.gesture.stopPropagation(), e.gesture.preventDefault();
                remove();
            }
        });
        this.popup.find('.x-close').on('click', remove);
    }
    lightbox.prototype.show = function() {
        var that = this;
        if (that.popup.hasClass('active')) that.popup.removeClass('active');
        else that.popup.addClass('active');
    };
    lightbox.prototype.render = function() {
        var that = this,
            suffix = this.data.suffix || false;
        if (this.data.content.substring(0, 1) == "#") {
            this.clone = this.clone || $(this.data.content);
            $(this.data.content).remove();
        } else this.clone = $('<div>' + this.data.content + '</div>');
        $to = $(this.element.data('to') || 'body');
        isBody = $to.is('body');
        this.popup = $(['<div class="ui-popup-draw' + (suffix ? ' ui-popup-' + suffix : '') + '">', '<div class="ui-inner">', '</div>', '</div>'].join(''));
        $inner = this.popup.hide().find('.ui-inner').append(this.clone.clone(true).removeClass('hide'));
        $to.append(this.popup);
        if (typeof this.callback === 'function') this.callback(this.popup);
        that.binned();
    }
    geo.lightbox = lightbox;
    $.fn.lightbox = function() {
        this.each(function() {
            new lightbox($(this))
        })
    };
})(geo, jQuery, $(window));