# Loggin (Registro) de Eventos 

### 1. **Propósito del Registro:**
   - Definir claramente el propósito de cada declaración de registro. Comprender si el registro es para depuración, monitoreo, auditoría o seguimiento de errores.

### 2. **Uso de Niveles de Registro:**
   - Utilizar diferentes niveles de registro (por ejemplo, `info`, `warning`, `error`, `debug`) de manera apropiada según la gravedad del mensaje. Reservar cada nivel para su propósito previsto.

### 3. **Información Contextual:**
   - Incluir información contextual relevante en los mensajes de registro. Esto puede incluir identificadores de usuarios, detalles de solicitudes, marcas de tiempo y cualquier otro dato que ayude a comprender el contexto del registro.

### 4. **Datos Sensibles:**
   - Evitar registrar información sensible como contraseñas, detalles de tarjetas de crédito o información personal identificable (PII). Si es necesario, sanitizar u ofuscar datos sensibles.

### 5. **Formato Consistente:**
   - Mantener un formato consistente de mensajes de registro. La consistencia facilita su análisis y búsqueda, especialmente al utilizar herramientas de análisis de registros.

### 6. **Registro Estructurado:**
   - Considerar el uso de formatos de registro estructurado (por ejemplo, JSON) para facilitar su análisis y búsqueda en agregadores de registros. Esto puede proporcionar un mejor contexto y hacer que los registros sean más legibles para las máquinas.

### 7. **Registro de Excepciones:**
   - Registrar detalles de excepciones, incluidas las trazas de pila, para facilitar la resolución de problemas. Incluir tanta información como sea necesaria para comprender la causa de la excepción.

### 8. **Marcas de Tiempo en el Registro:**
   - Incluir marcas de tiempo en los mensajes de registro para realizar un seguimiento de cuándo ocurrieron los eventos. Esto es crucial para la depuración y el análisis de la secuencia de eventos.

### 9. **Rendimiento del Registro:**
   - Ser consciente del impacto en el rendimiento del registro, especialmente en aplicaciones de alto tráfico. Evitar registros excesivos o innecesarios en entornos de producción.

### 10. **Rotación de Registros:**
   - Implementar mecanismos de rotación de registros para gestionar los tamaños de archivos de registro y evitar problemas de espacio en disco. Rotar los registros según el tiempo.




## Niveles de Severidad

```php
use Illuminate\Support\Facades\Log;
 
Log::emergency($message);
Log::alert($message);
Log::critical($message);
Log::error($message);
Log::warning($message);
Log::notice($message);
Log::info($message);
Log::debug($message);
```

## Canales de Notificación de Eventos

```text
| Nombre    | Descripción                                                   |
|-----------|---------------------------------------------------------------|
| custom    | Un controlador que llama a una fábrica [personalizada](.././app/Http/Middleware/LogUserActions.php) para crear un canal |
| daily     | Un controlador Monolog basado en RotatingFileHandler que rota diariamente |
| errorlog  | Un controlador Monolog basado en ErrorLogHandler               |
| monolog   | Un controlador de fábrica Monolog que puede utilizar cualquier controlador Monolog compatible |
| papertrail| Un controlador Monolog basado en SyslogUdpHandler               |
| single    | Un canal de registro basado en un solo archivo o ruta (StreamHandler) |
| slack     | Un controlador Monolog basado en [SlackWebhookHandler](https://github.com/Seldaek/monolog/blob/main/src/Monolog/Handler/SlackWebhookHandler.php)           |
| stack     | Un envoltorio que facilita la creación de canales "multicanal" |
| syslog    | Un controlador Monolog basado en SyslogHandler                 |
```

