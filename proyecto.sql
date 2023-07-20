
--CREACION DE LAS TABLAS
-Tabla de Proveedor 
 CREATE TABLE PROVEEDOR(
ID_PROVEEDOR number(10), 
NOMBRE_PROVEEDOR varchar2(25),
DIRECCION_PROVEEDOR VARCHAR2(300), -- Ciudad, Estado, Pais
NUMERO_TELEFONO_PROVEEDOR number(10),
CORREO_ELECTRONICO_PROVEEDOR VARCHAR2(30)
); 

ALTER TABLE PROVEEDOR 
ADD CONSTRAINT pk_tb_proveedor PRIMARY KEY(ID_PROVEEDOR);

--Tabla de Producto
 CREATE TABLE PRODUCTO(
ID_PRODUCTO number(10),
ID_PROVEEDOR number(10), -- FK al proveedor del producto
NOMBRE_PRODUCTO varchar2(25),
TIPO_PRODUCTO number(10), -- FK al tipo de producto segun la categoria
SERIE_PRODUCTO number(20),
MODELO_PRODUCTO VARCHAR2(30),
MARCA_PRODUCTO VARCHAR2(20),
CANTIDAD_STOCK NUMBER(10)
); 

ALTER TABLE PRODUCTO 
ADD CONSTRAINT pk_tb_producto PRIMARY KEY(ID_PRODUCTO);


--Tabla de Cliente
 CREATE TABLE CLIENTE(
ID_CLIENTE number(10),
NOMBRE_CLIENTE varchar2(50),
DIRECCION_CLIENTE  VARCHAR2(80), -- Ciudad, Estado, Pais
NUMERO_TELEFONO_CLIENTE number(10),
CORREO_ELECTRONICO_CLIENTE varchar2(30)
); 

ALTER TABLE CLIENTE 
ADD CONSTRAINT pk_tb_cliente PRIMARY KEY(ID_CLIENTE);


--Tabla de Usuario
 CREATE TABLE USUARIO(
ID_EMPLEADO number(10),
--ID_TIPO_USUARIO number(10),
NOMBRE_EMPLEADO VARCHAR2(100),
CORREO VARCHAR2 (100),
PASSWORD VARCHAR2 (100)
); 

ALTER TABLE USUARIO 
ADD CONSTRAINT pk_tb_usuario PRIMARY KEY(ID_EMPLEADO);


--Tabla de Inventario
CREATE TABLE INVENTARIO(
ID_HISTORICO number(10),
ID_PRODUCTO number(10),
ID_MOVIMIENTO NUMBER(10),
STOCK NUMBER(10)
); 
ALTER TABLE INVENTARIO 
ADD CO NSTRAINT pk_tb_inventario PRIMARY KEY(ID_HISTORICO);


--Tabla de Tipo de Producto
CREATE TABLE TIPO_PRODUCTO(
ID_CATEGORIA number(10),
DESCRIPCION_CATEGORIA_TIPO_PRODUCTO VARCHAR2(300)
); 
ALTER TABLE TIPO_PRODUCTO 
ADD CONSTRAINT pk_tb_tipo_producto PRIMARY KEY(ID_CATEGORIA);


--Tabla de Movimiento_Invetario
CREATE TABLE MOVIMIENTO_INVENTARIO(
ID_MOVIMIENTO number(10), -- PK
ID_TIPO_MOVIMIENTO number(10),
NUM_ORDEN number(10),
ID_CLIENTE number(10), -- FK para conocer los datos del cliente
FECHA_MOVIMIENTO DATE,
ID_PRODUCTO NUMBER(10), --FK de la info del producto
CANTIDAD_MOVIMIENTO NUMBER(10),
ID_EMPLEADO NUMBER(10) -- FK de la info del empleado
); 
ALTER TABLE MOVIMIENTO_INVENTARIO 
ADD CONSTRAINT pk_tb_movimiento_inventario PRIMARY KEY(ID_MOVIMIENTO);


--Tabla de tipo movimientos
CREATE TABLE TIPOS_MOVIMIENTOS(
ID_TIPO_MOVIMIENTO number(10), 
CATEGORIA VARCHAR2(7) -- Salida o Entrada

); 
ALTER TABLE TIPOS_MOVIMIENTOS 
ADD CONSTRAINT pk_tb_tipos_movimientos PRIMARY KEY(ID_MOVIMIENTO);

------------------------------------------CREACION de AutoIncrements------------------------------------

