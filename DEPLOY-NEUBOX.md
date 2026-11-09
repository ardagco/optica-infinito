# Guía de Despliegue y Rollback en Neubox (`DEPLOY-NEUBOX.md`)

Esta guía detalla el procedimiento completo, seguro y paso a paso para publicar el nuevo sitio web de **Óptica Infinito** (`https://opticainfinito.com.mx/`) en el hosting compartido de **Neubox** (cPanel o DirectAdmin), sin necesidad de acceso SSH ni procesos en segundo plano.

---

## Paso 1: Respaldar el Sitio Actual en Neubox

Antes de realizar cualquier cambio en producción, genere un respaldo completo del sitio actual (CodeIgniter 4):

1. Ingrese al panel de control de **Neubox** (**cPanel** o **DirectAdmin**).
2. Abra el **Administrador de Archivos** (*File Manager*).
3. Ubique la carpeta `public_html` (y, si existen archivos de CodeIgniter fuera de `public_html` como `app/`, `system/`, `vendor/` o `.env`, selecciónelos también).
4. Seleccione todos los archivos actuales, haga clic derecho en **Comprimir** (*Compress*) y elija formato `.zip` con el nombre:
   `backup-opticainfinito-codeigniter-YYYYMMDD.zip`.
5. Descargue ese archivo `.zip` a su computadora local y conserve una copia adicional en una carpeta privada fuera de `public_html` (por ejemplo, `/home/usuario_neubox/backups/`).
6. Si existe alguna base de datos activa en **phpMyAdmin**, expórtela en formato `.sql` y guárdela junto con el respaldo.

---

## Paso 2: Preparar el Hosting en Neubox

1. Dentro del **Administrador de Archivos**, cree (si no existe) una carpeta de respaldo en el directorio raíz de su cuenta (`/home/usuario_neubox/backups/`).
2. Limpie el contenido antiguo de `public_html/` (o muévalo íntegro a `/home/usuario_neubox/backups/sitio_anterior/`) para evitar que queden controladores antiguos de CodeIgniter o scripts de depuración (`kint`).
3. Verifique que la carpeta `public_html/` tenga permisos `0755` (o `0750` según la configuración estándar de Neubox).

---

## Paso 3: Subir los Archivos del Nuevo Sitio

Puede realizar la carga mediante el **Administrador de Archivos de Neubox** o por **FTP (FileZilla / Cyberduck)**:

### Opción A: Mediante Administrador de Archivos (Recomendado por rapidez)
1. En su computadora, comprima **únicamente el contenido interior** de la carpeta `public_html/` de este proyecto en un archivo llamado `release-optica-infinito.zip`.
2. Suba `release-optica-infinito.zip` dentro de `/home/usuario_neubox/public_html/`.
3. Haga clic derecho sobre `release-optica-infinito.zip` -> **Extraer** (*Extract*) directamente en `/public_html/`.
4. **Importante**: Verifique que el archivo `.htaccess` (en la raíz de `public_html/`) y `storage/.htaccess` se hayan extraído correctamente (active *"Mostrar archivos ocultos / Show Hidden Files (dotfiles)"* en la configuración del Administrador de Archivos).
5. Elimine el archivo temporal `release-optica-infinito.zip` una vez extraído.

### Opción B: Mediante Cliente FTP
1. Conecte su cliente FTP al servidor de Neubox (`ftp.opticainfinito.com.mx`) con modo **FTP explícito sobre TLS**.
2. Suba todo el contenido de la carpeta local `public_html/` hacia `/public_html/` en modo binario/automático.

### Permisos de Carpetas
- Directorios generales (`assets/`, `includes/`, `forms/`, `legal/`, `pacientes/`, `optica/`): `0755`
- Archivos `.php`, `.css`, `.js`, `.htaccess`: `0644`
- Directorios de escritura interna (`public_html/storage/`, `public_html/storage/logs/`, `public_html/storage/ratelimit/`): `0755` (en Neubox con suPHP/CloudLinux/LiteSpeed `0755` permite escritura segura por el usuario propietario).

---

## Paso 4: Configurar PHP 8.2 o PHP 8.3 en Neubox

El sitio está desarrollado con tipado estricto (`declare(strict_types=1);`) y es 100% nativo para **PHP 8.2 y PHP 8.3**:

1. En el panel de Neubox, abra **Seleccionar Versión de PHP** (*Select PHP Version* en CloudLinux / **MultiPHP Manager** en cPanel).
2. Seleccione el dominio `opticainfinito.com.mx`.
3. Cambie la versión activa a **PHP 8.2** o **PHP 8.3** y aplique los cambios.
4. Verifique que estén activas las extensiones estándar (suelen venir activadas por defecto en Neubox):
   - `openssl` (para conexión SMTP segura por SSL/TLS)
   - `mbstring` (para manejo de acentos y UTF-8)
   - `json` y `session`
   - `pdo_mysql` (opcional, solo si usa base de datos)

---

## Paso 5: Crear Base de Datos (Opcional)

> **Nota**: El sitio web funciona al **100% sin base de datos obligatoria**. Todas las solicitudes de citas, contacto y empresas se envían por correo electrónico (SMTP) y guardan además un respaldo auditable en `public_html/storage/logs/submissions.log` (protegido por `.htaccess`).

