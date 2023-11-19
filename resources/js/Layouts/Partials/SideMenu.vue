<template>
    <nav
        class="sidebar sidebar-offcanvas"
        id="sidebar"
    >
        <ul class="nav">
            <template
                v-for="item in menu"
            >
                <li
                    v-if="item.subMenu"
                    class="nav-item"
                    :class="{'active': item.active || item.show}"
                >
                    <a
                        href="#"
                        class="nav-link"
                        @click.prevent="item.show = !item.show"
                    >
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">
                            {{ item.heading }}
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div
                        class="collapse show"
                        v-if="item.show"
                    >
                        <ul class="nav flex-column sub-menu">
                            <template
                                v-for="subItem in item.subMenu"
                            >
                                <li
                                    class="nav-item"
                                    :class="{'active': !subItem.active}"
                                >
                                    <!--
                                        'active': !subItem.active I used this check like this bcs I'm using pre-made
                                        theme and there is a prb in active class style
                                     -->
                                    <Link
                                        :href="subItem.route"
                                        class="nav-link"
                                    >
                                        <span class="menu-title">{{ subItem.heading }}</span>
                                    </Link>
                                </li>

                            </template>
                        </ul>
                    </div>
                </li>
                <li
                    v-else
                    class="nav-item"
                    :class="{'active': item.active}"
                >
                    <Link
                        :href="item.route"
                        class="nav-link"
                    >
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">{{ item.heading }}</span>
                    </Link>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "SideMenu",
    components: {
        Link
    },
    data() {
        return {
            menu: [
                {
                    heading: "Dashboard",
                    route: route('home'),
                    active: route().current('home')
                },
                {
                    heading: "Blog",
                    active: route().current('blog.*'),
                    show: true,
                    subMenu: [
                        {
                            heading: "Posts",
                            route: route('blog.posts.list'),
                            active: route().current('blog.posts.*')
                        },
                        {
                            heading: "Categories",
                            route: route('blog.categories.list'),
                            active: route().current('blog.categories.*')
                        },
                    ],
                },
            ]
        }
    }
}
</script>
