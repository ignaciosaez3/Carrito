
CREATE TABLE Sucursal
(
	idSucursal					INT 			PRIMARY KEY auto_increment,
	nombre						VARCHAR(100)	NOT NULL,
	activo						TINYINT			NOT NULL,
	UNIQUE( nombre)
);

CREATE TABLE Usuario
(
	idUsuario					INT 			PRIMARY KEY auto_increment,
	idSucursal					INT				NOT NULL,
	rut							INT				NOT NULL,
	digito						VARCHAR(1)		NOT NULL,
	nombre						VARCHAR(50)		NOT NULL,
	paterno						VARCHAR(50)		NOT NULL,
	materno						VARCHAR(50)		NOT NULL,
	clave						VARCHAR(50)		NOT NULL,
	activo						TINYINT			NOT NULL,
	esVendedor					TINYINT			NOT NULL,
	UNIQUE(rut)
);

CREATE TABLE Marca
(
	idMarca						INT 			PRIMARY KEY auto_increment,
	nombre						VARCHAR(100)	NOT NULL,
	activo						TINYINT			NOT NULL,
	UNIQUE( nombre)
);

CREATE TABLE Proveedor
(
	idProveedor					INT 			PRIMARY KEY auto_increment,
	nombre						VARCHAR(100)	NOT NULL,
	activo						TINYINT			NOT NULL,
	UNIQUE(nombre)
);


CREATE TABLE TipoProducto
(
	idTipoProducto				INT 			PRIMARY KEY auto_increment,
	nombre						VARCHAR(100)	NOT NULL,
	activo						TINYINT			NOT NULL,
	UNIQUE(nombre)
);

CREATE TABLE Producto
(
	idProducto					INT 			PRIMARY KEY auto_increment,
	idMarca						INT				NOT NULL,
	idProveedor					INT				NOT NULL,
	idTipoProducto				INT				NOT NULL,
	codigo						INT				NOT NULL,
	descripcion					VARCHAR(2000)	NOT NULL,
	stock						INT				NOT NULL,
	stockMinimo					INT				NOT NULL, 
	precio						INT				NOT NULL,	
	activo						TINYINT			NOT NULL,
	UNIQUE(codigo),
	FOREIGN KEY(idMarca)
			REFERENCES Marca(idMarca),
	FOREIGN KEY(IdProveedor)
			REFERENCES Proveedor(idProveedor),
	FOREIGN KEY(idTipoProducto)
			REFERENCES TipoProducto(idTipoProducto)
);

CREATE TABLE Boleta
(
	idBoleta					INT				PRIMARY KEY auto_increment,
	idUsuario					INT				NOT NULL,
	idSucursal					INT				NOT NULL,
	fecha						DATE			NOT NULL,
	total						INT				NOT NULL,
	FOREIGN KEY(IdUsuario)
			REFERENCES Usuario(IdUsuario),
	FOREIGN KEY(idSucursal)
			REFERENCES Sucursal(idSucursal)
);

CREATE TABLE Detalle
(
	idDetalle					INT				PRIMARY KEY auto_increment,
	idBoleta					INT				NOT NULL,
	idProducto					INT				NOT NULL,
	cantidad					INT				NOT NULL,
	precio						INT				NOT NULL,
	subTotal					INT				NOT NULL,
	FOREIGN KEY(idBoleta)
			REFERENCES Boleta(idBoleta),
	FOREIGN KEY(idProducto)
			REFERENCES Producto(idProducto)
);
