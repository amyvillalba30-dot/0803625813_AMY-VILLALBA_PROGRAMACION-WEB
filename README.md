# Sistema de Gestión de Inventarios

Este proyecto es una aplicación web desarrollada en **Laravel 10** que implementa un **Sistema de Inventarios** siguiendo el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** de tipo monolítico.

El sistema permite la gestión integral de productos y categorías, con un enfoque central en el **Control de Stock**.

## Funcionalidades Implementadas

El sistema cumple con los siguientes requisitos mínimos:

### 1. Gestión de Productos (CRUD)
- **Registro**: Creación de nuevos productos con asignación de categoría y stock inicial.
- **Edición**: Modificación de datos del producto, precios y ajustes de stock.
- **Eliminación**: Baja lógica o física de productos del sistema.
- **Visualización**: Listado de productos con indicadores visuales.

### 2. Control de Stock
- Campo dedicado `stock` en la base de datos.
- Visualización de la cantidad disponible en el listado de productos.
- Barra de progreso visual para identificar niveles de stock.
- Validación de tipos de datos (enteros) para la integridad del inventario.

### 3. Arquitectura y Buenas Prácticas
- **Patrón MVC**: Separación clara de lógica de negocio (Modelos), controladores (Lógica) y presentación (Vistas Blade).
- **Rutas Resource**: Uso eficiente de `Route::resource` para estandarizar las operaciones CRUD.
- **Validaciones**: Request validado en el servidor para garantizar la integridad de los datos.
- **Interfaz Gráfica**: Panel administrativo limpio y responsivo utilizando Bootstrap/plantilla Corona.

## Tecnologías Utilizadas

- **Backend**: PHP 8.1+, Laravel 10
- **Frontend**: Blade, Bootstrap 5
- **Base de Datos**: MySQL
- **Dependencias**: Laravel UI

## Instalación y Despliegue

1. Clonar el repositorio.
2. Instalar dependencias:
   ```bash
   composer install
   npm install && npm run build
   ```
3. Configurar entorno:
   - Copiar `.env.example` a `.env`
   - Configurar credenciales de base de datos.
4. Generar clave de aplicación:
   ```bash
   php artisan key:generate
   ```
5. Ejecutar migraciones:
   ```bash
   php artisan migrate
   ```
6. Iniciar servidor:
   ```bash
   php artisan serve
   ```

---
Presentado para revisión y evaluación.
