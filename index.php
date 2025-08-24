<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normalización de una Base De Datos</title>
    <link rel="stylesheet" href="x.css">
    <script src="script.js" defer></script>
</head>


<body>
    <div>
        <h1>Normalización de una Base De Datos</h1>
        <p>Elaborado por: Kevin Daniel Arango Algarra y Diego Andres Piñeros</p>
    </div>

    <div>
        <p>Esta página tiene el fin de explicar la normalización de una base de datos.</p>
    </div>

    <h2>Contexto</h2>
    <img src="ejemplo.png" />
    <p>Se pide desarrollar una base de datos para una tienda de zapatos, con el fin de satisfacer todas las necesidades
        del establecimiento.</p>
    <p>Normalización: La normalización es un proceso en el diseño de bases de datos que consiste en organizar los datos
        de manera eficiente, dividiéndolos en tablas y estableciendo relaciones entre ellas, con el objetivo de:</p>
    <ul>
        <li>Eliminar redundancias (datos repetidos innecesariamente)</li>
        <li>Evitar anomalías en inserciones, actualizaciones y eliminaciones</li>
        <li>Asegurar la integridad de los datos</li>
        <li>Mejorar la eficiencia en el almacenamiento y en la consistencia de la información</li>
    </ul>
    <p>Existen tres formas normales para llegar a este proceso de normalización.</p>

    <button id="toggleBtn1">FN1</button>
    <button id="toggleBtn2">FN2</button>
    <button id="toggleBtn3">FN3</button>
    <button id="toggleBtn4">Diagrama Final</button>



    <!-- FN1 -->
    <div id="contenido1">
        <div id="Explicacion1">
            <h1>Primera Forma Normal (FN1)</h1>
            <ul>
                <li>Todos los atributos contienen solo valores atómicos.</li>
                <li>No existen grupos repetitivos de columnas.</li>
                <li>Cada campo contiene un solo valor por fila.</li>
            </ul>
            <h3>Ejemplos</h3>

            <b>Sin FN1</b>
            <table>
                <caption>Clientes (NO 1FN)</caption>
                <thead>
                    <tr>
                        <th>ClienteID</th>
                        <th>Nombre</th>
                        <th>Teléfonos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan</td>
                        <td>3001234567, 3109876543</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ana</td>
                        <td>3015557788</td>
                    </tr>
                </tbody>
            </table>

            <b>Cumpliendo FN1</b>
            <table>
                <caption>Clientes y Teléfonos (1FN)</caption>
                <thead>
                    <tr>
                        <th>ClienteID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan</td>
                        <td>3001234567</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Juan</td>
                        <td>3109876543</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ana</td>
                        <td>3015557788</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="Aplicacion1">
            <h2>Planteamiento</h2>
            <p>Para cumplir con una base de datos debemos generar unas tablas que nos permitan contener la información
                respecto al negocio de la tienda de calzado.</p>
            <img src="Tablas.png" alt="imagen de tablas propuestas">

            <p>Estamos cumpliendo con la FN1 porque:</p>
            <ul>
                <li>Cada atributo de las tablas contiene un único valor.</li>
                <li>Se mantienen registros sin duplicaciones y se evitan listas.</li>
            </ul>
            <img src="TablaCliente.png" alt="imagen de la tabla cliente">
        </div>
    </div>

    <!-- FN2 -->
    <div id="contenido2">
        <div id="Explicacion2">

            <h1>Segunda Forma Normal (FN2)</h1>
            <ul>
                <li>Se cumple FN1.</li>
                <li>Todos los atributos que no son clave dependen por completo de la clave primaria.<br>
                    <strong>Esto significa que no puede haber dependencias parciales: un atributo no clave no debe
                        depender de
                        una parte de la clave primaria compuesta, sino de toda la clave.</strong>
                </li>
            </ul>

            <h3>Ejemplos</h3>

            <b>Sin FN2</b>
            <table>
                <caption>Pedidos (NO 2FN)</caption>
                <thead>
                    <tr>
                        <th>PedidoID</th>
                        <th>ClienteID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>Zapato A</td>
                        <td>2</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2</td>
                        <td>Zapato B</td>
                        <td>1</td>
                        <td>30</td>
                    </tr>
                </tbody>
            </table>

            <!-- En NO 2FN: 'Producto' y 'Precio' dependen solo de Producto, no de toda la clave compuesta (PedidoID, Producto). -->

            <b>Cumpliendo FN2</b>

            <!-- Dividimos en tablas por entidades y un detalle con clave compuesta -->
            <table>
                <caption>Clientes</caption>
                <thead>
                    <tr>
                        <th>ClienteID <sup>PK</sup></th>
                        <th>ClienteNombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ana Gómez</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <caption>Productos</caption>
                <thead>
                    <tr>
                        <th>ProductoID <sup>PK</sup></th>
                        <th>ProductoNombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Zapato A</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Zapato B</td>
                        <td>30</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <caption>Pedidos</caption>
                <thead>
                    <tr>
                        <th>PedidoID <sup>PK</sup></th>
                        <th>ClienteID <sup>FK → Clientes.ClienteID</sup></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <caption>DetallePedidos (2FN)</caption>
                <thead>
                    <tr>
                        <th>PedidoID <sup>PK, FK → Pedidos.PedidoID</sup></th>
                        <th>ProductoID <sup>PK, FK → Productos.ProductoID</sup></th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>101</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>102</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>

            <!-- Leyenda: PK = Clave primaria, FK = Clave foránea -->

            <p><strong>¿Por qué “Cumpliendo FN2”?</strong></p>
            <ul>
                <li><strong>1FN ya se cumple:</strong> todas las columnas son atómicas y no hay grupos repetidos.</li>
                <li><strong>Sin dependencias parciales:</strong>
                    <ul>
                        <li>En <em>Productos</em>, <code>ProductoNombre</code> y <code>Precio</code> dependen solo de
                            <code>ProductoID</code> (PK simple).
                        </li>
                        <li>En <em>Pedidos</em>, <code>ClienteID</code> depende de <code>PedidoID</code> (PK simple).
                        </li>
                        <li>En <em>DetallePedidos</em>, la única columna no clave es <code>Cantidad</code> y depende de
                            la <em>clave compuesta completa</em> (<code>PedidoID, ProductoID</code>), no de una parte.
                        </li>
                    </ul>
                </li>
                <li><strong>Se eliminaron dependencias de parte de la clave:</strong> los datos del producto
                    (<code>ProductoNombre</code>, <code>Precio</code>) y del cliente (<code>ClienteNombre</code>) ya no
                    están en la tabla de detalle; se movieron a sus entidades, evitando que dependan solo de
                    <code>ProductoID</code> o de <code>PedidoID</code> dentro de una clave compuesta.
                </li>
            </ul>

        </div>

        <div id="Aplicacion2">

            <hr>
            <h1>Planteamiento a nuestro caso</h1>
            <p>Para cumplir con la FN2 todos los atributos de nuestras tablas deben <strong>depender exclusivamente la
                    clave primaria</strong>
                de lo contrario estariamos violando FN2. Por lo tanto en la siguientes tablas se muestra la
                estructuración que se
                planteá y se demuestra como cada tabla cumple FN2
            </p>



            <h2>Por qué el esquema cumple con la Segunda Forma Normal (2FN)</h2>

            <p><strong>Reglas de 2FN:</strong></p>
            <ul>
                <li>La tabla ya cumple 1FN (valores atómicos, sin campos repetidos).</li>
                <li>Todos los atributos no clave deben depender de <strong>toda la clave primaria</strong> (no de una
                    parte de ella).</li>
            </ul>

            <h2>Tablas con clave primaria simple</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>Clave primaria</th>
                        <th>Atributos no clave</th>
                        <th>¿Cumple 2FN?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cliente</td>
                        <td>id_cliente</td>
                        <td>nombre, apellido, telefono, email</td>
                        <td>Sí. Todos dependen de <code>id_cliente</code>.</td>
                    </tr>
                    <tr>
                        <td>Empleado</td>
                        <td>id_empleado</td>
                        <td>nombre, apellido, puesto</td>
                        <td>Sí. Todos dependen de <code>id_empleado</code>.</td>
                    </tr>
                    <tr>
                        <td>Proveedor</td>
                        <td>id_proveedor</td>
                        <td>nombre, telefono, direccion</td>
                        <td>Sí. Todos dependen de <code>id_proveedor</code>.</td>
                    </tr>
                    <tr>
                        <td>Producto</td>
                        <td>id_producto</td>
                        <td>nombre, talla, color, precio, id_proveedor</td>
                        <td>Sí. Todos dependen de <code>id_producto</code>.</td>
                    </tr>
                    <tr>
                        <td>Venta</td>
                        <td>id_venta</td>
                        <td>fecha, id_cliente, id_empleado</td>
                        <td>Sí. Todos dependen de <code>id_venta</code>.</td>
                    </tr>
                    <tr>
                        <td>Factura</td>
                        <td>id_factura</td>
                        <td>id_venta, nro_factura, fecha_emision</td>
                        <td>Sí. Todos dependen de <code>id_factura</code>.</td>
                    </tr>
                </tbody>
            </table>

            <h2>Tabla con clave compuesta</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <caption><strong>DetalleFactura</strong></caption>
                <thead>
                    <tr>
                        <th>Clave primaria</th>
                        <th>Atributos no clave</th>
                        <th>Análisis</th>
                        <th>¿Cumple 2FN?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>(id_factura, id_producto)</td>
                        <td>cantidad</td>
                        <td>Depende de la combinación de la factura y el producto (línea específica de la factura).</td>
                        <td>Sí</td>
                    </tr>
                    <tr>
                        <td>(id_factura, id_producto)</td>
                        <td>subtotal</td>
                        <td>Depende de la misma combinación (el importe de ese producto en esa factura).<br>No depende
                            solo de <code>id_factura</code> ni solo de <code>id_producto</code>.</td>
                        <td>Sí</td>
                    </tr>
                </tbody>
            </table>

            <h2>Conclusión</h2>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tipo de clave</th>
                        <th>¿Puede haber dependencia parcial?</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Simple (ej: Cliente, Producto, Factura...)</td>
                        <td>No</td>
                        <td>Siempre cumple 2FN</td>
                    </tr>
                    <tr>
                        <td>Compuesta (DetalleFactura)</td>
                        <td>Sí, podría haber</td>
                        <td>En este caso no ocurre, porque los atributos dependen de toda la clave ⇒ Cumple 2FN</td>
                    </tr>
                </tbody>
            </table>

            <h2>Diagrama Entidad Relacion</h2>
            <div style="text-align:center;">
                <img src="FN2.png" alt="imagen de tablas propuestas FN2">
            </div>
        </div>
    </div>

    <!-- FN3 -->
    <div id="contenido3">
        <div id="Explicacion3">
            <h2>Aplicación de la Tercera Forma Normal (3FN)</h2>
        <p>
            En la <strong>Tercera Forma Normal</strong>, los atributos deben depender 
            exclusivamente de la clave primaria de la tabla, y no de otros atributos que no sean clave. 
            Esto evita dependencias transitivas y mantiene la base de datos libre de redundancias.
        </p>
        <p>
            En la base de datos del Almacen de Zapatos, esto se aplica de la siguiente forma:
        </p>
        <ul>
            <li><strong>Cliente</strong>: los datos como <em>nombre</em>, <em>apellido</em>, <em>teléfono</em> y <em>email</em> dependen sólo de <code>id_cliente</code>.</li>
            <li><strong>Empleado</strong>: atributos como <em>nombre</em>, <em>apellido</em> y <em>puesto</em> dependen únicamente de <code>id_empleado</code>.</li>
            <li><strong>Proveedor</strong>: la información de contacto depende sólo de <code>id_proveedor</code>.</li>
            <li><strong>Producto</strong>: no se repite el nombre del proveedor, solo se almacena <code>id_proveedor</code> como clave foránea. Esto evita redundancia.</li>
            <li><strong>Factura</strong>: almacena únicamente datos propios de la factura (nro_factura, fecha_emision) y no información duplicada de cliente o producto.</li>
            <li><strong>DetalleFactura</strong>: resuelve la relación N:M entre facturas y productos. Sus atributos (<em>cantidad</em>, <em>subtotal</em>) dependen de la clave compuesta <code>(id_factura, id_producto)</code>.</li>
        </ul>
        <p>
            Con esto se cumple la 3FN: no hay dependencias parciales ni transitivas, 
            cada atributo depende únicamente de su clave primaria.
        </p>
        <table>
        <thead>
            <tr>
                <th>Tabla</th>
                <th>Campos</th>
                <th>Clave primaria</th>
                <th>Claves foráneas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>cliente</b></td>
                <td>id_cliente, nombre, apellido, telefono, email</td>
                <td>id_cliente</td>
                <td>-</td>
            </tr>
            <tr>
                <td><b>empleado</b></td>
                <td>id_empleado, nombre, apellido, puesto</td>
                <td>id_empleado</td>
                <td>-</td>
            </tr>
            <tr>
                <td><b>proveedor</b></td>
                <td>id_proveedor, nombre, telefono, direccion</td>
                <td>id_proveedor</td>
                <td>-</td>
            </tr>
            <tr>
                <td><b>producto</b></td>
                <td>id_producto, nombre, talla, color, precio, id_proveedor</td>
                <td>id_producto</td>
                <td>id_proveedor</td>
            </tr>
            <tr>
                <td><b>venta</b></td>
                <td>id_venta, fecha, id_cliente, id_empleado</td>
                <td>id_venta</td>
                <td>id_cliente, id_empleado</td>
            </tr>
            <tr>
                <td><b>factura</b></td>
                <td>id_factura, id_venta, nro_factura, fecha_emision</td>
                <td>id_factura</td>
                <td>id_venta</td>
            </tr>
            <tr>
                <td><b>detallefactura</b></td>
                <td>id_detalle, id_factura, id_producto, cantidad, subtotal</td>
                <td>id_detalle</td>
                <td>id_factura, id_producto</td>
            </tr>
        </tbody>
    </table>
        </div>

        <div id="Aplicacion3">

        </div>
    </div>

    <!-- Diagrama Final -->
    <div id="contenido4">
        <h2>Diagrama Entidad Relacion</h2>
            
                <p>
        En este modelo podemos apreciar que se ha cumplido las formas normales para evitar las redudnacias de una
        base de datos, se puede ver claramente las <b>entidades</b> principales
        (<i>Cliente, Empleado, Proveedor, Producto, Venta, Factura y DetalleFactura</i>) junto con
        sus <b>atributos</b> y las <b>relaciones</b> entre ellas. 
    </p>

    <ul>
        <li>Se evita la redundancia de datos.</li>
        <li>Se garantiza la integridad referencial mediante claves primarias y foráneas.</li>
        <li>Se facilita la escalabilidad del sistema de ventas y facturación.</li>
    </ul>
    <div style="text-align:center;"></div>
                <img src="FN2.png" alt="imagen de tablas propuestas FN2">
            </div>
    </div>


</body>

</html>