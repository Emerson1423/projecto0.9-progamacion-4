<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Insertar Roles
        DB::table('roles')->insert([
            ['rol_Id' => 1, 'nombrerol' => 'SuperAdmin', 'created_at' => now(), 'updated_at' => now()],
            ['rol_Id' => 2, 'nombrerol' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['rol_Id' => 3, 'nombrerol' => 'Cliente', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Insertar Usuarios por Defecto con los nombres permitidos
        DB::table('usuarios')->insert([
            [
                'usuario_Id' => 1,
                'nombre' => 'VARGAS DÍAZ, JAVIER ALEXANDER',
                'email' => 'emerson@gmail.com',
                'password' => Hash::make('12345678'),
                'rol_Id' => 2, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_Id' => 2,
                'nombre' => 'ALFREDO EZEQUIEL MEDRANO MARTINEZ',
                'email' => 'alfredomedrano678@gmail.com',
                'password' => Hash::make('12345678'),
                'rol_Id' => 3, // Cliente
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 3. Insertar Categorías de Servicios de Ciberseguridad
        DB::table('categoria')->insert([
            ['categoria_Id' => 1, 'nombre' => 'Auditoría de Procesos y Lógica', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_Id' => 2, 'nombre' => 'Pentesting e Intrusión Controlada', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_Id' => 3, 'nombre' => 'Ingeniería de Software Seguro', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_Id' => 4, 'nombre' => 'Hardening y Bastionado', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_Id' => 5, 'nombre' => 'Monitoreo Continuo SOC 24/7', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_Id' => 6, 'nombre' => 'Dictámenes y Evaluación de Terceros', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 4. Insertar Plataformas Evaluadas
        DB::table('plataformas')->insert([
            ['plataforma_Id' => 1, 'nombrePlataforma' => 'Plataformas y Aplicaciones Web', 'created_at' => now(), 'updated_at' => now()],
            ['plataforma_Id' => 2, 'nombrePlataforma' => 'Infraestructura Red y Cloud (AWS/Azure)', 'created_at' => now(), 'updated_at' => now()],
            ['plataforma_Id' => 3, 'nombrePlataforma' => 'Servidores y Sistemas de Negocio', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 5. Insertar Proveedores (Sedes de SECURE CODE)
        DB::table('proveedores')->insert([
            [
                'proveedor_Id' => 1,
                'nombre' => 'SECURE CODE S.A.S. de C.V. (Oficina Principal)',
                'direcciom' => 'Plaza Jardín, Local #10, Calle Los Almendros, San Miguel Centro, San Miguel',
                'telefono' => '7525-4863',
                'correo' => 'vargasjavier26@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'proveedor_Id' => 2,
                'nombre' => 'SECURE CODE S.A.S. de C.V. (Sucursal Ciudad Barrios)',
                'direcciom' => 'Plaza El Calvario, Local N.° 20, 1.ª Calle Poniente, Ciudad Barrios, San Miguel Norte',
                'telefono' => '7525-4863',
                'correo' => 'vargasjavier26@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 6. Insertar los 6 Servicios Oficiales de Ciberseguridad (Tabla juegos)
        DB::table('juegos')->insert([
            [
                'juegos_Id' => 1,
                'titulo' => 'Auditoría de Lógica de Negocio y Flujos Digitales',
                'descripcion' => 'Identificación de vulnerabilidades en procesos operativos, flujos de transacciones y toma de decisiones automatizadas.',
                'precio' => 300.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-logica.png',
                'plataforma_Id' => 1,
                'categoria_Id' => 1,
                'proveedor_Id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'juegos_Id' => 2,
                'titulo' => 'Auditoría Técnica y Pentesting de Infraestructura',
                'descripcion' => 'Pruebas de penetración e intrusión controlada sobre redes, servidores expuestos y plataformas corporativas.',
                'precio' => 450.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-pentest.png',
                'plataforma_Id' => 2,
                'categoria_Id' => 2,
                'proveedor_Id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'juegos_Id' => 3,
                'titulo' => 'Ingeniería de Software Seguro (OWASP / ISO 27001)',
                'descripcion' => 'Diseño, análisis estático/dinámico de código y revisión de arquitectura conforme a estándares internacionales de seguridad.',
                'precio' => 350.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-software.png',
                'plataforma_Id' => 1,
                'categoria_Id' => 3,
                'proveedor_Id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'juegos_Id' => 4,
                'titulo' => 'Hardening y Bastionado de Entornos de Despliegue',
                'descripcion' => 'Configuración de seguridad avanzada y mitigación de puertos/brechas en servidores Linux/Windows y contenedores.',
                'precio' => 250.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-hardening.png',
                'plataforma_Id' => 3,
                'categoria_Id' => 4,
                'proveedor_Id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'juegos_Id' => 5,
                'titulo' => 'Plataforma de Monitoreo Continuo y Detección de Incidentes (SOC)',
                'descripcion' => 'Supervisión 24/7 con alertas tempranas, respuesta activa a amenazas y reporte de disponibilidad del 99.8%.',
                'precio' => 500.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-soc.png',
                'plataforma_Id' => 2,
                'categoria_Id' => 5,
                'proveedor_Id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'juegos_Id' => 6,
                'titulo' => 'Evaluación y Dictamen Técnico de Software de Terceros',
                'descripcion' => 'Auditoría integral y certificación de riesgo de librerías, conectores y software de proveedores externos.',
                'precio' => 400.00,
                'cantidad_dispo' => 50,
                'imagen' => 'images/service-terceros.png',
                'plataforma_Id' => 1,
                'categoria_Id' => 6,
                'proveedor_Id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
