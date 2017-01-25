create table Provincia(
  idProvincia int(2) AUTO_INCREMENT,
  nombre varchar(30) not null,
  PRIMARY KEY (idProvincia)

);
create table Departamento(
    idDepartamento int(6) AUTO_INCREMENT, 
    nombre varchar(150) not null, 
    idProvincia int(2), 
    PRIMARY KEY(idDepartamento), 
    FOREIGN KEY (idProvincia) REFERENCES Provincia (idProvincia) 
);

create table Localidad(
    idLocalidad int(6)  AUTO_INCREMENT, 
    nombre varchar(150) not null, 
    codPostal int(5) not null, 
    idDepartamento int(6), 
    PRIMARY KEY(idLocalidad), 
    FOREIGN KEY (idDepartamento) REFERENCES Departamento (idDepartamento) 
);


create table usuarioSys( 
  idUsuario int(6) not null AUTO_INCREMENT, 
  nomyap varchar(150) not null, 
  usuario varchar(10) not null, 
  contraseña varchar(100), dni int(8), 
  telefono int (20), direccion varchar(100), 
  email varchar(100), idLocalidad int(6), 
  tipoUsuario CHARACTER(1), 
  PRIMARY key (idUsuario), 
  FOREIGN KEY (idLocalidad) REFERENCES Localidad (idLocalidad) 
  );

create table usuarioEscribano
( 
    idEscribano int(6) not null AUTO_INCREMENT, 
    nomyap varchar(150) not null, 
    usuario varchar(10) not null unique, 
    contraseña varchar(100), 
    dni int(8), 
    telefono int (20), 
    direccion varchar(100), 
    email varchar(100), 
    matricula int(8) not null,
    estadoAprobacion CHARACTER(1),
    idLocalidad int(6), 
    idUsuario int(6),
    motivoRechazo varchar(100),
    PRIMARY key (idEscribano), 
    FOREIGN KEY (idLocalidad) REFERENCES Localidad (idLocalidad) ,
     FOREIGN KEY (idUsuario) REFERENCES usuarioSys (idUsuario) 
);

create table Minuta(
    idMinuta int(8) not null AUTO_INCREMENT,
    idEscribano int(6) not null,
    idUsuario int(6),
    fechaIngresoSys datetime not null,
    fechaEdicion datetime,
    PRIMARY key (idMinuta), 
    FOREIGN KEY (idEscribano) REFERENCES usuarioEscribano (idEscribano),
    FOREIGN KEY (idUsuario) REFERENCES usuarioSys (idUsuario)
    );
    
    create table EstadoMinuta(
    idEstadoMinuta int(8) not null AUTO_INCREMENT,
    idMinuta int(8) not null,
    estadoMinuta CHARACTER(1) not null,
    motivoRechazo varchar(200),
    fechaEstado datetime,
    idUsuario int(6),
    PRIMARY key (idEstadoMinuta), 
    FOREIGN KEY (idMinuta) REFERENCES Minuta (idMinuta),
    FOREIGN KEY (idUsuario) REFERENCES usuarioSys (idUsuario)
    );

  create table Parcela(
      idParcela int(8) not null AUTO_INCREMENT,
        idDepartamento int(6) not null,
        idLocalidad int(6) not null,
        circunscripcion  varchar(8) not null,
        seccion CHARACTER(1) not null,
        chacra int(4),
        quinta int(4),
        fraccion varchar(8),
        manzana varchar(5),
        parcela varchar(6),
        superficie varchar(10) not null,
        partida int(6) not null,
        tipoPropiedad CHARACTER(1) not null,
        planoAprobado varchar(10) not null,
        fechaPlanoAprobado date,
        descripcion varchar(300),
        idMinuta int(8) not null,
        nroMatriculaRPI int(8) not null,
        fechaMatriculaRPI date not null,
        tomo int(5),
        folio int(5),
        finca int(5),
        año int(4),
    PRIMARY key (idParcela), 
    FOREIGN KEY (idDepartamento) REFERENCES Departamento (idDepartamento),
    FOREIGN KEY (idLocalidad) REFERENCES Localidad (idLocalidad),
    FOREIGN KEY (idMinuta) REFERENCES Minuta (idMinuta)
    );

  create table Propietario( 
    idParcela int(8), 
    titular varchar(150), 
    dni int(8), direccion varchar(100), 
    idLocalidad int(6),
    cuitCuil int(15), conyuge varchar(150), 
    fechaEscritura date, 
    porcentajeCondominio float, 
    nroUfUc varchar(10), 
    tipoUfUc CHARACTER(1), 
    planoAprobado varchar(10), 
    fechaPlanoAprobado date, 
    porcentajeUfUc float, 
    poligonos varchar(50), 
    FOREIGN KEY (idParcela) REFERENCES Parcela (idParcela), 
    FOREIGN KEY (idLocalidad) REFERENCES Localidad (idLocalidad) 
    );
  
  create table Pedidos(
    idPedido int(6) AUTO_INCREMENT,
    idEscribano int(8),
    descripcion varchar(200),
    fechaPedido datetime,
    estadoPedido CHARACTER(1),
    rtaPedido varchar(200),
    fechaRta datetime,
    idUsuario int(6),
    PRIMARY KEY (idPedido),
    
    FOREIGN KEY (idUsuario) REFERENCES usuarioSys (idUsuario),
      FOREIGN KEY (idEscribano) REFERENCES usuarioEscribano (idEscribano),
      FOREIGN KEY (idUsuario) REFERENCES usuarioSys (idUsuario)
    )
    