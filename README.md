
Console
--------------
  * php bin/console app:main-currency => Projedeki ana para birimlerini currency.json dosyasını okuyarak oluşturur.

  * php bin/console app:add-to-db => provider.json dosayasındaki tanımlanmış providerlerın bilgilerini okuyarak db'ye ekler

  * php bin/console app:create-provider => Consol'da tanımladığınız provider'ı db'ye ekler. 

  * php bin/console app:call-api => Db'de bulunan apilerin adreslerine gibip gerekli bilgileri aldıktan sonra db'ye ekler.

currency.json
--------------
[
  {
    "code":"USD"
  },
  {
    "code":"EUR"
  },
  {
    "code":"GBP"
  }
]

provider.json
--------------
[
  {
    "name": "provider1",
    "url": "http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0",
    "wrapper": "result",
    "symbols":
    [
      {
        "type":"USD",
        "code":"USDTRY"
      },
      {
        "type":"EUR",
        "code":"EURTRY"
      },
      {
        "type":"GBP",
        "code":"GBPTRY"
      }
    ]
  },
  {
    "name": "provider2",
    "url": "http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3",
    "wrapper": null,
    "symbols":
    [
      {
        "type":"USD",
        "code":"DOLAR"
      },
      {
        "type":"EUR",
        "code":"AVRO"
      },
      {
        "type":"GBP",
        "code":"İNGİLİZ STERLİNİ"
      }
    ]
  }
]
