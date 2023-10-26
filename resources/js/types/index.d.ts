export interface User {
    id: number;
    name: string;
    email: string;
    employees_id: number;
    role_users_id: number
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};
