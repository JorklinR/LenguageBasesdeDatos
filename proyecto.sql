--CREDENCIALES DE CONEXION A DB
--user : owen
--password : owen1234
--



--Tabla de Proveedor 
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
STOCK NUMBER(10), -- FK para el STOCK que existe en Inventario
IMAGEN_PRODUCTO VARCHAR2(500)
); 

ALTER TABLE PRODUCTO 
ADD CONSTRAINT pk_tb_producto PRIMARY KEY(ID_PRODUCTO);

ALTER TABLE PRODUCTO
ADD CONSTRAINT fk_tb_proveedor FOREIGN KEY (ID_PROVEEDOR)
REFERENCES PROVEEDOR (ID_PROVEEDOR),
ADD CONSTRAINT fk_tb_tipo_producto FOREIGN KEY (TIPO_PRODUCTO)
REFERENCES TIPO_PRODUCTO (ID_CATEGORIA),
ADD CONSTRAINT fk_tb_inventario FOREIGN KEY (STOCK)
REFERENCES INVENTARIO (STOCK)
;

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
NOMBRE_EMPLEADO VARCHAR2(100),
CORREO VARCHAR2 (100),
PASSWORD_EMPLEADO VARCHAR2 (100)
); 

ALTER TABLE USUARIO 
ADD CONSTRAINT pk_tb_usuario PRIMARY KEY(ID_EMPLEADO);


--Tabla de Inventario
CREATE TABLE INVENTARIO(
ID_HISTORICO number(10),
ID_PRODUCTO number(10), -- FK para conocer la info del producto
ID_MOVIMIENTO NUMBER(10) -- FK para conocer los datos del movimiento
); 
ALTER TABLE INVENTARIO 
ADD CONSTRAINT pk_tb_inventario PRIMARY KEY(ID_HISTORICO);


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
ID_TIPO_MOVIMIENTO number(10), --FK para conocer el tipo de movimiento
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
ADD CONSTRAINT pk_tb_tipos_movimientos PRIMARY KEY(ID_TIPO_MOVIMIENTO);


--CREACION DE AUTOINCREMENT PARA USUARIOS
create sequence autoUsuario
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
   ALTER SEQUENCE autoUsuario INCREMENT BY 10;
  
--CREACION DE AUTOINCREMENT PARA PRODUCTOS
create sequence autoProductos
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
 ALTER SEQUENCE autoProductos INCREMENT BY 10;
  
--CREACION DE AUTOINCREMENT PARA CLIENTE
create sequence autoCliente
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
  ALTER SEQUENCE autoCliente INCREMENT BY 10;
  
--CREACION DE AUTOINCREMENT PARA PROVEEDOR
create sequence autoProveedor
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
  ALTER SEQUENCE autoProveedor INCREMENT BY 10;
  
  
--CREACION DE AUTOINCREMENT PARA HISTORICO DE INVENTARIO
create sequence autoHistorico
  start with 1
  increment by 1
  maxvalue 99999
  minvalue 1;
  
    ALTER SEQUENCE autoHistorico INCREMENT BY 10;
  
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

--INSERTS A LAS TABLAS



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



--CREACION VISTAS MATERIALIZADAS PARA LAS TABLAS
CREATE MATERIALIZED VIEW 
		vista_Usuarios AS
SELECT  ID_EMPLEADO AS Identificador,
        NOMBRE_EMPLEADO AS Nombre_Completo,
        CORREO AS Correo_Electronico
        From USUARIO;
		
CREATE MATERIALIZED VIEW 
		vista_Clientes AS
SELECT  ID_CLIENTE AS Identificador,
        NOMBRE_CLIENTE AS Nombre_Cliente,
        DIRECCION_CLIENTE AS Direccion,
		NUMERO_TELEFONO_CLIENTE AS Contacto_Telefonico,
		CORREO_ELECTRONICO_CLIENTE AS Correo_Electronico
        From CLIENTE;		
		
