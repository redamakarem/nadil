<div class="px-4">
    <h2 class="text-center">Bookings by status</h2>
    <div id="bookings-by-status"></div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = null;
        var bookings = null;

        document.addEventListener('livewire:load', function() {



            function initChart(data) {
                console.log(data);
                bookings = data;
                var series = [];
                var labels = [];
                bookings.map(booking =>{
        series.push(parseInt(booking['bookings_count']));
        console.log(parseInt(booking['bookings_count']));
        labels.push(booking['name_en']);
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
            var chart = new ApexCharts(document.querySelector("#bookings-by-status"), options);
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
