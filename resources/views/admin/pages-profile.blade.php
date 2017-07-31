@extends('layouts.admin')
@section('styles')
    <style>
        .mdi-close {
            font-size: 15px;
        }

        .label-danger:hover {
            cursor: pointer;
        }

        .label-danger {
            margin-right: 5px;
        }

        .mdi-plus-circle {
            cursor: pointer;
            font-size: 20px;
            color: #26c6da;
        }

        .mdi-plus-circle:hover {
            color: #1c818f;
        }

        a:hover {
            color: black;
        }

        .btn-basic {
            color: #99abb4;
            float: right;
        }

        .non-visible {
            display: none;
        }

        input {
            color: #6c7c85;
        }
    </style>
@endsection
@section('content')
    <div >
        @if($isUser)
            <div class="row" id="user">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-block">
                            <center class="m-t-30"><img src="{{ asset('assets/images/users/2.jpg') }}" class="img-circle"
                                                        width="150"/>
                                <h4 class="card-title m-t-10">@{{ user.name }}</h4>
                                <h6 class="card-subtitle">User</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-12"><i class="icon-people"></i> <font class="font-medium">@{{ n }}</font>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7" >
                    <div class="card" >
                        <div class="card-block">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="{{ $user->username }}"
                                               class="form-control form-control-line"
                                               id="username" v-model="user.username" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" id="password"
                                               placeholder="{{ $user->password }}" v-model="user.password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="{{ $user->name }}" id="name"
                                               class="form-control form-control-line" v-model="user.name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="{{ $user->surname }}" id="surname"
                                               class="form-control form-control-line" v-model="user.surname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date of Birth</label>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control form-control-line" value="{{ $user->dbo }}"
                                               id="dbo"
                                               v-model="user.dbo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Groups</label>
                                    <div class="col-md-12">
                                        <span v-for="userGroup in userGroups" :id="userGroup.id"
                                              class="label label-danger"
                                              v-on:click.prevent="delGroup(userGroup)">@{{userGroup.name}}<i
                                                    class="mdi mdi-close"></i></span>
                                        <i class="mdi mdi-plus-circle" onclick="showGroupAdd()"></i>
                                    </div>
                                </div>
                                <div id="group-add" class="non-visible">
                                    <div class="form-group">
                                        <label class="col-md-12">Add group</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" list="group-list"
                                                   v-on:input.prevent="checkGroup()" id="group-input">
                                            <datalist id="group-list">
                                                <option v-for="group in groups" :value="group.name"
                                                        id="group-name"></option>
                                            </datalist>
                                            <a class="btn btn-basic" v-on:click.prevent="setGroup()" href="">Add</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" v-on:click.prevent="updateUser">Update Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://unpkg.com/vue"></script>
            <script src="https://cdn.jsdelivr.net/npm/vue-resource"></script>
            <script type="text/javascript">

                Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

                new Vue({
                    el: '#user',
                    data: {
                        isNameExist: false,
                        n: 0,
                        groupsId: [],
                        user: {
                            username: '<? echo $user->username ?>',
                            password: '<? echo $user->password ?>',
                            name: '<? echo $user->name ?>',
                            surname: '<? echo $user->surname ?>',
                            dbo: '<? echo $user->dbo ?>',
                            groups: this.groupsId
                        },
                        groups: {name: '', id: ''},
                        userGroups: {name: '', id: ''},
                        response: {value: ''}
                    },
                    mounted: function () {
                        this.fetchGroups();
                    },

                    methods: {
                        fetchGroups: function () {
                            this.userGroups = <? echo $user->group ?>;
                            for (var i = 0; i < this.userGroups.length; i++) {
                                this.groupsId[i] = this.userGroups[i].id;
                            }
                            this.n = this.groupsId.length;
                        },
                        updateUser: function () {
                            this.user.groups = this.groupsId;
                            if (this.checkInputs() && !this.isNameExist) {
                                var id = <? echo $user->id ?>;
                                this.$http.put('/user/' + id, this.user).then(function (response) {
                                    alert('User profile was updated.');
                                    this.n = this.groupsId.length;
                                });
                            }
                            else alert('You need to fill in all the fields.');

                        },

                        checkGroup: function () {
                            this.response.value = document.getElementById('group-input').value;
                            this.$http.post('/groups-list', this.response).then(function (response) {
                                this.groups = response.body;
                            });
                        },

                        delGroup: function (group) {
                            this.groupsId.splice(this.groupsId.indexOf(group.id), 1);
                            this.userGroups.splice(this.userGroups.indexOf(group), 1);
                        },

                        setGroup: function () {
                            this.response.value = document.getElementById('group-input').value;
                            this.$http.post('/group-get', this.response).then(function (response) {
                                if (response.body == '') {
                                    alert("This group isn't exist.");
                                }
                                else {
                                    var isExist = false;
                                    for (var i = 0; i < this.groupsId.length; i++) {
                                        if (response.body[0].id == this.groupsId[i]) {
                                            isExist = true;
                                            break;
                                        }
                                    }
                                    if (!isExist) {
                                        this.groupsId.push(response.body[0].id);
                                        this.userGroups.push(response.body[0]);
                                    }
                                    else alert('This group already exists.')
                                }
                            });
                        },

                        checkInputs: function () {
                            return (document.getElementById('username').value.length > 0 && document.getElementById('password').value.length > 0
                            && document.getElementById('name').value.length > 0 && document.getElementById('surname').value.length > 0
                            && document.getElementById('dbo').value.length > 0);
                        }
                    }

                });

                function showGroupAdd() {
                    document.getElementById('group-add').className = '';
                }
            </script>
        @else
            <div class="row" id="group">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-block">
                            <center class="m-t-30"><img src="{{ asset('assets/images/users/3.jpg') }}" class="img-circle"
                                                        width="150"/>
                                <h4 class="card-title m-t-10">@{{ group.name }}</h4>
                                <h6 class="card-subtitle">Group</h6>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-block">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Group's Name</label>
                                    <div class="col-md-12">
                                        <input id="group-name" v-model="group.name" type="text" :placeholder="group.name"
                                               class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" v-on:click.prevent="updateGroup">Update Group Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://unpkg.com/vue"></script>
            <script src="https://cdn.jsdelivr.net/npm/vue-resource"></script>
            <script type="text/javascript">

                Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

                new Vue({
                    el: '#group',
                    data: {
                        group: {
                            name: '<? echo $group->name ?>'
                        }
                    },

                    methods: {
                        updateGroup: function () {
                            if (this.checkInputs()) {
                                var id = <? echo $group->id ?>;
                                this.$http.put('/group/' + id, this.group).then(function (response) {
                                    alert('Group profile was updated.');
                                });
                            }
                            else alert('You need to fill in all the fields.');

                        },

                        checkInputs: function () {
                            return (document.getElementById('group-name').value.length > 0);
                        }
                    }

                });
            </script>
        @endif
    </div>
@endsection