--CREACION DE AUTOINCREMENT PARA USUARIOS
create sequence autoUsuario
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
  
--CREACION DE AUTOINCREMENT PARA PRODUCTOS
create sequence autoProductos
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  

  
--CREACION DE AUTOINCREMENT PARA CLIENTE
create sequence autoCliente
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
  
--CREACION DE AUTOINCREMENT PARA PROVEEDOR
create sequence autoProveedor
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
  
--CREACION DE AUTOINCREMENT PARA HISTORICO DE INVENTARIO
create sequence autoHistorico
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;


  ---Creacion de FK para las tablas.

ALTER TABLE PRODUCTO
ADD CONSTRAINT fk_tb_proveedor FOREIGN KEY (ID_PROVEEDOR)
REFERENCES PROVEEDOR (ID_PROVEEDOR);

ALTER TABLE PRODUCTO
ADD CONSTRAINT fk_tb_tipo_producto FOREIGN KEY (TIPO_PRODUCTO)
REFERENCES TIPO_PRODUCTO (ID_CATEGORIA);

ALTER TABLE INVENTARIO
ADD CONSTRAINT fk_tb_producto FOREIGN KEY (ID_PRODUCTO)
REFERENCES PRODUCTO (ID_PRODUCTO);

ALTER TABLE INVENTARIO
ADD CONSTRAINT fk_tb_movimiento_inventario FOREIGN KEY (ID_MOVIMIENTO)
REFERENCES MOVIMIENTO_INVENTARIO (ID_MOVIMIENTO);

ALTER TABLE MOVIMIENTO_INVENTARIO
ADD CONSTRAINT fk_tb_tipos_movimientos FOREIGN KEY (ID_TIPO_MOVIMIENTO)
REFERENCES TIPOS_MOVIMIENTOS (ID_TIPO_MOVIMIENTO);

ALTER TABLE MOVIMIENTO_INVENTARIO
ADD CONSTRAINT fk_tb_cliente FOREIGN KEY (ID_CLIENTE)
REFERENCES CLIENTE (ID_CLIENTE);

ALTER TABLE MOVIMIENTO_INVENTARIO
ADD CONSTRAINT fk_tb_usuario FOREIGN KEY (ID_EMPLEADO)
REFERENCES USUARIO (ID_EMPLEADO);



------------------------------------------INSERTs del Proyecto------------------------------------------

INSERT INTO PROVEEDOR VALUES (1, 'Cisco', 'California, USA', 88888888, 'customercontact@cisco.com');
INSERT INTO PROVEEDOR VALUES (2, 'HPE', 'Washington, USA', 98888888, 'customercontact@hpe.com');
INSERT INTO PROVEEDOR VALUES (3, 'DELL', 'Washington, USA', 78451263, 'customercontact@dell.com');

INSERT INTO CLIENTE VALUES (1, 'FIFCO', 'Cerveceria Nacional, Heredia', 22404022, 'contactoproveedor@fifco.com');
INSERT INTO CLIENTE VALUES (2, 'KIMBERLLY CLARK', 'BELEN, Heredia', 23414123, 'contactoproveedor@kclark.com');

INSERT INTO USUARIO VALUES (1, 'Owen Smith Rivera','owenlda252@gmailcom','prueba123');
INSERT INTO USUARIO VALUES (2, 'Jorklin Rodriguez Marin','jorklin2009@hotmail.com','prueba123');


INSERT INTO TIPO_PRODUCTO VALUES (1, 'Terminal');
INSERT INTO TIPO_PRODUCTO VALUES (2, 'Servidor');

INSERT INTO TIPOS_MOVIMIENTOS VALUES (1, 'Salida');
INSERT INTO TIPOS_MOVIMIENTOS VALUES (2, 'Salida');

INSERT INTO PRODUCTO VALUES (1500, 2,'Think Client', 1 ,21342123123114546545, 'GEN 10', 'HP INC', 150);
INSERT INTO PRODUCTO VALUES (1501, 3,'DELL EMC', 2, 21342145893114546545, 'GEN 12', 'DELL', 6);

INSERT INTO INVENTARIO VALUES (1, 1500, 1);
INSERT INTO INVENTARIO VALUES (2, 1501, 2);

INSERT INTO MOVIMIENTO_INVENTARIO VALUES (1, 1, 2200, 1, sysdate, 1500, 5, 1);
INSERT INTO MOVIMIENTO_INVENTARIO VALUES (2, 2, 5123, 2, sysdate, 1501, 3, 2);

