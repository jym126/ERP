<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Live MySQL Database Search</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/style2.css.css">
    <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings('#result');
                $('#result').removeClass();
                $('#result').addClass(this.id);
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });

            // Set search input value on click of result item
            $(document).on("click", ".search-box div p", function(){
                console.log($('#result'));
                $("#"+$('#result')[0].classList[0]).val($(this).text());
                $(this).parent("#result").empty();
            });
        });
    </script>
</head>
<body>
<div class="search-box">
    <input id="codigo" type="text">
    <input id="fPrueba1" type="text" autocomplete="off" placeholder="Buscar artículo..." />
    <input id="precio" type="text"><br>
    <input id="fPrueba2" type="text" autocomplete="off" placeholder="Buscar artículo..." /><br>
    <input id="fPrueba3" type="text" autocomplete="off" placeholder="Buscar artículo..." /><br>
    <input id="fPrueba4" type="text" autocomplete="off" placeholder="Buscar artículo..." /><br>
    <input id="data" type="hidden">
    <div id="result"></div>
</div>
</body>
</html>