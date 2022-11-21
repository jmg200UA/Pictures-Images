El objetivo es crear un sistema gestor de álbumes de fotos que admita múltiples usuarios, una especie de
flickr o Instagram, pero de juguete. Un usuario se tendrá que registrar para poder emplear el sistema
y publicar fotos. Una vez registrado, podrá crear todos los álbumes que quiera y en cada álbum podrá
publicar todas las fotos que quiera. Para visualizar las fotos no es necesario estar registrado: cualquiera
puede ver los álbumes y sus fotos, aunque no con la máxima resolución y con toda la información existente.
Desde el punto de vista del control de acceso (seguridad), la aplicación web (o sitio web) está divida
en tres partes:
La parte pública es la parte abierta a la que tiene acceso cualquier usuario, ya que no hace falta
estar registrado para su consulta.
La parte pública restringida es la parte abierta a la que sólo tienen acceso los usuarios que estén
registrados y se hayan identificado (logueado). Es pública porque es común a múltiples usuarios (no
es única a cada usuario), pero es restringida porque sólo es accesible por los usuarios registrados.
La parte privada es la parte personal de cada usuario, a la que sólo tiene acceso el usuario correspondiente.
