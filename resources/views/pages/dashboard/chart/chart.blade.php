@extends('home')
@section('form-layout')

<body>

  <div id="chartLine" ></div>
  <div id="chartBar" ></div>
<!-- https://codepen.io/jlalovi/details/bIyAr -->
<div class="container">
  <!-- DONUT CHART BLOCK (LEFT-CONTAINER) --> 
  <div class="donut-chart-block block"> 
                    <h2 class="titular">Tổng đơn hàng</h2>
                    <div class="donut-chart">
 <!-- PORCIONES GRAFICO CIRCULAR
      ELIMINADO #donut-chart
      MODIFICADO CSS de .donut-chart -->
      <div id="porcion1" class="recorte"><div class="quesito ios" data-rel="21"></div></div>
     <div id="porcion2" class="recorte"><div class="quesito mac" data-rel="39"></div></div>
     <div id="porcion3" class="recorte"><div class="quesito win" data-rel="31"></div></div>
     <div id="porcionFin" class="recorte"><div class="quesito linux" data-rel="9"></div></div>
 <!-- FIN AÑADIDO GRÄFICO -->
                            <p class="center-date">Tổng :<br><span class="scnd-font-color">
                              {{$order}}
                            </span></p>        
                    </div>
                    {{-- <ul class="os-percentages horizontal-list">
                        <li>
                            <p class="ios os scnd-font-color">iOS</p>
                            <p class="os-percentage">21<sup>%</sup></p>
                        </li>
                        <li>
                            <p class="mac os scnd-font-color">Mac</p>
                            <p class="os-percentage">39<sup>%</sup></p>
                        </li>
                        <li>
                            <p class="linux os scnd-font-color">Linux</p>
                            <p class="os-percentage">9<sup>%</sup></p>
                        </li>
                        <li>
                            <p class="win os scnd-font-color">Win</p>
                            <p class="os-percentage">31<sup>%</sup></p>
                        </li>
                    </ul> --}}
                </div>
                <div class="donut-chart-block block"> 
                  <h2 class="titular">Tổng sản phẩm</h2>
                  <div class="donut-chart">
<!-- PORCIONES GRAFICO CIRCULAR
    ELIMINADO #donut-chart
    MODIFICADO CSS de .donut-chart -->
    <div id="porcion1" class="recorte"><div class="quesito ios" data-rel="21"></div></div>
   <div id="porcion2" class="recorte"><div class="quesito mac" data-rel="39"></div></div>
   <div id="porcion3" class="recorte"><div class="quesito win" data-rel="31"></div></div>
   <div id="porcionFin" class="recorte"><div class="quesito linux" data-rel="9"></div></div>
<!-- FIN AÑADIDO GRÄFICO -->
                          <p class="center-date">Tổng :<br><span class="scnd-font-color">
                            {{$product}}
                          </span></p>        
                  </div>
                  {{-- <ul class="os-percentages horizontal-list">
                      <li>
                          <p class="ios os scnd-font-color">iOS</p>
                          <p class="os-percentage">21<sup>%</sup></p>
                      </li>
                      <li>
                          <p class="mac os scnd-font-color">Mac</p>
                          <p class="os-percentage">39<sup>%</sup></p>
                      </li>
                      <li>
                          <p class="linux os scnd-font-color">Linux</p>
                          <p class="os-percentage">9<sup>%</sup></p>
                      </li>
                      <li>
                          <p class="win os scnd-font-color">Win</p>
                          <p class="os-percentage">31<sup>%</sup></p>
                      </li>
                  </ul> --}}
              </div>

              <div class="donut-chart-block block"> 
                <h2 class="titular">Tổng mã giảm giá</h2>
                <div class="donut-chart">
<!-- PORCIONES GRAFICO CIRCULAR
  ELIMINADO #donut-chart
  MODIFICADO CSS de .donut-chart -->
  <div id="porcion1" class="recorte"><div class="quesito ios" data-rel="21"></div></div>
 <div id="porcion2" class="recorte"><div class="quesito mac" data-rel="39"></div></div>
 <div id="porcion3" class="recorte"><div class="quesito win" data-rel="31"></div></div>
 <div id="porcionFin" class="recorte"><div class="quesito linux" data-rel="9"></div></div>
<!-- FIN AÑADIDO GRÄFICO -->
                        <p class="center-date">Tổng :<br><span class="scnd-font-color">
                          {{$voucher}}
                        </span></p>        
                </div>
                {{-- <ul class="os-percentages horizontal-list">
                    <li>
                        <p class="ios os scnd-font-color">iOS</p>
                        <p class="os-percentage">21<sup>%</sup></p>
                    </li>
                    <li>
                        <p class="mac os scnd-font-color">Mac</p>
                        <p class="os-percentage">39<sup>%</sup></p>
                    </li>
                    <li>
                        <p class="linux os scnd-font-color">Linux</p>
                        <p class="os-percentage">9<sup>%</sup></p>
                    </li>
                    <li>
                        <p class="win os scnd-font-color">Win</p>
                        <p class="os-percentage">31<sup>%</sup></p>
                    </li>
                </ul> --}}
            </div>
            </div>

</body>

<script>
  $(document).ready(function(){
    var dataClick = {{$click}}
    var date = {!!json_encode($date)!!}
    $('#chartLine').highcharts({
    char:{
      type:'column'
    },
    title: {
       text: 'Biểu đồ sản phẩm'
   },

   xAxis: {
       categories:date
   },

   yAxis: {
      title:{
       text:'Số lượng sản phẩm'
      }
   },


   series: [{
       name:'Đơn',
       data:dataClick,
   },{
       name:'date',
       data:date
   }]

   })
   
  })
</script>


@endsection