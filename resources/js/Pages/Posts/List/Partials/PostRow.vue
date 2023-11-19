<template>
    <tr>
        <td>
            <Link
                :href="route('blog.posts.view',post)"
                target="_blank"
            >
                <img
                    class="img-thumbnail"
                    :src="post.image"
                />
            </Link>
        </td>
        <td>
            <Link
                :href="route('blog.posts.view',post)"
                class="btn text-primary"
                target="_blank"
            >
                {{ post.title }}
            </Link>
        </td>
        <td>{{ post.status }}</td>
        <td>{{ post.category?.name }}</td>
        <td>{{ post.created_at }}</td>
        <td>
            <Link
                :href="route('blog.posts.edit',post)"
                class="btn text-primary px-3"
            >
                Edit
            </Link>
            <button
                @click.prevent="deletePost"
                class="btn text-danger px-3"
            >
                Delete
            </button>
        </td>
    </tr>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from '@inertiajs/inertia';
export default {
    name: "PostRow",
    components: {
        Link,
    },
    props: {
        post: {
            type: Object,
            required: true,
        }
    },
    methods: {
        deletePost() {
            Inertia.delete(route('blog.posts.destroy', this.post), {
                preserveScroll: true
            })
        }
    }
}
</script>

