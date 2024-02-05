
document.querySelectorAll('.toggle-info').forEach(function(toggle) {
    // それぞれのトグルにクリックイベントリスナーを追加する
    toggle.addEventListener('click', function() {
      // このトグルに隣接するchain-info-bodyを取得する
      var infoBody = toggle.closest('.chain-header').nextElementSibling;
      // 表示・非表示の状態を切り替える
      if (infoBody.style.display === 'none') {
        infoBody.style.display = 'block';
        toggle.textContent = 'v'; // トグルのテキストを更新
      } else {
        infoBody.style.display = 'none';
        toggle.textContent = '^'; // トグルのテキストを更新
      }
    });
  });
  