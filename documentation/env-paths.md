#ENV-VARS

Si estás utilizando el shell Zsh en lugar de Bash en macOS, necesitarás editar el archivo de configuración adecuado para Zsh en lugar de `.bash_profile`. El archivo de configuración para Zsh se llama `.zshrc`.

Aquí están los pasos actualizados para agregar `./vendor/bin/pest` globalmente en macOS utilizando Zsh:

1. Abre la Terminal en tu Mac.

2. Encuentra la ruta absoluta al directorio `./vendor/bin` en tu proyecto.

3. Abre el archivo `~/.zshrc` en un editor de texto. Puedes hacerlo ejecutando el siguiente comando en la Terminal:

   ```
   nano ~/.zshrc
   ```

4. Agrega la siguiente línea al final del archivo:

   ```
   export PATH="$PATH:/ruta/absoluta/al/vendor/bin"
   ```

   Reemplaza `/ruta/absoluta/al/vendor/bin` con la ruta absoluta que obtuviste en el paso 2.

5. Guarda los cambios en el archivo `~/.zshrc` y ciérralo.

6. Después de guardar los cambios, necesitas recargar el archivo `~/.zshrc` para que los cambios surtan efecto en tu sesión actual de Terminal. Puedes hacer esto ejecutando el siguiente comando en la Terminal:

   ```
   source ~/.zshrc
   ```

Una vez que hayas seguido estos pasos, deberías poder ejecutar `pest` globalmente desde cualquier directorio en tu Terminal en macOS con el shell Zsh.