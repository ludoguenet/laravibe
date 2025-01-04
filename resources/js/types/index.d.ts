export interface User {
    id: number;
    name: string;
    profile_picture: string;
    bio?: string;
    email: string;
    email_verified_at?: string;
}

export interface FileAttachment {
    name: string;
}

export interface Feed {
    id: number;
    user: User;
    body: string;
    created_at: string;
    updated_at: string;
    attachments: FileAttachment[];
}

export interface FeedForm {
    content: string,
    attachments: FileAttachment[]
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
