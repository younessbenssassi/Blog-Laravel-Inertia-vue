<template>
    <div class="card">
        <div class="card-body p-0">
            <Link
                :href="route('blog.posts.view',post)"
            >
                <img
                    class="img-thumbnail"
                    src="https://img.freepik.com/premium-photo/technological-cyberspace-background-neon-effect-ai-technology-generated-imag_1112-11244.jpg"
                />
            </Link>
            <div class="row p-3">
                <div class="col-md-12">
                    <Link
                        :href="route('blog.posts.view',post)"
                    >
                        <h4 class="card-title">{{ post.title }}</h4>
                    </Link>
                    <p>
                        {{ contentPreview }}
                        <span v-if="hasMoreContent">...</span>
                    </p>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-6 d-flex justify-content-start">
                        {{ post.category?.name }}
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        {{ parseDateTimeToStartOf(post.created_at) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "PostCard",
    components: {
        Link
    },
    props: {
        post: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            hasMoreContent: this.post?.content?.length > 50
        }
    },
    computed: {
        contentPreview() {
            return this.post?.content?.substring(0, 50);
        }
    }
}
</script>
