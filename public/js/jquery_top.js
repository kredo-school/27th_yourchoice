//Slider on advanced search modal
$(function() {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 100000,
        values: [0, 30000],
        slide: function(event, ui) {
            $("#rangeLabel").text("¥" + ui.values[0].toLocaleString() + " - ¥" + ui.values[1].toLocaleString());
        }
    });
    $("#rangeLabel").text("¥" + $("#slider-range").slider("values", 0).toLocaleString() + " - ¥" + $("#slider-range").slider("values", 1).toLocaleString());
});



// Google map-API Key//
(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAQ1u-pft-pLmlVb5TYcprtivdXXNkjfDk",
    v: "weekly",
    // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
    // Add other bootstrap parameters as needed, using camel case.
  });

  if (window.hotelAddress) {
    async function initMap() {
        try {
            // Address to geocode
            // const address = '東京都中央区日本橋浜町2-58-2';
            const address = window.hotelAddress;
    
            console.log("Geocoding address:", address); // デバッグ用
    
            // Request needed libraries.
            //@ts-ignore
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
            const { Geocoder } = await google.maps.importLibrary("geocoding");
    
            // Initialize Geocoder
            const geocoder = new Geocoder();
    
            // Geocode the address
            const geocodeResponse = await geocoder.geocode({ address: address });
            if (!geocodeResponse.results || geocodeResponse.results.length === 0) {
                throw new Error("Address not found");
            }
    
            // Get the first result's location (lat, lng)
            const position = geocodeResponse.results[0].geometry.location;
    
            // The map, centered at the geocoded position
            const map = new Map(document.getElementById("map"), {
                zoom: 15,
                center: position,
                mapId: "DEMO_MAP_ID",
            });
    
            // The marker, positioned at the geocoded position
            const marker = new AdvancedMarkerElement({
                map: map,
                position: position,
                title: address,
            });
    
        } catch (error) {
            console.error("Error initializing map: ", error);
        }
    }
    
    initMap();

  } else { console.error("Address not found or invalid."); }



// Google map API Key
