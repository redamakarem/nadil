<div>
    <div id="users-by-gender"></div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = null;
        var users = null;

        document.addEventListener('livewire:load', function() {



            function initChart(data) {
                console.log(data);
                users = data;
                var series = [];
                var labels = [];
                users.map(user =>{
        series.push(parseInt(user['count']));
    });
    labels.push('Male');
    labels.push('Female');

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
            var chart = new ApexCharts(document.querySelector("#users-by-gender"), options);
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
