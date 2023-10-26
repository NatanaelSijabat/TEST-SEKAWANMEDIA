import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { PageProps } from "@/types";

export default function Dashboard({ auth }: PageProps) {
    console.log("a", auth);
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Dashboard" />

            {/* <div className="py-12"> */}
            {/* <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900"></div>
                    </div>
                </div> */}
            {/* </div> */}
            <p>Welcome Back : {auth.user.email}</p>
        </AuthenticatedLayout>
    );
}
