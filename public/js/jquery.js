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