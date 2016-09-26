/**
 * Показ записи
 * @param $iteim идентификатор записи
 */
function showRecordAj($iteim) {
    console.log("js-showRecordAj()");
    $.ajax({
        type: 'GET',
        async: false,
        url: '/show/'+$iteim+'/',
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#modalRecord').html(data['dataRecord']);
                $('#myModal').modal('show')
            }
        }
    });

}


$(window).load(function(){

	
});
