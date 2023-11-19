<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <template v-for="link in links">
                <li
                    class="page-item"
                    :class="{'active': link.active, 'disabled': !link.url}"
                >
                    <a
                        :href="link.url || '#' "
                        class="page-link"
                    >
                        <span v-if="link.label?.endsWith('Previous')">Previous</span>
                        <span v-else-if="link.label?.startsWith('Next')">Next</span>
                        <span v-else>{{ link.label }}</span>
                    </a>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        links: {
            type: Array,
            required: true
        }
    }
}
</script>