CREATE MATERIALIZED VIEW 
		vista_Inventarios AS
SELECT  ID_HISTORICO AS Identificador,
        ID_PRODUCTO AS Producto,
        ID_MOVIMIENTO AS Movimiento
        From INVENTARIO;			

CREATE MATERIALIZED VIEW
			vista_Movimientos_Inventario AS
SELECT		ID_MOVIMIENTO AS Identificador,
			ID_TIPO_MOVIMIENTO AS Tipo_Movimiento,
			NUM_ORDEN AS Num_Orden,
			ID_CLIENTE AS Identificador_Cliente,
			FECHA_MOVIMIENTO AS Fecha,
			ID_PRODUCTO AS Producto,
			CANTIDAD_MOVIMIENTO AS Cantidad,
			ID_EMPLEADO AS Empleado
			FROM MOVIMIENTO_INVENTARIO;
			
CREATE MATERIALIZED VIEW
		vista_Producto AS
SELECT	ID_PRODUCTO AS Identificador,
		ID_PROVEEDOR AS Proveedor,
		NOMBRE_PRODUCTO AS Nombre,
		TIPO_PRODUCTO AS Tipo_Producto,
		SERIE_PRODUCTO AS Serie,
		MODELO_PRODUCTO AS Modelo,
		MARCA_PRODUCTO AS Marca,
		STOCK AS Cantidad,
		IMAGEN_PRODUCTO AS Imagen
		FROM PRODUCTO;
		
CREATE MATERIALIZED VIEW
		vista_Proveedor AS
SELECT	ID_PROVEEDOR AS Identificador,
		NOMBRE_PROVEEDOR AS Nombre,
		DIRECCION_PROVEEDOR AS Direccion,
		NUMERO_TELEFONO_PROVEEDOR AS Contacto,
		CORREO_ELECTRONICO_PROVEEDOR AS Correo
		FROM PROVEEDOR;

CREATE MATERIALIZED VIEW
		vista_Tipo_Producto AS
SELECT ID_CATEGORIA AS Identificador,
		DESCRIPCION_CATEGORIA_TIPO_PRODUCTO AS Descripcion
		FROM TIPO_PRODUCTO;
		
		
CREATE MATERIALIZED VIEW
			vista_Tipo_Movimientos AS
SELECT		ID_TIPO_MOVIMIENTO AS Identificador,
			CATEGORIA AS categoria
			FROM TIPOS_MOVIMIENTOS;
			
----------CREACION DE VISTAS NO MATERIALIZADAS
CREATE  VIEW 
		vista_Usuarios_NM AS
SELECT  ID_EMPLEADO AS Identificador,
        NOMBRE_EMPLEADO AS Nombre_Completo,
        CORREO AS Correo_Electronico
        From USUARIO;
		
CREATE  VIEW 
		vista_Clientes_NM AS
SELECT  ID_CLIENTE AS Identificador,
        NOMBRE_CLIENTE AS Nombre_Cliente,
        DIRECCION_CLIENTE AS Direccion,
		NUMERO_TELEFONO_CLIENTE AS Contacto_Telefonico,
		CORREO_ELECTRONICO_CLIENTE AS Correo_Electronico
        From CLIENTE;		
		
CREATE  VIEW 
		vista_Inventarios_NM AS
SELECT  ID_HISTORICO AS Identificador,
        ID_PRODUCTO AS Producto,
        ID_MOVIMIENTO AS Movimiento
        From INVENTARIO;			

CREATE  VIEW
			vista_Movimientos_Inventario_NM AS
SELECT		ID_MOVIMIENTO AS Identificador,
			ID_TIPO_MOVIMIENTO AS Tipo_Movimiento,
			NUM_ORDEN AS Num_Orden,
			ID_CLIENTE AS Identificador_Cliente,
			FECHA_MOVIMIENTO AS Fecha,
			ID_PRODUCTO AS Producto,
			CANTIDAD_MOVIMIENTO AS Cantidad,
			ID_EMPLEADO AS Empleado
			FROM MOVIMIENTO_INVENTARIO;
			
