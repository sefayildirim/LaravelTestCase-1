# Laravel Test Case

Bu proje, bir back-end REST API yapısı oluşturmayı ve web kullanıcı arayüzü aracılığıyla API belgelerini (Swagger) sunmayı hedeflemektedir.

## Geliştirme Şartları

- [x] **Back-end**
    - SpaceX API'sinden tüm verileri almak ve her 3 dakikada bir veritabanına senkronize etmek için bir PHP Artisan komutu yapılmalıdır.
    - Senkronizasyon başlatılıp tamamlandığında tetiklemek için bir Olay/Dinleyici (Event/Listener) oluşturulmalıdır ve yönetici kullanıcıya bir posta (kanal) bildirimi gönderilmelidir.
    - Senkronizasyon tamamlandığında bir günlük (log) yazılmalıdır (JSON'un tamamını kaydetmek).
    - Tüm kapsül (capsule) ayrıntılarını göstermek için aşağıdaki uç noktalar (endpoints) oluşturulmalıdır:
        - Tüm kapsülleri listelemek için [GET] api/capsules endpoint'i oluşturulmalıdır.
        - Tüm kapsülleri durum filtresine göre listelemek için [GET] api/capsules?status=active|retired|unknown|etc sorgu parametreleriyle bu endpoint oluşturulmalıdır.
        - Kapsül ayrıntısını listelemek için [GET] api/capsules/{capsule_serial} endpoint'i oluşturulmalıdır.
    - Tüm endpointleri kapsayan bir entegrasyon testi yazılmalıdır.
    - Artisan komutunu kapsayan bir entegrasyon testi yazılmalıdır.
    - API belgeleri için Swagger veya benzeri bir framework kullanılmalıdır.
    - OAuth mekanizmasını uygulamak için Laravel Passport kullanılmalıdır.

- [x] **Teknik Beklentiler**
    - Back-end, Laravel frameworkü kullanılarak geliştirilmelidir.
    - Veritabanı olarak MySQL veya PostgreSQL araçları kullanılmalıdır.

## tbl-01 API Tablosu

| İsim                      | Bağlantı                                           |
|---------------------------|----------------------------------------------------|
| Tüm kapsülleri alın       | https://api.spacexdata.com/v3/capsules              |
| Kapsülleri statuse göre alın       | https://api.spacexdata.com/v3/capsules?status=active |
| Serial'e göre kapsül alın | https://api.spacexdata.com/v3/capsules/C112         |

## Bonus

Tüm methodları kapsayan birim testler yazmanız size artı puan getirecektir.


