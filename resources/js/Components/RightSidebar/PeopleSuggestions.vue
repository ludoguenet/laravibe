<script setup lang="ts">
import { User } from '@/types';
import SuggestedUser from './SuggestedUser.vue';

defineProps<{
    potentialFriends: Array<User>;
}>();

const handleConnect = (id: number) => {
    console.log('Connecting with user:', id);
};
</script>

<template>
    <aside class="rounded-lg bg-white p-6 shadow">
        <h3 class="text-lg font-medium text-gray-800">People you may know</h3>
        <ul class="mt-4 space-y-4">
            <SuggestedUser
                v-for="friend in potentialFriends"
                :key="friend.id"
                :user="friend"
                @connect="handleConnect"
            />
        </ul>
    </aside>
</template>
