<template>
    <MainLayout>
        <Head title="New Post"/>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create new post page.</h4>
                    <p class="card-description">
                        Here you can create new post.
                    </p>
                    <PostForm
                        :categories="categories"
                        :statuses="statuses"
                        @save="create"
                        @cancel="cancel"
                    />
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/inertia-vue3";
import PostForm from "@/Pages/Posts/Partials/PostForm.vue";
import {Inertia} from '@inertiajs/inertia';

export default {
    name: "Main",
    components: {
        MainLayout,
        Head,
        PostForm
    },
    props: {
        categories: {
            type: Array,
            required: true
        },
        statuses: {
            type: Array,
            required: true
        }
    },
    methods: {
        cancel() {
            Inertia.get(route('blog.posts.list'))
        },
        create(postForm) {
            postForm.post(route('blog.posts.store'));
        }
    }
}
</script>

