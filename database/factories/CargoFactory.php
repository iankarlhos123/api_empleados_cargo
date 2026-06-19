<?php

namespace Database\Factories;

use App\Models\Cargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cargo>
 */
class CargoFactory extends Factory
{
    protected $model = Cargo::class;

    private static int $index = 0;

    public function definition(): array
    {
        $cargos = [
            [
                'nombre' => 'Desarrollador Backend',
                'descripcion' => 'Responsable de la lógica de negocio del lado del servidor y la integración de bases de datos.',
            ],
            [
                'nombre' => 'Desarrollador Frontend',
                'descripcion' => 'Encargado de la interfaz de usuario, interactividad y diseño visual en aplicaciones web.',
            ],
            [
                'nombre' => 'Administrador de Sistemas',
                'descripcion' => 'Gestiona la configuración, mantenimiento y funcionamiento confiable de servidores.',
            ],
            [
                'nombre' => 'Analista de Datos',
                'descripcion' => 'Interpreta datos complejos para ayudar a la toma de decisiones estratégicas de la empresa.',
            ],
            [
                'nombre' => 'Diseñador UX/UI',
                'descripcion' => 'Crea interfaces intuitivas, atractivas y centradas en la mejor experiencia de usuario.',
            ],
            [
                'nombre' => 'Gerente de Proyecto',
                'descripcion' => 'Planifica, ejecuta y coordina proyectos asegurando el cumplimiento de plazos y presupuesto.',
            ],
            [
                'nombre' => 'Soporte Técnico',
                'descripcion' => 'Brinda asistencia a usuarios finales y resuelve incidencias de hardware y software.',
            ],
            [
                'nombre' => 'Administrador de Bases de Datos',
                'descripcion' => 'Asegura la disponibilidad, rendimiento y seguridad de los sistemas de bases de datos.',
            ],
            [
                'nombre' => 'Ingeniero de Seguridad',
                'descripcion' => 'Diseña e implementa medidas de seguridad para proteger redes y sistemas de ciberataques.',
            ],
            [
                'nombre' => 'Especialista en SEO',
                'descripcion' => 'Mejora el posicionamiento orgánico del sitio web en los motores de búsqueda principales.',
            ],
            [
                'nombre' => 'Redactor de Contenidos',
                'descripcion' => 'Genera textos persuasivos y de calidad para blogs, sitios web y material de marketing.',
            ],
            [
                'nombre' => 'Community Manager',
                'descripcion' => 'Gestiona y desarrolla la comunidad online de la marca en diferentes redes sociales.',
            ],
            [
                'nombre' => 'Ejecutivo de Ventas',
                'descripcion' => 'Identifica oportunidades comerciales, realiza negociaciones y cierra ventas de servicios.',
            ],
            [
                'nombre' => 'Director de Tecnología (CTO)',
                'descripcion' => 'Lidera la estrategia tecnológica global y supervisa los departamentos de ingeniería.',
            ],
            [
                'nombre' => 'Scrum Master',
                'descripcion' => 'Facilita las metodologías ágiles dentro de los equipos de desarrollo eliminando impedimentos.',
            ],
            [
                'nombre' => 'Ingeniero QA (Calidad de Software)',
                'descripcion' => 'Diseña planes de prueba y detecta fallos para asegurar la calidad del producto de software.',
            ],
            [
                'nombre' => 'Especialista en Recursos Humanos',
                'descripcion' => 'Gestiona el reclutamiento, selección, inducción y desarrollo del personal interno.',
            ],
            [
                'nombre' => 'Analista Financiero',
                'descripcion' => 'Evalúa datos financieros para recomendar inversiones, presupuestos y control de costos.',
            ],
            [
                'nombre' => 'Coordinador de Marketing',
                'descripcion' => 'Ejecuta campañas promocionales y gestiona las relaciones con medios y agencias.',
            ],
            [
                'nombre' => 'Arquitecto de Software',
                'descripcion' => 'Diseña la estructura técnica de alto nivel de los sistemas de software de la empresa.',
            ],
            [
                'nombre' => 'Diseñador Gráfico',
                'descripcion' => 'Crea conceptos visuales para comunicar ideas que inspiren, informen o cautiven al público.',
            ],
            [
                'nombre' => 'Especialista en Cloud Computing',
                'descripcion' => 'Diseña y administra infraestructuras y servicios en la nube de forma eficiente.',
            ],
            [
                'nombre' => 'Ingeniero DevOps',
                'descripcion' => 'Automatiza y optimiza los procesos de integración y despliegue continuo de software.',
            ],
            [
                'nombre' => 'Analista de Negocios',
                'descripcion' => 'Identifica necesidades empresariales y propone soluciones tecnológicas y operativas efectivas.',
            ],
            [
                'nombre' => 'Abogado Corporativo',
                'descripcion' => 'Asesora a la empresa en asuntos legales, contratos, regulaciones y propiedad intelectual.',
            ],
            [
                'nombre' => 'Contador General',
                'descripcion' => 'Lleva el registro detallado de las operaciones financieras, impuestos y balances contables.',
            ],
            [
                'nombre' => 'Especialista en Atención al Cliente',
                'descripcion' => 'Resuelve dudas, quejas y consultas de clientes garantizando su satisfacción.',
            ],
            [
                'nombre' => 'Director de Finanzas (CFO)',
                'descripcion' => 'Supervisa la estrategia financiera, gestión de riesgos y flujos de caja de la organización.',
            ],
            [
                'nombre' => 'Director de Operaciones (COO)',
                'descripcion' => 'Diseña y supervisa las operaciones diarias y procesos internos de la empresa.',
            ],
            [
                'nombre' => 'Gerente de Producto',
                'descripcion' => 'Define la visión, estrategia y ciclo de vida de un producto específico en el mercado.',
            ],
            [
                'nombre' => 'Especialista en E-commerce',
                'descripcion' => 'Administra y optimiza el canal de ventas online para aumentar la conversión y facturación.',
            ],
            [
                'nombre' => 'Científico de Datos',
                'descripcion' => 'Aplica modelos estadísticos y algoritmos de aprendizaje automático para predecir comportamientos.',
            ],
            [
                'nombre' => 'Ingeniero de Datos',
                'descripcion' => 'Construye y mantiene las tuberías de datos (pipelines) para su almacenamiento y procesamiento.',
            ],
            [
                'nombre' => 'Traductor Técnico',
                'descripcion' => 'Traduce manuales, documentación de software y material técnico garantizando precisión terminológica.',
            ],
            [
                'nombre' => 'Especialista en Publicidad Digital',
                'descripcion' => 'Diseña, configura y optimiza campañas de anuncios de pago en Google, Meta y otros.',
            ],
            [
                'nombre' => 'Ingeniero de Automatización',
                'descripcion' => 'Desarrolla scripts y sistemas para automatizar tareas repetitivas de IT y producción.',
            ],
            [
                'nombre' => 'Asistente Ejecutivo',
                'descripcion' => 'Proporciona soporte administrativo directo a la alta dirección y organiza agendas corporativas.',
            ],
            [
                'nombre' => 'Especialista en Compras',
                'descripcion' => 'Negocia con proveedores la adquisición de bienes y servicios al mejor costo y calidad.',
            ],
            [
                'nombre' => 'Especialista en Relaciones Públicas',
                'descripcion' => 'Construye y mantiene una imagen pública positiva para la organización o clientes.',
            ],
            [
                'nombre' => 'Auditor Interno',
                'descripcion' => 'Evalúa la eficacia de los controles internos, gestión de riesgos y cumplimiento de normativas.',
            ],
        ];

        $cargo = $cargos[self::$index % count($cargos)];
        self::$index++;

        return [
            'nombre_cargo' => $cargo['nombre'],
            'descripcion' => $cargo['descripcion'],
        ];
    }
}
