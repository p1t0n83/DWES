<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre_imagen' => '978-1520363462',
                'titulo' => 'Aprende SQL en un fin de semana: El curso definitivo para crear y consultar bases de datos',
                'slug' => Str::slug('Aprende SQL en un fin de semana: El curso definitivo para crear y consultar bases de datos'),
                'descripcion' => "El curso de SQL definitivo en español.\nSin necesidad de conocimientos previos. Aprende a manipular y consultar bases de datos de forma rápida y sencilla.\n¿Estás desarrollando una web y quieres utilizar MySQL para almacenar información? ¿estás estudiando y se te atraganta la asignatura de base de datos? ¿quieres aprender SQL para mejorar tu currículum o dar un giro a tu vida laboral? o ¿símplemente tienes curiosidad por conocer este lenguaje y sus posibilidades? A todos vosotros bienvenidos, habéis dado con el libro adecuado.\nMás de 100 sentencias de ejemplo, numerosos ejercicios y temas adicionales con los que aprenderás todo lo necesario para utilizar SQL en tus proyectos profesionales.",
                'precio' => 15,
                'familia' => 'BBDD',
            ],
            [
                'nombre_imagen' => '978-1521889619',
                'titulo' => 'Aprende Git: ... y, de camino, GitHub',
                'slug' => Str::slug('Aprende Git: ... y, de camino, GitHub'),
                'descripcion' => "git es un sistema de control de versiones distribuido, que dicho así suena geek y aburrido, pero que en la práctica es una forma de trabajar en equipo ha revolucionado el desarrollo de aplicaciones informáticas y, en general, se crea cualquier proyecto en el que tengan que intervenir una o varias personas. Esencialmente, git permite que un equipo trabaje concurrentemente y de forma segura sobre un conjunto de ficheros de texto, pero desde el kernel del sistema operativo Linux, para el que desarrolló originalmente, hoy en día se ha extendido a la mayoría de las aplicaciones libres y eventualmente al resto de las aplicaciones, donde está sustituyendo a otros sistemas de versiones centralizados como subversion o CVS o distribuidos como Mercurial o Bazaar. git es rápido, seguro, y tiene gran cantidad de posibilidades de alojamiento tanto gratuitos (GitHub, Bitbucket, o auto-alojados como GitLab o Gitorious) como de pago.",
                'precio' => 20,
                'familia' => 'Programacion',
            ],
            [
                'nombre_imagen' => '978-1547142866',
                'titulo' => 'Pentesting con Kali: Aprende a dominar la herramienta Kali de pentesting, hacking y auditorías activas de seguridad',
                'slug' => Str::slug('Pentesting con Kali: Aprende a dominar la herramienta Kali de pentesting, hacking y auditorías activas de seguridad'),
                'descripcion' => "Aprende la profesión de pentester, y a dedicarte al hacking ético.\nKali es una distribución de Linux que contiene centenares de herramientas para hacer pentesting (auditoría de seguridad con test de intrusión), una parte fundamental del hacking ético.\nLos tests de penetración corresponden con auditorías de seguridad proactivas, en las que el auditor analiza la seguridad de un sistema verificando in situ si el sistema es vulnerable. Para ello, después de la firma de los respectivos contratos y autorizaciones, el auditor ataca la infraestructura de red y los servidores con objeto de validar si son vulnerables a ataques concretos conocidos por la comunidad de seguridad.",
                'precio' => 30,
                'familia' => 'Seguridad',
            ],
        ]);
    }
}