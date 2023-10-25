import Authenticated from "@/Layouts/AuthenticatedLayout";
import { PageProps } from "@/types";
import { Head } from "@inertiajs/react";

const Users = ({ auth }: PageProps) => {
    return (
        <Authenticated user={auth.user}>
            <Head title="Users" />

            <p>User Layout</p>
        </Authenticated>
    );
};

export default Users;
