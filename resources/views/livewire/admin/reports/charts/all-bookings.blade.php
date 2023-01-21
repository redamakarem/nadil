<div>
    
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>

var options=null;
var top_products=null;

document.addEventListener('livewire:load', function () {

  

        function initChart(data){
           top_products = data;
    console.log(top_products);
    var series = [];
    var labels = [];
    top_products.map(product =>{
        series.push(parseFloat(product['total']));
        labels.push(product['name_ar']);
    });
     options = {
          series: series,
          chart: {
          width: 750,
          type: 'donut',
        },
        labels: labels,
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        
        }

        initChart(@this.result);
        var chart = new ApexCharts(document.querySelector("#top-products"), options);
        chart.render();

    @this.on('refreshChart',(chartData) =>{
      console.log(chartData.seriesData);
      console.log(@this.result);
      initChart(@this.result);

      chart.updateOptions (options)
    })

})
    
    
</script>
@endpush