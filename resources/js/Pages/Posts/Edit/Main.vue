<template>
    <MainLayout>
        <Head title="Edit Post"/>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit post page.</h4>
                    <p class="card-description">
                        Here you can edit your post.
                    </p>
                    <PostForm
                        :post="post"
                        :categories="categories"
                        :statuses="statuses"
                        @save="update"
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
        post: {
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
    },
    methods: {
        cancel() {
            Inertia.get(route('blog.posts.list'))
        },
        update(postForm) {
            postForm.put(route('blog.posts.update', this.post));
        }
    }
}
</script>

