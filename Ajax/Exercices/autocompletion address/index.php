<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
    </head>
<body>



<input name="cp" id="cp" type="text" placeholder="CP">
<input name="ville" id="ville" type="text" placeholder="Ville">
<input name="adresse" id="adresse" type="text" placeholder="Adresse">

</body>



<script>

$("#registration_form_address").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?city="+$("input[name='ville']").val(),
            data: { q: request.term },
            dataType: "json",
            success: function (data) {
                var cities = [];
                response($.map(data.features, function (item) {
                    // Ici on est obligé d'ajouter les villes dans un array pour ne pas avoir plusieurs fois la même
                    if ($.inArray(item.properties.postcode, cities) == -1) {
                        cities.push(item.properties.postcode);
                        return { label: item.properties.postcode + " - " + item.properties.city, 
                                 postcode: item.properties.postcode,
                                 value: item.properties.city
                        };
                    }
                }));
            }
        });
    },
});

</script>
</html>