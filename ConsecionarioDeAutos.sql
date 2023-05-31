---------------Crear Base de Datos---------------------
USE master;
GO
IF DB_ID (N'ConsecionarioDeAutos') IS NOT NULL
  DROP DATABASE ConsecionarioDeAutos;
GO
CREATE DATABASE ConsecionarioDeAutos
ON
( NAME = ConsecionarioDeAutos_dat,
   FILENAME = 'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS02\MSSQL\DATA\ConsecionarioDeAutos.mdf',
   SIZE = 10,
   MAXSIZE = 50,
   FILEGROWTH = 5)
LOG ON
( NAME = GestionDeExamenes_log,
       FILENAME = 'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS02\MSSQL\DATA\ConsecionarioDeAutos.ldf',
	   SIZE = 5,
	   MAXSIZE = 25,
	   FILEGROWTH = 5);
GO

USE ConsecionarioDeAutos;
GO
---------------TABLAS----------
CREATE TABLE AutoUsado  
(
  idAutoUsado  INT IDENTITY(1,1),
  precioTransaccion MONEY NOT NULL,
  marca VARCHAR(50) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  matricula VARCHAR(50) NOT NULL,
  estatus BIT NOT NULL DEFAULT 1,
  idCliente INT NOT NULL,
  fechaCesion DATE NOT NULL
  CONSTRAINT PK_AutoUsado PRIMARY KEY (idAutoUsado)
  );
  CREATE TABLE Cliente  
(
  idCliente INT IDENTITY(1,1),
  nombre VARCHAR(50) NOT NULL,
  rfc VARCHAR(50) NOT NULL,
  apellidoPaterno VARCHAR(50) NOT NULL,
  apellidoMaterno VARCHAR(50) NOT NULL,
  direccion VARCHAR(50) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  estatus BIT NOT NULL DEFAULT 1,
  idVenta INT NOT NULL
  CONSTRAINT PK_Cliente PRIMARY KEY (idCliente)
  );
  CREATE TABLE Vendedor  
(
  idVendedor INT IDENTITY(1,1),
  nombre VARCHAR(50) NOT NULL,
  rfc VARCHAR(50) NOT NULL,
  apellidoPaterno VARCHAR(50) NOT NULL,
  apellidoMaterno VARCHAR(50) NOT NULL,
  direccion VARCHAR(80) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  estatus BIT NOT NULL DEFAULT 1
  CONSTRAINT PK_Vendedor PRIMARY KEY (idVendedor)
  );
  CREATE TABLE Venta  
(
  idVenta INT IDENTITY(1,1),
  matriculaCoche VARCHAR(50) NOT NULL,
  fechaVenta DATE NOT NULL,
  estatus BIT NOT NULL DEFAULT 1,
  idVendedor INT NOT NULL,
  idVehículo INT NOT NULL
  CONSTRAINT PK_Venta PRIMARY KEY (idVenta)
  );
   CREATE TABLE Opcion  
   (
  idOpcion INT IDENTITY (1,1),
  nuOpcion INT NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(50) NOT NULL,
  estatus BIT NOT NULL DEFAULT 1
  CONSTRAINT PK_Opcion PRIMARY KEY (idOpcion)
  );
  
   CREATE TABLE Vehículo    
(
  idVehículo INT IDENTITY(1,1),
  precioTransaccion MONEY NOT NULL,
  marca VARCHAR(50) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  matricula VARCHAR(50) NOT NULL,
  cilindros INT NOT NULL,
  estatus BIT NOT NULL DEFAULT 1
  CONSTRAINT PK_Vehículo PRIMARY KEY (idVehículo)
  );

  CREATE TABLE Usuario    
(
  idUsuario INT IDENTITY(1,1),
  nombre VARCHAR(50) NOT NULL,
  email VARCHAR(25) NOT NULL,
  clave VARCHAR(20) NOT NULL,
  telefono VARCHAR(11) NOT NULL,
  estatus BIT NOT NULL DEFAULT 1,
  idVenta INT NOT NULL
  CONSTRAINT PK_Usuario PRIMARY KEY (idUsuario)
  );
   CREATE TABLE VentaOpcion   
(
  idVentaOpcion INT IDENTITY(1,1),
  idVenta INT NOT NULL,
  idOpcion INT NOT NULL,
  estatus BIT NOT NULL DEFAULT 1
  CONSTRAINT PK_VentaOpcion PRIMARY KEY (idVentaOpcion)
  );
  CREATE TABLE VehículoOpcion    
