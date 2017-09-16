/**
 * Generate the map
 */
if(typeof(L) !== 'undefined') {
    /////////////////////
    // Map variables
    /////////////////////    
    var zoom                    = 17;
    var lat                     = currentLat;
    var lng                     = currentLng;
    var marker                  = null;
    L.Icon.Default.imagePath    = '../../../../img';
    /////////////////////
    // Dafault map
    /////////////////////  
    var map = new L.Map('simpleMap').setView(new L.LatLng(lat, lng), zoom, {animation: true});
    // Disable drag and zoom handlers.
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.keyboard.disable();
    //Load the base map
    var mapabase = L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:    '© <a href="http://openstreetmap.org" target="_blank">OpenStreetMap</a>',
        opacity:        0,
        transparent:    true,
        crs:            L.CRS.EPSG4326
    }).addTo(map);
    //Set PNOA layer
    var base = L.tileLayer.wms("//www.ign.es/wms-inspire/pnoa-ma", {
        attribution:    '<a href="http://www.ign.es" target="_blank">© Instituto Geográfico Nacional</a>',
        layers:         'OI.OrthoimageCoverage',
        format:         'image/jpeg',
        transparent:    false,
        version:        '1.3.0',
        crs:            L.CRS.EPSG4326,
    }).addTo(map);
    //Generate the marker
    marker  = L.marker(new L.LatLng(lat, lng)).addTo(map);
}