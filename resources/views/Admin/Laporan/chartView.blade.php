@php
    $monitoring = \App\Monitoring::whereDate('date',now())->orderBy('time','desc')->limit(10)->orderBy('time','asc')->get();
    $data = [];
    $room = \App\Ruangan::where('id',1)->first();

@endphp
@if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
@endif
@if (session()->has('failed'))
    <div class="alert alert-danger">
        {{ session()->get('failed') }}
    </div>
@endif
<form action="/downloadLaporan" method="post" id="formqq">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="input-select">Tanggal Awal</label>
                <input type="date" name="awal" class="form-control  @error('awal') is-invalid @enderror" id="awal">
                @error('awal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="input-select">Tanggal Akhir</label>
                <input type="date" name="akhir" class="form-control @error('akhir') is-invalid @enderror" id="akhir">
                @error('akhir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Ruangan</label>
                <select name="ruang" id="ruangan" class="form-control">
                    @foreach($ruang as $f)
                        <option value="{{ $f->id }}">{{ $f->nama }}</option>
                    @endforeach
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="inputText3" class="col-form-label">Parameter</label>
                <select name="satuan" id="parameter" class="form-control">
                    <option value="allpar">Semua parameter</option>
                    <option value="suhu">Suhu</option>
                    <option value="kelembapan">Kelembapan</option>
                    <option value="tekanan">Tekanan</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="btn btn-primary" style="text-align: right;" id="myBtn">Show Chart</div>
            <span>*) Hanya menampilkan 10 data terakhir</span>
        </div> 
    </div>
</form>


<script>
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
    )
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
    )
  window.Promise ||
    document.write(
      '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
    )
</script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<div class="row" style="margin-top: 50px;">
    <div class="col-12">
        <div class="card" id="suhuAppend">
            <div id="chartSuhu"></div>
        </div>
    </div>
    <div class="col-12">
        <div class="card" id="tekananAppend">
            <div id="chartTekanan"></div>
        </div>
    </div>
    <div class="col-12">
        <div class="card" id="kelembapanAppend">
            <div id="chartKelembapan"></div>
        </div>
    </div>
</div>

<script src="/assets/vendor/sweetalert/sweetalert.min.js"></script>