CREATE  VIEW
		vista_Producto_NM AS
SELECT	ID_PRODUCTO AS Identificador,
		ID_PROVEEDOR AS Proveedor,
		NOMBRE_PRODUCTO AS Nombre,
		TIPO_PRODUCTO AS Tipo_Producto,
		SERIE_PRODUCTO AS Serie,
		MODELO_PRODUCTO AS Modelo,
		MARCA_PRODUCTO AS Marca,
		STOCK AS Cantidad,
		IMAGEN_PRODUCTO AS Imagen
		FROM PRODUCTO;
		
CREATE  VIEW
		vista_Proveedor_NM AS
SELECT	ID_PROVEEDOR AS Identificador,
		NOMBRE_PROVEEDOR AS Nombre,
		DIRECCION_PROVEEDOR AS Direccion,
		NUMERO_TELEFONO_PROVEEDOR AS Contacto,
		CORREO_ELECTRONICO_PROVEEDOR AS Correo
		FROM PROVEEDOR;

CREATE  VIEW
		vista_Tipo_Producto_NM AS
SELECT ID_CATEGORIA AS Identificador,
		DESCRIPCION_CATEGORIA_TIPO_PRODUCTO AS Descripcion
		FROM TIPO_PRODUCTO;
		
		
CREATE  VIEW
			vista_Tipo_Movimientos_NM AS
SELECT		ID_TIPO_MOVIMIENTO AS Identificador,
			CATEGORIA AS categoria
			FROM TIPOS_MOVIMIENTOS;

-------------------------------------------

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

--------------------------------------------------------------------------------------------------------
--SPS PARA LOS DML DEL PHP

---- sp de insert on insert_producto.php
CREATE OR REPLACE PROCEDURE p_insert_productos(v_id_proveedor in number, v_nombre_producto in varchar2, v_tipo_producto in number, v_serie_producto in number, v_modelo_producto in varchar2, v_marca_producto in varchar2, v_stock in number, v_imagen_producto in varchar2)
    AS --bloque de declaracion de valariables para interaccion.
        v_producto PRODUCTO%rowtype;
    BEGIN
        INSERT INTO PRODUCTO VALUES (autoProductos.nextval, v_id_proveedor, v_nombre_producto, v_tipo_producto, v_serie_producto, v_modelo_producto, v_marca_producto, v_stock, v_imagen_producto);
      
    END;
    
execute  p_insert_productos(1,'UCS',2, 12345678901234567890, 'GEN 7', 'CISCO', 8, 'gs://lenguaje-de-base-datos.appspot.com/cisco-c240-m5-16x9-111.png');



--sp de update on functins.php
CREATE OR REPLACE PROCEDURE p_update_productos_Cursor(v_id_proveedor in number, v_nombre_producto in varchar2, v_tipo_producto in number, v_serie_producto in number, v_modelo_producto in varchar2, v_marca_producto in varchar2, v_stock in number, v_imagen_producto in varchar2, p_codigo in NUMBER)
    AS --bloque de declaracion de valariables para interaccion.
     
            CURSOR c_Datos_Producto is SELECT * FROM PRODUCTO;
    BEGIN
        OPEN c_Datos_Producto;
        UPDATE PRODUCTO SET producto.id_proveedor = v_id_proveedor, producto.nombre_producto = v_nombre_producto, producto.tipo_producto = v_tipo_producto, 
                          producto.serie_producto = v_serie_producto, producto.modelo_producto = v_modelo_producto, producto.marca_producto = v_marca_producto, producto.stock = v_stock,
                          producto.imagen_producto = v_imagen_producto WHERE id_producto = p_codigo;
        CLOSE c_Datos_Producto;
    END;
    
