# Practica 1: Creacion de clases y Encapsulamiento en PHP

## Objetivo de la practica
Aplicar los fundamentos de la programacion orientada a objetos en PHP, implementando una clase con atributos privados, constructor y metodos de acceso, siguiendo buenas practicas de encapsulamiento.

## Deciocion de la clase creada

### Clase usuario
La clase "Usuario" demuestra los principios fundamentales de POO.

**Atributos privados (encapsulamiento):**
-   "$nombre": Almacena el nombre del usuario
-   "$correo": Almacena el correo electronico del usuario

**Metodos implementados:**
-   "__contruct($nombre, $correo)": Constructor que inicializa los atributos
-   "getNombre()": Getter para obtener el nombre
-   "getCorreo()": Getter para obtener el correo
-   "setNombre($nombre)": Setter para modificar el nombre
-   "setCorreo($correo)": Setter para modificar el correo con validacion basica
-   "mostrarInformacion()": Metodo adicional que retorna la informacion completa

## Intruciones de ejecucion

### Requisitos previos
-   PHP 8 o superior
-   Servidor local (XAMPP, WAMP, o similares)
-   Git (para control de versiones)

### Pasos para ejectuar

1.- **Clonar el repositorio**
    '''bash
    git clone https://github.com/brualexiscv11/desarrollo-web-avanzado-fimaz-uas/tree/634052c46c5c7f766af9f233a095da4370aefe34/Parcial-1-poo/Practica-1

2.- **Meter en el repositorio en la carpeta htdocs de XAMPP**

3.- **Ingresar desde cualquier navegador a localhost/Parcial-1-poo/Practica-1/**
