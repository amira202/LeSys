
<?php get_header(); ?>

<!-- =================================================================
     HERO — rotating earth video background
     Edit title/subtitle/CTAs inline below.
     To swap the earth video, change the src URL on #earthVideo.
     ================================================================= -->
<header class="hero">
  <video id="earthVideo" class="hero-video" autoplay muted loop playsinline preload="auto"
         src="https://cdn.pixabay.com/video/2020/08/30/48569-454825064_large.mp4"></video>
  <div class="hero-overlay"></div>

  <div class="hero-inner">
    <h1 class="hero-title">
      <span class="light">One Partner. Complete</span><br>
      ACCOUNTABILITY.<br>
      <span class="light">Enormous Capabilities</span><br>
      LIKE NO OTHER.
    </h1>
    <p class="hero-sub">
      LeSys unifies strategy, technology, implementation, and operations under a single
      partner model. We design, build, integrate, and operate the systems that power
      enterprises, governments, and smart cities.
    </p>
    <div class="hero-ctas">
      <a href="#contact" class="btn btn-primary">Talk to an Expert <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
      <a href="#platforms" class="btn btn-ghost">Explore Capabilities</a>
    </div>
  </div>
</header>

<!-- =================================================================
     OUTCOME STRIP — Advise / Build / Integrate / Operate
     Each .oc card is independent — edit label/name/desc inline.
     ================================================================= -->
<section class="outcome-strip-section">
  <div class="outcome-strip">
    <div class="oc">
      <div class="label">Strategic Advisory</div>
      <div class="name">Advise</div>
      <div class="desc">Guiding organizations with clear vision, expert insight, and transformation roadmaps that convert ambition into measurable results.</div>
    </div>
    <div class="oc">
      <div class="label">Platform-Driven Innovation</div>
      <div class="name">Build</div>
      <div class="desc">Harnessing proprietary technologies, advanced engineering, and AI-powered capabilities to accelerate business and operational excellence.</div>
    </div>
    <div class="oc">
      <div class="label">Unified Digital Ecosystems</div>
      <div class="name">Integrate</div>
      <div class="desc">Seamlessly integrating applications, infrastructure, data, and operations into one connected and accountable environment.</div>
    </div>
    <div class="oc">
      <div class="label">Operations &amp; Optimization</div>
      <div class="name">Operate</div>
      <div class="desc">Providing 24/7 managed services, performance enhancement, and operational intelligence to maximize reliability, efficiency, and long-term value.</div>
    </div>
  </div>
</section>

<!-- =================================================================
     STATS — 4 KPI metrics
     ================================================================= -->
<section class="stats">
  <div class="container">
    <div class="stats-grid">
      <div class="stat"><div class="num">99.9<span class="red">%</span></div><div class="lbl">Platform uptime across<br>managed operations</div></div>
      <div class="stat"><div class="num">5M<span class="red">+</span></div><div class="lbl">Data points processed<br>every day</div></div>
      <div class="stat"><div class="num">40<span class="red">+</span></div><div class="lbl">Packaged solutions &amp;<br>managed services</div></div>
      <div class="stat"><div class="num">24<span class="red">/</span>7</div><div class="lbl">Platform uptime across<br>managed operations</div></div>
    </div>
  </div>
</section>

<!-- =================================================================
     TRUSTED FOUNDATIONS — auto-running logo marquee (CSS animation)
     Add or remove logo SPAN items inside .logo-track (duplicated for loop)
     ================================================================= -->
