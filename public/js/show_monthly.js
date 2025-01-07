document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth', // 月表示
      initialDate: new Date(),   // 初期表示する日付
      firstDay: 1, // 月曜日を週の始まりにする (デフォルトは0=日曜日)
      dateClick: function (info) {
        // クリックされた日付の取得 (YYYY-MM-DD形式)
        const clickedDate = info.dateStr;
  
        // ページ遷移
        const targetUrl = `/hotel/reservation/show_daily?date=${clickedDate}`;
        window.location.href = targetUrl;
        },

      headerToolbar: {
          left: 'today prev',
          center: 'title',
          right: 'next'
      },
      events: {
        url: '/hotel/api/hotel/reservations/calendar',
        method: 'GET',
        },
      eventContent: function(arg) {
          // イベントコンテンツを中央揃え＆シンプルなデザインに
          return { html: `<div>${arg.event.title}</div>` };
      }
  });

  calendar.render();
});