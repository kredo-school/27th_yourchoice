document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.rating .star');
    const ratingValueInput = document.getElementById('rating-value');
    const rateDisplay = document.getElementById('rate-display');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');

            // すべての星の "selected" クラスを削除
            stars.forEach(s => s.classList.remove('selected'));

            // クリックした星とそれ以降の兄弟要素に "selected" クラスを追加
            star.classList.add('selected');
            let previousSibling = star.previousElementSibling;
            while (previousSibling) {
                previousSibling.classList.add('selected');
                previousSibling = previousSibling.previousElementSibling;
            }

            // 評価値を隠しフィールドに設定
            ratingValueInput.value = value;
            rateDisplay.textContent = `  ${value}`;
        });
    });
});
