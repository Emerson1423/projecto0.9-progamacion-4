<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta — SECURE CODE S.A.S. de C.V.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --bg: #0d1120;
            --bg-1: #121626;
            --bg-2: #161c33;
            --bg-3: #1b2240;
            --primary: #0047AB;
            --accent: #00E5FF;
            --interact: #3377FF;
            --border: #2b3350;
            --white: #FFFFFF;
            --text-high: #F8FAFC;
            --text-sub: #E2E8F0;
            --font-display: 'Space Grotesk', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body {
            background: var(--bg);
            color: var(--white);
            font-family: var(--font-body);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px 0;
        }

        .auth-container {
            width: 100%;
            max-width: 920px;
            background: var(--bg-1);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .auth-left {
            background: linear-gradient(135deg, var(--bg-2), var(--bg-3));
            padding: 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-right: 1px solid var(--border);
        }

        .auth-right {
            padding: 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-logo { width: 46px; height: 46px; margin-bottom: 16px; }
        .eyebrow {
            font-family: var(--font-mono);
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--accent);
        }

        .form-label {
            color: var(--text-high) !important;
            font-weight: 600;
            font-size: 13.5px;
            margin-bottom: 4px;
        }

        .form-control {
            background: var(--bg-2) !important;
            border: 1px solid var(--border) !important;
            color: var(--white) !important;
            padding: 10px 12px;
            font-size: 14px;
        }
        .form-control::placeholder {
            color: #94A3B8 !important;
        }
        .form-control:focus {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 2px rgba(0,229,255,0.2) !important;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--interact), var(--primary));
            border: none;
            color: var(--white);
            font-family: var(--font-mono);
            font-size: 14.5px;
            font-weight: 600;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,71,171,0.45);
            color: var(--white);
        }

        a { color: var(--accent); text-decoration: none; font-weight: 500; }
        a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .auth-container { grid-template-columns: 1fr; max-width: 450px; }
            .auth-left { display: none; }
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-left">
        <svg class="brand-logo" viewBox="0 0 100 100" fill="none">
          <path d="M50 8L15 24V50C15 70 30 87 50 94C70 87 85 70 85 50V24L50 8Z" stroke="#00E5FF" stroke-width="6" fill="#121626"/>
          <rect x="42" y="66" width="16" height="14" rx="3" fill="#00E5FF"/>
        </svg>
        <span class="eyebrow">Firma Salvadoreña de Ciberseguridad</span>
        <h2 class="text-light mt-2" style="font-family:var(--font-display);">SECURE<b style="color:var(--accent);">CODE</b></h2>
        <p class="mb-4" style="color:var(--text-sub); font-size:15px;">Registra tu cuenta corporativa para armar paquetes de auditoría y contratar servicios.</p>
        <div class="small font-monospace" style="color:var(--text-sub);">
          <div class="mb-1"><i class="bi bi-geo-alt text-info me-2"></i> San Miguel Centro & Ciudad Barrios</div>
        </div>
    </div>

    <div class="auth-right">
        <h3 class="text-light mb-1" style="font-family:var(--font-display);">Crear Cuenta</h3>
        <p class="mb-3" style="color:var(--text-sub); font-size:14px;">Ingresa tus datos para registrar tu usuario.</p>

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf
            
            <div class="mb-2">
                <label class="form-label font-monospace">Nombre Completo / Empresa</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Ej. Juan Pérez (Comercio SV)" required>
                @error('nombre')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-2">
                <label class="form-label font-monospace">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="contacto@empresa.sv" required>
                @error('email')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-2">
                <label class="form-label font-monospace">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                @error('password')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label font-monospace">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-primary-custom mb-3">Registrar e Iniciar</button>
            <p class="text-center small m-0" style="color:var(--text-sub);">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
            </p>
            <p class="text-center small mt-2 m-0">
                <a href="{{ route('inicio') }}">Volver al Inicio</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>