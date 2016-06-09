RewriteEngine On
RewriteBase {$basedir}/

RewriteCond %{ldelim}REQUEST_URI{rdelim} !^{$basedir}/(|v|js|upload|common_templates)/.*
RewriteRule ^([^.]*)$ index.php
