import { PropsWithChildren, ReactNode } from "react";
import { User } from "@/types";
import ExampleSidebar from "@/Components/Sidebar";

export default function Authenticated({
    user,
    header,
    children,
}: PropsWithChildren<{ user: User; header?: ReactNode }>) {
    return (
        <>
            <ExampleSidebar user={user}>
                <div className="min-h-screen">
                    <main>{children}</main>
                </div>
            </ExampleSidebar>
        </>
    );
}
