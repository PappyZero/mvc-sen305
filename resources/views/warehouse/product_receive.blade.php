@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ url('/insert_supplier') }}" class="row g-3 col-md-6">
                @csrf

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ $product->name }}" disabled>
                        <label for="name">Name</label>
 
                        <!-- @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ $product->code }}" disabled>
                        <label for="name">Code</label>

                        <!-- @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty"
                            name="qty" placeholder="Quantity">
                        <label for="qty">Quantity</label>

                        <!-- @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    </div>
                </div> 


                <div class="col-md-12">
                    <div class="form-floating">
                    <select id="unit" type="unit"
                        class="form-control @error('unit') is-invalid @enderror" name="unit"
                        value="{{ old('unit') }}" required autocomplete="unit">
                        <option value="">Select the Unit</option>
                        @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach 

                        @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </select>
                    <label for="address">Unit</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" step="0.00" placeholder="Price">
                        <label for="price">Price</label>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="date" class="form-control @error('exp_date') is-invalid @enderror" id="exp_date"
                            name="exp_date" placeholder="Quantity">
                        <label for="exp_date">Expiry Date</label>

                        @error('exp_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
@endsection
