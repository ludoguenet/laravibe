<script setup lang="ts">
import { FeedForm } from '@/types';
import { PaperClipIcon } from '@heroicons/vue/24/outline';
import { ref } from 'vue';

const form = defineModel<FeedForm>();

const fileInput = ref<HTMLInputElement | null>(null);

const handleFileSelect = (event: Event) => {
    const input = event.target as HTMLInputElement;

    if (!input.files?.length) return;

    Array.from(input.files).forEach((file) => form.value.attachments.push(file));

    input.value = '';
};

const removeAttachment = (index: number) => {
    form.value.attachments.splice(index, 1);
};

const openFileDialog = () => {
    fileInput.value?.click();
};
</script>

<template>
    <div class="relative flex">
        <input
            ref="fileInput"
            type="file"
            multiple
            class="hidden"
            @change="handleFileSelect"
            accept="*/*"
        />

        <button
            @click="openFileDialog"
            class="text-gray-400 transition-colors hover:text-gray-600"
            title="Add attachments"
        >
            <PaperClipIcon class="h-5 w-5" />
        </button>

        <!-- Attachments Preview -->
        <div
            v-if="form && form.attachments?.length"
            class="absolute top-10 z-10 mt-2 rounded-lg border border-gray-100 bg-white p-3 shadow-lg"
        >
            <div class="z-50 mb-2 text-xs font-medium text-gray-500">
                Pièce{{ form.attachments.length > 1 ? 's' : '' }} jointe{{
                    form.attachments.length > 1 ? 's' : ''
                }}
                ({{ form.attachments.length }})
            </div>
            <div class="space-y-2">
                <div
                    v-for="(file, index) in form.attachments"
                    :key="index"
                    class="flex items-center justify-between rounded-md bg-gray-50 px-3 py-2 text-sm hover:bg-gray-100"
                >
                    <div class="flex items-center space-x-2 truncate">
                        <PaperClipIcon
                            class="h-4 w-4 flex-shrink-0 text-gray-400"
                        />
                        <span class="truncate">{{ file.name }}</span>
                    </div>
                    <button
                        @click="removeAttachment(index)"
                        class="ml-2 flex-shrink-0 text-gray-400 hover:text-red-500"
                    >
                        <span class="sr-only">Remove</span>
                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
