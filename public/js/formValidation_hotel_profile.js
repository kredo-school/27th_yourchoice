//”カテゴリー1つ以上選択必須”のバリデーション

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('categoryForm');
  const errorMessageDiv = document.getElementById('error-message');

  form.addEventListener('submit', function (event) {
      // type="category" のチェックボックスを取得
      const categoryCheckboxes = document.querySelectorAll('input[data-type="category"]');
      
      // 少なくとも1つが選択されているか確認
      const isChecked = Array.from(categoryCheckboxes).some(checkbox => checkbox.checked);
      
      if (!isChecked) {
          event.preventDefault(); // フォーム送信を停止
          errorMessageDiv.style.display = 'block'; // エラー表示領域を表示
          errorMessageDiv.textContent = 'Please select at least one category.';
      } else {
          errorMessageDiv.style.display = 'none'; // エラーがない場合は非表示
      }
  });
});


//”朝食ありがチェックされたときは値段は必須”のバリデーション

document.addEventListener('DOMContentLoaded', function () {
  const breakfastCheckbox = document.getElementById('category_9');
  const breakfastPrice = document.getElementById('breakfast_price');
  const breakfastError = document.getElementById('breakfastError');

  // チェックボックスの状態による価格入力フィールドの有効化/無効化
  breakfastCheckbox.addEventListener('change', function () {
      if (breakfastCheckbox.checked) {
          breakfastPrice.disabled = false; // 有効化
      } else {
          breakfastPrice.disabled = true; // 無効化
          breakfastPrice.value = ''; // チェックが外れたら価格フィールドをクリア
          breakfastError.style.display = 'none'; // エラーを非表示
      }
  });
 
  // フォーム送信時のバリデーション
  document.querySelector('form').addEventListener('submit', function (event) {
      if (breakfastCheckbox.checked && !breakfastPrice.value.trim()) {
          event.preventDefault(); // フォーム送信を停止
          breakfastError.style.display = 'block'; // エラー表示
      } else {
          breakfastError.style.display = 'none'; // エラー非表示
      }
  });

  // 初期状態の確認（サーバーサイドの値に基づいて設定）
  if (breakfastCheckbox.checked) {
      breakfastPrice.disabled = false;
  } else {
      breakfastPrice.disabled = true;
  }
});

