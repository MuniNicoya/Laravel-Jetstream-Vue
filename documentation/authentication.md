# WebAuthn & Multiples Factores de Autenticación (MFA)

Después de que el usuario se registra, es direciconado a la pagina de Perfil en donde puede configurar los mecanismos de double factor de autenticación, como el OTP y Firma Digital con llave Público-Privada. 


## Frases Secretas (contraseñas)

Las frases secretas se originan Server-Side en un flujo similar al de las llaves de WebAuthn. Las frases están compuestas por una serie de palabras localizadas de forma que es más fácil de recordar para los usuarios. 

[esquema en modo texto del flujo]

## WebAuthm 

WebAuthn, o Autenticación Web, es un estándar de seguridad que permite a los usuarios autenticarse en servicios en línea de forma más segura y sin contraseñas tradicionales. Utiliza dispositivos autenticadores como llaves de seguridad, huellas dactilares o biometría facial para verificar la identidad del usuario.

- La llave Pública se debe generar Server-Side en aquellas vistas en donde se requiera autenticar al usuario con este método. 
- Importar la libería Webuthn.js 
- Generar una petición al llavero del dispositivo, usando la llave pública del usuario (Public-Key)

- El Dispositivo se encarga de guardar las credeciales del usuario. 
-- El usuario puede solicitar que se le presente la interfaz de Authenticación con Firma Digital. (Buttons)
-- La interfaz puede solicitar automáticamente al usuario que ingrese sus credenciales. e.j. Si el usuario ha configurado esta opción en Settings. 

## Fujo: 

- El usuario abre la página de login y elige si desea ingresar con WebAuthn o con Email+Frase
