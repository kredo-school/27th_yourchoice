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

// Google map

async function initMap() {
    try {
        // The location of Uluru
        const position = { lat: -25.344, lng: 131.031 };
        // Request needed libraries.
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

        // The map, centered at Uluru
        const map = new Map(document.getElementById("map"), {
            zoom: 10,
            center: position,
            mapId: "DEMO_MAP_ID",
        });

        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: "Uluru",
        });
    } catch (error) {
        console.error("Error initializing map: ", error);
    }
}

    initMap();

// Google map API Key
