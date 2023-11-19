<template>
    <MainLayout>
        <Head title="Posts"/>
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h3 class="card-title">Posts</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <Link
                        :href="route('blog.posts.new')"
                        class="btn btn-primary"
                    >
                        New Post
                    </Link>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <template
                            v-if="posts.data?.length"
                        >
                            <div class="table-responsive">
                                <PostsTable
                                    :posts="posts.data"
                                />
                            </div>
                            <div class="d-flex justify-content-end">
                                <Pagination
                                    :links="posts.links"
                                />
                            </div>
                        </template>
                        <EmptyTable v-else/>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import PostsTable from "@/Pages/Posts/List/Partials/PostsTable.vue";
import EmptyTable from "@/Components/EmptyTable.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
export default {
    name: "Main",
    components: {
        MainLayout,
        PostsTable,
        EmptyTable,
        Head,
        Link,
        Pagination,
    },
    props: {
        posts: {
            type: Object,
            required: true,
        }
    }
}
</script>
