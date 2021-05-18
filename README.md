Bu bir PHP Laravel projesidir. O yuzden Laravel ve Composer bilmeniz gerekicek.<br>
Bilgisayarinizda Composer yoksa, ilk once onu indirin.<br>
Sonra yeni bir Klasor olushturup icine bu projeyi idirin. <br>
Sonra herhangi bi editor'de (VScode, PHPstorm) projeyi acip "Composer update" komutunu yazin.<br>
O bittikten sonra .env.example dosyasini kopyalayin ve ismini .env degishtirin ve onun icine veritaban bilgilerinizi yazin.<br>
Bu ishde tamam. Shimdi "php artisan key:generate" komutuyla tamamen veritabana baglaniyoruz.<br>
Bir ishlem daha. "php artisan migrate" komutuyla veritabanda tablolari olushturuyoruz.<br>
En son "php artisan serve" komutuyla alnan url'yi browser'e atayin. <br>
Artik test yapabilirsiniz.