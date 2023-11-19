<template>
    <div class="d-flex align-content-center justify-content-end">
        <div
            v-if="$page.props.loggedIn"
            class="dropdown px-3"
        >
            <button
                @click.prevent="expandStatusesDropdown = !expandStatusesDropdown"
                class="btn btn-primary btn-sm dropdown-toggle"
                type="button"
            >
                {{ filters.status ?? 'Select status' }}
            </button>
            <div
                v-if="expandStatusesDropdown"
                class="dropdown-menu show"
            >
                <a
                    v-for="status in statuses"
                    :key="status"
                    @click.prevent="updateStatus(status)"
                    class="dropdown-item"
                    :class="{'active': filters.status === status}"
                    href="#"
                >
                    {{ status }}
                </a>
            </div>
        </div>
        <div
            v-if="categories?.length"
            class="dropdown"
        >
            <button
                @click.prevent="expandCategoriesDropdown = !expandCategoriesDropdown"
                class="btn btn-primary btn-sm dropdown-toggle"
                type="button"
            >
                {{ category?.name ?? 'Select category' }}
            </button>
            <div
                v-if="expandCategoriesDropdown"
                class="dropdown-menu show"
            >
                <a
                    v-for="category in categories"
                    :key="category.id"
                    @click.prevent="updateCategoryId(category)"
                    class="dropdown-item"
                    :class="{'active': filters.category_id === category.id}"
                    href="#"
                >
                    {{ category.name }}
                </a>
            </div>
        </div>
        <div
            v-if="categories?.length || $page.props.loggedIn"
            class="d-flex align-content-center align-content-between"
        >
            <button
                class="btn text-primary px-3"
                @click.prevent="clearFilters"
            >
                Clear filters
            </button>
        </div>
    </div>
</template>

<script>
import {Inertia} from '@inertiajs/inertia';

export default {
    name: "HomeFilter",
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
    data() {
        return {
            expandStatusesDropdown: false,
            expandCategoriesDropdown: false,
            filters: this.getQueryParams(),
            category: null
        }
    },
    methods: {
        updateStatus(status) {
            if (status === this.filters.status) {
                this.filters.status = null;
            } else {
                this.filters.status = status;
            }

            this.expandStatusesDropdown = false;
            this.updatePage();
        },
        updateCategoryId(category) {
            if (category?.id === this.filters.category_id) {
                this.filters.category_id = null;
                this.category = null;
            } else {
                this.filters.category_id = category.id;
                this.category = category;
            }

            this.expandCategoriesDropdown = false;
            this.updatePage();
        },
        getQueryParams() {
            const urlParams = new URLSearchParams(window.location.search)

            return {
                status: urlParams?.get('status') || null,
                category_id: urlParams?.get('category_id') || null,
                search: urlParams?.get('search') || null,
            }
        },
        async updatePage() {
            await this.$nextTick()

            let cleanFilters = Object.assign({}, this.filters)
            for (const field in cleanFilters) {
                if (!cleanFilters[field]) {
                    delete cleanFilters[field]
                }
            }

            Inertia.get(route(route().current()), cleanFilters, {preserveState: true})
        },
        clearFilters() {
            this.filters = {
                status: null,
                category_id: null,
                search: null,
            }
            this.category = null;
            this.updatePage();
        }
    }
}
</script>