--CREACION VISTAS PARA LAS TABLAS



--CREACION DE STORAGE PROCEDURES PARA LAS TABLAS   | INCLUIR CURSORES


set serveroutput on;

--SPs de Ordenamiento ASC y DESC

--No1
CREATE OR REPLACE PROCEDURE p_cliente_ordena_desc
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT nombre_cliente, numero_telefono_cliente, CORREO_ELECTRONICO_CLIENTE
                      FROM CLIENTE
                      ORDER BY nombre_cliente DESC
                   )
          loop
            dbms_output.put_line('Nombre del Cliente: '||i.nombre_cliente||', Contacto Telefonico del Cliente: '||i.numero_telefono_cliente||', Contacto Electronico del Cliente: '||i.CORREO_ELECTRONICO_CLIENTE);
       end loop;  
       
    END;
    
execute p_cliente_ordena_desc;

--No2
CREATE OR REPLACE PROCEDURE p_cliente_ordena_asc
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT nombre_cliente, numero_telefono_cliente, CORREO_ELECTRONICO_CLIENTE
                      FROM CLIENTE
                      ORDER BY nombre_cliente ASC
                   )
          loop
            dbms_output.put_line('Nombre del Cliente: '||i.nombre_cliente||', Contacto Telefonico del Cliente: '||i.numero_telefono_cliente||', Contacto Electronico del Cliente: '||i.CORREO_ELECTRONICO_CLIENTE);
       end loop;  
       
    END;
    
execute p_cliente_ordena_asc;


--No3
CREATE OR REPLACE PROCEDURE p_inventario_ordena_desc
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_HISTORICO, ID_PRODUCTO, ID_MOVIMIENTO
                      FROM INVENTARIO
                      ORDER BY ID_PRODUCTO DESC
                   )
          loop
            dbms_output.put_line('ID de Historico: '||i.ID_HISTORICO||', Informacion de Producto: '||i.ID_PRODUCTO||', Informacion de Movimiento: '||i.ID_MOVIMIENTO);
       end loop;  
       
    END;
    
execute p_inventario_ordena_desc;

--No4
CREATE OR REPLACE PROCEDURE p_inventario_ordena_asc
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_HISTORICO, ID_PRODUCTO, ID_MOVIMIENTO
                      FROM INVENTARIO
                      ORDER BY ID_PRODUCTO ASC
                   )
          loop
            dbms_output.put_line('ID de Historico: '||i.ID_HISTORICO||', Informacion de Producto: '||i.ID_PRODUCTO||', Informacion de Movimiento: '||i.ID_MOVIMIENTO);
       end loop;  
       
    END;
    
execute p_inventario_ordena_asc;

--No5
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_asc_num_orden
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY NUM_ORDEN ASC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute p_movimiento_inventario_ordena_asc_num_orden;


--No6
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_asc_id_cliente
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY ID_CLIENTE ASC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute p_movimiento_inventario_ordena_asc_id_cliente;


--No7
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_asc_id_empleado
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY ID_EMPLEADO ASC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute p_movimiento_inventario_ordena_asc_id_empleado;

--No8
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_fecha (parametro_fecha in varchar2)
    AS --bloque de declaracion de valariables para interaccion.
        v_resultado movimiento_inventario%rowtype;
    BEGIN
         SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
            INTO v_resultado.ID_MOVIMIENTO, v_resultado.ID_TIPO_MOVIMIENTO, v_resultado.NUM_ORDEN, v_resultado.ID_CLIENTE, v_resultado.FECHA_MOVIMIENTO, v_resultado.ID_PRODUCTO, v_resultado.CANTIDAD_MOVIMIENTO, v_resultado.ID_EMPLEADO
         FROM MOVIMIENTO_INVENTARIO
            WHERE v_resultado.FECHA_MOVIMIENTO = TO_DATE(parametro_fecha, 'DD/MM/YY');
            
         dbms_output.put_line('ID de Movimiento: '||v_resultado.id_movimiento||', Tipo Mov: '||v_resultado.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								 v_resultado.NUM_ORDEN||', Cliente Info: '||v_resultado.ID_CLIENTE||', Fecha Movimiento: '||TO_DATE(v_resultado.FECHA_MOVIMIENTO, 'DD/MM/YY')
								  ||', Producto Info: '||v_resultado.ID_PRODUCTO||', Cantidad Movimiento: '||v_resultado.CANTIDAD_MOVIMIENTO||', Empleado Info: '||v_resultado.ID_EMPLEADO);
     
       
    END;
  
  
    
    
