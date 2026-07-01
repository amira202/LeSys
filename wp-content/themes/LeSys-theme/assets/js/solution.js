
window.addEventListener('scroll', function() {
    let sections = document.querySelectorAll('.solution-detail-card');
    let navLinks = document.querySelectorAll('.sticky-sidebar a');
    
    sections.forEach(section => {
        let top = window.scrollY;
        let offset = section.offsetTop - 150; // Adjust for your header/sticky gap
        let height = section.offsetHeight;
        let id = section.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                document.querySelector('.sticky-sidebar a[href*=' + id + ']').classList.add('active');
            });
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // 1. Check if the URL has a hash (e.g., /solution/erp-solutions/#target-id)
    // OR if the URL path ends with a specific segment (e.g., /erp-solutions/)
    const path = window.location.pathname;
    const hash = window.location.hash;
    
    // Extract the target ID: from hash OR from the last part of the URL path
    let targetId = '';
    
    if (hash) {
        targetId = hash.substring(1);
    } else {
        // This handles cases like /solution/erp-solutions/
        // It takes the last part of the URL and uses it as the ID
        const parts = path.split('/').filter(Boolean);
        targetId = parts[parts.length - 1]; 
    }

    // 2. Find the element and scroll
    const targetElement = document.getElementById(targetId);
    
    if (targetElement) {
        window.setTimeout(function() {
            targetElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        }, 800);
    }
});
