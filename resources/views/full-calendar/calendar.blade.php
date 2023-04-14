<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.5/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.5/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                events: '{{ route('fullcalendar.store') }}',
                initialView: 'dayGridMonth',
                extraParams: function() {
                    return {
                        cachebuster: new Date().valueOf()
                    };
                }
            });
            calendar.render();
        });
    </script>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>
