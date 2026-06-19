<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\FuncionCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuncionCargo>
 */
class FuncionCargoFactory extends Factory
{
    protected $model = FuncionCargo::class;

    public function definition(): array
    {
        $funciones = [
            'Desarrollar nuevas características y módulos de software.',
            'Diseñar y documentar la arquitectura técnica del sistema.',
            'Optimizar el rendimiento y escalabilidad de las aplicaciones.',
            'Implementar pruebas unitarias y de integración automáticas.',
            'Colaborar en la definición de requisitos con el equipo de producto.',
            'Brindar soporte técnico y resolver incidencias reportadas.',
            'Monitorear el estado de los servidores y servicios en producción.',
            'Analizar el comportamiento de los usuarios para mejorar la interfaz.',
            'Diseñar interfaces visuales atractivas y coherentes con la marca.',
            'Escribir código limpio, mantenible y bien documentado.',
            'Administrar copias de seguridad e integridad de la base de datos.',
            'Revisar el código de otros miembros del equipo (code review).',
            'Configurar canalizaciones de integración y despliegue continuo (CI/CD).',
            'Documentar las APIs y guías de desarrollo técnico.',
            'Participar en las reuniones diarias y de planificación del equipo.',
            'Investigar y proponer nuevas tecnologías y metodologías de trabajo.',
            'Capacitar a nuevos miembros del equipo en los procesos internos.',
            'Asegurar la compatibilidad multidispositivo y multinavegador.',
            'Implementar medidas de seguridad y cifrado de datos sensibles.',
            'Diseñar la estrategia de marketing y publicidad digital.',
            'Gestionar la comunicación y relaciones con proveedores externos.',
            'Analizar métricas financieras y preparar informes presupuestarios.',
            'Traducir manuales técnicos y material publicitario de la empresa.',
            'Planificar auditorías internas de seguridad y cumplimiento normativo.',
            'Organizar eventos corporativos y reuniones con clientes clave.',
            'Crear y optimizar contenido para redes sociales y el blog de la empresa.',
            'Gestionar contratos, nóminas y control de asistencia laboral.',
            'Diseñar y ejecutar casos de prueba manuales y automatizados.',
            'Administrar el flujo de caja e impuestos mensuales.',
            'Asesorar a la alta dirección en la toma de decisiones legales.',
        ];

        return [
            'descripcion_funcion' => $this->faker->randomElement($funciones),
            'estado' => true,
            'id_cargo' => Cargo::factory(),
        ];
    }
}
