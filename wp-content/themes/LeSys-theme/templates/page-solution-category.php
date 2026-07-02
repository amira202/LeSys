<?php 
/**
 * Template Name: Business Applications Page
 */
get_header(); 
get_template_part( 'template-parts/content', 'hero' ); ?>

<style>
    .transform-section { margin-bottom: 60px; }
    /* Add space between heading and paragraph text */
.transform-section h2 {
    margin-bottom: 20px; /* Adjust this value to increase or decrease space */
}

/* Ensure consistent spacing for other headings if needed */
h2 {
    margin-bottom: 15px;
}
    /* Solution Card Styling */
    .solution-detail-card {
        display: flex; flex-direction: column; padding: 40px;
        background: #ffffff; border-radius: 16px;
        border: 1px solid #e2e8f0; margin-bottom: 30px;
        transition: 0.3s;
    }
    .solution-detail-card:hover { border-color: var(--blue); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
    .solution-icon { width: 60px; height: 60px; margin-bottom: 20px; object-fit: contain; }
    .specs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 20px; }
    .list-column h3 { color: var(--blue); font-size: 1.1rem; margin-bottom: 10px; }
    .list-column ul { list-style-type: none; padding: 0; }
    .list-column ul li { margin-bottom: 8px; padding-left: 20px; position: relative; color: #4a5568; }
    .list-column ul li::before { content: "✓"; color: var(--blue-l); position: absolute; left: 0; font-weight: bold; }
    /* Layout Wrapper */
.main-wrapper { display: flex; align-items: flex-start; gap: 40px; }
.content-area { flex: 3; }

/* Sticky Sidebar */
.sticky-sidebar { 
    flex: 1; 
    position: sticky; 
    top: 100px; /* Adjust based on your header height */
    background: #f8fafc;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
}
.sticky-sidebar h3 { font-size: 1.1rem; color: var(--blue-d); margin-bottom: 15px; }
.sticky-sidebar ul { list-style: none; padding: 0; }
.sticky-sidebar li { margin-bottom: 10px; }
.sticky-sidebar a { text-decoration: none; color: #4a5568; font-size: 0.95rem; }
.sticky-sidebar a:hover { color: var(--blue); }
/* Ensure the banner stays within the card */
.solution-banner {
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 12px; /* Smooth corners */
    margin-bottom: 20px; /* Space between banner and heading */
}

.solution-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Add space between heading and text */
.solution-detail-card h2 {
    margin-top: 0;
    margin-bottom: 15px; /* Adds space between title and description */
}

.solution-detail-card p {
    margin-top: 0;
    margin-bottom: 25px; /* Adds space between description and specs-grid */
}
html { scroll-behavior: smooth; }

/* Highlight effect for sticky menu */
.sticky-sidebar ul li a {
    transition: color 0.3s ease, border-left 0.3s ease;
    padding-left: 10px;
    border-left: 3px solid transparent;
}

/* Sidebar Container */
.sticky-sidebar {
    position: sticky;
    top: 100px;
    background: #f8fafc;
    padding: 25px;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
}

/* Fix for the vertical border alignment */
.sticky-sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    border-left: 3px solid #cbd5e0; /* This is the vertical line */
    margin-left: 5px; /* Offset to align with parent if needed */
}

.sticky-sidebar li {
    margin-bottom: 12px;
}

/* Target the links to align with the vertical line */
.sticky-sidebar ul li a {
    text-decoration: none;
    color: #4a5568;
    font-size: 0.95rem;
    display: block;
    padding-left: 15px; /* Creates space between the line and text */
    transition: all 0.3s ease;
}

/* Hover and Active State */
.sticky-sidebar ul li a:hover,
.sticky-sidebar ul li a.active {
    color: var(--red);
    border-left: 3px solid var(--red); /* Highlight line color */
    margin-left: -3px; /* Pulls the highlight into alignment with the base border */
    font-weight: 600;
}
@media (max-width: 768px) { .sticky-sidebar { display: none; } }
</style>
    <?php
    // Updated services array with icon filenames
    $services = [
        ['title' => 'ERP Solutions', 'icon' => 'erp-icon.svg', 'desc' => 'Streamline and unify your core business operations through integrated Enterprise Resource Planning (ERP) solutions.', 'caps' => ['Finance & accounting management', 'Procurement & supply chain management', 'Human resources management', 'Inventory & warehouse management', 'Project management', 'Real-time reporting and analytics'], 'bens' => ['Centralized business processes', 'Improved operational visibility', 'Enhanced resource utilization', 'Better compliance and governance']],
        ['title' => 'IT Service Management (ITSM)', 'icon' => 'itsm-icon.svg', 'desc' => 'Deliver efficient, scalable, and customer-focused IT services through modern IT service management platforms.', 'caps' => ['Service desk management', 'Incident and problem management', 'Change management', 'Asset and configuration management', 'Service catalog management', 'SLA monitoring and reporting'], 'bens' => ['Faster issue resolution', 'Improved service quality', 'Increased operational efficiency', 'Enhanced user satisfaction']],
        ['title' => 'CRM Solutions', 'icon' => 'crm-icon.svg', 'desc' => 'Build stronger customer relationships and drive revenue growth with intelligent Customer Relationship Management solutions.', 'caps' => ['Sales automation', 'Lead and opportunity management', 'Customer service management', 'Marketing automation', 'Customer journey tracking', 'Customer analytics and insights'], 'bens' => ['Improved customer engagement', 'Increased sales productivity', 'Better customer retention', 'Enhanced customer experience']],
        ['title' => 'Asset Management', 'icon' => 'asset-icon.svg', 'desc' => 'Gain complete visibility and control over physical and digital assets throughout their lifecycle.', 'caps' => ['Asset tracking and monitoring', 'Lifecycle management', 'Preventive maintenance', 'Work order management', 'Asset performance analytics', 'Compliance management'], 'bens' => ['Extended asset lifespan', 'Reduced maintenance costs', 'Improved operational reliability', 'Enhanced asset utilization']],
        ['title' => 'E-Services Platforms', 'icon' => 'eservice-icon.svg', 'desc' => 'Digitize citizen, customer, and employee services through secure and user-friendly digital platforms.', 'caps' => ['Online service delivery', 'Self-service portals', 'Digital forms and workflows', 'Electronic approvals', 'Service request management', 'Omnichannel access'], 'bens' => ['Faster service delivery', 'Reduced manual processing', 'Improved user experience', 'Increased service accessibility']],
        ['title' => 'Customer Experience Platforms', 'icon' => 'cx-icon.svg', 'desc' => 'Create personalized, seamless, and engaging experiences across every customer touchpoint.', 'caps' => ['Customer engagement management', 'Omnichannel communication', 'Experience orchestration', 'Customer feedback management', 'Personalization engines', 'Customer analytics'], 'bens' => ['Enhanced customer satisfaction', 'Stronger brand loyalty', 'Improved customer retention', 'Increased business growth']]
    ];
    ?>
<div class="page-wrapper main-wrapper">
    <!-- Sticky Sidebar Widget -->
<aside class="sticky-sidebar">
    <h3>Our Solutions - <?php echo the_title();?></h3>
    <ul>
        <?php foreach ($services as $service) : ?>
            <li>
                <a href="#<?php echo sanitize_title($service['title']); ?>">
                    <?php echo $service['title']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <div style="margin-top: 20px;">
        <a href="/solutions" class="explore-btn" style="display: block; background: var(--blue); color: #fff; text-align: center; padding: 12px; border-radius: 6px; text-decoration: none; font-weight: bold;">
            Explore All Solutions
        </a>
    </div>
</aside>
    <!-- Main Content -->
    <div class="content-area">
    <section class="intro-text">
        <p>At LeSys, we help organizations modernize and optimize their business processes through enterprise-grade applications designed to enhance productivity, automation, visibility, and growth. Whether you're looking to improve internal operations, strengthen customer engagement, or accelerate digital transformation, our business application solutions provide the foundation for sustainable success.</p>
    </section>

<section class="transform-section">
    <h2>Transform Your Business Operations</h2>
    <p>Business applications are the backbone of digital enterprises. They enable organizations to automate workflows, centralize information, eliminate manual processes, and create seamless experiences for employees, customers, and stakeholders.</p>
    
    <!-- Added Static Content -->
    <div class="transform-details" style="margin-top: 25px;">
        <p>Our solutions are designed to:</p>
        <ul style="list-style: none; padding: 0; margin-top: 10px;">
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Improve operational efficiency</li>
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Increase organizational agility</li>
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Enhance customer satisfaction</li>
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Enable data-driven decision making</li>
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Reduce operational costs</li>
            <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• Accelerate digital transformation initiatives</li>
        </ul>
    </div>
</section>


<?php
    foreach ($services as $service) : ?>
        <section id="<?php echo sanitize_title($service['title']); ?>" class="solution-detail-card">
                 <div class="solution-banner">
            <img src="data:image/jpeg;base64,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" 
                 alt="<?php echo $service['title']; ?>">
        </div>
            <h2><?php echo $service['title']; ?></h2>
            <p><?php echo $service['desc']; ?></p>
            <div class="specs-grid">
                <div class="list-column">
                    <h3>Capabilities</h3>
                    <ul><?php foreach($service['caps'] as $cap) echo "<li>$cap</li>"; ?></ul>
                </div>
                <div class="list-column">
                    <h3>Benefits</h3>
                    <ul><?php foreach($service['bens'] as $ben) echo "<li>$ben</li>"; ?></ul>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</div>
    </div>
<?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
<script>
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
</script>
<?php 
get_footer(); 
?>