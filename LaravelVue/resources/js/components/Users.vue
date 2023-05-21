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
                                        <th>Register Time </th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users" :key="user.id">
                                        <td>{{user.name}}</td>
                                        <td>{{user.email}}</td>
                                        <td>{{user.type}}</td>

<!--                                        <td><span class="text-primary d-block">{{user.created_at|moment}}-->
<!--														AM</span></td>-->
                                        <td>{{user.created_at }}</td>
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
                                <form @submit.prevent="createUser" @keydown="form.onKeydown($event)">
                                    <AlertError :form="form" />
                                    <!-- <AlertErrors :form="form" /> -->
                                    <!-- <AlertSuccess :form="form" message="Your changes have beend saved!" /> -->

                                    <div class="mb-2">
                                        <label  class="form-label">username</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control"
                                        :class="{'is-invalid':form.errors.has('name')}">
                                        <HasError :form="form" field="name" />
                                    </div>
                                    <div class="mb-2">
                                        <label  class="form-label">Email</label>
                                        <input  v-model="form.email" type="text" name="email" class="form-control"
                                               :class="{'is-invalid':form.errors.has('email')}">
                                        <HasError :form="form" field="email" />
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">Password</label>
                                        <input  v-model="form.password" type="text" name="password" class="form-control"
                                               :class="{'is-invalid':form.errors.has('password')}">
                                        <HasError :form="form" field="password" />
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Bio</label>
                                        <textarea v-model="form.bio" type="text" name="bio" class="form-control"
                                                :class="{'is-invalid':form.errors.has('bio')}">
                                        </textarea>

                                        <HasError :form="form" field="bio" />
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">Type</label>
                                        <select v-model="form.type" type="text" name="username" class="form-control"
                                               :class="{'is-invalid':form.errors.has('type')}">
                                            <option value="">Select User Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">Standard User</option>
                                            <option value="author">Author</option>
                                        </select>
                                        <HasError :form="form" field="type" />
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
    import Form from 'vform'
    import { Button, HasError, AlertError } from 'vform/src/components/bootstrap5'

    export default {
        components: {
            Button, HasError, AlertError
        },
        name: "Users",
        data: () => ({
            users:[],
            form: new Form({
                username: '',

                name:'',
                email:'',
                password:'',
                type:'',
                bio:'',
                photo:'',
            }),



        }),
        mounted() {
          console.log('Component Mounted')
        },
        methods: {
            async createUser () {
                const response = await this.form.post('/api/users/store')
                // ...
            },
            loadUsers(){
              axios.get('/api/users/get').then((res)=>{
                        this.users=res.data
              })
            },
            getHumanDate : function (date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        },
        created() {
            this.loadUsers()
        },
        filters: {
            moment: function (date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        }
    }


</script>

<style scoped>

</style>