<section class="trusted">
  <div class="container">
    <div class="eyebrow">Trusted Foundations</div>
    <div class="sub">Strategic technology alliances, verified Saudi presence, and compliance engineered into every layer.</div>
    <div class="logo-track-wrap">
      <div class="logo-track" id="logoTrack">
        <!-- Inline brand wordmarks — replace any SPAN with a real image tag when you have a brand asset. -->
        <!-- Group A -->
        <span class="lg lg-cisco">CISCO</span>
        <span class="lg lg-dell">DELL</span>
        <span class="lg lg-aruba">aruba <em>HPE</em></span>
        <span class="lg lg-azure">▲ Microsoft Azure</span>
        <span class="lg lg-aws">aws</span>
        <span class="lg lg-fortinet">FÜRTINET</span>
        <span class="lg lg-tenable">Otenable</span>
        <span class="lg lg-cisco">CISCO</span>
        <span class="lg lg-dell">DELL</span>
        <span class="lg lg-aruba">aruba <em>HPE</em></span>
        <span class="lg lg-azure">▲ Microsoft Azure</span>
        <span class="lg lg-aws">aws</span>
        <span class="lg lg-fortinet">FÜRTINET</span>
        <span class="lg lg-tenable">Otenable</span>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     OUTCOME TABS — horizontal expanding tab strip
     Tab content driven by data attributes; click or hover to expand.
     ================================================================= -->
<section class="tabsec">
  <div class="container">
    <div class="tab-bar" id="tabBar">
      <div class="tb-intro">
        <div class="eyebrow" style="align-self:flex-start;">Start With the Outcome</div>
        <div>
          <h3>Built Around the<br>Outcome <span class="ac">You Need</span></h3>
          <p>Tell us the result you're driving toward. We map it to the precise platforms, services and managed operations that get you there — and we operate them after go-live.</p>
        </div>
        <div class="nav">
          <button class="round" id="tabPrev" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></button>
          <button class="round filled" id="tabNext" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>

      <div class="tab t1" data-idx="0">
        <div class="num">01</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Enterprise Operations</div>
          <h4>Modernize the Core</h4>
          <p>Unify ERP, ITSM, asset and customer-experience platforms end-to-end.</p>
        </div>
      </div>
      <div class="tab t2 active" data-idx="1">
        <div class="num">02</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Enterprise Operations</div>
          <h4>Modernize Enterprise Operations</h4>
          <p>Retire fragmented systems. Run ERP, ITSM, CRM and automation as one intelligent, integrated core.</p>
        </div>
      </div>
      <div class="tab t3" data-idx="2">
        <div class="num">03</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Intelligent Automation</div>
          <h4>Automate &amp; Predict</h4>
          <p>Digital workers and AI models that capture, classify, assign and resolve — autonomously.</p>
        </div>
      </div>
      <div class="tab t4" data-idx="3">
        <div class="num">04</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Smart City</div>
          <h4>Operate the City</h4>
          <p>Unify waste, lighting, fleet and field services under one operations center.</p>
        </div>
      </div>
      <div class="tab t5" data-idx="4">
        <div class="num">05</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Data &amp; Analytics</div>
          <h4>Decide With Data</h4>
          <p>Live KPIs, AI insights and executive dashboards across every layer.</p>
        </div>
      </div>
      <div class="tab t6" data-idx="5">
        <div class="num">06</div>
        <span class="open-ico"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        <div class="body">
          <div class="small">Trust &amp; Security</div>
          <h4>Secure by Default</h4>
          <p>Zero-Trust, defense-grade controls aligned to KSA national mandates.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     SOLUTIONS — 3 cards. Edit body text + chips inline.
     Replace each inline SVG visual with a real image when assets ready.
     ================================================================= -->
