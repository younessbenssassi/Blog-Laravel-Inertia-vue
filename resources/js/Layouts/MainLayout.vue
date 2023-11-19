<template>
    <MainHeader/>
    <div
        class="container-fluid page-body-wrapper"
        :class="{'sidebar-icon-only':!$page.props.loggedIn}"
    >
        <SideMenu v-if="$page.props.loggedIn"/>
        <div class="main-panel">
            <div class="content-wrapper">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import SideMenu from "@/Layouts/Partials/SideMenu.vue";
import MainHeader from "@/Layouts/Partials/MainHeader.vue";

export default {
    name: "MainLayout",
    components: {
        SideMenu,
        MainHeader
    }

}
</script>
