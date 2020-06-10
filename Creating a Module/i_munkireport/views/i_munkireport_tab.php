<div id="i_munkireport-tab"></div>
<h2 data-i18n="i_munkireport.title"></h2>

<table id="i_munkireport-tab-table"></table>

<script>
$(document).on('appReady', function(){
    $.getJSON(appUrl + '/module/i_munkireport/get_data/' + serialNumber, function(data){
        var table = $('#i_munkireport-tab-table');
        $.each(data, function(key,val){
            var th = $('<th>').text(i18n.t('i_munkireport.column.' + key));
            var td = $('<td>').text(val);
            table.append($('<tr>').append(th, td));
        });
    });
});
</script>
