# Plataforma Educativa Witral

Sistema web informativo y educativo con integración Shopify para Witral Chile.

## Descripción
Plataforma que combina contenido educativo sobre tejido artesanal con e-commerce integrado, permitiendo previews de videos y venta de cursos + productos físicos.

## Tecnologías
- PHP 8.1+ / CodeIgniter 4
- MySQL 8.0
- Bootstrap 5
- Shopify API
- YouTube API

## Estado del Proyecto
🚧 **En Desarrollo** - Fase de Implementación

## Funcionalidades Planificadas
- [ ] Estructura base del sitio y diseño moderno
- [ ] Sistema de usuarios y autenticación
- [ ] Integración completa con Shopify API
- [ ] Preview de videos educativos (YouTube)
- [ ] Panel administrativo para gestión de contenido
- [ ] Área personalizada "Mis Cursos"
- [ ] Sistema de ofertas combinadas (curso + producto físico)

## Instalación Local
1. Configurar XAMPP con PHP 8.1+
2. Clonar repositorio en `htdocs/witral-web`
3. Crear base de datos `witral_db` en MySQL
4. Copiar `.env.example` a `.env` y configurar BD
5. Ejecutar: `php spark migrate`
6. Ejecutar: `php spark db:seed AdminUserSeeder`
7. Iniciar: `php spark serve`

## URLs de Desarrollo
- **Sitio principal:** http://localhost:8080
- **Panel admin:** http://localhost:8080 (botón "Admin")

## Integración con Shopify
- Tienda actual: https://witral.cl
- API configurada para sincronización de productos
- Webhooks para confirmación de compras

---
**Desarrollado para Witral Chile** | Portafolio de Título CFT San Agustín
