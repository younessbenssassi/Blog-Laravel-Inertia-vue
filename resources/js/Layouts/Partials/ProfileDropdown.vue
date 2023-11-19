<template>
    <a
        @click.prevent="expand = !expand"
        class="nav-link dropdown-toggle"
        href="#"
    >
        <img :src="$page.props?.auth?.image" alt="profile"/>
        <span class="px-2">{{ $page.props?.auth?.name }}</span>
    </a>
    <div
        v-if="expand"
        class="dropdown-menu dropdown-menu-right navbar-dropdown show"
    >
        <!--        <a class="dropdown-item">-->
        <!--            <i class="ti-settings text-primary"></i>-->
        <!--            Settings-->
        <!--        </a>-->
        <a
            @click.prevent="logout"
            class="dropdown-item"
        >
            <i class="ti-power-off text-primary"></i>
            Logout
        </a>
    </div>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "ProfileDropdown",
    data() {
        return {
            expand: false
        }
    },
    methods: {
        logout() {
            Inertia.post(route('logout'))
        }
    }
}
</script>
