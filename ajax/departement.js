function refreshDepartement (valeur){
    $.ajax({
        type: "POST",
        url: "/../ajaxjquery/ajax/departement.php",
        data: 'region=' + valeur,
        success: function(data){
            $('#departement').html(data);
        }
    })
}