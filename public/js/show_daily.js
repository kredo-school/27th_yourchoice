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

document.addEventListener('DOMContentLoaded', function () {
  const datePicker = document.getElementById('date-picker');
  const prevDateButton = document.getElementById('prev-date');
  const nextDateButton = document.getElementById('next-date');
  const dateForm = document.getElementById('date-form');

  // 日付を変更してフォームを送信する関数
  function adjustDate(days) {
      const currentDate = new Date(datePicker.value);
      currentDate.setDate(currentDate.getDate() + days); // 日付を増減
      datePicker.value = currentDate.toISOString().split('T')[0]; // YYYY-MM-DD形式に変換
      dateForm.submit(); // フォームを送信してリロード
  }

  // ボタンのクリックイベント
  prevDateButton.addEventListener('click', () => adjustDate(-1));
  nextDateButton.addEventListener('click', () => adjustDate(1));
});