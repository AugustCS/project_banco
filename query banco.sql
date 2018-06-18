create database transacciones
use transacciones

create table operacion(
	id_operacion int not null primary key auto_increment,
    num_operacion int not null,
    nom_servicio varchar(100) not null,
    logica char(1),
    monto decimal(7,2),
    fecha date,
    saldo_antes decimal(7,2),
    saldo_actual decimal(7,2)
)

drop database transacciones
select num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual from operacion
insert into operacion(num_operacion,nom_servicio,logica,monto,fecha,saldo_antes,saldo_actual) values