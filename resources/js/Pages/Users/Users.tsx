import Authenticated from "@/Layouts/AuthenticatedLayout";
import { doGetUserss } from "@/services/order-services";
import { DataTypeOrder, PageProps, UserType } from "@/types";
import { Head } from "@inertiajs/react";
import { Card, Table } from "antd";
import { ColumnsType } from "antd/es/table";
import axios from "axios";
import { useEffect, useState } from "react";

const Users = ({ auth }: PageProps) => {
    const [datas, setDatas] = useState<UserType[]>([]);

    const fetchUser = async () => {
        doGetUserss().then((response) => {
            setDatas(response.data);
            console.log(response.data);
        });
    };

    useEffect(() => {
        fetchUser();
    }, []);
    const columns: ColumnsType<UserType> = [
        {
            title: "No",
            dataIndex: "id",
            key: "id",
        },
        {
            title: "Email",
            dataIndex: "email",
            key: "email",
        },
        {
            title: "Fullname",
            dataIndex: "fullname",
            key: "fullname",
        },
        {
            title: "Role",
            dataIndex: "role",
            key: "role",
        },
    ];

    return (
        <Authenticated user={auth.user}>
            <Head title="Users" />
            <Card title="Users">
                <Table
                    columns={columns}
                    pagination={false}
                    dataSource={datas}
                />
            </Card>
        </Authenticated>
    );
};

export default Users;
