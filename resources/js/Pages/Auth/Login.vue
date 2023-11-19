<template>
    <GuestLayout>
        <Head title="Login"/>
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <Link
                    :href="route('home')"
                >
                    <img src="../../../css/assets/images/logo.svg" alt="logo">
                </Link>
            </div>
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            <form class="pt-3">
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control form-control-lg"
                        placeholder="Email"
                        v-model="loginForm.email"
                    >
                    <div
                        v-if="loginForm.errors.email"
                        class="text-danger"
                    >
                        {{ loginForm.errors.email }}
                    </div>
                </div>
                <div class="form-group">
                    <input
                        type="password"
                        class="form-control form-control-lg"
                        placeholder="Password"
                        v-model="loginForm.password"
                    >
                    <div
                        v-if="loginForm.errors.password"
                        class="text-danger"
                    >
                        {{ loginForm.errors.password }}
                    </div>
                </div>
                <div class="mt-3">
                    <a
                        href="#"
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                        @click.prevent="login"
                    >
                        SIGN IN
                    </a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Don't have an account?
                    <Link
                        :href="route('register')"
                        class="text-primary"
                    >
                        Create
                    </Link>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<script>
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

export default {
    name: "Login",
    components: {
        Head,
        Link,
        GuestLayout
    },
    data() {
        return {
            loginForm: useForm({
                email: null,
                password: null,
            })
        }
    },
    methods: {
        login() {
            this.loginForm.post(route('login'), {
                onSuccess: () => this.loginForm.reset('password'),
            });
        }
    }
}
</script>
