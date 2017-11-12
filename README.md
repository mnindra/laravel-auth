#Pembuatan auth dengan guard dan provider :

1. setting config/auth.php untuk menambahkan guard dan provider baru
2. membuat model yang dipakai menjadi authenticatable
3. membuat controller login dan menambahkan trait Illuminate\Foundation     \Auth\AuthenticatesUsers
4. membuat middleware untuk redirect user yang belum login atau sudah login
5. mendaftarkan middleware di kernel.php
6. membuat route group pada web.php