Si desea almacenar también las solicitudes en MariaDB/MySQL:
1. Abra **Bases de datos MySQL** en Neubox y cree una base de datos (ej. `opticain_portal`) y un usuario con permisos.
2. Abra **phpMyAdmin**, seleccione la base de datos e importe el archivo [`database.optional.sql`](file:///C:/Users/User/.gemini/antigravity/scratch/optica-infinito/database.optional.sql).
3. Coloque las credenciales en `/home/usuario_neubox/config.env.php` con `'DB_ENABLED' => true`.

---

## Paso 6: Configurar el Correo SMTP en Neubox

Para que los formularios de **Citas**, **Contacto** y **Empresas** entreguen correos autenticados mediante el servidor de Neubox:

1. Tome el archivo [`config.env.example.php`](file:///C:/Users/User/.gemini/antigravity/scratch/optica-infinito/config.env.example.php).
2. Súbalo **un nivel arriba de `public_html`** (es decir, en `/home/usuario_neubox/config.env.php`) para que jamás sea accesible desde un navegador web.
3. Edite `/home/usuario_neubox/config.env.php` con los datos de la cuenta de correo creada en el panel de Neubox:
   ```php
   'SMTP_ENABLED'    => true,
   'SMTP_HOST'       => 'mail.opticainfinito.com.mx',
   'SMTP_PORT'       => 465,
   'SMTP_ENCRYPTION' => 'ssl',
   'SMTP_USER'       => 'contacto@opticainfinito.com.mx',
   'SMTP_PASS'       => 'SU_CONTRASEÑA_REAL_DE_CORREO',
   'SMTP_FROM'       => 'contacto@opticainfinito.com.mx',
   'SMTP_FROM_NAME'  => 'Óptica Infinito · Sitio Web Oficial',
   'SMTP_TO_EMAIL'   => 'contacto@opticainfinito.com.mx',
   ```
4. Asigne permisos `0600` o `0640` al archivo `/home/usuario_neubox/config.env.php`.

---

## Paso 7: Configurar HTTPS y Certificado SSL

1. En el panel de Neubox, verifique en **SSL/TLS Status** (o **AutoSSL / Let's Encrypt**) que el certificado SSL para `opticainfinito.com.mx` y `www.opticainfinito.com.mx` esté activo y vigente.
2. El archivo `public_html/.htaccess` incluido ya fuerza automáticamente la redirección `301` de `http://` a `https://` y de `www.opticainfinito.com.mx` hacia `https://opticainfinito.com.mx`.

---

## Paso 8: Probar los Formularios en Producción

Una vez publicado el sitio, realice las siguientes 3 pruebas reales:

1. **Modal / Formulario de Solicitud de Cita (`forms/citas.php`)**:
   - Abra `https://opticainfinito.com.mx/`, haga clic en **"Agenda tu cita"**, complete los datos de prueba y envíe.
   - Verifique que aparezca el mensaje de confirmación con número de folio (`OI-CITA-...`) y la aclaración de que *la solicitud está sujeta a confirmación por parte del personal de Óptica Infinito*.
   - Verifique la recepción del correo en `contacto@opticainfinito.com.mx`.
2. **Formulario de Cotización Empresarial (`forms/empresas.php`)**:
   - Ingrese a `https://opticainfinito.com.mx/empresas.php`, complete el formulario B2B y envíe.
   - Verifique el folio `OI-EMP-...` y la llegada del correo.
3. **Formulario de Contacto General (`forms/contacto.php`)**:
   - Ingrese a `https://opticainfinito.com.mx/contacto.php`, envíe un mensaje de prueba y compruebe la recepción del folio `OI-CONT-...`.

---

## Paso 9: Lista de Verificación Post-Despliegue (QA Checklist)

- [ ] `https://opticainfinito.com.mx/` carga sin barra de depuración Kint ni errores en consola.
- [ ] Las páginas `/nosotros.php`, `/servicios.php`, `/empresas.php`, `/contacto.php`, `/pacientes/` y `/optica/` responden con código HTTP `200`.
- [ ] Las URLs históricas del sitio anterior redirigen o resuelven correctamente:
  - `/politica-de-privacidad` -> Muestra la Política de Privacidad (`31/01/2025`).
  - `/terminos-y-condiciones` -> Muestra los Términos y Condiciones (`31/01/2025`).
  - `/empresarial` -> Redirige a `/empresas.php` (corrige el error 404 que tenía el sitio anterior).
  - `/pacientes/login` y `/optica/login` -> Resuelven sin error 404.
- [ ] El acceso directo a `https://opticainfinito.com.mx/storage/logs/submissions.log` devuelve **403 Forbidden** (protegido por `.htaccess`).
- [ ] El botón flotante de WhatsApp y los enlaces telefónicos (`442 221 7851`) abren correctamente con mensajes contextuales.

---

## Paso 10: Procedimiento de Rollback en Caso de Contingencia

Si por cualquier motivo operativo necesita restaurar el sitio anterior en menos de 2 minutos:

1. Ingrese al **Administrador de Archivos** de Neubox.
2. Renombre o mueva el contenido actual de `public_html/` a una carpeta temporal `/home/usuario_neubox/backups/rebuild_v2/`.
3. Seleccione el respaldo generado en el **Paso 1** (`backup-opticainfinito-codeigniter-YYYYMMDD.zip`) y extráigalo nuevamente en `public_html/`.
4. Si cambió la versión de PHP y el CodeIgniter anterior requería PHP 8.1, regrese el selector MultiPHP a la versión previa.
