<script setup lang="ts">
import { User } from '@/types';
import axios from 'axios';
import { ref } from 'vue';
import PeopleSuggestions from './PeopleSuggestions.vue';

const potentialFriends = ref<Array<User>>([]);

await axios
    .get(route('friends.potentialFriends'))
    .then(({ data }) => (potentialFriends.value = data));
</script>

<template>
    <div class="sticky top-20">
        <PeopleSuggestions :potential-friends="potentialFriends" />
    </div>
</template>