execute  p_update_productos_Cursor();

--sp de delete on functions.php
CREATE OR REPLACE PROCEDURE p_delete_productos_Cursor(p_codigo in NUMBER)
    AS --bloque de declaracion de valariables para interaccion.
     
            CURSOR c_Datos_Producto_DELETE is SELECT * FROM PRODUCTO;
    BEGIN
        OPEN c_Datos_Producto_DELETE;
             DELETE FROM PRODUCTO WHERE id_producto = p_codigo;
        CLOSE c_Datos_Producto_DELETE;
    END;
    
execute  p_delete_productos_Cursor();


--SP de select on validar_login.php
CREATE OR REPLACE PROCEDURE p_valida_usuario(
    p_correo IN VARCHAR2,
    p_password IN VARCHAR2
)
IS
    v_usuario_id NUMBER;
    v_nombre VARCHAR2(100);
    v_correo VARCHAR2(100);

BEGIN

    SELECT id_empleado, nombre_empleado, correo
    INTO v_usuario_id, v_nombre, v_correo
    FROM USUARIO
    WHERE CORREO = p_correo AND PASSWORD_EMPLEADO = p_password;

    DBMS_OUTPUT.PUT_LINE('REGISTRO EXITOSO del usuario: '||' '||v_nombre);

EXCEPTION
    WHEN NO_DATA_FOUND THEN

        DBMS_OUTPUT.PUT_LINE('No se encontró ningún usuario con ese correo y contraseña.');
    WHEN OTHERS THEN

        DBMS_OUTPUT.PUT_LINE('Error: ' || SQLERRM);
END;

execute p_valida_usuario('owenlda252@gmail.com', 'prueba123');


--SP de select on validar_registro.php
CREATE OR REPLACE PROCEDURE p_insert_usuario(v_nombre_empleado in varchar2, v_correo in varchar2, v_password in varchar2)
    AS --bloque de declaracion de valariables para interaccion.
        
    BEGIN
        INSERT INTO USUARIO VALUES (autoUsuario.nextval, v_nombre_empleado, v_correo, v_password);
        dbms_output.put_line('');
    END;
    
execute  p_insert_usuario();



-- SP Para todos los select de views de PHP mediante las vistas.

--Consulta Producto
CREATE OR REPLACE PROCEDURE p_consulta_Productos
as
   
    begin
    
    for i in (   SELECT   ID_PRODUCTO,
                          ID_PROVEEDOR,
                          NOMBRE_PRODUCTO,
                          TIPO_PRODUCTO,
                          SERIE_PRODUCTO,
                          MODELO_PRODUCTO,
                          MARCA_PRODUCTO,
                          STOCK 
                from PRODUCTO )
    loop
        dbms_output.put_line('El numero de producto es: '||' '||i.ID_PRODUCTO
                            ||'   El nombre del producto es: '|| i.NOMBRE_PRODUCTO
                            ||'   La serie del producto es: '|| i.SERIE_PRODUCTO
                            ||'   El modelo del producto es: '|| i.MODELO_PRODUCTO
                            ||'   La marca del producto es:'|| i.MARCA_PRODUCTO
                            ||'   El stock del producto es:'|| i.STOCK
                            );
       end loop;                    
    end;
 
execute p_consulta_Productos;  



--Consulta Usuarios
CREATE OR REPLACE PROCEDURE p_consulta_Usuarios
as
   
    begin
    
    for i in (   SELECT   ID_PRODUCTO,
                          ID_PROVEEDOR,
                          NOMBRE_PRODUCTO,
                          TIPO_PRODUCTO,
                          SERIE_PRODUCTO,
                          MODELO_PRODUCTO,
                          MARCA_PRODUCTO,
                          STOCK 
                from PRODUCTO )
    loop
        dbms_output.put_line('El numero de producto es: '||' '||i.ID_PRODUCTO
                            ||'   El nombre del producto es: '|| i.NOMBRE_PRODUCTO
                            ||'   La serie del producto es: '|| i.SERIE_PRODUCTO
                            ||'   El modelo del producto es: '|| i.MODELO_PRODUCTO
                            ||'   La marca del producto es:'|| i.MARCA_PRODUCTO
                            ||'   El stock del producto es:'|| i.STOCK
                            );
       end loop;                    
    end;
 
