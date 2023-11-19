<template>
    <GuestLayout>
        <Head title="Register"/>
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <Link
                    :href="route('home')"
                >
                    <img src="../../../css/assets/images/logo.svg" alt="logo">
                </Link>
            </div>
            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            <form class="pt-3">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        placeholder="Full name"
                        v-model="registerForm.name"
                    >
                    <div
                        v-if="registerForm.errors.name"
                        class="text-danger"
                    >
                        {{ registerForm.errors.name }}
                    </div>
                </div>
                <div class="form-group">
                    <input
                        type="email"
                        class="form-control form-control-lg"
                        placeholder="Email"
                        v-model="registerForm.email"
                    >
                    <div
                        v-if="registerForm.errors.email"
                        class="text-danger"
                    >
                        {{ registerForm.errors.email }}
                    </div>
                </div>
                <div class="form-group">
                    <input
                        type="password"
                        class="form-control form-control-lg"
                        placeholder="Password"
                        v-model="registerForm.password"
                    >
                    <div
                        v-if="registerForm.errors.password"
                        class="text-danger"
                    >
                        {{ registerForm.errors.password }}
                    </div>
                </div>
                <div class="mt-3">
                    <a
                        href="#"
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                        @click.prevent="register"
                    >
                        SIGN UP
                    </a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Already have an account?
                    <Link
                        :href="route('login')"
                        class="text-primary"
                    >
                        Login
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
    name: "Register",
    components: {
        Head,
        Link,
        GuestLayout
    },
    data() {
        return {
            registerForm: useForm({
                name: null,
                email: null,
                password: null,
            })
        }
    },
    methods: {
        register() {
            this.registerForm.post(route('register'));
        }
    }
}
</script>
