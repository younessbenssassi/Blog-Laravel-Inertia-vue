<template>
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                        <a href="#" @click.prevent="updatePage">
                            <i class="icon-search"></i>
                        </a>
                    </span>
                </div>
                <input
                    type="text"
                    class="form-control"
                    id="navbar-search-input"
                    placeholder="Search now"
                    v-model="search"
                    v-on:keyup.enter="updatePage"
                >
            </div>
        </li>
    </ul>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "GlobalSearch",
    data() {
        return {
            search: this.getQueryParams(),
        }
    },
    methods: {
        getQueryParams() {
            const urlParams = new URLSearchParams(window.location.search)
            return urlParams?.get('status') || null;
        },
        async updatePage() {
            await this.$nextTick();
            Inertia.get(route(route().current()), {search: this.search}, {preserveState: true})
        },
    }
}
</script>
