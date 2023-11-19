<template>
    <MainLayout>
        <Head title="Home"/>
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-4">
                    <h3 class="card-title">Posts</h3>
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    <HomeFilter
                        :statuses="statuses"
                        :categories="categories"
                    />
                </div>
            </div>
            <div
                v-if="!$page.props.loggedIn"
                class="col-md-12"
            >
                <SubscriptionForm/>
            </div>
            <template v-if="posts.data?.length">
                <div class="col-md-12 row">
                    <div
                        v-for="post in posts.data"
                        :key="post.id"
                        class="col-md-3 grid-margin stretch-card"
                    >
                        <PostCard
                            :post="post"
                        />
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <Pagination
                            :links="posts.links"
                        />
                    </div>
                </div>

            </template>

            <div
                v-else
                class="col-md-12 grid-margin stretch-card"
            >
                <div class="card">
                    <div class="card-body">
                        <EmptyTable/>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import {Head, Link} from "@inertiajs/inertia-vue3";
import EmptyTable from "@/Components/EmptyTable.vue";
import PostCard from "@/Components/Cards/PostCard.vue";
import HomeFilter from "@/Pages/Home/Partials/HomeFilter.vue";
import SubscriptionForm from "@/Pages/Home/Partials/SubscriptionForm.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    name: "Main",
    components: {
        MainLayout,
        EmptyTable,
        Head,
        Link,
        PostCard,
        HomeFilter,
        SubscriptionForm,
        Pagination,
    },
    props: {
        posts: {
            type: Object,
            required: true
        },
        categories: {
            type: Array,
            required: true
        },
        statuses: {
            type: Array,
            required: true
        }
    }
}
</script>

