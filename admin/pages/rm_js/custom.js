//js rm code
$(document).ready(function(){
    $("#country ").change(function(){
        var zone_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "search_dist.php",
            data: 'id='+zone_id,
            dataType: "html",
            async: false,
            success: function(data){
                $('#search_dist').html(data);
                $('#search_tehsil_city').html('<option value="">---Select City---</option>');
            }
        });
    });
    $("#state ").change(function(){
        var dist_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "search_tehsil_city.php",
            data: 'id='+dist_id,
            dataType: "html",
            async: false,
            success: function(data){
                $('#search_tehsil_city').html(data);
            }
        });
    });
});