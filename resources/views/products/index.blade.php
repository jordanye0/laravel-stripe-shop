@extends('layouts.back')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                              <th>
                                    Name
                              </th>
                              <th>
                                    Price
                              </th>
                              <th>
                                    Edit
                              </th>
                              <th>
                                    Delete
                              </th>
                        </thead>
                        <tbody>
                              @foreach($products as $product)
                                    <tr>
                                          <td>{{ $product->name }}</td>
                                          <td>{{ $product->price }}</td>
                                          <td>
                                                <a class="btn btn-default btn-xs" href="{{ route('products.edit', ['product' => $product->id]) }}">Edit</a>
                                          </td>
                                          <td>
                                                <form action="{{ route('products.destroy', ['product' => $product->id ]) }}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <input class="btn btn-danger btn-xs" type="submit" value="Delete">
                                                </form>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection