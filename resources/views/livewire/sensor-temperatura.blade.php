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


        <div class='col-sm-16'>
            <div class='card d-block mx-auto gy-3 bg-primary text-white'>
            <div class='card-body '>
              <h5 class='card-title text-center' style='font-size: 230%; '><i class='fa' :class='claseTermometro'></i> Termometro Horno </h5>
              <div class=''>
              </div>
              <div class='row'>
                <div class='col-6 '>
                    <div class='text-center' style='font-size: 160%;'>
                    Temperatura
                    </div>
                    <div class='text-center' id="temperatura" style='font-size: 150%;'>

                    </div>
                    </div>
                    <div class='col-6 '>
                        <div class='text-center' style='font-size: 160%;'>
                    Humedad
                        </div>
                        <div class='text-center' id="humedad" style='font-size: 150%;'>

                        </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>


                <h6>Ultima lectura hace: <strong id="ultimaLectura" style='color:white;'></strong></strong> segundos (s)</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js'></script>


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

