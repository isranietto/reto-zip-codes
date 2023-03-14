<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Zip Codes

Esta es una prueba técnica, para instalar, clone el proyecto, configure su ambiente como normalente lo realiza y cree una base de datos. 

## Llenado de base de datos.
- Una vez tenga configurada la infomación de la base de datos, corra las migraciones
- `php artinsa migrate`
- Revise que el archivo CPdescarga.xml esté en la siguiente ubicación de carpeta
  - `app/Imports/CPdescarga.xml`
- En consola corra el siguiente comando.
    - `php artisan file:import CPdescarga.xml`
- Espere a que aparesca el mensaje de `The import was successful!`.
- Realice una búsqueda de código en su ambiente local, ejemplo: [https://mi-prueba-tecnica.test/api/zip-codes/31313](#).

## Tests 

Para correr las pruebas unitarias correctamtente, cree una nueva base de datos con el mismo nombre que la enterios, solo agrege el sufijo `_tests` al final, ejemplo:

- Si ustede generos una base de datos `zip_codes`, esta sera nuestra base de datos principal, `zip_codes_tests` sera la base de datos que utilizaremos para nuestras pruebas 
- Corra el comando `php artisa migrate --database=mysql_tests`

Corra las pruebas unitarias y comprueben que esten pasando. 

## Justificación

Para la parte de Importación se genera una estructura que sea capas de agregar varios tipos de Documentos de Importación, 
esto en **ZipImportContext** en el arreglo `$import_files`, de momento solo acepta archivos xml (por que solo cuenta con la Clase para xml) y con una estructura definida, 
que son los nombres de las columnas de nuestra tabla para códigos, esta sería la estructura de nuestro archivo xml.

- Tag Princial
    - Row
      - Columnas de zip codes

``` 
<NewDataSet>
    <table>
        <d_codigo>0001</d_codigo>
        <d_asenta>San Ángel</d_asenta>
        ....etc
    </table>
<NewDataSet>
```

Se utilizó conceptos de Patrones de diseño, particular mente el patron Strategy y en Pruebas unitarias conceptos como Test Doubles.

> "Hablar es barato. Enséñame el código" - Linus Torvalds
