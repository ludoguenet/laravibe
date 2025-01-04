<script setup lang="ts">
interface User {
    id: number;
    name: string;
    bio?: string;
    profile_picture?: string;
}

defineProps<{
    user: User;
}>();

const emit = defineEmits<{
    connect: [id: number];
}>();

const requestFriend = (id: number) => {
    emit('connect', id);
};
</script>

<template>
    <li
        class="group relative rounded-xl p-3 transition-all duration-200 hover:bg-gray-50"
    >
        <div class="flex items-center justify-between space-x-4">
            <div class="flex min-w-0 items-center space-x-3">
                <div class="relative h-12 w-12">
                    <img
                        :src="
                            $page.props.auth.user.profile_picture ||
                            '/default-avatar.png'
                        "
                        :alt="$page.props.auth.user.name"
                        class="h-12 w-12 rounded-full object-cover ring-2 ring-white"
                    />
                    <span
                        class="absolute bottom-0 right-0 h-3 w-3 rounded-full border-2 border-white bg-green-400"
                    ></span>
                </div>
                <div class="min-w-0 flex-1">
                    <p
                        class="truncate text-sm font-semibold text-gray-900 transition-colors group-hover:text-yellow-600"
                    >
                        {{ user.name }}
                    </p>
                    <p class="truncate text-sm text-gray-500">
                        {{ user.bio || 'No bio available' }}
                    </p>
                </div>
            </div>
            <button
                @click="requestFriend(user.id)"
                class="inline-flex items-center justify-center rounded-full bg-yellow-50 px-4 py-1.5 text-sm font-semibold text-yellow-600 transition-all duration-200 hover:bg-yellow-100 hover:text-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
            >
                Connect
            </button>
        </div>
    </li>
</template>
