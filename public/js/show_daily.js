document.addEventListener('DOMContentLoaded', function() {
  flatpickr("#date-picker", {
      dateFormat: "Y/ m /d (D)", // 年-月-日のフォーマット
      defaultDate: "2024-11-08", // デフォルトの日付
      onChange: function(selectedDates, dateStr, instance) {
          console.log("Selected date: ", dateStr); // 選択された日付を取得
          // 必要に応じて、日付の更新処理を追加
      }
  });
});