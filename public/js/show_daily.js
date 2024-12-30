document.addEventListener('DOMContentLoaded', function() {
  flatpickr("#date-picker", {
      dateFormat: "Y-m-d", // 年-月-日のフォーマット
      defaultDate: document.querySelector("#date-picker").value, // デフォルトの日付を現在の値に
      onChange: function(selectedDates, dateStr, instance) {
          const url = new URL(window.location.href);
          url.searchParams.set('date', dateStr); // URLに選択した日付を追加
          window.location.href = url.toString(); // ページをリロード
      }
  });
});

// dateFormat: "Y/ m /d (D)", // 年-月-日のフォーマット