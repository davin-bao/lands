## Lands

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Bugs

**When get this error**

{"error":{"type":"Symfony\\Component\\Debug\\Exception\\FatalErrorException","me
ssage":"Class 'EntwwwrustSetupTables' not found","file":"D:\\github\\lands\\vend
or\\laravel\\framework\\src\\Illuminate\\Database\\Migrations\\Migrator.php","li
ne":297}}

** Delete all database
**Go to `D:\github\lands\vendor\composer\autoload_classmap.php` to update the real database files names OR run `composer dump-autoload`

** Print all SQL
** Go to row 270 in D:\github\lands\workbench\davin-bao\workflow\vendor\laravel\framework\src\Illuminate\Database\Connection.php, input `var_dump($query);`

### License

The Lands is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
