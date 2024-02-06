# Attestto - Republic
---
## Requisitos Previos
Antes de comenzar, asegúrate de tener instalados los siguientes requisitos en tu entorno de desarrollo:

- [Composer](https://getcomposer.org/)
- PHP 8.3+
- [Node.js](https://nodejs.org/)
- npm o yarn
- [Docker Desktop](https://www.docker.com/products/docker-desktop)

## Configuración del Entorno

### Configuración General
1. Si necesitas soporte HTTPS (por ejemplo, para WebAuthn), puedes utilizar un archivo SQLite local o instalar un servidor MySQL local. Si optas por MySQL, puedes seguir la guía de instalación en [Herd](https://herd.laravel.com/).
2. Si -HTTP- es suficiente, puedes utilizar Sail junto con Docker Desktop. Este entorno ya proporciona todas las herramientas necesarias para el desarrollo, incluyendo MySQL y otros motores.

### Instrucciones Paso a Paso

#### 1. Clonar el Repositorio
```bash
git clone [URL_DEL_REPOSITORIO]
cd Laravel-Jetstream-Vue
```

#### 2. Instalar Dependencias de Composer
```bash
composer install
```

#### 3. Instalar Dependencias de Node
```bash
npm install
```

#### 4. Configuración de Sail (Opcional)
- Si optas por utilizar Sail, asegúrate de tener Docker Desktop instalado.
- Ejecuta `./vendor/bin/sail up -d` para iniciar los contenedores de Docker.
- Puedes acceder a la aplicación en [http://localhost](http://localhost).

#### 5. Configuración de SSL con HERD (MAC)

Si prefieres utilizar la interfaz de línea de comandos (CLI), puedes utilizar el comando `herd secure` para asegurar o desasegurar un sitio. Por ejemplo, si tu sitio se está sirviendo a través de Herd en el dominio laravel.test, deberías ejecutar el siguiente comando para asegurarlo:

```bash
herd secure example-site
```

Para "desasegurar" un sitio y revertir a servir su tráfico a través de HTTP sin cifrado, utiliza el comando `unsecure`. Al igual que el comando `secure`, este comando acepta el nombre del sitio que deseas desasegurar:

```bash
herd unsecure example-site
```

---

### Pruebas con Desarrollo Guiado por Test (TDD) utilizando PEST

Si prefieres seguir un enfoque de Desarrollo Guiado por Test (TDD) utilizando PEST, puedes utilizar los siguientes pasos:

1. **Instalación de PEST:**
   - Asegúrate de tener PEST instalado en tu proyecto Laravel. Puedes instalarlo utilizando Composer:
   
   ```bash
   composer require --dev pestphp/pest laravel/pest-plugin
   ```

2. **Crear Archivos de Pruebas:**
   - Crea archivos de pruebas utilizando la convención de nombres de PEST, por ejemplo, `ExampleTest.php`. 

   ```bash
   php artisan pest:generate ExampleTest
   ```

3. **Ejecutar Pruebas:**
   - Ejecuta tus pruebas con el comando `pest`:

   ```bash
   ./vendor/bin/pest
   ```

4. **Desarrollo de Funcionalidades:**
   - Desarrolla tu código para que pase las pruebas. PEST proporciona una rápida retroalimentación durante el desarrollo.

5. **Iterar:**
   - Continúa iterando entre el desarrollo de funcionalidades y la ejecución de pruebas hasta que tu aplicación cumpla con los requisitos.


---


### Pruebas de Navegador con Dusk

Si prefieres realizar pruebas de navegador, puedes utilizar Laravel Dusk. A continuación, se describen los pasos básicos:

1. **Instalación de Dusk:**
   - Asegúrate de tener Dusk instalado en tu proyecto Laravel. Puedes instalarlo utilizando Composer:

   ```bash
   composer require --dev laravel/dusk
   php artisan dusk:install
   ```

2. **Configuración de Entorno para Pruebas:**
   - Configura el archivo `.env.dusk` con la información específica de tu entorno de prueba. Asegúrate de tener una base de datos separada para las pruebas.

3. **Ejecutar Pruebas de Dusk:**
   - Ejecuta tus pruebas de Dusk con el comando `php artisan dusk`.

   ```bash
   php artisan dusk
   ```

4. **Crear y Ejecutar Pruebas:**
   - Crea tus pruebas en el directorio `tests/Browser` y asegúrate de seguir las convenciones de nombres de Dusk.

   ```bash
   php artisan dusk:make ExampleTest
   ```

   - Ejecuta tus pruebas de Dusk:

   ```bash
   php artisan dusk
   ```

5. **Desarrollo de Funcionalidades:**
   - Desarrolla y ajusta tu aplicación para que pase las pruebas de Dusk.

6. **Iterar:**
   - Continúa iterando entre el desarrollo de funcionalidades y la ejecución de pruebas de Dusk hasta que tu aplicación cumpla con los requisitos.





## Contribución a Proyecto en GitHub

Si estás interesado/a en contribuir a este proyecto en GitHub, a continuación se describen las instrucciones básicas:

### 1. **Fork del Repositorio:**
   - Haz clic en el botón "Fork" en la parte superior derecha de la página para crear tu propia copia del repositorio en tu cuenta de GitHub.

### 2. **Clonar Repositorio Forked:**
   - Clona tu repositorio forked en tu máquina local utilizando el siguiente comando:

   ```bash
   git clone [URL_DE_TU_REPOSITORIO_FORKED]
   ```

### 3. **Añadir Repositorio Original como Remoto (Opcional):**
   - Añade el repositorio original como un remoto para poder sincronizar los cambios. 

   ```bash
   git remote add upstream [URL_DEL_REPOSITORIO_ORIGINAL]
   ```

### 4. **Crear Rama para Nueva Funcionalidad o Corrección:**
   - Crea una rama local para trabajar en tu nueva funcionalidad o corrección:

   ```bash
   git checkout -b nombre-rama
   ```

### 5. **Realizar Cambios y Commit:**
   - Realiza los cambios necesarios y realiza un commit:

   ```bash
   git add .
   git commit -m "Descripción del cambio"
   ```

### 6. **Subir Cambios a Repositorio Forked:**
   - Sube tus cambios a tu repositorio forked en GitHub:

   ```bash
   git push origin nombre-rama
   ```

### 7. **Crear Pull Request:**
   - Desde tu repositorio forked en GitHub, haz clic en el botón "New Pull Request". Describe tus cambios y crea la solicitud de extracción (pull request).

### 8. **Revisión y Fusión:**
   - Espera a que los colaboradores revisen tu pull request. Puede haber comentarios o solicitudes de cambios. Una vez revisado, se fusionarán tus cambios al repositorio original.

### 9. **Sincronizar Cambios con Repositorio Original (Opcional):**
   - Si has añadido el repositorio original como remoto, puedes sincronizar tu repositorio local con los cambios del original:

   ```bash
   git fetch upstream
   git merge upstream/main
   ```

Siguiendo estos pasos, estarás contribuyendo de manera efectiva al proyecto. Asegúrate de seguir las guías de contribución específicas del proyecto si las hay. ¡Gracias por tu colaboración!

## Configuración y Puesta en Marcha (Ambiente Local):
   - Haz clic en el botón "Fork" en la parte superior derecha de la página para crear tu propia copia del repositorio en tu cuenta de GitHub.

### 2. **Front-End:**
   - Vue.js + Innertia.js + Tailwind.css + Flowbite UI. 
   - Vite.js 

   ```bash
   npm run dev
   ```   
### 2. **Back-End:**
   - Laravel 10+ 
   - PHP 8.3+ 

   ```bash
   php artisan serve || sail up 
   ```  
   - You may also need to add your domain into your /etc/hosts file 

   ```bash
   sudo vi /etc/hosts 
   127.0.0.1 yourdomain.test 
   ```  

## Documentación y Estándares Espécificos del Proyecto:
   - [Documentación](./documentation)
