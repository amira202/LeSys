document.addEventListener('DOMContentLoaded', function() {
    // 1. جلب جميع الروابط الرئيسية في شريط التنقل
    const mainLinks = document.querySelectorAll('.nav-menu > a');
    const allMegaMenus = document.querySelectorAll('.nav-menu > ul.sub-menu');

    // دالة مساعدة لإغلاق جميع القوائم المفتوحة وإرجاع الأسهم لوضعها الطبيعي
    function closeAllMenus() {
        mainLinks.forEach(link => link.classList.remove('is-active'));
        allMegaMenus.forEach(menu => menu.classList.remove('is-active'));
    }

    // 2. المرور على كل رابط رئيسي لربط الأحداث به ديناميكياً
    mainLinks.forEach(link => {
        // جلب الميجا منيو التابعة لهذا الرابط بالتحديد (العنصر التالي له مباشرة في الـ HTML)
        const associatedMenu = link.nextElementSibling;

        // التحقق من أن العنصر التالي هو بالفعل قائمة sub-menu كبيرة
        if (associatedMenu && associatedMenu.classList.contains('sub-menu')) {
            
            // 🛑 أولاً: حدث الضغط (Click)
            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation(); // منع انتشار الحدث لكي لا تغلق القائمة فوراً

                // إذا كانت هذه القائمة مفتوحة بالفعل، قم بإغلاقها
                if (associatedMenu.classList.contains('is-active')) {
                    link.classList.remove('is-active');
                    associatedMenu.classList.remove('is-active');
                } else {
                    // إذا كانت مغلقة، اغلق أي قائمة أخرى مفتوحة أولاً، ثم افتح القائمة الحالية
                    closeAllMenus();
                    link.classList.add('is-active');
                    associatedMenu.classList.add('is-active');
                }
            });

            // 🛑 ثانياً: حدث تمرير الماوس (Hover / Mouseenter)
            link.addEventListener('mouseenter', function() {
                closeAllMenus(); // إغلاق أي قائمة سابقة فور الانتقال لعنصر جديد
                link.classList.add('is-active');
                associatedMenu.classList.add('is-active');
            });
        } else {
            // إذا مر الماوس على رابط عادي ليس لديه ميجا منيو (مثل صفحة اتصل بنا أو الرئيسية)
            link.addEventListener('mouseenter', function() {
                closeAllMenus(); // اغلق القوائم الأخرى فوراً ليبقى التصميم نظيفاً
            });
        }
    });

    // 🛑 ثالثاً: حدث مغادرة الماوس لشريط القائمة بالكامل (Mouseleave)
    const navContainer = document.getElementById('navMenu');
    if (navContainer) {
        navContainer.addEventListener('mouseleave', function() {
            closeAllMenus(); // إغلاق كافة القوائم بمجرد خروج الماوس من منطقة الـ Navbar
        });
    }

    // 🛑 رابعاً: ميزة الأمان عند الضغط خارج شريط القوائم
    document.addEventListener('click', function(e) {
        let isClickInsideMenu = false;
        allMegaMenus.forEach(menu => {
            if (menu.contains(e.target)) isClickInsideMenu = true;
        });

        // إذا ضغط المستخدم على أي مكان فارغ في الشاشة، يتم إغلاق كافة القوائم والأسهم
        if (!isClickInsideMenu) {
            closeAllMenus();
        }
    });
});
