![cabecalho memed desafio](https://user-images.githubusercontent.com/2197005/28128758-3b0a0626-6707-11e7-9583-dac319c8b45b.png)

# Desafio Checkout de Medicamentos

Foi criado uma api usando o framework lumen

## Solução:

Montei uma API REST buscando a lista de medicamentos e seus respectivos atributos que filtra e retorna a farmacia ideal (preço x distancia):

##Intalação
```
$ git clone https://github.com/rsurfings/memed.git my-api
$ cd my-api
$ composer update
$ php artisan migrate
$ php -S localhost:8000 -t public
```

## Métodos Disponiveis:

| Método | URL			 | Descrição | Parametros
| ------ | ------------- | --------- | --------- |
| GET    | http://localhost:8000/medicines | Lista de medicamentos |
| GET    | http://localhost:8000/pharmacy?data={"lat":"-23.56483104","lon":"-46.61436604"} | Informações adicionais da farmácia|data={"lat":"-23.56483104","lon":"-46.61436604"}
| POST    | http://localhost:8000/checkout | Checkout da compra |{"id":1,"nome":"Farmais","distance":545,"totalprice":"41.38","info":[{"nome":"Ácido zoledrônico 4mg","preco":"10.86"},{"nome":"Água para injeção 1mL","preco":"30.06"},{"nome":"Bromazepam 3mg","preco":"0.46"}]}|
| GET    | http://localhost:8000/checkout | lista da compra |

<<<<<<< HEAD
:R: Ronaldo Goncalves
=======
:m: Ronaldo Goncalves
>>>>>>> 28ad941afa35bf47fe5d55a3e9778370d9907792
