<template>
<div class="col-12">
    <AddformComponent :baseurl="baseurl"></AddformComponent>
    <div class="card">
        <div class="table-responsive p-4 text-center" v-if="loading">
            Loading...
        </div>
        <div class="table-responsive" v-else>
            <table v-if="usersData.data" class="table table-hover table-outline table-vcenter text-nowrap card-table">
                <thead>
                    <tr>
                        <th class="text-center w-1"><i class="icon-people"></i></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center"><i class="icon-settings"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user, index in usersData.data">
                        <td class="text-center">
                            <div :style="{'background-image': 'url(' + user.avatarurl + ')'}" class="avatar d-block">
                            </div>
                        </td>
                        <td>
                            <div>{{ user.name }}</div>
                            <div class="small text-muted">
                                Registered {{ user.registered }}
                            </div>
                        </td>
                        <td>
                            {{ user.email }}
                        </td>
                        <td>
                            {{ user.role }}
                        </td>
                        <td class="text-right">
                            <div class="item-action dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a v-bind:href="baseurl+'/'+user.id+'/edit'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit</a>
                                    <a @click="deleteUser(user.id, index)" href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-trash"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p v-else class="m-4 text-center">No users found!</p>
        </div>
    </div>
    <pagination :data="usersData" @pagination-change-page="loadUsers"></pagination>
</div>
</template>

<script>
import AddformComponent from './AddformComponent';
export default {
    props: ['baseurl'],
    components: {
        AddformComponent
    },
    data() {
        return {
            usersData: {},
            loading: false
        }
    },
    mounted() {
        this.loadUsers();
    },
    methods: {
        loadUsers(page = 1) {
            let _this = this;
            _this.loading = true;
            axios.get(_this.baseurl + '?page=' + page).then((res) => {
                _this.loading = false;
                _this.usersData = res.data;
            }).catch((err) => {
                _this.loading = false;
                _this.$toast("Something went wrong!");
            });
        },
        deleteUser(userId, index) {
            let _this = this;
            this.$confirm({
                title: 'Are you sure?',
                content: 'The user and all associated data will be deleted.',
                yesText: 'Yes, Delete',
                noText: 'No'
            }).then(function() {
                axios.delete(_this.baseurl+'/'+userId).then((res) => {
                    _this.$toast('User has been deleted.');
                    _this.usersData.data.splice(index, 1);
                }).catch((err) => {
                    _this.$toast(err.response.data.message);
                });
            }).catch((err) => {

            });
        }
    }
}
</script>
