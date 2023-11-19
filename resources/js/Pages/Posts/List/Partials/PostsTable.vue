<template>
    <table class="table">
        <thead>
            <tr>
                <th>Cover image</th>
                <th>Title</th>
                <th>Status</th>
                <th>category</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <PostRow
                v-for="post in posts"
                :key="post.id"
                :post="post"
            />
        </tbody>
    </table>
</template>

<script>
import PostRow from "@/Pages/Posts/List/Partials/PostRow.vue";
export default {
    name: "PostsTable",
    components: {
        PostRow,
    },
    props: {
        posts: {
            type: Array,
            required: true,
        }
    }
}
</script>