EXECUTE p_movimiento_inventario_ordena_fecha(TO_DATE('18/07/23', 'DD/MM/YY'));


--No9
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_desc_num_orden
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY NUM_ORDEN DESC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute p_movimiento_inventario_ordena_desc_num_orden;


--No10
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_desc_id_cliente
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY ID_CLIENTE DESC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute p_movimiento_inventario_ordena_desc_id_cliente;


--No11
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_desc_id_empleado
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY ID_EMPLEADO DESC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute  p_movimiento_inventario_ordena_desc_id_empleado;

--No12
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_desc_fecha_mov
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY FECHA_MOVIMIENTO DESC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute  p_movimiento_inventario_ordena_desc_fecha_mov;

--No13
CREATE OR REPLACE PROCEDURE p_movimiento_inventario_ordena_asc_fecha_mov
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO
                      FROM MOVIMIENTO_INVENTARIO
                      ORDER BY FECHA_MOVIMIENTO ASC
                   )
          loop
            dbms_output.put_line('ID de Movimiento: '||i.ID_MOVIMIENTO||', Tipo Mov'||i.ID_TIPO_MOVIMIENTO||', Numero de Orden: '||
								  i.NUM_ORDEN||', Cliente Info: '||i.ID_CLIENTE||', Fecha Movimiento: '||i.FECHA_MOVIMIENTO
								  ||', Producto Info: '||i.ID_PRODUCTO||', Cantidad Movimiento: '||i.CANTIDAD_MOVIMIENTO||', Empleado Info: '||i.ID_EMPLEADO);
       end loop;  
       
    END;
    
execute  p_movimiento_inventario_ordena_asc_fecha_mov;


--No14
CREATE OR REPLACE PROCEDURE p_producto_ordena_asc_id_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  ID_PRODUCTO ASC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_asc_id_producto;

--No15
CREATE OR REPLACE PROCEDURE p_producto_ordena_desc_id_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  ID_PRODUCTO DESC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_desc_id_producto;

--No16
CREATE OR REPLACE PROCEDURE p_producto_ordena_asc_marca_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  MARCA_PRODUCTO ASC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_asc_marca_producto;

--No17
CREATE OR REPLACE PROCEDURE p_producto_ordena_desc_marca_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  MARCA_PRODUCTO DESC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_desc_marca_producto;

--No18
CREATE OR REPLACE PROCEDURE p_producto_ordena_asc_id_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  ID_PROVEEDOR ASC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_asc_id_proveedor;

--No19
CREATE OR REPLACE PROCEDURE p_producto_ordena_desc_id_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  ID_PROVEEDOR DESC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_desc_id_proveedor;

--No20
CREATE OR REPLACE PROCEDURE p_producto_ordena_asc_nom_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  NOMBRE_PRODUCTO ASC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_asc_nom_producto;

--No21
CREATE OR REPLACE PROCEDURE p_producto_ordena_desc_nom_producto
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, STOCK
                      FROM PRODUCTO
                      ORDER BY  NOMBRE_PRODUCTO DESC
                   )
          loop
            dbms_output.put_line('ID de Producto: '||i.ID_PRODUCTO||', ID de Proveedor'||i.ID_PROVEEDOR||', Nombre de Producto: '||
								  i.NOMBRE_PRODUCTO||', Tipo Producto: '||i.TIPO_PRODUCTO||', Serie de Producto: '||i.SERIE_PRODUCTO
								  ||', Modelo de Producto: '||i.MODELO_PRODUCTO||', Marca de Producto: '||i.MARCA_PRODUCTO||', Stock Actual: '||i.STOCK);
       end loop;  
       
    END;
    
execute  p_producto_ordena_desc_nom_producto;

--No22
CREATE OR REPLACE PROCEDURE p_proveedor_ordena_asc_id_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, NUMERO_TELEFONO_PROVEEDOR, CORREO_ELECTRONICO_PROVEEDOR
                      FROM PROVEEDOR
                      ORDER BY  ID_PROVEEDOR ASC
                   )
          loop
            dbms_output.put_line('ID de Proveedor : '||i.ID_PROVEEDOR||', Nombre de Proveedor'||i.NOMBRE_PROVEEDOR||', Direccion de Proveedor '||
								  i.DIRECCION_PROVEEDOR||', Numero de Proveedor: '||i.NUMERO_TELEFONO_PROVEEDOR||', Correo Electronico Proveedor: '||i.CORREO_ELECTRONICO_PROVEEDOR);
       end loop;  
       
    END;
    
