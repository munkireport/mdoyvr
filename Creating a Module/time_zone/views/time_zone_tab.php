<div id="time_zone-tab"></div>
<h2 data-i18n="time_zone.title"></h2>

<table id="time_zone-tab-table"></table>

<script>
$(document).on('appReady', function(){
    $.getJSON(appUrl + '/module/time_zone/get_data/' + serialNumber, function(data){
        var table = $('#time_zone-tab-table');
        $.each(data, function(key,val){
            var th = $('<th>').text(i18n.t('time_zone.column.' + key));
            var td = $('<td>').text(val);
            table.append($('<tr>').append(th, td));
        });
    });
});
</script>