execute p_consulta_Productos;  


















--CREACION DE FUNCIONES PARA LAS TABLAS           | INCLUIR CURSORES

set serveroutput on;

--Funcion para validar el login

create or replace NONEDITIONABLE FUNCTION f_select_validar_login(p_correo in varchar2, p_password in varchar2)
    RETURN VARCHAR2
        AS
        BEGIN
            SELECT USUARIO.CORREO, USUARIO.PASSWORD_EMPLEADO FROM USUARIO;
             IF CORREO = p_correo and PASSWORD_EMPLEADO = p_password  THEN
               RETURN ' Registro exitoso ';
            ELSE
              RETURN 'Correo Electronico o contrasena incorrecta, favor validar nuevamente los datos!';
            END IF;    
        END;



--Funcion para conocer cuantos articulos quedan de un solo producto
CREATE OR REPLACE FUNCTION obtener_stock_actual(p_id_producto in number) 
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT cantidad INTO v_resultado
  FROM vista_Producto_NM
  WHERE identificador = p_id_producto;
  RETURN v_resultado;
END;


select obtener_stock_actual(1501) as Cantidad_Actual from dual;


--funcion para conocer cuantos usuarios hay en la DB

CREATE OR REPLACE FUNCTION obtener_usuarios_DB 
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT count(Identificador) INTO v_resultado
  FROM vista_Usuarios_NM;
  RETURN v_resultado;
END;


select obtener_usuarios_DB as Cantidad_Usuarios_DB from dual;

--Funcion para conocer cuantos movimientos son de entrada
CREATE OR REPLACE FUNCTION obtener_tipos_movimientos_IN(p_categoria in VARCHAR2)
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT count(categoria) INTO v_resultado
    FROM vista_Tipo_Movimientos_NM WHERE categoria = p_categoria;
     RETURN v_resultado;
END;


select obtener_usuarios_DB('Salida') as Cantidad_Salidas from dual;

--Funcion para conocer cuantos movimientos son de salida
CREATE OR REPLACE FUNCTION obtener_tipos_movimientos_OUT(p_categoria in VARCHAR2)
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT count(categoria) INTO v_resultado
    FROM vista_Tipo_Movimientos_NM WHERE categoria = p_categoria;
     RETURN v_resultado;
END;


select obtener_usuarios_DB('Salida') as Cantidad_Salidas from dual;



--Funcion para contabilizar la cantidad de tipos de producto
CREATE OR REPLACE FUNCTION obtener_cantidad_Tipos_producto 
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT count(Identificador) INTO v_resultado
  FROM vista_tipo_producto_nm;
  RETURN v_resultado;
END;

select obtener_cantidad_tipos_producto as Cantidad_Tipos_Producto  from dual;

--Funcion para conocer cantidad de proveedores
CREATE OR REPLACE FUNCTION cuenta_Proveedores 
    RETURN NUMBER AS
    v_resultado number;
BEGIN
  SELECT count(Identificador) INTO v_resultado
  FROM vista_proveedor_nm;
  RETURN v_resultado;
END;

select cuenta_Proveedores as Cuenta_Proveedores  from dual;





--Alteracion de Secuencias

    ALTER SEQUENCE autoUsuario INCREMENT BY 10;
     ALTER SEQUENCE autoHistorico INCREMENT BY 10;
       ALTER SEQUENCE autoProveedor INCREMENT BY 10;
         ALTER SEQUENCE autoCliente INCREMENT BY 10;
          ALTER SEQUENCE autoProductos INCREMENT BY 10;