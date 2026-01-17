function refreshVille (valeur){
    $.ajax({
        type: "POST",
        url: "/../ajaxjquery/ajax/ville.php",
        data: 'departement=' + valeur,
        success: function(data){
            $('#ville').html(data);
        }
    })
}

function refreshVilleBySearch(valeur){
    $.ajax({
        type: "POST",
        url: "/../ajaxjquery/ajax/ville.php",
        data: 'search=' + valeur,
        success: function(data){
            $('#searchResult').html(data);
        }
    })
}