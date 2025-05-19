# TECHing ARSA

**Portal modular y personal de Formación Profesional**  
Creado y mantenido por **Albert Arrebola** para organizar, experimentar y compartir materiales docentes de FP de forma profesional, moderna y totalmente flexible.

---

## ¿Qué es TECHing ARSA?

TECHing ARSA es mi espacio digital docente, construido sobre WordPress, que me permite:
- Crear y vincular módulos, resultados de aprendizaje (RA), recursos, evaluaciones y cualquier contenido formativo.
- Gestionar la estructura de todos mis cursos y prácticas en un único portal, con edición visual y máxima flexibilidad.
- Experimentar con nuevas metodologías, contenidos y formatos de entrega para mis alumnos.

---

## ¿Qué puedo hacer con este proyecto?

- Publicar y organizar **módulos** de cualquier ciclo o asignatura de FP.
- Crear resultados de aprendizaje (**RA**) para cada módulo, estructurándolos en secciones y bloques flexibles.
- Adjuntar vídeos, recursos descargables, ejercicios, enlaces externos y archivos a cada RA o módulo.
- Crear autoevaluaciones, quizzes y recursos relacionados.
- Presentar todo el contenido en un portal atractivo y responsive.

---

## Objetivos del proyecto

- Reunir toda mi docencia, prácticas y proyectos en una única plataforma digital.
- Probar y demostrar metodologías activas y flexibles usando WordPress como CMS de base.
- Facilitar la actualización y adaptación de materiales año tras año, con independencia del centro, ciclo, módulo o nivel.

---

## Stack y dependencias

- **WordPress** (CMS base)
- **UnderStrap** (tema padre, Bootstrap 4)
- **ACF PRO** (campos personalizados avanzados: repeater, oEmbed, etc.)
- **PHP 7.4+**
- **Bootstrap 4** (importante: todos los snippets, componentes y ejemplos usan Bootstrap 4)
- Plugins recomendados: Duplicate Post, WPForms

---

## Estructura principal del proyecto

- `/understrap-child/`
    - `/loop-templates/` (partials para módulos, RA, etc.)
    - `/global-templates/` (partials globales: hero, breadcrumbs, etc.)
    - `/scss/` (estilos personalizados)
    - `front-page.php`, `single.php`, `archive.php`, etc.

---

## Jerarquía de contenidos

- **Módulo**: materia/ciclo o asignatura principal.
- **RA (Resultado de Aprendizaje)**: vinculado a un módulo, estructurado en secciones (qué vamos a estudiar, desarrollo, vídeos, autoevaluación, etc).
- **Recursos** (opcional): archivos, links, multimedia, materiales adicionales.
- **Quiz** (opcional): autoevaluaciones o tests vinculados a RA.

---

## Ventajas del sistema

- 100% escalable: puedes crear nuevos ciclos, módulos o niveles fácilmente.
- Todo el contenido es modular, personalizable y reutilizable.
- La edición es visual y amigable, incluso para docentes sin conocimientos técnicos avanzados.
- Compatible con cualquier entorno WordPress, local o en la nube.

---

## Instalación y primeros pasos

1. Clona este repositorio en `/wp-content/themes/`:
'''
git clone https://github.com/tuusuario/TECHing-ARSA.git
'''
2. Instala y activa el tema hijo desde el panel de WordPress.
3. Activa el tema padre **UnderStrap** si no está ya activo.
4. Importa los grupos de campos ACF desde **ACF > Herramientas > Importar JSON**.
5. Configura en **Ajustes > Lectura** que la portada sea una página estática.
6. Empieza a crear tus módulos y RA desde el panel de WordPress.

---

## Edición de contenidos y flujo de trabajo

- Para cada ciclo, crea un módulo desde el menú lateral.
- Para cada módulo, crea los RA asociados (resultados de aprendizaje) y vincúlalos al módulo correspondiente.
- Rellena los campos y secciones de cada RA (estructura fija + desarrollo flexible con repeaters).
- Puedes añadir recursos y quizzes vinculados a cada RA si lo deseas.
- La portada y la ficha de cada módulo o RA se muestran automáticamente con la estructura y estilos definidos.

---

## Notas técnicas

- **Todos los snippets de código, tabs, acordeones y grids están en Bootstrap 4** para máxima compatibilidad con UnderStrap y tu stack.
- Para personalizar estilos, usa `/scss/` y compila a `style.css`.
- Puedes modificar los partials para personalizar la experiencia o adaptarla a otros cursos, ciclos, etc.

---

## Contacto y autoría

Creado por **Albert Arrebola**  
Proyecto personal y experimental para FP y docencia digital.

---
