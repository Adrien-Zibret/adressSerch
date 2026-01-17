$("#cp").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://data.geopf.fr/geocodage/search/?postcode=" + $("input[name='cp']").val(),
            data: {
                q: request.term
            },
            dataType: "json",
            success: function (data) {
                var postcodes = [];
                response($.map(data.features, function (item) {
                    // Ici on est obligé d'ajouter les CP dans un array pour ne pas avoir plusieurs fois le même
                    if ($.inArray(item.properties.postcode, postcodes) == -1) {
                        postcodes.push(item.properties.postcode);
                        return {
                            label: item.properties.postcode + " - " + item.properties.city,
                            city: item.properties.city,
                            value: item.properties.postcode
                        };
                    }
                }));
            }
        });
    },
    // On remplit aussi la ville
    select: function (event, ui) {
        $('#ville1').val(ui.item.city);
    }
});