(
  idVehículoOpcion  INT IDENTITY(1,1),
  idVehículo INT NOT NULL,
  idOpcion INT NOT NULL,
  precio MONEY NOT NULL,
  estatus BIT NOT NULL DEFAULT 1
  CONSTRAINT PK_VehículoOpcion PRIMARY KEY (idVehículoOpcion)
  );
 
   -----------------------Indices-----------------------
CREATE INDEX IX_AutoUsado ON AutoUsado (idAutoUsado);
CREATE INDEX IX_Cliente ON Cliente (idCliente);
CREATE INDEX IX_Vendedor ON Vendedor (idVendedor);
CREATE INDEX IX_Venta ON Venta (idVenta);
CREATE INDEX IX_Opcion ON Opcion (idOpcion);
CREATE INDEX IX_Vehículo ON Vehículo (idVehículo);
CREATE INDEX IX_Usuario ON Usuario (idUsuario);
CREATE INDEX IX_VentaOpcion ON VentaOpcion (idVentaOpcion);
CREATE INDEX IX_VehículoOpcion ON VehículoOpcion (idVehículoOpcion);
GO
---------------------Relaciones--------------------
ALTER TABLE AutoUsado  
   ADD CONSTRAINT FK_AutoUsadoCliente 
   FOREIGN KEY (idCliente) REFERENCES Cliente (idCliente);
GO
ALTER TABLE Cliente  
   ADD CONSTRAINT FK_ClienteVenta 
   FOREIGN KEY (idVenta) REFERENCES Venta (idVenta);
GO
ALTER TABLE Venta  
   ADD CONSTRAINT FK_VentaVendedor
   FOREIGN KEY (idVendedor) REFERENCES Vendedor (idVendedor);
GO
ALTER TABLE Venta  
   ADD CONSTRAINT FK_VentaVehículo
   FOREIGN KEY (idVehículo) REFERENCES Vehículo (idVehículo);
GO
ALTER TABLE VentaOpcion   
   ADD CONSTRAINT FK_VentaOpcionVenta
   FOREIGN KEY (idVenta) REFERENCES Venta (idVenta);
GO
ALTER TABLE VentaOpcion   
   ADD CONSTRAINT FK_VentaOpcionOpcion
   FOREIGN KEY (idOpcion) REFERENCES Opcion (idOpcion);
GO
ALTER TABLE VehículoOpcion    
   ADD CONSTRAINT FK_VehículoOpcionVehículo
   FOREIGN KEY (idVehículo) REFERENCES Vehículo (idVehículo);
GO
ALTER TABLE VehículoOpcion    
   ADD CONSTRAINT FK_VehículoOpcionOpcion
   FOREIGN KEY (idOpcion) REFERENCES Opcion (idOpcion);
GO
ALTER TABLE Usuario  
   ADD CONSTRAINT FK_UsuarioVenta
   FOREIGN KEY (idVenta) REFERENCES Venta (idVenta);
GO

SELECT * FROM Vendedor

INSERT INTO Vendedor VALUES ('Juan','BAFJ701213SB10','Barrios','Fernández','PROLONGACION JUAREZ, CENTRO MONCLOVA 61115', '866-340-01-42', 1)
INSERT INTO Vendedor VALUES ('Francisco','OIPF790205P26','Ortíz','Pérez','PROLONGACION JUAREZ, CENTRO MONCLOVA 61115','866-176-62-34',1)
INSERT INTO Vendedor VALUES ('Manuel','MAHM670102NJA','Martínez','Hernández','ATILANO BARRERA, BORJAS FRONTERA 61114','866-257-66-03',1)
INSERT INTO Vendedor VALUES ('Manuel','CAGM6406181Y9','Chávez','González','CARRETERA 57, CALIFORNIA CASTAÑOS 61113','866-257-78-40',1)
INSERT INTO Vendedor VALUES ('Felipe','CALF750228LK7','Camargo','Llamas','COLINAS DE SANTIAGO MONCLOVA 2570','866-183-16-23',1)

SELECT * FROM Opcion
INSERT INTO Opcion VALUES ('Particulares','Obtener una mejor oferta en venta de carros usados',1,100)
INSERT INTO Opcion VALUES ('Agencias','Coche a cambio de uno nuevo',1,200)
INSERT INTO Opcion VALUES ('Contado','Cubrir el costo total del vehículo',1,350)
INSERT INTO Opcion VALUES ('Autofinanciamiento','Realizan aportaciones mensuales',1,99)
INSERT INTO Opcion VALUES ('Crédito automotriz','Pagarás el automóvil gradualmente con intereses',1,120)

