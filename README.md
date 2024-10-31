# ✈️ **Proyecto: Comercialización de Viajes de Larga Distancia**

¡Bienvenidos al sistema de gestión de viajes de larga distancia! 🚍 A través de esta plataforma, puedes explorar, administrar y consultar la base de datos de viajes y pasajeros con todas sus funciones, desde cualquier dispositivo.

---

## **👥 Integrantes del Equipo**
- **Francisco Cocirio**
- **Felipe Tomás Beheran Bazterrechea**

---

## **🌍 Descripción del Proyecto**
Esta aplicación web está diseñada para:
- 📅 **Gestionar reservas de viajes** en una interfaz amigable y dinámica.
- 📋 **Consultar información detallada de cada pasajero** y sus viajes.
- 📸 **Cargar imágenes** del destino para dar una mejor experiencia a los usuarios.

La **base de datos** está organizada en dos secciones:
1. **Pasajeros**: Personas registradas para viajar. Contienen identificador, nombre, DNI y edad.
2. **Viajes**: Información del viaje como origen, destino, fecha de salida, precio, disponibilidad, y el pasajero asociado.

---

## **🚀 Funcionalidades Clave**
### **Acceso Público** 🌐
> **Navegación libre para los usuarios.**

- **📄 Listado de Viajes**: Muestra todos los viajes disponibles.  
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/listarViajes`

- **🔍 Detalle de Viaje**: Información completa de cada viaje.
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/verMasViajes/2`

- **👥 Listado de Pasajeros**: Visualización de los pasajeros registrados.  
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/mostrarPersonas`

- **🔗 Viajes por Pasajero**: Ver los viajes realizados por cada pasajero.  
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/viajesPorPersonas/1`

---

### **Acceso de Administrador** 🔑
> **Funciones exclusivas para usuarios administradores**

- **🔑 Iniciar Sesión**:
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/login`

- **🔓 Cerrar Sesión**:
  - URL: `http://localhost/ejerciscos/TP_web2/TP_web2/cerrarSecion`

---

## **⚙️ Administración de Datos (ABM)**

1. **Administración de Viajes** ✈️  
   - **Listar Viajes**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/listarViajes`
   - **Agregar Viaje**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/formularioViajes`
   - **Editar Viaje**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/editarViaje/2`
   - **Eliminar Viaje**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/eliminarViaje/2`

2. **Administración de Pasajeros** 👤  
   - **Listar Pasajeros**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/mostrarPersonas`
   - **Agregar Pasajero**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/formularioPersona`
   - **Editar Pasajero**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/mostrarFormEditPersona/1`
   - **Eliminar Pasajero**: URL: `http://localhost/ejerciscos/TP_web2/TP_web2/eliminarPersona/1`

---

## **📐 Estructura del Proyecto**
- **Interfaz de usuario**: Navegación intuitiva, accesible desde cualquier dispositivo.
- **Conexión a Base de Datos**: Almacena toda la información de pasajeros y viajes con integridad y seguridad.
- **Funciones de Seguridad**: Acceso solo para administradores en el panel de gestión.

---

## **⚙️ Requisitos del Proyecto**
- Servidor de bases de datos (configurado)
- Entorno PHP y servidor web
- Navegador web (Google Chrome, Mozilla Firefox, etc.)

---

## **🔧 Instrucciones de Uso**
1. **Configura el servidor** con el repositorio clonado y la base de datos.
2. **Conecta el proyecto** a la base de datos.
3. **Accede a la interfaz** y prueba las funciones públicas o administra la información como usuario autenticado.

---

### ¡Gracias por tu interés en nuestro proyecto! 🚀



![IMAGEN DE EL DIAGRAMA](diagrama.png)
