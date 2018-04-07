# Install Drupal, if not installed yet.
# -------------------------------------
#

if [ ! -f /drupal/app/web/sites/default/settings.local.php ]
then
  # 1 - Install core and other dependencies.
  composer install

  # 2 - Create basic files and ensure permissions.
  mkdir -p /drupal/app/web/sites/default/files

  # 3 - Copy configuration files.
  sudo cp /drupal/app/web/sites/template.settings.local.php /drupal/app/web/sites/default/settings.local.php
  sudo chmod -R 775 /drupal/app/web/sites/default/settings.local.php

  # 4 - Install standard profile.
  cd /drupal/app/web
  # Set PHP_OPTIONS environment variable to fix sendmail error.
  /usr/bin/env PHP_OPTIONS="-d sendmail_path=`which true`" ../bin/drush si standard --site-name="Kanban API" --account-name="admin" --account-pass="password" -y

  # 5 - Import configs, if available.
  if [ -f /drupal/app/site-id ]
  then
    ../bin/drush cset system.site uuid "`cat /drupal/app/site-id`" -y
    ../bin/drush config-import --partial -y
  fi

fi
