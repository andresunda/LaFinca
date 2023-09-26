<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>La Finca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="font/css/all.css">
</head>

<body class="body-login">

    <div class="container">

        <div class="card card-sensor shadow-sm">
            <div class="card-body">
               <a href="{{asset('/inicioSesion')}}"><img src="images/Logofinca.png" class="u-logo-image u-logo-image-1" style="max-width: 100%;
                height: auto;"></a>

                <div id='app'>
                    <div class='row'>
                        <!--<div class='col-sm-6'>
                          <div class='card d-block mx-auto gy-3 bg-primary text-white'>
                            <div class='card-body '>
                              <h5 class='card-title text-center' style='font-size: 180%;'><i class='fas fa-temperature-up'></i> Termometro Horno</h5>
                            <div>

                            </div>
                              <div class='row'>
                                <div class='col-12 '>
                                <div class='text-center' style='font-size: 150%;'>
                                Temperatura
                                </div>
                                <div class='text-center' style='font-size: 150%;'>
                                16°C
                                </div>
                                </div>

                              </div>

                            </div>
                          </div>
                        </div>
                        -->

                        <div class='col-sm-12'>
                                    <h2 class='card-title text-center' style='font-size: 270%; '><i class='fa' :class='claseTermometro'></i> Termometro Horno </h2>
                                    <br>
                                    <div class='row'>
                                <div class='col-6 '>
                                    <div class='text-center' style='font-size: 250%; font-weight: bold;'>
                                    <div class="sensor-datos">
                                        Temperatura
                                    </div>
                                    </div>
                                    <div class='text-center' id="temperatura" style='font-size: 170%;'>

                                    </div>
                                    </div>
                                    <div class='col-6 '>
                                        <div class='text-center' style='font-size: 250%; font-weight: bold;'>
                                            <div class="sensor-datos">
                                                Humedad
                                            </div>                                        </div>
                                        <div class='text-center' id="humedad" style='font-size: 170%;'>

                                        </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br
                                        >

                                <h5>Ultima lectura hace: <strong id="ultimaLectura" style='color:black;'></strong></strong> segundo (s)</h4>
                              </div>
                            </div>
                        </div>
                      </div>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js'></script>






            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

<script>
    const INTERVALO_REFRESCO = 5000;
    new Vue({
        el: '#app',
        data: () => ({
            ultimaLectura: 0,
            temperatura: 0,
            humedad: 0,
        }),
        mounted() {
            this.refrescarDatos();
        },
        methods: {
            async refrescarDatos() {
                try {
                    const respuestaRaw = await fetch('http://172.16.246.47/api');
                    const datos = await respuestaRaw.json();
                    console.log(datos);
                    this.ultimaLectura = datos.u;
                    this.temperatura = datos.t;
                    this.humedad = datos.h;

                    document.getElementById("temperatura").innerHTML= this.temperatura+' C°'
                    document.getElementById("humedad").innerHTML= this.humedad+' %';
                    document.getElementById("ultimaLectura").innerHTML= this.ultimaLectura;


                    setTimeout(() => {
                        this.refrescarDatos();
                    }, INTERVALO_REFRESCO);
                } catch (e) {
                    setTimeout(() => {
                        this.refrescarDatos();
                    }, INTERVALO_REFRESCO);
                }
            }
        },
        computed: {

            claseTermometro() {
                if (this.temperatura <= 5) {
                    return 'fa-thermometer-empty';
                } else if (this.temperatura > 5 && this.temperatura <= 10) {
                    return 'fa-thermometer-quarter';
                } else if (this.temperatura > 15 && this.temperatura <= 25) {
                    return 'fa-thermometer-half';
                } else if (this.temperatura > 30 && this.temperatura <= 40) {
                    return 'fa-thermometer-three-quarters';
                } else {
                    return 'fa-temperature-up';
                }
            }
        }
    });
</script>
</body>

</html>