<section class="section" id="solutions">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow">Solutions · Packaged by Outcome</div></div>
    <div class="sec-head">
      <h2 class="title">Solutions Built<br>Around <span class="ac">Your Outcome</span></h2>
      <div class="right">
        <p>Every solution bundles the right platforms, services and managed operations around one business result. You adopt capability — never complexity.</p>
        <div class="nav">
          <button class="round" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></button>
          <button class="round filled" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
    </div>

    <div class="sol-grid">
      <article class="sol">
        <div class="imgwrap">
          <span class="tag">Enterprise Operations</span>
          <span class="open"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
          <svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g1" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"/><stop offset="1" stop-color="#1b3a55"/></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g1)"/>
            <g fill="none" stroke="#6ea3c5" stroke-width="1" opacity=".6">
              <rect x="30" y="30" width="140" height="80" rx="6"/>
              <rect x="180" y="30" width="190" height="40" rx="6"/>
              <rect x="180" y="80" width="90" height="30" rx="6"/>
              <rect x="280" y="80" width="90" height="30" rx="6"/>
              <rect x="30" y="120" width="340" height="70" rx="6"/>
            </g>
            <g fill="#e2462b"><circle cx="50" cy="50" r="3"/><circle cx="65" cy="50" r="3"/></g>
            <path d="M50,160 L100,140 L150,150 L200,130 L260,145 L320,125 L360,140" stroke="#6ea3c5" stroke-width="2" fill="none"/>
          </svg>
        </div>
        <div class="body">
          <h4>Modernize the Core</h4>
          <p>ERP, ITSM, asset and customer-experience platforms — unified and automated end to end.</p>
          <div class="chips"><span class="chip">FoX ERP</span><span class="chip">Helpion ITSM</span><span class="chip">Workflow Automation</span></div>
        </div>
      </article>

      <article class="sol">
        <div class="imgwrap">
          <span class="tag">Intelligent Operations</span>
          <span class="open"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
          <svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g2" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"/><stop offset="1" stop-color="#1b3a55"/></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g2)"/>
            <g stroke="#6ea3c5" stroke-width="1" fill="none" opacity=".7">
              <circle cx="200" cy="110" r="60"/>
              <circle cx="200" cy="110" r="40"/>
              <circle cx="200" cy="110" r="20"/>
            </g>
            <g fill="#6ea3c5">
              <circle cx="140" cy="110" r="4"/><circle cx="260" cy="110" r="4"/>
              <circle cx="200" cy="50" r="4"/><circle cx="200" cy="170" r="4"/>
            </g>
            <g fill="#e2462b"><circle cx="200" cy="110" r="6"/></g>
          </svg>
        </div>
        <div class="body">
          <h4>Automate &amp; Predict</h4>
          <p>RPA, digital workers and AI models that capture, classify, assign and resolve — autonomously.</p>
          <div class="chips"><span class="chip">AutoMax</span><span class="chip">RPA / BPA</span><span class="chip">Predictive AI</span></div>
        </div>
      </article>

      <article class="sol">
        <div class="imgwrap">
          <span class="tag">Smart City Solutions</span>
          <span class="open"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
          <svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g3" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"/><stop offset="1" stop-color="#1b3a55"/></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g3)"/>
            <g fill="#6ea3c5" opacity=".75">
              <rect x="40" y="120" width="40" height="70"/>
              <rect x="90" y="90" width="50" height="100"/>
              <rect x="150" y="60" width="55" height="130"/>
              <rect x="215" y="100" width="45" height="90"/>
              <rect x="270" y="80" width="50" height="110"/>
              <rect x="330" y="110" width="40" height="80"/>
            </g>
            <g fill="#e2462b">
              <circle cx="60" cy="40" r="3"/><circle cx="115" cy="55" r="3"/>
              <circle cx="180" cy="30" r="3"/><circle cx="240" cy="50" r="3"/>
              <circle cx="295" cy="40" r="3"/><circle cx="350" cy="55" r="3"/>
            </g>
          </svg>
        </div>
        <div class="body">
          <h4>Operate the City</h4>
          <p>Smart waste, cleaning, landscaping, lighting and inspection under one command center.</p>
          <div class="chips"><span class="chip">Caguar</span><span class="chip">LightSense</span><span class="chip">Visual</span><span class="chip">City Ops</span></div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- =================================================================
     PROPRIETARY PLATFORMS (DARK) — interactive tabs
     Tab content lives in JS `platData` near the end of the file.
     ================================================================= -->
