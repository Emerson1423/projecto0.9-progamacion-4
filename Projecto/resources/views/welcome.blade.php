<!DOCTYPE html>
<html lang="es-SV">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SECURE CODE S.A.S. de C.V. — Firma Especializada en Ciberseguridad e Ingeniería de Software Seguro</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  :root {
    --bg: #0b0f19;
    --bg-card: #121829;
    --bg-card-hover: #172036;
    --bg-element: #1a233d;
    --primary: #0047AB;
    --accent: #00E5FF;
    --accent-glow: rgba(0, 229, 255, 0.15);
    --interact: #3377FF;
    --text-high: #FFFFFF;
    --text-mid: #F1F5F9;
    --text-muted: #CBD5E1;
    --border: #232d48;
    --border-bright: #38476e;
    --success: #00E676;
    --warning: #FFB300;
    --font-display: 'Space Grotesk', sans-serif;
    --font-body: 'Inter', sans-serif;
    --font-mono: 'JetBrains Mono', monospace;
    --maxw: 1280px;
  }

  * { box-sizing: border-box; }
  html { scroll-behavior: smooth; }
  body {
    margin: 0;
    background: var(--bg);
    color: var(--text-high);
    font-family: var(--font-body);
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }
  a { color: inherit; text-decoration: none; }
  .wrap { max-width: var(--maxw); margin: 0 auto; padding: 0 24px; }

  /* EYEBROWS Y ENCABEZADOS UX */
  .eyebrow {
    font-family: var(--font-mono);
    text-transform: uppercase;
    letter-spacing: 0.12em;
    font-size: 12px;
    font-weight: 700;
    color: var(--accent);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
    background: rgba(0, 229, 255, 0.08);
    border: 1px solid rgba(0, 229, 255, 0.25);
    padding: 6px 14px;
    border-radius: 20px;
  }
  
  h1, h2, h3, h4, h5 {
    font-family: var(--font-display);
    font-weight: 700;
    margin: 0 0 16px;
    letter-spacing: -0.02em;
    color: var(--text-high);
  }
  h1 { font-size: clamp(32px, 4.8vw, 56px); line-height: 1.15; }
  h2 { font-size: clamp(26px, 3.5vw, 40px); }
  h3 { font-size: 21px; }
  p { color: var(--text-muted); margin: 0 0 16px; font-size: 15.5px; }

  .section { padding: clamp(60px, 8vw, 95px) 0; position: relative; border-top: 1px solid var(--border); }
  .section-head { max-width: 760px; margin-bottom: 48px; }

  /* BOTONES PROFESIONALES */
  .btn-ui {
    display: inline-flex; align-items: center; justify-content: center; gap: 8px;
    font-family: var(--font-mono);
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: 0.02em;
    padding: 12px 24px;
    border-radius: 8px;
    border: 1px solid transparent;
    cursor: pointer;
    white-space: nowrap;
    transition: all .2s ease;
  }
  .btn-ui-primary {
    background: linear-gradient(135deg, var(--interact), var(--primary));
    color: var(--text-high);
    box-shadow: 0 4px 18px rgba(0, 71, 171, 0.35);
  }
  .btn-ui-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 26px rgba(0, 71, 171, 0.55);
    color: var(--text-high);
  }
  .btn-ui-ghost {
    border-color: var(--border-bright);
    color: var(--text-high);
    background: rgba(255,255,255,0.03);
  }
  .btn-ui-ghost:hover {
    border-color: var(--accent);
    color: var(--accent);
    background: var(--accent-glow);
  }

  /* BARRA DE NAVEGACIÓN PROFESIONAL */
  header.nav-header {
    position: sticky; top: 0; z-index: 1000;
    background: rgba(11, 15, 25, 0.94);
    backdrop-filter: blur(14px);
    border-bottom: 1px solid var(--border);
    width: 100%;
  }
  .nav-container {
    max-width: var(--maxw); margin: 0 auto; padding: 14px 24px;
    display: flex; align-items: center; justify-content: space-between; gap: 24px;
  }
  
  .brand-group { display: flex; align-items: center; gap: 12px; }
  .brand-icon { width: 38px; height: 38px; flex-shrink: 0; }
  .brand-title { font-family: var(--font-mono); font-size: 17px; font-weight: 700; color: var(--text-high); letter-spacing: 0.02em; }
  .brand-title b { color: var(--accent); }

  nav.nav-links {
    display: flex; align-items: center; gap: 32px; margin: 0;
  }
  nav.nav-links a {
    color: var(--text-muted);
    font-family: var(--font-mono);
    font-size: 13.5px;
    font-weight: 600;
    transition: color .2s ease;
  }
  nav.nav-links a:hover { color: var(--accent); }

  .nav-actions { display: flex; align-items: center; gap: 16px; }

  .mobile-toggle {
    display: none;
    background: transparent;
    border: 1px solid var(--border-bright);
    color: var(--text-high);
    font-size: 22px;
    padding: 6px 12px;
    border-radius: 6px;
  }

  /* HERO SECTION */
  .hero-section {
    padding: clamp(60px, 8vw, 100px) 0 clamp(50px, 7vw, 80px);
    position: relative;
    background:
      radial-gradient(ellipse 800px 450px at 85% 10%, rgba(0,71,171,0.3), transparent 65%),
      radial-gradient(ellipse 600px 400px at 10% 30%, rgba(0,229,255,0.06), transparent 65%);
  }
  .hero-grid {
    display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 48px; align-items: center;
  }
  .hero-text p.lead-desc {
    font-size: 17.5px; color: var(--text-muted); max-width: 560px; line-height: 1.65; margin-bottom: 32px;
  }
  .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }

  /* BANNER DE ESTÁNDARES E INTEGRIDAD */
  .standards-banner {
    background: var(--bg-card);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    padding: 24px 0;
  }
  .standards-grid {
    display: flex; justify-content: space-around; align-items: center; flex-wrap: wrap; gap: 20px;
  }
  .standard-item {
    display: flex; align-items: center; gap: 10px; font-family: var(--font-mono); font-size: 13px; color: var(--text-mid); font-weight: 700;
  }
  .standard-item i { color: var(--accent); font-size: 18px; }

  /* TERMINAL CODE STYLING */
  .code-terminal {
    background: var(--bg-card);
    border: 1px solid var(--border-bright);
    border-radius: 12px;
    box-shadow: 0 24px 60px rgba(0,0,0,0.55);
    overflow: hidden;
  }
  .terminal-header {
    display: flex; align-items: center; gap: 8px;
    padding: 12px 16px; background: var(--bg-element);
    border-bottom: 1px solid var(--border);
  }
  .dot { width: 11px; height: 11px; border-radius: 50%; display: inline-block; }
  .dot-red { background: #FF5252; }
  .dot-yellow { background: #FFB300; }
  .dot-green { background: #00E676; }
  .terminal-title { font-family: var(--font-mono); font-size: 12px; color: var(--text-muted); margin-left: 8px; }

  .terminal-content {
    padding: 22px; font-family: var(--font-mono); font-size: 13px; color: var(--text-mid);
    min-height: 240px; overflow-x: auto;
  }
  .terminal-content .cmd { color: var(--accent); }
  .terminal-content .ok { color: var(--success); }
  .terminal-content .warn { color: var(--warning); }

  /* CARDS DE SERVICIOS */
  .services-grid-layout { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
  .card-service-item {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 30px 24px;
    display: flex; flex-direction: column; justify-content: space-between;
    transition: all .25s ease;
  }
  .card-service-item:hover {
    border-color: var(--accent);
    background: var(--bg-card-hover);
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.4);
  }
  .service-tag-label {
    font-family: var(--font-mono); font-size: 11.5px; font-weight: 700;
    color: var(--accent); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 12px; display: block;
  }
  .card-service-item h3 { font-size: 19px; line-height: 1.35; margin-bottom: 12px; }
  .card-service-item p { font-size: 14.5px; color: var(--text-muted); line-height: 1.6; }
  .price-tag-value { font-family: var(--font-mono); font-size: 23px; font-weight: 700; color: var(--accent); margin: 18px 0 6px; }

  /* REQUISITOS */
  .reqs-grid-layout { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
  .req-card-item {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 24px;
    display: flex; gap: 18px; align-items: flex-start;
  }
  .req-icon-box {
    width: 46px; height: 46px; border-radius: 10px;
    background: var(--bg-element); border: 1px solid var(--border-bright);
    display: flex; align-items: center; justify-content: center;
    color: var(--accent); font-size: 20px; flex-shrink: 0;
  }

  /* COTIZADOR ARMA TU PAQUETE */
  .cotizador-wrapper {
    background: var(--bg-card);
    border: 1px solid var(--border-bright);
    border-radius: 18px;
    padding: clamp(24px, 4vw, 40px);
    box-shadow: 0 24px 70px rgba(0,0,0,0.5);
  }

  .prereq-check-box {
    background: var(--bg-element);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 16px;
    display: flex; align-items: flex-start; gap: 12px;
    height: 100%;
  }
  .prereq-check-box input { accent-color: var(--accent); width: 18px; height: 18px; margin-top: 3px; cursor: pointer; flex-shrink: 0; }

  .select-service-row {
    background: var(--bg-element);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 18px 20px;
    margin-bottom: 14px;
    transition: all .2s;
  }
  .select-service-row.selected {
    border-color: var(--accent);
    background: rgba(0, 229, 255, 0.08);
  }

  .recommendation-box {
    background: rgba(0, 229, 255, 0.08);
    border: 1px dashed var(--accent);
    border-radius: 8px;
    padding: 14px 18px;
    margin-top: 14px;
    font-size: 13.5px;
    color: var(--accent);
    font-weight: 600;
  }

  /* METODOLOGÍA */
  .approach-grid-layout { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
  .approach-card-item {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 28px 24px;
    transition: all .25s ease;
  }
  .approach-card-item:hover { border-color: var(--accent); transform: translateY(-4px); }
  .phase-step { font-family: var(--font-mono); color: var(--accent); font-size: 12px; font-weight: 700; margin-bottom: 10px; display: block; }

  /* ACCORDEON FAQ */
  .accordion-custom .accordion-item {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 10px;
    margin-bottom: 12px;
    overflow: hidden;
  }
  .accordion-custom .accordion-button {
    background: var(--bg-element);
    color: var(--text-high);
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 16px;
    box-shadow: none;
  }
  .accordion-custom .accordion-button:not(.collapsed) {
    color: var(--accent);
    background: rgba(0,229,255,0.08);
  }
  .accordion-custom .accordion-button::after {
    filter: invert(1);
  }
  .accordion-custom .accordion-body {
    color: var(--text-muted);
    font-size: 14.5px;
    line-height: 1.6;
    background: var(--bg-card);
  }

  /* FOOTER */
  footer.footer-section {
    padding: 55px 0 30px; border-top: 1px solid var(--border); background: #080b12;
  }
  .footer-columns { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 36px; margin-bottom: 40px; }
  .footer-col h5 { font-family: var(--font-mono); font-size: 12px; color: var(--accent); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 14px; }
  .footer-col a { display: block; font-size: 14px; color: var(--text-muted); margin-bottom: 8px; transition: color .2s; }
  .footer-col a:hover { color: var(--text-high); }
  .footer-bottom { border-top: 1px solid var(--border); padding-top: 24px; font-size: 13px; color: var(--text-muted); text-align: center; }

  /* RESPONSIVIDAD REFINADA UX/UI */
  @media (max-width: 1080px) {
    nav.nav-links { gap: 20px; font-size: 13px; }
  }

  @media (max-width: 920px) {
    nav.nav-links { display: none; }
    .mobile-toggle { display: inline-block; }
    .hero-grid { grid-template-columns: 1fr; }
    .services-grid-layout { grid-template-columns: repeat(2, 1fr); }
    .approach-grid-layout { grid-template-columns: 1fr; }
  }

  @media (max-width: 640px) {
    .services-grid-layout, .reqs-grid-layout { grid-template-columns: 1fr; }
    .hero-actions .btn-ui { width: 100%; }
    .nav-actions .btn-ui-ghost { display: none; }
  }
</style>
</head>
<body>

<!-- BARRA DE NAVEGACIÓN PROFESIONAL -->
<header class="nav-header">
  <div class="nav-container">
    <a class="brand-group" href="{{ route('inicio') }}">
      <svg class="brand-icon" viewBox="0 0 100 100" fill="none">
        <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="url(#logo_grad)" stroke-width="6" fill="#121829"/>
        <path d="M40 32C35 32 32 36 32 42C32 48 48 46 48 52C48 58 42 62 36 62" stroke="#FFFFFF" stroke-width="6" stroke-linecap="round"/>
        <path d="M64 36C58 36 52 42 52 52C52 62 62 64 68 64" stroke="#00E5FF" stroke-width="6" stroke-linecap="round"/>
        <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
        <path d="M46 66V62C46 59.8 47.8 58 50 58C52.2 58 54 59.8 54 62V66" stroke="#00E5FF" stroke-width="3"/>
        <defs>
          <linearGradient id="logo_grad" x1="15" y1="8" x2="85" y2="94" gradientUnits="userSpaceOnUse">
            <stop stop-color="#00E5FF"/>
            <stop offset="1" stop-color="#0047AB"/>
          </linearGradient>
        </defs>
      </svg>
      <span class="brand-title">SECURE<b>CODE</b></span>
    </a>

    <!-- NAVEGACIÓN PRINCIPAL EN ORDEN JERÁRQUICO -->
    <nav class="nav-links">
      <a href="#servicios">Servicios</a>
      <a href="#metodologia">Metodología</a>
      <a href="#requisitos">Requisitos</a>
      <a href="#cotizador">Cotizador</a>
      <a href="#faq">FAQ</a>
      <a href="#inversion">Inversión</a>
    </nav>

    <!-- ACCIONES DE USUARIO ELEGANTES -->
    <div class="nav-actions">
      <a class="btn-ui btn-ui-ghost" href="{{ route('admin') }}"><i class="bi bi-speedometer2 me-1"></i> Panel Admin</a>
      <a class="btn-ui btn-ui-primary" href="{{ route('compras.create') }}"><i class="bi bi-cart-check me-1"></i> Cotizar Paquete</a>

      <button class="mobile-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobile">
        <i class="bi bi-list"></i>
      </button>
    </div>
  </div>
</header>

<!-- OFFCANVAS NAVEGACIÓN MÓVIL ENTRADA LIMPIA -->
<div class="offcanvas offcanvas-end bg-dark text-light border-start border-secondary" tabindex="-1" id="offcanvasMobile">
  <div class="offcanvas-header border-bottom border-secondary">
    <h5 class="offcanvas-title font-monospace fw-bold">SECURE<b class="text-info">CODE</b></h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column justify-content-between">
    <div class="d-flex flex-column gap-3 font-monospace">
      <a href="#servicios" class="text-light fs-5 text-decoration-none" data-bs-dismiss="offcanvas">Servicios</a>
      <a href="#metodologia" class="text-light fs-5 text-decoration-none" data-bs-dismiss="offcanvas">Metodología</a>
      <a href="#requisitos" class="text-light fs-5 text-decoration-none" data-bs-dismiss="offcanvas">Requisitos</a>
      <a href="#cotizador" class="text-light fs-5 text-decoration-none" data-bs-dismiss="offcanvas">Cotizador</a>
      <a href="#faq" class="text-light fs-5 text-decoration-none" data-bs-dismiss="offcanvas">FAQ</a>
      <a href="#inversion" class="text-info fs-5 text-decoration-none" data-bs-dismiss="offcanvas">Inversión</a>
      <hr class="border-secondary my-2">
      <a href="{{ route('admin') }}" class="text-info fs-6 text-decoration-none"><i class="bi bi-speedometer2 me-1"></i> Panel Admin</a>
      <a href="{{ route('compras.historial') }}" class="text-light fs-6 text-decoration-none"><i class="bi bi-clock-history me-1"></i> Mis Contrataciones</a>
    </div>

    <div class="pt-4 border-top border-secondary">
      <a href="{{ route('compras.create') }}" class="btn-ui btn-ui-primary w-100 font-monospace">Cotizar Servicios</a>
    </div>
  </div>
</div>

<!-- HERO SECTION -->
<section class="hero-section" id="inicio">
  <div class="wrap">
    <div class="hero-grid">
      <div class="hero-text">
        <span class="eyebrow"><i class="bi bi-shield-check"></i> Firma Salvadoreña de Ciberseguridad</span>
        <h1>Evaluación de Ciberseguridad,<br><span style="color:var(--accent);">Pentesting e Ingeniería Segura</span></h1>
        <p class="lead-desc">SECURE CODE brinda auditorías de lógica de negocio, pruebas de intrusión en infraestructura, bastionado de entornos de despliegue y monitoreo SOC 24/7 conforme a estándares internacionales.</p>
        <div class="hero-actions">
          <a class="btn-ui btn-ui-primary" href="#cotizador">Ver Servicios y Armar Paquete</a>
          <a class="btn-ui btn-ui-ghost" href="#requisitos">Requisitos de Evaluación</a>
        </div>
      </div>

      <!-- TERMINAL DE COMANDOS -->
      <div class="code-terminal">
        <div class="terminal-header">
          <span class="dot dot-red"></span>
          <span class="dot dot-yellow"></span>
          <span class="dot dot-green"></span>
          <span class="terminal-title">securecode@audit-cli ~ bash</span>
        </div>
        <div class="terminal-content">
          <div class="mb-2">$ securecode scan --empresa="Cliente_Corporativo_SV"</div>
          <div class="mb-2">→ Verificando Carta de Autorización y Representación Legal... <span class="ok">[Firmado y Validado]</span></div>
          <div class="mb-2">→ Validando matriz de alcance (IPs, Dominios FQDN y APIs)</div>
          <div class="mb-2 warn">⚠ Alerta: 2 configuraciones de riesgo en entorno de despliegue</div>
          <div class="mb-2">→ Ejecutando recomendación: <span class="cmd">Hardening y Bastionado de Servidores</span></div>
          <div class="mb-2 ok">[OK] Dictamen de Auditoría Generado. Pruebas dentro del alcance autorizado.</div>
          <div>$ <span class="cursor"></span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BANNER DE ESTÁNDARES E INTEGRIDAD -->
<div class="standards-banner">
  <div class="wrap">
    <div class="standards-grid">
      <div class="standard-item">
        <i class="bi bi-patch-check-fill"></i> ISO/IEC 27001 Compliance
      </div>
      <div class="standard-item">
        <i class="bi bi-shield-lock-fill"></i> OWASP Top 10 Standards
      </div>
      <div class="standard-item">
        <i class="bi bi-cpu-fill"></i> NIST SP 800-115 Pentesting Framework
      </div>
      <div class="standard-item">
        <i class="bi bi-credit-card-2-front-fill"></i> PCI-DSS v4.0 Readiness
      </div>
      <div class="standard-item">
        <i class="bi bi-file-earmark-lock2-fill"></i> Ley de Protección de Datos SV
      </div>
    </div>
  </div>
</div>

<!-- SECCIÓN 1: SERVICIOS OFRECIDOS -->
<section class="section" id="servicios">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Catálogo Profesional</span>
      <h2>Servicios de Ciberseguridad Ofrecidos</h2>
      <p>Portafolio especializado de auditoría técnica, pentesting e ingeniería de software seguro. Explora el catálogo e integra tu solución a la medida.</p>
    </div>

    <div class="services-grid-layout">
      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Auditoría Técnica</span>
          <h3>Auditoría de Lógica de Negocio y Flujos Digitales</h3>
          <p>Análisis de flujos de trabajo en plataformas transaccionales para identificar fallas en reglas de negocio y evasión de controles.</p>
          <div class="price-tag-value">Desde $500.00 <small style="font-size:12px; color:var(--text-muted);">USD / Evaluación</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(1, 'Auditoría de Lógica de Negocio', 500)">Agregar al Paquete</button>
        </div>
      </div>

      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Pentesting de Red</span>
          <h3>Auditoría Técnica y Pentesting de Infraestructura</h3>
          <p>Pruebas de intrusión defensivas y ofensivas sobre servidores, Direcciones IP y servicios expuestos.</p>
          <div class="price-tag-value">Desde $850.00 <small style="font-size:12px; color:var(--text-muted);">USD / Alcance</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(2, 'Auditoría Técnica y Pentesting', 850)">Agregar al Paquete</button>
        </div>
      </div>

      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Desarrollo Seguro</span>
          <h3>Ingeniería de Software Seguro (OWASP / ISO 27001)</h3>
          <p>Revisión de código fuente y arquitectura de software bajo estándares internacionales para el ciclo de vida seguro.</p>
          <div class="price-tag-value">Desde $600.00 <small style="font-size:12px; color:var(--text-muted);">USD / Proyecto</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(3, 'Ingeniería de Software Seguro', 600)">Agregar al Paquete</button>
        </div>
      </div>

      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Bastionado de Entornos</span>
          <h3>Hardening y Bastionado de Entornos de Despliegue</h3>
          <p>Configuración y aseguramiento de servidores web, bases de datos y contenedores reduciendo vectores de ataque.</p>
          <div class="price-tag-value">Desde $450.00 <small style="font-size:12px; color:var(--text-muted);">USD / Entorno</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(4, 'Hardening y Bastionado', 450)">Agregar al Paquete</button>
        </div>
      </div>

      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Monitoreo SOC 24/7</span>
          <h3>Plataforma de Monitoreo Continuo e Incidentes</h3>
          <p>Supervisión en tiempo real de logs, detección de anomalías y respuesta inmediata ante amenazas operado por analistas.</p>
          <div class="price-tag-value">Desde $1,200.00 <small style="font-size:12px; color:var(--text-muted);">USD / Mes</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(5, 'Monitoreo Continuo SOC 24/7', 1200)">Agregar al Paquete</button>
        </div>
      </div>

      <div class="card-service-item">
        <div>
          <span class="service-tag-label">Dictamen Técnico</span>
          <h3>Evaluación y Dictamen Técnico de Software de Terceros</h3>
          <p>Análisis de cumplimiento y diagnóstico de seguridad para soluciones adquiridas a proveedores externos.</p>
          <div class="price-tag-value">Desde $700.00 <small style="font-size:12px; color:var(--text-muted);">USD / Dictamen</small></div>
        </div>
        <div class="mt-3 pt-3 border-top border-secondary">
          <button class="btn-ui btn-ui-ghost w-100" onclick="seleccionarServicioYIrACotizador(6, 'Evaluación y Dictamen Técnico', 700)">Agregar al Paquete</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN METODOLOGÍA -->
<section class="section" id="metodologia">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Metodología de Trabajo</span>
      <h2>Fases de Ejecución de la Auditoría</h2>
      <p>Proceso estructurado que garantiza rigurosidad técnica, confidencialidad y cero interrupciones en la continuidad del negocio.</p>
    </div>
    <div class="approach-grid-layout">
      <div class="approach-card-item">
        <span class="phase-step">Fase 01 · Reconocimiento</span>
        <h3>Mapeo de Arquitectura y Flujos</h3>
        <p>Identificación de componentes, análisis de lógica de negocio, mapeo de endpoints y revisión de configuraciones.</p>
      </div>
      <div class="approach-card-item">
        <span class="phase-step">Fase 02 · Evaluación</span>
        <h3>Pentesting y Análisis Vulnerable</h3>
        <p>Ejecución de pruebas de intrusión no destructivas para validar brechas de seguridad y vectores de ataque.</p>
      </div>
      <div class="approach-card-item">
        <span class="phase-step">Fase 03 · Remediación</span>
        <h3>Hardening y Reporte Ejecutivo</h3>
        <p>Emisión del informe técnico con hallazgos, recomendaciones de remediación y plan de hardening.</p>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN REQUISITOS Y GARANTÍA LEGAL -->
<section class="section" id="requisitos">
  <div class="wrap">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
      <div class="section-head m-0">
        <span class="eyebrow">Requisitos de Servicio</span>
        <h2>Requisitos Legales y Técnicos para la Evaluación</h2>
        <p>Estándares que la empresa cliente debe cumplir para autorizar y ejecutar las pruebas de intrusión y auditorías de seguridad informática.</p>
      </div>
      <div>
        <button class="btn-ui btn-ui-ghost" data-bs-toggle="modal" data-bs-target="#modalPreviewRoe">
          <i class="bi bi-file-earmark-pdf me-1 text-info"></i> Previsualizar Carta RoE
        </button>
      </div>
    </div>

    <div class="reqs-grid-layout">
      <div class="req-card-item">
        <div class="req-icon-box"><i class="bi bi-file-earmark-text"></i></div>
        <div>
          <h4>1. Carta de Autorización y Exención de Responsabilidad (RoE)</h4>
          <p>Documento contractual firmado por la dirección de la empresa cliente facultando las pruebas de intrusión.</p>
        </div>
      </div>

      <div class="req-card-item">
        <div class="req-icon-box"><i class="bi bi-list-check"></i></div>
        <div>
          <h4>2. Delimitación Explícita del Alcance (Scope & Target Inventory)</h4>
          <p>Listado exacto de Direcciones IP, nombres de dominio (FQDN) y APIs que serán evaluados.</p>
        </div>
      </div>

      <div class="req-card-item">
        <div class="req-icon-box"><i class="bi bi-diagram-3"></i></div>
        <div>
          <h4>3. Clasificación de Entornos y Ventanas de Mantenimiento</h4>
          <p>Declaración del tipo de entorno (Producción, Staging o Desarrollo) para coordinar ventanas horarias.</p>
        </div>
      </div>

      <div class="req-card-item">
        <div class="req-icon-box"><i class="bi bi-hdd-network"></i></div>
        <div>
          <h4>4. Verificación de Respaldos e Integridad de Datos</h4>
          <p>Confirmación de la existencia de respaldos (backups) vigentes de bases de datos antes de las pruebas.</p>
        </div>
      </div>
    </div>

    <!-- GARANTÍA LEGAL INTEGRADA -->
    <div class="row align-items-center g-4 mt-4 pt-4" style="border-top:1px solid var(--border);">
      <div class="col-lg-7 col-12">
        <h3>Nada se toca sin permiso por escrito.</h3>
        <p>Antes de iniciar cualquier servicio que implique evaluar o intentar comprometer datos o sistemas — pentesting, pruebas de intrusión controladas, auditorías de código — <strong class="text-light">SECURE CODE S.A.S. de C.V.</strong> exige una Carta de Autorización (RoE) firmada por la Representación Legal de la empresa cliente.</p>
        <p class="small" style="color:var(--text-muted);">Operamos 100% dentro del marco legal salvadoreño y estándares internacionales de ciberseguridad. Sin ese documento firmado por ambas partes, el servicio simplemente no arranca, sin excepciones.</p>
      </div>
      <div class="col-lg-5 col-12">
        <div class="card-service-item">
          <div>
            <span class="service-tag-label"><i class="bi bi-shield-lock-fill me-1"></i> Protocolo de Autorización</span>
          </div>
          <div class="d-flex align-items-center gap-2 py-2" style="border-bottom:1px solid var(--border); font-size:14px;">
            <i class="bi bi-check-circle-fill" style="color:var(--accent);"></i> Alcance del servicio delimitado por escrito
          </div>
          <div class="d-flex align-items-center gap-2 py-2" style="border-bottom:1px solid var(--border); font-size:14px;">
            <i class="bi bi-check-circle-fill" style="color:var(--accent);"></i> Carta de Autorización (RoE) firmada por Representante Legal
          </div>
          <div class="d-flex align-items-center gap-2 py-2" style="border-bottom:1px solid var(--border); font-size:14px;">
            <i class="bi bi-check-circle-fill" style="color:var(--accent);"></i> Ventana de pruebas acordada previamente
          </div>
          <div class="d-flex align-items-center gap-2 py-2" style="font-size:14px;">
            <i class="bi bi-check-circle-fill" style="color:var(--accent);"></i> Confidencialidad absoluta y Acuerdo NDA vinculante
          </div>
          <div class="mt-3 pt-2 font-monospace small text-center fw-bold" style="border-top:1px solid var(--border); color:var(--accent);">
            Sin este documento, ningún servicio de intrusión se ejecuta.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN COTIZADOR INTERACTIVO -->
<section class="section" id="cotizador">
  <div class="wrap">
    <div class="section-head text-center mx-auto">
      <span class="eyebrow">Cotizador Interactivo</span>
      <h2>Arma tu Paquete de Ciberseguridad</h2>
      <p>Verifica los requisitos de tu empresa, selecciona los servicios y descubre el siguiente paso recomendado en tu ruta de protección digital.</p>
    </div>

    <div class="cotizador-wrapper">
      <!-- PASO 1: REQUISITOS -->
      <div class="mb-4 pb-4 border-bottom border-secondary">
        <h4 class="text-light mb-2">1. Requisitos de Evaluación de la Empresa</h4>
        <p class="small text-muted mb-3">Marca las condiciones que cumple tu empresa antes de proceder:</p>
        <div class="row g-3">
          <div class="col-md-6 col-12">
            <div class="prereq-check-box">
              <input type="checkbox" id="chkLegal" checked onchange="calcularPaquete()">
              <div>
                <strong class="text-light d-block" style="font-size:14px;">Firma de Carta de Autorización (RoE)</strong>
                <p class="small text-muted">Facultad legal para autorizar escaneos y pentesting.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="prereq-check-box">
              <input type="checkbox" id="chkScope" checked onchange="calcularPaquete()">
              <div>
                <strong class="text-light d-block" style="font-size:14px;">Matriz de Alcance Definida (IPs / Dominios)</strong>
                <p class="small text-muted">Listado delimitado de objetivos a evaluar.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="prereq-check-box">
              <input type="checkbox" id="chkBackups" checked onchange="calcularPaquete()">
              <div>
                <strong class="text-light d-block" style="font-size:14px;">Copias de Seguridad (Backups) Vigentes</strong>
                <p class="small text-muted">Respaldos verificados antes de la intervención.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="prereq-check-box">
              <input type="checkbox" id="chkPoc" checked onchange="calcularPaquete()">
              <div>
                <strong class="text-light d-block" style="font-size:14px;">Contacto Técnico de Emergencia 24/7</strong>
                <p class="small text-muted">Responsable interno asignado para la auditoría.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- PASO 2: SELECCIÓN Y RECOMENDACIÓN DINÁMICA -->
      <div class="row g-4">
        <div class="col-lg-7 col-12">
          <h4 class="text-light mb-3">2. Selecciona los Servicios para tu Paquete</h4>

          <div class="select-service-row" id="card-1">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">1. Auditoría de Lógica de Negocio y Flujos Digitales</h5>
                <p class="small text-muted mb-2">Evaluación de reglas de negocio y flujos transaccionales.</p>
                <span class="text-info font-monospace fw-bold">Desde $500.00 USD</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(1, 'Auditoría de Lógica de Negocio', 500)">Seleccionar</button>
            </div>
          </div>

          <div class="select-service-row" id="card-2">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">2. Auditoría Técnica y Pentesting de Infraestructura</h5>
                <p class="small text-muted mb-2">Pruebas de intrusión en servidores y red.</p>
                <span class="text-info font-monospace fw-bold">Desde $850.00 USD</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(2, 'Auditoría Técnica y Pentesting', 850)">Seleccionar</button>
            </div>
          </div>

          <div class="select-service-row" id="card-3">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">3. Ingeniería de Software Seguro (OWASP / ISO 27001)</h5>
                <p class="small text-muted mb-2">Revisión de código fuente y desarrollo seguro.</p>
                <span class="text-info font-monospace fw-bold">Desde $600.00 USD</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(3, 'Ingeniería de Software Seguro', 600)">Seleccionar</button>
            </div>
          </div>

          <div class="select-service-row" id="card-4">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">4. Hardening y Bastionado de Entornos de Despliegue</h5>
                <p class="small text-muted mb-2">Aseguramiento de servidores web y bases de datos.</p>
                <span class="text-info font-monospace fw-bold">Desde $450.00 USD</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(4, 'Hardening y Bastionado', 450)">Seleccionar</button>
            </div>
          </div>

          <div class="select-service-row" id="card-5">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">5. Plataforma de Monitoreo Continuo (SOC 24/7)</h5>
                <p class="small text-muted mb-2">Supervisión en tiempo real e incidentes.</p>
                <span class="text-info font-monospace fw-bold">Desde $1,200.00 USD / mes</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(5, 'Monitoreo Continuo SOC 24/7', 1200)">Seleccionar</button>
            </div>
          </div>

          <div class="select-service-row" id="card-6">
            <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
              <div>
                <h5 class="text-light mb-1 fs-6 fw-bold">6. Evaluación y Dictamen Técnico de Software de Terceros</h5>
                <p class="small text-muted mb-2">Análisis de cumplimiento y diagnóstico de software externo.</p>
                <span class="text-info font-monospace fw-bold">Desde $700.00 USD</span>
              </div>
              <button class="btn-ui btn-ui-ghost btn-sm font-monospace" onclick="toggleServicio(6, 'Evaluación y Dictamen Técnico', 700)">Seleccionar</button>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-12">
          <div class="p-4 bg-dark rounded border border-secondary sticky-top" style="top:95px;">
            <h4 class="text-light mb-3">Resumen de tu Paquete</h4>

            <div id="listaSeleccionados" class="small mb-3">
              <span class="text-muted">No has seleccionado ningún servicio aún.</span>
            </div>

            <!-- RUTA DE RECOMENDACION DINAMICA PASO A PASO -->
            <div id="boxRutaRecomendada" class="recommendation-box" style="display:none;">
              <strong>Ruta de Ciberseguridad Sugerida:</strong>
              <div id="textRutaRecomendada" class="mt-1"></div>
            </div>

            <div class="pt-3 border-top border-secondary mt-3">
              <div class="d-flex justify-content-between text-light font-monospace fw-bold fs-5">
                <span>Total Estimado Base:</span>
                <span class="text-info">$<span id="montoTotalEstimado">0.00</span> USD*</span>
              </div>
              <small class="text-muted d-block mt-2" style="font-size: 11px;">* El costo final puede escalar dependiendo del tamaño de la infraestructura y tipo de empresa (Micro, Pequeña, Mediana, Grande).</small>
            </div>

            <div class="mt-4">
              <a href="{{ route('compras.create') }}" class="btn-ui btn-ui-primary w-100" onclick="guardarBorradorCarrito()">Proceder a la Contratación</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN PREGUNTAS FRECUENTES FAQ / ACUERDOS NDA -->
<section class="section" id="faq">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Preguntas Frecuentes</span>
      <h2>Garantías, Confidencialidad y Acuerdos de Servicio (SLA)</h2>
      <p>Resolvemos las dudas habituales de directores de tecnología y gerentes de riesgos antes de autorizar las auditorías.</p>
    </div>

    <div class="accordion accordion-custom" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqHead1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
            <i class="bi bi-shield-check me-2 text-info"></i> ¿Las pruebas de intrusión pueden interrumpir los servicios activos de la empresa?
          </button>
        </h2>
        <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            No. Todas las evaluaciones ejecutadas por SECURE CODE S.A.S. de C.V. utilizan metodologías no destructivas bajo norma NIST SP 800-115 y OWASP. Además, las pruebas en entornos de producción se programan coordinadamente en ventanas de mantenimiento fuera del horario laboral del cliente.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqHead2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
            <i class="bi bi-lock-fill me-2 text-info"></i> ¿Cómo se garantiza la confidencialidad de la información y hallazgos?
          </button>
        </h2>
        <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Previo a cualquier escaneo o revisión de código fuente, SECURE CODE suscribe un Acuerdo de Confidencialidad y No Divulgación (NDA) vinculante bajo la legislación de El Salvador. Toda la evidencia recolectada se cifra y se elimina de nuestros sistemas tras la entrega del reporte final.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqHead3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
            <i class="bi bi-file-earmark-pdf-fill me-2 text-info"></i> ¿Qué validez legal posee la Carta de Autorización (RoE)?
          </button>
        </h2>
        <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            La Carta de Autorización emitida automáticamente por nuestra plataforma constituye el instrumento contractual mediante el cual la Representación Legal de la empresa cliente ampara jurídicamente al equipo auditor frente a leyes de delitos informáticos durante la ejecución del alcance pactado.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faqHead4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4">
            <i class="bi bi-headset me-2 text-info"></i> ¿Cuál es el Tiempo de Respuesta (SLA) del Centro de Operaciones SOC 24/7?
          </button>
        </h2>
        <div id="faqCollapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Para eventos clasificados como "Riesgo Crítico" o "Intrusión Activa", el equipo del SOC 24/7 emite la alerta inicial y la contención primaria en menos de 15 minutos, coordinando directamente con el punto de contacto técnico de emergencia asignado.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN PARA INVERSIONISTAS -->
<section class="section" id="inversion">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow"><i class="bi bi-briefcase-fill me-1"></i> Propuesta para Inversionistas</span>
      <h2>¿Quién quiere nadar con nosotros?</h2>
      <p>En un mundo donde los ataques digitales crecen cada día, SECURE CODE <strong class="text-info">no es un lujo, es una necesidad.</strong> Invertir en nosotros es invertir en la seguridad del futuro empresarial salvadoreño.</p>
    </div>

    <!-- MÉTRICAS CLAVE -->
    <div class="row g-3 mb-4">
      <div class="col-md-3 col-6">
        <div class="card-service-item" style="padding:20px 22px;">
          <span class="service-tag-label">Tipo de Sociedad</span>
          <div class="font-monospace text-light fs-4 fw-bold">S.A.S. de C.V.</div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card-service-item" style="padding:20px 22px;">
          <span class="service-tag-label">Capital Inicial</span>
          <div class="price-tag-value" style="margin:0;">$18,000</div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card-service-item" style="padding:20px 22px;">
          <span class="service-tag-label">Ingresos Proyectados Año 3</span>
          <div class="price-tag-value" style="margin:0;">$86,000 <small class="fs-6" style="color:var(--text-muted);">/año</small></div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card-service-item" style="padding:20px 22px;">
          <span class="service-tag-label">Valoración Pedida</span>
          <div class="price-tag-value" style="margin:0;">$75,000</div>
        </div>
      </div>
    </div>

    <!-- ESTRUCTURA ACCIONARIA -->
    <div class="row g-4 mb-5">
      <div class="col-12">
        <div class="card-service-item">
          <div>
            <span class="service-tag-label">Estructura Accionaria y Capital</span>
            <p>Sociedad conformada por 4 accionistas fundadores, cada uno con un aporte dinerario de <strong class="text-light">$4,500.00</strong>, sumando el 100% del capital social inicial ($18,000.00). La administración recae sobre un Administrador Único Titular.</p>
          </div>
          <div class="table-responsive mt-2">
            <table class="table table-dark table-borderless table-sm mb-0 align-middle" style="font-size:14px; background-color:transparent;">
              <thead>
                <tr style="border-bottom:1px solid var(--border-bright);">
                  <th class="pb-2" style="color:var(--accent);">Accionista</th>
                  <th class="pb-2" style="color:var(--accent);">Rol Legal / Funcional</th>
                  <th class="pb-2" style="color:var(--accent);">Inversión</th>
                  <th class="pb-2" style="color:var(--accent);">Participación</th>
                </tr>
              </thead>
              <tbody>
                <tr style="border-bottom:1px solid var(--border);">
                  <td class="py-2">Blanca Leticia Argueta Portillo</td>
                  <td class="py-2" style="color:var(--text-muted);">Accionista</td>
                  <td class="py-2 font-monospace">$4,500.00</td>
                  <td class="py-2 font-monospace">25%</td>
                </tr>
                <tr style="border-bottom:1px solid var(--border);">
                  <td class="py-2">William Alfredo Irula González</td>
                  <td class="py-2" style="color:var(--text-muted);">Accionista</td>
                  <td class="py-2 font-monospace">$4,500.00</td>
                  <td class="py-2 font-monospace">25%</td>
                </tr>
                <tr style="border-bottom:1px solid var(--border);">
                  <td class="py-2">Emerson Aldahir Portillo Segovia</td>
                  <td class="py-2" style="color:var(--text-muted);">Accionista</td>
                  <td class="py-2 font-monospace">$4,500.00</td>
                  <td class="py-2 font-monospace">25%</td>
                </tr>
                <tr>
                  <td class="py-2">Javier Alexander Vargas Díaz</td>
                  <td class="py-2" style="color:var(--accent);">Rep. Legal y Adm. Único Titular</td>
                  <td class="py-2 font-monospace">$4,500.00</td>
                  <td class="py-2 font-monospace">25%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- TARJETAS INFERIORES -->
      <div class="col-md-4 col-12">
        <div class="card-service-item h-100">
          <div>
            <span class="service-tag-label">Fuente de Financiamiento</span>
            <p>100% capital propio de los accionistas, sin crédito bancario en el arranque. El 40% de las utilidades de los primeros ejercicios se reinvierte en I+D.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="card-service-item h-100">
          <div>
            <span class="service-tag-label">Proyección de Ingresos</span>
            <p>Mezcla a 3 años: ≈$12k anuales de PYMEs, $46.9k de contrato institucional público, y ≈$27k de auditorías por proyecto — total cercano a $86k/año.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="card-service-item h-100">
          <div>
            <span class="service-tag-label">Lo Que Pedimos Hoy</span>
            <p><strong class="text-light">$15,000</strong> adicionales a cambio del <strong class="text-light">20% de participación</strong>, valoración de <strong class="text-light">$75,000</strong> — ~0.87x ingresos anuales, para financiar expansión.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center pt-3">
      <p class="lead-desc" style="max-width:700px; margin:0 auto 24px;">¿Quién de ustedes quiere nadar con nosotros en este océano de oportunidades?</p>
      <a class="btn-ui btn-ui-primary" href="mailto:contacto@securecode.com"><i class="bi bi-briefcase me-1"></i> Hablemos de la Inversión</a>
    </div>
  </div>
</section>

<!-- MODAL MODELO DE CARTA ROE PREVIEW -->
<div class="modal fade" id="modalPreviewRoe" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content bg-dark text-light border-secondary">
      <div class="modal-header border-secondary">
        <h5 class="modal-title font-monospace fw-bold"><i class="bi bi-file-earmark-text text-info me-2"></i> Modelo de Carta de Autorización (RoE Preview)</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body font-monospace p-4" style="background:#0b0f19; font-size:13px; line-height:1.8; color:#E2E8F0; max-height:65vh; overflow-y:auto;">
        <div class="text-center pb-3 mb-3 border-bottom border-secondary">
          <h4 class="text-light m-0 font-monospace fw-bold">SECURE CODE S.A.S. DE C.V.</h4>
          <span class="text-info small fw-bold">San Miguel, El Salvador · Firma Especializada en Ciberseguridad</span>
        </div>
        
        <p class="text-info fw-bold mb-2">DOCUMENTO CONTRACTUAL: CARTA DE AUTORIZACIÓN Y EXENCIÓN DE RESPONSABILIDAD (RULES OF ENGAGEMENT - RoE)</p>
        <p>Por medio del presente instrumento, la sociedad cliente faculta formalmente a <strong>SECURE CODE S.A.S. DE C.V.</strong> (Sociedad de Acciones Simplificada de Capital Variable, registrada en El Salvador) para la ejecución de auditorías técnicas, pruebas de intrusión y evaluaciones de ciberseguridad sobre sus sistemas de información.</p>

        <p class="text-light fw-bold mt-3 mb-1">1. MARCO DE ACTUACIÓN Y ALCANCE:</p>
        <p>Las actividades de auditoría se delimitarán strictly a los nombres de dominio FQDN, Direcciones IP y servicios acordados en la orden de servicio. SECURE CODE no interferirá con sistemas ajenos al inventario autorizado.</p>

        <p class="text-light fw-bold mt-3 mb-1">2. DECLARACIONES DE RESPONSABILIDAD Y CONFIDENCIALIDAD (NDA):</p>
        <ul class="mb-3">
          <li class="mb-2">Las pruebas se realizarán bajo los estándares y metodologías internacionales <strong>OWASP Top 10</strong>, <strong>NIST SP 800-115</strong> e <strong>ISO/IEC 27001</strong>.</li>
          <li class="mb-2"><strong>SECURE CODE S.A.S. de C.V.</strong> mantendrá absoluta confidencialidad sobre la estructura, vulnerabilidades y hallazgos identificados durante el análisis.</li>
          <li class="mb-2">Al finalizar la intervención, se emitirá el Dictamen Técnico Oficial en PDF junto con la guía de remediación y bastionado recomendados.</li>
        </ul>

        <p class="text-light fw-bold mt-3 mb-1">3. EXENCIÓN DE RESPONSABILIDAD LEGAL:</p>
        <p>El cliente declara contar con la representación legal y titularidad necesaria sobre los sistemas evaluados, amparando al equipo auditor de SECURE CODE ante leyes de delitos informáticos durante la ejecución del alcance pactado.</p>

        <div class="pt-3 border-top border-secondary text-info small fw-bold mt-4">
          <i class="bi bi-info-circle me-1"></i> Este documento modelo se genera firmado digitalmente en formato PDF junto con tu comprobante al completar la contratación.
        </div>
      </div>
      <div class="modal-footer border-secondary">
        <button type="button" class="btn-ui btn-ui-ghost" data-bs-dismiss="modal">Cerrar Vista Previa</button>
        <a href="#cotizador" class="btn-ui btn-ui-primary" data-bs-dismiss="modal">Ir al Cotizador</a>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer-section">
  <div class="wrap">
    <div class="footer-columns">
      <div class="foot-brand">
        <svg style="width:34px;height:34px;" viewBox="0 0 100 100" fill="none">
          <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121829"/>
          <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
        </svg>
        <div>
          <span style="font-family:var(--font-mono);font-size:15px;color:var(--text-high);font-weight:700;">SECURE<b>CODE</b> S.A.S. de C.V.</span>
          <span style="display:block;font-size:11.5px;color:var(--text-muted);">Firma Salvadoreña de Ciberseguridad</span>
        </div>
      </div>
      <div class="foot-cols">
        <div class="footer-col">
          <h5>Sedes Registradas</h5>
          <a href="#">San Miguel Centro: Plaza Jardín #10</a>
          <a href="#">Ciudad Barrios: Plaza El Calvario #20</a>
        </div>
        <div class="footer-col">
          <h5>Navegación</h5>
          <a href="#servicios">Servicios</a>
          <a href="#metodologia">Metodología</a>
          <a href="#requisitos">Requisitos</a>
          <a href="#cotizador">Cotizador</a>
          <a href="#faq">FAQ</a>
          <a href="#inversion">Inversión</a>
        </div>
        <div class="footer-col">
          <h5>Contacto Directo</h5>
          <a href="tel:75254863">+503 7525-4863</a>
          <a href="mailto:contacto@securecode.com">contacto@securecode.com</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 SECURE CODE S.A.S. de C.V. Todos los derechos reservados. San Miguel, El Salvador.</span>
    </div>
  </div>
</footer>

<script>
  const serviciosSeleccionados = {};

  const recomendacionesRuta = {
    1: "Al evaluar la Lógica de Negocio, el siguiente paso recomendado es realizar la Auditoría Técnica y Pentesting de Infraestructura.",
    2: "Al completar el Pentesting de Infraestructura, se recomienda ejecutar el Hardening y Bastionado de Entornos de Despliegue.",
    3: "Al validar la Ingeniería de Software Seguro, el paso siguiente recomendado es configurar el Bastionado de Servidores.",
    4: "Al asegurar los entornos con Hardening, se recomienda activar la Plataforma de Monitoreo Continuo SOC 24/7.",
    5: "Con el SOC 24/7 activo, se sugiere realizar la Evaluación y Dictamen Técnico de Software de Terceros.",
    6: "Con el Dictamen de Terceros completado, se sugiere mantener la Auditoría de Lógica de Negocio actualizada periódicamente."
  };

  function seleccionarServicioYIrACotizador(id, nombre, precio) {
    if (!serviciosSeleccionados[id]) {
      toggleServicio(id, nombre, precio);
    }
    document.getElementById('cotizador').scrollIntoView({ behavior: 'smooth' });
  }

  function toggleServicio(id, nombre, precio) {
    const card = document.getElementById(`card-${id}`);
    if (!card) return;
    const btn = card.querySelector('button');

    if (serviciosSeleccionados[id]) {
      delete serviciosSeleccionados[id];
      card.classList.remove('selected');
      if(btn) {
        btn.textContent = 'Seleccionar';
        btn.classList.replace('btn-ui-primary', 'btn-ui-ghost');
      }
    } else {
      serviciosSeleccionados[id] = { nombre, precio };
      card.classList.add('selected');
      if(btn) {
        btn.textContent = 'Quitar';
        btn.classList.replace('btn-ui-ghost', 'btn-ui-primary');
      }
    }
    calcularPaquete();
  }

  function calcularPaquete() {
    let total = 0;
    let htmlLista = '';
    let ultimoId = null;

    Object.entries(serviciosSeleccionados).forEach(([id, serv]) => {
      total += serv.precio;
      ultimoId = id;
      htmlLista += `
        <div class="d-flex justify-content-between align-items-center py-1 border-bottom border-secondary">
          <span class="text-light">${serv.nombre}</span>
          <span class="text-info font-monospace fw-bold">Desde $${serv.precio.toFixed(2)}</span>
        </div>
      `;
    });

    document.getElementById('listaSeleccionados').innerHTML = htmlLista || '<span class="text-muted">No has seleccionado ningún servicio aún.</span>';
    document.getElementById('montoTotalEstimado').textContent = total.toFixed(2);

    const boxRuta = document.getElementById('boxRutaRecomendada');
    const textRuta = document.getElementById('textRutaRecomendada');

    if (ultimoId && recomendacionesRuta[ultimoId]) {
      textRuta.textContent = recomendacionesRuta[ultimoId];
      boxRuta.style.display = 'block';
    } else {
      boxRuta.style.display = 'none';
    }
  }

  function guardarBorradorCarrito() {
    localStorage.setItem('draftCart', JSON.stringify(serviciosSeleccionados));
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
