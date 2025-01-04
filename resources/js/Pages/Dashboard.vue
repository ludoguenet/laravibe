<script setup lang="ts">
import CreateFeed from '@/Components/CreateFeed.vue';
import FeedList from '@/Components/FeedList.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Feed } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{
    feeds: Array<Feed>;
}>();

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <CreateFeed />

        <FeedList :feeds="feeds" />
    </AuthenticatedLayout>
</template>
