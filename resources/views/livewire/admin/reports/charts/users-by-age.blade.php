

<div>
    <div id="users-by-age"></div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = null;
        var users = null;

        document.addEventListener('livewire:load', function() {



            function initChart() {
             
    console.log();
    options = {
          series: [{
          data: @this.users
        }],
          chart: {
          type: 'bar',
          height: 500,
          width:500
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: @this.age_options,
        }
        };
            }

            initChart();
            var chart = new ApexCharts(document.querySelector("#users-by-age"), options);
            chart.render();

            @this.on('refreshChart',(chartData) =>{
              initChart();

              chart.updateOptions (options)
            })

        })
    </script>
@endpush