<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <title>Carta de Autorización y Factura — SECURE CODE S.A.S. de C.V.</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11.5px;
            color: #1e293b;
            margin: 0;
            padding: 24px;
            line-height: 1.5;
        }
        .header-table {
            width: 100%;
            border-bottom: 2px solid #0047AB;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .company-title {
            font-size: 16px;
            font-weight: bold;
            color: #0047AB;
            margin: 0 0 4px;
        }
        .company-sub {
            font-size: 10px;
            color: #475569;
            margin: 0;
        }
        .doc-title {
            text-align: right;
            font-size: 13px;
            font-weight: bold;
            color: #ffffff;
            background: #0d1120;
            padding: 8px 12px;
            border-radius: 4px;
        }
        .section-title {
            font-size: 11.5px;
            font-weight: bold;
            color: #0047AB;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 4px;
            margin-top: 18px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .info-table {
            width: 100%;
            margin-bottom: 16px;
        }
        .info-table td {
            padding: 4px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .items-table th {
            background-color: #121626;
            color: #ffffff;
            padding: 8px;
            font-size: 10.5px;
            text-align: left;
        }
        .items-table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 8px;
            font-size: 10.5px;
        }
        .total-box {
            text-align: right;
            font-size: 13.5px;
            font-weight: bold;
            color: #0047AB;
            margin-top: 10px;
        }
        .legal-box {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 12px;
            border-radius: 4px;
            font-size: 9px;
            line-height: 1.45;
            color: #334155;
            margin-top: 16px;
        }
        .signatures {
            margin-top: 36px;
            width: 100%;
        }
        .signature-cell {
            width: 50%;
            text-align: center;
            font-size: 9.5px;
        }
        .signature-line {
            width: 70%;
            border-top: 1px solid #000000;
            margin: 0 auto 6px;
        }
    </style>
</head>
<body>

<table class="header-table">
    <tr>
        <td>
            <div class="company-title">SECURE CODE S.A.S. de C.V.</div>
            <div class="company-sub">Ingeniería de Software Seguro y Ciberseguridad en El Salvador</div>
            <div class="company-sub">Oficina Principal: Plaza Jardín, Local #10, Calle Los Almendros, San Miguel Centro</div>
        </td>
        <td style="vertical-align: top;">
            <div class="doc-title">ORDEN DE SERVICIO #{{ $orden->orden_Id }}</div>
            <div style="text-align: right; font-size: 9.5px; color: #64748b; margin-top: 4px;">
                Fecha de Emisión: {{ now()->format('d/m/Y H:i') }}
            </div>
        </td>
    </tr>
</table>

<div class="section-title">Datos del Cliente y Contratación</div>
<table class="info-table">
    <tr>
        <td width="22%"><strong>Cliente / Titular:</strong></td>
        <td>{{ $orden->usuario->nombre }}</td>
        <td width="22%"><strong>Correo Electrónico:</strong></td>
        <td>{{ $orden->usuario->email }}</td>
    </tr>
    <tr>
        <td><strong>Representante Legal:</strong></td>
        <td>CARLOS GÓMEZ</td>
        <td><strong>Método de Pago:</strong></td>
        <td>Tarjeta de Crédito / Débito (En línea)</td>
    </tr>
</table>

<div class="section-title">Detalle de Servicios de Ciberseguridad Contratados</div>
<table class="items-table">
    <thead>
        <tr>
            <th>Servicio / Objeto Social</th>
            <th width="12%" style="text-align: center;">Cantidad</th>
            <th width="18%" style="text-align: right;">Precio Unitario</th>
            <th width="18%" style="text-align: right;">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orden->pedidos as $pedido)
        <tr>
            <td>
                <strong>{{ $pedido->juego->titulo }}</strong><br>
                <span style="font-size: 9px; color: #64748b;">{{ $pedido->juego->descripcion }}</span>
            </td>
            <td style="text-align: center;">{{ $pedido->cantidad }}</td>
            <td style="text-align: right;">${{ number_format($pedido->precio_unitario, 2) }} USD</td>
            <td style="text-align: right;">${{ number_format($pedido->cantidad * $pedido->precio_unitario, 2) }} USD</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="total-box">
    MONTO TOTAL CONTRATADO: ${{ number_format($orden->total, 2) }} USD
</div>

<div class="section-title">Carta de Autorización Expresa</div>
<div class="legal-box">
    <strong>DECLARACIÓN DE AUTORIZACIÓN Y CONFORMIDAD JURÍDICA:</strong><br>
    Por medio del presente documento, el Cliente arriba identificado autoriza expresamente a <strong>SECURE CODE S.A.S. de C.V.</strong> para ejecutar las pruebas de penetración, auditorías de lógica de negocio, ingeniería de software seguro y bastionado de entornos descritos en el detalle de servicios. SECURE CODE S.A.S. de C.V. garantiza la estricta confidencialidad de la información bajo acuerdo NDA.
</div>

<table class="signatures">
    <tr>
        <td class="signature-cell">
            <div class="signature-line"></div>
            <strong>CARLOS GÓMEZ</strong><br>
            Representante Legal<br>
            SECURE CODE S.A.S. de C.V.
        </td>
        <td class="signature-cell">
            <div class="signature-line"></div>
            <strong>{{ $orden->usuario->nombre }}</strong><br>
            Cliente / Representante Conforme<br>
            Firma Expresa de Autorización
        </td>
    </tr>
</table>

</body>
</html>