<script>
    document.getElementById("myBtn").onclick = function() {
        if($('#awal').val() === ""){
            Swal.fire({
                title: 'Tanggal awal tidak boleh kosong',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
               })
        } else if ($('#akhir').val() === "") {
            Swal.fire({
                title: 'Tanggal akhir tidak boleh kosong',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
               })
        } else {
            
            render()
        }


    };
    function render() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url:'api/getData',
          method:'GET',
          data:{
            startDate:$('#awal').val(),
            endDate:$('#akhir').val(),
            room:$('#ruangan').val(),
            parameter:$('#parameter').val(),
          },
          dataType:'JSON',
          success:function(response){
            var suhu = []
    var suhuMax = []
    var suhuMin = []
    var kelembapan = []
    var kelembapanMax = []
    var kelembapanMin = []
    var tekanan = []
    var tekananMax = []
    var tekananMin = []
            $('#chartSuhu').remove()
            $('#suhuAppend').prepend(`<div id="chartSuhu"></div>`)
            $('#chartTekanan').remove()
            $('#tekananAppend').prepend(`<div id="chartTekanan"></div>`)
            $('#chartKelembapan').remove()
            $('#kelembapanAppend').prepend(`<div id="chartKelembapan"></div>`)
            let monitoring = response.data
            let suhuMaxs = response.smax
            let suhuMins = response.smin
            let kelembapanMaxs = response.kmax
            let kelembapanMins = response.kmin
            let tekananMaxs = response.tmax
            let tekananMins = response.tmin
            console.log(suhuMins);
            console.log(suhuMaxs);
            console.log(kelembapanMaxs);
            console.log(kelembapanMins);
            console.log(tekananMaxs);
            console.log(tekananMins);
            
            var optionsSuhu = {
          
              series: [
                {
                  data  : suhuMax,
                  name: "Suhu Max"
                },
                {
                    data: suhu,
                    name: "Suhu"
                },
                {
                  data  : suhuMin,
                  name: "Suhu Min"
                }
              ],
              chart: {
                id: 'realtime',
                height: 350,
                type: 'line',
                animations: {
                  enabled: true,
                  easing: 'linear',
                  dynamicAnimation: {
                    speed: 1000
                  }
                },
                toolbar: {
                  show: false
                },
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: true
              },
              stroke: {
                curve: 'smooth'
              },
              title: {
                text: 'Monitoring Suhu',
                align: 'left'
              },
              markers: {
                size: 0
              },
              xaxis: {
              },
              yaxis: {
                max: parseInt(suhuMaxs) + 30,
                min: parseInt(suhuMins) - 30,
              },
              legend: {
                show: true
              },          
            colors: ['#ff0000', '#26a0fc' ,'#546E7A']
            };

          
            
            var optionsKelembapan = {
              
              series: [
                {
                  data  : kelembapanMax,
                  name: "Kelembapan Max"
                },
                {
                    data: kelembapan,
                    name: "Kelembapan"
                },
                {
                  data  : kelembapanMin,
                  name: "Kelembapan Min"
                }
              ],
              chart: {
                id: 'realtime',
                height: 350,
                type: 'line',
                animations: {
                  enabled: true,
                  easing: 'linear',
                  dynamicAnimation: {
                    speed: 1000
                  }
                },
                toolbar: {
                  show: false
                },
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: true
              },
              stroke: {
                curve: 'smooth'
              },
              title: {
                text: 'Monitoring Kelembapan',
                align: 'left'
              },
              markers: {
                size: 0
              },
              xaxis: {
              },
              yaxis: {            
                max: parseInt(kelembapanMaxs) + 30,
                min: parseInt(kelembapanMins) - 30,
              },
              legend: {
                show: true
              },
              colors: ['#ff0000', '#26a0fc' ,'#546E7A']
            };

          

            var optionsTekanan = {
              
              series: [
                 {
                  data  : tekananMax,
                  name: "Tekanan Max"
                },
                {
                    data: tekanan,
                    name: "Tekanan"
                },
                {
                  data  : tekananMin,
                  name: "Tekanan Min"
                }
              ],
              chart: {
                id: 'realtime',
                height: 350,
                type: 'line',
                animations: {
                  enabled: true,
                  easing: 'linear',
                  dynamicAnimation: {
                    speed: 1000
                  }
                },
                toolbar: {
                  show: false
                },
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: true
              },
              stroke: {
                curve: 'smooth'
              },
              title: {
                text: 'Monitoring Tekanan',
                align: 'left'
              },
              markers: {
                size: 0
              },
              xaxis: {
              },
              yaxis: {            
                max: parseInt(tekananMaxs) + 30,
                min: parseInt(tekananMins) - 30,
              },
              legend: {
                show: true
              },
              colors: ['#ff0000', '#26a0fc' ,'#546E7A']
            };

            var chartSuhu = new ApexCharts(document.querySelector("#chartSuhu"), optionsSuhu);
            var chartTekanan = new ApexCharts(document.querySelector("#chartTekanan"), optionsTekanan);
            var chartKelembapan = new ApexCharts(document.querySelector("#chartKelembapan"), optionsKelembapan);

            chartSuhu.render();
            chartKelembapan.render();
            chartTekanan.render();

            if ($('#parameter').val() == "kelembapan" || $('#parameter').val() == "tekanan") {
              $('#chartSuhu').addClass('d-none')
            }
            if ($('#parameter').val() == "tekanan" || $('#parameter').val() == "suhu") {
              $('#chartKelembapan').addClass('d-none')
            }
            if ($('#parameter').val() == "suhu" || $('#parameter').val() == "kelembapan") {
              $('#chartTekanan').addClass('d-none')
            }

            suhu = [];
            kelembapan = [];
            tekanan = [];
            let dates = 0
            const months = ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            let formatted_date = "";
            let newMonitor = monitoring.sort((a,b)=>{
              return a.time.localeCompare(b.time);
            });
            let monitor = newMonitor
            console.log(newMonitor);
            monitor.forEach(element => {
                dates = new Date(element.date+' '+element.time)
                suhu.push({
                  x: element.time,
                  y: element.suhu
                })
                suhuMax.push({
                  x: element.time,
                  y: suhuMaxs
                })
                suhuMin.push({
                  x: element.time,
                  y: suhuMins
                })
                kelembapan.push({
                  x: element.time,
                  y: element.kelembapan
                })
                kelembapanMax.push({
                  x: element.time,
                  y: kelembapanMaxs
                })
                kelembapanMin.push({
                  x: element.time,
                  y: kelembapanMins
                })
                tekanan.push({
                  x: element.time,
                  y: element.tekanan
                })
                 tekananMax.push({
                  x: element.time,
                  y: tekananMaxs
                })
                tekananMin.push({
                  x: element.time,
                  y: tekananMins
                })
                
            });        

              
            chartSuhu.updateSeries([
                {
                    data: suhuMax
                },
                {
                    data: suhu
                },
                {
                    data: suhuMin
                },
            ])

            chartKelembapan.updateSeries([
                {
                    data: kelembapanMax
                },
                {
                    data: kelembapan
                },
                {
                    data: kelembapanMin
                },
            ])

            chartTekanan.updateSeries([           
                {
                    data: tekananMax
                },
                {
                    data: tekanan
                },
                {
                    data: tekananMin
                },
            ])
          },
          error : function(e) {
            console.log(e)
          }
      });
    }
</script>

