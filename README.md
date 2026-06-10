# Blueprint del Proyecto: Remodel North Texas + KNX Shell 

  
## 1. Contexto general 


Estamos construyendo una plataforma llamada **Remodel North Texas** dentro de una arquitectura WordPress modular. La visión no es crear solamente un sitio web de remodelación, sino una plataforma escalable para compañías locales de home services.

  

El sistema debe poder manejar en el futuro:

  

* Empresas o vendors usando el concepto de `hub`.

* Leads.

* Estimaciones.

* Clientes.

* Trabajos.

* Facturas.

* Pagos.

* Portales internos.

* Operaciones por compañía.

* Un marketplace o directorio de servicios.

* Una experiencia frontend moderna para homeowners.



La arquitectura base viene de una visión más amplia llamada **KNX / Kingdom Nexus**, donde WordPress funciona principalmente como contenedor, y la lógica del negocio vive en plugins modulares.



## 2. Filosofía técnica



El proyecto debe mantenerse modular, reutilizable y preparado para crecer.



Reglas importantes:



* WordPress es el contenedor, no el centro de la lógica.

* La lógica debe vivir en plugins.

* No hardcodear contenido específico si el módulo debe ser global.

* Usar siempre `$wpdb->prefix` cuando haya base de datos.

* No usar `wp_footer`, porque ya causó problemas con el navbar.

* Preferimos inyectar assets desde el plugin cuando el proyecto actual lo requiera.

* Todo código debe estar preparado para ser reutilizado en otros productos, no solo en Remodel North Texas.

* Las respuestas o comentarios dentro del código deben ir en inglés.

* El UI debe ser mobile-first.

* No usar emojis como parte de la UI; si se necesitan iconos, usar Font Awesome u otro CDN.



## 3. Qué es KNX Shell



Antes de entrar directamente a Remodel North Texas, estamos creando un plugin global llamado **KNX Shell**.



KNX Shell es el sistema visual global para renderizar el navbar, drawer móvil, branding, menú, submenús, colores, botones y layout general.



Este plugin debe ser reutilizable para varios tipos de proyectos:



* Remodelación.

* Marketplace.

* CRM.

* Taxis.

* Directorios.

* Portales internos.

* Plataformas multi-vendor.



Por eso, aunque el diseño fue inspirado por Remodel North Texas, el plugin no debe contener texto hardcoded como “Get Estimate”, “North Texas Remodeling”, “Services” específicos de remodelación, etc.



Todo debe ser editable desde el admin panel de WordPress.



## 4. Estado actual de KNX Shell



Ya se construyó un navbar global con un diseño **Solid Pro** que nos gustó mucho visualmente.



El diseño actual tiene:



* Navbar azul sólido/gradient.

* Logo grande.

* Desktop navbar horizontal.

* Menú centrado.

* Acción secundaria opcional.

* Botón CTA tipo pill.

* Mobile navbar con logo centrado.

* Hamburger toggle.

* Drawer móvil lateral o tipo bottom sheet.

* Menús y submenús dinámicos.

* Branding editable.

* Colores editables.

* Logo editable.

* Tamaños de logo editables.

* Estilos de hamburger seleccionables.

* Theme colors editables.

* Secciones del admin panel colapsables.

* Botones de Save independientes por sección.

* Scroll preservado después de guardar.



## 5. Archivos principales del plugin KNX Shell



Los archivos principales que estamos trabajando son:



```text

knx-shell.php

inc/functions/helpers.php

inc/modules/admin/admin-settings.php

inc/modules/admin/admin-style.css

inc/modules/admin/admin-script.js

inc/modules/navbar/navbar.php

inc/modules/navbar/navbar-style.css

inc/modules/navbar/navbar-script.js

```



El archivo `knx-shell.php` carga los helpers y el módulo navbar.



El theme debe llamar manualmente:



```php

if (function_exists('knx_shell_render_navbar')) {

    knx_shell_render_navbar();

}

```



Esto se coloca normalmente en `header.php`, después de:



```php

<div id="page" class="site">

```



## 6. Admin Dashboard de KNX Shell



El admin panel debe sentirse como un builder real, no como una lista larga de inputs.



Tiene secciones:



* Overview.

* Branding.

* Menu Builder.

* Header Actions.

* Mobile Drawer.

* Theme Colors.

* Advanced.



Cada sección debe poder colapsarse y tener su propio botón de guardar.



Esto se hizo porque el panel ya estaba creciendo demasiado y era incómodo tener que hacer scroll hasta el final para guardar.



## 7. Menu Builder



El Menu Builder permite crear menús y submenús desde el admin.



Cada menu item puede tener:



* Label.

* URL.

* Icon class.

* Priority.

* Visibility.

* Placement.

* Target.

* Children/submenus.



Visibility puede ser:



* All.

* Logged In.

* Logged Out.



Placement puede ser:



* All.

* Desktop Only.

* Drawer Only.



Target puede ser:



* Same Tab.

* New Tab.



Los submenus pueden tener:



* Label.

* URL.

* Icon class.

* Target.



La estructura se guarda dentro de `knx_shell_settings['menu_items']`.



## 8. Header Actions



El navbar tiene dos tipos de acción:



### Action secundaria



Ejemplo:



```text

Contact

Call Us

Support

Book

```



Campos:



* Action Label.

* Action URL.

* Action Icon.

* Action Style.



Styles:



* Text.

* Pill.

* Hidden.



### CTA principal



Actualmente queremos que el CTA sea **Login**, no **Get Estimate**.



Defaults actuales correctos:



```text

CTA Label: Login

CTA URL: /login

CTA Icon: fa-solid fa-arrow-right-to-bracket

CTA Style: Light

```



También se agregó migración/fallback para que si encuentra valores legacy como:



```text

Get Estimate

Get Started

```



los convierta a:



```text

Login

/login

fa-solid fa-arrow-right-to-bracket

```



Esto debe aplicar tanto en desktop como en mobile drawer.



## 9. Branding



El branding permite editar:



* Brand Name.

* App Label.

* Initials.

* Logo URL.

* Home URL.

* Desktop Logo Height.

* Mobile Logo Height.

* Logo Max Width.



También se agregó configuración para el logo del drawer móvil:



* Drawer Logo Size.

* Drawer Logo Background.

* Drawer Logo Text.



El texto fallback “Navigation” fue eliminado. Si `app_label` está vacío, no debe mostrarse ningún subtítulo bajo el brand en el drawer.



## 10. Mobile Drawer



El mobile drawer muestra:



* Logo o initials.

* Brand name.

* App label solo si existe.

* Close button.

* Menús.

* Submenús.

* Action secundaria si está activa.

* CTA principal Login si está activo.



El drawer logo holder debe ser editable en tamaño y color.



## 11. Hamburger Toggle



El hamburger debe ser de **3 líneas**, no 2.



Estados:



* Cerrado: 3 líneas.

* Abierto: la primera y tercera forman una X, la línea central desaparece.



Hay varios estilos seleccionables desde admin:



* Basic Lines.

* Glass Box.

* Minimal Circle.

* Solid Button.



El estilo default recomendado es:



```text

Basic Lines

```



## 12. Theme Colors



La sección Theme Colors controla:



Core:



* Primary.

* Accent.

* Navbar Text.

* Muted Text.

* Page Background.



Buttons:



* Button Background.

* Button Text.

* Button Opacity.



Navbar Gradient:



* Gradient Color 1.

* Gradient Color 2.

* Gradient Color 3.

* Navbar Opacity.

* Navbar Border Opacity.



Sidebar / Drawer:



* Sidebar Background.

* Sidebar Text.

* Sidebar Opacity.

* Sidebar Border Opacity.



También se corrigió un problema donde los inputs hexadecimales no dejaban escribir manualmente. Ahora el usuario debe poder escribir el hex directamente, no solo usar el color picker.



## 13. Diseño visual actual deseado



El diseño que nos gustó para Solid Pro es:



Desktop:



```text

[Logo]   Menu 1   Menu 2   Menu 3   Menu 4       [Action]   [Login]

```



Mobile:



```text

[espacio]        [Logo centrado]        [hamburger 3 líneas]

```



Características:



* Navbar azul premium.

* Full width en Solid Pro.

* Logo grande.

* Sin contenedor glass flotante en Solid Pro.

* Menú blanco.

* Botón Login blanco con texto azul.

* Drawer móvil limpio.

* Diseño global, no específico de remodeling.



## 14. Qué falta revisar en KNX Shell



Antes de pasar de lleno a Remodel North Texas, hay que validar:



* Que el CTA diga Login en desktop.

* Que el CTA diga Login en mobile drawer.

* Que no quede ningún “Get Estimate” o “Get Started” guardado en settings.

* Que el hamburger sea de 3 líneas.

* Que los inputs hexadecimales se puedan escribir manualmente.

* Que los collapses del admin funcionen.

* Que los botones Save por sección guarden sin perder scroll.

* Que el drawer no muestre “Navigation” cuando `app_label` esté vacío.

* Que el logo del drawer se pueda agrandar y cambiar de color.

* Que el plugin siga siendo global y reutilizable.



## 15. Remodel North Texas: siguiente fase



Una vez KNX Shell queda estable, pasamos a construir la experiencia de Remodel North Texas.



Remodel North Texas debe usar KNX Shell como su navbar global, pero su lógica y contenido deben vivir en módulos propios.



La siguiente fase se enfoca en diseñar y construir:



* Homepage.

* Hero section.

* Service cards.

* Lead capture CTA.

* Estimate/start project flow.

* Homeowner-facing experience.

* Company/vendor/hub foundation.

* CRM/lead pipeline futuro.



## 16. Diseño inicial recomendado para Remodel North Texas



La homepage debe tener una experiencia premium, clara y mobile-first.



Secciones sugeridas:



1. Hero section.

2. Trust bar.

3. Services grid.

4. Featured projects.

5. How it works.

6. Why choose us.

7. Homeowner hub teaser.

8. CTA final.



El diseño debe sentirse como una plataforma moderna, no como un sitio tradicional de contractor.



## 17. Mensaje para el siguiente trabajador



Estamos construyendo primero la base global del sistema visual con KNX Shell. No conviertas KNX Shell en un plugin específico de remodeling. El objetivo es que cualquier proyecto pueda usarlo.



El diseño Solid Pro puede verse como Remodel North Texas, pero todos los labels, menús, submenús, acciones, CTA, colores, logo, drawer y hamburger deben ser configurables desde el admin.



Después de cerrar KNX Shell, la siguiente tarea es crear la capa específica de Remodel North Texas: homepage, servicios, lead capture y flujo inicial de usuario.