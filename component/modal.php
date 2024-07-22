<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal Home -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id" id="update_id">

                    <div class="mb-3">
                        <label for="heading">Heading</label>
                        <input type="text" class="form-control" name="heading" id="heading">
                    </div>

                    <div class="mb-3">
                        <label for="subHeading">Sub Heading</label>
                        <input type="text" class="form-control" name="subHeading" id="subHeading">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>

                    <div class="mb-3">
                        <label for="button">Button</label>
                        <input type="text" class="form-control" name="button" id="button">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal About -->
<div class="modal fade" id="updateModalAbout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id" id="update_id_about">

                    <div class="mb-3">
                        <label for="heading">Heading</label>
                        <input type="text" class="form-control" name="heading" id="heading_about">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description_about">
                    </div>

                    <div class="mb-3">
                        <label for="button">Button</label>
                        <input type="text" class="form-control" name="button" id="button_about">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal Icons -->
<div class="modal fade" id="updateModalIcons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="update_id" id="update_id_icons">

                    <div class="mb-3">
                        <label for="subHeading">Heading</label>
                        <input type="text" class="form-control" name="heading_icons" id="heading_icons">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description_icons" id="description_icons">
                    </div>

                    <div class="mb-3">
                        <label for="heading">Icon</label>
                        <input type="file" class="form-control" name="icon_icons" id="icon_icons">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Data Icons -->
<div class="modal fade" id="addModalIcons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="subHeading">Heading</label>
                        <input type="text" class="form-control" name="add_heading_icons">
                    </div>
                    
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="add_description_icons">
                    </div>

                    <div class="mb-3">
                        <label for="heading">Icon</label>
                        <input type="file" class="form-control" name="add_icon_icons">
                        <input type="hidden" name="img2" id="img2">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="add">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal Products -->
<div class="modal fade" id="updateModalProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="update_id" id="update_id_products">

                    <div class="mb-3">
                        <label for="heading_products">Heading</label>
                        <input type="text" class="form-control" name="heading_products" id="heading_products">
                    </div>

                    <div class="mb-3">
                        <label for="subHeading">Price</label>
                        <input type="text" class="form-control" name="price_products" id="price_products">
                    </div>

                    <div class="mb-3">
                        <label for="description">Discount (%)</label>
                        <input type="text" class="form-control" name="discount_products" id="discount_products">
                    </div>

                    <div class=" mb-3">
                        <label for="picture_products">Picture <span class="text-danger"> *upload only .png .jpg .jpeg</span></label>
                        <input type="file" class="form-control" name="picture_products" id="picture_products">
                    </div>

                    <div class="mb-3">
                        <img id="previewImg_update" style="width: 100%; height:400px; object-fit: cover;">
                        <input type="hidden" name="img2" id="img2">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Data Products -->
<div class="modal fade" id="addModalProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" id="productForm" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="heading">Heading</label>
                        <input type="text" class="form-control" name="add_heading_products" required>
                    </div>

                    <div class="mb-3">
                        <label for="subHeading">Price</label>
                        <input type="text" class="form-control" name="add_price_products" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Discount (%)</label>
                        <input type="text" class="form-control" name="add_discount_products" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Picture <span class="text-danger"> *upload only .png .jpg .jpeg</span></label>
                        <input type="file" class="form-control" name="add_picture_products" id="imgInput_insert" required>
                    </div>

                    <div class="mb-3">
                        <img id="previewImg_insert" style="width: 100%;">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="add">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>


<!-- Update Modal Reviews -->
<div class="modal fade" id="updateModalReviews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id" id="update_id_reviews">

                    <div class="mb-3">
                        <label for="heading">Name</label>
                        <input type="text" class="form-control" name="update_name" id="update_name">
                    </div>

                    <div class="mb-3">
                        <label for="subHeading">Email</label>
                        <input type="text" class="form-control" name="update_email" id="update_email">
                    </div>

                    <div class="mb-3">
                        <label for="description">Message</label>
                        <input type="text" class="form-control" name="update_message" id="update_message">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Data Reviews -->