<section class="section dark" id="platforms">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow on-dark">Solutions · Packaged by Outcome</div></div>
    <div class="sec-head">
      <h2 class="title">Proprietary Platforms,<br><span class="ac">Engineered In-House</span></h2>
      <div class="right">
        <p>Every solution bundles the right platforms, services and managed operations around one business result. You adopt capability — never complexity.</p>
      </div>
    </div>

    <div class="plat-tabs" id="platTabs">
      <button class="plat-tab active" data-key="caguar">CAGUAR</button>
      <button class="plat-tab" data-key="visual">VISUAL</button>
      <button class="plat-tab" data-key="infoore">Infoore</button>
      <button class="plat-tab" data-key="lightsense">LIGHTSENSE</button>
      <button class="plat-tab" data-key="helpion">HELPION</button>
    </div>

    <div class="plat-card">
      <div class="plat-visual" id="platVisual">
        <!-- Replaced dynamically by JS -->
      </div>
      <div>
        <h3 id="platTitle"><span class="ac">CA</span>GUAR</h3>
        <div class="tagline" id="platTagline">Fleet &amp; Smart City</div>
        <p class="lead" id="platLead">Fleet GPS, RFID waste verification, route planning and predictive maintenance across the city.</p>
        <div class="metrics" id="platMetrics"></div>
      </div>
    </div>

    <div class="plat-cta">
      <a href="#" class="btn btn-primary">Explore the full platform suite <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
    </div>
  </div>
</section>

<!-- =================================================================
     END-TO-END CONNECTED STACK — left tab list + content panel
     Tab content driven by JS `stackData` near end of file.
     ================================================================= -->
<section class="section" id="stack">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow">The Integrated Technology Model</div></div>
    <div class="sec-head">
      <h2 class="title">An End-to-End<br><span class="ac">Connected Stack</span></h2>
      <div class="right">
        <p>Applications, integration, data &amp; AI, infrastructure, security and managed operations — engineered to flow into one another and delivered by a single accountable partner.</p>
      </div>
    </div>

    <div class="stack-card" id="stackCard">
      <div class="stack-tabs">
        <div class="stack-tab active" data-idx="0">Applications <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="1">Integration <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="2">Data &amp; AI <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="3">Infrastructure <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="4">Security <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="5">Managed Ops <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
      </div>
      <div class="stack-panel" id="stackPanel"></div>
    </div>
  </div>
</section>

<!-- =================================================================
     SECTORS (DARK) — 3 industry image cards
     ================================================================= -->
<section class="section dark" id="sectors">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow on-dark">Industry Focus</div></div>
    <div class="sec-head">
      <h2 class="title">Built for the Sectors<br>That Run <span class="ac">The Kingdom</span></h2>
      <div class="right">
        <p>Priority industries where integrated technology, defense-grade security and managed operations turn into measurable outcomes.</p>
      </div>
    </div>

    <div class="sector-grid">
      <div class="sector">
        <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <defs><linearGradient id="sg1" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#6ea3c5"/><stop offset="1" stop-color="#1b3a55"/></linearGradient></defs>
          <g fill="url(#sg1)">
            <rect x="40" y="220" width="60" height="200"/>
            <rect x="110" y="180" width="70" height="240"/>
            <rect x="190" y="140" width="65" height="280"/>
            <rect x="265" y="200" width="55" height="220"/>
            <rect x="325" y="170" width="60" height="250"/>
          </g>
        </svg>
        <span class="tag">Public Realm</span>
        <div class="over"></div>
        <div class="body">
          <h4>Municipalities &amp; Smart Cities</h4>
          <p>Connected urban services from waste to lighting, unified in one operations center.</p>
        </div>
      </div>

      <div class="sector">
        <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <g fill="none" stroke="#6ea3c5" stroke-width="2" opacity=".7">
            <path d="M200,80 L260,120 L260,240 Q260,310 200,350 Q140,310 140,240 L140,120 Z"/>
            <circle cx="200" cy="220" r="34"/>
            <rect x="190" y="210" width="20" height="30" rx="3"/>
          </g>
        </svg>
        <span class="tag">Compliant</span>
        <div class="over"></div>
        <div class="body">
          <h4>Government &amp; Public Sector</h4>
          <p>Arabic-first and compliant — NCA ECC 2.0 and SDAIA PDPL ready.</p>
        </div>
      </div>

      <div class="sector">
        <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <g stroke="#6ea3c5" stroke-width="1.5" fill="none" opacity=".6">
            <path d="M0,300 Q100,250 200,280 T400,260"/>
            <path d="M0,330 Q100,290 200,310 T400,300"/>
            <path d="M0,360 Q100,330 200,340 T400,340"/>
          </g>
          <g fill="#6ea3c5" opacity=".7">
            <circle cx="60" cy="180" r="3"/><circle cx="120" cy="160" r="3"/>
            <circle cx="180" cy="190" r="3"/><circle cx="240" cy="170" r="3"/>
            <circle cx="300" cy="200" r="3"/><circle cx="360" cy="180" r="3"/>
          </g>
        </svg>
        <span class="tag">At Scale</span>
        <div class="over"></div>
        <div class="body">
          <h4>Large Enterprises</h4>
          <p>Scale, integration and automation across complex multi-system landscapes.</p>
        </div>
      </div>
    </div>

    <div class="sector-nav">
      <button class="round" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></button>
      <button class="round filled" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
  </div>
