<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { User } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{
    friends: Array<User>;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <ul role="list" class="divide-y divide-gray-100">
                    <li
                        v-for="friend in friends"
                        :key="friend.id"
                        class="flex items-center justify-between gap-x-6 py-5"
                    >
                        <div class="min-w-0">
                            <div class="flex items-start gap-x-3">
                                <p
                                    class="text-sm/6 font-semibold text-gray-900"
                                >
                                    {{ friend.name }}
                                </p>
                                <p
                                    :class="[
                                        'mt-0.5 whitespace-nowrap rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-400 ring-1 ring-inset ring-green-200',
                                    ]"
                                >
                                    online
                                </p>
                            </div>
                            <div
                                class="mt-1 flex items-center gap-x-2 text-xs/5 text-gray-500"
                            >
                                <p class="whitespace-nowrap">
                                    Inscrit le
                                    <time :datetime="friend.created_at">{{
                                        new Date(friend.created_at).getMonth() +
                                        '/' +
                                        new Date(
                                            friend.created_at,
                                        ).getFullYear()
                                    }}</time>
                                </p>
                                <svg
                                    viewBox="0 0 2 2"
                                    class="size-0.5 fill-current"
                                >
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <p class="truncate" v-if="friend.bio">
                                    {{ friend.bio }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-none items-center gap-x-4">
                            <!-- Bouton principal -->
                            <button
                                class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block"
                            >
                                Supprimer
                                <span class="sr-only">, {{ friend.name }}</span>
                            </button>

                            <!-- Menu déroulant -->
                            <div class="relative flex-none">
                                <button
                                    type="button"
                                    class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"
                                    id="friend-options-button"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                >
                                    <span class="sr-only"
                                        >Ouvrir les options</span
                                    >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        aria-hidden="true"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>

                                <!-- Menu -->
                                <div
                                    class="right-0 z-10 mt-2 hidden w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="friend-options-button"
                                    tabindex="-1"
                                >
                                    <div class="py-1" role="none">
                                        <!-- Voir le profil -->
                                        <a
                                            href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem"
                                            tabindex="-1"
                                            id="view-profile"
                                        >
                                            Voir le profil
                                        </a>

                                        <!-- Envoyer un message -->
                                        <a
                                            href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem"
                                            tabindex="-1"
                                            id="send-message"
                                        >
                                            Envoyer un message
                                        </a>

                                        <!-- Supprimer -->
                                        <a
                                            href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem"
                                            tabindex="-1"
                                            id="remove-friend"
                                        >
                                            Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
