// 画像プレビュー用の関数
function previewImage(event, previewId, iconId) {
  const input = event.target;
  const file = input.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      // プレビュー画像を表示
      const preview = document.getElementById(previewId);
      preview.src = e.target.result;
      preview.classList.remove('d-none');

      // アイコンを非表示
      const icon = document.getElementById(iconId);
      if (icon) {
        icon.classList.add('d-none');
      }
    };
    reader.readAsDataURL(file);
  }
}

// 画像削除用の関数
function removeImage(previewId, iconId, inputName) {
  const preview = document.getElementById(previewId);
  const icon = document.getElementById(iconId);

  // プレビュー画像をリセット
  preview.src = '';
  preview.classList.add('d-none');

  // アイコンを表示
  icon.classList.remove('d-none');

  // ファイル入力をリセット
  const input = document.querySelector(`input[name="${inputName}"]`);
  input.value = null;

  // 削除フラグを設定
  const deleteInput = document.getElementById(`delete_${inputName}`);
  if (deleteInput) {
    deleteInput.value = 'true'; // 画像削除のリクエストを送る
  }

}


//ブラウザのコンソールで値を正しく取得できているか確認
// const previewId = 'preview-1';
// const iconId = 'icon-1';
// const inputName = 'image_main';

// console.log(document.getElementById(previewId)); // #preview-1 の要素を表示
// console.log(document.getElementById(iconId)); // #icon-1 の要素を表示
// console.log(document.querySelector(`input[name="${inputName}"]`)); // name="image_main" の input を表示







