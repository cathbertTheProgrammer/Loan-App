$(document).ready(function() {

    // Event listener for Edit Product form submission
    $('#editProductForm').submit(function(event) {
        event.preventDefault();
        var product_id = $('#product_id').val();
        var formData = new FormData($(this)[0]);
        // Serialize form data
        // var formData = new FormData($('#editProductForm')[0]);
        // var formData = $('#editProductForm').serialize();
        // formData.append('name', $('#edit_name').val());
        // formData.append('categoryId', $('#edit_category_id').val());
        // formData.append('brandId', $('#edit_brand_id').val());
        // formData.append('shortDescription', $('#edit_short_description').val());
        // formData.append('description', $('#edit_description').val());
        // formData.append('regularPrice', $('#edit_regular_price').val());
        // formData.append('salePrice', $('#edit_sale_price').val());
        // formData.append('SKU', $('#edit_SKU').val());
        // formData.append('stockStatus', $('#edit_stock_status').val());
        // formData.append('quantity', $('#edit_quantity').val());
        // formData.append('image', $('#edit_image')[0].files[0]); // For file input, get the file object


        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': token
        //     }
        // });
        
        // Send AJAX request
        $.ajax({
            url: `/admin/product/${product_id}/update`,
            type: 'PUT',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
           
            success: function(response) {
                // If update successful, display SweetAlert success notification
                Swal.fire({
                    title: "Product Updated Successfully",
                    toast: true,
                    icon: "success",
                    timer: 3000,
                    position: "top-right",
                    timerProgressBar: true,
                    showCancelButton: false,
                });
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // If update fails, display error message (you can customize this)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An error occurred while updating the Product. Please try again.'+ error,
                });
            }
        });
           
    });

     // Event listener for Delete Product form submission
     $('.delete-product').click(function(event) {
        event.preventDefault(); // Prevent default form submission
    
        var ProductId = $(this).data('product-id');
        var url = $(this).data('product-url');
        var name = $(this).data('product-name');
    
        // Get CSRF token from the page's meta tags
        var token = $('meta[name="csrf-token"]').attr('content');
    
        // Send AJAX request
        Swal.fire({
            title: "Confirm",
            text: `Are you sure want to delete ${name} Product?`,
            icon: "info",
            confirmButtonText: "Yes",
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Include CSRF token in the headers
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
    
                // Send AJAX request with CSRF token included
                $.ajax({
                    url: url,
                    type: 'PUT', 
                    data: { id: ProductId }, 
                    success: function(response) {
                        Swal.fire({
                            title: "Product Deleted Successfully",
                            toast: true,
                            icon: "success",
                            timer: 3000,
                            position: "top-right",
                            timerProgressBar: true,
                            showCancelButton: false,
                        });
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // If deletion fails, display error message (you can customize this)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred while deleting the Product. Please try again.',
                        });
                    }
                });
            } else {
                Swal.fire("error", "Product Delete Failed!!");
            }
        });
    });
    
});


// Function to populate edit modal with category details
function populateEditProductModal(
    productId, 
    name, 
    categoryId, 
    brandId,
    shortDescription,
    description,
    regularPrice,
    salePrice,
    SKU,
    stockStatus,
    quantity,
    image
) {
    $('#product_id').val(productId);
    $('#edit_name').val(name);
    $('#edit_category_id').val(categoryId);
    $('#edit_brand_id').val(brandId);
    $('#edit_short_description').val(shortDescription);
    $('#edit_description').val(description);
    $('#edit_regular_price').val(regularPrice);
    $('#edit_sale_price').val(salePrice);
    $('#edit_SKU').val(SKU);
    $('#edit_stock_status').val(stockStatus);
    $('#edit_quantity').val(quantity);
    // $('#edit_image').val(image);

    $('#editProductModal').modal('show');
}

// Event listener for edit link clicks
$('.edit-product').click(function() {
    var productId = $(this).data('product-id');
    var name = $(this).data('product-name');
    var categoryId = $(this).data('product-category_id');
    var brandId = $(this).data('product-brand_id');
    var shortDescription = $(this).data('product-short_description');
    var description = $(this).data('product-description');
    var regularPrice = $(this).data('product-regular_price');
    var salePrice = $(this).data('product-sale_price');
    var SKU = $(this).data('product-SKU');
    var stockStatus = $(this).data('product-stock_status');
    var quantity = $(this).data('product-quantity');
    // var image = $(this).data('product-image');
    
    populateEditProductModal(
        productId, 
        name, 
        categoryId, 
        brandId,
        shortDescription,
        description,
        regularPrice,
        salePrice,
        SKU,
        stockStatus,
        quantity,
        
    );
});

