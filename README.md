# Aplicación de Tareas PHP

Es una aplicación sencilla para organizar tareas diarias, organizadas mediante categorías, con autenticación

## Funciones principales
1. Crear tareas
2. Crear categorías 
3. Estadísticas (Total de tareas completadas, de tareas creadas y promedio de vida de una tarea)
4. Autenticación 
5. Filtrado de tareas (titulo, fecha de creación o categoría)

## Stack 
*Lenguaje de programación:* PHP
*Librera de estilos:*  Tailwindcss v3 
https://v3.tailwindcss.com/
*Librera de componentes:*  Dasy ui v4
https://v4.daisyui.com/
*Libreria iconos:* fontawesome
https://fontawesome.com/icons
*Libreria para alertas:* Notyf
https://www.npmjs.com/package/notyf

## Tablas 
#### Usuarios

| ID       | INT          |
| -------- | ------------ |
| nombre   | varchar(100) |
| correo   | varchar(100) |
| password | varchar(255) |
#### Tareas

| ID               | INT          |
| ---------------- | ------------ |
| usuario_id       | INT          |
| categoria_id     | INT          |
| titulo           | varchar(255) |
| contenido        | varchar(255) |
| fechaCreación    | timestamp    |
| fechaTerminación | timestamp    |
| terminada        | bool         |

#### Categorías

| ID     | INT          |
| ------ | ------------ |
| nombre | varchar(100) |

## Diseño
#### Página Autenticación 
Cada usuario tiene un nombre, un correo, que tiene ser único, y una contraseña, que no se guarda de forma directa en la tabla, si no que se encripta . *EL correo es el identificador de cada usuario*
![[/assets/mockup_auth.png]]
#### Página inicio 
 Aquí se pueden crear la tareas, ver todas las tareas y hacer el uso de los filtros. En el navbar para la imagen de perfil se usa la api de ui avatars (https://ui-avatars.com/) 
![[/assets/mockup_home.png]]
Todas la paginas al realizar la acción correspondiente regresan la pagina de inicio
#### Página editar tarea
Al cargar la view, primero se toman los datos de la tarea. 
Como el id de la tarea es puesto en ruta (es posible poner otro id), para estar seguros que se va a mostrar una tarea del usuario autenticado el query a base de datos es el siguiente `SELECT * FROM tareas WHERE id = ? AND user_id = ?` En el caso de que no se encuentre la tarea regresamos al inicio 
![[/assets/mockup_edit.png]]
#### Página estadísticas 
Se mostraran las siguientes estadísticas
- Tareas creadas (ultimo mes)
- Tareas terminadas (ultimo mes)
- Duración promedio de cada tarea  (incio - **terminación** )
![[/assets/mockup_statistics.png]]
#### Página categorías
Se crean las categorías y hay una tabla, con las categorías donde se pueden ver, editar y borrar  
![[/assets/mockup_categoires.png]]

## Rutas

`(AUTH):` Necesita estar autenticado para acceder a esas rutas 

```bash
-TAREAS (AUTH)

GET /tareas TODAS LAS TAREAS (PÁGINA INICIO)
GET /tareas/:id UNA TAREA (PÁGINA POR TAREA)
GET /tareas/buscar?titulo=limpiar&fecha=2024-10-01&categoria_id=3 BUSCAR TAREA
PUT /tareas/:id EDITAR TAREA
DELETE /tareas/:id BORRAR TAREA

-CATEGORIAS (AUTH)

GET /categorias TODAS LAS CATEGORIAS (PÁGINA CATEGORIAS)
GET /categorias/:id UNA CATEGORIA
PUT /categorias/:id EDITAR CATEGORIA
DELETE /categorias/:id BORRAR CATEGORIA

-ESTADISTICAS (AUTH)

GET /estadisticas (PÁGINA ESTADISTICAS)

-AUTENTICACION
GET /login (PÁGINA LOGIN)
GET /signup (PÁGINA SIGNUP)
```

