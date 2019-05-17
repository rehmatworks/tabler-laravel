<template>
    <div class="row">
        <div class="form-group col-sm-4 col-md-2">
            <label class="form-label">
                Role  <span class="form-required">*</span>
            </label>
            <select v-bind:disabled="adding" v-model="role" class="custom-select" v-bind:class="{'is-invalid': errors.role}">
                <option v-for="r in roles" v-bind:value="r.id">{{ r.name }}</option>
            </select>
            <div v-if="errors.role" class="invalid-feedback">
                {{ errors.role[0] }}
            </div>
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                Name <span class="form-required">*</span>
            </label>
            <input v-bind:disabled="adding" v-model="name" type="text" class="form-control" v-bind:class="{'is-invalid': errors.name}" placeholder="Name of the user">
            <div v-if="errors.name" class="invalid-feedback">
                {{ errors.name[0] }}
            </div>
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                Email <span class="form-required">*</span>
            </label>
            <input v-bind:disabled="adding" v-model="email" type="email" class="form-control" v-bind:class="{'is-invalid': errors.email}" placeholder="Email address">
            <div v-if="errors.email" class="invalid-feedback">
                {{ errors.email[0] }}
            </div>
        </div>
        <div class="form-group col-sm-4 col-md-3">
            <label class="form-label">
                Password <span class="form-required">*</span>
            </label>
            <input v-bind:disabled="adding" v-model="password" type="password" v-bind:class="{'is-invalid': errors.password}" class="form-control" placeholder="Set an account password">
            <div v-if="errors.password" class="invalid-feedback">
                {{ errors.password[0] }}
            </div>
        </div>
        <div class="form-group col-sm-4 col-md-1">
            <label class="form-label">&nbsp;</label>
            <button v-bind:disabled="adding" @click="addUser" type="submit" class="btn btn-primary" style="width:100%;"><i class="fe fe-plus"></i></button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['baseurl'],
    data() {
        return {
            errors: [],
            roles: [],
            adding: false,
            role: '',
            name: '',
            email: '',
            password: ''
        }
    },
    mounted() {
        this.getRoles();
    },
    methods: {
        addUser() {
            let _this = this;
            _this.adding = true;
            _this.errors = [];
            axios.post(_this.baseurl, {role: _this.role, email: _this.email, name: _this.name, password: _this.password}).then((res) => {
                _this.$parent.users = [res.data].concat(_this.$parent.users);
                _this.$toast('User account has been created!');
                _this.resetForm();
                _this.adding = false;
            }).catch((err) => {
                _this.errors = err.response.data.errors;
                _this.adding = false;
            });
        },
        resetForm() {
            this.email = '';
            this.name = '';
            this.password = '';
            this.role = '';
        },
        getRoles() {
            let _this = this;
            axios.get(_this.baseurl+'/roles').then((res) => {
                _this.roles = res.data;
            }).catch((err) => {
                _this.$toast('Something went wrong!');
            });
        }
    }
}
</script>
