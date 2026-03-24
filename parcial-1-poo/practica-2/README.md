
Práctica 2: Herencia y reutilización de código en PHP

 Explicación de la herencia aplicada

En esta práctica se implementó el concepto de herencia en PHP utilizando una clase base llamada Usuario. Esta clase contiene atributos como nombre y correo, así como sus respectivos métodos para acceder y modificar los datos.

Posteriormente se creó una clase Admin que extiende de Usuario, lo que permite reutilizar todo el código ya existente sin necesidad de volver a escribirlo. Esto facilita el desarrollo y mantiene el código más organizado.

Diferencias entre Usuario y Admin

La clase Usuario representa a cualquier usuario del sistema, ya que contiene información básica como nombre y correo.

Por otro lado, la clase Admin hereda estas características, pero además agrega un método propio llamado getRol(), el cual devuelve el rol de "Administrador". Esto demuestra cómo una clase hija puede ampliar las funcionalidades de una clase base.

Evidencia de ejecución

Se creó un archivo index.php donde se instancia un objeto de tipo Admin. A través de este objeto se accede a los métodos heredados (getNombre y getCorreo) y al método propio (getRol), mostrando correctamente la información en pantalla.

Conclusión

La herencia es una herramienta muy útil en la programación orientada a objetos, ya que permite reutilizar código y hacer más eficiente el desarrollo. En esta práctica se comprobó su funcionamiento al crear una clase derivada que extiende las capacidades de una clase base sin duplicar código.
