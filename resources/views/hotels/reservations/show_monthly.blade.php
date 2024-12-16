@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_reservation_monthly.css') }}">
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


@section('content')
<div class="container">
    <h1 class="text-start">Reservation Management</h1>
    <div id="calendar"></div> <!-- カレンダーを表示する要素 -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // 月表示
                initialDate: '2024-04-01',   // 初期表示する日付
                firstDay: 1, // 月曜日を週の始まりにする (デフォルトは0=日曜日)
                headerToolbar: {
                    left: 'today prev',
                    center: 'title',
                    right: 'next'
                },
                events: [
                    { title: '3 rooms', start: '2024-04-01' },
                    { title: '×', start: '2024-04-02' },
                    { title: '×', start: '2024-04-03' },
                    { title: '3 rooms', start: '2024-04-04' },
                    { title: '×', start: '2024-04-05' },
                    { title: '×', start: '2024-04-06' },
                    { title: '2 rooms', start: '2024-04-07' },
                    { title: '3 rooms', start: '2024-04-08' },
                    { title: '×', start: '2024-04-09' },
                    { title: '×', start: '2024-04-10' },
                    { title: '×', start: '2024-04-11' },
                    { title: '×', start: '2024-04-12' },
                    { title: '×', start: '2024-04-13' },
                    { title: '×', start: '2024-04-14' },
                    { title: '×', start: '2024-04-15' },
                    { title: '×', start: '2024-04-16' },
                    { title: '×', start: '2024-04-17' },
                    { title: '3 rooms', start: '2024-04-18' },
                    { title: '3 rooms', start: '2024-04-19' },
                    { title: '3 rooms', start: '2024-04-20' },
                    { title: '3 rooms', start: '2024-04-21' },
                    { title: '3 rooms', start: '2024-04-22' },
                    { title: '3 rooms', start: '2024-04-23' },
                    { title: '3 rooms', start: '2024-04-24' },
                    { title: '3 rooms', start: '2024-04-25' },
                    { title: '3 rooms', start: '2024-04-26' },
                    { title: '3 rooms', start: '2024-04-27' },
                    { title: '2 rooms', start: '2024-04-28' },
                    { title: '3 rooms', start: '2024-04-29' },
                    { title: '3 rooms', start: '2024-04-30' },
                    { title: '3 rooms', start: '2024-04-31' },
                ],
                eventContent: function(arg) {
                    // イベントコンテンツを中央揃え＆シンプルなデザインに
                    return { html: `<div>${arg.event.title}</div>` };
                }
            });

            calendar.render();
        });
    </script>
</div>
@endsection