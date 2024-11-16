<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Create Product</h1>
  <div>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <ul></ul>
  </div>
  <form action="{{route('products.store')}}" method="post">
    @csrf
    @method('post')
    <div>
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Name">
    </div>
    <div>
      <label for="qty">QTY</label>
      <input type="text" name="qty" placeholder="QTY">
    </div>
    <div>
      <label for="price">Price</label>
      <input type="text" name="price" placeholder="Price">
    </div>
    <div>
      <label for="description">Description</label>
      <input type="text" name="description" placeholder="Description">
    </div>
    <div>
      <input type="submit" value="Create Product" />
    </div>
  </form>
</body>

</html>