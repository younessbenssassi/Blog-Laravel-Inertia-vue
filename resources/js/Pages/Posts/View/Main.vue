<template>
    <MainLayout>
        <Head :title="post.title"/>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ post.title }}</h4>
                        <img
                            style="width:100%;"
                            class="img-thumbnail"
                            :src="post.image"
                        />
                        <p class="pt-3">
                            {{ post.content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from "@inertiajs/inertia-vue3";

export default {
    name: "Main",
    components: {
        MainLayout,
        Head,
    },
    props: {
        post: {
            type: Object,
            required: true
        }
    }
}
</script>