</section>

<!-- =================================================================
     OUTCOMES MEASURE — 8 KPI tiles (2 rows × 4)
     ================================================================= -->
<section class="section">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow">Evidence · Strategic Impact</div></div>
    <div class="sec-head">
      <h2 class="title">Outcomes You Can<br><span class="ac">Measure</span></h2>
      <div class="right">
        <p>Real results delivered from enterprise applications to live operations — proof, not promises.</p>
      </div>
    </div>

    <div class="outcomes-grid">
      <div class="ot"><div><div class="val">60%</div><div class="lbl">Faster IT Resolution</div><div class="src">Helpion ITSM</div></div><div class="gauge"></div></div>
      <div class="ot hi"><div><div class="val">85<span class="red">%</span></div><div class="lbl">Faster Report Generation</div><div class="src">Infoore BI</div></div><div class="gauge"></div></div>
      <div class="ot"><div><div class="val">92%+</div><div class="lbl">AI Detection Accuracy</div><div class="src">Visual Vision</div></div><div class="gauge"></div></div>
      <div class="ot"><div><div class="val">70%</div><div class="lbl">Energy Savings</div><div class="src">LightSense</div></div><div class="gauge"></div></div>
    </div>
    <div class="outcomes-grid">
      <div class="ot"><div><div class="val">7.8M+</div><div class="lbl">Vehicles Processed</div><div class="src">Visual ANPR</div></div><div class="gauge"></div></div>
      <div class="ot"><div><div class="val">65%+</div><div class="lbl">Faster Report Generation</div><div class="src">Infoore BI</div></div><div class="gauge"></div></div>
      <div class="ot"><div><div class="val">40+</div><div class="lbl">Municipal Managed Services</div><div class="src">Field Operations</div></div><div class="gauge"></div></div>
      <div class="ot"><div><div class="val">5M+</div><div class="lbl">Daily Data Points</div><div class="src">Infoore + NOC + SOC</div></div><div class="gauge"></div></div>
    </div>
  </div>
</section>

<!-- =================================================================
     CUSTOMER SUCCESS STORY — full-width dark card
     ================================================================= -->
<section class="section" style="padding-top:30px;">
  <div class="container">
    <div class="story">
      <div class="story-bg"></div>
      <div class="story-inner">
        <div class="eyebrow">Customer Success Story</div>
        <h2>Entire Cities, Operated From<br>a Single <span class="ac">Command Center</span></h2>
        <div class="story-cols">
          <div><h6>Challenge</h6><p>Waste, lighting and field services ran across disconnected systems no real-time visibility, no proof of performance.</p></div>
          <div><h6>Solution</h6><p>Caguar, LightSense, Visual and Discretal unified under one City Operations Center, operated 24/7 by LeSys.</p></div>
          <div><h6>Result</h6><p>70% energy saved, 18% lower fleet fuel, 25% fewer missed collections and sub-5-second SOS response.</p></div>
        </div>
        <a href="#contact" class="btn btn-primary">Talk to an Expert <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     WHY LEADER SYSTEMS — Vision 2030 + 6 feature tiles
     ================================================================= -->
