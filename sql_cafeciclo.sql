create table Empleado(
  E_rut varchar(10),
  E_nombre varchar(30) NOT NULL,
  E_correo varchar(30),
  E_fono varchar(30) ,
  primary key (E_rut)
);

create table Proveedor(
  P_rut varchar(10),
  P_nombre varchar(30) NOT NULL,
  P_correo varchar(30),
  P_fono varchar(30) ,
  primary key (P_rut)
);

create table Cliente(
  C_rut varchar(10),
  C_nombre varchar(30) NOT NULL,
  C_correo varchar(30) ,
  C_fono varchar(30) ,
  primary key (C_rut)
);

create table Repone(
  Repo_ID int AUTO_INCREMENT,
  R_fecha date NOT NULL,
  primary key (Repo_ID)
);

create table Producto(
  P_ID int AUTO_INCREMENT,
  Prod_nombre varchar(30) NOT NULL,
  Unid_disp int,
  Precio int,
  primary key (P_ID)
);

create table Cotizacion(
  C_ID int AUTO_INCREMENT,
  C_rut varchar(10),
  hr_inicio date NOT NULL,
  hr_fin date NOT NULL,
  primary key (C_ID),
  foreign key (C_rut) references Cliente(C_rut)
);

create table Venta(
  V_ID int AUTO_INCREMENT,
  V_fecha date,
  V_hora time,
  Mont_total int,
  Mont_pagado int,
  Dscto int ,
  E_rut varchar(10),
  C_rut varchar(10),
  primary key (V_ID),
  foreign key (E_rut) references Empleado(E_rut),
  foreign key (C_rut) references Cliente(C_rut)
);

create table Prod_Vent(
  V_ID int,
  P_ID int,
  Unid_vend int NOT NULL,
  primary key (V_ID,P_ID),
  foreign key (V_ID) references Venta(V_ID),
  foreign key (P_ID) references Producto(P_ID)
);

create table Coti_Prod(
  C_ID int,
  P_ID int,
  primary key (C_ID,P_ID),
  foreign key (C_ID) references Cotizacion(C_ID),
  foreign key (P_ID) references Producto(P_ID)
);

create table Prod_Repo(
  Repo_ID int,
  P_ID int,
  primary key (Repo_ID,P_ID),
  foreign key (Repo_ID) references Repone(Repo_ID),
  foreign key (P_ID) references Producto(P_ID)
);

  create table Prov_Repo(
    Repo_ID int,
    P_rut varchar(10),
    primary key (Repo_ID,P_rut),
    foreign key (Repo_ID) references Repone(Repo_ID),
    foreign key (P_rut) references Proveedor(P_rut)
  );
