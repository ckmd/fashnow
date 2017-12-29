<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>fashnow products</title>
  </head>
  <body>
    @foreach($products as $product)
      {{$product->id}}
    @endforeach
  </body>
</html>
