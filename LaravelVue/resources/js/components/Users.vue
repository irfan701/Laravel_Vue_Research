<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Bookings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Bookings</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <a class="btn btn-sm bg-success-light" data-toggle="modal"
                   href="#add_modal">
                    <i class="fas fa-plus-circle"></i>
                    Add
                </a>
            </div>
            <br>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Recent Orders -->
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Type </th>
                                        <th>Modify</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/profiles/avatar-08.jpg"
                                                    alt="User Image"></a>
                                                <a href="profile.html">James Amen</a>
                                            </h2>
                                        </td>
                                        <td>Maths</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/user/user.jpg" alt="User Image"></a>
                                                <a href="profile.html">Jonathan Doe </a>
                                            </h2>
                                        </td>
                                        <td>9 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.15
														AM</span></td>
                                        <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status_1" class="check" checked>
                                                <label for="status_1" class="checktoggle">checkbox</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                   href="#edit_modal">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                                <a data-toggle="modal" href="#delete_modal"
                                                   class="btn btn-sm bg-danger-light">
                                                    <i class="far fa-trash-alt"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Recent Orders -->

                </div>
            </div>
        </div>
    </div>


    <!--  Add Modal -->

    <div class="modal fade" id="add_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Edit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form id="update_category" method="post" autocomplete="off"
                                      enctype="multipart/form-data" novalidate="novalidate" class="bv-form"><button
                                    type="submit" class="bv-hidden-submit"
                                    style="display: none; width: 0px; height: 0px;"></button>
                                    <input type="hidden" name="csrf_token_name"
                                           value="104dbdaf79d7d8e21e4ae9991d166669">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text" value="Painting" name="category_name"
                                               id="category_name" data-bv-field="category_name">
                                        <input class="form-control" type="hidden" value="8" name="category_id"
                                               id="category_id">
                                        <small class="help-block" data-bv-validator="remote" data-bv-for="category_name"
                                               data-bv-result="NOT_VALIDATED" style="display: none;">This category name is
                                            already exist</small><small class="help-block" data-bv-validator="notEmpty"
                                                                        data-bv-for="category_name" data-bv-result="NOT_VALIDATED"
                                                                        style="display: none;">Please enter category name</small></div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input class="form-control" type="file" name="category_image"
                                               id="category_image">
                                    </div>
                                    <div class="form-group">
                                        <div class="avatar">
                                            <img class="avatar-img rounded" src="assets/img/user/user.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-primary" name="form_submit" value="submit"
                                                type="submit">Save Changes</button>
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Edit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form id="update_category" method="post" autocomplete="off"
                                      enctype="multipart/form-data" novalidate="novalidate" class="bv-form"><button
                                    type="submit" class="bv-hidden-submit"
                                    style="display: none; width: 0px; height: 0px;"></button>
                                    <input type="hidden" name="csrf_token_name"
                                           value="104dbdaf79d7d8e21e4ae9991d166669">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text" value="Painting" name="category_name"
                                               id="category_name" data-bv-field="category_name">
                                        <input class="form-control" type="hidden" value="8" name="category_id"
                                               id="category_id">
                                        <small class="help-block" data-bv-validator="remote" data-bv-for="category_name"
                                               data-bv-result="NOT_VALIDATED" style="display: none;">This category name is
                                            already exist</small><small class="help-block" data-bv-validator="notEmpty"
                                                                        data-bv-for="category_name" data-bv-result="NOT_VALIDATED"
                                                                        style="display: none;">Please enter category name</small></div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input class="form-control" type="file" name="category_image"
                                               id="category_image">
                                    </div>
                                    <div class="form-group">
                                        <div class="avatar">
                                            <img class="avatar-img rounded" src="assets/img/user/user.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-primary" name="form_submit" value="submit"
                                                type="submit">Save Changes</button>
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal -->

    <!-- Delete Model -->
    <div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!--	<div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>-->
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="button" class="btn btn-primary">Delete </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Users"
    }
</script>

<style scoped>

</style>
