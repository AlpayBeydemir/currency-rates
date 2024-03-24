# Study Case Currency Rates

Projeyi çalıştırabilmek için lütfen aşağıdaki kodları .env dosyanıza ekleyin.

CURRENCY_API_URL_1=https://run.mocky.io/v3/91ebb168-9301-4536-b19b-ba684754cc34
CURRENCY_API_URL_2=https://run.mocky.io/v3/4ba5bfed-ef6e-4ff5-b9bd-fb02e5bb86dd

Eğer yeni bir kur bilgisi veren api eklenmek istenirse yapılacak adımlar;
1. .env dosyasına api linki eklenmelidir.
2. config/constant.php dosyasına oluşturulan env api linki eklenmelidir.
3. Yeni api tanımlaması için app/Services altına provider oluşturulup interface implement edilip interface içindeki fonksiyonlar oluşturulmalıdır.
4. app/Console/Commands/FetchCurrencyRates.php dosyası içerisinde yeni oluşturulan api provider array'inin içerisine eklenmelidir.
5. 'currency_rates' tablosunun çalışabilmesi için konsol'da php artisan migrate komutu çalıştırılmalıdır.

Not: Local de çalışılan database adı: study-case
