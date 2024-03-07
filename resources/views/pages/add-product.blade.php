@extends('layouts.nav-sidebar')
@section('content')
<script>
    function generateSKU() {
        var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var length = 8;
        var sku = '';
        for (var i = 0; i < length; i++) {
            sku += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return sku;}
        
        document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('sku_code').value = generateSKU();
    });
    
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Product Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="short_description">{{ __('Short Description') }}</label>
                            <textarea id="short_description" class="form-control @error('short_description') is-invalid @enderror" name="short_description" required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="long_description">{{ __('Long Description') }}</label>
                            <textarea id="long_description" class="form-control @error('long_description') is-invalid @enderror" name="long_description" required>{{ old('long_description') }}</textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label>
                            <input id="price" type="number"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="offer_price">{{ __('Offer Price') }}</label>
                            <input id="offer_price" type="number"  class="form-control @error('offer_price') is-invalid @enderror" name="offer_price" value="{{ old('offer_price') }}" required>
                            @error('offer_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">{{ __('Quantity') }}</label>
                            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_featured">{{ __('Do you want the product to be Featured?') }}</label><br>
                            <input type="radio" id="is_featured_yes" name="is_featured" value="1">
                            <label for="is_featured_yes">Yes</label>
                            <input type="radio" id="is_featured_no" name="is_featured" value="0">
                            <label for="is_featured_no">No</label>
                        </div>
                        <div class="form-group">
                            <label for="product_type">{{ __('Product Type') }}</label>
                            <select id="product_type" class="form-control @error('product_type') is-invalid @enderror" name="product_type" required>
                                <option value="">Select Product Type</option>  
                                <option value="0">Physical</option>
                                <option value="1">Digital</option>
                                <option value="2">Organic</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image[]"  required>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    

                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategory_id">{{ __('Subcategory') }}</label>
                            <select id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" required>
                                <option value="">Select Subcategory</option>
                            </select>
                            @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mfg_date">{{ __('Manufacturing Date') }}</label>
                            <input id="mfg_date" type="date" class="form-control @error('mfg_date') is-invalid @enderror" name="mfg_date" value="{{ old('mfg_date') }}" required>
                            @error('mfg_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exp_date">{{ __('Expiry Date') }}</label>
                            <input id="exp_date" type="date" class="form-control @error('exp_date') is-invalid @enderror" name="exp_date" value="{{ old('exp_date') }}" required>
                            @error('exp_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sku_code">{{ __('SKU Code') }}</label>
                            <input id="sku_code" type="text" class="form-control @error('sku_code') is-invalid @enderror" name="sku_code" value="{{ old('sku_code') }}" required readonly>
                            @error('sku_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_tags">{{ __('Product Tags') }}</label>
                            <input id="product_tags" class="form-control @error('product_tags') is-invalid @enderror" name="product_tags[]" multiple required>
                               <!--ask questions!--->
                            
                            @error('product_tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="additional_info">{{ __('Additional Information') }}</label>
                            <textarea id="additional_info" class="form-control @error('additional_info') is-invalid @enderror" name="additional_info" required>{{ old('additional_info') }}</textarea>
                            @error('additional_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('Status') }}</label>
                            <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            
                        <button type="submit" class="btn btn-primary">{{ __('Add Product') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('category_id').addEventListener('change', function() {
        var categoryId = this.value;
        var subcategoryDropdown = document.getElementById('subcategory_id');
        subcategoryDropdown.innerHTML = ''; // Clear existing options
        
        if (categoryId) {
            fetch('/get-subcategories/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    data.forEach(subcategory => {
                        var option = document.createElement('option');
                        option.value = subcategory.id;
                        option.text = subcategory.name;
                        subcategoryDropdown.add(option);
                    });

                });
        }
    });
</script>

@endsection