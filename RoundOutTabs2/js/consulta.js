function miConsulta(form){
    var scrpt=$('#'+form).attr('action');
    var myData = $('#'+form).serializeArray();
    var data = $.toJSON(myData);
    $.post(scrpt, {data: data},
        function(retData){
            $("#codigo").empty();
            var myData = retData;
            for (var i=0;i<myData.length;i++){
                var codigo = myData[i]["codigo"];
                var nombre = myData[i]["nombre"];
                var precio = myData[i]["precio"];
                var el=$("<div>"+codigo +" "+ nombre +" "+ precio+"</div>");

                $("#codigo").append(el);
            }

        }, "json");
}