SELECT * FROM Vehículo
INSERT INTO Vehículo VALUES (107990,'Tesla','Model S','AAA-AFZ',4,1)
INSERT INTO Vehículo VALUES (240000,'Toyota','Corolla','AGA-CYZ',4,1)
INSERT INTO Vehículo VALUES (170000,'Suzuki','Ignis','CZA-DEZ',1,1)
INSERT INTO Vehículo VALUES (140000,'Seat','Ibiza','DLA-DSZ',3,1)
INSERT INTO Vehículo VALUES (40000,'Volvo','S60','FRA-FWZ',4,1)

SELECT * FROM Venta
INSERT INTO Venta VALUES ('AAA-AFZ','02-21-2012',1,1,1)
INSERT INTO Venta VALUES ('AGA-CYZ','05-02-2022',1,2,2)
INSERT INTO Venta VALUES ('CZA-DEZ','02-01-2023',1,3,3)
INSERT INTO Venta VALUES ('DLA-DSZ','06-18-2022',1,4,4)
INSERT INTO Venta VALUES ('FRA-FWZ','02-28-2023',1,5,5)

SELECT * FROM Usuario
INSERT INTO Usuario VALUES ('Administrador 1', 'admin@gmail.com', 'Admin', '8666323640', 1, 1)
INSERT INTO Usuario VALUES ('Administrador 2', '12345@gmail.com', '12345', '8666332545', 1,2)
INSERT INTO Usuario VALUES ('Administrador 3', 'cris_des12@hotmail.com', 'Cris110100', '8666337978', 1,3)
INSERT INTO Usuario VALUES ('Administrador 4', '25790@gmail.com', '25790', '8662577840', 1,4)
INSERT INTO Usuario VALUES ('Administrador 5', 'elizondo@gmail.com', 'Cristobal', '8661831623', 1,5)

SELECT * FROM Cliente 
INSERT INTO Cliente VALUES ('Alvaro', 'OLAL701201R94', 'de la O', 'Lozano', 'Colinas de Santiago polvorin 1011','(55)5633-9104', 1,1)
INSERT INTO Cliente VALUES ('Ernesto', 'ERER6711209E4', 'Ek', 'Rivera', 'Praderas Valle San Angel 1015', '(55)5290-3598', 1,2)
INSERT INTO Cliente VALUES ('Dolores', 'SADD7808121G8', 'San Martín', 'Dávalos','Occidental Privada Marquez  1110','(55)2457-2929', 1,3)
INSERT INTO Cliente VALUES ('Mario', 'SAGM690224FL0', 'Sánchez de la Barquera', 'Gómez', 'PROLONGACION JUAREZ CENTRO 6111','(844) 485 1606', 1,4)
INSERT INTO Cliente VALUES ('Antonio', 'JIPA770808M40', 'Jiménez', 'Ponce de León', 'Colinas de Santiago Indios 290','(844) 431 1747', 1,5)

SELECT * FROM AutoUsado
INSERT INTO AutoUsado VALUES (200000,'Renault', 'Kiger', 'ZDA-ZHZ',1,1,'12-30-2021')
INSERT INTO AutoUsado VALUES (163310,'Nissan', 'Micra', 'XYA-YVZ',1,2,'05-15-2023')
INSERT INTO AutoUsado VALUES (150000,'Peugeot', '308', 'XTA-XXZ',1,3,'11-19-2022')
INSERT INTO AutoUsado VALUES (122002,'Porsche', '911', 'WLA-WWZ',1,4,'11-25-2022')
INSERT INTO AutoUsado VALUES (350000,'MG', 'Marvel R', 'EUA-FPZ',1,5,'09-25-2023')

SELECT * FROM VentaOpcion
INSERT INTO VentaOpcion VALUES (1,1,1)
INSERT INTO VentaOpcion VALUES (2,2,1)
INSERT INTO VentaOpcion VALUES (3,3,1)
INSERT INTO VentaOpcion VALUES (4,4,1)
INSERT INTO VentaOpcion VALUES (5,5,1)

SELECT * FROM VehículoOpcion
INSERT INTO VehículoOpcion VALUES (1,1,1,50000)
INSERT INTO VehículoOpcion VALUES (2,2,1,40000)
INSERT INTO VehículoOpcion VALUES (3,3,1,20000)
INSERT INTO VehículoOpcion VALUES (4,4,1,30000)
INSERT INTO VehículoOpcion VALUES (5,5,1,10000)
