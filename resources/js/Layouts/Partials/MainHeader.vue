<template>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <Link
                :href="route('home')"
                class="navbar-brand brand-logo mr-5"
            >
                <img src="../../../css/assets/images/logo.svg" class="mr-2" alt="logo"/>
            </Link>
        </div>


        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <GlobalSearch/>

            <ul
                class="navbar-nav navbar-nav-right"
            >
                <li
                    v-if="$page.props.loggedIn"
                    class="nav-item nav-profile dropdown"
                >
                    <ProfileDropdown/>
                </li>
                <li
                    v-else
                    class="nav-item nav-profile dropdown"
                >
                    <Link
                        :href="route('login')"
                        class="btn btn-primary"
                    >
                        Login
                    </Link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import GlobalSearch from "@/Layouts/Partials/GlobalSearch.vue";
import ProfileDropdown from "@/Layouts/Partials/ProfileDropdown.vue";

export default {
    name: "MainHeader",
    components: {
        Link,
        GlobalSearch,
        ProfileDropdown,
    },
}
</script>