execute  p_proveedor_ordena_asc_id_proveedor;
--No23
CREATE OR REPLACE PROCEDURE p_proveedor_ordena_desc_id_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, NUMERO_TELEFONO_PROVEEDOR, CORREO_ELECTRONICO_PROVEEDOR
                      FROM PROVEEDOR
                      ORDER BY  ID_PROVEEDOR DESC
                   )
          loop
			dbms_output.put_line('ID de Proveedor : '||i.ID_PROVEEDOR||', Nombre de Proveedor'||i.NOMBRE_PROVEEDOR||', Direccion de Proveedor '||
								  i.DIRECCION_PROVEEDOR||', Numero de Proveedor: '||i.NUMERO_TELEFONO_PROVEEDOR||', Correo Electronico Proveedor: '||i.CORREO_ELECTRONICO_PROVEEDOR);
       end loop;  
       
    END;
    
execute  p_proveedor_ordena_desc_id_proveedor;
--No24
CREATE OR REPLACE PROCEDURE p_proveedor_ordena_desc_nom_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, NUMERO_TELEFONO_PROVEEDOR, CORREO_ELECTRONICO_PROVEEDOR
                      FROM PROVEEDOR
                      ORDER BY  NOMBRE_PROVEEDOR DESC
                   )
          loop
          dbms_output.put_line('ID de Proveedor : '||i.ID_PROVEEDOR||', Nombre de Proveedor'||i.NOMBRE_PROVEEDOR||', Direccion de Proveedor '||
								  i.DIRECCION_PROVEEDOR||', Numero de Proveedor: '||i.NUMERO_TELEFONO_PROVEEDOR||', Correo Electronico Proveedor: '||i.CORREO_ELECTRONICO_PROVEEDOR);
       end loop;  
       
    END;
    
execute  p_proveedor_ordena_desc_nom_proveedor;
--No25
CREATE OR REPLACE PROCEDURE p_proveedor_ordena_asc_nom_proveedor
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, NUMERO_TELEFONO_PROVEEDOR, CORREO_ELECTRONICO_PROVEEDOR
                      FROM PROVEEDOR
                      ORDER BY  NOMBRE_PROVEEDOR ASC
                   )
          loop
             dbms_output.put_line('ID de Proveedor : '||i.ID_PROVEEDOR||', Nombre de Proveedor'||i.NOMBRE_PROVEEDOR||', Direccion de Proveedor '||
								  i.DIRECCION_PROVEEDOR||', Numero de Proveedor: '||i.NUMERO_TELEFONO_PROVEEDOR||', Correo Electronico Proveedor: '||i.CORREO_ELECTRONICO_PROVEEDOR);
       end loop;  
       
    END;
    
execute  p_proveedor_ordena_asc_nom_proveedor;
--No26
CREATE OR REPLACE PROCEDURE p_usuario_ordena_asc_nombre_emp
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_EMPLEADO, NOMBRE_EMPLEADO, CORREO, PASSWORD
                      FROM USUARIO
                      ORDER BY  NOMBRE_EMPLEADO ASC
                   )
          loop
             dbms_output.put_line('ID de Empleado : '||i.ID_EMPLEADO||', Nombre de Empleado'||i.NOMBRE_EMPLEADO||', Correo de Empleado '||
								  i.CORREO||', Contrasena de Empleado '||i.PASSWORD);
       end loop;  
       
    END;
    
execute  p_usuario_ordena_asc_nombre_emp;

--No27
CREATE OR REPLACE PROCEDURE p_usuario_ordena_desc_nombre_emp
    AS --bloque de declaracion de valariables para interaccion.
   
    BEGIN
          for i in ( SELECT ID_EMPLEADO, NOMBRE_EMPLEADO, CORREO, PASSWORD
                      FROM USUARIO
                      ORDER BY  NOMBRE_EMPLEADO DESC
                   )
          loop
             dbms_output.put_line('ID de Empleado : '||i.ID_EMPLEADO||', Nombre de Empleado'||i.NOMBRE_EMPLEADO||', Correo de Empleado '||
								  i.CORREO||', Contrasena de Empleado '||i.PASSWORD);
       end loop;  
       
    END;
    
execute  p_usuario_ordena_desc_nombre_emp;




--CREACION DE FUNCIONES PARA LAS TABLAS           | INCLUIR CURSORES
