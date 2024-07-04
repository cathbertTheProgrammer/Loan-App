<x-admin-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button"
                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product Details</h5>
                <hr />

				<form id="editProductForm" method="POST" enctype="multipart/form-data" >
					@csrf
					@method('PUT')

					<input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">
					
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="name" class="form-label">Product Title</label>
										<input type="text" class="form-control" value="{{ $product->name }}"  name="name" id="name"
											placeholder="Enter product title">
									</div>
									<div class="mb-3">
										<label for="short_description" class="form-label">Short Description</label>
										<textarea class="form-control" name="short_description" id="short_description" rows="1">{{ $product->short_description }}</textarea>
									</div>
									<div class="mb-3">
										<label for="description" class="form-label">Description</label>
										<textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
									</div>

									@if($product->image)
										<div class="mb-3">
											<label>Current Image:</label><br>
											<img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px;">
										</div>
									@endif

									<div class="mb-3">
										<label for="image" class="form-label">Upload New Image</label>
										<input name="image" value="{{ $product->image }}" id="image" type="file">
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-md-6">
											<label for="sale_price" class="form-label">Price</label>
											<input type="number" class="form-control" value="{{ $product->sale_price }}" name="sale_price" id="sale_price" placeholder="00.00">
										</div>
										<div class="col-md-6">
											<label for="regular_price" class="form-label">Compare at Price</label>
											<input type="number" class="form-control" value="{{ $product->regular_price }}" name="regular_price" id="regular_price"
												placeholder="00.00">
										</div>
										<div class="col-md-6">
											<label for="SKU" class="form-label">SKU</label>
											<input type="text" class="form-control" value="{{ $product->SKU }}" name="SKU" id="SKU" >
										</div>
										<div class="col-md-6">
											<label for="quantity" class="form-label">Quantity</label>
											<input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" id="quantity" >	
										</div>

										<div class="col-12">
											<label for="stock_status" class="form-label">Stock Status</label>
											<select class="form-select" value="{{ $product->stock_status }}" name="stock_status" id="stock_status">
												<option value="instock">Instock</option>
												<option value="outofstock">Outofstock</option>
											</select>
										</div>
										<div class="col-12">
											<label for="category_id" class="form-label">Category</label>
											<select class="form-select" value="{{ $product->category_id }}" id="category_id"  name="category_id">
												@foreach ($categories as $category)
													<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="brand_id" class="form-label">Brand</label>
											<select class="form-select" value="{{ $product->brand_id }}" name="brand_id" id="brand_id" >
												@foreach ($brands as $brand)
													<option value="{{ $brand->id }}">{{ $brand->name }}</option>
												@endforeach
											</select>
										</div>
										
										<div class="col-12">
											<div class="d-grid">
												<button type="submit"  class="btn btn-primary" id="addProductBtn">Save Product</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end row-->
					</div>
				</form>
            </div>
        </div>


    </div>

	@push('scripts')
		<script src="{{ asset('assets/js/product.js') }}" ></script>
	@endpush
</x-admin-layout>
