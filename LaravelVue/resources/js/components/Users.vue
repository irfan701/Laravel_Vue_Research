<template>
    <div class="page-wrapper">
        <div class="content container-fluid">
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
                <a class="btn btn-sm bg-success-light"
                  @click="newModal()">
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
                                        <th>Type</th>
                                        <th>Register Time</th>
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
                                                <a @click="editModal(user)" class="btn btn-sm bg-success-light">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
<!--                                                <a data-toggle="modal" href="#delete_modal"-->
<!--                                                   class="btn btn-sm bg-danger-light">-->
<!--                                                    <i class="far fa-trash-alt"></i> Delete-->
<!--                                                </a>-->

                                                <a @click="deleteUser(user.id)"
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
                            <h4 class="modal-title" v-show="editMode">Update Users Info</h4>
                            <h4 class="modal-title" v-show="!editMode">Add New</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form @submit.prevent="editMode?updateUser():createUser()" @keydown="form.onKeydown($event)">
                                    <AlertError :form="form"/>
                                    <!-- <AlertErrors :form="form" /> -->
                                    <!-- <AlertSuccess :form="form" message="Your changes have beend saved!" /> -->

                                    <div class="mb-2">
                                        <label class="form-label">username</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control"
                                               :class="{'is-invalid':form.errors.has('name')}">
                                        <HasError :form="form" field="name"/>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Email</label>
                                        <input v-model="form.email" type="text" name="email" class="form-control"
                                               :class="{'is-invalid':form.errors.has('email')}">
                                        <HasError :form="form" field="email"/>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">Password</label>
                                        <input v-model="form.password" type="text" name="password" class="form-control"
                                               :class="{'is-invalid':form.errors.has('password')}">
                                        <HasError :form="form" field="password"/>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Bio</label>
                                        <textarea v-model="form.bio" type="text" name="bio" class="form-control"
                                                  :class="{'is-invalid':form.errors.has('bio')}">
                                        </textarea>

                                        <HasError :form="form" field="bio"/>
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
                                        <HasError :form="form" field="type"/>
                                    </div>


                                    <div class="mt-4">
                                        <button class="btn btn-primary" v-show="editMode"
                                                type="submit">Update
                                        </button>
                                        <button class="btn btn-primary" v-show="!editMode"
                                                type="submit">Create
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cancel
                                        </button>
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


</template>

<script>
    import Form from 'vform'
    import {Button, HasError, AlertError} from 'vform/src/components/bootstrap5'
    import {defineEmits} from "@vue/runtime-core";
    const emit = defineEmits(['AfterCreate'])

    export default {
        components: {
            Button, HasError, AlertError
        },
        name: "Users",
        data: () => ({
            editMode:true,
            users: [],
            form: new Form({
                id:'',
                username: '',
                name: '',
                email: '',
                password: '',
                type: '',
                bio: '',
                photo: '',
            }),
            emits: ['AfterCreate']

        }),
        mounted() {
            console.log('Component Mounted')
        },
        methods: {
            newModal(){
                this.editMode=false
                this.form.reset()
                $("#add_modal").modal('show')
            },
            editModal(user){
                this.editMode=true
                this.form.reset()
                $("#add_modal").modal('show')
                this.form.fill(user)

            },
            updateUser(){

                 this.form.get('/api/users/update/'+this.form.id).then(()=>{
                    this.loadUsers()
                    $("#add_modal").modal('hide')

                }).catch(()=>{

                })
            },

            deleteUser(id){


                Swal.fire({
                    title: 'Are you sure want to delete??',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {

                    if (result.isConfirmed) {
                         this.form.get('/api/users/destroy/'+id)
                        Swal.fire('Saved!', '', 'success')
                        this.loadUsers()
                    }

                })


               // $("#delete_modal").modal('show')


            },

            loadUsers() {
                axios.get('/api/users/get').then((res) => {
                    this.users = res.data
                })
            },
            async createUser() {
                 // this.$Progress.start()
            await this.form.post('/api/users/store').then(()=>{
                this.loadUsers()
                //this.$emit("AfterCreate")
                //    window.toast({
                //        type: "success",
                //        title: "User Created in successfully"
                //    })
                $("#add_modal").modal('hide')
                // this.$Progress.finish()
                // ...
            }).catch(()=>{

            })

            },

            getHumanDate: function (date) {
                return moment(date).format('MMMM Do YYYY, h:mm:ss a');
            }
        },
        created() {
            this.loadUsers()
            // this.on('AfterCreate', () => {
            //     this.loadUsers()
            // })
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