<div class="modal fade" id="addModalReviews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                <div class="mb-3">
                        <label for="heading">Name</label>
                        <input type="text" class="form-control" name="add_name">
                    </div>

                    <div class="mb-3">
                        <label for="subHeading">Email</label>
                        <input type="email" class="form-control" name="add_email">
                    </div>

                    <div class="mb-3">
                        <label for="description">Message</label>
                        <input type="text" class="form-control" name="add_message">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="add">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal Footer -->
<div class="modal fade" id="updateModalFooter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id" id="update_id_footer">

                    <div class="mb-3">
                        <label for="heading">Footer</label>
                        <input type="text" class="form-control" name="update_footer" id="update_footer">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Data Users -->
<div class="modal fade" id="addModalUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="subHeading">Firstname</label>
                        <input type="text" class="form-control" name="add_firstname_users" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description">Lastname</label>
                        <input type="text" class="form-control" name="add_lastname_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Email</label>
                        <input type="email" class="form-control" name="add_email_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Address</label>
                        <input type="text" class="form-control" name="add_address_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Password</label>
                        <input type="password" class="form-control" name="add_password_users" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="add">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal Users -->
<div class="modal fade" id="updateModalUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id_users" id="update_id_users">

                    <div class="mb-3">
                        <label for="subHeading">Firstname</label>
                        <input type="text" class="form-control" name="update_firstname_users" id="update_firstname_users" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description">Lastname</label>
                        <input type="text" class="form-control" name="update_lastname_users" id="update_lastname_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Email</label>
                        <input type="email" class="form-control" name="update_email_users" id="update_email_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Address</label>
                        <input type="text" class="form-control" name="update_address_users" id="update_address_users" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Password</label>
                        <input type="password" class="form-control" name="update_password_users" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Add Data Admin -->
<div class="modal fade" id="addModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="subHeading">Name</label>
                        <input type="text" class="form-control" name="add_name_admin" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Password</label>
                        <input type="password" class="form-control" name="add_password_admin" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="add">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Update Modal Admin -->
<div class="modal fade" id="updateModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post">

                    <input type="hidden" name="update_id_admin" id="update_id_admin">

                    <div class="mb-3">
                        <label for="subHeading">Name</label>
                        <input type="text" class="form-control" name="update_name_admin" id="update_name_admin" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Password</label>
                        <input type="password" class="form-control" name="update_password_admin" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="update">Submit</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>


<!-- update modal -->

<script>
    $(document).ready(function () {
    $('.editbtn').on('click', function () {
        $('#updateModalProducts').modal('show');
        $tr = $(this).closest('tr');
        var imgSrc = $tr.find("img").attr("src");
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        $('#update_id_products').val(data[0]);
        $('#heading_products').val(data[2]);
        $('#price_products').val(data[3]);
        $('#discount_products').val(data[4]);
        $('#img2').val(imgSrc.substring(imgSrc.lastIndexOf('/') + 1));
        $('#previewImg_update').attr('src', $tr.find("img").attr("src"));
    });

    $('#picture_products').on('change', function (e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImg_update').attr('src', e.target.result); // Update preview image src
        };
        reader.readAsDataURL(file);
    });
});
    // modal insert products * preview img
    let imgInput_insert = document.getElementById('imgInput_insert');
    let previewImg_insert = document.getElementById('previewImg_insert');

    imgInput_insert.onchange = evt => {
        const [file] = imgInput_insert.files;
        if (file) {
            previewImg_insert.src = URL.createObjectURL(file);
        }
    }

    // modal update products * preview img
    let picture_products = document.getElementById('picture_products');
    let previewImg_update = document.getElementById('previewImg_update');

    picture_products.onchange = evt => {
        const [file] = picture_products.files;
        if (file) {
            previewImg_update.src = URL.createObjectURL(file);
        }
    }

</script>

<!-- update icon -->

<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $('#updateModalIcons').modal('show');
            $tr = $(this).closest('tr');
            var imgSrc = $tr.find("img").attr("src");
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            $('#update_id_icons').val(data[0]);
            $('#heading_icons').val(data[1]);
            $('#description_icons').val(data[2]);
            $('#img2').val(imgSrc.substring(imgSrc.lastIndexOf('/') + 1));
            
        });
    });

</script>