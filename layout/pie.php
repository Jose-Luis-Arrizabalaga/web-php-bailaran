<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css" />
<footer>
    <section class="suscribetenews">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>SUSCRIBETE AL <span class='rojoDestacado'>NEWSLETTER</span> Y RECIBE UNA CLASE GRATIS</h3>
                    <span class="barraTitulo"></span>
                    <!--<form class="formNews" id="formNews" method="post">
                        <input type="text" name="nombre" id="nombre" value="Nombre" onclick="if(this.value=='Nombre') this.value=''" onblur="if(this.value=='') this.value='Nombre'"/><br/>
                        <input type="text" name="apellidos" id="apellidos" value="Apellidos" onclick="if(this.value=='Apellidos') this.value=''" onblur="if(this.value=='') this.value='Apellidos'"/><br/>
                        <input type="text" name="email" id="email" value="Email" onclick="if(this.value=='Email') this.value=''" onblur="if(this.value=='') this.value='Email'"/><br/>
                        <input type="text" name="descripcion" id="descripcion" value="Descripcion" onclick="if(this.value=='Descripcion') this.value=''" onblur="if(this.value=='') this.value='Descripcion'"/><br/>
                        <input type="checkbox" style="width:10px" required> Acepto la <a href="/politica-privacidad.php">Política de privacidad</a></br>
                        <input type="checkbox"style="width:10px" required> Acepto el envío de comunicaciones comerciales<br/>
                        <div class="botonEnviar"><button type="submit" class="enviar" id="enviar2">Enviar</button></div>
                    </form>-->
                    <div class="alerta"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button class="enviar" onclick="window.location.href='/contacto/newsletter.php'">
                        SUSCRÍBETE
                    </button>
                </div>
            </div>
            <br>
        </div>
    </section>
    <?php include("pie-social-ubicacion.php"); ?>




    <div class="flecha-top" id="animarscroll" style="display: block;">
        <a href="https://wa.me/34665274399">
            <img class="whatassp" src="/img/aLaWeb/whatassp-icon-64x64.png">
        </a>
        <a title="Ir a inicio página">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>

</footer>
<div class="cookies" id="cookies">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-10">
                <a href="/cookies.php" rel="nofollow" title="Información política de cookies Bailaran">Información
                    política de cookies</a>. Continuar navegando en Bailaran significa que estás de acuerdo con el uso
                de las cookies. Las cookies tienen como función el almacenar información en tu navegador web para
                ofrecerte una mejor experiencia de usuario.
            </div>
            <div class="col-md-2 col-sm-2 text-right">
                <button class="btn btn-default" onclick="controlCookies()">Aceptar</button>
            </div>
        </div>
    </div>
</div>


<script src="/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script>
    if (localStorage.controlcookie > 0) {
        document.getElementById('cookies').style.display = 'none';
    }
    function controlCookies() {
        localStorage.controlcookie = (localStorage.controlcookie || 0);
        localStorage.controlcookie++;
        cookies.style.display = 'none';
    }
    $(document).ready(function () {
        $(function () {
            $("#animarscroll").on("click", function () {
                var posicion = $("#arriba").offset().top;
                $("html, body").animate({
                    scrollTop: posicion
                }, 1000);
            });
        });
        $(function () {
            $(document).on("scroll", function () {
                var desplazamientoActual = $(document).scrollTop();
                var controlArriba = $("#animarscroll");
                if (desplazamientoActual > 100) {
                    controlArriba.css({ "opacity": "1", "transition": "0.3s" });
                }
                if (desplazamientoActual < 100) {
                    controlArriba.css({ "opacity": "0", "transition": "0.3s" });
                }
            });

        });
        $('#enviar2').click(function () {
            var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            var txtError = "";
            var numErrores = 0;
            if ($("#nombre").val() == "" || $("#nombre").val() == "Nombre") {
                numErrores++;
                txtError += "Introduzca  su nombre<br>";
            }
            if ($("#apellidos").val() == "" || $("#apellidos").val() == "Apellidos") {
                numErrores++;
                txtError += "Introduzca sus apellidos<br>";
            }
            if ($("#email").val() == "" || !emailreg.test($("#email").val())) {
                numErrores++;
                txtError += " Introduzca  el email correctamente<br>";
            }
            if ($("#descripcion").val() == "" || $("#Descripcion").val() == "Descripcion") {
                numErrores++;
                txtError += "Introduzca la descripcion<br>";
            }
            if ($("#privacidad").prop('checked')) {
                numErrores++;
                txtError += "Debe aceptar la política de privacidad para continuar<br>";
            }
            if ($("#comunicaciones").prop('checked')) {
                numErrores++;
                txtError += "Debe aceptar el envío de comunicaciones comerciales para continuar<br>";
            }
            if (numErrores > 0) {
                $(".alerta").css("display", "block");
                $(".alerta").html("<p style='font-size: 18px; font-weight: bold;'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Ha habido algun error!!</p>");
                $(".alerta").append(txtError);
                return false;
            }
            else {
                $(".alerta").css("display", "none");
                $("#formNews").attr('action', '/funciones/clase-gratis.php');
                //$("#formNews").attr('action','/funciones/registro.php');
                $("#formNews").submit();
            }
        });
    });
</script>