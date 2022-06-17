@extends('layouts.admin-layout')

@section('content')


<main>
    <div class="container-fluid mb-5">

        <a href="{{route('admin.product.create')}}" class="btn btn-success">Create</a>
      <!--Section: Basic examples-->
      <section>

        <div class="row">

          <div class="col-md-12">

            <div class="card">
              <div class="card-body">
                <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                      <th class="th-sm">Name
                      </th>
                      <th class="th-sm">Category
                      </th>
                      <th class="th-sm">Price
                      </th>
                      <th class="th-sm">Description
                    </th>
                      <th class="th-sm">Quantity
                      </th>
                      <th class="th-sm">Status
                      </th>
                      <th class="th-sm">Image
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                        @foreach ($product as $item)
                            <tr>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->id}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->name}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->category->name}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">${{$item->price}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->description}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->quantity}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">{{$item->status}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.product.show', ['slug' => $item->slug])}}">
                                        <img src="{{asset('storage/images/' . $item->image)}}" width="100" alt="Rasm bor">
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Category
                        </th>
                        <th class="th-sm">Price
                        </th>
                        <th class="th-sm">Description
                      </th>
                        <th class="th-sm">Quantity
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Image
                        </th>
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>

        </div>

      </section>
      <!--Section: Basic examples-->

    </div>
  </main>

@endsection
