// Global JS for LeSys Theme
//hover effect for .ot elements evidence impact section
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('.search-btn');
    const searchModal = document.getElementById('siteSearchModal');
    const closeSearchBtn = document.getElementById('closeSearchBtn');
    const searchInput = document.querySelector('.search-field');

    if (searchBtn && searchModal) {
        // Open Modal
        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();
            searchModal.style.display = 'flex';
            searchInput.focus();
        });

        // Close Modal
        closeSearchBtn.addEventListener('click', function() {
            searchModal.style.display = 'none';
        });

        // Close on ESC key press
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchModal.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    // 1. تحديد جميع العناصر الأب التي تحمل كلاس .ot
    const items = document.querySelectorAll('.ot');

    // 2. المرور على كل عنصر أب وإضافة مراقب الماوس له
    items.forEach(item => {
        // البحث عن العنصر الداخلي "فقط" داخل هذا الأب الحالي
        const innerElement = item.querySelector('.black'); // 👈 غيري .inner-item لكلاس عنصرك الداخلي

        // نتأكد أولاً أن العنصر الداخلي موجود لتجنب الأخطاء
        if (innerElement) {
            
            // عند دخول الماوس على الأب: أضف الكلاس للعنصر الداخلي
            item.addEventListener('mouseenter', () => {
               innerElement.classList.add('red');
                item.classList.add('hi');
            });

            // عند خروج الماوس من الأب: احذف الكلاس من العنصر الداخلي
            item.addEventListener('mouseleave', () => {
                innerElement.classList.remove('red');
                item.classList.remove('hi');
            });
            
        }
        else {
            
            // عند دخول الماوس على الأب: أضف الكلاس للعنصر الداخلي
            item.addEventListener('mouseenter', () => {
                item.classList.add('hi');
            });

            // عند خروج الماوس من الأب: احذف الكلاس من العنصر الداخلي
            item.addEventListener('mouseleave', () => {
                item.classList.remove('hi');
            });
            
        }
    });
});

/* ============== 1. HERO VIDEO ROBUST AUTOPLAY ============== */
(function(){
  const v = document.getElementById('earthVideo');
  if(!v) return;
  v.muted = true; v.playsInline = true;
  const tryPlay = () => v.play().catch(()=>{});
  tryPlay();
  document.addEventListener('click', tryPlay, {once:true});
  document.addEventListener('touchstart', tryPlay, {once:true});
})();

/* ============== 2. OUTCOME HORIZONTAL EXPANDING TABS ============== */
(function(){
  const tabs = document.querySelectorAll('#tabBar .tab');
  if(!tabs.length) return;
  function setActive(idx){
    tabs.forEach(t => t.classList.toggle('active', String(t.dataset.idx) === String(idx)));
  }
  tabs.forEach(t => {
    t.addEventListener('mouseenter', () => setActive(t.dataset.idx));
    t.addEventListener('click',      () => setActive(t.dataset.idx));
  });
  document.getElementById('tabPrev').addEventListener('click', () => {
    const a = document.querySelector('#tabBar .tab.active');
    const i = parseInt(a.dataset.idx);
    setActive((i - 1 + tabs.length) % tabs.length);
  });
  document.getElementById('tabNext').addEventListener('click', () => {
    const a = document.querySelector('#tabBar .tab.active');
    const i = parseInt(a.dataset.idx);
    setActive((i + 1) % tabs.length);
  });
})();




/* ============== 5. CONTACT FORM SUBMIT ============== */
(function(){
  const f = document.getElementById('contactForm');
  if(!f) return;
  f.addEventListener('submit', e => {
    e.preventDefault();
    if(!f.checkValidity()){ f.reportValidity(); return; }
    /* TODO: wire this to your backend endpoint */
    alert('Thank you. A solution owner will reach out within one business day.');
    f.reset();
  });
})();

/* ============== 6. MOBILE MENU TOGGLE ============== */
(function(){
  const t = document.getElementById('menuToggle');
  const m = document.getElementById('navMenu');
  if(!t || !m) return;
  t.addEventListener('click', () => {
    const open = m.style.display === 'flex';
    m.style.cssText = open ? '' :
      'display:flex;flex-direction:column;position:absolute;top:64px;left:20px;right:20px;background:#fff;padding:20px;border-radius:14px;box-shadow:0 14px 40px rgba(0,0,0,.18);gap:14px;';
  });
})();




