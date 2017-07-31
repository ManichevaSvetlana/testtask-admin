@extends('layouts.admin')
@section('styles')
    <style>
        .mdi{
            font-size: 21px;
        }
        .mdi-account-remove:hover, .mdi-account-multiple-minus:hover{
            color: #bf0002;
            cursor: default;
        }
        .mdi-account-edit:hover {
            color: #7e6bff;
            cursor: default;
        }
        .non-visible{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12" id="user-table">
            <form id="formAddUser" class="non-visible">
               <i class="mdi mdi-close" style="float:right; cursor: pointer" onclick="document.getElementById('formAddUser').className = 'non-visible'"></i>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" v-model="newUser.username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" v-model="newUser.password">
                </div>
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="text" class="form-control" id="name" v-model="newUser.name">
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" id="surname" v-model="newUser.surname">
                </div>
                <div class="form-group">
                    <label for="dbo">Date of Birthday</label>
                    <input type="date" class="form-control" id="dbo" v-model="newUser.dbo">
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" v-on:click.prevent="addUser" >Add Profile
                        </button>
                    </div>
                </div>
            </form>
            <div class="card">

                <div class="card-block" >
                    @if(!$isGroup)
                        <button class="btn btn-success" style="float:right; margin-left: 5px" onclick="document.getElementById('formAddUser').className = ''">Add user</button>
                    <h4 class="card-title">Users table</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Date of Birth</th>
                                <th><i class="mdi mdi-account-settings-variant"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users">
                                <td>@{{ user.id }}</td>
                                <td>@{{ user.name }}</td>
                                <td>@{{ user.surname }}</td>
                                <td>@{{ user.username }}</td>
                                <td>@{{ user.dbo }}</td>
                                <td><i class="mdi mdi-account-remove" v-on:click.prevent="delUser(user.id)"></i></td>
                                <td><a v-bind:href="'user/'+user.id+'/edit'"><i class="mdi mdi-account-edit"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        @else

                        <h4 class="card-title">Groups table</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Name</th>
                                    <th><i class="mdi mdi-account-settings-variant"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="group in groups">
                                    <td>@{{ group.id }}</td>
                                    <td>@{{ group.name }}</td>
                                    <td><i v-on:click.prevent="delGroup(group.id)" class="mdi mdi-account-multiple-minus"></i></td>
                                    <td><a v-bind:href="'group/'+group.id+'/edit'"><i class="mdi mdi-account-edit"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/vue"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource"></script>
    <script type="text/javascript">

        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

        new Vue({
            el: '#user-table',
            data: {
                users: {},
                newUser: {username: '', password: '', name: '', surname: '', dbo: ''},

                groups: {},
                newGroup: {name: ''}
            },

            mounted: function () {
                this.fetchUsers();
                this.fetchGroups();
            },

            methods: {
                fetchUsers: function () {
                    this.$http.get('/user').then(function(response){
                        this.users = response.body;
                    })
                },

                addUser: function () {
                    this.$http.post('user', this.newUser).then(function () {
                        this.fetchUsers();
                        this.newUser = {username: '', password: '', name: '', surname: '', dbo: ''};
                        alert('User was added.');
                    });
                },

                delUser: function (id) {
                    this.$http.delete('user/'+id).then( function() {
                        this.fetchUsers();
                        alert('User was deleted.');
                    });
                },


                fetchGroups: function () {
                    this.$http.get('/group').then(function(response){
                        this.groups = response.body;
                    })
                },

                addGroup: function () {
                    this.$http.post('group', this.newGroup).then(function () {
                        this.fetchGroups();
                        this.newGroup = {name: ''};
                        alert('Group was added.');
                    });
                },

                delGroup: function (id) {
                    this.$http.delete('group/'+id).then( function() {
                        this.fetchGroups();
                        alert('Group was deleted.');
                    });
                }
            }

        });
    </script>
@endsection