/* CREATE TABLE poslatlog ( id int(255) auto_increment not null,
                         id_posicion int(255) not null,
                         latitud     float not null,
                         longitud    float not null,
                         fecha       date not null,
                         hora        date not null,
                         constraint pk_poslatlog PRIMARY KEY(id),
                         constraint uq_id_posicion UNIQUE(id_posicion)
)ENGINE = InnoDb; */

