##Installation

Run composer install on root  folder.

To configure db open `src/config.php`
add correct values for your db connection in here
```'db' => [
           'driver' => 'pgsql',
           'host' => '127.0.0.1',
           'port' => 5432,
           'database' => 'postgres',
           'username' => 'homestead',
           'password' => 'secret',
           'charset' => 'utf8',
           'collation' => 'utf8_unicode_ci',
       ]
 ```

DB dump with patients is in root directory named
`postgers_public_patients`
