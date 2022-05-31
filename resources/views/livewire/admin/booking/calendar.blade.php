<div>

    <div id='calendar-container' wire:ignore>

        <div id='calendar'></div>

    </div>

</div>

@push('styles')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />

    <style>

        #calendar-container{

            width: 100%;

        }

        #calendar{

            padding: 10px;

            margin: 10px;

            width: 1340px;

            height: 610px;

            border:2px solid black;

        }

    </style>



@endpush

@push('scripts')

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>



    <script>
        document.addEventListener('livewire:load', function() {


            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('calendar');
            var data =   @this.events;
            var calendar = new Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: JSON.parse(data),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
            });
            calendar.render();
        });
    </script>


@endpush