<section class="section">
  <div class="container">
    <div class="why-grid">
      <div class="why-left">
        <div class="eyebrow">Why Leader Systems</div>
        <h2>Built for Vision<br><span class="ac">2030</span> and Beyond</h2>
        <p>One accountable partner that owns the technology, integrates the stack and operates it after go-live. That is the difference between buying tools and gaining capability.</p>
        <a href="#contact" class="btn btn-primary">Talk to an Expert <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
      </div>
      <div class="why-tiles">
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-cube"></i></div><h5>Proprietary Platforms</h5><p>Engineered in-house — zero vendor lock-in across the stack.</p></div>
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-layer-group"></i></div><h5>Integrated Capabilities</h5><p>Strategy to managed operations, delivered as one model.</p></div>
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-shield-halved"></i></div><h5>Saudi-Built &amp; Compliant</h5><p>Arabic-first, data-resident, aligned to national mandates.</p></div>
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-gears"></i></div><h5>Operated, Not Just Built</h5><p>NOC &amp; SOC keep systems live long after go-live.</p></div>
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-brain"></i></div><h5>AI-Native by Design</h5><p>Vision, Arabic NLP and generative AI built into platforms.</p></div>
        <div class="why-tile"><div class="why-ico"><i class="fa-solid fa-lock"></i></div><h5>Defense-Grade Security</h5><p>Zero Trust, NCA ECC 2.0, ISO 27001 and SOC 2.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     CONTACT — left info + right form
     ================================================================= -->
<section class="section" id="contact">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-left">
        <div class="eyebrow">Get in Touch</div>
        <h2>Talk to One of Our<br><span class="ac">Experts.</span></h2>
        <p class="lead">Every request routes to a dedicated solution owner. You'll get a tailored walkthrough, a solution brief and a booking link — within one business day.</p>
        <div class="cl-list">
          <div class="cl-item"><i class="fa-solid fa-check"></i><div><h6>Mapped to your goal</h6><p>We map your challenge to the exact platforms before we meet.</p></div></div>
          <div class="cl-item"><i class="fa-regular fa-calendar"></i><div><h6>Calendar booking included</h6><p>Pick a time on the confirmation page — no back-and-forth.</p></div></div>
          <div class="cl-item"><i class="fa-solid fa-shield-halved"></i><div><h6>Defense-grade &amp; compliant</h6><p>NCA ECC 2.0 · SDAIA PDPL · ISO 27001 · SOC 2.</p></div></div>
        </div>
      </div>

      <form class="cform" id="contactForm" novalidate>
        <div class="fnote">Fields marked <span class="req">*</span> are required.</div>
        <div class="frow">
          <div class="field"><label>FULL NAME <span class="req">*</span></label><input type="text" name="name" placeholder="Your name" required></div>
          <div class="field"><label>WORK EMAIL <span class="req">*</span></label><input type="email" name="email" placeholder="you@organization.gov.sa" required></div>
        </div>
        <div class="frow">
          <div class="field"><label>ORGANIZATION <span class="req">*</span></label><input type="text" name="org" placeholder="Entity / company" required></div>
          <div class="field"><label>JOB TITLE <span class="req">*</span></label><input type="text" name="title" placeholder="Your role" required></div>
        </div>
        <div class="frow">
          <div class="field"><label>AREA OF INTEREST <span class="req">*</span></label>
            <select name="area" required>
              <option value="">Select…</option>
              <option>Enterprise Modernization</option>
              <option>Smart City Operations</option>
              <option>AI &amp; Automation</option>
              <option>Cybersecurity</option>
              <option>Managed Services</option>
            </select>
          </div>
          <div class="field"><label>PHONE NUMBER <span class="req">*</span></label><input type="tel" name="phone" placeholder="+966 …" required></div>
        </div>
        <div class="frow">
          <div class="field ffull"><label>BUSINESS CHALLENGE (OPTIONAL)</label><textarea name="message" placeholder="What outcome are you driving toward?"></textarea></div>
        </div>
        <button type="submit" class="fsubmit">Talk to an expert →</button>
        <div class="fbot">You'll be assigned a solution owner who reaches out within one business day.</div>
      </form>
    </div>
  </div>
</section>
<?php get_footer(); ?>
