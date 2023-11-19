<template>
    <MainLayout>
        <Head title="Categories"/>
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-6">
                    <h3 class="card-title">Categories</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <NewCategoryModal/>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <template
                            v-if="categories.data?.length"
                        >
                            <div class="table-responsive">
                                <CategoriesTable
                                    :categories="categories.data"
                                />
                            </div>
                            <div class="d-flex justify-content-end">
                                <Pagination
                                    :links="categories.links"
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
import CategoriesTable from "./Partials/CategoriesTable.vue";
import EmptyTable from "@/Components/EmptyTable.vue";
import NewCategoryModal from "./Partials/NewCategoryModal.vue";
import {Head} from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
export default {
    name: "Main",
    components: {
        MainLayout,
        CategoriesTable,
        EmptyTable,
        NewCategoryModal,
        Head,
        Pagination
    },
    props: {
        categories: {
            type: Object,
            required: true,
        }
    }
}
</script>
