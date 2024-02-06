@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ url('/warehouse/search_product') }}" class="row g-3 col-md-6">
                @csrf

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Product Name or Code" value="{{ $searchTerm ?? '' }}">
                        <label for="name">Enter Product Name or Code</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="Search" name="submit" class="btn btn-outline-primary">
            </form>
        </div>

        <div class="card mt-3">
            <div class="card-header">{{ _('View Products') }}</div>
            <div class="card-body">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Next</th>
                                {{-- <th scope="col">Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($searchs as $search)
                                <tr>
                                    <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                    <td><em class="text-muted">{{ $search->name }}</em></td>
                                    <td><em class="text-muted">{{ $search->code }}</em></td>
                                    <td><a class="btn btn-outline-primary" href='{{ url("/warehouse/product_receive/$search->id") }}'>Receive</a>
                                    </td>

                                    {{-- <td>
                                <form action="{{ route('delete_product', $products->id) }}" method="GET">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('are you sure you want to delete this product {{ $products->name }}')">Delete</button>
                                </form>
                            </td> --}}

                                </tr>
                            @empty
                                <p class="text-center p-2">No Product Found</p>
                            @endforelse
                            {{-- @foreach ($searchs as $search) --}}

                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if (isset($products))
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Search Results:</h4>
                    @if ($products->isEmpty())
                        <p>No products found for the given search term.</p>
                    @else
                        <ul>
                            @foreach ($products as $product)
                                <li>{{ $product->name }} - {{ $product->name }}</li>
                                <!-- Display other product details as needed -->
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
