$("#adresse").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://data.geopf.fr/geocodage/search/?postcode=" + $("input[name='cp']").val(),
            data: {
                q: request.term
            },
            dataType: "json",
            success: function (data) {
                response($.map(data.features, function (item) {
                    return {
                        label: item.properties.name + " - " + item.properties.postcode + " - " + item.properties.city,
                        postcode: item.properties.postcode,
                        city: item.properties.city,
                        value: item.properties.name,
                    };
                }));
            }
        });
    },
    select: function (event, ui) {
        $('#cp').val(ui.item.postcode);
        $('#ville1').val(ui.item.city);
    }
});