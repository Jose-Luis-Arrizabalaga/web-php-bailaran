<script type="text/javascript" src="plugins/fullcalendar/lib/moment.min.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script type='text/javascript' src='plugins/fullcalendar/gcal.js'></script>
<script type="text/javascript" src='plugins/fullcalendar/es.js'></script>
<div id="prueba"></div>
<div class="calendario-modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $('#calendar').fullCalendar({
            editable:false,
            header:{
                left:'prev,today,next',
                center: 'title',
                right: 'month,agendaWeek'
            },
            firstDay:1,
            googleCalendarApiKey: 'AIzaSyAFr_GNbuEaqCkT98fd4tyblJbi8rD1N6Y',
            events: {
                googleCalendarId: 'porladanzabailaran@gmail.com'
            },
            locale:'es',
            eventClick:function(calEvent){
                $('.modal-title').html(calEvent.title);
                texto="<p>Cu&aacute;ndo: <b>"+calEvent.start.format('dddd DD-MM-YYYY hh:mm') +"</b></p>";
                texto=texto+"<p>D&oacute;nde: <b>"+calEvent.location+"</b><br>";
                texto=texto+"<a target='_blank' href='http://maps.google.es/maps?q="+calEvent.location+"'> Ver mapa </a></p>";
                if (calEvent.attachment!="")
                    texto=texto+"<p><a target='_blank' href='"+calEvent.attachment+"'>Ver archivo adjunto</a></p>";
                texto=texto+"<pre><code>"+calEvent.description+"</code></pre>";
                $('.modal-body').html(texto);
                $('.calendario-modal').modal('show');
                return false;
            }
        });

    });
</script>