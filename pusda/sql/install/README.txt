SENAYAN 3.0 stable

Core Senayan Developer :
Hendro Wicaksono - hendrowicaksono@yahoo.com
Arie Nugraha - dicarve@yahoo.com

Below are the instructions for new installation of SENAYAN :
1. Put senayan3-stable3 folder in web document root

2. create senayan database in mysql

3. Open your phpMyAdmin or mysql client utility (or other mysql manager softwares) and 
   run sql/install/senayan.sql inside your SENAYAN application database.
   
4. Re-check your database configurations and others configuration in sysconfig.inc.php.

5. If you have your own custom template, Adjust detail_template.php file or just overwrite it
   with detail_template.php from default template directory
   
-------------------------------------------------------------------------------------------------

Berikut adalah instruksi untuk instalasi baru SENAYAN :
1. Letakkan folder senayan3-stable3 di web document root

2. buat database senayan di mysql

3. Buka phpMyAdmin atau mysql client (atau program manager mysql lainnya) dan jalankan
   script upgrade_stable3.sql pada database SENAYAN anda
   
4. Cek kembali semua konfigurasi database dan konfigurasi lain pada file sysconfig.inc.php.

5. Apabila anda memiliki template buatan anda sendiri, sesuaikan file detail_template.php atau
   tiban saja dengan detail_template.php yang ada pada direktori template default
