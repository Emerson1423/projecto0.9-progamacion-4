<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización e Integración de Servicios — SECURE CODE S.A.S. de C.V.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #0d1120;
            --bg-1: #121626;
            --bg-2: #161c33;
            --bg-3: #1b2240;
            --primary: #0047AB;
            --accent: #00E5FF;
            --interact: #3377FF;
            --muted: #F1F5F9;
            --muted-sub: #E2E8F0;
            --border: #2b3350;
            --border-soft: #475669;
            --white: #FFFFFF;
            --success: #00E676;
            --warning: #FFB300;
            --font-display: 'Space Grotesk', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body {
            background: var(--bg);
            color: var(--white);
            font-family: var(--font-body);
        }

        /* SOBREESCRITURA GLOBAL DE TEXTOS PARA MÁXIMA LEGIBILIDAD */
        .text-muted, p.text-muted, span.text-muted, div.text-muted, small.text-muted {
            color: #E2E8F0 !important;
            font-weight: 500 !important;
            opacity: 1 !important;
        }

        p {
            color: #F1F5F9 !important;
            font-size: 15px;
            line-height: 1.6;
        }

        .navbar {
            background: rgba(13, 17, 32, 0.95) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .brand-logo { width: 34px; height: 34px; }
        .brand-name { font-family: var(--font-mono); font-size: 15px; letter-spacing: 0.02em; color: var(--white); font-weight: 700; }
        .brand-name b { color: var(--accent); }

        .eyebrow {
            font-family: var(--font-mono);
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-size: 12.5px;
            color: var(--accent);
            font-weight: 700;
        }

        .prereq-box {
            background: var(--bg-2);
            border: 1px solid var(--border-soft);
            border-radius: 12px;
            padding: 26px;
            margin-bottom: 24px;
        }

        .prereq-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-top: 16px; }
        .prereq-item {
            background: var(--bg-1);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 16px;
            display: flex; align-items: flex-start; gap: 12px;
        }
        .prereq-item input { accent-color: var(--accent); margin-top: 3px; width: 18px; height: 18px; }
        .prereq-item p { color: #E2E8F0 !important; font-size: 14px; margin: 0; }

        .maturity-container { background: var(--bg-1); border: 1px solid var(--border); border-radius: 10px; padding: 18px 22px; margin-bottom: 30px; }
        .maturity-bar-bg { height: 12px; background: var(--bg-3); border-radius: 6px; overflow: hidden; }
        .maturity-bar-fill { height: 100%; width: 45%; background: linear-gradient(90deg, var(--interact), var(--accent)); transition: width .4s ease; }

        .seg-tabs { display: flex; gap: 10px; margin-bottom: 24px; flex-wrap: wrap; }
        .seg-tab {
            font-family: var(--font-mono); font-size: 13.5px; font-weight: 700;
            padding: 11px 20px; border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--bg-1); color: #F1F5F9;
            cursor: pointer; transition: all .15s;
        }
        .seg-tab.active { border-color: var(--accent); color: var(--accent); background: rgba(0,229,255,0.08); }
        .seg-panel { display: none; }
        .seg-panel.active { display: block; }

        .calc-panel {
            display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 0;
            background: var(--bg-1);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }
        .calc-addons { padding: 28px; border-right: 1px solid var(--border); }

        .tier-card {
            background: var(--bg-2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 16px;
            cursor: pointer;
            transition: all .2s;
        }
        .tier-card.active { border-color: var(--accent); background: rgba(0,229,255,0.08); }
        .tier-card p { color: #E2E8F0 !important; font-size: 13.5px; }

        .service-card {
            background: var(--bg-2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 14px;
            transition: border-color .15s;
        }
        .service-card:hover { border-color: var(--border-soft); }
        .service-card p { color: #E2E8F0 !important; font-size: 14.5px; }

        .next-step-box {
            margin-top: 10px; padding: 12px 14px;
            background: rgba(0, 229, 255, 0.08);
            border: 1px dashed var(--accent);
            border-radius: 6px;
            font-size: 13.5px; color: var(--accent); font-weight: 600;
            display: none;
        }
        .next-step-box.show { display: block; }

        .calc-console { padding: 28px; background: linear-gradient(180deg, var(--bg-2), var(--bg-1)); display: flex; flex-direction: column; }
        .cart-dropdown-custom {
            background: var(--bg-1);
            border: 1px solid var(--border-soft);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .console-warning {
            font-family: var(--font-mono); font-size: 12.5px; color: var(--warning);
            background: rgba(255,179,0,0.08); border: 1px solid rgba(255,179,0,0.3);
            border-radius: 8px; padding: 12px; margin-bottom: 16px; display: none;
        }
        .console-warning.show { display: block; }

        @media (max-width: 900px) {
            .calc-panel { grid-template-columns: 1fr; }
            .prereq-grid { grid-template-columns: 1fr; }
            .calc-addons { border-right: none; border-bottom: 1px solid var(--border); }
        }
    </style>
</head>
<body>

<header class="navbar navbar-expand-lg px-4 border-bottom border-secondary sticky-top" style="background: rgba(11, 15, 25, 0.94); backdrop-filter: blur(14px); z-index:1000;">
  <div class="container-fluid max-w-1280">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('inicio') }}">
      <svg class="brand-logo" viewBox="0 0 100 100" fill="none" style="width:36px;height:36px;">
        <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121626"/>
        <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
      </svg>
      <span class="brand-name font-monospace fs-5 fw-bold text-light">SECURE<b style="color:var(--accent);">CODE</b></span>
    </a>

    <div class="ms-auto d-flex align-items-center gap-3 flex-wrap">
      <a href="{{ route('inicio') }}" class="btn btn-sm btn-outline-info font-monospace fw-bold">
        <i class="bi bi-house me-1"></i> Inicio / Portal
      </a>
      <span class="text-light small font-monospace fw-bold fs-6 border-start border-secondary ps-3 ms-1">
        <i class="bi bi-person-circle text-info me-1"></i> {{ auth()->user()->nombre }}
      </span>
      <a href="{{ route('compras.historial') }}" class="btn btn-sm btn-outline-light font-monospace fw-bold">Mis Contrataciones</a>
      <button class="btn btn-sm btn-outline-danger font-monospace fw-bold" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">Cerrar Sesión</button>
    </div>
  </div>
</header>

<!-- Modal Confirmar Logout -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light border-secondary">
      <div class="modal-header border-secondary">
        <h5 class="modal-title font-monospace">Confirmar Cierre de Sesión</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="color:#F1F5F9;">
        ¿Deseas cerrar sesión en el sistema de SECURE CODE S.A.S. de C.V.?
      </div>
      <div class="modal-footer border-secondary">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="button" class="btn btn-secondary btn-sm font-monospace" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger btn-sm font-monospace">Cerrar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container py-4">
    <div class="text-center mb-4">
        <span class="eyebrow">Integrador Técnico & Cotización</span>
        <h1 class="text-light fw-bold">Cotizador de Servicios de Ciberseguridad</h1>
        <p class="max-w-2xl mx-auto fw-medium" style="color:#E2E8F0 !important; font-size:16px;">Evaluación de requisitos de infraestructura, cálculo transparente y recomendaciones para la contratación de auditorías.</p>
    </div>

    @if(session('success'))
        <div id="success-message" class="alert alert-success border-0 bg-success text-white mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <!-- PASO 1: REQUISITOS TECNICOS Y LEGALES -->
    <div class="prereq-box">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
        <h3 class="text-light m-0 fw-bold fs-4">Paso 1: Check-list de Requisitos Técnicos y Legales</h3>
        <span style="font-family:var(--font-mono);font-size:14px;color:var(--accent);font-weight:bold;" id="prereqStatus">5 de 5 verificados</span>
      </div>
      <p style="font-size:15px;color:#E2E8F0 !important;" class="mb-3">Selecciona los requisitos que cumple actualmente tu empresa para habilitar la ejecución de las auditorías:</p>
      
      <div class="prereq-grid">
        <div class="prereq-item">
          <input type="checkbox" id="reqLegal" checked>
          <div>
            <label for="reqLegal" class="text-light fw-bold" style="font-size:14.5px;">1. Firma de Carta de Autorización (RoE)</label>
            <p class="m-0" style="color:#CBD5E1 !important;">Consentimiento formal firmado por la alta dirección.</p>
          </div>
        </div>

        <div class="prereq-item">
          <input type="checkbox" id="reqScope" checked>
          <div>
            <label for="reqScope" class="text-light fw-bold" style="font-size:14.5px;">2. Delimitación de Alcance (IPs / Dominios)</label>
            <p class="m-0" style="color:#CBD5E1 !important;">Matriz delimitada de Direcciones IP y FQDNs a evaluar.</p>
          </div>
        </div>

        <div class="prereq-item">
          <input type="checkbox" id="reqEnvironments" checked>
          <div>
            <label for="reqEnvironments" class="text-light fw-bold" style="font-size:14.5px;">3. Clasificación de Entornos de Prueba</label>
            <p class="m-0" style="color:#CBD5E1 !important;">Especificación de Producción, Staging o Desarrollo.</p>
          </div>
        </div>

        <div class="prereq-item">
          <input type="checkbox" id="reqBackups" checked>
          <div>
            <label for="reqBackups" class="text-light fw-bold" style="font-size:14.5px;">4. Política de Respaldos e Integridad</label>
            <p class="m-0" style="color:#CBD5E1 !important;">Copias de seguridad verificadas antes del análisis.</p>
          </div>
        </div>

        <div class="prereq-item col-span-2">
          <input type="checkbox" id="reqPoc" checked>
          <div>
            <label for="reqPoc" class="text-light fw-bold" style="font-size:14.5px;">5. Punto de Contacto Técnico de Emergencia (24/7)</label>
            <p class="m-0" style="color:#CBD5E1 !important;">Responsable técnico interno disponible para la coordinación.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- MATURITY SCORE BAR -->
    <div class="maturity-container">
      <div class="d-flex justify-content-between font-monospace small mb-2 text-light fw-bold">
        <span>Nivel de Madurez de Seguridad Estimado:</span>
        <span id="maturityPercent" style="color:var(--accent);">75% · Madurez Avanzada</span>
      </div>
      <div class="maturity-bar-bg">
        <div class="maturity-bar-fill" id="maturityFill" style="width:75%;"></div>
      </div>
    </div>

    <!-- SECCIÓN DE COTIZACIÓN -->
    <div class="calc-panel mt-4">
      <div class="calc-addons">
        <h3 class="text-light fs-5 mb-2 fw-bold">Paso 2: Confirma tu Plan y Configura Servicios Extra</h3>
        <p class="small mb-4" style="color:#E2E8F0 !important;">A continuación, verás el plan que seleccionaste en la página anterior. Si lo deseas, puedes añadir auditorías o servicios puntuales a tu carrito.</p>
        
        <div class="p-3 bg-dark border border-info rounded mb-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <span class="badge bg-info text-dark font-monospace mb-1 fw-bold">Plan Seleccionado</span>
              <h5 class="text-light m-0 fw-bold" id="selectedPlanName">Plan Básico PYME (5 Disp.)</h5>
              <small class="text-muted" id="selectedPlanDesc" style="color:#CBD5E1!important;">Incluye protección base para 5 dispositivos.</small>
            </div>
            <div class="text-end">
              <span class="text-light font-monospace fs-4 fw-bold" id="selectedPlanPrice">$30.00</span>
              <span class="text-muted small" id="selectedPlanType">/ mes</span>
            </div>
          </div>
        </div>

        <h3 class="text-light fs-5 mb-3 fw-bold">Catálogo Oficial de Servicios (Opcionales)</h3>
        <div class="row g-3">
          @foreach($productos as $producto)
            <div class="col-12">
              <div class="service-card">
                <div class="d-flex justify-content-between align-items-start gap-2">
                  <div>
                    <h6 class="text-light fw-bold mb-1 fs-5">{{ $producto->titulo }}</h6>
                    <p class="small mb-2" style="color:#E2E8F0 !important;">{{ $producto->descripcion }}</p>
                    <span class="text-info font-monospace fw-bold fs-6">${{ number_format($producto->precio, 2) }} USD</span>
                  </div>
                  <div>
                    <button type="button" 
                            class="btn btn-sm btn-outline-info agregar-btn font-monospace fw-bold"
                            data-id="{{ $producto->juegos_Id }}"
                            data-nombre="{{ $producto->titulo }}"
                            data-precio="{{ $producto->precio }}">
                      + Agregar al Carrito
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="calc-console">
        <div class="text-light font-monospace small mb-1 fw-bold">Total del Plan (Base + Disp. Extra)</div>
        <div class="text-light font-monospace fw-bold fs-2">$<span id="basePlanTotal">30.00</span><small class="fs-6" style="color:#CBD5E1;" id="basePlanPeriod">/mes</small></div>

        <div class="text-light font-monospace small mt-4 mb-2 fw-bold">Servicios Seleccionados en Carrito</div>
        <div class="cart-dropdown-custom">
          <div id="resumenProductos" class="small" style="color:#F1F5F9 !important;">No hay servicios agregados.</div>
        </div>

        <div class="console-warning" id="letterWarning">
          <strong>Notificación Legal:</strong> Se preparará la Carta de Autorización y Exención de Responsabilidad formal para la firma de la Representación Legal de la empresa.
        </div>

        <div class="mt-auto pt-3">
          <button type="button" class="btn btn-primary w-100 py-2 font-monospace fw-bold" data-bs-toggle="modal" data-bs-target="#modalPago" id="pagarBtn" disabled>
            Confirmar y Pagar
          </button>
        </div>
      </div>
    </div>
</div>

<!-- Modal de pago / Formulario POST -->
<div class="modal fade" id="modalPago" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('compras.store') }}" onsubmit="return enviarFormulario()">
            @csrf
            <div class="modal-content bg-dark text-light border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-monospace fw-bold">Contratación & Pago de Servicios</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="small" style="color:#E2E8F0 !important;">Ingresa las credenciales de pago para registrar la orden y generar tu Carta de Autorización / Factura PDF:</p>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label class="form-label small text-light font-monospace fw-bold">Nombre en la Tarjeta / Titular</label>
                            <input type="text" name="nombre_tarjeta" class="form-control form-control-sm bg-black text-light border-secondary" required value="{{ auth()->user()->nombre }}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label small text-light font-monospace fw-bold">Número de Tarjeta de Crédito / Débito</label>
                            <input type="text" name="numero_tarjeta" class="form-control form-control-sm bg-black text-light border-secondary" required maxlength="19" placeholder="4532-XXXX-XXXX-8901" oninput="formatearTarjeta(this)">
                        </div>

                        <div class="col-6 mb-2">
                            <label class="form-label small text-light font-monospace fw-bold">Vencimiento</label>
                            <input type="text" name="fecha_vencimiento" class="form-control form-control-sm bg-black text-light border-secondary" required placeholder="MM/AA">
                        </div>

                        <div class="col-6 mb-2">
                            <label class="form-label small text-light font-monospace fw-bold">CVV</label>
                            <input type="text" name="codigo_cvv" class="form-control form-control-sm bg-black text-light border-secondary" maxlength="4" required placeholder="123">
                        </div>
                    </div>

                    <!-- Hidden inputs -->
                    <input type="hidden" name="total" id="totalInput">
                    <div id="inputProductos"></div>

                    <div class="alert alert-info mt-3 mb-0 py-2 font-monospace small bg-black text-info border-info fw-bold">
                        Monto Total a Procesar: $<span id="modalSubtotal">0.00</span> USD
                    </div>
                </div>

                <div class="modal-footer border-secondary">
                    <button type="submit" class="btn btn-success font-monospace fw-bold">Procesar Orden y Descargar Carta PDF</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if(session('factura_blob'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const blob = atob("{{ session('factura_blob') }}");
            const arrayBuffer = new Uint8Array(blob.length);
            for (let i = 0; i < blob.length; i++) {
                arrayBuffer[i] = blob.charCodeAt(i);
            }

            const file = new Blob([arrayBuffer], { type: 'application/pdf' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(file);
            link.download = 'Carta_Autorizacion_Factura_SecureCode.pdf';
            link.click();

            fetch("{{ route('factura.limpiar') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        });
    </script>
@endif

<script>
    const resumenProductos = document.getElementById('resumenProductos');
    const totalInput = document.getElementById('totalInput');
    const inputProductosDiv = document.getElementById('inputProductos');
    const modalSubtotal = document.getElementById('modalSubtotal');
    const pagarBtn = document.getElementById('pagarBtn');

    let basePlanName = "Plan Básico PYME (5 Disp.)";
    let basePlanTotal = 30.00;
    let basePlanPeriod = "mes";
    let basePlanDesc = "Incluye protección base para 5 dispositivos.";

    const carrito = {};

    function initFromDraft() {
        const draft = localStorage.getItem('draftCart');
        if (draft) {
            try {
                const parsed = JSON.parse(draft);
                if (parsed.plan) {
                    basePlanName = parsed.plan;
                    basePlanTotal = parseFloat(parsed.precioTotal);
                    
                    if (basePlanName.includes("PYME")) {
                        basePlanPeriod = "mes";
                        basePlanDesc = parsed.extraDevices > 0 
                            ? `Incluye 5 dispositivos + ${parsed.extraDevices} adicionales.`
                            : "Incluye protección base para 5 dispositivos.";
                    } else if (basePlanName.includes("Público")) {
                        basePlanPeriod = "mes";
                        basePlanDesc = "Tarifa institucional regulada por LACAP.";
                    } else {
                        basePlanPeriod = "proyecto";
                        basePlanDesc = "Cotización inicial. Sujeto a auditoría.";
                    }
                }
            } catch (e) {}
        }
        
        document.getElementById('selectedPlanName').textContent = basePlanName;
        document.getElementById('selectedPlanPrice').textContent = "$" + basePlanTotal.toFixed(2);
        document.getElementById('selectedPlanType').textContent = "/ " + basePlanPeriod;
        document.getElementById('selectedPlanDesc').textContent = basePlanDesc;
        
        document.getElementById('basePlanTotal').textContent = basePlanTotal.toFixed(2);
        document.getElementById('basePlanPeriod').textContent = "/" + basePlanPeriod;
        
        updateCalculator();
    }

    function updateCalculator() {
        const reqLegal = document.getElementById('reqLegal').checked;
        const reqScope = document.getElementById('reqScope').checked;
        const reqEnvironments = document.getElementById('reqEnvironments').checked;
        const reqBackups = document.getElementById('reqBackups').checked;
        const reqPoc = document.getElementById('reqPoc').checked;

        const prereqCount = (reqLegal?1:0) + (reqScope?1:0) + (reqEnvironments?1:0) + (reqBackups?1:0) + (reqPoc?1:0);
        document.getElementById('prereqStatus').textContent = `${prereqCount} de 5 verificados`;

        let addonTotal = 0;
        let cartItemCount = 0;
        let resumenHTML = '';
        inputProductosDiv.innerHTML = '';

        const baseTotalInput = document.createElement('input');
        baseTotalInput.type = 'hidden';
        baseTotalInput.name = 'total_base';
        baseTotalInput.value = basePlanTotal;
        inputProductosDiv.appendChild(baseTotalInput);

        Object.entries(carrito).forEach(([id, item]) => {
            const sub = item.precio * item.cantidad;
            addonTotal += sub;
            cartItemCount += item.cantidad;

            resumenHTML += `
                <div class="d-flex justify-content-between align-items-center py-1 border-bottom border-secondary">
                    <span class="text-light" style="font-size:12.5px;">${item.nombre} x${item.cantidad}</span>
                    <span class="text-info font-monospace fw-bold" style="font-size:12.5px;">$${sub.toFixed(2)}</span>
                </div>
            `;

            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = `productos[${id}]`;
            hidden.value = item.cantidad;
            inputProductosDiv.appendChild(hidden);
        });

        resumenProductos.innerHTML = resumenHTML || '<span style="color:#E2E8F0 !important;">No hay servicios agregados.</span>';

        const grandTotal = basePlanTotal + addonTotal;
        totalInput.value = grandTotal.toFixed(2);
        modalSubtotal.textContent = grandTotal.toFixed(2);
        pagarBtn.disabled = grandTotal <= 0;

        let score = (prereqCount * 12) + (cartItemCount * 8) + 15;
        if(score > 100) score = 100;

        document.getElementById('maturityFill').style.width = `${score}%`;
        document.getElementById('maturityPercent').textContent = `${score}% · Madurez ${score >= 70 ? 'Avanzada' : 'Intermedia'}`;
    }

    document.querySelectorAll('.agregar-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const nombre = btn.dataset.nombre;
            const precio = parseFloat(btn.dataset.precio);

            if (!carrito[id]) {
                carrito[id] = { nombre, cantidad: 1, precio };
            } else {
                carrito[id].cantidad += 1;
            }
            updateCalculator();
        });
    });

    document.getElementById('reqLegal').addEventListener('change', updateCalculator);
    document.getElementById('reqScope').addEventListener('change', updateCalculator);
    document.getElementById('reqEnvironments').addEventListener('change', updateCalculator);
    document.getElementById('reqBackups').addEventListener('change', updateCalculator);
    document.getElementById('reqPoc').addEventListener('change', updateCalculator);

    document.addEventListener('DOMContentLoaded', () => {
        initFromDraft();
    });

    function enviarFormulario() {
        updateCalculator();
        return true;
    }

    function formatearTarjeta(input) {
        let valor = input.value.replace(/\D/g, '').substring(0, 16);
        valor = valor.replace(/(\d{4})(?=\d)/g, '$1-');
        input.value = valor;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
